import React, { memo, useEffect, useRef, useState } from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faEthernet, faHdd, faMemory, faMicrochip, faServer } from '@fortawesome/free-solid-svg-icons';
import { Link } from 'react-router-dom';
import { Server } from '@/api/server/getServer';
import getServerResourceUsage, { ServerPowerState, ServerStats } from '@/api/server/getServerResourceUsage';
import { bytesToString, ip, mbToBytes } from '@/lib/formatters';
import tw from 'twin.macro';
import GreyRowBox from '@/components/elements/GreyRowBox';
import CopyOnClick from '@/components/elements/CopyOnClick';
import Spinner from '@/components/elements/Spinner';
import styled,{ css }  from 'styled-components/macro';
import { Installing, Suspended } from '@/lang';
import isEqual from 'react-fast-compare';

// Determines if the current value is in an alarm threshold so we can show it in red rather
// than the more faded default style.
const isAlarmState = (current: number, limit: number): boolean => limit > 0 && current / (limit * 1024 * 1024) >= 0.9;

const Card = styled.div<{ $status: ServerPowerState | undefined }>`
    ${tw`text-neutral-50 relative`}
    background: var(--secondary);
    border-radius: var(--border-radius-md);
    padding: 25px;
    transition: all var(--transition-base);
    border: 1px solid var(--color-5);
    box-shadow: var(--shadow-sm);

    /* Nova glassmorphism effect when enabled */
    ${() => {
        const glassEnabled = getComputedStyle(document.documentElement).getPropertyValue('--enable-glassmorphism').trim();
        if (glassEnabled !== '0') {
            return css`
                background: var(--glass-bg);
                backdrop-filter: blur(var(--glass-blur)) saturate(var(--glass-saturation));
                -webkit-backdrop-filter: blur(var(--glass-blur)) saturate(var(--glass-saturation));
                border: 1px solid var(--glass-border);
            `;
        }
        return css``;
    }}

    &:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary);
    }

    /* Animated border glow on hover */
    &::before {
        content: '';
        position: absolute;
        inset: -1px;
        border-radius: var(--border-radius-md);
        padding: 1px;
        background: var(--gradient-primary);
        -webkit-mask: 
            linear-gradient(#fff 0 0) content-box, 
            linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        opacity: 0;
        transition: opacity var(--transition-base);
        pointer-events: none;
    }

    &:hover::before {
        opacity: 1;
    }

    & .status-bar {
        ${({ $status }) =>
            !$status || $status === 'offline'
                ? css`&::after{
                    content:'Offline';
                    color: var(--color);
                    background: linear-gradient(135deg, rgba(239, 68, 68, 0.2) 0%, rgba(239, 68, 68, 0.1) 100%);
                    border: 1px solid rgba(239, 68, 68, 0.3);
                    padding: 6px 12px;
                    border-radius: var(--border-radius-sm);
                    font-size: 0.75rem;
                    font-weight: 600;
                    text-transform: uppercase;
                    letter-spacing: 0.05em;
                }`
                : $status === 'running'
                ? css`&::after{
                    content:'Online';
                    color: var(--accent-green);
                    background: linear-gradient(135deg, rgba(74, 222, 128, 0.2) 0%, rgba(74, 222, 128, 0.1) 100%);
                    border: 1px solid rgba(74, 222, 128, 0.3);
                    padding: 6px 12px;
                    border-radius: var(--border-radius-sm);
                    font-size: 0.75rem;
                    font-weight: 600;
                    text-transform: uppercase;
                    letter-spacing: 0.05em;
                    box-shadow: 0 0 10px rgba(74, 222, 128, 0.2);
                }`
                : css`&::after{
                    content:'Starting';
                    color: var(--accent-orange);
                    background: linear-gradient(135deg, rgba(251, 146, 60, 0.2) 0%, rgba(251, 146, 60, 0.1) 100%);
                    border: 1px solid rgba(251, 146, 60, 0.3);
                    padding: 6px 12px;
                    border-radius: var(--border-radius-sm);
                    font-size: 0.75rem;
                    font-weight: 600;
                    text-transform: uppercase;
                    letter-spacing: 0.05em;
                    animation: pulse 2s ease-in-out infinite;
                }`};
    }

    & span {
        ${tw`text-neutral-300`};
        font-size: 0.875rem;
    }

    & b {
        color: var(--highlight-color);
        font-weight: 600;
    }

    & a {
        background: var(--gradient-primary);
        background-color: var(--primary);
        padding: 12px 20px;
        width: 100%;
        display: block;
        border-radius: var(--borderradius);
        text-align: center;
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.025em;
        font-size: 0.875rem;
        transition: all var(--transition-fast);
        box-shadow: var(--shadow-sm);
        position: relative;
        overflow: hidden;

        &:hover {
            background-color: var(--primary-hover);
            box-shadow: var(--shadow-primary);
            transform: translateY(-2px);
        }

        &:active {
            transform: translateY(0);
        }
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }
`;

