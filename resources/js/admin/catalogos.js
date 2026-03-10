
window.createIndustria = function () {
    clearIndustriaErrors();
    $("#industria-modal").prop("hidden", false);
    document.body.classList.add("admin-lock");
};

window.closeIndustria = function () {
  $("#industria-modal").prop("hidden", true);
  document.body.classList.remove("admin-lock");
};

window.editIndustria = function (id) {
  $("#industria-edit-id").val(id || "");
  $("#industria-modal-edit").prop("hidden", false);
  document.body.classList.add("admin-lock");
};

window.closeIndustriaEdit = function () {
  $("#industria-modal-edit").prop("hidden", true);
  document.body.classList.remove("admin-lock");
};

window.updateIndustria = function () {
  // TODO: implementar update
  closeIndustriaEdit();
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
});
