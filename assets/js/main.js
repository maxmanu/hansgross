/**
 * CAROUSEL SWIPER
 */

const swiperEventos = new Swiper('.swiperEventos', {
  loop: true,
  pagination: {
    el: '.swiper-pagination',
  },
});

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
  loop: true,
  spaceBetween: 30,
  navigation: {
    nextEl: '#button-next-serviciosMain',
    prevEl: '#button-prev-serviciosMain',
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
    },
    991: {
      slidesPerView: 3,
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
  slidesPerView: 3,
  spaceBetween: 30,
  navigation: {
    nextEl: '#button-next-equipo',
    prevEl: '#button-prev-equipo',
  },
  pagination: {
    el: '.swiper-pagination',
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

    // Añade los eventos de clic a cada botón
    webinarsBtn.addEventListener('click', () => {
      changeContent(
        'Webinars',
        'Descubre una variedad de webinars diseñados para mejorar tus habilidades en distintas áreas de conocimiento.',
        '#'
      );
    });

    cursosBtn.addEventListener('click', () => {
      changeContent(
        'Cursos',
        'Descubre una variedad de cursos diseñados para mejorar tus habilidades en distintas áreas de conocimiento.',
        '#'
      );
    });
  } else {
    console.error('No se encontraron todos los elementos necesarios en el DOM.');
  }
});

/**
 * FIXED SIDEBAR SINGLE COURSE
 */
// window.addEventListener('scroll', function () {
//   var section = document.querySelector('.section-sidebar-feat');
//   var headerHeight = document.querySelector('header').offsetHeight; // La altura del header

//   // Verifica si el usuario ha hecho scroll lo suficiente
//   if (window.scrollY >= headerHeight) {
//     section.classList.add('fixed');
//   } else {
//     section.classList.remove('fixed');
//   }
// });
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
