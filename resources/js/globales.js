(() => {
    const sections = Array.from(document.querySelectorAll("section"));
    if (!sections.length) return;

    const staggerSelector = [
        ".hero_contenido",
        ".hero_imagen",
        ".card-beneficio",
        ".card-demo",
        ".card-paquete",
        ".card-proceso",
        ".card-valor",
        ".equipo-card",
        ".nosotros-mvv__item",
        ".badge",
        "h2",
        "h3",
        "p",
        "button",
        "a.btn-primario",
    ].join(", ");

    sections.forEach((section) => {
        section.classList.add("reveal-section");

        const items = section.querySelectorAll(staggerSelector);
        items.forEach((item, index) => {
            item.classList.add("reveal-card");
            item.style.transitionDelay = `${Math.min(index, 8) * 80}ms`;
        });
    });

    const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    if (reduceMotion) {
        sections.forEach((section) => {
            section.classList.add("is-visible");
            section.querySelectorAll(".reveal-card").forEach((item) => {
                item.classList.add("is-visible");
            });
        });
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;

                entry.target.classList.add("is-visible");
                entry.target.querySelectorAll(".reveal-card").forEach((item) => {
                    item.classList.add("is-visible");
                });

                observer.unobserve(entry.target);
            });
        },
        {
            threshold: 0.18,
            rootMargin: "0px 0px -12% 0px",
        },
    );

    sections.forEach((section) => observer.observe(section));
})();

(() => {
    const contenedor = document.querySelector(".card-demos");
    const paginador = document.querySelector(".paginador-demos");
    if (!contenedor || !paginador) return;

    const cards = Array.from(contenedor.querySelectorAll(".card-demo"));
    const porPagina = 6;
    const totalPaginas = Math.ceil(cards.length / porPagina);

    if (totalPaginas <= 1) {
        paginador.style.display = "none";
        return;
    }

    let paginaActual = 1;

    const crearRango = (inicio, fin) =>
        Array.from(
            {
                length: fin - inicio + 1,
            },
            (_, i) => i + inicio,
        );

    const paginasVisibles = (total, actual) => {
        if (total <= 7) return crearRango(1, total);
        if (actual <= 3) return [1, 2, 3, "...", total - 1, total];
        if (actual >= total - 2) return [1, 2, "...", total - 2, total - 1, total];
        return [1, "...", actual - 1, actual, actual + 1, "...", total];
    };

    const renderCards = () => {
        const inicio = (paginaActual - 1) * porPagina;
        const fin = inicio + porPagina;
        cards.forEach((card, index) => {
            card.style.display = index >= inicio && index < fin ? "" : "none";
        });
    };

    const renderPaginador = () => {
        paginador.innerHTML = "";
        const paginas = paginasVisibles(totalPaginas, paginaActual);

        paginas.forEach((item) => {
            if (item === "...") {
                const dots = document.createElement("span");
                dots.className = "paginador__dots";
                dots.textContent = "...";
                paginador.appendChild(dots);
                return;
            }

            const btn = document.createElement("button");
            btn.type = "button";
            btn.className = `paginador__btn${item === paginaActual ? " is-active" : ""}`;
            btn.textContent = item;
            btn.setAttribute("aria-label", `Ir a pagina ${item}`);
            btn.setAttribute("aria-current", item === paginaActual ? "page" : "false");
            btn.addEventListener("click", () => {
                if (paginaActual === item) return;
                paginaActual = item;
                renderCards();
                renderPaginador();
            });
            paginador.appendChild(btn);
        });
    };

    renderCards();
    renderPaginador();
})();
