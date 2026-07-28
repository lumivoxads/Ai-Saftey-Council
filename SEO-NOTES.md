# SEO / AEO / GEO — what's implemented & what to do next

This site is optimized for classic search (**SEO**), answer engines / featured snippets (**AEO**),
and AI / generative engines like ChatGPT, Perplexity, Google AI Overviews (**GEO**).

_Last updated: 2026-07-28 — went live on Hostinger, switched the canonical domain from `www` to
the apex host, fixed the Search Console sitemap error, removed the unconfirmed HQ address, and
added the backlinks/citations plan below._

## Domain and hosting
The site is **live** at **`https://aisafetycouncil.co.uk`** (apex host, no `www`). It is hosted on
**Hostinger** and **auto-deploys from the `main` branch** — merging a PR into `main` publishes to
production within about fifteen seconds. Development happens on `dev`; open a PR from `dev` into
`main` to release.

The canonical host is the **apex domain** (`aisafetycouncil.co.uk`), not `www`. Every page's
canonical and Open Graph tags, the JSON-LD, `sitemap.xml`, `robots.txt` and `llms.txt` all use the
apex host, and the verified Google Search Console property matches it. The contact email is
`info@aisafetycouncil.co.uk`. If the domain ever changes, find-and-replace `aisafetycouncil.co.uk`
across all pages plus those four site-wide files.

> ⚠️ Both `aisafetycouncil.co.uk` and `www.aisafetycouncil.co.uk` currently answer with a 200 and
> neither redirects to the other, which is duplicate content. Add a 301 redirect from `www` to the
> apex host in the Hostinger panel. The canonical tags already point at the apex host, so this is a
> hosting-level fix with no code change needed.

Update `<lastmod>` dates in `sitemap.xml` when content changes.

### Search Console history (why the sitemap failed once)
Search Console reported **"Sitemap could not be read"** with zero discovered pages even though
`sitemap.xml` fetched fine as a browser and as Googlebot. The cause was a host mismatch: every
`<loc>` in the sitemap pointed at `www.aisafetycouncil.co.uk` while the verified property was the
apex domain. Google rejects a sitemap that lists URLs on a different host than the property.
Switching the whole site to the apex host and resubmitting fixed it — the sitemap now reads
**Success** with **19 pages discovered**. If this error ever reappears, check the property host
against the sitemap's `<loc>` host first.

## Analytics
**Google Analytics 4** (`G-9NPPCMDEBD`) is installed via `gtag.js` on all 20 pages, right before
`</head>`. Verify data is flowing in GA4 Realtime after the next deploy.

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
  indexable page (`knowledge-*.html`). These now carry **real written content** (roughly 330 words
  of body copy each), not placeholders. They are still thin for competitive long-tail queries, so
  expanding them remains a worthwhile on-page opportunity.
- `index-full.html` is marked `noindex` (unlinked backup/reference copy, kept out of search). It
  still contains the old San Bruno address; that is harmless because the page is not indexed and
  nothing links to it.

## Go-live checklist
1. ~~Wire up the custom domain~~ — **done.** Live on Hostinger at the apex host, auto-deploying
   from `main`.
2. ~~Verify in **Google Search Console** and submit `sitemap.xml`~~ — **done.** Property is the apex
   domain, sitemap status **Success**, 19 pages discovered on 2026-07-28. Indexing follows over the
   next several days; check progress with a `site:aisafetycouncil.co.uk` search.
3. **Bing Webmaster Tools** — in progress. Worth finishing because Bing's index also feeds Copilot
   and parts of Perplexity, which is separate GEO surface from Google.
4. Add the `www` → apex **301 redirect** in the Hostinger panel (see the Domain warning above).
5. Test structured data: **Google Rich Results Test** + **Schema.org validator** (paste each URL).
6. Test the share card: **opengraph.xyz** or LinkedIn Post Inspector.
7. Confirm GA4 (`G-9NPPCMDEBD`) is receiving traffic in Realtime.
8. Optional: prefer clean URLs (`/about` instead of `/about.html`) via Hostinger rewrites — update
   canonicals and the sitemap to match if you do.

