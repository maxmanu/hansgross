<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package seed
 */

?>

<footer>
  <div class="top-footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-3 text-center">
          <a href="index.php">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/LOGO.svg" alt="" class="img-fluid pb-4 logo-footer" />
          </a>
        </div>
        <div class="col-xl-9">
          <div class="row row-contact">
            <div class="col-lg-3 col-md-6 col-somos ">
              <div class="container">
                <div class="row align-items-center">
                  <a href="">
                    <div class="col-xl-10 mx-auto">
                      <div class="d-flex align-items-center col-menu-tab">
                        <div class="flex-shrink-0">
                          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/whatsapp-top-footer-icon.png" class="icon-fot" alt="...">
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <h6 class="mb-0 text-white">+51 971 596 045</h6>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-servicios ">
              <div class="container">
                <div class="row align-items-center">
                  <a href="">
                    <div class="col-xl-9 mx-auto">
                      <div class="d-flex align-items-center col-menu-tab">
                        <div class="flex-shrink-0">
                          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/mail-top-footer-icon.png" class="icon-fot" alt="...">
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <h6 class="mb-0 text-white">info@hansgross.com.pe</h6>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-12 col-laboratorio">
              <div class="container">
                <div class="row align-items-center">
                  <a href="">
                    <div class="col-xl-12 mx-auto">
                      <div class="d-flex align-items-center col-menu-tab">
                        <div class="flex-shrink-0">
                          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/map-top-footer-icon.png" class="icon-fot" alt="...">
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <h6 class="mb-0 text-white">Av. América Oeste Mz. M Lt. 07 - A Ofc. 603 Urb. Natasha Alta Trujillo - Perú</h6>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-xl-3">
          <div class="social-links justify-content-center">
            <a href="#" class="mx-2" target="_blank">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook-icon.svg" alt="" class="img-fluid">
            </a>
            <a href="#" class="mx-2" target="_blank">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/instagram-icon.svg" alt="" class="img-fluid">
            </a>
            <a href="#" class="mx-2" target="_blank">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/linkedin-icon.svg" alt="" class="img-fluid">
            </a>
            <a href="#" class="mx-2" target="_blank">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/whatsapp-icon.svg" alt="" class="img-fluid">
            </a>
          </div>
        </div>
        <div class="col-xl-9">
          <div class="row justify-content-around row-footer-menu">
            <div class="col-md-auto col-6">
              <p class="top-title"><a href="/nosotros">Nosotros</a></p>
            </div>
            <div class="col-md-auto col-6">
              <p class="top-title"><a href="/servicios">Servicios</a></p>
            </div>
            <div class="col-md-auto col-6">
              <p class="top-title"><a href="/academico">Académico</a></p>
            </div>
            <div class="col-md-auto col-6">
              <p class="top-title"><a href="/certificados">Certificados</a></p>
            </div>
            <div class="col-md-auto col-6">
              <p class="top-title"><a href="/softwares">Software</a></p>
            </div>
            <div class="col-md-auto col-6">
              <p class="top-title"><a href="/blog">Blog</a></p>
            </div>
            <div class="col-md-auto col-6">
              <p class="top-title"><a href="/contactanos">Contáctanos</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bottom-footer text-center">
    <small>© 2024 Hans Gross-Criminalística Cibernética | Todos los Derechos Reservados. Desarrollado por Obi Consulting</small>
  </div>
</footer>

<?php wp_footer(); ?>

<?php if (is_page_template('page-templates/t_page_laboratorio.php')) { ?>
  <script>
    const swiper = new Swiper('.swiper', {
      slidesPerView: 4,
      spaceBetween: 30,
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 50,
        },
      },
    });
  </script>
<?php } ?>

</body>

</html>