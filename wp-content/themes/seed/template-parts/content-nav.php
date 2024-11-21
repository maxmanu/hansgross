<div id="mainNavbar" class="container-fluid">
  <nav class="container navbar navbar-expand-lg navbar-light">
    <a href="/">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/LOGO.svg" alt="" class="img-fluid header-logo" />
    </a>
    <button class="navbar-toggler px-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarExample1" aria-controls="navbarExample1" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarExample1">
        <!-- Left links -->
        <ul class="navbar-nav navbar-hans ps-lg-0" style="padding-left: 0.15rem;padding-top: 0.6rem;">
          <li class="nav-item">
            <a class="nav-link <?php echo is_front_page() ? 'active' : ''; ?>" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if (is_page_template('page-templates/t_page_nosotros.php')) {
                                  echo "active";
                                } ?>" href="/nosotros">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if (is_page_template('page-templates/t_page_servicios.php')) {
                                  echo "active";
                                } ?>" href="/servicios">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if (is_page_template('page-templates/t_page_academico.php')) {
                                  echo "active";
                                } ?>" href="/academico">Académico</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if (is_page_template('page-templates/t_page_certificados.php')) {
                                  echo "active";
                                } ?>" href="/certificados">Certificados</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if (is_page_template('page-templates/t_page_softwares.php')) {
                                  echo "active";
                                } ?>" href="/softwares">Software</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if (is_page_template('page-templates/t_page_blog.php')) {
                                  echo "active";
                                } ?>" href="/blog">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if (is_page_template('page-templates/t_page_contactanos.php')) {
                                  echo "active";
                                } ?>" href="/contactanos">Contáctanos</a>
          </li>
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
  </nav>
</div>