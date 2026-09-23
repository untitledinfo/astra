# Astra — Premium Gaming Theme for Paymenter

A dark-first, gaming-focused theme for [Paymenter](https://paymenter.org), built on Paymenter's real theme architecture (Blade + Tailwind CSS v4 + Vite). Created for **Firepdx**.

> **Honest scope note:** Paymenter theming works by overriding the *frontend* (Blade views, CSS, JS) that ships in `themes/default`. Astra restyles the full customer-facing experience — navigation, home, dashboard, auth, and shared components (buttons, cards, forms) — using Paymenter's real routes, Livewire components and data. It does **not** modify Paymenter's backend logic, payment processing, or admin business logic, and it doesn't fabricate data that Paymenter doesn't provide (no fake stats, fake invoices, etc.), per Paymenter's own architecture. A few deeper pages (e.g. full ticket thread UI, invoice tables) inherit Astra's global design tokens (colors, radius, cards, buttons) automatically but haven't each been hand-redesigned pixel-by-pixel yet — see "What's next" below.

## Requirements

Match whatever your installed Paymenter instance requires (check `composer.json` / the Paymenter docs for your version):
- PHP (per your Paymenter release's `composer.json`)
- Node.js 18+ and npm
- Composer
- A working Paymenter installation (web server + database already configured)

## Installation

1. **Back up first** — back up your Paymenter files and database before installing any theme.
2. Copy this `astra/` folder into your Paymenter installation at:
   ```
   /var/www/paymenter/themes/astra
   ```
3. Install and build frontend assets from your Paymenter root:
   ```bash
   cd /var/www/paymenter
   npm install
   npm run build astra
   ```
   This is Paymenter's documented per-theme build command (see `paymenter.org/development/theme/assets`).
4. Clear caches:
   ```bash
   php artisan optimize:clear
   ```
5. **Activate the theme:** log in to your Paymenter **Admin Panel → Settings**, and set the site theme to `astra`. (Paymenter stores the active theme in `config('settings.theme')`, set from this admin settings screen — there is no documented CLI-only command to switch themes, so use the admin UI.)
6. Reload your storefront and confirm Astra loads. Test login, the homepage, dashboard, and checkout end to end before relying on it in production.

## Configuring Astra

Once active, **Admin Panel → Settings → Theme** exposes Astra's settings (defined in `theme.php`):

- **Branding:** logo display mode, home page markdown text, footer text, Discord link
- **Announcement bar:** enable/disable, text, optional link
- **Effects:** glow/shine toggle, grid background toggle, default appearance (dark/light/system)
- **Colors:** full light-mode and dark-mode palettes (primary, secondary, neutral, base, muted, inverted, background, background-secondary) — dark mode is Astra's primary designed experience
- **Custom CSS:** a safe textarea injected at the end of `<head>`, so you can tweak further without editing theme files (keeps you update-safe)

## Design system

- Tailwind CSS v4 semantic tokens (`primary`, `secondary`, `neutral`, `base`, `muted`, `background`, `background-secondary`) drive every color — configurable from the admin panel, no hard-coded hex values in the markup.
- `Sora` display font, 16–24px card radius, subtle glow/shine utilities (`astra-card`, `astra-gradient-border`, `astra-shine`, `astra-glow-field`, `astra-skeleton`) defined in `css/app.css`.
- All decorative animation respects `prefers-reduced-motion` automatically.
- Fixed a real upstream issue in Paymenter's default theme where several inner pages referenced undefined numbered color shades (e.g. `text-primary-100`, `bg-primary-800`) that don't resolve under Tailwind v4's single-value semantic tokens — these were mapped onto the proper `base` / `muted` / `background-secondary` tokens sitewide so text and backgrounds render correctly everywhere, not just on the pages Astra redesigned directly.

## What's redesigned in this pass

Navigation & footer, homepage (hero + category cards), client dashboard widgets, login/register/password-reset/verify-email auth cards, and the shared button/card/form component classes used across the whole app (so ticket, invoice, and service pages already inherit Astra's colors, radius and card styling even though their layouts haven't been individually rebuilt yet).

## What's next (not yet hand-redesigned page-by-page)

Product/checkout flow layout, service details page, invoices table, and the full ticket-thread UI are functionally intact and inherit Astra's design tokens, but haven't each had a bespoke layout pass. Safe next step: redesign one Blade view at a time under `views/`, keeping the existing Livewire bindings and route calls untouched — happy to keep going on any of these.

## Rollback

If something looks wrong: **Admin Panel → Settings**, switch the theme back to `default`, then `php artisan optimize:clear`. Your data is never touched by a theme — only presentation.

## Credits

Theme by **Firepdx**. Built on the official Paymenter theme architecture — Paymenter is free/open-source software; this theme does not remove or alter Paymenter's own attribution link in the footer.
