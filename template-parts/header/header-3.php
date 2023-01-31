<?php

/**
 * Template part for displaying header layout three
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package starter
 */

// info
$starter_topbar_switch = get_theme_mod('starter_topbar_switch', false);
$starter_phone_num = get_theme_mod('starter_phone_num', __('+(088) 234 567 899', 'starter'));
$starter_mail_id = get_theme_mod('starter_mail_id', __('info@starter.com', 'starter'));
$starter_address = get_theme_mod('starter_address', __('Moon ave, New York, 2020 NY US', 'starter'));
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
$starter_menu_col = $starter_header_right ? 'col-xl-7 col-lg-2 col-md-1 col-sm-1' : 'col-xl-9 col-lg-8 col-md-7 col-sm-6';

?>


<!-- header-area-start -->
<header id="header-sticky" class="header__area-3 pt-40 pb-40">
   <div class="container custom-container">
      <div class="row">
         <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 col-12">
            <div class="header__side">
               <div class="header__side-icon info-toggle-btn sidebar-toggle-btn">
                  <span class="bar1"></span>
                  <span class="bar2"></span>
                  <span class="bar3"></span>
               </div>
               <div class="header__side-logo">
                  <?php starter_header_logo(); ?>
               </div>
            </div>
         </div>
         <div class="<?php echo esc_attr($starter_menu_col); ?>">
            <div class="main-menu-3 menu-counter">
               <nav id="mobile-menu-2">
                  <?php starter_header_menu(); ?>
               </nav>
            </div>
         </div>

         <?php if (!empty($starter_header_right)) : ?>
            <div class="col-xl-2 col-lg-6 col-md-6 col-sm-5">
               <?php if (!empty($starter_button_text)) : ?>
                  <div class="header__smcontact-list header__smcontact-list-3">
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
         <?php endif; ?>
      </div>
   </div>
</header>
<!-- header-area-end -->



<?php get_template_part('template-parts/header/header-side-info-header-3'); ?>