# Changelog

## 1.1.0
- Motion: page-transition progress bar on Livewire navigation, scroll-reveal (IntersectionObserver) on category and dashboard cards with staggered entrance, floating hero glow orbs, honest count-up utility (`.astra-counter`) for future use with real data.
- SEO: sitewide fallback meta description, meta keywords, robots index toggle, canonical URL, full Open Graph + Twitter Card tags, Organization JSON-LD structured data, hidden semantic `<h1>` on the homepage for correct heading hierarchy — all configurable from the theme settings panel.

## 1.0.0
- Initial release of Astra, built on Paymenter's official default theme architecture.
- New `theme.php` settings: announcement bar, glow/shine toggle, grid background toggle, default appearance, footer text, Discord link, custom CSS field, and full light/dark color palette.
- Astra design system utilities added to `css/app.css`: card, gradient border, button shine, ambient glow background, grid pattern background, skeleton shimmer, status-dot pulse — all `prefers-reduced-motion` aware.
- Sora display font.
- Redesigned: navigation (sticky glass-on-scroll), footer, homepage hero + category cards, dashboard widgets, login/register/password-reset/verify-email.
- Fixed sitewide: undefined numbered Tailwind color-shade classes (`text-primary-100`, `bg-primary-800`, etc.) left over from before Paymenter's semantic color-token migration, remapped to the correct tokens.
- Unified border radius across cards/buttons/inputs to the 16–24px premium scale.
