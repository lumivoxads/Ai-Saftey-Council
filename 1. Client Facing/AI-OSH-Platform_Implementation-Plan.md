# AI Safety Council — Build Plan

**Platform:** AI Safety Council — AI-OSH Learning Platform
**Who's building:** Two developers
**How:** In six phases, each ending in a visible milestone
**Date:** 01 July 2026

> This is the plain-language plan for how the platform gets built, in what order, who does what, and which milestone triggers each payment. The exact schedule will be agreed separately.

---

## 1. How We're Working

- **Two developers**, splitting the work into a **"behind-the-scenes" lead** (the engine, database, uploads, tests, certificates) and a **"screens" lead** (everything the student and admin see and click). They pair up on the tricky join points.
- We build in a **sensible order** so nothing is blocked waiting on something else.
- After each milestone, you can log in and see real, working progress.
- **The look and feel starts from a ready-made HTML template**, customized to your branding — rather than designing every screen from scratch. This keeps the visual work fast and consistent, and lets us focus effort on the features that matter.

---

## 2. The Milestones

| Milestone | You'll be able to see… | Payment |
|---|---|---|
| **M1 — Groundwork** | The public website (Home / About / Contact) live on a test link. | — |
| **M2 — Logins + first course** | Students and admin can log in; admin can build a course by hand. | — |
| **M3 — Bulk upload + students** | Upload a course in bulk; create a student and assign them a course. | **Payment 2** |
| **M4 — Learning works** | A student opens their course and watches protected videos; progress is tracked. | — |
| **M5 — Tests + certificates** | Quiz marks itself; uploaded work gets graded; certificates go out. | **Payment 3** |
| **M6 — Launch** | Fully tested, protected, and live; you're trained to run it. | **Payment 4** |

*(Payment 1 is at kickoff — see the Overview & Costing document.)*

---

## 3. Build Sequence

The six phases run in order. Each one builds on the last, and each ends in a milestone you can see and check.

| # | Phase | What gets built | Ends in |
|---|---|---|---|
| 1 | **Groundwork + public website** | Project setup, login foundation, and the Home / About / Contact pages (from the customized template). | M1 |
| 2 | **Logins + admin course builder** | Full logins; admin tools to build and edit courses, modules, and lessons by hand. | M2 |
| 3 | **Bulk upload + student accounts** | Bulk course upload (template → upload → course built → report to fix); create and enrol students. | M3 |
| 4 | **Learning area + protected video** | Student dashboard and course player; protected Vimeo video connected. | M4 |
| 5 | **Tests + certificates** | Multiple-choice quiz, upload-and-grade test, and certificates (email + dashboard + LinkedIn). | M5 |
| 6 | **Protection, testing & launch** | Watermarking, download lockdown, full testing, go-live, and training. | M6 |

---

## 4. What Happens in Each Phase

### Phase 1 — Groundwork + Public Website
- Set up the project, the database, and the tools everything runs on.
- Build the secure login foundation.
- Build the public **Home, About, and Contact** pages by customizing the chosen HTML template; the contact form emails you.
- **Milestone 1:** public website live on a test link.

### Phase 2 — Logins + Admin Course Builder
- Finish logins: students log in (no self sign-up), admin logs in, first-time password change.
- Build the admin tools to **create and edit courses, modules, and lessons by hand** — also the safety net for fixing anything later.
- **Milestone 2:** both logins work; admin can build a course manually.

### Phase 3 — Bulk Upload + Student Accounts
- Build the **bulk course upload** (fill the template → upload → course is built → simple report of anything to fix).
- Build admin tools to **create student accounts and assign courses**.
- **Milestone 3:** bulk upload works; students can be created and enrolled. *(Payment 2)*

### Phase 4 — Learning Area + Protected Video
- Build the **student dashboard** and the **course player** (video + notes + worksheets), with progress saved automatically.
- Connect the **protected Vimeo video** so it only plays inside the platform.
- **Milestone 4:** a student can log in and go through a course.

### Phase 5 — Tests + Certificates
- Build the **multiple-choice quiz** (marks itself instantly).
- Build the **upload-your-work test** (student uploads a PDF, admin grades it, student keeps going meanwhile).
- Build **certificates** — admin uploads, student gets it by email + dashboard + "Share to LinkedIn".
- **Milestone 5:** both test types and certificates work end to end. *(Payment 3)*

### Phase 6 — Protection, Testing & Launch
- Add the **watermarking** (student name/email on videos and PDFs) and lock down downloads and links.
- Test everything thoroughly; fix bugs; check on phones and different browsers.
- **Go live**, set up the proper email sender, and **train you** to run it day to day.
- **Milestone 6:** live, protected, handed over. *(Payment 4)*

---

## 5. The Order Matters — Why It's Sequenced This Way

1. **Logins and the database come first** — everything else sits on top of them.
2. **The manual course builder comes before bulk upload** — bulk upload fills in the same course structure, so that has to exist first.
3. **The video protection depends on the learning area** being in place.
4. **Certificates and emails come near the end**, once students and courses exist.
5. **We agree the bulk-upload template with you before the bulk-upload phase** — this is the single most important thing to lock early (see the developer handbook).

---

## 6. What We Need From You (to avoid delays)

| Stage | What we need |
|---|---|
| Before we start | Website address (domain), your logo, the words for the Home/About/Contact pages, and the HTML template you'd like to use (or we can recommend one). |
| Before bulk upload | Agreement on the **bulk-upload template**, and one real sample course to test with. |
| Before tests & certificates | Your certificate design, a sample quiz, and a sample "upload" exercise. |
| Near launch | Some time for training and a final review before we go live. |

---

## 7. Risks & How We Handle Them

| Risk | How we handle it |
|---|---|
| Bulk upload is fiddly | Keep videos out of it; agree a clear template; always show a report and allow manual fixes. |
| People copying content | Vimeo protected player + watermarking + login-locked, expiring links (full honesty on limits in the overview doc). |
| Certificate emails going to spam | Set up a proper verified sender address early. |
| Losing track of progress | Milestones are small and visible, so we always know exactly where we stand. |
| Trying to add too much | Extra features (community, prompt library, etc.) are kept for later phases. |

---

## 8. Not in This Build (Saved for Later)

Community/discussion area, shared prompt library, AI tools, corporate-training portal, online payments, and a mobile app. The platform is built so these can be added later without redoing the foundation.
```
