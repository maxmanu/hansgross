<?php
/*
Template Name:  Nosotros
*/
get_header();
?>

<header id="miDiv" class="continer-fluid" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/bg-hero-nosotros.webp); background-repeat: no-repeat; background-size: cover">
  <div id="overlay"></div>
  <div id="contenidoDiv">
    <?php get_template_part('template-parts/content', 'nav'); ?>
    <div class="container my-auto pb-3">
      <div class="row align-items-center hero-banner">
        <div class="col-md-7">
          <h1 class="banner-title">NOSOTROS</h1>
          <p class="banner-subtitle">Contribuir con objetividad y apego a la verdad.</p>
        </div>
      </div>
    </div>
  </div>
</header>

<section class="section-quienes-somos ptb-100">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5 text-white">
        <div class="row">
          <div class="col-auto">
            <span class="square"></span>
          </div>
          <div class="col">
            <h2 class="">Quiénes Somos</h2>
            <p class="text-justify">Hans Gross es una empresa líder con más de 23 años de experiencia brindando servicios periciales particulares. Siempre vanguardista en el uso de tecnologías forenses dedicadas a resolver controversias o responder incertidumbre dentro de los procesos judiciales o administrativos de la mano de nuestro personal altamente calificado en las diversas disciplinas criminalísticas.</p>
            <p class="text-justify">Actualmente Hans Gross cuenta con la representación de diversas marcas reconocidas en el mundo de la Criminalística y es proveedor de las principales entidades estatales dedicadas a la investigación criminal.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 offset-lg-1">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-quienes-somos.webp" class="img-fluid" alt="">
      </div>
    </div>
  </div>
</section>

<section class="section-equipo">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto text-center">
        <h2 class="colorgreen">Nuestro equipo</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
      </div>
    </div>
    <!-- <div class="row">
      <div class="col">
        <div class="swiper swiperEquipo">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-equipo.webp" class="card-img-top" alt="...">
                <div class="card-eq">
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-2">
                        <span class="square square--equipo"></span>
                      </div>
                      <div class="col-auto">
                        <p class="card-title mb-0"><b>Alberto Álvarez</b></p>
                        <small>Gerente general</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-equipo.webp" class="card-img-top" alt="...">
                <div class="card-eq">
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-2">
                        <span class="square square--equipo"></span>
                      </div>
                      <div class="col-auto">
                        <p class="card-title mb-0"><b>Alberto Álvarez</b></p>
                        <small>Gerente general</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-equipo.webp" class="card-img-top" alt="...">
                <div class="card-eq">
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-2">
                        <span class="square square--equipo"></span>
                      </div>
                      <div class="col-auto">
                        <p class="card-title mb-0"><b>Alberto Álvarez</b></p>
                        <small>Gerente general</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-equipo.webp" class="card-img-top" alt="...">
                <div class="card-eq">
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-2">
                        <span class="square square--equipo"></span>
                      </div>
                      <div class="col-auto">
                        <p class="card-title mb-0">Alberto Álvarez</p>
                        <p class="card-text">Gerente general</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-equipo.webp" class="card-img-top" alt="...">
                <div class="card-eq">
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-2">
                        <span class="square square--equipo"></span>
                      </div>
                      <div class="col-auto">
                        <p class="card-title mb-0">Alberto Álvarez</p>
                        <p class="card-text">Gerente general</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
        <div id="button-prev-equipo" class="swiper-button-prev"></div>
        <div id="button-next-equipo" class="swiper-button-next"></div>
      </div>
    </div> -->
    <div class="row">
      <section class="splide" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
          <ul class="splide__list">
            <li class="splide__slide">
              <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-equipo.webp" class="card-img-top" alt="...">
                <div class="card-eq">
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-2">
                        <span class="square square--equipo"></span>
                      </div>
                      <div class="col-auto">
                        <p class="card-title mb-0"><b>Alberto Álvarez</b></p>
                        <small>Gerente general</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="splide__slide">
              <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-equipo.webp" class="card-img-top" alt="...">
                <div class="card-eq">
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-2">
                        <span class="square square--equipo"></span>
                      </div>
                      <div class="col-auto">
                        <p class="card-title mb-0"><b>Alberto Álvarez</b></p>
                        <small>Gerente general</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="splide__slide">
              <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-equipo.webp" class="card-img-top" alt="...">
                <div class="card-eq">
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-2">
                        <span class="square square--equipo"></span>
                      </div>
                      <div class="col-auto">
                        <p class="card-title mb-0"><b>Alberto Álvarez</b></p>
                        <small>Gerente general</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="splide__slide">
              <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-equipo.webp" class="card-img-top" alt="...">
                <div class="card-eq">
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-2">
                        <span class="square square--equipo"></span>
                      </div>
                      <div class="col-auto">
                        <p class="card-title mb-0"><b>Alberto Álvarez</b></p>
                        <small>Gerente general</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="splide__slide">
              <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-equipo.webp" class="card-img-top" alt="...">
                <div class="card-eq">
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-2">
                        <span class="square square--equipo"></span>
                      </div>
                      <div class="col-auto">
                        <p class="card-title mb-0"><b>Alberto Álvarez</b></p>
                        <small>Gerente general</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </section>
    </div>
  </div>
</section>
<section class="section-mision ptb-100">
  <div class="container">
    <div class="row row--mision">
      <div class="col-lg-6 col--mision" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/img-mision.webp); background-repeat: no-repeat; background-size: cover;background-position:center;">
        <div class="row h-100 align-items-end pb-4 ps-4">
          <div class="col-auto">
            <span class="square"></span>
          </div>
          <div class="col">
            <h2 class="mb-0 text-white">Misión</h2>
          </div>
        </div>
      </div>
      <div class="col-lg-6 d-flex align-items-center">
        <p>Contribuir con objetividad y apego a la verdad, a resolver controversias o responder incertidumbres dentro de los procesos judiciales y/o administrativos que requieran nuestros servicios. Fomentar el interés por la Criminalística, ofreciendo capacitaciones de calidad empleando nuevas tecnologías</p>
      </div>
    </div>
    <div class="row row--vision position-relative">
      <div class="boxes-decor"></div>
      <div class="col-lg-8 d-flex align-items-center">
        <p class="vision-text">Consolidarnos como empresa líder brindando servicios en probática pericial en las diversas especialidades de la Criminalística. Ser reconocidos como empresa éticamente profesional de trabajo objetivo.</p>
      </div>
      <div class="col-lg-4">
        <div class="row h-100 align-items-end pb-5 ps-4">
          <div class="col-auto">
            <span class="square square--grey"></span>
          </div>
          <div class="col">
            <h2 class="mb-0">Visión</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
?>