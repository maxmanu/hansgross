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
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  breakpoints: {
    1200: {
      slidesPerView: 'auto',
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

document.addEventListener('DOMContentLoaded', function () {
  // Obtiene el parámetro 'slide' de la URL
  const urlParams = new URLSearchParams(window.location.search);
  const slideId = urlParams.get('slide'); // Obtener el ID del slide desde la URL

  let initialIndex = 0; // Valor por defecto si no hay slide en la URL
  const slides = document.querySelectorAll('.swiper-slide');

  if (slideId) {
    slides.forEach((slide, index) => {
      if (slide.getAttribute('data-slide') === slideId) {
        initialIndex = index; // Buscar el índice correcto
      }
    });
  }

  const swiperServiciosMain = new Swiper('.swiperServiciosMain', {
    slidesPerView: 'auto',
    centeredSlides: true, // Centra la diapositiva activa
    loop: true,
    loopAdditionalSlides: 1,
    spaceBetween: 20,
    navigation: {
      nextEl: '#button-next-serviciosMain',
      prevEl: '#button-prev-serviciosMain',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
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
    on: {
      init: function () {
        if (slideId) {
          setTimeout(() => {
            swiperServiciosMain.slideToLoop(initialIndex, 0); // Usar slideToLoop() en vez de initialSlide
          }, 100);
        }
      },
    },
  });

  const swiperSoftwares = new Swiper('.swiperSoftwares', {
    slidesPerView: 1,
    spaceBetween: 0,
    centeredSlides: true, // Centra la diapositiva activa
    loop: true,
    loopAdditionalSlides: 0,
    navigation: {
      nextEl: '#button-next-software',
      prevEl: '#button-prev-software',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    breakpoints: {
      768: { slidesPerView: 3 },
      1200: { slidesPerView: 5 },
    },
    on: {
      init: function () {
        if (slideId) {
          setTimeout(() => {
            swiperSoftwares.slideToLoop(initialIndex, 0); // Usar slideToLoop() en vez de initialSlide
          }, 100);
        }
      },
    },
  });
});