type Timer = ReturnType<typeof setInterval>;

export default ({ server }: { server: Server; className?: string }) => {
    const interval = useRef<Timer>(null) as React.MutableRefObject<Timer>;
    const [isSuspended, setIsSuspended] = useState(server.status === 'suspended');
    const [stats, setStats] = useState<ServerStats | null>(null);

    const getStats = () =>
        getServerResourceUsage(server.uuid)
            .then((data) => setStats(data))
            .catch((error) => console.error(error));

    useEffect(() => {
        setIsSuspended(stats?.isSuspended || server.status === 'suspended');
    }, [stats?.isSuspended, server.status]);

    useEffect(() => {
        // Don't waste a HTTP request if there is nothing important to show to the user because
        // the server is suspended.
        if (isSuspended) return;

        getStats().then(() => {
            interval.current = setInterval(() => getStats(), 30000);
        });

        return () => {
            interval.current && clearInterval(interval.current);
        };
    }, [isSuspended]);

    const alarms = { cpu: false, memory: false, disk: false };
    if (stats) {
        alarms.cpu = server.limits.cpu === 0 ? false : stats.cpuUsagePercent >= server.limits.cpu * 0.9;
        alarms.memory = isAlarmState(stats.memoryUsageInBytes, server.limits.memory);
        alarms.disk = server.limits.disk === 0 ? false : isAlarmState(stats.diskUsageInBytes, server.limits.disk);
    }

    const diskLimit = server.limits.disk !== 0 ? bytesToString(mbToBytes(server.limits.disk)) : 'Unlimited';
    const memoryLimit = server.limits.memory !== 0 ? bytesToString(mbToBytes(server.limits.memory)) : 'Unlimited';
    const cpuLimit = server.limits.cpu !== 0 ? server.limits.cpu + ' %' : 'Unlimited';

    return (
        <>
        <Card $status={stats?.status}>
            <div css={tw`flex justify-between items-start`}>
                <div>
                    <b css={tw`text-lg`}>
                        {server.name}
                    </b>
                    <p className={'text-sm mt-1 text-gray-300'}>{server.description}</p>
                </div>
                <div className={'status-bar'}/>
            </div>
            <div css={tw`grid grid-cols-1 md:grid-cols-2 gap-x-2 sm:gap-x-4 mt-3 mb-4 gap-y-2`}>
                <div>
                <span>IP: </span>
                    {server.allocations
                    .filter((alloc) => alloc.isDefault)
                    .map((allocation) => (
                        <React.Fragment key={allocation.ip + allocation.port.toString()}>
                            <CopyOnClick text={`${allocation.alias || ip(allocation.ip)}:${allocation.port}`}>
                                <b>
                                    {allocation.alias || ip(allocation.ip)}:{allocation.port}
                                </b>
                            </CopyOnClick>
                        </React.Fragment>
                    ))}
                </div>
                {(!stats || isSuspended) ?
                    isSuspended ?
                        <React.Fragment>
                            <div>
                                <div css={tw`bg-red-800 rounded px-2 py-1 text-xs inline`}>
                                    {server.status === 'suspended' ? `${Suspended}` : 'Connection Error'}
                                </div>
                            </div>
                        </React.Fragment>
                    :
                    (server.isTransferring || server.status) ?
                        <React.Fragment>
                            <div css={tw`flex-1`}>
                                <div css={tw`bg-neutral-500 rounded px-2 py-1 text-neutral-100 text-xs inline`}>
                                    {server.isTransferring ?
                                        'Transferring'
                                        :
                                        server.status === 'installing' ? `${Installing}` : (
                                            server.status === 'restoring_backup' ?
                                                'Restoring Backup'
                                                :
                                                'Unavailable'
                                        )
                                    }
                                </div>
                            </div>
                        </React.Fragment>
                        :
                        <Spinner size={'small'}/>
                :
                <React.Fragment>
                    <div>
                        <span>CPU: </span>
                        <b>{stats.cpuUsagePercent.toFixed(2)} %</b> <span>/ {cpuLimit}</span>
                    </div>
                    <div>
                        <span>Memory: </span>
                        <b>{bytesToString(stats.memoryUsageInBytes)}</b> <span>/ {memoryLimit}</span>
                    </div>
                    <div>
                        <span>Disk: </span>
                        <b>{bytesToString(stats.diskUsageInBytes)}</b> <span>/ {diskLimit}</span>
                    </div>
                </React.Fragment>
                }
            </div>
            <Link to={`/server/${server.id}`}>
                Manage Server
            </Link>
        </Card>
        </>
    );
};
