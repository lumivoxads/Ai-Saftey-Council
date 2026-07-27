---
name: news-refresh
description: Research recent AI-safety/governance/regulation developments and draft one new News & Insights article for the AI Safety Council website, matching the site's existing template exactly. Use when the user asks to "refresh the news", "fetch the latest news", "add a news article", "update News & Insights", or runs /news-refresh. Drafts only — never commits or pushes automatically.
---

# News & Insights refresh

Researches one genuinely new, relevant story and drafts a full news article page for
this site, in the site's own house style. **Always draft-for-review — never commit or
push automatically.** Stop and hand the draft back to the user for approval.

## Step 1 — Know what's already covered

Read `news.html`, `sitemap.xml`, and `llms.txt` to build a list of existing article
slugs and topics. Do not duplicate a story or angle already published.

Current beat: AI safety regulation (EU AI Act, US/UK equivalents), AI governance
standards (ISO/IEC 42001 and peers), workplace/occupational AI risk management, AI
incident investigation, and anything that touches the three certifications this site
sells — AISP (Certified AI Safety Professional), AIRP (Certified AI Risk Management
Professional), AIIP (Certified AI Incident Investigator Professional).

## Step 2 — Research

Use WebSearch / firecrawl-search (whichever is available) to find developments from
roughly the **last 60 days** relative to today's date. Prioritize:
- Regulators, standards bodies, and government sources (EU Commission, ISO, NIST,
  HSE, OSHA, national AI offices)
- Major law firm or Big 4 analysis of a specific regulatory change
- Credible industry reporting on a concrete event (a new standard published, an
  enforcement deadline, a governance/incident case study)

Avoid: generic "AI trends" listicles, vendor marketing content, anything you can't
cite a real, checkable source for. Every factual claim in the article needs a source
you actually found — do not invent statistics, dates, or quotes.

Pick **one** story. Depth over breadth — one well-sourced article beats three thin ones.

## Step 3 — Write the article

Use `news-eu-ai-act.html` in the repo root as the exact template to copy structurally
(head block, topbar, header/nav, mobile drawer, footer are all copy-paste identical
across every page in this site — don't improvise a different shell).

Pick a slug: `news-<short-topic>.html` (kebab-case, matches the existing pattern:
`news-eu-ai-act.html`, `news-iso-42001.html`, `news-predictive-safety.html`).

Fill in, all consistent with each other (same headline/description text reused
verbatim across every field, not paraphrased differently each time):
- `<title>`: `{Headline} | AI Safety Council` — keep under ~70 characters
- Meta description: under ~160 characters, one sentence, states the news + why it
  matters to AI-safety professionals
- Canonical URL, OG tags (title/description/url, `og:type="article"`,
  `article:published_time` = today's date, `article:section="News"`), Twitter Card
- JSON-LD `@graph`: `Organization` stub (copy verbatim from the template) +
  `NewsArticle` (headline, description, image, datePublished/dateModified = today,
  author/publisher = Organization `@id`, mainEntityOfPage, articleSection="News",
  keywords, isPartOf) + `BreadcrumbList` (Home → News → this article)
- GA4 snippet — copy verbatim from any existing page (`G-9NPPCMDEBD`)
- Article body: H1 = full headline, meta line (category badge, publish date, reading
  time estimate), then 500–700 words with 2–4 `<h2>` sections. Tie the piece back to
  why certified competence (AISP/AIRP/AIIP) matters for this specific development —
  that's the article's job, not just reporting the news in a vacuum
- A `.asc-sources` block at the end with real links to everything cited
- The standard closing `.asc-article__cta` block (copy verbatim — "Validate your
  AI-safety competence" / Explore Certifications button)

## Step 4 — Wire it into the site

1. **`news.html`**: add a new `.asc-blog-card` to the top of `.asc-blog-grid` (newest
   first), matching the existing card markup exactly (banner icon + category + date +
   headline + 1–2 sentence teaser + "Read More" link). Also add a matching `ListItem`
   to the page's `ItemList` JSON-LD.
2. **`sitemap.xml`**: add a `<url>` entry, `changefreq=monthly`, `priority=0.7`,
   `lastmod` = today.
3. **`llms.txt`**: add a line under "Latest news & insights" in the same
   `[Title](url): one-line description` format as the existing entries.

## Step 5 — Validate before handing back

Run the same checks the rest of this repo's history uses:
- Every `<script type="application/ld+json">` block on the new page and on the
  edited `news.html`/`sitemap.xml` parses as valid JSON/XML
- No broken internal `href="*.html"` links
- Title/meta description length within the limits above
- Every `<img>` has `alt`, exactly one `<h1>` on the new page

## Step 6 — Stop and hand back

**Do not run `git add`/`commit`/`push`.** Summarize for the user: the headline, the
slug/URL, a one-paragraph gist, and the sources cited. Let them read the actual file
before it goes anywhere near the live site — this is unreviewed AI-drafted content
about regulatory/legal topics, and factual errors here are a real reputational risk
for a certification body. Wait for explicit approval before any commit.
