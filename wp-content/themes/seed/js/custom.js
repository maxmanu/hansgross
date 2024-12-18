document.addEventListener('DOMContentLoaded', () => {
  const buttons = document.querySelectorAll('div[data-category-slug]');
  const swiperEventos = document.querySelector('.swiperEventos .swiper-wrapper');

  let swiperInstance; // Variable para almacenar la instancia de Swiper
  let activeCategory = ''; // Categoría activa por defecto

  // Define la función loadPosts en el ámbito global
  window.loadPosts = (categorySlug, forceLoad = false) => {
    // Si la categoría ya está activa y no es un forzado, no hacer nada
    if (categorySlug === activeCategory && !forceLoad) return;
    // Mostrar mensaje de carga
    swiperEventos.innerHTML = '<div class="swiper-slide">Cargando...</div>';

    // Realizar la solicitud AJAX
    fetch(`${wp_ajax_data.ajax_url}?action=load_event_posts_by_category&category_slug=${categorySlug}`)
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          // Renderizar los posts en Swiper
          swiperEventos.innerHTML = data.data
            .map((post) => {
              // Condición para mostrar "servicio_fecha | servicio_horario" solo si existe servicio_fecha
              const customText = post.servicio_fecha
                ? `<p class="card-text">${post.servicio_fecha}${
                    post.servicio_horario ? ` | ${post.servicio_horario}` : ''
                  }</p>`
                : '';

              return `
                <div class="swiper-slide">
                  <div class="card">
                    <img src="${post.thumbnail}" class="card-img-top" alt="${post.title}">
                    <div class="card-body">
                     <a class="card-title" href="${post.link}">${post.title}</a>
                      ${customText}
                    </div>
                  </div>
                </div>
              `;
            })
            .join('');

          // Destruir la instancia anterior de Swiper si existe
          if (swiperInstance) {
            swiperInstance.destroy(true, true);
          }

          // Reiniciar el carrusel Swiper para que detecte los nuevos slides
          swiperInstance = new Swiper('.swiperEventos', {
            loop: true,
            autoplay: {
              delay: 3000,
            },
            pagination: {
              el: '.swiper-pagination',
            },
          });
          // Actualizar la categoría activa
          activeCategory = categorySlug;
        } else {
          swiperEventos.innerHTML = '<div class="swiper-slide">No se encontraron posts.</div>';
        }
      })
      .catch((error) => {
        console.error('Error:', error);
        swiperEventos.innerHTML = '<div class="swiper-slide">Ocurrió un error al cargar los posts.</div>';
      });
  };

  // Cargar "Webinars" por defecto al cargar la página
  loadPosts('webinars', true);

  // Manejar clics en los botones
  buttons.forEach((button) => {
    button.addEventListener('click', () => {
      // Actualizar el estado activo
      buttons.forEach((btn) => btn.classList.remove('active'));
      button.classList.add('active');

      // Cargar posts de la categoría seleccionada
      const categorySlug = button.getAttribute('data-category-slug');
      loadPosts(categorySlug);
    });
  });
});