## Backlinks and citations — the main remaining lever
The site's on-page SEO, AEO and GEO work is essentially complete. What it does not yet have is any
**external corroboration**: no other site on the web links to or mentions the AI Safety Council.
This matters more than any further on-page tuning, for two reasons. Google treats inbound links as
its primary trust and authority signal, and generative engines (ChatGPT search, Perplexity, Google
AI Overviews) weight cross-source corroboration far above a site's own structured data when
deciding whether to cite an organisation or describe it accurately. This is why a search for the
domain currently returns an AI Overview that confuses the Council with the UK AI Security Institute.

Avoid paid link schemes and link farms — Google penalises them and AI engines do not weight them.

### Tier 1 — free, fully within our control, roughly an afternoon of work
| Action | Why it works |
|---|---|
| Claim the **Google Business Profile** | The strongest single entity signal, and what powers a Knowledge Panel. Blocked until the real address is confirmed. |
| Complete the **LinkedIn** company page and include the website link | The site already claims LinkedIn in its JSON-LD `sameAs`; the reciprocal link is what makes that claim verifiable in both directions. |
| Add the website link to the **Instagram** and **Facebook** bios | Same reciprocal-verification logic; both are already listed in `sameAs`. |
| Create a **Crunchbase** organisation profile | Heavily scraped by AI engines and commonly present in LLM training and grounding data. |
| Create a **Wikidata** entry for the organisation | Disproportionately influential — it feeds Google's Knowledge Graph and most LLM grounding pipelines. |

### Tier 2 — directory listings (favour directories that actually vet their members)
| Type | Examples |
|---|---|
| Professional-body and certification directories | The CPD accreditation body's own member list; IOSH-adjacent directories |
| AI-governance ecosystem lists | AI governance and standards organisation directories; ISO/IEC 42001 practitioner lists |
| UK business registries | Companies House listing (if registered); relevant UK trade association directories |

### Tier 3 — earned links, the durable compounding one
The News and Blog section is already structured for this. The mechanism is to publish something
genuinely citable on a topic that journalists and other sites need a source for — for example a
short plain-English explainer on the EU AI Act high-risk deadlines aimed specifically at HSE
managers — so that other sites link to it as the reference. Every such post is simultaneously new
AEO surface and a new backlink target. This is a monthly publishing habit rather than a one-off
task, and it is what eventually drives sustained traffic.

## News / Blog (each post is a standalone indexable, citable page)
- `news.html` — listing hub (nav + homepage "Latest News" teaser link here).
- 3 news articles grounded in real 2026 developments **with cited sources**: EU AI Act high-risk rules,
  ISO/IEC 42001 going mainstream, AI & predictive workplace safety.
- 2 insight/blog posts: "Why AI-Safety Certification Matters" and "Which certification is right for you".
- To publish more: copy an article file, update the head/canonical/JSON-LD date, add a `<url>` to
  `sitemap.xml`, a card to `news.html`, and a line to `llms.txt`. Fresh posts = fresh
  crawls and new keyword surface — the single best ongoing-traffic lever.

## Open items (blocked on client decisions or in progress)

### Waiting on confirmation from the client
- **HQ address — removed from the site for now.** The San Bruno, California address was placeholder
  copy inherited from the original mockup and was inconsistent with a `.co.uk` domain, so on
  2026-07-28 it was stripped from every page footer, from the contact page's "Get in touch" block,
  and from the `PostalAddress` node in the Organization JSON-LD. Footers still show the
  organisation name and contact email. Once the real address is confirmed, restore it in all three
  places and set `addressCountry` correctly. This also unblocks claiming the Google Business Profile.
- **Course pricing and dates.** The Course schema and course pages still carry placeholder figures
  (£/$1,450 over 12 weeks). This is worth treating as urgent-once-known, because any AI engine that
  cites the site will repeat the fake number as fact.

### In progress
- **Bing Webmaster Tools** verification and sitemap submission.

### Worthwhile but not blocking
- **Expand the Knowledge Centre pages.** They have real content now, but at roughly 330 words each
  they are thin for competitive long-tail queries such as "AI safety regulations guidelines" or "AI
  incident investigation case studies". Longer, more substantial articles on these eight pages are
  the best remaining on-page move.
- **Backlinks and citations** — see the dedicated section above. This is the single highest-leverage
  remaining item overall, and it is off-page work rather than a code change.
- **`www` → apex 301 redirect** in the Hostinger panel (see the Domain warning above).
