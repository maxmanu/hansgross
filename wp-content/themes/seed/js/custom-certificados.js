// jQuery(document).ready(function ($) {
//   // Manejar clic en el botón de búsqueda
//   $('#button-buscar-certificados').on('click', function () {
//     var query = $('#buscador-certificados').val().trim(); // Obtiene y limpia el texto del input

//     if (query === '') {
//       // Mostrar mensaje si el campo está vacío
//       $('#resultado-titulo').html('<p>Por favor, escribe algo para buscar.</p>');
//       $('#resultado-busqueda').html('');
//       return;
//     }

//     // Desactiva el botón mientras se realiza la búsqueda
//     var $button = $(this);
//     $button.prop('disabled', true);

//     // Realiza la solicitud AJAX
//     $.ajax({
//       url: ajax_object.ajax_url, // URL de admin-ajax.php
//       type: 'POST',
//       data: {
//         action: 'buscar_certificados', // Acción de PHP
//         query: query, // Término de búsqueda
//       },
//       beforeSend: function () {
//         // Limpia los resultados previos y muestra un mensaje de carga
//         $('#resultado-titulo').html('');
//         $('#resultado-busqueda').html('<p>Buscando...</p>');
//       },
//       success: function (response) {
//         // Verificar si hay un título en la respuesta
//         if (response.titulo) {
//           $('#resultado-titulo').html('<h3>' + response.titulo + '</h3>'); // Muestra el título
//         } else {
//           $('#resultado-titulo').html(''); // Limpia si no hay título
//         }

//         // Verificar si hay contenido en la respuesta
//         if (response.contenido) {
//           $('#resultado-busqueda').html(response.contenido); // Muestra los detalles
//         } else {
//           $('#resultado-busqueda').html('<p>No se encontraron resultados.</p>'); // Mensaje vacío
//         }
//       },
//       error: function () {
//         // Manejo de errores
//         $('#resultado-titulo').html('');
//         $('#resultado-busqueda').html('<p>Hubo un error en la búsqueda. Intenta nuevamente.</p>');
//       },
//       complete: function () {
//         // Reactiva el botón después de finalizar la solicitud
//         $button.prop('disabled', false);
//       },
//     });
//   });
// });

jQuery(document).ready(function ($) {
  $('#search-certificados-button').on('click', function () {
    const searchQuery = $('#search-certificados').val(); // Obtén el valor del input
    const resultsContainer = $('#certificados-results'); // Contenedor de resultados

    if (searchQuery.length > 2) {
      // Asegúrate de que el término tenga al menos 3 caracteres
      $.ajax({
        url: ajaxurl, // URL para la solicitud AJAX
        type: 'POST',
        data: {
          action: 'buscar_certificados', // Nombre del callback PHP
          search: searchQuery,
        },
        beforeSend: function () {
          resultsContainer.html('<p>Buscando...</p>'); // Mensaje de carga
        },
        success: function (response) {
          resultsContainer.html(response); // Muestra los resultados
        },
        error: function () {
          resultsContainer.html('<p>Ocurrió un error. Por favor, intenta de nuevo.</p>');
        },
      });
    } else {
      resultsContainer.html('<p>Por favor, introduce al menos 3 caracteres.</p>');
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
