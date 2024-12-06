jQuery(document).ready(function ($) {
  // Desactiva el comportamiento por defecto del "Enter" en el input de búsqueda
  $('#search-certificados').on('keydown', function (e) {
    if (e.key === 'Enter') {
      e.preventDefault(); // Evita que se envíe el formulario o realice la búsqueda
    }
  });

  $('#search-certificados-button').on('click', function () {
    const searchQuery = $('#search-certificados').val();
    const resultsContainer = $('#certificados-results');
    const resultsCount = $('#results-count');

    if (searchQuery.length > 2) {
      $.ajax({
        url: ajaxurl,
        type: 'POST',
        data: {
          action: 'buscar_certificados',
          search: searchQuery,
        },
        beforeSend: function () {
          resultsContainer.html('<p>Buscando certificados...</p>');
          resultsCount.text('');
        },
        success: function (response) {
          if (response.success) {
            resultsContainer.html(response.data.html);
            resultsCount.text(`Resultados encontrados: ${response.data.count}`);
          } else {
            resultsContainer.html('<p>No se encontraron resultados.</p>');
            resultsCount.text('');
          }
        },
        error: function () {
          resultsContainer.html('<p>Ocurrió un error. Por favor, intenta de nuevo.</p>');
          resultsCount.text('');
        },
      });
    } else {
      resultsContainer.html('<p>Por favor, introduce al menos 3 caracteres.</p>');
      resultsCount.text('');
    }
  });
});

jQuery(document).ready(function ($) {
  // Evento al abrir un acordeón
  $(document).on('show.bs.collapse', '.accordion-collapse', function () {
    const certificadoId = $(this).attr('id').replace('collapse-', ''); // Obtén el ID del certificado
    const detallesContainer = $(`#detalles-certificado-${certificadoId}`); // Contenedor de detalles

    // Verifica si ya se cargaron los datos
    if (detallesContainer.data('loaded')) {
      return; // No hagas nada si ya están cargados
    }

    // Realiza la solicitud AJAX
    $.ajax({
      url: ajaxurl,
      type: 'POST',
      data: {
        action: 'obtener_detalles_certificado',
        post_id: certificadoId,
      },
      beforeSend: function () {
        detallesContainer.html('<p>Cargando detalles...</p>');
      },
      success: function (response) {
        detallesContainer.html(response); // Muestra los detalles
        detallesContainer.data('loaded', true); // Marca como cargado
      },
      error: function () {
        detallesContainer.html('<p>Ocurrió un error al cargar los detalles.</p>');
      },
    });
  });
});
