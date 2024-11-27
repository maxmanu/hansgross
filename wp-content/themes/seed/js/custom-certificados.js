jQuery(document).ready(function ($) {
  $('#button-buscar-certificados').on('click', function () {
    var query = $('#buscador-certificados').val(); // Obtiene el texto del input

    if (query.trim() === '') {
      $('#resultado-titulo').html('<p>Por favor, escribe algo para buscar.</p>');
      $('#resultado-busqueda').html('');
      return; // Detenemos la ejecución si no se ingresó nada
    }

    $.ajax({
      url: ajax_object.ajax_url,
      type: 'POST',
      data: {
        action: 'buscar_certificados',
        query: query,
      },
      beforeSend: function () {
        $('#resultado-titulo').html(''); // Limpia el título previo
        $('#resultado-busqueda').html('<p>Buscando...</p>'); // Muestra un mensaje de carga
      },
      success: function (response) {
        if (response.titulo) {
          $('#resultado-titulo').html('<h3>' + response.titulo + '</h3>'); // Muestra el título en su div
        }
        if (response.contenido) {
          $('#resultado-busqueda').html(response.contenido); // Muestra los detalles (custom fields)
        }
      },
      error: function () {
        $('#resultado-titulo').html('');
        $('#resultado-busqueda').html('<p>Hubo un error. Intenta de nuevo.</p>');
      },
    });
  });
});
