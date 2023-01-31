<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package starter
 */

$starter_audio_url = function_exists('get_field') ? get_field('fromate_style') : NULL;
if (is_single()) :
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('ss__post format-audio'); ?>>
        <?php if (!empty($starter_audio_url)) : ?>
            <div class="ss-feature__image">
                <?php echo wp_oembed_get($starter_audio_url); ?>
            </div>
        <?php endif; ?>

        <div class="ss__content">
            <!-- post meta -->
            <?php get_template_part('template-parts/blog/blog-meta'); ?>

            <div class="post-text">
                <?php the_content(); ?>
                <?php
                wp_link_pages([
                    'before'      => '<div class="ss-page__links"> <span class="ss-page-links__title">' . esc_html__('Pages:', 'starter') . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__('Page', 'starter') . ' </span>%',
                    'separator'   => '<span class="screen-reader-text"> </span>',
                ]);
                ?>
            </div>

            <!-- tags -->
            <?php echo starter_get_tag(); ?>
        </div>
    </article>

<?php else : ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('ss-post__grid format-audio'); ?>>
        <div class="ss-post__wrapper">

            <?php if (!empty($starter_audio_url)) : ?>
                <div class="ss-post__thumb">
                    <?php echo wp_oembed_get($starter_audio_url); ?>
                </div>
            <?php endif; ?>
            <div class="ss-post-content__wrapper">
                <!-- post meta -->
                <?php get_template_part('template-parts/blog/post-meta'); ?>

                <h3 class="ss-post__title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                <?php the_excerpt(); ?>

                <?php get_template_part('template-parts/blog/post-btn'); ?>
            </div>
            <div class="ss-clearfix"></div>
        </div>
    </article>
<?php
endif; ?>