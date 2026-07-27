# SEO / AEO / GEO — what's implemented & what to do next

This site is optimized for classic search (**SEO**), answer engines / featured snippets (**AEO**),
and AI / generative engines like ChatGPT, Perplexity, Google AI Overviews (**GEO**).

_Last updated: 2026-07-27 — 3-certification rebrand (AISP/AIRP/AIIP), Knowledge Centre section,
GA4 install, and a full metadata refresh._

## Domain
The live domain is set to **`https://www.aisafetycouncil.co.uk`** across every page's
canonical/OG tags, the JSON-LD, `sitemap.xml`, `robots.txt` and `llms.txt`, and the contact
email is `info@aisafetycouncil.co.uk`. If it ever changes, find-and-replace `aisafetycouncil.co.uk`.
The site currently deploys to `https://lumivoxads.github.io/Ai-Saftey-Council/` (GitHub Pages,
`dev` branch) — the real domain isn't wired up yet (no `CNAME` file, no DNS pointed at it).

> ⚠️ Address check: the HQ address in the footer + Organization schema still reads
> **San Bruno, CA, USA** (from the original mockup) while the domain is `.co.uk`. If the Council is
> UK-based, send the real UK address and update the footer + schema `addressCountry`.

Update `<lastmod>` dates in `sitemap.xml` when content changes.

## Analytics
**Google Analytics 4** (`G-9NPPCMDEBD`) is installed via `gtag.js` on all 20 pages, right before
`</head>`. Verify data is flowing in GA4 Realtime after the next deploy.

## Certifications (current: 3, not 5)
The Council rebranded from 5 certifications down to 3 shorter codes. Everywhere in the site,
structured data and `llms.txt` now reflect:
- **AISP®** — Certified AI Safety Professional
- **AIRP®** — Certified AI Risk Management Professional
- **AIIP®** — Certified AI Incident Investigator Professional

(CAIGP and CAI HSEP were removed entirely — do not reintroduce them without a client decision.)

## What's implemented

### Per page (all 20 pages)
- Unique `<title>` + meta description
- `<link rel="canonical">` — prevents duplicate-content penalties (all live pages except
  `index-full.html`, which is `noindex` and intentionally has none)
- `robots` meta (`index, follow, max-image-preview:large`)
- **Open Graph** tags (title, description, url, image 1200×630, site_name, locale) → rich cards on
  LinkedIn / Slack / WhatsApp / Facebook
- **Twitter Card** tags (`summary_large_image`)
- `theme-color`, favicon set, `apple-touch-icon`, PWA `manifest`
- **GA4** tag (`G-9NPPCMDEBD`)
- **JSON-LD structured data** (see below)

