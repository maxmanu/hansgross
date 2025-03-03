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
  // 1. Obtener el valor 'selectedSlide' almacenado en sessionStorage
  let slideId = sessionStorage.getItem('selectedSlide');

  // 2. Calcular el índice del slide que coincide con el valor almacenado
  let initialIndex = 0; // Valor por defecto si no hay slide en la URL
  const slides = document.querySelectorAll('.swiper-slide');

  if (slideId) {
    slides.forEach((slide, index) => {
      if (slide.getAttribute('data-slide') === slideId) {
        initialIndex = index; // Buscar el índice correcto
      }
    });
  }

  // 3. Configurar el Swiper.
  // Nota: El slider se comporta distinto según la cantidad de slides,
  // por eso se usa centeredSlides y loop si hay más de 6 diapositivas.
  const totalSlidesSoftwares = document.querySelectorAll('.swiperSoftwares .swiper-slide').length;
  const swiperSoftwares = new Swiper('.swiperSoftwares', {
    slidesPerView: 1,
    spaceBetween: 0,
    centeredSlides: totalSlidesSoftwares > 6, // Centra la diapositiva activa si hay más de 6 diapositivas
    loop: totalSlidesSoftwares > 6, // Solo activa loop si hay más de 6 diapositivas
    loopAdditionalSlides: totalSlidesSoftwares > 6 ? 1 : 0, // Evita duplicados innecesarios si hay pocas diapositivas
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
        // Si hay un slide almacenado en sessionStorage, reposicionar el slider
        if (slideId) {
          setTimeout(() => {
            swiperSoftwares.slideToLoop(initialIndex, 0); // Usar slideToLoop() en vez de initialSlide
          }, 100);
        }
      },
    },
  });

  // 3. Configurar el Swiper.
  const totalSlidesServicios = document.querySelectorAll('.swiperServiciosMain .swiper-slide').length;
  const swiperServiciosMain = new Swiper('.swiperServiciosMain', {
    slidesPerView: 'auto',
    centeredSlides: totalSlidesServicios > 6, // Centra la diapositiva activa si hay más de 6 diapositivas
    loop: totalSlidesServicios > 6, // Solo activa loop si hay más de 6 diapositivas
    loopAdditionalSlides: totalSlidesServicios > 6 ? 1 : 0, // Evita duplicados innecesarios si hay pocas diapositivas
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

  // 4. Actualizar sessionStorage cuando se haga clic en un slide
  slides.forEach((slide) => {
    slide.addEventListener('click', function () {
      const id = slide.getAttribute('data-slide');
      sessionStorage.setItem('selectedSlide', id);
    });
  });
});
