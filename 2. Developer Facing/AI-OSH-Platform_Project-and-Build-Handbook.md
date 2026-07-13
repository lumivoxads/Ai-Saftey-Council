# AI Safety Council — Project & Build Handbook

**Platform:** AI Safety Council — Certified AI Practitioner for Occupational Safety & Health (AI-OSH)
**What this is:** One combined reference for the team building the platform — the project overview, the features, and the full build plan in a single document.
**Date:** 01 July 2026

> **Money note:** Only the ongoing monthly running costs are covered here (the services the live platform needs). All figures are in Indian Rupees (₹), converted from US-dollar service prices at about ₹86 to $1, and are **rough estimates**.

---

## 1. In Short

We're building the **AI Safety Council** — an online learning platform that teaches safety professionals how to use AI in their work. Students take courses, complete tests, and earn a certificate.

A few deliberate choices make the platform feel exclusive and trustworthy:
- **No public sign-up.** Students can't register themselves. The admin creates each student's account and hands them their login — keeping it invitation-only.
- **No online payment.** Students pay the admin directly (offline); the admin then creates their account. Simple, and it makes the certificate feel earned.
- **Protected content.** Videos and materials are locked down as much as is realistically possible, and each student's materials are watermarked with their name so leaks can be traced (Section 6).

**Key points:**
- **How it's built:** in six clear phases, each ending in a milestone you can see and check.
- **The design:** built from a ready-made, professional HTML template customized to the branding — not designed from scratch.
- **To run it each month:** roughly **₹5,700–7,400**, and this barely changes as you grow from 100 students to 10,000 (Section 10).

---

## 2. Who It's For

**The students:** Safety professionals — Safety Officers, HSE Engineers and Managers, Consultants, Trainers, Auditors, and EHS Leaders. They want AI skills that make their work faster and better, plus a certificate that proves it.

**The admin (course owner):** Runs everything — adds courses, creates student accounts, checks and grades submitted work, and hands out certificates.

---

## 3. What We're Building

**The public website (open to everyone):**
- A **home page** explaining why a safety professional should learn AI.
- An **About page** and a **Contact page** (with a form that emails the admin).

**The private learning area (only for logged-in students):**
- A personal dashboard showing assigned courses and progress.
- The course itself: short video lessons, reading notes, downloadable worksheets.
- Two kinds of tests (Section 4).
- Their certificate, once earned.

**The admin control panel (only for the admin):**
- Add and edit courses, one at a time or in bulk.
- Create student accounts and assign courses.
- Review and grade submitted work.
- Upload and issue certificates.

**The design:** the look and feel is built from a **ready-made, professional HTML template customized to the branding** — a faster, lower-risk approach than designing every screen from scratch.

---

## 4. The Features, Explained Simply

**Course content.** Each course has sections ("modules"), and each module has several short lessons (8–15 minutes). A lesson has a video, reading notes, and worksheets to download.

**Two types of tests:**
1. **Multiple-choice quiz** — the student picks answers; the system marks it instantly and shows the score.
2. **Upload-your-work test** — the student uploads a PDF; it goes to the admin to review and grade. **The student does not wait** — they can keep going while it's being graded.

**Certificates.** When a student finishes a course, the admin uploads their certificate. Within 24 hours the student gets it three ways: **by email**, **inside their dashboard** (to view/download), and a **"Share to LinkedIn"** button.

**Adding course content in bulk.** Instead of typing every lesson by hand, the admin fills a ready-made template, zips it, and uploads it once — the whole course is built automatically (Section 7).

---

## 5. How People Use It

**Admin sets up a course:** Fill in the course template → upload → the system builds the whole course → review a simple report and fix anything flagged → publish.

**Admin enrols a student:** Student pays the admin directly → admin creates their account → assigns the course → they're emailed their login.

**A student takes a course:** Log in → open their course → watch lessons (progress saved automatically) → take the quiz (marked instantly) → upload their exercise (keep going, no waiting) → finish → certificate arrives within 24 hours → view, download, or share to LinkedIn.

---

## 6. Content Protection — What's Realistic

**The honest truth:** No website in the world can fully stop screenshots or screen recording — not Netflix, not Udemy. Screenshots are controlled by the viewer's own device, not the website. Someone can always photograph the screen with a second phone. Anyone promising "100% screenshot-proof" on a website isn't being straight.