Title tags are kept under ~70 characters where possible for full SERP display (Google truncates
around 60 characters visually, though it isn't a ranking penalty).

### Structured data (JSON-LD `@graph`) — the biggest SEO/AEO/GEO lever
| Page | Schema types |
|------|--------------|
| index | Organization (+`sameAs`) · WebSite · WebPage · **ItemList** (3 certs) · **FAQPage** |
| courses | Organization (+`sameAs`) · CollectionPage · **ItemList** (3 Courses) · BreadcrumbList |
| course-details | Organization (+`sameAs`) · WebPage · **Course** (AISP, + Offer, CourseInstance) · BreadcrumbList |
| about | Organization (+`sameAs`) · AboutPage · BreadcrumbList |
| contact | Organization (+`sameAs`) · ContactPage · BreadcrumbList |
| news | Organization · CollectionPage · ItemList · BreadcrumbList |
| news articles (×3) | Organization · **NewsArticle** · BreadcrumbList |
| blog/insight (×2) | Organization · **BlogPosting** · BreadcrumbList |
| knowledge-*.html (×8) | Organization · WebPage · BreadcrumbList |

The `Organization` node carries name, logo, address, email, phone, `knowsAbout`, `contactPoint`
and now **`sameAs`** (Instagram/LinkedIn/Facebook) on the 5 pages that define the full entity
(index, courses, course-details, about, contact) — this is what powers Google's Knowledge Panel
and how AI engines describe and verify the entity.

### Site-wide files
- **`robots.txt`** — allows all search engines **and** explicitly welcomes AI crawlers (GPTBot,
  PerplexityBot, ClaudeBot, Google-Extended, Applebot-Extended, CCBot, Bingbot…) — points to the sitemap.
- **`sitemap.xml`** — all **19** indexable pages (11 original + 8 Knowledge Centre pages) with
  priorities and the OG image; `lastmod` bumped to 2026-07-27 across the board.
- **`llms.txt`** — the emerging GEO standard: a clean markdown brief of the org, its 3
  certifications, the Knowledge Centre, news/blog posts and social profiles, written for LLMs to
  read and cite accurately.
- **`site.webmanifest`** — installable PWA metadata.
- **`img/brand/og-image.png`** (1200×630) — branded social share card.
- Icons: `favicon-32.png`, `apple-touch-icon.png` (180), `icon-192.png`, `icon-512.png`.

### AEO / GEO content
- **FAQ section** on the homepage (visible accordion) mirrored by **FAQPage** schema — this is what
  gets pulled into Google's "People also ask", featured snippets and AI answer boxes.
- **Knowledge Centre** — 8-tile resource hub on the homepage, each tile linking to its own
  indexable page (`knowledge-*.html`). Currently structural placeholders; real content on these
  pages is the single biggest remaining AEO/GEO opportunity (see below).
- `index-full.html` is marked `noindex` (unlinked backup/reference copy, kept out of search).

## Go-live checklist (do these once the real domain is wired up)
1. Point `aisafetycouncil.co.uk` DNS at GitHub Pages and add a `CNAME` file to the repo (not done yet).
2. Verify the site in **Google Search Console** + **Bing Webmaster Tools**; submit `sitemap.xml`.
3. Test structured data: **Google Rich Results Test** + **Schema.org validator** (paste each URL).
4. Test the share card: **opengraph.xyz** or LinkedIn Post Inspector.
5. Confirm GA4 (`G-9NPPCMDEBD`) is receiving traffic in Realtime.
6. Prefer clean URLs (`/about` instead of `/about.html`) via host rewrites (Netlify/Cloudflare Pages)
   — update canonicals + sitemap to match if you do.
7. Off-page (biggest driver of "a lot of traffic"): earn backlinks, get listed in relevant
   directories/associations, publish articles targeting the certification keywords, and keep
   publishing to News/Blog (each post = a new indexable, citable page).

## News / Blog (each post is a standalone indexable, citable page)
- `news.html` — listing hub (nav + homepage "Latest News" teaser link here).
- 3 news articles grounded in real 2026 developments **with cited sources**: EU AI Act high-risk rules,
  ISO/IEC 42001 going mainstream, AI & predictive workplace safety.
- 2 insight/blog posts: "Why AI-Safety Certification Matters" and "Which certification is right for you".
- To publish more: copy an article file, update the head/canonical/JSON-LD date, add a `<url>` to
  `sitemap.xml`, a card to `news.html`, and a line to `llms.txt`. Fresh posts = fresh
  crawls and new keyword surface — the single best ongoing-traffic lever.

## Not done (needs real content / decisions)
- **Knowledge Centre pages are placeholders** — each has a unique title/description/breadcrumb but
  minimal body content ("this section is being developed"). Filling these in with real articles is
  the highest-leverage remaining SEO/AEO/GEO move: 8 more pages Google and AI engines can index,
  rank and cite on specific long-tail queries (e.g. "AI safety regulations guidelines", "AI
  incident investigation case studies").
- Real course pricing / dates in Course schema (currently placeholder £/$1,450 / 12 weeks).
- Confirm HQ address (US vs UK — see Domain note above).
- Custom domain not yet connected to GitHub Pages (see Domain note above).
