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
  // Obtén los elementos de los botones y la descripción
  const webinarsBtn = document.getElementById('webinars');
  const cursosBtn = document.getElementById('cursos');
  const descriptionCard = document.querySelector('.card--eventos-description .card-content');

  // Verifica que los elementos existan
  if (webinarsBtn && cursosBtn && descriptionCard) {
    // Función para cambiar el contenido
    function changeContent(title, content, link) {
      descriptionCard.innerHTML = `
        <h2 class="colorgreen">${title}</h2>
        <p>${content}</p>
        <a href="${link}"><button class="btn btn-hans btn-hans--green">Ver más</button></a>
      `;
    }

    // Función para manejar la clase activa
    function setActiveButton(selectedButton) {
      // Remueve la clase activa de ambos botones
      webinarsBtn.classList.remove('active');
      cursosBtn.classList.remove('active');

      // Agrega la clase activa al botón seleccionado
      selectedButton.classList.add('active');
    }

    // Asigna la clase activa y cambia el contenido al cargar la página
    setActiveButton(webinarsBtn);
    changeContent(
      'Webinars',
      'Descubre una variedad de webinars diseñados para mejorar tus habilidades en distintas áreas de conocimiento.',
      '/academico'
    );

    // Añade los eventos de clic a cada botón para cambiar el contenido y el estado activo
    webinarsBtn.addEventListener('click', () => {
      setActiveButton(webinarsBtn);
      changeContent(
        'Webinars',
        'Descubre una variedad de webinars diseñados para mejorar tus habilidades en distintas áreas de conocimiento.',
        '/academico'
      );
    });

    cursosBtn.addEventListener('click', () => {
      setActiveButton(cursosBtn);
      changeContent(
        'Cursos',
        'Descubre una variedad de cursos diseñados para mejorar tus habilidades en distintas áreas de conocimiento.',
        '/academico'
      );
    });
  } else {
    console.error('No se encontraron todos los elementos necesarios en el DOM.');
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
