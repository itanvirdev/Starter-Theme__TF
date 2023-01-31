<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package starter
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>


    <?php
    $starter_preloader_switcher = get_theme_mod('starter_preloader', false);
    $starter_backtotop_switcher = get_theme_mod('starter_backtotop', false);

    $starter_preloader_logo = get_template_directory_uri() . '/assets/img/preloader.svg';

    $preloader_logo = get_theme_mod('preloader_logo', $starter_preloader_logo);

    ?>

    <?php if (!empty($starter_preloader_switcher)) : ?>
        <!-- Preloader -->
        <div class="preloader" style="background-image: url(<?php echo esc_url($preloader_logo); ?>);"></div>
        <!-- pre loader area end -->
    <?php endif; ?>


    <!-- back to top start -->
    <div class="progress-wrap <?php echo !$starter_backtotop_switcher ? 'd-none' : '' ?>">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- back to top end -->


    <!-- header start -->
    <?php do_action('starter_header_style'); ?>
    <!-- header end -->

    <!-- wrapper-box start -->
    <?php do_action('starter_before_main_content'); ?>

    <main class="clearfix" id="main">