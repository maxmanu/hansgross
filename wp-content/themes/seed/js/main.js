/**
 * CAROUSEL SWIPER
 */

// const swiperEventos = new Swiper('.swiperEventos', {
//   loop: true,
//   pagination: {
//     el: '.swiper-pagination',
//   },
// });

const swiperServicios = new Swiper('.swiperServicios', {
  slidesPerView: 1,
  spaceBetween: 30,
  navigation: {
    nextEl: '#button-next-servicios',
    prevEl: '#button-prev-servicios',
  },
  breakpoints: {
    1200: {
      slidesPerView: 'auto',
    },
  },
});

const swiperServiciosMain = new Swiper('.swiperServiciosMain', {
  slidesPerView: 1,
  centeredSlides: true, // Centra la diapositiva activa
  loop: true,
  spaceBetween: 20,
  navigation: {
    nextEl: '#button-next-serviciosMain',
    prevEl: '#button-prev-serviciosMain',
  },
  breakpoints: {
    540: {
      slidesPerView: 1.5,
    },
    768: {
      slidesPerView: 2.5,
    },
    991: {
      slidesPerView: 3.5,
    },
    1200: {
      slidesPerView: 4.5,
    },
  },
});

const swiperServicios2 = new Swiper('.swiperServicios2', {
  loop: true,
  pagination: {
    el: '.swiper-pagination2',
    clickable: true,
  },
});

const swiperServicios3 = new Swiper('.swiperServicios3', {
  loop: true,
  pagination: {
    el: '.swiper-pagination3',
    clickable: true,
  },
});
const swiperLogosClientes = new Swiper('.swiperLogosClientes', {
  slidesPerView: 1,
  spaceBetween: 30,
  speed: 6500,
  freeMode: true,
  disableOnInteraction: false,
  autoplay: {
    delay: 0,
  },
  loop: true,
  breakpoints: {
    540: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    991: {
      slidesPerView: 4,
    },
    1200: {
      slidesPerView: 5,
    },
  },
});
const swiperSoftwares = new Swiper('.swiperSoftwares', {
  slidesPerView: 1,
  spaceBetween: 0,
  loop: true,
  navigation: {
    nextEl: '#button-next-software',
    prevEl: '#button-prev-software',
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
    },
    991: {
      slidesPerView: 4,
    },
    1200: {
      slidesPerView: 6,
    },
  },
});

const swiperEquipo = new Swiper('.swiperEquipo', {
  slidesPerView: 1,
  spaceBetween: 30,
  navigation: {
    nextEl: '#button-next-equipo',
    prevEl: '#button-prev-equipo',
  },
  pagination: {
    el: '.swiper-pagination',
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
    },
    1200: {
      slidesPerView: 3,
    },
  },
});

/**
 * FIXED MENU
 */

window.addEventListener('scroll', function () {
  const navbar = document.getElementById('mainNavbar');
  if (window.scrollY > 50) {
    // Puedes ajustar el valor según cuándo quieras que cambie el fondo
    navbar.classList.add('scrolled');
  } else {
    navbar.classList.remove('scrolled');
  }
});

/**
 * BOTONES CERTIFICADOS
 */

document.addEventListener('DOMContentLoaded', () => {
  // Obtén las tarjetas y el contenedor de descripción
  const cards = document.querySelectorAll('.card--btn-event'); // Todas las tarjetas
  const descriptionCard = document.querySelector('.card--eventos-description .card-content'); // Contenedor de descripción

  // Verifica que existan las tarjetas y el contenedor
  if (cards && descriptionCard) {
    // Función para cambiar el contenido dinámico
    function changeContent(card) {
      const title = card.querySelector('.card-img-overlay p').textContent; // Título desde el HTML
      const content = card.getAttribute('data-content'); // Descripción desde atributo data-content
      const link = card.getAttribute('data-link'); // Enlace desde atributo data-link

      // Actualiza dinámicamente el contenido
      descriptionCard.innerHTML = `
        <h2 class="colorgreen">${title}</h2>
        <p>${content}</p>
        <a href="${link}"><button class="btn btn-hans btn-hans--green">Ver más</button></a>
      `;
    }

    // Función para manejar la clase activa
    function setActiveCard(selectedCard) {
      // Remueve la clase activa de todas las tarjetas
      cards.forEach((card) => card.classList.remove('active'));
      // Agrega la clase activa a la tarjeta seleccionada
      selectedCard.classList.add('active');
    }

    // Añade eventos de clic a cada tarjeta
    cards.forEach((card) => {
      card.addEventListener('click', () => {
        // Cambia la tarjeta activa
        setActiveCard(card);
        // Actualiza el contenido basado en la tarjeta seleccionada
        changeContent(card);
      });
    });

    // Inicializa el contenido con la tarjeta que tiene la clase "active" al cargar la página
    const activeCard = document.querySelector('.card--btn-event.active');
    if (activeCard) {
      changeContent(activeCard);
    }
  } else {
    console.error('No se encontraron las tarjetas o el contenedor de descripción.');
  }
});

/**
 * FIXED SIDEBAR SINGLE COURSE
 */
document.addEventListener('DOMContentLoaded', function () {
  if (window.location.pathname.includes('single-curso.php')) {
    window.addEventListener('scroll', function () {
      var section = document.querySelector('.section-sidebar-feat');
      var headerHeight = document.querySelector('header').offsetHeight; // Altura del header
      var footer = document.querySelector('footer'); // Selecciona el footer
      var footerOffsetTop = footer.offsetTop; // La posición del footer desde la parte superior de la página
      var sectionHeight = section.offsetHeight; // Altura de la sección

      // Si el scroll supera la altura del header, la sección se vuelve fixed
      if (window.scrollY >= headerHeight && window.scrollY + sectionHeight < footerOffsetTop) {
        section.classList.add('fixed');
        section.classList.remove('absolute-bottom');
      }
      // Si la sección alcanza el footer, se posiciona al fondo y se vuelve absolute
      else if (window.scrollY + sectionHeight >= footerOffsetTop) {
        section.classList.remove('fixed');
        section.classList.add('absolute-bottom');
      }
      // Si está por encima del header, vuelve a la posición original
      else {
        section.classList.remove('fixed', 'absolute-bottom');
      }
    });
  }
});

// Selecciona el botón del menú hamburguesa
const menuToggleButton = document.querySelector('.navbar-toggler');
const navbar = document.getElementById('mainNavbar');

// Escucha el evento de clic en el botón
menuToggleButton.addEventListener('click', function () {
  if (!menuToggleButton.classList.contains('collapsed')) {
    // Si el botón no tiene la clase 'collapsed', añade una clase al padre
    navbar.classList.add('menu-expanded');
  } else {
    // Si el botón tiene la clase 'collapsed', remueve la clase del padre
    navbar.classList.remove('menu-expanded');
  }
});
