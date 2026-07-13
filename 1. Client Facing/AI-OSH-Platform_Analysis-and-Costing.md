# AI Safety Council — Project Overview, Features & Costing

**Platform:** AI Safety Council — Certified AI Practitioner for Occupational Safety & Health (AI-OSH)
**What this document is:** A plain-language overview of what we're building, what it costs to build, what it costs to run each month, and how it grows.
**Date:** 01 July 2026

> **Money note:** All figures in Indian Rupees (₹). Where we use online tools priced in US dollars, we've converted at about ₹86 to $1. "Lakh" = ₹1,00,000. Taxes (like GST) are extra where they apply.

---

## 1. In Short

We're building the **AI Safety Council** — an online learning platform that teaches safety professionals how to use AI in their work. This is the first step of a bigger vision, but for now we're building a clean, professional platform where students take courses, complete tests, and earn a certificate.

A few deliberate choices make this platform feel exclusive and trustworthy:
- **No public sign-up.** Students can't register themselves. The admin creates each student's account and hands them their login. This keeps the course invitation-only and adds to its value.
- **No online payment.** Students pay the admin directly (offline). The admin then creates their account. This keeps things simple and makes the certificate feel earned, not just bought.
- **Protected content.** Videos and materials are locked down as much as is realistically possible, and every student's materials are watermarked with their name so leaks can be traced (more in Section 6).

**The headline numbers:**
- **To build it:** **₹1,20,000** (one-time). This does not include the monthly running costs. Full breakdown in Section 9.
- **To run it each month:** roughly **₹5,700–7,400**, and this barely changes as you grow from 100 students to 10,000 (Section 11).
- **How it's built:** in six clear phases, each ending in a milestone you can see and check. The exact schedule will be agreed together (Section 14).

---

## 2. Who It's For

**The students:** Safety professionals — Safety Officers, HSE Engineers and Managers, Consultants, Trainers, Auditors, and EHS Leaders. They want to learn AI skills that make their work faster and better, and earn a certificate that proves it.

**The admin (you / the course owner):** The person who runs everything — adds courses, creates student accounts, checks and grades submitted work, and hands out certificates.

---

## 3. What We're Building

**The public website (open to everyone):**
- A **home page** that explains why a safety professional should learn AI.
- An **About page** and a **Contact page** (with a form that emails you).

**The private learning area (only for logged-in students):**
- A personal dashboard showing the courses assigned to them and how far along they are.
- The course itself: short video lessons, reading notes, and downloadable worksheets.
- Two kinds of tests (Section 4).
- Their certificate, once earned.

**The admin control panel (only for you):**
- Add and edit courses, one at a time or in bulk.
- Create student accounts and assign courses to them.
- Review and grade submitted work.
- Upload and issue certificates.

**The design:** the look and feel is built from a **ready-made, professional HTML template customized to your branding** — a faster, lower-risk approach than designing every screen from scratch.

---

## 4. The Features, Explained Simply

**Course content.** Each course is made of sections ("modules"), and each module has several short lessons (8–15 minutes each). A lesson has a video, some reading notes, and worksheets to download.

**Two types of tests:**
1. **Multiple-choice quiz** — the student picks answers, and the system marks it instantly and shows the score.
2. **Upload-your-work test** — the student uploads a PDF (for example, a completed exercise). This goes to the admin to review and grade. **Importantly, the student does not have to wait** — they can keep going through the course while it's being graded.

**Certificates.** When a student finishes a course, the admin uploads their certificate. Within 24 hours the student gets it three ways: **by email**, **inside their dashboard** (to view and download), and a **"Share to LinkedIn"** button so they can add it to their profile.

**Adding course content in bulk.** Instead of typing every lesson in by hand, the admin can fill in a ready-made template, zip it up, and upload it once — and the whole course is built automatically. This is explained simply in Section 7.

---

## 5. How People Use It

**You (admin) set up a course:**
Fill in the course template → upload it → the system builds the whole course → you review a simple report and fix anything flagged → publish it.

**You (admin) enrol a student:**
Student pays you directly → you create their account → assign the course → they're emailed their login.

**A student takes a course:**
Log in → open their course → watch lessons (progress is saved automatically) → take the quiz (marked instantly) → upload their exercise (keep going, no waiting) → finish → certificate arrives within 24 hours → view it, download it, or share to LinkedIn.

---

## 6. Content Protection — What's Realistic

You asked for the platform to be fully protected from downloads and screenshots. Here's the honest picture, because it matters:

**The honest truth:** No website in the world can fully stop screenshots or screen recording — not Netflix, not Udemy. Screenshots are controlled by the viewer's own computer or phone, not by the website. Someone can always take a screen photo with a second phone. Anyone who promises "100% screenshot-proof" on a website isn't being straight with you.

