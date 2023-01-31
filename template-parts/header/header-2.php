<?php

/**
 * Template part for displaying header layout two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package starter
 */

// info
$starter_topbar_switch = get_theme_mod('starter_topbar_switch', false);

$starter_header_feed = get_theme_mod('starter_header_feed', __('Our company is one of the', 'starter'));
$starter_header_delivery_text = get_theme_mod('starter_header_delivery_text', __('Deliver the sustainable success', 'starter'));
$starter_header_delivery_url = get_theme_mod('starter_header_delivery_url', __('#', 'starter'));

$starter_top_menu = get_theme_mod('starter_top_menu', __('', 'starter'));

$starter_phone_num = get_theme_mod('starter_phone_num', __('786 686 350 36', 'starter'));
$starter_address = get_theme_mod('starter_address', __('16/A, New York, US', 'starter'));
$starter_address_url = get_theme_mod('starter_address_url', __('https://goo.gl/maps/qzqY2PAcQwUz1BYN9', 'starter'));

// contact button
$starter_button_text = get_theme_mod('header_right_button_text', __('Make Request', 'starter'));
$starter_button_link = get_theme_mod('header_right_button_link', __('#', 'starter'));

// acc button
$starter_acc_button_text = get_theme_mod('starter_acc_button_text', __('Login', 'starter'));
$starter_acc_button_link = get_theme_mod('starter_acc_button_link', __('#', 'starter'));

// header right
$starter_search = get_theme_mod('header_search', false);
$starter_header_right = get_theme_mod('starter_header_right', false);
$starter_menu_col = $starter_header_right ? 'col-xl-10 col-lg-10 col-md-6 col-6' : 'col-xl-12 col-lg-12 col-md-12 col-12';

?>


<!-- header-area-start -->
<header class="header__area">
   <?php if (!empty($starter_topbar_switch)) : ?>
      <div class="header__top theme-bg d-none d-lg-block">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-xl-7 col-lg-7 col-md-7">
                  <div class="header__top-info">
                     <?php if (!empty($starter_header_feed)) : ?>
                        <p class="header__top-info-text"><span><?php echo esc_html__('Feed:', 'starter'); ?></span> <?php echo esc_html($starter_header_feed); ?></p>
                     <?php endif; ?>

                     <?php if (!empty($starter_header_delivery_text)) : ?>
                        <p><a href="<?php echo esc_url($starter_header_delivery_url); ?>"><?php echo esc_html($starter_header_delivery_text); ?></a></p>
                     <?php endif; ?>
                  </div>
               </div>
               <div class="col-xl-5 col-lg-5 col-md-5">
                  <div class="header__top-right">
                     <?php if (!empty($starter_top_menu)) : ?>
                        <div class="header__sm-links">
                           <?php echo starter_kses($starter_top_menu); ?>
                        </div>
                     <?php endif; ?>
                     <div class="header__lang">
                        <?php starter_header_lang_default(); ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   <?php endif; ?>

   <div class="header__inner grey-bg-5 p-relative z-index-1 d-none d-lg-block">
      <div class="container">
         <div class="row">
            <div class="col-xl-4 col-lg-3">
               <div class="header__logo-overlay">
                  <?php starter_header_logo(); ?>
               </div>
            </div>
            <div class="col-xl-8 col-lg-9">
               <div class="header__smcontact">
                  <?php if (!empty($starter_address)) : ?>
                     <div class="header__smcontact-list">
                        <div class="sm-clist__icon">
                           <i class="flaticon-location-pin"></i>
                        </div>
                        <div class="sm-clist__text">
                           <h4><a href="<?php echo esc_url($starter_address_url); ?>" target="_blank"><?php echo esc_html($starter_address); ?></a></h4>
                           <span><?php echo esc_html__('Contact Us', 'starter'); ?></span>
                        </div>
                     </div>
                  <?php endif; ?>

                  <?php if (!empty($starter_phone_num)) : ?>
                     <div class="header__smcontact-list">
                        <div class="sm-clist__icon">
                           <i class="flaticon-telephone-call"></i>
                        </div>
                        <div class="sm-clist__text">
                           <h4><a href="tel:<?php echo esc_url($starter_phone_num); ?>"><?php echo esc_html($starter_phone_num); ?></a></h4>
                           <span><?php echo esc_html__('Get Support', 'starter'); ?></span>
                        </div>
                     </div>
                  <?php endif; ?>

                  <?php if (!empty($starter_button_text)) : ?>
                     <div class="header__smcontact-list header__smcontact-list-df">
                        <div class="sm-clist__text sm-clist__text-2">
                           <span><?php echo esc_html__('Get A Quote', 'starter'); ?></span>
                           <h4><a href="<?php echo esc_url($starter_button_link); ?>"><?php echo esc_html($starter_button_text); ?></a></h4>
                        </div>
                        <div class="sm-clist__icon sm-clist__icon-2">
                           <a href="<?php echo esc_url($starter_button_link); ?>"> <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                     </div>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div id="header-sticky" class="header__bottom-2 black-bg-2">
      <div class="container">
         <div class="row align-items-center">
            <div class="<?php echo esc_attr($starter_menu_col) ?>">
               <div class="main-menu main-menu-2">
                  <nav id="mobile-menu">
                     <?php starter_header_menu(); ?>
                  </nav>
               </div>
               <div class="mobile-logo d-lg-none">
                  <?php starter_header_logo(); ?>
               </div>
            </div>
            <?php if (!empty($starter_header_right)) : ?>
               <div class="col-xl-2 col-lg-2 col-md-6 col-6">
                  <div class="header__sm-action">
                     <div class="header__sm-action-item right-border">
                        <a href="javascript:void(0)" class="info-toggle-btn f-right sidebar-toggle-btn"><i class="fal fa-bars"></i></a>
                     </div>
                     <?php if (!empty($starter_search)) : ?>
                        <div class="header__sm-action-item">
                           <a href="javascript:void(0)" data-bs-toggle="modal" class="search" data-bs-target="#search-modal"><i class="fal fa-search"></i></a>
                        </div>
                     <?php endif; ?>
                  </div>
               </div>
            <?php endif; ?>
         </div>
      </div>
   </div>
</header>
<!-- header-area-end -->


<?php get_template_part('template-parts/header/header-side-info'); ?>