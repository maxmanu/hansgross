<?php
get_header();
?>

<header id="miDiv" class="continer-fluid" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/bg-single-curso.webp); background-repeat: no-repeat; background-size: cover; background-position:center;">
  <div id="overlay"></div>
  <div id="contenidoDiv" style="position: static;">
    <?php get_template_part('template-parts/content', 'nav'); ?>
    <div class="container my-auto pb-3">
      <div class="row align-items-center hero-banner hero-banner--hero">
      </div>
    </div>
  </div>
</header>

<main class="position-relative">
  <section class="section-sidebar-feat">
    <div class="container">
      <div class="row">
        <div class="col-md-4 offset-md-8">
          <div class="card-sidebar text-center">
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/video-curso.jpg" alt="" class="video-image mb-3"></a>
            <div class="d-inline-flex mb-3">
              <p class="text-price"><sup class="sup-price">S/ </sup>370<sup>.99</sup></p>
              <div class="vr my-auto"></div>
              <p class="text-price"><sup class="sup-price">$ </sup>95</p>
            </div>
            <a href=""><button class="btn btn-hans btn-hans--course mb-3"><i class="bi bi-cart2 pe-2"></i>Comprar</button></a>
            <div class="sidebar-feat mb-3">
              <div class="d-flex mb-3 mx-auto text-start">
                <div class="feat-event-text">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-fecha.png" class="img-fluid me-2" alt="...">
                  <b>Fecha:</b>
                </div>
                <div class="ms-3">
                  18 de setiembre del 2024
                </div>
              </div>
              <div class="d-flex mb-3 mx-auto text-start">
                <div class="feat-event-text">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-reloj.png" class="img-fluid me-2" alt="...">
                  <b>Horario:</b>
                </div>
                <div class="ms-3 text-start">
                  Viernes y Sábado <br> De 10:00 am a 1:00 pm
                </div>
              </div>
              <div class="d-flex mb-3 mx-auto text-start">
                <div class="feat-event-text">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-brochure.png" class="img-fluid me-2" alt="...">
                  <b>Brochure:</b>
                </div>
                <div class="ms-3">
                  Digital
                </div>
              </div>
              <div class="d-flex mx-auto text-start">
                <div class="feat-event-text">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-diploma.png" class="img-fluid me-2" alt="...">
                  <b>Avalado:</b>
                </div>
                <div class="ms-3">
                  Hans Gross
                </div>
              </div>
            </div>
            <a><img src="<?php echo get_template_directory_uri(); ?>/assets/img/btn-pdf.png" alt="" class="btn-pdf img-fluid mb-4"></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-course-features">
    <div class="container">
      <div class="row align-items-start">
        <div class="col-auto mb-5 ms-4" style="color:#fff;">
          <a href="javascript:history.back()">
            <span><svg width="33" height="34" viewBox="0 0 33 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25.5063 18.1933C25.5063 15.4123 23.2438 13.1498 20.4628 13.1498H10.8982L12.2494 11.7986C12.6509 11.3972 12.6509 10.7463 12.2494 10.3449C12.0487 10.1442 11.7856 10.0438 11.5225 10.0438C11.2594 10.0438 10.9964 10.1442 10.7957 10.3449L7.68959 13.451C7.49679 13.6437 7.38847 13.9052 7.38847 14.1778C7.38847 14.4504 7.49679 14.7119 7.68959 14.9046L10.7957 18.0107C11.1971 18.4122 11.848 18.4122 12.2494 18.0107C12.6509 17.6093 12.6509 16.9584 12.2494 16.557L10.8982 15.2058H20.4628C22.1101 15.2058 23.4503 16.5459 23.4503 18.1933C23.4503 19.8406 22.1101 21.1808 20.4628 21.1808H12.647C12.0793 21.1808 11.619 21.641 11.619 22.2087C11.619 22.7765 12.0793 23.2367 12.647 23.2367H20.4628C23.2439 23.2367 25.5063 20.9742 25.5063 18.1933ZM32.8947 16.6403C32.8947 7.57116 25.5165 0.192909 16.4474 0.192909C7.37825 0.192909 0 7.57116 0 16.6403C0 25.7094 7.37825 33.0876 16.4474 33.0876C25.5165 33.0876 32.8947 25.7094 32.8947 16.6403ZM30.8388 16.6403C30.8388 24.5757 24.3828 31.0317 16.4474 31.0317C8.5119 31.0317 2.05592 24.5757 2.05592 16.6403C2.05592 8.70481 8.5119 2.24883 16.4474 2.24883C24.3828 2.24883 30.8388 8.70481 30.8388 16.6403Z" fill="#fff" />
              </svg></span>
            Atrás
          </a>
        </div>
      </div>
    </div>
    <div class="bg-green-feature">
      <div class="container">
        <div class="row">
          <div class="col-auto me-auto ms-4">
            <div class="btn-category-card">Curso</div>
          </div>
        </div>
        <div class="row pt-4">
          <div class="col-md-8 me-auto">
            <div class="row">
              <div class="col-2 text-center pt-3">
                <p class="date-text">SET</p>
                <P class="date-text date-text--day">18</P>
              </div>
              <div class="col-10">
                <h1 class="banner-title">Informática Forense</h1>
                <p class="card-category mb-2">Categoría: Criminalística</p>
                <p class="card-text mb-5">Actualmente las empresas y organizaciones deben estar preparadas para enfrentar exitosamente diversos tipos de crímenes cibernéticos, los cuales se suscitan y afectan sus sistemas de cómputo y redes....</p>
                <a href="#" class="mostrar-mas">Mostrar más</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-course-tabs">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 me-auto">
          <div class="accordion" id="accordionPanelsHans">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                  <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/check-svg-icon.svg" class="img-fluid me-4" style="width:25px;" alt=""></span>
                  Temario
                </button>
              </h2>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                <div class="accordion-body">
                  <div class="bloque-tab">
                    <strong class="title-bloque-tab">Bloque uno</strong>
                    <ul>
                      <li>Proceso de investigación forense</li>
                      <li>Evolución del sistema de archivos windows</li>
                      <li>FTK Imager</li>
                      <li>Adquisición de la memoria RAM</li>
                      <li>Evidencia encriptada</li>
                      <li>Obtener archivos protegidos</li>
                      <li>Imagen con contenidos personalizado</li>
                      <li>Discos de estado sólido (SSD)</li>
                      <li>Nivelación de uso y SSD Trim</li>
                      <li>Artefactos forenses en SSD</li>
                    </ul>
                  </div>
                  <div class="bloque-tab">
                    <strong class="title-bloque-tab">Bloque dos</strong>
                    <ul>
                      <li>Proceso de investigación forense</li>
                      <li>Evolución del sistema de archivos windows</li>
                      <li>FTK Imager</li>
                      <li>Adquisición de la memoria RAM</li>
                      <li>Evidencia encriptada</li>
                      <li>Obtener archivos protegidos</li>
                      <li>Imagen con contenidos personalizado</li>
                      <li>Discos de estado sólido (SSD)</li>
                      <li>Nivelación de uso y SSD Trim</li>
                      <li>Artefactos forenses en SSD</li>
                    </ul>
                  </div>
                  <div class="bloque-tab">
                    <strong class="title-bloque-tab">Bloque tres</strong>
                    <ul>
                      <li>Proceso de investigación forense</li>
                      <li>Evolución del sistema de archivos windows</li>
                      <li>FTK Imager</li>
                      <li>Adquisición de la memoria RAM</li>
                      <li>Evidencia encriptada</li>
                      <li>Obtener archivos protegidos</li>
                      <li>Imagen con contenidos personalizado</li>
                      <li>Discos de estado sólido (SSD)</li>
                      <li>Nivelación de uso y SSD Trim</li>
                      <li>Artefactos forenses en SSD</li>
                    </ul>
                  </div>
                  <div class="bloque-tab">
                    <strong class="title-bloque-tab">Bloque cuatro</strong>
                    <ul>
                      <li>Proceso de investigación forense</li>
                      <li>Evolución del sistema de archivos windows</li>
                      <li>FTK Imager</li>
                      <li>Adquisición de la memoria RAM</li>
                      <li>Evidencia encriptada</li>
                      <li>Obtener archivos protegidos</li>
                      <li>Imagen con contenidos personalizado</li>
                      <li>Discos de estado sólido (SSD)</li>
                      <li>Nivelación de uso y SSD Trim</li>
                      <li>Artefactos forenses en SSD</li>
                    </ul>
                  </div>
                  <div class="bloque-tab">
                    <strong class="title-bloque-tab">Bloque cinco</strong>
                    <ul>
                      <li>Proceso de investigación forense</li>
                      <li>Evolución del sistema de archivos windows</li>
                      <li>FTK Imager</li>
                      <li>Adquisición de la memoria RAM</li>
                      <li>Evidencia encriptada</li>
                      <li>Obtener archivos protegidos</li>
                      <li>Imagen con contenidos personalizado</li>
                      <li>Discos de estado sólido (SSD)</li>
                      <li>Nivelación de uso y SSD Trim</li>
                      <li>Artefactos forenses en SSD</li>
                    </ul>
                  </div>
                </div>
                <div class="bloque-free">
                  LLévate <span class="mx-2">GRATIS</span> Libro de “Fundamentos de Forense Digital”
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                  <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/check-svg-icon.svg" class="img-fluid me-4" style="width:25px;" alt=""></span>
                  Ponente
                </button>
              </h2>
              <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                <div class="accordion-body">
                  <div class="row align-items-center">
                    <div class="col-lg-5">
                      <div class="card">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-equipo.webp" class="card-img-top" alt="...">
                        <div class="card-eq">
                          <div class="container">
                            <div class="row justify-content-center">
                              <div class="col-1">
                                <span class="square square--equipo"></span>
                              </div>
                              <div class="col-auto">
                                <p class="card-title mb-0"><b>Alberto Álvarez</b></p>
                                <small>Ponente</small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-7">
                      <p>ISC2 Certified in Cybersecurity (CC), LPI Security Essentials Certificate, EXIN Ethical Hacking Foundation Certificate, LPI Linux Essentials Certficate, IT Masters Certificate of Achievement en Network Security Administrador, Hacking Coundtermeasures, Cisco CCNA Security, Information Security Incident Handling, Digital Forensics, Cybersecurity Management, Cyber Warfare and Terrorism, Enterprise Cyber Security Fundamentals, Phishing Countermeasures, Pen Testing, Basic Technology Certificate Autopsy Basics and Hand On, ICSI Certified Network Security Specialist (CNSS) y OPEN-SEC Ethical Hacker (OSEH). </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                  <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/check-svg-icon.svg" class="img-fluid me-4" style="width:25px;" alt=""></span>
                  Certificados
                </button>
              </h2>
              <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                <div class="accordion-body">
                  <div class="">
                    <div class="d-flex">
                      <div class="flex-shrink-0">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-diploma.png" class="img-fluid" alt="...">
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <p class="costo-certificado-tab">Costo del Certificado: </p>
                        <p class="accordion-price"><sup>S/</sup> 30 o <sup>US$ </sup>10</p>
                        <p>(Podrá acceder a la grabación del evento)</p>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-tab-people.png" class="img-fluid mt-2" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                  <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/check-svg-icon.svg" class="img-fluid me-4" style="width:25px;" alt=""></span>
                  Procedimientos de Pago
                </button>
              </h2>
              <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                <div class="accordion-body">
                  <div class="row align-items-center">
                    <div class="col-lg-4">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/yape-hansgross.png" class="img-fluid" alt="...">
                    </div>
                    <div class="col-lg-8">
                      <p class="title-bloque-tab">Cuenta Corriente BCP soles</p>
                      <p>Número de Cuenta : 191-9851512-0-20<br> CCI : 00219100985151202056</p>
                      <br>
                      <p class="title-bloque-tab">Cuenta Corriente INTERBANK soles</p>
                      <p>Número de Cuenta : 200-3002908296 <br> CCI : 003-200-003002908296-30</p>
                      <p>Titular: HANS GROSS EIRL</p>
                    </div>
                  </div>
                  <div class="row mt-5">
                    <div class="col">
                      <p class="title-bloque-tab">Pagos internacionales</p>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-niubiz.webp" class="img-fluid" style="max-width:300px;" alt="...">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
</main>

<?php
get_footer();
?>