**What we *will* do (and it's genuinely strong):**
- **Videos on a protected player (Vimeo)** — the video will only play on your website (it won't work if the link is copied elsewhere), and the download button is switched off.
- **Watermarking — the most important protection.** Every student's **name and email are faintly stamped across the videos and PDFs**. This doesn't stop a screenshot, but it means **any leaked screenshot or recording can be traced straight back to the person who leaked it.** This is the real deterrent, and it's how professional training platforms handle it.
- **Temporary secure links** — materials open through links that expire and are tied to the logged-in student, so a link can't simply be shared or saved.
- **Download and right-click switched off** across videos and notes.
- **Everything locked behind login** — nothing is visible unless a student is logged in and enrolled.

**Bottom line:** casual copying and sharing are blocked, and anyone who does manage to leak something is identifiable. That's the realistic, professional standard.

---

## 7. How Bulk Course Upload Works (in plain terms)

The concern with bulk upload is always the videos — they're huge, and trying to upload gigabytes of video in one go is what breaks. **So we keep the videos out of the upload entirely.** Everything else in a course (lesson titles, notes, worksheets) is tiny.

Here's the flow:
1. We give you a **ready-made template folder** shaped like a course — a folder for each module, a spot for the notes and worksheets in each lesson, and a simple list where you paste each lesson's **video link**.
2. You fill it in, zip it, and upload. Because there are no videos inside, it's only a few megabytes and **uploads in seconds**.
3. The system reads it and **builds the whole course automatically** — all modules, lessons, notes, worksheets, and video links in place.
4. It shows you a **plain report**, e.g. *"Built 8 modules, 40 lessons, 35 worksheets. 2 things to check: one lesson has no video link; one worksheet wasn't a PDF."*
5. You fix those couple of items by hand in the editor. Done.

The video links come from **Vimeo**: you upload each lesson's video to your Vimeo account, it gives you a link, and you paste that link into the template. Nothing is ever silently lost, and the manual editor is always there as a safety net.

---

## 8. How Big Is a Course? (a rough guide)

- A typical course is about **8 hours of video**, spread across roughly **40 short lessons**.
- **The videos live on Vimeo, not on your platform.** A full course's videos are about **6–8 GB** — and Vimeo's plan comfortably holds **many courses' worth** (well over 100 hours).
- **The documents** (notes + worksheets) that live on your own platform are **tiny — usually under 100 MB per course.**
- **The bulk-upload file** (no videos inside) is just **a few megabytes** — which is exactly why it uploads instantly and reliably.
- **Practical tip:** keep each video at normal quality (720p/1080p) so files stay reasonable, and keep worksheets as PDFs.

**In short:** your platform itself stays small and cheap to run because the heavy videos are handled by Vimeo.

---

## 9. What It Costs to Build — ₹1,20,000

We justify this three ways: the **work involved**, a **price per feature**, and a **comparison to the market**.

### 9.1 The work involved (two developers)

| Part of the work | Effort (working days) |
|---|---:|
| Setup and groundwork | 4 |
| Public website (Home / About / Contact) | 5 |
| Secure login for students and admin | 4 |
| Admin: build and edit courses by hand | 7 |
| Admin: bulk course upload | 6 |
| Student learning area (dashboard, lessons, progress) | 8 |
| The two test types (quiz + upload-and-grade) | 6 |
| Certificates (upload, email, LinkedIn, download) | 3 |
| Content protection (Vimeo, watermarking, secure links) | 4 |
| Creating student accounts and assigning courses | 2.5 |
| Testing, fixing, launch, and training you to use it | 5 |
| **Total** | **~54 working days** |

*(These are "one person, one full day" units of effort — a measure of the work involved, not a delivery schedule. The design is customized from a ready-made template, which keeps the website effort down. The schedule is agreed separately, Section 14.)*

### 9.2 Price per feature (adds up to ₹1,20,000)

| Deliverable | Price (₹) |
|---|---:|
| Setup and groundwork | 8,000 |
| Public website | 12,000 |
| Secure login | 12,000 |
| Admin course builder (by hand) | 16,000 |
| Bulk course upload | 14,000 |
| Student learning area | 18,000 |
| The two test types | 14,000 |
| Certificates | 8,000 |
| Content protection & watermarking | 8,000 |
| Student account management | 5,000 |
| Testing, launch, handover & training | 5,000 |
| **Total** | **1,20,000** |

### 9.3 Compared to the market

| If you hired… | It would typically cost |
|---|---|
| Freelance developers (per this much work) | **₹2,00,000 – ₹3,50,000** |
| A small development agency | **₹5,00,000 – ₹7,50,000** |
| **This project** | **₹1,20,000 (fixed)** — a fully-custom platform you own outright |

**In plain terms:** you're getting a custom-built platform that you fully own — no monthly "per student" fees to a course provider — for **less than half** of what the market normally charges.

---

## 10. Payment Schedule

The ₹1,20,000 is paid in four parts, each tied to a clear, visible milestone.

| # | When | What's done | Share | Amount (₹) |
|---|---|---|---:|---:|
| 1 | At the start | Project kicked off, access & materials shared | 30% | 36,000 |
| 2 | Milestone 3 done | Bulk upload works + student accounts working | 30% | 36,000 |
| 3 | Milestone 5 done | Both test types + certificates working | 25% | 30,000 |
| 4 | At launch | Live, tested, and handed over | 15% | 18,000 |
| | | **Total** | **100%** | **1,20,000** |

The monthly running costs (Section 11) are separate and paid to the service providers directly.

---

## 11. Monthly Running Cost

Once live, the platform runs on a handful of low-cost online services. Here's the monthly bill and — importantly — **why it barely grows as you add students.**

> **Please note:** all figures below are **rough estimates**. Actual bills depend on the exact plans chosen, usage, and any price changes by the service providers. Treat them as a reliable ballpark, not fixed quotes.

| What it's for | Service | Monthly (₹) |
|---|---|---:|
| Website hosting | Vercel | ~1,720 |
| Database + logins | Supabase | ~2,150 |
| File storage (notes, worksheets, certificates) | Cloudflare | ~10–120 |
| Video hosting + protection | Vimeo | ~1,700 |
| Sending emails | Email service | ₹0 (free at first) → ~1,720 |
| Website address (domain) | — | ~90 |
| **Total** | | **~₹5,700 – 7,400 / month** |

**Why it stays flat:** the heavy part (videos) sits on Vimeo for one flat fee, and your own platform only stores small documents. So going from 100 students to 10,000 barely moves the bill.

| Number of students | Monthly running cost |
|---|---:|
| Up to 1,000 | **~₹5,700** |
| 1,000 – 5,000 | **~₹6,500** |
| 5,000 – 10,000 | **~₹7,400** |

That's roughly **₹68,000 – ₹89,000 per year**, no matter how much you grow within that range.

---

## 12. As You Grow — What Changes

The monthly cost hardly moves, but the way you run things should mature a little as more students join:

| Stage | Students | Monthly cost | What to add at this stage |
|---|---|---:|---|
| **Launch** | up to 500 | ~₹5,700 | Just get going. Turn on automatic backups. |
| **Growing** | 500 – 1,000 | ~₹5,700 | Add a "test copy" of the site for safely trying changes; basic alerts if the site goes down. |
| **Scaling** | 1,000 – 5,000 | ~₹6,500 | Add automatic error alerts; upgrade the email plan for volume. |
| **Large** | 5,000 – 10,000 | ~₹7,400 | Give the database a small power boost for smooth performance. |
| **Very large** | 10,000+ | ~₹10,000+ | Add extra database capacity and closer monitoring. |

**The big picture:** going from 100 to 10,000 students only takes the bill from about ₹5,700 to ₹7,400 a month — a small increase for a hundred times the students. That's the advantage of how this is built.

---

## 13. After Launch — Support

**Free for the first 30 days:** we fix any bugs in what we delivered, at no charge.

**Optional maintenance (after that)** — pay monthly or yearly:

| Plan | Per month (₹) | Per year (₹) | What you get |
|---|---:|---:|---|
| **Basic** | 2,000 | 24,000 | Security updates, bug fixes, keeping an eye on uptime, email support, small tweaks (about 4 hours a month). |
| **Standard** | 3,500 | 42,000 | Everything in Basic, plus small improvements, priority support, and a monthly check-in (about 8 hours a month). |
| **One-off changes** | — | Quoted | New features billed per request, around ₹3,000–₹5,000 a day, or a fixed quote. |

*(The yearly rate works out slightly cheaper than paying month-to-month. These are rough estimates and can be adjusted to what you actually need.)*

---

## 14. Delivery Milestones

The build is delivered in six phases, each ending in a milestone you can log in and check. Three of these trigger a payment (Section 10). **The exact schedule will be agreed together separately** — this section is about the *order* and *what each milestone delivers*, not dates.

| Milestone | What's working by then | Payment |
|---|---|---|
| M1 | Groundwork + public website | — |
| M2 | Logins working + admin can build a course by hand | — |
| M3 | Bulk upload + student accounts | Payment 2 |
| M4 | Students can learn, with protected video | — |
| M5 | Both test types + certificates | Payment 3 |
| M6 | Tested, protected, and live | Payment 4 |

Each milestone is small and visible, so progress is always clear.

---

## 15. Assumptions & What's Not Included

**We're assuming:**
- Videos are hosted on Vimeo (paid plan); the platform stores only documents.
- About 3–4 courses to start, roughly 8 hours of video each.
- The monthly service costs are paid by you, directly to the providers.
- The visual design starts from a ready-made HTML template, customized to your branding (not designed screen-by-screen from scratch).

**Not included now (planned for later phases):**
- Community/discussion area, a shared prompt library, AI tools, a corporate-training portal, online payments, and a mobile app. The platform is built so these can be added later without starting over.

**Worth keeping in mind:**
- Bulk upload is the trickiest piece — a clear, agreed template keeps it reliable (Section 7).
- Emails need a properly set-up sender address so certificates don't land in spam.

---

## 16. Our Recommendations

1. **Go ahead with the platform as described** — it's a strong, professional foundation.
2. **Use Vimeo for video plus watermarking** — realistic, strong protection with little extra work.
3. **Budget about ₹5,700–7,400 a month** to run it, at any size up to 10,000 students.
4. **Pay across four milestones** tied to visible progress; the exact schedule is agreed separately.
5. **Keep the extra "ecosystem" features for later** to protect your time and budget now.
```
