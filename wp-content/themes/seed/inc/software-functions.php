<?php

/**
 * SOLUCIONES CPT
 */
function registrar_cpt_soluciones()
{
  $labels = array(
    'name'                  => 'Soluciones',
    'singular_name'         => 'Solucion',
    'menu_name'             => 'Soluciones',
    'name_admin_bar'        => 'Solucion',
    'add_new'               => 'Añadir nuevo',
    'add_new_item'          => 'Añadir nuevo solucion',
    'new_item'              => 'Nuevo solucion',
    'edit_item'             => 'Editar solucion',
    'view_item'             => 'Ver solucion',
    'all_items'             => 'Todos los soluciones',
    'search_items'          => 'Buscar soluciones',
    'parent_item_colon'     => 'Solucion superior:',
    'not_found'             => 'No se encontraron soluciones.',
    'not_found_in_trash'    => 'No se encontraron soluciones en la papelera.',
    'featured_image'        => 'Imagen destacada',
    'set_featured_image'    => 'Establecer imagen destacada',
    'remove_featured_image' => 'Eliminar imagen destacada',
    'use_featured_image'    => 'Usar como imagen destacada',
    'archives'              => 'Archivo de soluciones',
    'insert_into_item'      => 'Insertar en el solucion',
    'uploaded_to_this_item' => 'Subido a este solucion',
    'filter_items_list'     => 'Filtrar lista de soluciones',
    'items_list_navigation' => 'Navegación de lista de soluciones',
    'items_list'            => 'Lista de soluciones',
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'soluciones'),
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => 5,
    'menu_icon'          => 'dashicons-desktop', // Ícono del menú (puedes cambiarlo).
    'supports'           => array('title', 'thumbnail'),
  );

  register_post_type('soluciones', $args);
}
add_action('init', 'registrar_cpt_soluciones');

