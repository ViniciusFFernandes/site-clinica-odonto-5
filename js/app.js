// app.js — interações do site (menu, header no scroll, reveal)
(function () {
  "use strict";

  // Header muda ao rolar
  var header = document.getElementById("siteHeader");
  var scrolledCls = ["border-b", "border-gold/15", "bg-background/90", "py-3", "backdrop-blur-xl"];
  function onScroll() {
    if (!header) return;
    if (window.scrollY > 16) {
      header.classList.add.apply(header.classList, scrolledCls);
      header.classList.remove("py-5");
    } else {
      header.classList.remove.apply(header.classList, scrolledCls);
      header.classList.add("py-5");
    }
  }
  window.addEventListener("scroll", onScroll, { passive: true });
  onScroll();

  // Menu mobile
  var toggle = document.getElementById("menuToggle");
  var menu = document.getElementById("mobileMenu");
  if (toggle && menu) {
    var openIcon = toggle.querySelector("[data-menu-open]");
    var closeIcon = toggle.querySelector("[data-menu-close]");
    function setOpen(open) {
      menu.classList.toggle("hidden", !open);
      if (openIcon) openIcon.classList.toggle("hidden", open);
      if (closeIcon) closeIcon.classList.toggle("hidden", !open);
    }
    toggle.addEventListener("click", function () {
      setOpen(menu.classList.contains("hidden"));
    });
    menu.querySelectorAll("[data-close-menu]").forEach(function (a) {
      a.addEventListener("click", function () { setOpen(false); });
    });
  }

  // Reveal on scroll (IntersectionObserver)
  var reveals = document.querySelectorAll(".reveal");
  if ("IntersectionObserver" in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12, rootMargin: "0px 0px -60px 0px" });
    reveals.forEach(function (el) { io.observe(el); });
  } else {
    reveals.forEach(function (el) { el.classList.add("is-visible"); });
  }
})();