**What we *will* do (and it's genuinely strong):**
- **Videos on a protected player (Vimeo)** — the video only plays on your website (a copied link won't work elsewhere), and the download button is switched off.
- **Watermarking — the most important protection.** Every student's **name and email are faintly stamped across the videos and PDFs**. It doesn't stop a screenshot, but **any leak can be traced straight back to the person who leaked it.**
- **Temporary secure links** — materials open through links that expire and are tied to the logged-in student, so a link can't simply be shared or saved.
- **Download and right-click switched off** across videos and notes.
- **Everything locked behind login** — nothing is visible unless a student is logged in and enrolled.

**Bottom line:** casual copying and sharing are blocked, and anyone who does leak something is identifiable.

---

## 7. How Bulk Course Upload Works

The concern with bulk upload is always the videos — they're huge, and uploading gigabytes at once is what breaks. **So we keep the videos out of the upload entirely.** Everything else in a course is tiny.

1. We provide a **ready-made template folder** shaped like a course — a folder per module, a spot for notes and worksheets in each lesson, and a list to paste each lesson's **video link**.
2. Fill it in, zip it, upload. With no videos inside, it's only a few megabytes and **uploads in seconds**.
3. The system reads it and **builds the whole course automatically** — modules, lessons, notes, worksheets, and video links.
4. It shows a **plain report**, e.g. *"Built 8 modules, 40 lessons, 35 worksheets. 2 things to check: one lesson has no video link; one worksheet wasn't a PDF."*
5. Fix those couple of items by hand in the editor. Done.

The video links come from **Vimeo**: upload each lesson's video to the Vimeo account, it gives a link, paste that into the template. Nothing is ever silently lost, and the manual editor is always the safety net.

---

## 8. How Big Is a Course?

- A typical course is about **8 hours of video** across roughly **40 short lessons**.
- **Videos live on Vimeo, not on your platform.** A course's videos are about **6–8 GB** — Vimeo's plan holds many courses' worth (well over 100 hours).
- **Documents** (notes + worksheets) on your own platform are **tiny — usually under 100 MB per course.**
- **The bulk-upload file** (no videos inside) is just **a few megabytes** — which is why it uploads instantly and reliably.
- **Tip:** keep each video at normal quality (720p/1080p) and worksheets as PDFs.

**In short:** the platform itself stays small and cheap to run because Vimeo handles the heavy videos.

---

## 9. Work Breakdown (Effort)

A view of the work involved, to help split it across the two developers. *(Effort units — "one person, one full day" — not a schedule.)*

| Part of the work | Effort (working days) |
|---|---:|
| Setup and groundwork | 4 |
| Public website (Home / About / Contact, from template) | 5 |
| Secure login for students and admin | 4 |
| Admin: build and edit courses by hand | 7 |
| Admin: bulk course upload | 6 |
| Student learning area (dashboard, lessons, progress) | 8 |
| The two test types (quiz + upload-and-grade) | 6 |
| Certificates (upload, email, LinkedIn, download) | 3 |
| Content protection (Vimeo, watermarking, secure links) | 4 |
| Creating student accounts and assigning courses | 2.5 |
| Testing, fixing, launch, and admin training | 5 |
| **Total** | **~54 working days** |

---

## 10. Monthly Running Cost

Once live, the platform runs on a handful of low-cost online services.

> **Please note:** these are **rough estimates**. Actual bills depend on the exact plans chosen, usage, and any price changes by the providers.

| What it's for | Service | Monthly (₹) |
|---|---|---:|
| Website hosting | Vercel | ~1,720 |
| Database + logins | Supabase | ~2,150 |
| File storage (notes, worksheets, certificates) | Cloudflare | ~10–120 |
| Video hosting + protection | Vimeo | ~1,700 |
| Sending emails | Email service | ₹0 (free at first) → ~1,720 |
| Website address (domain) | — | ~90 |
| **Total** | | **~₹5,700 – 7,400 / month** |

**Why it stays flat:** the heavy part (videos) sits on Vimeo for one flat fee, and your own platform only stores small documents. Going from 100 to 10,000 students barely moves the bill.

---

## 11. As You Grow — What Changes

The monthly cost hardly moves, but how you run things should mature a little as more students join:

| Stage | Students | Monthly cost | What to add |
|---|---|---:|---|
| **Launch** | up to 500 | ~₹5,700 | Get going. Turn on automatic backups. |
| **Growing** | 500 – 1,000 | ~₹5,700 | Add a "test copy" of the site; basic down-alerts. |
| **Scaling** | 1,000 – 5,000 | ~₹6,500 | Automatic error alerts; upgrade email for volume. |
| **Large** | 5,000 – 10,000 | ~₹7,400 | Small database power boost for smooth performance. |
| **Very large** | 10,000+ | ~₹10,000+ | Extra database capacity and closer monitoring. |

Going from 100 to 10,000 students only takes the bill from about ₹5,700 to ₹7,400 a month — a small rise for a hundred times the students.

---

## 12. Support

- **Free for the first 30 days** after launch: any bugs in what was delivered are fixed at no charge.
- **Ongoing maintenance** (security updates, bug fixes, small improvements) is available afterwards as needed.

---

## 13. Delivery Milestones

The build is delivered in six phases, each ending in a milestone that can be logged in and checked. This is about the *order* and *what each milestone delivers* — the exact schedule is agreed separately.

| Milestone | What's working by then |
|---|---|
| **M1** | Groundwork + public website |
| **M2** | Logins working + admin can build a course by hand |
| **M3** | Bulk upload + student accounts |
| **M4** | Students can learn, with protected video |
| **M5** | Both test types + certificates |
| **M6** | Tested, protected, and live |

---

## 14. How We're Working (Build Plan)

- **Two developers**, splitting the work into a **"behind-the-scenes" lead** (the engine, database, uploads, tests, certificates) and a **"screens" lead** (everything the student and admin see and click). They pair up on the tricky join points.
- We build in a **sensible order** so nothing is blocked waiting on something else.
- After each milestone, you can log in and see real, working progress.
- **The look and feel starts from a ready-made HTML template**, customized to the branding — keeping the visual work fast and letting effort go into the features that matter.

---

## 15. Build Sequence

| # | Phase | What gets built | Ends in |
|---|---|---|---|
| 1 | **Groundwork + public website** | Project setup, login foundation, and the Home / About / Contact pages (from the customized template). | M1 |
| 2 | **Logins + admin course builder** | Full logins; admin tools to build and edit courses, modules, and lessons by hand. | M2 |
| 3 | **Bulk upload + student accounts** | Bulk course upload (template → upload → course built → report to fix); create and enrol students. | M3 |
| 4 | **Learning area + protected video** | Student dashboard and course player; protected Vimeo video connected. | M4 |
| 5 | **Tests + certificates** | Multiple-choice quiz, upload-and-grade test, and certificates (email + dashboard + LinkedIn). | M5 |
| 6 | **Protection, testing & launch** | Watermarking, download lockdown, full testing, go-live, and training. | M6 |

---

## 16. What Happens in Each Phase

### Phase 1 — Groundwork + Public Website
Set up the project, database, and tools; build the secure login foundation; build the public Home/About/Contact pages by customizing the template (contact form emails the admin). **Milestone 1:** public website live on a test link.

### Phase 2 — Logins + Admin Course Builder
Finish logins (student login, admin login, first-time password change); build admin tools to create/edit courses, modules, and lessons by hand — the safety net for fixing anything later. **Milestone 2:** both logins work; admin can build a course manually.

### Phase 3 — Bulk Upload + Student Accounts
Build the bulk course upload (fill template → upload → course built → simple report of anything to fix); build admin tools to create student accounts and assign courses. **Milestone 3:** bulk upload works; students can be created and enrolled.

### Phase 4 — Learning Area + Protected Video
Build the student dashboard and course player (video + notes + worksheets, progress saved automatically); connect the protected Vimeo video so it only plays inside the platform. **Milestone 4:** a student can log in and go through a course.

### Phase 5 — Tests + Certificates
Build the multiple-choice quiz (marks itself); the upload-your-work test (student uploads a PDF, admin grades it, student keeps going meanwhile); certificates (admin uploads → email + dashboard + Share to LinkedIn). **Milestone 5:** both test types and certificates work end to end.

### Phase 6 — Protection, Testing & Launch
Add watermarking (student name/email on videos and PDFs); lock down downloads and links; test thoroughly (phones + browsers); go live; set up the proper email sender; train the admin. **Milestone 6:** live, protected, handed over.

---

## 17. The Order Matters — Why It's Sequenced This Way

1. **Logins and the database come first** — everything sits on top of them.
2. **The manual course builder comes before bulk upload** — bulk upload fills in the same course structure, so that has to exist first.
3. **Video protection depends on the learning area** being in place.
4. **Certificates and emails come near the end**, once students and courses exist.
5. **The bulk-upload template is agreed before that phase** — the single most important thing to lock early.

---

## 18. What We Need (to avoid delays)

| Stage | What's needed |
|---|---|
| Before we start | Website address (domain), logo, the words for Home/About/Contact, and the HTML template to use (or we recommend one). |
| Before bulk upload | Agreement on the **bulk-upload template**, and one real sample course to test with. |
| Before tests & certificates | Certificate design, a sample quiz, and a sample "upload" exercise. |
| Near launch | Time for training and a final review before going live. |

---

## 19. Risks & How We Handle Them

| Risk | How we handle it |
|---|---|
| Bulk upload is fiddly | Keep videos out of it; agree a clear template; always show a report and allow manual fixes. |
| People copying content | Vimeo protected player + watermarking + login-locked, expiring links. |
| Certificate emails going to spam | Set up a proper verified sender address early. |
| Losing track of progress | Milestones are small and visible, so we always know where we stand. |
| Trying to add too much | Extra features (community, prompt library, etc.) are kept for later. |

---

## 20. Not in This Build (Saved for Later)

Community/discussion area, shared prompt library, AI tools, corporate-training portal, online payments, and a mobile app. The platform is built so these can be added later without redoing the foundation.
```
