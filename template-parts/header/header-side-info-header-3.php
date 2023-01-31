<?php

/**
 * Template part for displaying header side information
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package starter
 */

$starter_side_hide = get_theme_mod('starter_side_hide', false);
$starter_side_search = get_theme_mod('starter_side_search', false);
$starter_side_logo = get_theme_mod('starter_side_logo', get_template_directory_uri() . '/assets/img/logo/logo-black.png');
$starter_extra_about_text = get_theme_mod('starter_extra_about_text', __('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and will give you a complete account of the system and expound the actual teachings of the great explore', 'starter'));

$starter_extra_map_iframe = get_theme_mod('starter_extra_map_iframe', __('https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29176.030811137334!2d90.3883827!3d23.924917699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1605272373598!5m2!1sen!2sbd', 'starter'));
$starter_extra_map = get_theme_mod('starter_extra_map', __('#', 'starter'));

$starter_contact_title = get_theme_mod('starter_contact_title', __('Contact Info', 'starter'));
$starter_extra_address = get_theme_mod('starter_extra_address', __('12/A, Mirnada City Tower, NYC', 'starter'));
$starter_extra_phone = get_theme_mod('starter_extra_phone', __('088889797697', 'starter'));
$starter_extra_email = get_theme_mod('starter_extra_email', __('support@mail.com ', 'starter'));

$starter_image_gallery = get_theme_mod('starter_side_gallery_items');


$starter_header_socials_switcher = get_theme_mod('header_social_switcher', false);
?>

<!-- sidebar area start -->
<div class="sidebar__area sidebar__area-2">
   <div class="sidebar__wrapper">
      <div class="sidebar__close">
         <button class="sidebar__close-btn" id="sidebar__close-btn">
            <i class="fal fa-times"></i>
         </button>
      </div>
      <div class="sidebar__content">
         <?php if (!empty($starter_side_logo)) : ?>
            <div class="sidebar__logo">
               <a href="<?php print esc_url(home_url('/')); ?>">
                  <img src="<?php echo esc_url($starter_side_logo); ?>" alt="<?php echo esc_attr__('logo', 'starter'); ?>">
               </a>
            </div>
         <?php endif; ?>

         <?php if (!empty($starter_side_search)) : ?>
            <div class="sidebar__search">
               <form method="get" action="<?php print esc_url(home_url('/')); ?>">
                  <input type="search" name="s" value="<?php print esc_attr(get_search_query()) ?>" placeholder="<?php print esc_attr__('What are you searching for?', 'starter'); ?>">
                  <button type="submit"><i class="far fa-search"></i></button>
               </form>
            </div>
         <?php endif; ?>

         <div class="mobile-menu-2 fix"></div>
         <div class="sidebar__text d-lg-block">
            <p><?php echo esc_html($starter_extra_about_text); ?></p>
         </div>

         <?php if (!empty($starter_image_gallery)) : ?>
            <div class="sidebar__img d-none d-lg-block">
               <div class="row gx-2">
                  <?php foreach ($starter_image_gallery as $image) : ?>
                     <div class="col-4">
                        <div class="sidebar__single-img w-img">
                           <a class="popup-image" href="<?php echo esc_url($image['starter_g_image']); ?>">
                              <img src="<?php echo esc_url($image['starter_g_image']); ?>" alt="<?php echo esc_attr__('Gallery Image', 'starter'); ?>">
                           </a>
                        </div>
                     </div>
                  <?php endforeach; ?>
               </div>
            </div>
         <?php endif; ?>

         <?php if (!empty($starter_extra_map_iframe)) : ?>
            <div class="sidebar__map d-lg-block">
               <iframe src="<?php echo esc_url($starter_extra_map_iframe); ?>"></iframe>
            </div>
         <?php endif; ?>

         <?php if (!empty($starter_side_hide)) : ?>
            <div class="sidebar__contact">
               <h4><?php echo esc_html($starter_contact_title); ?></h4>
               <ul>

                  <?php if (!empty($starter_extra_address)) : ?>
                     <li class="d-flex align-items-center">
                        <div class="sidebar__contact-icon">
                           <i class="fal fa-map-marker-alt"></i>
                        </div>
                        <div class="sidebar__contact-text">
                           <a target="_blank" href="<?php echo esc_url($starter_extra_map); ?>"><?php echo esc_html($starter_extra_address); ?></a>
                        </div>
                     </li>
                  <?php endif; ?>

                  <?php if (!empty($starter_extra_phone)) : ?>
                     <li class="d-flex align-items-center">
                        <div class="sidebar__contact-icon ">
                           <i class="far fa-phone"></i>
                        </div>
                        <div class="sidebar__contact-text">
                           <a href="tel:<?php echo esc_attr($starter_extra_phone); ?>"><?php echo esc_html($starter_extra_phone); ?></a>
                        </div>
                     </li>
                  <?php endif; ?>

                  <?php if (!empty($starter_extra_email)) : ?>
                     <li class="d-flex align-items-center">
                        <div class="sidebar__contact-icon">
                           <i class="fal fa-envelope"></i>
                        </div>
                        <div class="sidebar__contact-text">
                           <a href="mailto:<?php echo esc_attr($starter_extra_email); ?>"><?php echo esc_html($starter_extra_email); ?></a>
                        </div>
                     </li>
                  <?php endif; ?>

               </ul>
            </div>

            <?php if (!empty($starter_header_socials_switcher)) : ?>
               <div class="sidebar__social">
                  <?php starter_header_social_profiles(); ?>
               </div>
            <?php endif; ?>
         <?php endif; ?>
      </div>
   </div>
</div>
<!-- sidebar area end -->
<div class="body-overlay"></div>
<!-- sidebar area end -->