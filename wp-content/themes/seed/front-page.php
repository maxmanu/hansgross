<?php
get_header();
?>

<header id="miDiv" class="continer-fluid" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/bg-hero-home.webp); background-repeat: no-repeat; background-size: cover">
  <div id="overlay"></div>
  <div id="contenidoDiv">
    <?php get_template_part('template-parts/content', 'nav'); ?>
    <div class="container my-auto pb-3">
      <div class="row align-items-center hero-banner">
        <div class="col-md-7">
          <h1 class="banner-title pb-4">CRIMINALÍSTICA <br> CIBERNÉTICA</h1>
          <a href="/contactanos"><button class="btn btn-hans btn-hans--green">Contáctanos</button></a>
        </div>
      </div>
    </div>
  </div>
</header>

<section class="section-clientes">
  <div class="container">
    <div class="row align-items-center py-3">
      <div class="col-lg-3">
        <p class="mb-0">NUESTROS CLIENTES</p>
      </div>
      <div class="col-lg-9">
        <div class="swiper swiperLogosClientes">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide">
              <div class="col text-center"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/chimu-logo.png" alt="" class="img-fluid"></div>
            </div>
            <div class="swiper-slide">
              <div class="col text-center"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/asbac-logo.png" alt="" class="img-fluid"></div>
            </div>
            <div class="swiper-slide">
              <div class="col text-center"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/mapfre-logo.png" alt="" class="img-fluid"></div>
            </div>
            <div class="swiper-slide">
              <div class="col text-center"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/marina-logo.png" alt="" class="img-fluid"></div>
            </div>
            <div class="swiper-slide">
              <div class="col text-center"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/caja-logo.png" alt="" class="img-fluid"></div>
            </div>
            <div class="swiper-slide">
              <div class="col text-center"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/chimu-logo.png" alt="" class="img-fluid"></div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-eventos ptb-100">
  <div class="text-center mb-5">
    <h2 class="colorgreen-2">Eventos Académicos</h2>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. <br>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
  </div>
  <div class="container">
    <div class="grid">
      <div class="swiper swiperEventos">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-card.webp" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-title">Criminalista cibernética y Informática Forense</p>
                <p class="card-text">17 de octubre | 7:00 pm a 8:00 pm</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-card.webp" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-title">Criminalista cibernética y Informática Forense</p>
                <p class="card-text">17 de octubre | 7:00 pm a 8:00 pm</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-card.webp" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-title">Criminalista cibernética y Informática Forense</p>
                <p class="card-text">17 de octubre | 7:00 pm a 8:00 pm</p>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="col-right-event">
        <div class="card card--eventos-description">
          <div class="card-content pt-5">
            <h2 class="colorgreen">Webinars</h2>
            <p>Descubre una variedad de webinars diseñados para mejorar tus habilidades en distintas áreas de conocimiento.</p>
            <a href=""><button class="btn btn-hans btn-hans--green">Ver más</button></a>
          </div>
        </div>
        <div class="grid" style="margin-top: 20px;">
          <div id="webinars" class="card card--btn-event active text-bg-dark">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-card.webp" class="card-img" alt="...">
            <div class="card-img-overlay">
              <p class="">Webinars</p>
            </div>
          </div>
          <div id="cursos" class="card card--btn-event text-bg-dark">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-card.webp" class="card-img" alt="...">
            <div class="card-img-overlay">
              <p class="">Cursos</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-certificados ptb-100">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-decor-left.png" class="card-img" alt="...">
      </div>
      <div class="col-lg-4 text-center text-white">
        <h2>Certificados</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <a href="/certificados"><button class="btn btn-hans btn-hans--white mt-4">Buscar</button></a>
      </div>
      <div class="col-lg-4">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-decor-right.png" class="card-img" alt="...">
      </div>
    </div>
  </div>
</section>

<section class="section-servicios">
  <div class="container container-fluid-right">
    <div class="row">
      <div class="col-lg-4">
        <div class="col-section-title text-white mt-5">
          <h2 class="title-carousel-section mb-0">Conoce <br> Nuestros servicios</h2>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
          <div class="d-flex justify-content-start arrows-swipper position-relative pt-4">
            <div id="button-prev-servicios" class="btn-arrows-servicios ms-0 me-2">
              <i class="bi bi-arrow-left"></i>
            </div>
            <div id="button-next-servicios" class="btn-arrows-servicios">
              <i class="bi bi-arrow-right"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 position-relative">
        <div class="decor-green"></div>
        <div class="swiper swiperServicios">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-card-service.webp" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-title">Accidente de transito</p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-card-service.webp" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-title">Accidente de transito</p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-card-service.webp" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-title">Accidente de transito</p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-card-service.webp" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-title">Accidente de transito</p>
                </div>
              </div>
            </div>
          </div>
          <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-softwares">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 ms-auto text-white">
        <h2 class="colorgreen">Software empleados</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy</p>
        <a href="/softwares"><button class="btn btn-hans btn-hans--white mt-4">Ver más</button></a>
      </div>
    </div>
    <div class="row row-softwares">
      <div class="col position-relative">
        <div class="swiper swiperSoftwares">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="card-software">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-amped.png" class="card-img-top" alt="...">
              </div>
              <div class="btn btn-arrows-servicios">
                <i class="bi bi-arrow-right"></i>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card-software">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-magnet.png" class="card-img-top" alt="...">
              </div>
              <div class="btn btn-arrows-servicios">
                <i class="bi bi-arrow-right"></i>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card-software">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-salvation.png" class="card-img-top" alt="...">
              </div>
              <div class="btn btn-arrows-servicios">
                <i class="bi bi-arrow-right"></i>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card-software">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-mobil.png" class="card-img-top" alt="...">
              </div>
              <div class="btn btn-arrows-servicios">
                <i class="bi bi-arrow-right"></i>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card-software">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-3dsystems.png" class="card-img-top" alt="...">
              </div>
              <div class="btn btn-arrows-servicios">
                <i class="bi bi-arrow-right"></i>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card-software">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-oxygen.png" class="card-img-top" alt="...">
              </div>
              <div class="btn btn-arrows-servicios">
                <i class="bi bi-arrow-right"></i>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card-software">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-oxygen.png" class="card-img-top" alt="...">
              </div>
              <div class="btn btn-arrows-servicios">
                <i class="bi bi-arrow-right"></i>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card-software">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-oxygen.png" class="card-img-top" alt="...">
              </div>
              <div class="btn btn-arrows-servicios">
                <i class="bi bi-arrow-right"></i>
              </div>
            </div>
          </div>
          <!-- If we need navigation buttons -->
          <div id="button-prev-software" class="swiper-button-prev">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-soft-left.svg" class="arrow-soft" alt="...">
          </div>
          <div id="button-next-software" class="swiper-button-next">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-soft-right.svg" class="arrow-soft" alt="...">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
?>