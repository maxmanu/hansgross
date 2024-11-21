<?php
/*
Template Name:  Contactanos
*/
get_header();
?>

<header id="miDiv" class="continer-fluid" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/bg-hero-contacto.webp); background-repeat: no-repeat; background-size: cover; background-position:center;">
  <div id="overlay"></div>
  <div id="contenidoDiv">
    <?php get_template_part('template-parts/content', 'nav'); ?>
    <div class="container my-auto pb-3">
      <div class="row align-items-center hero-banner">
        <div class="col-md-7">
          <h1 class="banner-title">CONTÁCTANOS</h1>
          <p class="banner-subtitle">Contribuir con objetividad <br> y apego a la verdad.</p>
        </div>
      </div>
    </div>
  </div>
</header>

<section class="section-table-certificados ptb-100">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-8 mx-auto text-center">
        <h2 class="colorgreen">Información de contacto</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-lg-10 mx-auto">
        <div class="row">
          <div class="col-md-4 text-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-green-whatsapp.png" class="img-fluid mb-4" alt="...">
            <p class="colorgreen">+51 971 596 045</p>
          </div>
          <div class="col-md-4 text-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-green-email.png" class="img-fluid mb-4" alt="...">
            <p class="colorgreen">info@hansgross.com.pe</p>
          </div>
          <div class="col-md-4 text-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-green-map.png" class="img-fluid mb-4" alt="...">
            <p class="colorgreen">Av. América Oeste Mz. M Lt. 07 - A Ofc. 603 Urb. Natasha Alta Trujillo - Perú</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-eventos ptb-100">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="text-start mb-5">
          <h2 class="colorgreen-2">Envíanos un mensaje</h2>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</p>
        </div>
      </div>
    </div>

    <form class="row g-5 contact-form">
      <div class="col-lg-7">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nombre y apellido</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="row">
          <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Celular</label>
            <input type="text" class="form-control" placeholder="" aria-label="First name">
          </div>
          <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="" aria-label="Last name">
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Mensaje</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
        </div>
      </div>
      <div class="col-12 text-center">
        <button class="btn btn-hans btn-hans--green">Enviar</button>
      </div>
    </form>
  </div>

</section>

<?php
get_footer();
?>