# AI Safety Council — Static Website (Phase 1)

Static HTML marketing site, **repurposed from the Educrat HTML template** (Creativelayers) and
re-skinned to the AI Safety Council brand. This is Phase 1; Phase 2/3 ports these pages into the
React (Vite) `apps/web` app described in the Technical Build Spec (adding the student portal + admin panel).

## Pages
| File | Purpose | Content status |
|------|---------|----------------|
| `index.html` | Home — **live version, only working links** (no dead `#` links) | Real |
| `index-full.html` | The earlier full home page, kept for reference (has all placeholder nav/links) | Reference only |
| `about.html` | About the Council | Real (institutional copy) |
| `contact.html` | Contact form + info + map panel | Real (HQ from mockup); form is non-wired |
| `courses.html` | Certification Programs listing (5 programs + 1 "coming soon") | Real cards, placeholder pricing/registration |
| `course-details.html` | CAISP® programme detail (overview, syllabus, enrol sidebar) | **Placeholder** content |

**Links policy (current):** every page links only to the 5 real pages + the in-page `#verify` anchor +
the `mailto:` address. Nav is trimmed to **Certification Programs · About · Contact**; the top bar is
**Verify Credential · Contact**; the footer is the lean 3-column variant. Secondary nav
(Standards, Resources, Corporate, News, Member Login, socials, Privacy/Terms) and the resource/handbook
download links were removed until those pages/assets exist — re-add from `index-full.html` when ready.

## Brand palette (pulled from the logo)
| Token | Hex | Use |
|-------|-----|-----|
| Navy | `#0A2A3F` | ink, dark sections, header/footer |
| Navy deep | `#06202F` | top bar, footer bottom |
| Teal (core) | `#12A090` | primary brand — logo globe |
| Teal deep | `#0E7C74` | globe shadow / icon fills |
| Teal bright | `#1FC8B4` | globe highlight / accents on dark |
| Gold | `#C7A24E` | CTAs & accent links (from mockup — **not** in the logo) |
| Paper | `#F6F8FA` | page background |
| Ink / Muted | `#1E2E38` / `#5B6B75` | body / secondary text |

Fonts: **Lora** (serif headings) + **DM Sans** (sans body/UI), loaded from Google Fonts.

## Structure
```
website/
├── *.html                     # the 5 pages (header/footer duplicated per page — no build step)
├── css/
│   ├── vendors.css main.css   # Educrat base framework (grid, reset, utilities) — repurposed
│   └── asc-theme.css          # ← ALL AI Safety Council branding + components lives here
├── js/
│   ├── vendors.js main.js     # Educrat JS (available; not loaded on these custom pages)
│   └── asc.js                 # mobile nav + verify tabs + syllabus accordion
├── img/brand/                 # logo.png (trimmed), logo-white.png (footer), logo-icon.png (globe/favicon)
├── img/…                      # Educrat imagery retained for reference
└── vendor/                    # font-awesome / leaflet / choices / chart (localized, optional)
```

## Key implementation notes
- **All icons are inline SVG.** Educrat's `icomoon` + Font Awesome webfonts did NOT survive the
  HTTrack mirror, so the theme uses hand-placed SVGs instead (cleaner + zero font dependency).
- **Educrat's `main.css` has `a { color: inherit !important }`** which strips explicit link/button
  colors. The override block at the bottom of `asc-theme.css` restores brand colors with matching
  `!important`. Keep new colored links/buttons consistent with that pattern.
- Header + footer are **duplicated in each HTML file** (static, no includes). Edit all pages when
  changing shared chrome — or factor into includes once this moves to React.
- The contact form, verify box, and enrol buttons are **UI-only** (no backend) — wired up in Phase 2.

## Run locally
```
cd website && python3 -m http.server 8000   # then open http://localhost:8000
```

## What's placeholder (to finalize with the team)
- Course-details syllabus, pricing ($1,450), CPD credits, prerequisites, validity.
- The "CAIF® — Coming Soon" foundation program on the courses page.
- News items, resource PDFs, and all secondary nav dropdowns (currently `#`).
