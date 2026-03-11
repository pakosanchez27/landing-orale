window.createIndustria = function () {
    clearIndustriaErrors();
    $("#industria-modal").prop("hidden", false);
    document.body.classList.add("admin-lock");
};

window.closeIndustria = function () {
    $("#industria-modal").prop("hidden", true);
    document.body.classList.remove("admin-lock");
};
console.log(base_url);

window.editIndustria = function (id) {
    $.ajax({
        url: `${base_url}/admin/catalogos/industria/show`,
        type: "POST",
        data: { id },
    }).done(function (response) {
        const data = JSON.parse(response);
        if (data.code !== 200) {
            window.Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "No se encontraron datos",
                footer: "<p>Contacte al Administrado</p>",
            });
        } else {
            $("#industria-edit-id").val(data.data.id);
            $("#nombre-edit").val(data.data.nombre);
            $("#color-edit").val(data.data.color);
            $("#estado-edit").val(data.data.estado);

            $("#industria-edit-id").val(id || "");
            $("#industria-modal-edit").prop("hidden", false);
            document.body.classList.add("admin-lock");
        }
    });
};

window.closeIndustriaEdit = function () {
    $("#industria-modal-edit").prop("hidden", true);
    document.body.classList.remove("admin-lock");
};

window.updateIndustria = function () {
    const url =
        $("#industria-update-btn").data("url") ||
        `${base_url}/admin/catalogos/industria/update`;
    const data = {
        id: $("#industria-edit-id").val() || "",
        nombre: $("#nombre-edit").val()?.trim() || "",
        color: $("#color-edit").val() || "",
        estado: $("#estado-edit").val() || "",
    };

    const errors = {};
    if (!data.id) errors.id = "No se encontro el ID de la industria.";
    if (!data.nombre) errors.nombre = "El nombre es obligatorio.";
    if (!data.color) errors.color = "El color es obligatorio.";
    if (!data.estado) errors.estado = "Selecciona un estado.";

    clearIndustriaEditErrors();
    if (Object.keys(errors).length) {
        showIndustriaEditErrors(errors);
        return;
    }

    $.ajax({
        url,
        type: "POST",
        data,
    })
        .done(function () {
            closeIndustriaEdit();
            if (window.Swal && typeof window.Swal.fire === "function") {
                window.Swal.fire({
                    icon: "success",
                    title: "Actualizado",
                    text: "La industria se actualizo correctamente.",
                    timer: 2000,
                    showConfirmButton: false,
                });
            }
            setTimeout(() => {
                window.location.reload();
            }, 2000);
        })
        .fail(function (xhr) {
            if (xhr.status === 422 && xhr.responseJSON?.errors) {
                showIndustriaEditErrors({
                    nombre: xhr.responseJSON.errors.nombre?.[0],
                    color: xhr.responseJSON.errors.color?.[0],
                    estado: xhr.responseJSON.errors.estado?.[0],
                });
                return;
            }
            alert("Ocurrio un error al actualizar.");
        });
};

window.saveIndustria = function () {
    const url = $("#industria-save-btn").data("url");
    const data = {
        nombre: $("#nombre").val()?.trim() || "",
        color: $("#color").val() || "",
        estado: $("#estado").val() || "",
    };

    const errors = {};
    if (!data.nombre) errors.nombre = "El nombre es obligatorio.";
    if (!data.color) errors.color = "El color es obligatorio.";
    if (!data.estado) errors.estado = "Selecciona un estado.";

    clearIndustriaErrors();
    if (Object.keys(errors).length) {
        showIndustriaErrors(errors);
        return;
    }

    $.ajax({
        url,
        type: "POST",
        data,
    })
        .done(function (response) {
            console.log(response);
            closeIndustria();
            if (window.Swal && typeof window.Swal.fire === "function") {
                window.Swal.fire({
                    icon: "success",
                    title: "Guardado",
                    text: "La industria se guardo correctamente.",
                    timer: 2000,
                    showConfirmButton: false,
                });
            }
            setTimeout(() => {
                window.location.reload();
            }, 2000);
        })
        .fail(function (xhr) {
            if (xhr.status === 422 && xhr.responseJSON?.errors) {
                showIndustriaErrors({
                    nombre: xhr.responseJSON.errors.nombre?.[0],
                    color: xhr.responseJSON.errors.color?.[0],
                    estado: xhr.responseJSON.errors.estado?.[0],
                });
                return;
            }
            alert("Ocurrió un error al guardar.");
        });
};

