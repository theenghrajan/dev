const plugin = require('tailwindcss/plugin');

const includePreflight = 'editor' === process.env._TW_TARGET ? false : true;

module.exports = {
  presets: [
    require('./tailwind-typography.config.js'),
  ],
  content: [
    './src/**/*.{html,js,jsx,ts,tsx,vue}',
    './pages/**/*.{html,js,jsx,ts,tsx,vue}',
    './components/**/*.{html,js,jsx,ts,tsx,vue}',
    './layouts/**/*.{html,js,jsx,ts,tsx,vue}',
    './javascript/*.{html,js,jsx,ts,tsx,vue}',
    './public/**/*.html',
      './theme/**/*.php',
  './theme/**/*.html',
  './_project_data/html_blocks/*.html',
  ],

  // ── Dark mode ─────────────────────────────────────────────────────────────
  darkMode: 'class',

  theme: {
    // ── Override Tailwind defaults ──────────────────────────────────────────
    // (Extend only; keep Tailwind's reset but replace the design-irrelevant
    //  defaults with NPTI tokens)

    screens: {
      sm:  '640px',
      md:  '768px',
      lg:  '1024px',
      xl:  '1280px',
      '2xl': '1310px',
    },

    // ────────────────────────────────────────────────────────────────────────
    // COLORS
    // All colors use CSS-variable RGB channels so the Tailwind opacity modifier
    // (e.g. bg-navy/80, text-blue/50) works out of the box.
    // CSS vars are declared in base.css (:root block).
    // ────────────────────────────────────────────────────────────────────────
    colors: {
      transparent: 'transparent',
      current:     'currentColor',

      // ── Primary brand ──────────────────────────────────────────────────
      white: {
        DEFAULT: 'rgb(var(--color-white) / <alpha-value>)',
      },
      navy: {
        DEFAULT: 'rgb(var(--color-navy) / <alpha-value>)',
      },
      blue: {
        DEFAULT: 'rgb(var(--color-blue) / <alpha-value>)',
        dark:    'rgb(var(--color-dark-blue) / <alpha-value>)',
      },
      orange: {
        DEFAULT: 'rgb(var(--color-orange) / <alpha-value>)',
      },
      yellow: {
        DEFAULT: 'rgb(var(--color-yellow) / <alpha-value>)',
      },

      // ── Supporting ─────────────────────────────────────────────────────
      'light-blue': {
        DEFAULT: 'rgb(var(--color-light-blue) / <alpha-value>)',
      },
      steel: {
        DEFAULT: 'rgb(var(--color-steel) / <alpha-value>)',
      },
      gray: {
        DEFAULT: 'rgb(var(--color-gray) / <alpha-value>)',
        md:      'rgb(var(--color-gray-md) / <alpha-value>)',
        lt:      'rgb(var(--color-gray-lt) / <alpha-value>)',
        silver:  'rgb(var(--color-silver) / <alpha-value>)',
        smoke:   'rgb(var(--color-smoke) / <alpha-value>)',
      },
      black: {
        DEFAULT: 'rgb(var(--color-black) / <alpha-value>)',
        near:    'rgb(var(--color-near-black) / <alpha-value>)',
      },

      // ── Gray sub-tokens also exposed as top-level aliases ──────────────
      smoke: {
        DEFAULT: 'rgb(var(--color-smoke) / <alpha-value>)',
      },
      silver: {
        DEFAULT: 'rgb(var(--color-silver) / <alpha-value>)',
      },

      // ── Extended / Social ──────────────────────────────────────────────
      'google-blue': {
        DEFAULT: 'rgb(var(--color-google-blue) / <alpha-value>)',
      },
      peach: {
        DEFAULT: 'rgb(var(--color-peach) / <alpha-value>)',
      },

      // ── Semantic ───────────────────────────────────────────────────────
      success: {
        DEFAULT: 'rgb(var(--color-green) / <alpha-value>)',
        muted:   'rgb(var(--color-green) / 0.10)',
      },
      error: {
        DEFAULT: 'rgb(var(--color-red) / <alpha-value>)',
        muted:   'rgb(var(--color-red) / 0.10)',
      },
      warning: {
        DEFAULT: 'rgb(var(--color-amber) / <alpha-value>)',
      },
      notice: {
        DEFAULT: 'rgb(var(--color-salmon) / <alpha-value>)',
      },
    },

    // ────────────────────────────────────────────────────────────────────────
    // TYPOGRAPHY — Font Families
    // ────────────────────────────────────────────────────────────────────────
    fontFamily: {
      // Bitter: all headings, display, hero text
      heading: ['"Bitter"', 'Georgia', 'serif'],

      // Segoe UI: body copy, UI labels, form elements
      body: ['"Segoe UI"', 'system-ui', '-apple-system', 'sans-serif'],

      // Roboto: navigation, data, supporting UI
      ui: ['"Roboto"', '"Helvetica Neue"', 'Arial', 'sans-serif'],

      // Source Sans Pro: specific marketing callouts only (restricted)
      alt: ['"Source Sans 3"', '"Source Sans Pro"', 'sans-serif'],

      // Monospace: code, design tokens
      mono: ['"SF Mono"', '"Fira Code"', '"Fira Mono"', 'monospace'],

      // Icon font
      icomoon: ['"icomoon"'],
    },

    // ────────────────────────────────────────────────────────────────────────
    // TYPOGRAPHY — Font Sizes
    // Format: [fontSize, { lineHeight, letterSpacing, fontWeight }]
    // ────────────────────────────────────────────────────────────────────────
    fontSize: {
      // Micro
      'xs-micro': ['0.5rem',   { lineHeight: '1rem',   letterSpacing: '0.05em' }],  // 8px
      xs:         ['0.875rem', { lineHeight: '1.25rem' }],                           // 14px

      // Body
      sm:  ['1rem',    { lineHeight: '1.5rem' }],     // 16px — UI labels, buttons
      md:  ['1.125rem',{ lineHeight: '1.625rem' }],   // 18px — body default
      lg:  ['1.25rem', { lineHeight: '1.75rem' }],    // 20px — sub-lead

      // Display / headings
      xl:    ['1.5rem',   { lineHeight: '1.3' }],     // 24px — H3 / card heading
      '2xl': ['2.5rem',   { lineHeight: '1.15' }],    // 40px — H2 section heading
      '3xl': ['3rem',     { lineHeight: '1.1' }],     // 48px — H1 page title
      '4xl': ['3.5rem',   { lineHeight: '1.05' }],    // 56px — display / hero sub
      '5xl': ['4.375rem', { lineHeight: '1' }],       // 70px — hero display
    },

    // ────────────────────────────────────────────────────────────────────────
    // TYPOGRAPHY — Font Weights
    // ────────────────────────────────────────────────────────────────────────
    fontWeight: {
      normal:    '400',
      medium:    '500',
      semibold:  '600',
      bold:      '700',
    },

    // ────────────────────────────────────────────────────────────────────────
    // SPACING
    // All gap tokens from the design (gap-4 through gap-183).
    // Extends Tailwind's default scale; non-standard values are prefixed with
    // their px value for clarity.
    // ────────────────────────────────────────────────────────────────────────
    spacing: {
      px:   '1px',
      0:    '0px',
      0.5:  '2px',
      1:    '4px',     // gap-4
      1.5:  '6px',
      2:    '8px',     // gap-8  ★ base unit
      2.25: '9px',     // gap-9
      2.5:  '10px',    // gap-10
      3:    '12px',    // gap-12
      3.25: '13px',    // gap-13
      4:    '16px',    // gap-16 ★ standard column gap
      5:    '20px',    // gap-20
      6:    '24px',    // gap-24 ★ card grid gap
      7.5:  '30px',    // gap-30
      8:    '32px',    // gap-32 ★ three-column grids
      10:   '40px',    // gap-40
      10.5: '42px',    // gap-42
      15:   '60px',    // gap-60
      36:   '144px',   // button horizontal padding (10px 36px pattern)
      // Button padding shorthand values
      'btn-y': '10px',
      'btn-x': '36px',
      // Section-specific / large values
      'gap-75':  '75px',
      'gap-89':  '89px',
      'gap-183': '183px',
    },

    // ────────────────────────────────────────────────────────────────────────
    // BORDER RADIUS
    // ────────────────────────────────────────────────────────────────────────
    borderRadius: {
      none:  '0px',
      xs:    '2px',    // radius-2  · sharp inline
      sm:    '4px',    // radius-4  · minimal
      md:    '6px',    // radius-6
      DEFAULT:'8px',   // radius-8  ★ inputs, chips
      lg:    '10px',   // radius-10 · medium UI
      xl:    '12px',   // radius-12 ★ cards, panels
      '2xl': '16px',   // radius-16 · large cards
      '3xl': '24px',   // radius-24 · feature blocks
      '4xl': '30px',   // radius-30 ★ buttons, CTAs
      '5xl': '38px',   // radius-38 · large chips
      '6xl': '50px',   // radius-50 · avatars, circles
      '7xl': '56px',   // radius-56
      pill:  '2000px', // radius-2000 ★ pills, tags, full CTAs
      full:  '9999px',
    },

    // ────────────────────────────────────────────────────────────────────────
    // BORDER WIDTH
    // ────────────────────────────────────────────────────────────────────────
    borderWidth: {
      DEFAULT: '1px',
      0:    '0px',
      half: '0.5px',   // subtle accent dividers
      1:    '1px',     // standard
      1.5:  '1.5px',   // ghost CTA buttons, featured cards
      2:    '2px',     // active tab underline, focus ring
      4:    '4px',     // strong focus / accent left-border
      16:   '16px',    // progress indicator ring only
    },

    // ────────────────────────────────────────────────────────────────────────
    // BOX SHADOW — 4 elevation levels
    // ────────────────────────────────────────────────────────────────────────
    boxShadow: {
      none:    'none',
      // Level 1 — subtle: inline UI elements
      subtle:  '0 1px 4px rgb(23 42 54 / 0.08)',
      // Level 2 — card: most content cards and containers
      card:    '0 2px 24px rgb(23 42 54 / 0.04)',
      // Level 3 — float: modals, dropdowns, popovers
      float:   '0 12px 24px rgb(0 0 0 / 0.10)',
      // Level 4 — hero: full-width page sections
      hero:    '0 80.6px 105.7px rgb(51 51 51 / 0.10)',
    },

    // ────────────────────────────────────────────────────────────────────────
    // EXTEND — Additions on top of Tailwind defaults
    // ────────────────────────────────────────────────────────────────────────
    extend: {

      // ── Spacing gap-fill — standard Tailwind values absent from override ─
      spacing: {
        3.5: '14px',   // 0.875rem
        7:   '28px',   // 1.75rem
        9:   '36px',   // 2.25rem
        11:  '44px',   // 2.75rem
        12:  '48px',   // 3rem   ★ form inputs, icon sizes
        14:  '56px',   // 3.5rem
        16:  '64px',   // 4rem
        20:  '80px',   // 5rem
        24:  '96px',   // 6rem
        32:  '128px',  // 8rem
      },

      // ── Line height ────────────────────────────────────────────────────
      lineHeight: {
        tight:   '1.1',
        snug:    '1.2',
        normal:  '1.5',
        relaxed: '1.625',
        loose:   '1.75',
      },

      // ── Letter spacing ─────────────────────────────────────────────────
      letterSpacing: {
        tightest: '-0.02em',
        tighter:  '-0.01em',
        tight:    '0em',
        normal:   '0.01em',
        wide:     '0.05em',
        wider:    '0.08em',
        widest:   '0.15em',
      },

      // ── Max width ──────────────────────────────────────────────────────
      maxWidth: {
        'site':     '1440px',
        'content':  '1200px',
        'prose':    '720px',
        'narrow':   '560px',
      },

      // ── Min height ─────────────────────────────────────────────────────
      minHeight: {
        hero:  '600px',
        screen: '100vh',
      },

      // ── Z-index ────────────────────────────────────────────────────────
      zIndex: {
        behind:  '-1',
        base:     '0',
        raised:   '10',
        dropdown: '20',
        sticky:   '30',
        overlay:  '40',
        modal:    '50',
        toast:    '60',
        top:      '9999',
      },

      // ── Transition ─────────────────────────────────────────────────────
      transitionDuration: {
        fast:    '120ms',
        DEFAULT: '200ms',
        slow:    '400ms',
      },
      transitionTimingFunction: {
        DEFAULT: 'cubic-bezier(0.4, 0, 0.2, 1)',
        in:      'cubic-bezier(0.4, 0, 1, 1)',
        out:     'cubic-bezier(0, 0, 0.2, 1)',
        bounce:  'cubic-bezier(0.34, 1.56, 0.64, 1)',
      },

      // ── Background image helpers ───────────────────────────────────────
      backgroundImage: {
        'gradient-navy':  'linear-gradient(135deg, rgb(23 42 54), rgb(4 76 171))',
        'gradient-brand': 'linear-gradient(135deg, rgb(4 76 171), rgb(28 58 169))',
        'gradient-cta':   'linear-gradient(90deg, rgb(255 102 0), rgb(255 140 50))',
        'overlay-navy':   'linear-gradient(to bottom, rgb(23 42 54 / 0), rgb(23 42 54 / 0.8))',
        'overlay-dark':   'linear-gradient(to bottom, rgb(0 0 0 / 0), rgb(0 0 0 / 0.6))',
        'checker':
          'linear-gradient(45deg,#e4e8ed 25%,transparent 25%),' +
          'linear-gradient(-45deg,#e4e8ed 25%,transparent 25%),' +
          'linear-gradient(45deg,transparent 75%,#e4e8ed 75%),' +
          'linear-gradient(-45deg,transparent 75%,#e4e8ed 75%)',
      },

      // ── Aspect ratio ───────────────────────────────────────────────────
      aspectRatio: {
        hero:      '16 / 7',
        card:      '4 / 3',
        thumb:     '16 / 9',
        portrait:  '3 / 4',
        square:    '1 / 1',
      },

      // ── Animation ──────────────────────────────────────────────────────
      keyframes: {
        'fade-in': {
          '0%':   { opacity: '0', transform: 'translateY(8px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        'slide-up': {
          '0%':   { opacity: '0', transform: 'translateY(24px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        'slide-in-right': {
          '0%':   { opacity: '0', transform: 'translateX(24px)' },
          '100%': { opacity: '1', transform: 'translateX(0)' },
        },
        'scale-in': {
          '0%':   { opacity: '0', transform: 'scale(0.95)' },
          '100%': { opacity: '1', transform: 'scale(1)' },
        },
        'pulse-soft': {
          '0%, 100%': { opacity: '1' },
          '50%':       { opacity: '0.7' },
        },
      },
      animation: {
        'fade-in':        'fade-in 0.2s ease-out both',
        'slide-up':       'slide-up 0.3s ease-out both',
        'slide-in-right': 'slide-in-right 0.3s ease-out both',
        'scale-in':       'scale-in 0.2s ease-out both',
        'pulse-soft':     'pulse-soft 2s ease-in-out infinite',
      },
    },
  },

  // ── Plugins ───────────────────────────────────────────────────────────────
corePlugins: {
    preflight: includePreflight,
  },
  plugins: [
    require('@_tw/typography'),
    require('@_tw/themejson'),
    plugin(function ({ addUtilities }) {
      addUtilities({
        '.stretched-link': {
          '&::after': {
            content: '""',
            position: 'absolute',
            inset: '0',
            zIndex: '10',
          },
        },
        '.title-white :is(h1,h2,h3,h4,h5,h6)': {
          color: '#ffffff',
        },
        '.counter-wrap': {
          'counter-reset': 'counter-count 0',
        },
        '.counter-count:before': {
          content: 'counter(counter-count, decimal-leading-zero)',
          'counter-increment': 'counter-count',
        },
        '.counter-count-alt:before': {
          content: 'counter(counter-count)"."',
          'counter-increment': 'counter-count',
        },
      });
    }),
  ],
};
