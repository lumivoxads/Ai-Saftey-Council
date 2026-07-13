# SEO / AEO / GEO — what's implemented & what to do next

This site is optimized for classic search (**SEO**), answer engines / featured snippets (**AEO**),
and AI / generative engines like ChatGPT, Perplexity, Google AI Overviews (**GEO**).

## Domain
The live domain is set to **`https://www.aisafetycouncil.co.uk`** across every page's
canonical/OG tags, the JSON-LD, `sitemap.xml`, `robots.txt` and `llms.txt`, and the contact
email is `info@aisafetycouncil.co.uk`. If it ever changes, find-and-replace `aisafetycouncil.co.uk`.

> ⚠️ Address check: the HQ address in the footer + Organization schema still reads
> **San Bruno, CA, USA** (from the original mockup) while the domain is `.co.uk`. If the Council is
> UK-based, send the real UK address and I'll update the footer + schema `addressCountry`.

Update `<lastmod>` dates in `sitemap.xml` when content changes.

## What was added

### Per page (`index`, `courses`, `course-details`, `about`, `contact`)
- Unique `<title>` + meta description (already had these)
- `<link rel="canonical">` — prevents duplicate-content penalties
- `robots` meta (`index, follow, max-image-preview:large`)
- **Open Graph** tags (title, description, url, image 1200×630, site_name, locale) → rich cards on
  LinkedIn / Slack / WhatsApp / Facebook
- **Twitter Card** tags (`summary_large_image`)
- `theme-color`, favicon set, `apple-touch-icon`, PWA `manifest`
- **JSON-LD structured data** (see below)

### Structured data (JSON-LD `@graph`) — the biggest SEO/AEO/GEO lever
| Page | Schema types |
|------|--------------|
| index | Organization · WebSite · WebPage · **ItemList** (5 certs) · **FAQPage** |
| courses | Organization · CollectionPage · **ItemList** (5 Courses) · BreadcrumbList |
| course-details | Organization · WebPage · **Course** (+ Offer, CourseInstance) · BreadcrumbList |
| about | Organization · AboutPage · BreadcrumbList |
| contact | Organization · ContactPage · BreadcrumbList |
| news | Organization · CollectionPage · ItemList · BreadcrumbList |
| news articles (×3) | Organization · **NewsArticle** · BreadcrumbList |
| blog/insight (×2) | Organization · **BlogPosting** · BreadcrumbList |

The `Organization` node carries name, logo, address, email, phone, `knowsAbout`, `contactPoint` —
this is what powers Google Knowledge Panel and how AI engines describe the entity.

### Site-wide files
- **`robots.txt`** — allows all search engines **and** explicitly welcomes AI crawlers (GPTBot,
  PerplexityBot, ClaudeBot, Google-Extended, Applebot-Extended, CCBot, Bingbot…) — points to the sitemap.
- **`sitemap.xml`** — all 5 indexable pages with priorities + the OG image.
- **`llms.txt`** — the emerging GEO standard: a clean markdown brief of the org, its certifications
  and pages, written for LLMs to read and cite accurately.
- **`site.webmanifest`** — installable PWA metadata.
- **`img/brand/og-image.png`** (1200×630) — branded social share card.
- Icons: `favicon-32.png`, `apple-touch-icon.png` (180), `icon-192.png`, `icon-512.png`.

### AEO / GEO content
- **FAQ section** on the homepage (visible accordion) mirrored by **FAQPage** schema — this is what
  gets pulled into Google's "People also ask", featured snippets and AI answer boxes.
- `index-full.html` is marked `noindex` (backup copy, kept out of search).

## Go-live checklist (do these after deploying to the real domain)
1. Set the real domain (find-replace, above) and deploy over **HTTPS**.
2. Verify the site in **Google Search Console** + **Bing Webmaster Tools**; submit `sitemap.xml`.
3. Test structured data: **Google Rich Results Test** + **Schema.org validator** (paste each URL).
4. Test the share card: **opengraph.xyz** or LinkedIn Post Inspector.
5. Add analytics (GA4 / Plausible) — snippet goes before `</head>` on every page.
6. Prefer clean URLs (`/about` instead of `/about.html`) via host rewrites (Netlify/Cloudflare Pages)
   — update canonicals + sitemap to match if you do.
7. Off-page (biggest driver of "a lot of traffic"): earn backlinks, get listed in relevant
   directories/associations, publish articles targeting the certification keywords, and create a
   real **News/Blog** section (each post = a new indexable, citable page).

## News / Blog (added — each post is a standalone indexable, citable page)
- `news.html` — listing hub (nav + homepage "Latest News" teaser link here).
- 3 news articles grounded in real 2026 developments **with cited sources**: EU AI Act high-risk rules,
  ISO/IEC 42001 going mainstream, AI & predictive workplace safety.
- 2 insight/blog posts: "Why AI-Safety Certification Matters" and "Which certification is right for you".
- To publish more: copy an article file, update the head/canonical/JSON-LD date, add a `<url>` to
  `sitemap.xml`, a card to `news.html`, and (optionally) a line to `llms.txt`. Fresh posts = fresh
  crawls and new keyword surface — the single best ongoing-traffic lever.

## Not done (needs real data / decisions)
- Social profile URLs (`sameAs` in Organization + the top-bar icons) — add when the accounts exist.
- Real course pricing / dates in Course schema (currently placeholder £/$1,450 / 12 weeks).
- Confirm HQ address (US vs UK — see Domain note above).