window.toggleIndustriaEstado = function (id, estado) {
    if (!id && id !== 0) return;
    const runUpdate = () => {
        $.ajax({
            url: `${base_url}/admin/catalogos/industria/estado`,
            type: "POST",
            data: { id, estado },
        })
            .done(function () {
                if (window.Swal && typeof window.Swal.fire === "function") {
                    window.Swal.fire({
                        icon: "success",
                        title: estado === 1 ? "Activada" : "Desactivada",
                        text:
                            estado === 1
                                ? "La industria se activo correctamente."
                                : "La industria se desactivo correctamente.",
                        timer: 2000,
                        showConfirmButton: false,
                    });
                }
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            })
            .fail(function () {
                alert("Ocurrio un error al actualizar el estado.");
            });
    };

    if (window.Swal && typeof window.Swal.fire === "function") {
        window.Swal.fire({
            icon: "warning",
            title: estado === 1 ? "¿Activar industria?" : "¿Desactivar industria?",
            text:
                estado === 1
                    ? "La industria quedara activa."
                    : "La industria quedara inactiva.",
            showCancelButton: true,
            confirmButtonText: "Confirmar",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) runUpdate();
        });
        return;
    }

    if (window.confirm("¿Confirmar el cambio de estado de la industria?")) {
        runUpdate();
    }
};

function showIndustriaErrors(errors) {
    $("#error-nombre").text(errors.nombre || "");
    $("#error-color").text(errors.color || "");
    $("#error-estado").text(errors.estado || "");
}

function clearIndustriaErrors() {
    $("#error-nombre").text("");
    $("#error-color").text("");
    $("#error-estado").text("");
}

function showIndustriaEditErrors(errors) {
    $("#error-nombre-edit").text(errors.nombre || "");
    $("#error-color-edit").text(errors.color || "");
    $("#error-estado-edit").text(errors.estado || "");
}

function clearIndustriaEditErrors() {
    $("#error-nombre-edit").text("");
    $("#error-color-edit").text("");
    $("#error-estado-edit").text("");
}

$(document).ready(() => {
    const csrfToken = $('meta[name="csrf-token"]').attr("content");
    if (csrfToken) {
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": csrfToken },
        });
    }

    if ($.fn.DataTable) {
        $("#industrias-table").DataTable({
            responsive: true,
            pageLength: 10,
            lengthChange: true,
            language: {
                emptyTable: "No hay datos disponibles en la tabla",
                info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                infoEmpty: "Mostrando 0 a 0 de 0 registros",
                infoFiltered: "(filtrado de _MAX_ registros totales)",
                lengthMenu: "Mostrar _MENU_ registros",
                loadingRecords: "Cargando...",
                processing: "Procesando...",
                search: "Buscar:",
                zeroRecords: "No se encontraron resultados",
                paginate: {
                    first: "Primero",
                    last: "Último",
                    next: "Siguiente",
                    previous: "Anterior",
                },
            },
        });
    }

    $("#nueva-industria-btn").on("click", createIndustria);
    $("#industria-modal-close").on("click", closeIndustria);
    $("#industria-modal-cancel").on("click", closeIndustria);
    $("#industria-modal").on("click", function (event) {
        if (event.target === this) closeIndustria();
    });
    $("#nombre, #color, #estado").on("input change", clearIndustriaErrors);

    $("#industria-modal-edit-close").on("click", closeIndustriaEdit);
    $("#industria-modal-edit-cancel").on("click", closeIndustriaEdit);
    $("#industria-modal-edit").on("click", function (event) {
        if (event.target === this) closeIndustriaEdit();
    });
    $("#nombre-edit, #color-edit, #estado-edit").on(
        "input change",
        clearIndustriaEditErrors
    );
});
