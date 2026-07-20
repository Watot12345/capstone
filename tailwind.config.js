module.exports = {
  theme: {
                extend: {
                    colors: {
                        'dash-bg': '#EEF5FF',
                        'c1': '#B4D4FF',
                        'c2': '#86B6F6',
                        'c3': '#176B87',
                        'c3d': '#0d4f64',
                    },
                    keyframes: {
                        pulse2: { '0%,100%': { opacity: '1', transform: 'scale(1)' }, '50%': { opacity: '0.45', transform: 'scale(0.72)' } },
                        fadeOverlay: { from: { opacity: '0' }, to: { opacity: '1' } },
                        slideUp: { from: { opacity: '0', transform: 'translateY(36px) scale(0.95)' }, to: { opacity: '1', transform: 'translateY(0) scale(1)' } },
                        popIn: { from: { transform: 'scale(0)', opacity: '0' }, to: { transform: 'scale(1)', opacity: '1' } },
                    },
                    animation: {
                        pulse2: 'pulse2 1.6s infinite',
                        fadeOverlay: 'fadeOverlay 0.18s ease',
                        slideUp: 'slideUp 0.24s cubic-bezier(0.34,1.56,0.64,1)',
                        popIn: 'popIn 0.32s cubic-bezier(0.34,1.56,0.64,1)',
                    },
                }
            },
  content: ['./**/*.{php,js}'],
  theme: {
    extend: {
      colors: {
        brand: {
          light: '#EEF5FF',
          border: '#B4D4FF',
          medium: '#86B6F6',
          dark: '#176B87',
        },
        'dash-bg': '#EEF5FF',
        c1: '#B4D4FF',
        c2: '#86B6F6',
        c3: '#176B87',
        c3d: '#0d4f64',
      },
      keyframes: {
        pulse2: {
          '0%, 100%': { opacity: '1', transform: 'scale(1)' },
          '50%': { opacity: '0.45', transform: 'scale(0.72)' },
        },
        fadeOverlay: { from: { opacity: '0' }, to: { opacity: '1' } },
        slideUp: {
          from: { opacity: '0', transform: 'translateY(36px) scale(0.95)' },
          to: { opacity: '1', transform: 'translateY(0) scale(1)' },
        },
        popIn: { from: { transform: 'scale(0)', opacity: '0' }, to: { transform: 'scale(1)', opacity: '1' } },
      },
      animation: {
        pulse2: 'pulse2 1.6s infinite',
        fadeOverlay: 'fadeOverlay 0.18s ease',
        slideUp: 'slideUp 0.24s cubic-bezier(0.34,1.56,0.64,1)',
        popIn: 'popIn 0.32s cubic-bezier(0.34,1.56,0.64,1)',
      },
    },
  },
  plugins: [],
};


