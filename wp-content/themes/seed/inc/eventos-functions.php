<?php

/**
 * EVENTOS CPT
 */
function registrar_cpt_eventos()
{
  $labels = array(
    'name'                  => _x('Eventos', 'Post type general name', 'tu-text-domain'),
    'singular_name'         => _x('Evento', 'Post type singular name', 'tu-text-domain'),
    'menu_name'             => _x('Eventos', 'Admin Menu text', 'tu-text-domain'),
    'name_admin_bar'        => _x('Evento', 'Add New on Toolbar', 'tu-text-domain'),
    'add_new'               => __('Añadir nuevo', 'tu-text-domain'),
    'add_new_item'          => __('Añadir nuevo evento', 'tu-text-domain'),
    'new_item'              => __('Nuevo evento', 'tu-text-domain'),
    'edit_item'             => __('Editar evento', 'tu-text-domain'),
    'view_item'             => __('Ver evento', 'tu-text-domain'),
    'all_items'             => __('Todos los eventos', 'tu-text-domain'),
    'search_items'          => __('Buscar eventos', 'tu-text-domain'),
    'parent_item_colon'     => __('Evento superior:', 'tu-text-domain'),
    'not_found'             => __('No se encontraron eventos.', 'tu-text-domain'),
    'not_found_in_trash'    => __('No se encontraron eventos en la papelera.', 'tu-text-domain'),
    'featured_image'        => _x('Imagen destacada', 'Overrides the “Featured Image” phrase for this post type.', 'tu-text-domain'),
    'set_featured_image'    => _x('Establecer imagen destacada', 'Overrides the “Set featured image” phrase for this post type.', 'tu-text-domain'),
    'remove_featured_image' => _x('Eliminar imagen destacada', 'Overrides the “Remove featured image” phrase for this post type.', 'tu-text-domain'),
    'use_featured_image'    => _x('Usar como imagen destacada', 'Overrides the “Use as featured image” phrase for this post type.', 'tu-text-domain'),
    'archives'              => _x('Archivo de eventos', 'The post type archive label used in nav menus.', 'tu-text-domain'),
    'insert_into_item'      => _x('Insertar en el evento', 'Overrides the “Insert into post” phrase.', 'tu-text-domain'),
    'uploaded_to_this_item' => _x('Subido a este evento', 'Overrides the “Uploaded to this post” phrase.', 'tu-text-domain'),
    'filter_items_list'     => _x('Filtrar lista de eventos', 'Screen reader text for the filter links.', 'tu-text-domain'),
    'items_list_navigation' => _x('Navegación de lista de eventos', 'Screen reader text for the pagination.', 'tu-text-domain'),
    'items_list'            => _x('Lista de eventos', 'Screen reader text for the items list.', 'tu-text-domain'),
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'eventos'),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 20,
    'menu_icon'          => 'dashicons-calendar-alt',
    'supports'           => array('title', 'editor', 'excerpt', 'thumbnail'),
  );

  register_post_type('eventos', $args);
}
add_action('init', 'registrar_cpt_eventos');

/**
 * CATEGORÍAS EVENTOS CPT
 */

function registrar_taxonomia_categorias_eventos()
{
  $labels = array(
    'name'              => _x('Categorías de Eventos', 'taxonomy general name', 'tu-text-domain'),
    'singular_name'     => _x('Categoría de Evento', 'taxonomy singular name', 'tu-text-domain'),
    'search_items'      => __('Buscar categorías', 'tu-text-domain'),
    'all_items'         => __('Todas las categorías', 'tu-text-domain'),
    'parent_item'       => __('Categoría superior', 'tu-text-domain'),
    'parent_item_colon' => __('Categoría superior:', 'tu-text-domain'),
    'edit_item'         => __('Editar categoría', 'tu-text-domain'),
    'update_item'       => __('Actualizar categoría', 'tu-text-domain'),
    'add_new_item'      => __('Añadir nueva categoría', 'tu-text-domain'),
    'new_item_name'     => __('Nombre de la nueva categoría', 'tu-text-domain'),
    'menu_name'         => __('Categorías de Eventos', 'tu-text-domain'),
  );

  $args = array(
    'hierarchical'      => true, // true para categorías, false para etiquetas (tags)
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array('slug' => 'categorias-eventos'),
  );

  register_taxonomy('categorias_eventos', array('eventos'), $args);
}
add_action('init', 'registrar_taxonomia_categorias_eventos');

