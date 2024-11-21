<?php
get_header();
?>

<header id="miDiv" class="continer-fluid software-page" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/bg-hero-softwares.webp); background-repeat: no-repeat; background-size: cover">
  <div id="overlay"></div>
  <div id="contenidoDiv">
    <?php
    include("template-parts/navbar.php");
    ?>
    <div class="container my-auto pb-3">
      <div class="row align-items-center hero-banner">
        <div class="col-md-8">
          <h1 class="banner-title">SOFTWARES EMPLEADOS</h1>
          <p class="banner-subtitle">Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
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
  </div>
</header>

<section class="section-software-description ptb-100">
  <div class="container">
    <div class="row mb-4">
      <div class="col-lg-6">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-logo-software-single.webp" class="img-fluid img-single-software mb-5" alt="...">
        <h2 class="colorgreen-2">Lorem Ipsum is simply</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy</p>
      </div>
      <div class="col-lg-6 text-lg-end text-center">
        <div class="position-relative mb-3">
          <a data-fslightbox="gallery" href="https://www.youtube.com/watch?v=3nQNiWdeH2Q">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-person-video.png" alt="" class="img-fluid position-relative img-description">
            <div class="btn-play-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/btn-play.svg" class="btn-play" alt="">
            </div>
          </a>
        </div>
        <button class="btn btn-download">
          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-expediente.png" style="width:30px;padding-bottom:5px;" alt=""></span>
          Descargar Brochure
        </button>
      </div>
    </div>
    <div class="row align-items-center mb-4">
      <div class="col-lg-6">
        <div class="wrap wrap2">
          <img class="imga img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/dactiloscopia.webp" alt="">
          <img class="imgb img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/img-right-soft.webp" alt="">
        </div>
      </div>
      <div class="col-lg-6">
        <h2 class="colorgreen-2">Lorem Ipsum is simply</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy </p>
        <a href="#" class="mostrar-mas">Mostrar más</a>
      </div>
    </div>
  </div>
</section>

<section class="section-contactanos ptb-50">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5">
        <h2 class="colorgreen">Contáctanos</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
        <div class="">
          <a href="/contactanos"><button class="btn btn-hans btn-hans--green">Por Whatsapp</button></a>
          <a href="/contactanos"><button class="btn btn-hans btn-hans--green">Ver más</button></a>
        </div>
      </div>
      <div class="col-lg-7">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/decor-contactanos.png" alt="" class="img-fluid">
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
?>