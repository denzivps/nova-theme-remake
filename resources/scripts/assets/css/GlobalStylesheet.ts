import tw from 'twin.macro';
import { createGlobalStyle } from 'styled-components/macro';

export default createGlobalStyle`
    /* ============================================
       NOVA THEME GLOBAL STYLES
       ============================================ */

    * {
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        ${tw`font-sans`};
        font-family: var(--font-sans);
        color: var(--color);
        background-color: var(--background-color) !important;
        letter-spacing: 0.015em;
        line-height: 1.6;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    /* Typography */
    h1, h2, h3, h4, h5, h6 {
        ${tw`font-semibold tracking-tight`};
        font-family: var(--font-sans);
        color: var(--highlight-color);
        line-height: 1.2;
    }

    h1 {
        font-size: 2rem;
        font-weight: 700;
    }

    h2 {
        font-size: 1.5rem;
        font-weight: 600;
    }

    h3 {
        font-size: 1.25rem;
        font-weight: 600;
    }

    p {
        ${tw`leading-relaxed`};
        color: var(--color);
        font-family: var(--font-sans);
    }

    a {
        color: var(--primary);
        transition: color var(--transition-fast);
        text-decoration: none;
    }

    a:hover {
        color: var(--primary-hover);
    }

    code, pre, .mono {
        font-family: var(--font-mono);
    }

    form {
        ${tw`m-0`};
    }

    /* Form Elements */
    textarea, select, input, button, button:focus, button:focus-visible {
        ${tw`outline-none`};
        font-family: var(--font-sans);
    }

    input, textarea, select {
        background-color: var(--input);
        color: var(--color);
        border: 1px solid var(--color-5);
        border-radius: var(--borderradius);
        transition: all var(--transition-fast);
    }

    input:focus, textarea:focus, select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px var(--shadow-primary);
    }

    input::placeholder, textarea::placeholder {
        color: var(--sub-color);
    }

    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none !important;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield !important;
    }

    /* Buttons */
    button {
        font-family: var(--font-sans);
        font-weight: 500;
        transition: all var(--transition-fast);
    }

    button:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    /* Cards & Containers */
    .card, [class*="Card"] {
        background: var(--secondary);
        border-radius: var(--border-radius-md);
        transition: transform var(--transition-base), box-shadow var(--transition-base);
    }

    .card:hover, [class*="Card"]:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    /* Glassmorphism Elements */
    .glass-panel {
        background: var(--glass-bg);
        backdrop-filter: blur(var(--glass-blur)) saturate(var(--glass-saturation));
        -webkit-backdrop-filter: blur(var(--glass-blur)) saturate(var(--glass-saturation));
        border: 1px solid var(--glass-border);
        border-radius: var(--border-radius-lg);
    }

    /* Navigation */
    nav, .nav, [class*="Navigation"] {
        background: var(--secondary) !important;
        border-color: var(--color-5) !important;
    }

    /* Status Indicators */
    .status-online, [data-status="online"] {
        color: var(--accent-green);
    }

    .status-offline, [data-status="offline"] {
        color: var(--color-4);
    }

    .status-error, [data-status="error"] {
        color: var(--danger);
    }

    .status-warning, [data-status="warning"] {
        color: var(--accent-orange);
    }

    /* Progress Bars */
    progress, [class*="Progress"] {
        background: var(--color-6);
        border-radius: var(--border-radius-sm);
        overflow: hidden;
    }

    progress::-webkit-progress-bar {
        background: var(--color-6);
        border-radius: var(--border-radius-sm);
    }

    progress::-webkit-progress-value {
        background: var(--gradient-primary);
        border-radius: var(--border-radius-sm);
        transition: width var(--transition-slow);
    }

    /* Tables */
    table {
        border-collapse: separate;
        border-spacing: 0;
    }

    th {
        color: var(--sub-color);
        font-weight: 600;
        text-transform: uppercase;
        font-size: var(--font-size-xs);
        letter-spacing: 0.05em;
    }

    td {
        color: var(--color);
    }

    tr:hover td {
        background: var(--color-5);
    }

    /* Modals & Overlays */
    [role="dialog"], .modal, [class*="Modal"] {
        background: var(--glass-bg);
        backdrop-filter: blur(var(--glass-blur)) saturate(var(--glass-saturation));
        -webkit-backdrop-filter: blur(var(--glass-blur)) saturate(var(--glass-saturation));
        border: 1px solid var(--glass-border);
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-lg);
    }

    /* ============================================
       ENHANCED SCROLLBAR - NOVA STYLE
       ============================================ */
    ::-webkit-scrollbar {
        background: transparent;
        width: 10px;
        height: 10px;
    }

    ::-webkit-scrollbar-track {
        background: transparent;
        border-radius: 5px;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--color-5);
        border-radius: 5px;
        border: 2px solid transparent;
        background-clip: padding-box;
        transition: background var(--transition-fast);
    }

    ::-webkit-scrollbar-thumb:hover {
        background: var(--primary);
        border: 2px solid transparent;
        background-clip: padding-box;
    }
n    ::-webkit-scrollbar-thumb:horizontal {
        border-radius: 5px;
    }

    ::-webkit-scrollbar-corner {
        background: transparent;
    }

    /* Firefox Scrollbar */
    * {
        scrollbar-width: thin;
        scrollbar-color: var(--color-5) transparent;
    }

    *:hover {
        scrollbar-color: var(--primary) transparent;
    }

    /* ============================================
       ANIMATIONS
       ============================================ */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes scaleIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }

    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }

    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }

    @keyframes glow {
        0%, 100% { box-shadow: 0 0 5px var(--primary), 0 0 10px var(--primary), 0 0 15px var(--primary); }
        50% { box-shadow: 0 0 10px var(--primary), 0 0 20px var(--primary), 0 0 30px var(--primary); }
    }

    .animate-fade-in {
        animation: fadeIn var(--transition-base) ease-out;
    }

    .animate-slide-up {
        animation: slideUp var(--transition-slow) ease-out;
    }

    .animate-scale-in {
        animation: scaleIn var(--transition-base) ease-out;
    }

    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    .animate-spin {
        animation: spin 1s linear infinite;
    }

    .animate-bounce {
        animation: bounce 1s ease-in-out infinite;
    }

    .animate-glow {
        animation: glow 2s ease-in-out infinite;
    }

    /* Staggered Animation Delays */
    .stagger-1 { animation-delay: 0.1s; }
    .stagger-2 { animation-delay: 0.2s; }
    .stagger-3 { animation-delay: 0.3s; }
    .stagger-4 { animation-delay: 0.4s; }
    .stagger-5 { animation-delay: 0.5s; }

    /* ============================================
       UTILITY CLASSES
       ============================================ */
    .text-gradient {
        background: var(--gradient-accent);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .bg-gradient-primary {
        background: var(--gradient-primary);
    }

    .bg-gradient-accent {
        background: var(--gradient-accent);
    }

    .shadow-glow {
        box-shadow: var(--shadow-glow);
    }

    .shadow-glow-primary {
        box-shadow: var(--shadow-primary);
    }

    .hover-lift {
        transition: transform var(--transition-base), box-shadow var(--transition-base);
    }

    .hover-lift:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-lg);
    }

    .hover-glow {
        transition: box-shadow var(--transition-fast);
    }

    .hover-glow:hover {
        box-shadow: var(--shadow-glow);
    }

    /* Focus States */
    :focus-visible {
        outline: 2px solid var(--primary);
        outline-offset: 2px;
    }

    /* Selection */
    ::selection {
        background: var(--primary);
        color: var(--true-white);
    }

    /* Disabled States */
    [disabled], .disabled {
        opacity: 0.5;
        cursor: not-allowed;
        pointer-events: none;
    }

    /* Loading States */
    .loading, [data-loading="true"] {
        position: relative;
        overflow: hidden;
    }

    .loading::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(255, 255, 255, 0.1),
            transparent
        );
        background-size: 200% 100%;
        animation: shimmer 1.5s infinite;
    }
`;
