import '../css/app.css';
import './vendor';
import "./bootstrap";
import "./globales";

(() => {
  const button = document.getElementById("mobile-menu-btn");
  const panel = document.getElementById("mobile-menu-panel");
  const overlay = document.getElementById("mobile-menu-overlay");
  const isMobile = () => window.matchMedia("(max-width: 1023px)").matches;

  if (!button || !panel || !overlay) return;

  const setOpen = (open) => {
    button.classList.toggle("is-open", open);
    panel.classList.toggle("is-open", open);
    button.setAttribute("aria-expanded", open ? "true" : "false");
    document.body.classList.toggle("mobile-menu-open", open);
    overlay.hidden = !open;
    panel.hidden = !open;
  };

  button.addEventListener("click", () => {
    if (!isMobile()) return;
    const isOpen = button.classList.contains("is-open");
    setOpen(!isOpen);
  });

  overlay.addEventListener("click", () => setOpen(false));

  panel.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => setOpen(false));
  });

  window.addEventListener("keydown", (event) => {
    if (event.key === "Escape") setOpen(false);
  });

  window.addEventListener("resize", () => {
    if (!isMobile()) setOpen(false);
  });
})();