function cmb2_add_solucion_fields()
{
  $cmb = new_cmb2_box(array(
    'id'            => 'software_metabox_group',
    'title'         => 'Secciones de Contenido',
    'object_types'  => array('soluciones'),
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true,
  ));

  $group_field_id = $cmb->add_field(array(
    'id'          => 'software_content_group',
    'type'        => 'group',
    'description' => __('Añade diferentes secciones de contenido.'),
    'options'     => array(
      'group_title'   => __('Sección {#}'),
      'add_button'    => __('Añadir Sección'),
      'remove_button' => __('Eliminar Sección'),
      'sortable'      => true,
    ),
  ));

  // Logo
  $cmb->add_group_field($group_field_id, array(
    'name' => 'Logo',
    'desc' => 'Sube un logo.',
    'id'   => 'imagen_logo',
    'type' => 'file',
    'options' => array(
      'url' => false,
    ),
    'text' => array(
      'add_upload_file_text' => 'Añadir Logo',
    ),
    'query_args' => array(
      'type' => array('image/jpeg', 'image/png', 'image/jpg', 'image/webp'),
    ),
    'preview_size' => array(300, 300),
  ));

  // Texto de la fila
  $cmb->add_group_field($group_field_id, array(
    'name' => 'Título de la fila',
    'desc' => 'Introduce una descripción.',
    'id'   => 'titulo_fila',
    'type' => 'text',
  ));

  // Texto de la fila
  $cmb->add_group_field($group_field_id, array(
    'name' => 'Texto de la fila',
    'desc' => 'Introduce una descripción.',
    'id'   => 'texto_fila',
    'type' => 'textarea',
  ));

  $cmb->add_group_field($group_field_id, array(
    'name'    => 'Tipo de medio',
    'id'      => 'tipo_medio',
    'type'    => 'select',
    'options' => array(
      'imagen' => __('Subir una imagen', 'cmb2'),
      'video'  => __('Subir un video', 'cmb2'),
      'youtube'  => __('Enlace de Youtube', 'cmb2'),
    ),
    'default' => 'imagen',
  ));

  $cmb->add_group_field($group_field_id, array(
    'name'        => 'Imagen',
    'id'          => 'imagen_upload',
    'type'        => 'file',
    'options'     => array('url' => false),
    'text'        => array('add_upload_file_text' => 'Subir imagen'),
    'query_args'  => array('type' => array('image/jpeg', 'image/png', 'image/webp')),
    'preview_size' => array(300, 300),
  ));

  $cmb->add_group_field($group_field_id, array(
    'name'        => 'Video',
    'id'          => 'video_upload',
    'type'        => 'file',
    'options'     => array('url' => false),
    'text'        => array('add_upload_file_text' => 'Subir video'),
    'query_args'  => array('type' => array('video/mp4', 'video/webm')),
  ));

  $cmb->add_group_field($group_field_id, array(
    'name'        => 'Imagen Thumbnail',
    'id'          => 'imagen_thumbnail',
    'type'        => 'file',
    'options'     => array('url' => false),
    'text'        => array('add_upload_file_text' => 'Subir imagen'),
    'query_args'  => array('type' => array('image/jpeg', 'image/png', 'image/webp')),
    'preview_size' => array(300, 300),
  ));

  $cmb->add_group_field($group_field_id, array(
    'name'        => 'Enlace de Youtube',
    'desc'        => 'Introduce una URL válida como : "https://www.youtube.com/watch?v=3nQNiWdeH2Q"',
    'id'          => 'youtube_url',
    'type'        => 'text_url',
  ));

  $cmb->add_group_field($group_field_id, array(
    'name'        => 'Youtube Thumbnail',
    'id'          => 'youtube_thumbnail',
    'type'        => 'file',
    'options'     => array('url' => false),
    'text'        => array('add_upload_file_text' => 'Subir imagen'),
    'query_args'  => array('type' => array('image/jpeg', 'image/png', 'image/webp')),
    'preview_size' => array(300, 300),
  ));

  // Brochure PDF
  $cmb->add_group_field($group_field_id, array(
    'name' => 'Brochure',
    'desc' => 'Sube un PDF.',
    'id'   => 'brochure_software',
    'type' => 'file',
    'options' => array(
      'url' => false,
    ),
    'text' => array(
      'add_upload_file_text' => 'Añadir archivo',
    ),
    'query_args' => array(
      'type' => 'application/pdf',
    ),
  ));

  $cmb->add_group_field($group_field_id, array(
    'name' => 'Más información',
    'desc' => 'Información adicional solo si se tiene más imagenes y descripción',
    'type' => 'title',
    'id'   => 'wiki_test_title'
  ));

  // Imagen 1
  $cmb->add_group_field($group_field_id, array(
    'name' => 'Imagen 1',
    'desc' => 'Sube una imagen.',
    'id'   => 'imagen_left',
    'type' => 'file',
    'options' => array(
      'url' => false,
    ),
    'text' => array(
      'add_upload_file_text' => 'Subir imagen',
    ),
    'query_args' => array(
      'type' => 'image',
    ),
  ));

  // Imagen 2
  $cmb->add_group_field($group_field_id, array(
    'name' => 'Imagen 2',
    'desc' => 'Sube una imagen.',
    'id'   => 'imagen_right',
    'type' => 'file',
    'options' => array(
      'url' => false,
    ),
    'text' => array(
      'add_upload_file_text' => 'Subir imagen',
    ),
    'query_args' => array(
      'type' => 'image',
    ),
  ));

  // Texto de la fila
  $cmb->add_group_field($group_field_id, array(
    'name' => 'Título de la fila',
    'desc' => 'Introduce una descripción.',
    'id'   => 'titulo_fila_2',
    'type' => 'text',
  ));

  // Texto de la fila 2
  $cmb->add_group_field($group_field_id, array(
    'name' => 'Texto de la fila',
    'desc' => 'Introduce una descripción.',
    'id'   => 'texto_fila_2',
    'type' => 'textarea',
  ));
}

add_action('cmb2_admin_init', 'cmb2_add_solucion_fields');

