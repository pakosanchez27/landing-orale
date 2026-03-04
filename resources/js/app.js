import '../css/app.css';
import "./bootstrap";
import "./globales";

(() => {
  const button = document.getElementById("mobile-menu-btn");
  const panel = document.getElementById("mobile-menu-panel");
  const overlay = document.getElementById("mobile-menu-overlay");

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
})();
