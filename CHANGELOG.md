# Changelog

## 2.6.0
- Redesigned the notification/toast system — proper success/danger colors (was hardcoded red-500), an icon, slide-in motion, instead of a plain colored box.
- Redesigned the confirmation modal (used for cancel/delete confirmations app-wide) — gradient border, blurred backdrop, cleaner spacing.
- Fixed the danger button: was hardcoded `red-700`/`rounded` regardless of theme colors — now uses the real danger token and matches the site-wide corner radius.

## 2.5.0
- Real flag images (via flagcdn) in the language switcher, replacing emoji — crisp and consistent across every OS/browser instead of relying on emoji font support. Built as its own dropdown so it's no longer limited to plain-text options.
- Category, product and service images bumped to a softer `rounded-2xl` corner, matching the card system.
- Page header icon badges (Services/Invoices/Tickets) now have a subtle pulsing ring for more visual presence.

## 2.4.0 — remaining pages done
- Checkout page: main product panel is now a card, order summary is a sticky beam-card, checkout button spans full width with the arrow-slide.
- 2FA screen upgraded to the gradient-border card, bigger/clearer code boxes, fixed a hardcoded red error color.
- Service cancel warning box, service upgrade page (plan cards + sticky summary), and ticket-create page all restyled to match.
- More hardcoded-color bugs fixed along the way (`orange-700`, `gray-100/800`, `red-500/600` scattered across cancel/upgrade/ticket-create) — all now use the theme's real tokens.
- Every page in the theme now uses the same design system. Only thing left untouched by choice: Paymenter's own admin panel, which themes don't control.

## 2.3.0 — full pass
- Styled every remaining major customer-facing page with the v2 design system (cards, border-beam, page headers, reveal-on-scroll): Services (list + detail), Invoices (list + detail), Products/category browsing + single product page, Cart, and both error pages (404/500).
- Language switcher now shows a country flag next to each language.
- Fixed several more hardcoded colors that ignored the theme's palette (stray `gray-900`/`green-500`/`yellow-500`/`red-600` classes on invoices and services pages) — replaced with the proper success/warning/danger/base tokens so they respect whatever colors are set in theme settings and stay readable in both light and dark mode.
- Still on the base Paymenter styling (not yet redesigned): checkout form, 2FA screen, and the service cancel/upgrade modals — all fully functional, just not restyled yet.

## 2.2.0
- New reusable page-header component (matching the v2 look) — now used on Tickets, alongside the earlier Services/Invoices.
- Redesigned Support Tickets pages: ticket list now uses gaming-style cards with a border-beam hover, cleaner status pills, and a page header; the conversation view got a restyled header, message bubbles, and a consolidated "Ticket details" card — all the upload/attachment/close-ticket functionality is untouched.
- Hero is now a contained, bordered card with its own glow shadow and spotlight, instead of a full-bleed banner.
- "Why choose us" got a fuller header treatment (eyebrow tag + subtitle).
- New: optional custom background image (URL + opacity + blur, in theme settings) — when set, it replaces the animated aurora/grid automatically.
- New: optional centered navbar logo toggle.
- Nav is now translucent (50% background opacity + blur) by default, slightly less transparent once scrolled, for a proper glass-header feel.

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