function registrar_taxonomia_etiquetas_eventos()
{
  $labels = array(
    'name'              => _x('Etiquetas de eventos', 'taxonomy general name', 'tu-text-domain'),
    'singular_name'     => _x('Etiqueta de evento', 'taxonomy singular name', 'tu-text-domain'),
    'search_items'      => __('Buscar etiquetas', 'tu-text-domain'),
    'all_items'         => __('Todas las etiquetas', 'tu-text-domain'),
    'edit_item'         => __('Editar etiqueta', 'tu-text-domain'),
    'update_item'       => __('Actualizar etiqueta', 'tu-text-domain'),
    'add_new_item'      => __('Añadir nueva etiqueta', 'tu-text-domain'),
    'new_item_name'     => __('Nombre de la nueva etiqueta', 'tu-text-domain'),
    'menu_name'         => __('Etiquetas', 'tu-text-domain'),
  );

  $args = array(
    'hierarchical'      => false, // false para etiquetas, true para categorías
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array('slug' => 'etiquetas-eventos'),
  );

  register_taxonomy('etiquetas_eventos', array('eventos'), $args);
}
add_action('init', 'registrar_taxonomia_etiquetas_eventos');

function enqueue_custom_scripts()
{
  wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', ['jquery'], null, true);

  // Pasar la URL de admin-ajax.php al script
  wp_localize_script('custom-js', 'wp_ajax_data', [
    'ajax_url' => admin_url('admin-ajax.php'),
  ]);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function mostrar_selector_categorias()
{
  $categorias = get_terms([
    'taxonomy' => 'categorias_eventos',
    'hide_empty' => true,
  ]);

  if (!empty($categorias) && !is_wp_error($categorias)) {
    echo '<ul class="list-group list-group-flush" id="lista-categorias-eventos">';
    foreach ($categorias as $categoria) {
      echo '<li class="list-group-item" data-categoria="' . esc_attr($categoria->term_id) . '" data-slug="' . esc_attr($categoria->slug) . '"><div>' . esc_html($categoria->name) . '</div></li>';
    }
    echo '</ul>';
  }
}
add_shortcode('selector_categorias_eventos', 'mostrar_selector_categorias');

function mostrar_selector_etiquetas()
{
  $etiquetas = get_terms([
    'taxonomy' => 'etiquetas_eventos', // Usamos 'post_tag' para las etiquetas predeterminadas de WordPress
    'hide_empty' => true,     // Solo mostrar etiquetas con contenido
  ]);

  if (!empty($etiquetas) && !is_wp_error($etiquetas)) {
    echo '<ul class="list-group list-group-flush" id="lista-etiquetas-eventos">';
    foreach ($etiquetas as $etiqueta) {
      echo '<li class="list-group-item" data-etiqueta="' . esc_attr($etiqueta->term_id) . '"><div>' . esc_html($etiqueta->name) . '</div></li>';
    }
    echo '</ul>';
  }
}
add_shortcode('selector_etiquetas_eventos', 'mostrar_selector_etiquetas');

function cargar_todos_eventos()
{
  // Obtener la página actual desde AJAX (si no se pasa, usar la primera página).
  $paged = isset($_POST['paged']) ? absint($_POST['paged']) : 1;
  $categoria_slug = isset($_POST['categoria_slug']) ? sanitize_text_field($_POST['categoria_slug']) : '';
  $categoria_id = isset($_POST['categoria_id']) ? absint($_POST['categoria_id']) : 0;
  $etiqueta_id = isset($_POST['etiqueta_id']) ? absint($_POST['etiqueta_id']) : 0; // ID de la etiqueta seleccionada

  $args = [
    'post_type' => 'eventos',
    'posts_per_page' => 6, // Todos los eventos
    'paged'          => $paged,
  ];

  // Filtrar por categoría (slug)
  if (!empty($categoria_slug)) {
    $args['tax_query'][] = [
      'taxonomy' => 'categorias_eventos', // Cambia esto por tu taxonomía
      'field'    => 'slug',
      'terms'    => $categoria_slug,
    ];
  }

  // Filtrar por categoría si está presente
  if ($categoria_id) {
    $args['tax_query'] = [
      [
        'taxonomy' => 'categorias_eventos',
        'field'    => 'term_id',
        'terms'    => $categoria_id,
      ],
    ];
  }

  // Filtrar por etiqueta si está presente
  if ($etiqueta_id) {
    $args['tax_query'][] = [
      'taxonomy' => 'etiquetas_eventos', // Cambia esto según el nombre de tu taxonomía de etiquetas
      'field'    => 'term_id',
      'terms'    => $etiqueta_id,
    ];
  }

  $eventos = new WP_Query($args);

  if ($eventos->have_posts()) {
    echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-card-servicios g-4">';
    while ($eventos->have_posts()) {
      $eventos->the_post();
      // Obtener las categorías del evento
      $categorias = get_the_terms(get_the_ID(), 'categorias_eventos');
      $etiquetas = get_the_terms(get_the_ID(), 'etiquetas_eventos');
      $nombres_categorias = $categorias && !is_wp_error($categorias)
        ? implode(', ', wp_list_pluck($categorias, 'name'))
        : 'Sin categoría';

      // Inicializar clases dinámicas
      $clase_categoria = 'btn-category-card';
      if ($categorias && !is_wp_error($categorias)) {
        foreach ($categorias as $categoria) {
          if ($categoria->slug === 'webinars') { // Cambia 'webinars' por el slug de tu categoría
            $clase_categoria .= ' btn-category-card--green';
            break;
          }
        }
      }

      $nombres_etiquetas = $etiquetas && !is_wp_error($etiquetas)
        ? implode(', ', wp_list_pluck($etiquetas, 'name'))
        : 'Sin etiquetas';

      // Generar enlace de WhatsApp
      $nombre_evento = get_the_title();
      $mensaje = rawurlencode("Hola, estoy interesado en el evento: $nombre_evento");
      $whatsapp_url = "https://wa.me/51971596045?text=$mensaje"; // Cambia el número por el tuyo

      echo '<div class="col">';
      echo '<div class="card h-100">';
      echo '<div class="position-relative">';
      echo '<div class="' . esc_attr($clase_categoria) . '">' . esc_html($nombres_categorias) . '</div>';
      echo ' <img src="' . wp_get_attachment_url(get_post_thumbnail_id()) . '" class="card-img-top" alt="...">';
      echo '<div class="btn-precio-card"><sup>S/</sup>59<sup>.99</sup></div>';
      echo '</div>';
      echo '<div class="card-body">';
      echo '<div class="row">';
      echo '<div class="col-2 text-center">';
      echo '<p class="date-text">SET</p>';
      echo '<p class="date-text date-text--day">18</p>';
      echo '</div>';
      echo '<div class="col-10">';
      echo '<h5 class="card-title">' . get_the_title() . '</h5>';
      echo '<p class="card-category mb-2"><b>Categoría:</b> ' . esc_html($nombres_etiquetas) . '</p>';
      echo '<p class="card-text">' . get_the_excerpt() . '</p>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '<div class="card-footer">';
      echo '<a href="' . esc_url($whatsapp_url) . '" target="_blank">';
      echo '<button class="btn btn-hans btn-card-comprar">';
      echo '<i class="bi bi-cart2 pr-2"></i>';
      echo '<span>Comprar</span>';
      echo '</button>';
      echo '</a>';
      echo '<a href="' .  get_permalink() . '"><button class="btn btn-hans btn-card-ver">Ver más</button></a>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
    echo '</div>';

    // Agregar los botones de paginación
    $total_pages = $eventos->max_num_pages;
    if ($total_pages > 1) {
      echo '<div class="row">';
      echo '<div class="col">';
      echo '<nav aria-label="Page navigation example">';
      echo '<ul class="pagination justify-content-end">';

      for ($i = 1; $i <= $total_pages; $i++) {
        $active_class = $i == $paged ? ' active' : '';
        echo '<li class="page-item' . $active_class . '">';
        echo '<a class="page-link" href="#" data-pagina="' . $i . '">' . $i . '</a>';
        echo '</li>';
      }

      echo '</ul>';
      echo '</nav>';
      echo '</div>';
      echo '</div>';
    }
  } else {
    echo '<p>No hay eventos disponibles.</p>';
  }

  wp_die();
}
add_action('wp_ajax_cargar_todos_eventos', 'cargar_todos_eventos');
add_action('wp_ajax_nopriv_cargar_todos_eventos', 'cargar_todos_eventos');

function filtrar_eventos()
{
  $paged = isset($_POST['paged']) ? absint($_POST['paged']) : 1;
  $categoria_slug = isset($_GET['categoria']) ? sanitize_text_field($_GET['categoria']) : '';
  $categoria_id = isset($_POST['categoria_id']) ? intval($_POST['categoria_id']) : 0;
  $etiqueta_id = isset($_POST['etiqueta_id']) ? intval($_POST['etiqueta_id']) : 0;

  $args = [
    'post_type' => 'eventos',
    'posts_per_page' => 6, // Todos los eventos
    'paged'          => $paged,
    'tax_query'      => [], // Inicializamos la consulta de taxonomías
  ];

  // Filtrar por categoría si se pasa un slug
  if (!empty($categoria_slug)) {
    $args['tax_query'] = [
      [
        'taxonomy' => 'categorias_eventos', // Cambia esto por tu taxonomía
        'field'    => 'slug',
        'terms'    => $categoria_slug,
      ],
    ];
  }

  // Filtrar por categoría, si está presente
  if ($categoria_id) {
    $args['tax_query'][] = [
      'taxonomy' => 'categorias_eventos', // Reemplaza con el slug de la taxonomía de categorías
      'field'    => 'term_id',
      'terms'    => $categoria_id,
    ];
  }

  // Filtrar por etiqueta, si está presente
  if ($etiqueta_id) {
    $args['tax_query'][] = [
      'taxonomy' => 'etiquetas_eventos', // Slug para las etiquetas predeterminadas en WordPress
      'field'    => 'term_id',
      'terms'    => $etiqueta_id,
    ];
  }

  // Asegurarnos de que se combinen correctamente los filtros
  if (!empty($args['tax_query']) && count($args['tax_query']) > 1) {
    $args['tax_query']['relation'] = 'AND'; // Cambiar a 'OR' si deseas que cumpla al menos uno de los filtros
  }

  $eventos = new WP_Query($args);

  if ($eventos->have_posts()) {
    echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-card-servicios g-4">';
    while ($eventos->have_posts()) {
      $eventos->the_post();
      // Obtener las categorías del evento
      $categorias = get_the_terms(get_the_ID(), 'categorias_eventos');
      $etiquetas = get_the_terms(get_the_ID(), 'etiquetas_eventos');
      $nombres_categorias = $categorias && !is_wp_error($categorias)
        ? implode(', ', wp_list_pluck($categorias, 'name'))
        : 'Sin categoría';

      // Inicializar clases dinámicas
      $clase_categoria = 'btn-category-card';
      if ($categorias && !is_wp_error($categorias)) {
        foreach ($categorias as $categoria) {
          if ($categoria->slug === 'webinars') { // Cambia 'webinars' por el slug de tu categoría
            $clase_categoria .= ' btn-category-card--green';
            break;
          }
        }
      }

      $nombres_etiquetas = $etiquetas && !is_wp_error($etiquetas)
        ? implode(', ', wp_list_pluck($etiquetas, 'name'))
        : 'Sin etiquetas';

      // Generar enlace de WhatsApp
      $nombre_evento = get_the_title();
      $mensaje = rawurlencode("Hola, estoy interesado en el evento: $nombre_evento");
      $whatsapp_url = "https://wa.me/51971596045?text=$mensaje"; // Cambia el número por el tuyo

      echo '<div class="col">';
      echo '<div class="card h-100">';
      echo '<div class="position-relative">';
      echo '<div class="' . esc_attr($clase_categoria) . '">' . esc_html($nombres_categorias) . '</div>';
      echo ' <img src="' . wp_get_attachment_url(get_post_thumbnail_id()) . '" class="card-img-top" alt="...">';
      echo '<div class="btn-precio-card"><sup>S/</sup>59<sup>.99</sup></div>';
      echo '</div>';
      echo '<div class="card-body">';
      echo '<div class="row">';
      echo '<div class="col-2 text-center">';
      echo '<p class="date-text">SET</p>';
      echo '<p class="date-text date-text--day">18</p>';
      echo '</div>';
      echo '<div class="col-10">';
      echo '<h5 class="card-title">' . get_the_title() . '</h5>';
      echo '<p class="card-category mb-2"><b>Categoría:</b> ' . esc_html($nombres_etiquetas) . '</p>';
      echo '<p class="card-text">' . get_the_excerpt() . '</p>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '<div class="card-footer">';
      echo '<a href="' . esc_url($whatsapp_url) . '" target="_blank">';
      echo '<button class="btn btn-hans btn-card-comprar">';
      echo '<i class="bi bi-cart2 pr-2"></i>';
      echo '<span>Comprar</span>';
      echo '</button>';
      echo '</a>';
      echo '<a href="' .  get_permalink() . '"><button class="btn btn-hans btn-card-ver">Ver más</button></a>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
    echo '</div>';

    // Generar paginación
    $total_pages = $eventos->max_num_pages;
    if ($total_pages > 1) {
      echo '<div class="row mt-4">';
      echo '<div class="col">';
      echo '<nav aria-label="Page navigation">';
      echo '<ul class="pagination justify-content-end">';

      for ($i = 1; $i <= $total_pages; $i++) {
        $active_class = $i == $paged ? ' active' : '';
        echo '<li class="page-item' . $active_class . '">';
        echo '<a class="page-link" href="#" data-pagina="' . $i . '">' . $i . '</a>';
        echo '</li>';
      }

      echo '</ul>';
      echo '</nav>';
      echo '</div>';
      echo '</div>';
    }
  } else {
    echo '<p>No se encontraron eventos.</p>';
  }

  wp_die();
}
add_action('wp_ajax_filtrar_eventos', 'filtrar_eventos');
add_action('wp_ajax_nopriv_filtrar_eventos', 'filtrar_eventos');

function load_event_posts_by_category()
{
  if (!isset($_GET['category_slug'])) {
    wp_send_json_error('No se especificó la categoría.');
    return;
  }

  $category_slug = sanitize_text_field($_GET['category_slug']);

  // Cambiar la consulta para usar la taxonomía personalizada
  $query = new WP_Query([
    'post_type' => 'eventos',
    'tax_query' => [
      [
        'taxonomy' => 'categorias_eventos', // Nombre de tu taxonomía
        'field'    => 'slug',             // Consulta por slug
        'terms'    => $category_slug,     // Slug de la categoría seleccionada
      ],
    ],
    'posts_per_page' => 5, // Cambiar según necesidad
  ]);

  if ($query->have_posts()) {
    $posts = [];

    while ($query->have_posts()) {
      $query->the_post();
      $posts[] = [
        'title' => get_the_title(),
        'excerpt' => get_the_excerpt(),
        'thumbnail' => get_the_post_thumbnail_url(get_the_ID(), 'medium'),
        'date' => get_the_date(),
        'link' => get_permalink(),
      ];
    }

    wp_reset_postdata();

    wp_send_json_success($posts);
  } else {
    wp_send_json_error('No se encontraron posts para esta categoría.');
  }
}
add_action('wp_ajax_load_event_posts_by_category', 'load_event_posts_by_category');
add_action('wp_ajax_nopriv_load_event_posts_by_category', 'load_event_posts_by_category');


function cargar_script_ajax_listado()
{
?>
  <script>
    jQuery(document).ready(function($) {
      var $listaCategorias = $('#lista-categorias-eventos');
      var $listaEtiquetas = $('#lista-etiquetas-eventos');
      var $resultadosEventos = $('#resultados-eventos');
      var categoriaActiva = null;
      var etiquetaActiva = null;
      var categoriaSlug = new URLSearchParams(window.location.search).get('categoria'); // Obtener categoría desde la URL

      // Cargar eventos iniciales
      function cargarEventos(pagina = 1) {
        $.ajax({
          url: '<?php echo admin_url("admin-ajax.php"); ?>',
          type: 'POST',
          data: {
            action: categoriaActiva || etiquetaActiva ? 'filtrar_eventos' : 'cargar_todos_eventos',
            paged: pagina,
            categoria_slug: categoriaSlug, // Enviar el slug de la categoría seleccionada
            categoria_id: categoriaActiva, // Enviar categoría activa solo si existe
            etiqueta_id: etiquetaActiva // Enviar etiqueta activa solo si existe
          },
          beforeSend: function() {
            $resultadosEventos.html('<p>Cargando eventos...</p>');
          },
          success: function(response) {
            $resultadosEventos.html(response);
          },
          error: function(xhr, status, error) {
            console.error('Error al cargar los eventos:', error);
            $resultadosEventos.html('<p>Hubo un error al cargar los eventos.</p>');
          }
        });
      }

      // Cargar la primera página al cargar la página
      cargarEventos();

      // Asignar la clase "activo" a la categoría seleccionada por el slug de la URL
      if (categoriaSlug) {
        var $categoriaInicial = $listaCategorias.find('li[data-slug="' + categoriaSlug + '"]'); // Encuentra el elemento con el slug correspondiente
        if ($categoriaInicial.length) {
          categoriaActiva = $categoriaInicial.data('categoria'); // Establece como categoría activa
          $listaCategorias.find('li').removeClass('activo'); // Elimina la clase de todas las categorías
          $categoriaInicial.addClass('activo'); // Adiciona la clase "activo" a la categoría inicial
        }
      }

      // Filtrar eventos por categoría
      $listaCategorias.on('click', 'li', function() {
        var $categoria = $(this);

        // Si la categoría ya está activa (incluye la categoría seleccionada inicialmente), desactívala y muestra todos los eventos
        if ($categoria.hasClass('activo')) {
          categoriaActiva = null; // Reiniciar la categoría activa
          categoriaSlug = null; // Reiniciar el slug de la categoría
          $categoria.removeClass('activo'); // Quitar la clase activa
          cargarEventos(1); // Cargar todos los eventos
          return;
        }

        // Si es una nueva categoría, actívala y carga los eventos correspondientes
        categoriaActiva = $categoria.data('categoria'); // Actualizar la categoría activa
        etiquetaActiva = null; // Reiniciar etiqueta activa al seleccionar categoría
        $listaCategorias.find('li').removeClass('activo');
        $listaEtiquetas.find('li').removeClass('activo'); // Quitar selección de etiquetas
        $categoria.addClass('activo');

        cargarEventos(1); // Cargar eventos filtrados desde la primera página
      });

      // Filtrar eventos por etiqueta
      $listaEtiquetas.on('click', 'li', function() {
        var $etiqueta = $(this);

        // Si la etiqueta ya está activa, desactívala y muestra todos los eventos
        if ($etiqueta.hasClass('activo')) {
          etiquetaActiva = null; // Reiniciar la etiqueta activa
          $etiqueta.removeClass('activo'); // Quitar la clase activa
          cargarEventos(1); // Cargar todos los eventos
          return;
        }

        // Si es una nueva etiqueta, actívala y carga los eventos correspondientes
        etiquetaActiva = $etiqueta.data('etiqueta'); // Actualizar la etiqueta activa
        categoriaActiva = null; // Reiniciar categoría activa al seleccionar etiqueta
        $listaEtiquetas.find('li').removeClass('activo');
        $listaCategorias.find('li').removeClass('activo'); // Quitar selección de categorías
        $etiqueta.addClass('activo');

        cargarEventos(1); // Cargar eventos filtrados desde la primera página
      });

      // Manejar el clic en los botones de paginación
      $resultadosEventos.on('click', '.page-link', function(e) {
        e.preventDefault(); // Evitar recarga de página
        var pagina = $(this).data('pagina');
        cargarEventos(pagina); // Cargar la página correspondiente
      });
    });
  </script>
<?php
}
add_action('wp_footer', 'cargar_script_ajax_listado');
