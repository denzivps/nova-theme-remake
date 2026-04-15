const colors = require('tailwindcss/colors');

/* ============================================
   NOVA THEME TAILWIND CONFIG
   ============================================ */

const gray = {
    50: 'var(--highlight-color)', // white text
    100: 'var(--light-color)',
    200: 'var(--color)', // normal text
    300: 'var(--sub-color)',
    400: 'var(--color-4)',
    500: 'var(--color-5)',
    600: 'var(--color-6)',
    700: 'var(--secondary)',
    800: 'var(--dark)',
    900: 'var(--dark)',
};

const neutral = {
    50: 'var(--highlight-color)', // white text
    100: 'var(--light-color)',
    200: 'var(--color)', // normal text
    300: 'var(--sub-color)',
    400: 'var(--color-4)',
    500: 'var(--color-5)',
    600: 'var(--color-6)',
    700: 'var(--secondary)',
    800: 'var(--dark)',
    900: 'var(--dark)',
};

// Nova Theme Accent Colors
const accent = {
    cyan: 'var(--accent-cyan)',
    purple: 'var(--accent-purple)',
    pink: 'var(--accent-pink)',
    orange: 'var(--accent-orange)',
    green: 'var(--accent-green)',
    yellow: 'var(--accent-yellow)',
};

module.exports = {
    content: [
        './resources/scripts/**/*.{js,ts,tsx}',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['var(--font-sans)', 'Inter', 'system-ui', 'sans-serif'],
                mono: ['var(--font-mono)', 'JetBrains Mono', 'monospace'],
                header: ['var(--font-sans)', 'Inter', 'system-ui', 'sans-serif'],
            },
            colors: {
                black: '#131a20',
                // Nova Theme Colors
                primary: {
                    DEFAULT: 'var(--primary)',
                    hover: 'var(--primary-hover)',
                    glow: 'var(--primary-glow)',
                },
                secondary: {
                    DEFAULT: 'var(--secondary)',
                    hover: 'var(--secondary-hover)',
                },
                accent: accent,
                danger: {
                    DEFAULT: 'var(--danger)',
                    hover: 'var(--danger-hover)',
                },
                glass: {
                    DEFAULT: 'var(--glass-bg)',
                    light: 'var(--glass-bg-light)',
                    border: 'var(--glass-border)',
                },
                gray: gray,
                neutral: neutral,
                cyan: colors.cyan,
            },
            fontSize: {
                '2xs': '0.625rem',
                '3xs': '0.5rem',
            },
            spacing: {
                '18': '4.5rem',
                '22': '5.5rem',
            },
            borderRadius: {
                'sm': 'var(--border-radius-sm)',
                'md': 'var(--border-radius-md)',
                'lg': 'var(--border-radius-lg)',
                'xl': 'var(--border-radius-xl)',
            },
            boxShadow: {
                'sm': 'var(--shadow-sm)',
                'md': 'var(--shadow-md)',
                'lg': 'var(--shadow-lg)',
                'glow': 'var(--shadow-glow)',
                'primary': 'var(--shadow-primary)',
            },
            transitionDuration: {
                'fast': 'var(--transition-fast)',
                'base': 'var(--transition-base)',
                'slow': 'var(--transition-slow)',
                '250': '250ms',
            },
            transitionTimingFunction: {
                'nova': 'cubic-bezier(0.4, 0, 0.2, 1)',
                'bounce': 'cubic-bezier(0.68, -0.55, 0.265, 1.55)',
            },
            backgroundImage: {
                'gradient-primary': 'var(--gradient-primary)',
                'gradient-accent': 'var(--gradient-accent)',
                'gradient-warm': 'var(--gradient-warm)',
                'gradient-cool': 'var(--gradient-cool)',
                'gradient-rainbow': 'var(--gradient-rainbow)',
            },
            animation: {
                'fade-in': 'fadeIn var(--transition-base) ease-out',
                'slide-up': 'slideUp var(--transition-slow) ease-out',
                'scale-in': 'scaleIn var(--transition-base) ease-out',
                'pulse-glow': 'pulseGlow 2s ease-in-out infinite',
                'float': 'float 6s ease-in-out infinite',
                'shimmer': 'shimmer 1.5s infinite',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideUp: {
                    '0%': { opacity: '0', transform: 'translateY(20px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                scaleIn: {
                    '0%': { opacity: '0', transform: 'scale(0.95)' },
                    '100%': { opacity: '1', transform: 'scale(1)' },
                },
                pulseGlow: {
                    '0%, 100%': { boxShadow: '0 0 20px rgba(45, 218, 253, 0.3)' },
                    '50%': { boxShadow: '0 0 40px rgba(45, 218, 253, 0.5)' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-10px)' },
                },
                shimmer: {
                    '0%': { backgroundPosition: '-200% 0' },
                    '100%': { backgroundPosition: '200% 0' },
                },
            },
            backdropBlur: {
                'glass': 'var(--glass-blur)',
            },
            borderColor: theme => ({
                default: theme('colors.neutral.400', 'currentColor'),
                glass: 'var(--glass-border)',
            }),
        },
    },
    plugins: [
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/forms')({
            strategy: 'class',
        }),
    ]
};
