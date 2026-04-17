import "./vendor";
import "./bootstrap";
import "./globales";

(() => {
  const button = document.getElementById("mobile-menu-btn");
  const panel = document.getElementById("mobile-menu-panel");
  const overlay = document.getElementById("mobile-menu-overlay");
  const isMobile = () => window.matchMedia("(max-width: 1100px)").matches;

  if (!button || !panel || !overlay) return;

  const setOpen = (open) => {
    button.classList.toggle("is-open", open);
    panel.classList.toggle("is-open", open);
    button.setAttribute("aria-expanded", open ? "true" : "false");
    panel.hidden = !open;
    overlay.hidden = !open;
    document.body.classList.toggle("mobile-menu-open", open);
  };

  button.addEventListener("click", () => {
    if (!isMobile()) return;
    setOpen(!button.classList.contains("is-open"));
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

(() => {
  const modal = document.getElementById("demo-modal");
  const closeButton = document.getElementById("demo-modal-close");
  const modalTitle = document.getElementById("demo-modal-title");
  const modalImage = document.getElementById("demo-modal-image");
  const modalDescription = document.getElementById("demo-modal-description");
  const modalLink = document.getElementById("demo-modal-link");
  const modalIndustry = document.getElementById("demo-modal-industry");
  const triggers = document.querySelectorAll("[data-demo-trigger]");
  let previousActiveElement = null;

  if (
    !modal ||
    !closeButton ||
    !modalTitle ||
    !modalImage ||
    !modalDescription ||
    !modalLink ||
    !modalIndustry ||
    !triggers.length
  ) {
    return;
  }

  const closeModal = () => {
    modal.hidden = true;
    document.body.classList.remove("demo-modal-open");
    if (previousActiveElement instanceof HTMLElement) {
      previousActiveElement.focus();
    }
  };

  const openModal = (trigger) => {
    previousActiveElement = trigger;
    modalTitle.textContent = trigger.dataset.demoTitle || "Demo";
    modalImage.src = trigger.dataset.demoImage || "";
    modalImage.alt = trigger.dataset.demoTitle || "Imagen del demo";
    modalDescription.textContent = trigger.dataset.demoDescription || "";
    modalLink.href = trigger.dataset.demoLink || "#";

    if (trigger.dataset.demoIndustry) {
      modalIndustry.hidden = false;
      modalIndustry.textContent = trigger.dataset.demoIndustry;
      modalIndustry.style.backgroundColor = trigger.dataset.demoColor || "#6b3ff2";
      modalIndustry.style.color = "#ffffff";
    } else {
      modalIndustry.hidden = true;
      modalIndustry.textContent = "";
    }

    modal.hidden = false;
    document.body.classList.add("demo-modal-open");
    closeButton.focus();
  };

  triggers.forEach((trigger) => {
    trigger.addEventListener("click", () => openModal(trigger));
  });

  closeButton.addEventListener("click", closeModal);

  modal.querySelectorAll("[data-demo-modal-close]").forEach((element) => {
    element.addEventListener("click", closeModal);
  });

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && !modal.hidden) {
      closeModal();
    }
  });
})();
