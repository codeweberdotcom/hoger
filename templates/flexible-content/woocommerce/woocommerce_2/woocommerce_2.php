<?php

/**
 * Woocommerce 2
 */

$block = new CW_Settings(
   $cw_settings = array(
      'subtitle' => 'Our Models',
      'patternSubtitle' => '<h2 class="fs-16 text-uppercase text-muted mb-3 %2$s">%1$s</h2>',

      'title' => 'Check out some of our awesome projects with creative ideas and great design.',
      'patternTitle' => '<h3 class="display-4 mb-10 %2$s">%1$s</h3>',

      'background_class_default' => 'wrapper bg-light',

      'shapes' => array('<div class="shape bg-line leaf rounded-circle rellax w-17 h-17" data-rellax-speed="1" style="top: -2rem; right: -0.6rem;"></div>', '<div class="shape bg-pale-violet rounded-circle rellax w-17 h-17" data-rellax-speed="1" style="bottom: -2rem; left: -0.4rem;"></div>'),
   )
);
?>

<section id="<?php echo esc_html($args['block_id']); ?>" class="<?php echo esc_attr($block->section_class); ?> <?php echo esc_html($args['block_class']); ?>" <?php echo $block->background_data; ?>>
   <div class="container ">
      <div class="row g-0 wrapper">
         <div class="col-lg-9 g-0 col-xl-8 col-xxl-7">
            <?php echo $block->subtitle_first; ?>
            <!--/subtitle -->
            <?php echo $block->title; ?>
            <!--/title -->
            <?php echo $block->subtitle_second; ?>
            <!--/subtitle -->
         </div>

         <?php
         $category = get_sub_field('category'); // Получаем поле категории ACF
         if ($category) {
            // Включаем только те категории, которые были выбраны в ACF, и сохраняем их порядок
            $get_terms_args = array(
               'taxonomy' => 'product_cat',
               'hide_empty' => 0,
               'include' => $category,
               'orderby' => 'include', // Сортируем в порядке, в котором они идут в массиве $category
            );
            $terms = get_terms($get_terms_args);
            if ($terms) { ?>
               <div class="grid grid-view projects-masonry shop">
                  <div class="row g-2 g-md-4 gx-md-8 gy-10 gy-md-13 isotope">
                     <?php
                     $array_terms = array();
                     foreach ($terms as $term) {
                        // Получаем изображение категории
                        $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);

                        // Если изображение существует, получаем его с необходимым размером
                        if ($thumbnail_id) {
                           $image_html = wp_get_attachment_image($thumbnail_id, 'sandbox_about_4', false, array('class' => 'img-fluid'));
                        } else {
                           // Если изображения нет, используем плейсхолдер
                           $image_html = '<img src="' . esc_url(wc_placeholder_img_src()) . '" alt="' . esc_attr($term->name) . '" class="img-fluid">';
                        }
                     ?>

                        <a href="#" class="project item col-6 col-md-3 col-xl-3 lift" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-<?php echo esc_attr($term->term_id); ?>">
                           <figure class="rounded mb-6">
                              <?php echo $image_html; ?>
                           </figure>
                           <div class="post-header">
                              <h2 class="post-title display-6 fs-18 text-primary woocommerce-loop-product__title">
                                 <?php echo esc_html($term->name); ?>
                              </h2>
                           </div>
                           <?php $array_terms[] = $term; ?>
                        </a>
                     <?php
                     };
                     ?>
                  </div>
               </div>
               <?php the_sub_field('shortcode'); ?>
      </div>
   </div>
<?php
            }
         }
         do_action('button_after_flexible_content_woo_1_');
?>
</section>

<?php
if (!function_exists('get_products_by_term_id')) {
   function get_products_by_term_id($term)
   {
      $args = array(
         'post_type' => 'product',
         'posts_per_page' => -1, // Количество товаров (-1 для всех товаров)
         'tax_query' => array(
            array(
               'taxonomy' => 'product_cat',
               'field'    => 'term_id',
               'terms'    => $term->term_id, // ID категории
            ),
         ),
      );

      // Получаем товары
      $products = new WP_Query($args);
?>

      <div class="offcanvas offcanvas-end bg-light" id="offcanvas-<?php echo esc_attr($term->term_id); ?>" aria-modal="true" data-bs-scroll="true" role="dialog">
         <div class="offcanvas-header">
            <div class="display-6 text-primary"> <?php echo esc_html($term->name); ?></div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <div class="offcanvas-body pb-6">

            <div class="row row-cols-1 row-cols-md-1 gx-0 gx-md-8 gx-xl-12 gy-5">
               <?php
               if ($products->have_posts()) :
                  while ($products->have_posts()) : $products->the_post();

                     // Получаем ссылку на основное изображение товара
                     $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
               ?>
                     <a href="<?php echo esc_url($thumbnail_url); ?>" data-glightbox="title: <?php echo get_the_title(); ?>" data-gallery="<?php echo esc_attr($term->term_id); ?>" class="item-link col project item text-uppercase">
                        <figure class="rounded overlay overlay-1">
                           <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                           <span class="bg"></span>

                           <figcaption>
                              <div class="from-top mb-0 mt-5"><i class="uil uil-plus"></i></div>
                           </figcaption>
                        </figure>
                     </a>

               <?php
                  endwhile;
                  wp_reset_postdata(); // Сбрасываем данные запроса
               else :
                  echo '<p>Товары не найдены.</p>';
               endif;
               ?>
            </div>
         </div>
      </div>
<?php
   }
}

// Выводим товары для каждой категории
foreach ($array_terms as $term) {
   get_products_by_term_id($term);
}
?>