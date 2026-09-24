# Changelog

## 2.1.0
- New homepage sections (each with its own on/off toggle in theme settings): a "Why choose us" bento features grid (admin-editable titles/text), a live stats strip (real customer + active-service counts, no fake numbers), and an FAQ accordion (4 admin-editable Q&A pairs).
- Category cards on the homepage now show a real plan-count badge pulled from your actual products.
- All new sections use the existing card-beam, shimmer-text and reveal-on-scroll system from v2, so they match the rest of the theme automatically.

## 2.0.0
- New look: replaced the static glow orbs with a drifting three-tone aurora background and a slow-drifting grid, so the page feels alive even before you scroll.
- New: mouse-follow spotlight glow behind the homepage hero headline.
- New: rotating gradient border-beam on hover for cards (`astra-card-beam`) — homepage category cards and dashboard widgets now use it instead of the flat v1 border/shadow glow.
- New: shimmering animated gradient on the hero headline (`astra-shimmer-text`), an eyebrow status pill above it, and CTA buttons with a sliding arrow icon on hover.
- New: subtle gradient accent line under the nav bar and a soft glow on the logo.
- All new motion respects `prefers-reduced-motion`, same as v1.

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
