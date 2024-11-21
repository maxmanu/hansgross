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
              <svg width="59" height="59" viewBox="0 0 59 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="29.4999" cy="29.4999" r="29.4999" fill="#fff" />
                <circle cx="29.4999" cy="29.4999" r="28.8853" stroke="white" stroke-opacity="0.5" stroke-width="1.22916" />
                <path d="M24.7015 45.7825H31.556V32.0565H37.7318L38.4104 25.2363H31.556V21.7919C31.556 21.3375 31.7365 20.9016 32.0579 20.5802C32.3792 20.2589 32.8151 20.0783 33.2696 20.0783H38.4104V13.2239H33.2696C30.9972 13.2239 28.8179 14.1266 27.211 15.7334C25.6042 17.3402 24.7015 19.5195 24.7015 21.7919V25.2363H21.2743L20.5957 32.0565H24.7015V45.7825Z" fill="#06834D" />
              </svg>
            </a>
            <a href="#" class="mx-2" target="_blank">
              <svg width="59" height="59" viewBox="0 0 59 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="29.4999" cy="29.5" r="29.4999" fill="#fff" />
                <circle cx="29.4999" cy="29.5" r="28.8853" stroke="white" stroke-opacity="0.5" stroke-width="1.22916" />
                <path d="M29.5182 14.6031C33.5668 14.6031 34.0719 14.6181 35.6603 14.6926C37.2473 14.7671 38.3276 15.0159 39.2783 15.3855C40.2618 15.7639 41.0903 16.2765 41.9188 17.1035C42.6765 17.8484 43.2628 18.7495 43.6368 19.744C44.0049 20.6932 44.2552 21.775 44.3297 23.3619C44.3998 24.9504 44.4191 25.4555 44.4191 29.5041C44.4191 33.5527 44.4042 34.0579 44.3297 35.6463C44.2552 37.2333 44.0049 38.3136 43.6368 39.2643C43.2638 40.2593 42.6774 41.1606 41.9188 41.9047C41.1737 42.6622 40.2727 43.2484 39.2783 43.6228C38.3291 43.9909 37.2473 44.2412 35.6603 44.3157C34.0719 44.3857 33.5668 44.4051 29.5182 44.4051C25.4696 44.4051 24.9644 44.3902 23.376 44.3157C21.789 44.2412 20.7087 43.9909 19.758 43.6228C18.7631 43.2495 17.8619 42.6631 17.1176 41.9047C16.3597 41.1599 15.7734 40.2589 15.3995 39.2643C15.0299 38.3151 14.7811 37.2333 14.7066 35.6463C14.6366 34.0579 14.6172 33.5527 14.6172 29.5041C14.6172 25.4555 14.6321 24.9504 14.7066 23.3619C14.7811 21.7735 15.0299 20.6947 15.3995 19.744C15.7724 18.7489 16.3588 17.8476 17.1176 17.1035C17.8621 16.3454 18.7633 15.7591 19.758 15.3855C20.7087 15.0159 21.7875 14.7671 23.376 14.6926C24.9644 14.6225 25.4696 14.6031 29.5182 14.6031ZM29.5182 22.0536C27.5422 22.0536 25.6471 22.8386 24.2499 24.2358C22.8526 25.6331 22.0677 27.5281 22.0677 29.5041C22.0677 31.4801 22.8526 33.3752 24.2499 34.7724C25.6471 36.1697 27.5422 36.9546 29.5182 36.9546C31.4942 36.9546 33.3892 36.1697 34.7865 34.7724C36.1837 33.3752 36.9687 31.4801 36.9687 29.5041C36.9687 27.5281 36.1837 25.6331 34.7865 24.2358C33.3892 22.8386 31.4942 22.0536 29.5182 22.0536ZM39.2038 21.6811C39.2038 21.1871 39.0076 20.7134 38.6583 20.364C38.3089 20.0147 37.8352 19.8185 37.3412 19.8185C36.8472 19.8185 36.3734 20.0147 36.0241 20.364C35.6748 20.7134 35.4786 21.1871 35.4786 21.6811C35.4786 22.1751 35.6748 22.6489 36.0241 22.9982C36.3734 23.3475 36.8472 23.5437 37.3412 23.5437C37.8352 23.5437 38.3089 23.3475 38.6583 22.9982C39.0076 22.6489 39.2038 22.1751 39.2038 21.6811ZM29.5182 25.0338C30.7038 25.0338 31.8408 25.5048 32.6791 26.3432C33.5175 27.1815 33.9885 28.3185 33.9885 29.5041C33.9885 30.6897 33.5175 31.8268 32.6791 32.6651C31.8408 33.5034 30.7038 33.9744 29.5182 33.9744C28.3326 33.9744 27.1955 33.5034 26.3572 32.6651C25.5188 31.8268 25.0479 30.6897 25.0479 29.5041C25.0479 28.3185 25.5188 27.1815 26.3572 26.3432C27.1955 25.5048 28.3326 25.0338 29.5182 25.0338Z" fill="#06834D" />
              </svg>

            </a>
            <a href="#" class="mx-2" target="_blank">
              <svg width="59" height="59" viewBox="0 0 59 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="29.4999" cy="29.5" r="29.4999" fill="#fff" />
                <circle cx="29.4999" cy="29.5" r="28.8853" stroke="white" stroke-opacity="0.5" stroke-width="1.22916" />
                <path d="M44.01 41.3055V31.351C44.01 26.4587 42.9568 22.7216 37.2491 22.7216C34.4972 22.7216 32.6626 24.2164 31.9152 25.6433H31.8472V23.1632H26.4453V41.3055H32.085V32.3023C32.085 29.9241 32.5267 27.6478 35.4485 27.6478C38.3363 27.6478 38.3703 30.3318 38.3703 32.4382V41.2715H44.01V41.3055Z" fill="#06834D" />
                <path d="M17.2734 23.1632H22.9132V41.3054H17.2734V23.1632Z" fill="#06834D" />
                <path d="M20.0916 14.126C18.291 14.126 16.8301 15.5869 16.8301 17.3875C16.8301 19.1881 18.291 20.683 20.0916 20.683C21.8922 20.683 23.3531 19.1881 23.3531 17.3875C23.3531 15.5869 21.8922 14.126 20.0916 14.126Z" fill="#06834D" />
              </svg>

            </a>
            <a href="#" class="mx-2" target="_blank">
              <svg width="59" height="59" viewBox="0 0 59 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="29.4999" cy="29.4999" r="29.4999" fill="#fff" />
                <circle cx="29.4999" cy="29.4999" r="28.8853" stroke="white" stroke-opacity="0.5" stroke-width="1.22916" />
                <g clip-path="url(#clip0_2023_7513)">
                  <path d="M29.9403 11.6228H29.9314C20.0722 11.6228 12.0547 19.6425 12.0547 29.504C12.0547 33.4155 13.3153 37.0409 15.4588 39.9846L13.2304 46.6274L20.1034 44.4303C22.9309 46.3033 26.3037 47.3851 29.9403 47.3851C39.7996 47.3851 47.817 39.3632 47.817 29.504C47.817 19.6447 39.7996 11.6228 29.9403 11.6228ZM40.3449 36.8733C39.9135 38.0914 38.2014 39.1017 36.8358 39.3967C35.9015 39.5957 34.6811 39.7544 30.5729 38.0512C25.318 35.8741 21.934 30.5344 21.6703 30.1879C21.4177 29.8415 19.5469 27.3605 19.5469 24.7945C19.5469 22.2286 20.85 20.9791 21.3752 20.4427C21.8066 20.0024 22.5196 19.8012 23.2036 19.8012C23.4249 19.8012 23.6238 19.8124 23.8026 19.8213C24.3279 19.8437 24.5916 19.875 24.9381 20.7042C25.3695 21.7435 26.42 24.3095 26.5451 24.5732C26.6725 24.837 26.7999 25.1946 26.6211 25.5411C26.4535 25.8987 26.306 26.0574 26.0422 26.3614C25.7785 26.6653 25.5281 26.8978 25.2644 27.2241C25.023 27.508 24.7503 27.812 25.0543 28.3372C25.3583 28.8513 26.4088 30.5657 27.9555 31.9425C29.9515 33.7195 31.5697 34.2872 32.1487 34.5286C32.58 34.7074 33.0941 34.6649 33.4093 34.3297C33.8094 33.8983 34.3033 33.183 34.8062 32.479C35.1639 31.9738 35.6154 31.9112 36.0892 32.09C36.572 32.2577 39.1268 33.5205 39.652 33.782C40.1773 34.0458 40.5237 34.171 40.6511 34.3922C40.7763 34.6135 40.7763 35.6529 40.3449 36.8733Z" fill="#06834D" />
                </g>
                <defs>
                  <clipPath id="clip0_2023_7513">
                    <rect width="35.7623" height="35.7623" fill="white" transform="translate(12.0566 11.6227)" />
                  </clipPath>
                </defs>
              </svg>
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
    <small>© 2024 Hans Gross-Criminalística Cibernética | Todos los Derechos Reservados. Desarrollado por <a class="obi-link" href="https://obi.com.pe/" target="_blank">Obi Consulting</a></small>
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