function cmb2_conditional_logic_script()
{
?>
  <script>
    // document.addEventListener("DOMContentLoaded", function() {
    //   function updateFieldVisibility(row) {
    //     let tipoMedio = row.querySelector('[name$="[tipo_medio]"]');
    //     if (!tipoMedio) return;

    //     let imageField = row.querySelector('[id$="imagen_upload"]')?.closest('.cmb-row');
    //     let videoField = row.querySelector('[id$="video_upload"]')?.closest('.cmb-row');
    //     let thumbField = row.querySelector('[id$="imagen_thumbnail"]')?.closest('.cmb-row');
    //     let youtubeField = row.querySelector('[id$="youtube_url"]')?.closest('.cmb-row');
    //     let youtubeThumbField = row.querySelector('[id$="youtube_thumbnail"]')?.closest('.cmb-row');

    //     if (!imageField || !videoField || !thumbField || !youtubeField || !youtubeThumbField) return;

    //     imageField.style.display = "none";
    //     videoField.style.display = "none";
    //     thumbField.style.display = "none";
    //     youtubeField.style.display = "none";
    //     youtubeThumbField.style.display = "none";

    //     if (tipoMedio.value === "imagen") {
    //       imageField.style.display = "block";
    //     } else if (tipoMedio.value === "video") {
    //       videoField.style.display = "block";
    //       thumbField.style.display = "block";
    //     } else if (tipoMedio.value === "youtube") {
    //       youtubeField.style.display = "block";
    //       youtubeThumbField.style.display = "block";
    //     }
    //   }

    //   function initializeRepeater() {
    //     document.querySelectorAll('.cmb-repeatable-grouping').forEach(row => {
    //       updateFieldVisibility(row);
    //     });
    //   }

    //   document.addEventListener("change", function(e) {
    //     if (e.target.matches('[name$="[tipo_medio]"]')) {
    //       let row = e.target.closest('.cmb-repeatable-grouping');
    //       if (row) updateFieldVisibility(row);
    //     }
    //   });

    //   // Detectar cuando se agrega un nuevo grupo repetible
    //   document.addEventListener("cmb2_add_row", function(e) {
    //     let newRow = e.detail ? e.detail.row : null;
    //     if (newRow) {
    //       // Resetear el select a su valor por defecto
    //       let tipoMedio = newRow.querySelector('[name$="[tipo_medio]"]');
    //       if (tipoMedio) tipoMedio.value = ""; // O el valor predeterminado de tu configuración

    //       // Aplicar la visibilidad correcta
    //       updateFieldVisibility(newRow);
    //     }
    //   });

    //   initializeRepeater();
    // });
    document.addEventListener("DOMContentLoaded", function() {
      function updateFieldVisibility(row) {
        let tipoMedio = row.querySelector('[name$="[tipo_medio]"]');
        if (!tipoMedio) return;

        let imageField = row.querySelector('[id$="imagen_upload"]')?.closest('.cmb-row');
        let videoField = row.querySelector('[id$="video_upload"]')?.closest('.cmb-row');
        let thumbField = row.querySelector('[id$="imagen_thumbnail"]')?.closest('.cmb-row');
        let youtubeField = row.querySelector('[id$="youtube_url"]')?.closest('.cmb-row');
        let youtubeThumbField = row.querySelector('[id$="youtube_thumbnail"]')?.closest('.cmb-row');

        [imageField, videoField, thumbField, youtubeField, youtubeThumbField].forEach(field => {
          if (field) field.style.display = "none";
        });

        switch (tipoMedio.value) {
          case "imagen":
            if (imageField) imageField.style.display = "block";
            break;
          case "video":
            if (videoField) videoField.style.display = "block";
            if (thumbField) thumbField.style.display = "block";
            break;
          case "youtube":
            if (youtubeField) youtubeField.style.display = "block";
            if (youtubeThumbField) youtubeThumbField.style.display = "block";
            break;
        }
      }

      function initializeRepeater() {
        document.querySelectorAll('.cmb-repeatable-grouping').forEach(row => {
          updateFieldVisibility(row);
        });
      }

      document.addEventListener("change", function(e) {
        if (e.target.matches('[name$="[tipo_medio]"]')) {
          let row = e.target.closest('.cmb-repeatable-grouping');
          if (row) updateFieldVisibility(row);
        }
      });

      // 👀 Detectar cuando se agrega un nuevo grupo con MutationObserver
      const observer = new MutationObserver(mutations => {
        mutations.forEach(mutation => {
          mutation.addedNodes.forEach(node => {
            if (node.nodeType === 1 && node.classList.contains("cmb-repeatable-grouping")) {
              // console.log("🆕 Nuevo grupo detectado con MutationObserver:", node);
              updateFieldVisibility(node);
            }
          });
        });
      });

      const repeatableContainer = document.querySelector('.cmb-repeatable-group');
      if (repeatableContainer) {
        observer.observe(repeatableContainer, {
          childList: true
        });
      }

      initializeRepeater();
    });
  </script>
<?php
}
add_action('admin_footer', 'cmb2_conditional_logic_script');
