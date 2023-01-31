<?php

/**
 * starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package starter
 */

if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if (!function_exists('starter_setup')) :

   function starter_setup() {
      /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
      load_theme_textdomain('starter', get_template_directory() . '/languages');

      /**
       * Add default posts and comments RSS feed links to head.
       * */
      add_theme_support('automatic-feed-links');

      /*
      * Let WordPress manage the document title.
      */
      add_theme_support('title-tag');

      /*
      * Enable support for Post Thumbnails on posts and pages.
      */
      add_theme_support('post-thumbnails');

      /*
      * Switch default core markup for search form, comment form, and comments
      * to output valid HTML5.
      */
      add_theme_support(
         'html5',
         array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
            'navigation-widgets',
         )
      );

      /**
       * Set up the WordPress core custom background feature.
       */
      add_theme_support(
         'custom-background',
         apply_filters(
            'starter_custom_background_args',
            array(
               'default-color' => 'ffffff',
               'default-image' => '',
            )
         )
      );

      /**
       * Add theme support for selective refresh for widgets.
       */
      add_theme_support('customize-selective-refresh-widgets');

      // Add support for custom header
      add_theme_support("custom-header");

      /**
       * Add support for core custom logo.
       */
      add_theme_support('custom-logo', [
         'height'      => 250,
         'width'       => 250,
         'flex-width'  => true,
         'flex-height' => true,
      ]);

      /**
       * Add post-formats support.
       */
      add_theme_support(
         'post-formats',
         array(
            'image',
            'audio',
            'video',
            'gallery',
            'quote',
            // 'link',
            // 'aside',
            // 'status',
            // 'chat',
         )
      );

      // Add support for Block Styles.
      add_theme_support('wp-block-styles');

      // Add support for full and wide align images.
      add_theme_support('align-wide');

      // Add support for editor styles.
      add_theme_support('editor-styles');

      // Add support for responsive embedded content.
      add_theme_support('responsive-embeds');

      // remove block widgets
      remove_theme_support('widgets-block-editor');

      /**
       * This theme uses wp_nav_menu() in one location.
       */
      register_nav_menus([
         'main-menu' => esc_html__('Main Menu', 'starter'),
         'footer-menu' => esc_html__('Footer Menu', 'starter'),
      ]);
   }
endif;
add_action('after_setup_theme', 'starter_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function starter_content_width() {
   // This variable is intended to be overruled from themes.
   // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
   // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
   $GLOBALS['content_width'] = apply_filters('starter_content_width', 640);
}
add_action('after_setup_theme', 'starter_content_width', 0);


/**
 * Enqueue scripts and styles.
 */

define('STARTER_THEME_DIR', get_template_directory());
define('STARTER_THEME_URI', get_template_directory_uri());
define('STARTER_THEME_CSS_DIR', STARTER_THEME_URI . '/assets/css/');
define('STARTER_THEME_JS_DIR', STARTER_THEME_URI . '/assets/js/');
define('STARTER_THEME_INC', STARTER_THEME_DIR . '/inc/');

// wp_body_open
if (!function_exists('wp_body_open')) {
   function wp_body_open() {
      do_action('wp_body_open');
   }
}


/**
 * Implement the Custom Header feature.
 */
require STARTER_THEME_INC . 'custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require STARTER_THEME_INC . 'template-functions.php';

/**
 * Custom template helper function for this theme.
 */
require STARTER_THEME_INC . 'template-helper.php';

/**
 * initialize kirki customizer class.
 */
include_once STARTER_THEME_INC . 'starter-customizer.php';
include_once STARTER_THEME_INC . 'class-kirki-customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
   require STARTER_THEME_INC . 'jetpack.php';
}

/**
 * include starter functions file
 */
require_once STARTER_THEME_INC . 'class-navwalker.php';
if (!class_exists('TGM_Plugin_Activation')) {
   require_once STARTER_THEME_INC . 'required-plugin.php';
}
require_once STARTER_THEME_INC . '/common/starter-breadcrumb.php';
require_once STARTER_THEME_INC . '/common/starter-scripts.php';
require_once STARTER_THEME_INC . '/common/starter-widgets.php';

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function starter_pingback_header() {
   if (is_singular() && pings_open()) {
      printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
   }
}
add_action('wp_head', 'starter_pingback_header');

// Change position in comment form
// ----------------------------------------------------------------------------------------
function starter_theme_comment_field($fields) {
   $comment = $fields['comment'];
   $author  = $fields['author'];
   $email   = $fields['email'];
   $url     = $fields['url'];
   $cookies = $fields['cookies'];

   unset($fields['comment']);
   unset($fields['author']);
   unset($fields['email']);
   unset($fields['url']);
   unset($fields['cookies']);

   $fields['author']  = $author;
   $fields['email']   = $email;
   $fields['url']     = $url;
   $fields['comment'] = $comment;
   $fields['cookies'] = $cookies;

   return $fields;
}
add_filter('comment_form_fields', 'starter_theme_comment_field');


// starter_comment 
if (!function_exists('starter_comment')) {
   function starter_comment($comment, $args, $depth) {
      $GLOBAL['comment'] = $comment;
      extract($args, EXTR_SKIP);
      $args['reply_text'] = 'Reply';
      $replayClass = 'comment-depth-' . esc_attr($depth);
?>
      <li class="ss__comment" id="comment-<?php comment_ID(); ?>">
         <div class="ss-comment__wrap">
            <div class="comment__avatar">
               <?php print get_avatar($comment, 102, null, null, ['class' => []]); ?>
            </div>
            <div class="comment__text">
               <div class="avatar__name">
                  <h5><?php print get_comment_author_link(); ?></h5>
                  <span><?php comment_time(get_option('date_format')); ?></span>
               </div>
               <?php comment_text(); ?>

               <div class="comment__reply">
                  <?php comment_reply_link(array_merge($args, ['depth' => $depth, 'max_depth' => $args['max_depth']])); ?>
               </div>

            </div>
         </div>
   <?php
   }
}

/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
function starter_shortcode_extra_content_remove($content) {

   $array = [
      '<p>['    => '[',
      ']</p>'   => ']',
      ']<br />' => ']',
   ];
   return strtr($content, $array);
}
add_filter('the_content', 'starter_shortcode_extra_content_remove');

/**
 * Change the excerpt more string
 */
function starter_excerpt_more($more) {
   return '&hellip;';
}
add_filter('excerpt_more', 'starter_excerpt_more');

// starter_search_filter_form
if (!function_exists('starter_search_filter_form')) {
   function starter_search_filter_form($form) {

      $form = sprintf(
         '<div class="ss-widget__search"><div class="search-px"><form action="%s" method="get">
        <input type="text" value="%s" required name="s" placeholder="%s">
        <button type="submit"> <i class="fa-light fa-magnifying-glass"></i> </button>
     </form></div></div>',
         esc_url(home_url('/')),
         esc_attr(get_search_query()),
         esc_html__('Search', 'starter')
      );

      return $form;
   }
   add_filter('get_search_form', 'starter_search_filter_form');
}


add_action('admin_enqueue_scripts', 'starter_admin_custom_scripts');
function starter_admin_custom_scripts() {
   wp_enqueue_media();
   wp_enqueue_style('customizer-style', get_template_directory_uri() . '/inc/css/customizer-style.css', array());
   wp_enqueue_script('starter-admin-custom', get_template_directory_uri() . '/inc/js/admin_custom.js', ['jquery'], '', true);
}

// ACF Data
// ----------------------------------------------------------------------------------------
if (class_exists('ACF')) {
   include_once 'inc/acf/metabox-and-options.php';
}
