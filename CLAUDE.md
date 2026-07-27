# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

Daniel García's personal portfolio site — a single-page Next.js (App Router) site at `src/app/page.js`, built on shadcn/ui + Tailwind v4.

## Commands

```bash
yarn dev      # start dev server (next dev --turbopack)
yarn build    # production build
yarn start    # serve production build
yarn lint     # next lint
```

There is no test suite in this repo.

## Architecture

### Module layout (not the default Next.js layout)

Code lives under `src/modules/`, grouped by ownership rather than by type:

- `src/modules/core/` — framework-agnostic building blocks: hooks, helpers, providers, services, shared components (`components/`, `css/`, `helpers/`, `hooks/`, `providers/`, `services/`).
- `src/modules/main/` — components specific to this portfolio's UI (`logo.jsx`, `section.jsx`, `dark-mode-toggle.jsx`).
- `src/modules/shadcn/` — shadcn/ui primitives under `ui/`.

`src/app/` holds only Next.js routing: `layout.js`, `page.js`, `not-found.js`, and route handlers (`avatare/route.js`, `time/route.js`). Note `src/modules/core/components/root-layout.jsx` exists but is not wired into `src/app/layout.js` — `layout.js` composes `Providers` directly.

Path alias: `@/*` maps to `./src/*` (see `jsconfig.json`). shadcn CLI aliases (`components.json`) point `ui` → `@/modules/shadcn/ui`, `utils` → `@/modules/core/helpers/utils` — use `npx shadcn add` to pull new primitives rather than hand-writing them, so they land in the right module.

### Provider stack

`src/modules/core/providers/providers.jsx` composes, in order: `NuqsAdapter` → `TrackersProvider` → `QueryClientProvider` (TanStack Query) → `DarkModeProvider` → `FontsProvider`. Dark mode state lives in `useDarkMode` (backed by `useSettings`, see below) and is applied by toggling a class name on `<body>` via `useDocumentClassNames`.

### Settings persistence pattern

`useSettings` (single key) and `useSettingsList` (multiple keys) in `src/modules/core/hooks/` both persist to `localStorage` and broadcast changes via a `BroadcastChannel('settings')` so state stays in sync across tabs. Any new persisted UI preference should follow this same pattern rather than introducing a new mechanism.

### Geolocation-aware "avatar of the day" and time

- `src/app/avatare/route.js` serves a PNG avatar from `public/img/avatares/`, chosen by `buildConditionalAvatar()` based on the visitor's *geolocated* local date/time (holidays, night mode, birthdays, etc.), not server time.
- `src/app/time/route.js` returns both server time and the visitor's geolocated time as JSON, for debugging/comparison.
- Both derive geolocation from `getGeolocatedDate()` in `src/modules/core/services/time.js`, which calls `ipinfo.io` with the request's `x-forwarded-for` IP and `NEXT_PUBLIC_IPINFO_TOKEN`, falling back to `America/Mexico_City`.
- Date-based conditions (holidays, seasons, night hours) live in `src/app/avatare/rules.js` as small pure predicates (`isXmasSeason`, `isNight`, `isMay4th`, etc.) — add new "special occasion" avatars by adding a predicate here and a corresponding entry in `buildConditionalAvatar()`'s map in `route.js`.

### Analytics

`umami` (from `@umami/node`) is initialized once in `src/modules/core/services/umami.js` using `NEXT_PUBLIC_UMAMI_WEBSITE_ID` / `NEXT_PUBLIC_UMAMI_WEBSITE_HOST_URL`. Page views are tracked automatically by `TrackersProvider` on route change; custom events (e.g. resume downloads, social link clicks) are tracked by wrapping a single child element in the `<TrackClick name="..." data={{...}}>` component, which clones the child and attaches an `onClick` tracker.

### Styling

Tailwind v4 config lives inline in `src/app/globals.css` (no `tailwind.config.js`). Additional CSS is split into `src/modules/core/css/` (`animations.css`, `fonts.css`, `shadcn.css`, `utils.css`) and imported from there. The `Section` component (`src/modules/main/components/section.jsx`) is the standard page-section wrapper (centered `w-main` column with dashed vertical borders) — reuse it for new homepage sections instead of duplicating its markup.

## Working conventions

- 4-space indentation, single quotes, trailing commas — follow existing formatting (Prettier-style) exactly; there's no separate lint config beyond `next lint`.
- Env vars are all `NEXT_PUBLIC_*` (see `.env`): `NEXT_PUBLIC_UMAMI_WEBSITE_ID`, `NEXT_PUBLIC_UMAMI_WEBSITE_HOST_URL`, `NEXT_PUBLIC_IPINFO_TOKEN`.
