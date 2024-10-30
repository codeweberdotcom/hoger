<?php

/**
 * About company widget offcanvas
 */
function about_company_option()
{
   if (get_field('about_company', 'option')) {
      $about_company_option = '<div class="widget mb-8"><p>' . get_field('about_company', 'option') . '</p></div>';
   } else {
      $about_company_option = NULL;
   }
   return $about_company_option;
}

/**
 * Socials widget offcanvas
 */

function social_icons_option()
{
   if (class_exists('ACF')) {
      $social_icons = NULL;
      foreach (codeweber_socialicons() as $key => $value) {
         if (get_field('social_' . $key, 'option')) {
            $social_icons .= '<a href="' . esc_attr(get_field('social_' . $key, 'option')) . '" title="' . esc_attr($value['social-name']) . '" target="_blank">
            <i class="text-primary fs-30 ' . esc_attr($value['icon-style']) . ' ' . esc_attr($value['icon-name']) . '"></i>
         </a>';
         };
      };

      if ($social_icons !== NULL) { ?>
         <div class="widget">
            <div class="widget-title mb-3 h4"><?php esc_html_e('Follow Us', 'codeweber'); ?></div>
            <nav class="nav social">
               <?php if (class_exists('ACF')) {
                  echo $social_icons;
               }; ?>

               <?php if (have_rows('social', 'option')) : ?>
                  <?php while (have_rows('social', 'option')) : the_row(); ?>

                     <a href="<?php the_sub_field('pinterest'); ?>" class="d-flex align-items-center" title="pinterest" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" width="28" height="28">
                           <path d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3 .8-3.4 5-20.3 6.9-28.1 .6-2.5 .3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z" />
                        </svg>
                     </a>



                  <?php endwhile; ?>
               <?php endif; ?>
            </nav>
            <!-- /.social -->
         </div>
         <!-- /.widget -->
      <?php
      }
   }
}


/**
 * Menu widget offcanvas
 */

function offcanvas_menu_option()
{
   if (has_nav_menu('offcanvas_right')) { ?>

      <div class="widget mb-8">
         <div class="widget-title mb-3 h4"><?php esc_html_e('Learn More', 'codeweber'); ?></div>
         <?php
         wp_nav_menu(
            array(
               'theme_location'    => 'offcanvas_right',
               'depth'             => 1,
               'container'         => '',
               'container_class'   => '',
               'container_id'      => '',
               'menu_class'        => '',
               'items_wrap'      => '<ul id="%1$s" class="%2$s list-unstyled">%3$s</ul>',
               'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
               'walker'            => new WP_Bootstrap_Navwalker(),
            )
         );
         ?>
      </div>
   <?php
   }
}


/**
 * Contact widget offcanvas
 */

function offcanvas_contact_option()
{ ?>
   <div class="widget mb-8">
      <div class="widget-title mb-3 h4"><?php esc_html_e('Contact Info', 'codeweber'); ?></div>
      <address> <?php echo brk_adress(); ?> </address>
      <a href="mailto:<?php brk_email(); ?>"><?php echo brk_email(); ?></a><br />
      <?php echo brk_phones(NULL); ?>
   </div>
<?php
}

/**
 * Contact widget md_offcanvas
 */

function md_offcanvas_contact_option()
{ ?>
   <a href="mailto:<?php echo brk_email(); ?>" class="link-inverse"><?php echo brk_email(); ?></a>
   <br />
   <?php echo brk_phones('light'); ?>
   <?php
}

/**
 * Socials widget md_offcanvas
 */

function md_social_icons_option()
{
   if (class_exists('ACF')) {
      $social_icons = NULL;
      foreach (codeweber_socialicons() as $key => $value) {
         if (get_field('social_' . $key, 'option')) {
            $social_icons .= '<a href="' . esc_attr(get_field('social_' . $key, 'option')) . '" title="' . esc_attr($value['social-name']) . '" target="_blank">
            <i class="fs-30 ' . esc_attr($value['icon-style']) . ' ' . esc_attr($value['icon-name']) . '"></i>
         </a>';
         };
      };

      if ($social_icons !== NULL) { ?>

         <nav class="nav social social-white mt-4">
            <?php if (class_exists('ACF')) {
               echo $social_icons;
            }; ?>
         </nav>
         <!-- /.social -->

      <?php
      }
   }
}


/**
 * Socials widget md_offcanvas
 */

function sm_social_icons_option()
{
   if (class_exists('ACF')) {
      $social_icons = NULL;
      foreach (codeweber_socialicons() as $key => $value) {
         if (get_field('social_' . $key, 'option')) {
            $social_icons .= '<a href="' . esc_attr(get_field('social_' . $key, 'option')) . '" title="' . esc_attr($value['social-name']) . '" target="_blank">
            <i class="fs-25 ' . esc_attr($value['icon-style']) . ' ' . esc_attr($value['icon-name']) . '"></i>
         </a>';
         };
      };

      if ($social_icons !== NULL) { ?>

         <nav class="nav social social-white ms-lg-2">
            <?php if (class_exists('ACF')) {
               echo $social_icons;
            }; ?>
         </nav>
         <!-- /.social -->

<?php
      }
   }
}


add_filter('get_the_archive_title_prefix', '__return_empty_string');
