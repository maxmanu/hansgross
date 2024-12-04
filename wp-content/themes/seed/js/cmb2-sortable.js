document.addEventListener('DOMContentLoaded', function () {
  // Asegúrate de que Sortable esté disponible
  if (typeof Sortable === 'undefined') {
    console.error('SortableJS no está disponible.');
    return;
  }

  // Encuentra todas las listas de archivos creadas por CMB2
  const fileLists = document.querySelectorAll('.cmb2-media-status');

  fileLists.forEach((fileList) => {
    if (fileList) {
      // Inicializa SortableJS
      new Sortable(fileList, {
        animation: 150, // Animación al mover elementos
        handle: '.cmb2-remove-file', // Botón de arrastre (opcional)
        onEnd: function (evt) {
          console.log('Nuevo orden:', evt.oldIndex, evt.newIndex);
        },
      });
    }
  });
});
