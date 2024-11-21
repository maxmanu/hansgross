<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package seed
 */

get_header();
?>
<?php get_template_part('template-parts/content', 'nav'); ?>
<main>
  <section id="section-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-10 mx-auto">
          <div class="row">
            <?php if (have_posts()) : ?>
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <?php
                  $term = get_queried_object();
                  $tag_image = get_field('imagen_de_etiqueta', $term);
                  $profesion = get_field('profesion', $term);
                  if (!empty($tag_image)) : ?>
                    <img src="<?php echo esc_url($tag_image['url']); ?>" alt="<?php echo esc_attr($tag_image['alt']); ?>" />
                  <?php endif; ?>
                </div>
                <div class="flex-grow-1 ms-3">
                  <?php
                  the_archive_title('<h2 class="page-title">', '</h2>'); ?>
                  <span>
                    <?php
                    echo esc_html($profesion);
                    ?>
                  </span>
                  <?php
                  the_archive_description('<div class="archive-description">', '</div>');
                  ?>
                </div>
              </div>
            <?php
              while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', get_post_type());
              endwhile;
              the_posts_navigation();
            else :
              get_template_part('template-parts/content', 'none');
            endif;
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
