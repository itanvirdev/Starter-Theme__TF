<?php

/**
 * Template Name: Page Sidebar
 * @package starter
 */

get_header();

$blog_column = is_active_sidebar('blog-sidebar') ? 8 : 12;

?>

<div class="ss-page__area">
  <div class="container">
    <div class="row">
      <div class="col-lg-<?php print esc_attr($blog_column); ?>">
        <div class="ss-page__content">
          <?php
          if (have_posts()) :
            while (have_posts()) : the_post();
              get_template_part('template-parts/content', 'page');
            endwhile;
          else :
            get_template_part('template-parts/content', 'none');
          endif;
          ?>
        </div>
      </div>
      <!-- sidebar -->
      <?php if (is_active_sidebar('blog-sidebar')) : ?>
        <div class="col-lg-4">
          <div class="ss-main__sidebar">
            <?php get_sidebar(); ?>
          </div>
        </div>
      <?php endif; ?>
      <!--! sidebar -->
    </div>
  </div>
</div>

<?php
get_footer();
