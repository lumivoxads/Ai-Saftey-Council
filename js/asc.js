/* AI Safety Council — lightweight UI behaviours (mobile nav + verify tabs) */
(function () {
  "use strict";

  document.documentElement.classList.add("js");
  var lenis = null;

  // --- Mobile navigation drawer ---
  var burger   = document.querySelector(".asc-burger");
  var drawer   = document.querySelector(".asc-mobile");
  var backdrop = document.querySelector(".asc-backdrop");

  function closeDrawer() {
    if (!drawer) return;
    drawer.classList.remove("is-open");
    if (backdrop) backdrop.classList.remove("is-open");
    document.body.style.overflow = "";
    if (lenis) lenis.start();
  }
  function toggleDrawer() {
    if (!drawer) return;
    var open = drawer.classList.toggle("is-open");
    if (backdrop) backdrop.classList.toggle("is-open", open);
    document.body.style.overflow = open ? "hidden" : "";
    if (lenis) { open ? lenis.stop() : lenis.start(); }
  }

  if (burger) burger.addEventListener("click", toggleDrawer);
  if (backdrop) backdrop.addEventListener("click", closeDrawer);
  if (drawer) {
    drawer.querySelectorAll("a").forEach(function (a) {
      a.addEventListener("click", closeDrawer);
    });
  }
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") closeDrawer();
  });

  // --- Current year in footer ---
  var year = new Date().getFullYear();
  document.querySelectorAll(".asc-year").forEach(function (el) { el.textContent = year; });

  // --- Floating WhatsApp button (site-wide) ---
  var WA_NUMBER = "918281336937"; // +91 82813 36937
  if (!document.querySelector(".asc-wa")) {
    var wa = document.createElement("a");
    wa.href = "https://wa.me/" + WA_NUMBER;
    wa.target = "_blank";
    wa.rel = "noopener";
    wa.className = "asc-wa";
    wa.setAttribute("aria-label", "Chat with us on WhatsApp");
    wa.innerHTML = '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2 22l5.25-1.38c1.45.79 3.08 1.2 4.79 1.2h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0012.04 2zm0 18.15h-.01c-1.52 0-3.01-.41-4.3-1.18l-.31-.18-3.19.84.85-3.11-.2-.32a8.23 8.23 0 01-1.26-4.39c0-4.54 3.7-8.24 8.24-8.24 2.2 0 4.27.86 5.82 2.42a8.18 8.18 0 012.41 5.82c0 4.54-3.7 8.24-8.25 8.24zm4.52-6.17c-.25-.12-1.47-.72-1.69-.81-.23-.08-.39-.12-.56.13-.16.24-.64.8-.78.97-.15.16-.29.18-.54.06-.25-.12-1.05-.39-1.99-1.23-.74-.66-1.23-1.47-1.38-1.72-.14-.25-.01-.38.11-.51.11-.11.25-.29.37-.43.12-.15.16-.25.25-.42.08-.16.04-.31-.02-.43-.06-.12-.56-1.35-.76-1.85-.2-.48-.4-.42-.56-.43l-.48-.01c-.16 0-.43.06-.66.31-.22.25-.86.85-.86 2.07 0 1.22.89 2.4 1.01 2.56.12.16 1.74 2.66 4.22 3.73.59.26 1.05.41 1.41.52.59.19 1.13.16 1.56.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.14-1.18-.06-.11-.22-.17-.47-.29z"/></svg>';
    document.body.appendChild(wa);
  }

  // --- Accordion (syllabus) ---
  document.querySelectorAll(".asc-acc__head").forEach(function (head) {
    head.addEventListener("click", function () {
      var item = head.closest(".asc-acc__item");
      if (item) item.classList.toggle("is-open");
    });
  });

  // --- Verify credential tabs (visual toggle) ---
  document.querySelectorAll(".asc-verify__tab").forEach(function (tab) {
    tab.addEventListener("click", function () {
      var group = tab.closest(".asc-verify__tabs");
      if (!group) return;
      group.querySelectorAll(".asc-verify__tab").forEach(function (t) {
        t.classList.remove("is-active");
      });
      tab.classList.add("is-active");
      var input = tab.closest(".asc-verify__card").querySelector("input");
      if (input) {
        input.placeholder = tab.dataset.placeholder || input.placeholder;
      }
    });
  });

  // --- Placeholder links (e.g. social icons pending real URLs) don't jump ---
  document.querySelectorAll('a[href="#"]').forEach(function (a) {
    a.addEventListener("click", function (e) { e.preventDefault(); });
  });

  // --- Toast ---
  var toastTimer = null;
  function showToast(message) {
    var toast = document.querySelector(".asc-toast");
    if (!toast) {
      toast = document.createElement("div");
      toast.className = "asc-toast";
      toast.setAttribute("role", "status");
      toast.setAttribute("aria-live", "polite");
      document.body.appendChild(toast);
    }
    toast.textContent = message;
    toast.classList.add("is-visible");
    clearTimeout(toastTimer);
    toastTimer = setTimeout(function () {
      toast.classList.remove("is-visible");
    }, 3200);
  }

  // --- Verify credential form: feature not live yet ---
  document.querySelectorAll(".asc-verify__form").forEach(function (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      showToast("Credential verification is coming soon.");
    });
  });

  // --- Scroll-reveal entrance animations ---
  var REVEAL = ".asc-section__head, .asc-hero__copy > *, .asc-trust__item, .asc-cert-card, "
    + ".asc-res-card, .asc-prog-card, .asc-feature, .asc-stats > div, .asc-verify__inner > *, "
    + ".asc-split > *, .asc-two > *, .asc-acc__item, .asc-detail > *, .asc-pagehero__inner > *, "
    + ".asc-map, .asc-info, .asc-form, .asc-blog-card";
  var revEls = Array.prototype.slice.call(document.querySelectorAll(REVEAL));
  revEls.forEach(function (el) { el.classList.add("asc-reveal"); });
  // subtle stagger within card grids
  [".asc-cert-grid", ".asc-res-grid", ".asc-listing", ".asc-feature-grid", ".asc-blog-grid"].forEach(function (sel) {
    document.querySelectorAll(sel).forEach(function (grid) {
      Array.prototype.slice.call(grid.children).forEach(function (c, i) {
        if (c.classList.contains("asc-reveal")) c.style.transitionDelay = (i * 70) + "ms";
      });
    });
  });
  if ("IntersectionObserver" in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { e.target.classList.add("is-visible"); io.unobserve(e.target); }
      });
    }, { threshold: 0.12, rootMargin: "0px 0px -6% 0px" });
    revEls.forEach(function (el) { io.observe(el); });
  } else {
    revEls.forEach(function (el) { el.classList.add("is-visible"); });
  }

  // --- Smooth momentum scrolling (Lenis, progressively enhanced from CDN) ---
  var reduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (!reduced) {
    var ls = document.createElement("script");
    ls.src = "https://cdn.jsdelivr.net/npm/lenis@1/dist/lenis.min.js";
    ls.onload = function () {
      if (typeof Lenis === "undefined") return;
      lenis = new Lenis({ lerp: 0.09, smoothWheel: true, wheelMultiplier: 1 });
      (function raf(t) { lenis.raf(t); requestAnimationFrame(raf); })(0);
      // smooth same-page anchor jumps (e.g. #verify)
      document.querySelectorAll('a[href^="#"]').forEach(function (a) {
        a.addEventListener("click", function (ev) {
          var id = a.getAttribute("href");
          if (id && id.length > 1) {
            var t = document.querySelector(id);
            if (t) { ev.preventDefault(); lenis.scrollTo(t, { offset: -90 }); }
          }
        });
      });
      // settle to hash when arriving from another page (e.g. index.html#verify)
      if (location.hash) {
        var target = document.querySelector(location.hash);
        if (target) setTimeout(function () { lenis.scrollTo(target, { offset: -90 }); }, 80);
      }
    };
    document.head.appendChild(ls);
  }
})();
