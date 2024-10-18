<?php

/**
 * Woocommerce 2
 */

$block = new CW_Settings(
   $cw_settings = array(
      'subtitle' => 'Our Models',
      'patternSubtitle' => '<h2 class="fs-16 text-uppercase text-muted mb-3 %2$s">%1$s</h2>',

      'title' => 'Check out some of our awesome projects with creative ideas and great design.',
      'patternTitle' => '<h3 class="display-4 mb-9 %2$s">%1$s</h3>',

      'background_class_default' => 'wrapper bg-light',

      'shapes' => array('<div class="shape bg-line leaf rounded-circle rellax w-17 h-17" data-rellax-speed="1" style="top: -2rem; right: -0.6rem;"></div>', '<div class="shape bg-pale-violet rounded-circle rellax w-17 h-17" data-rellax-speed="1" style="bottom: -2rem; left: -0.4rem;"></div>'),
   )
);
?>

<section id="<?php echo esc_html($args['block_id']); ?>" class="<?php echo $block->section_class; ?> <?php echo esc_html($args['block_class']); ?>" <?php echo $block->background_data; ?>>
   <div class="container py-14 py-md-16">
      <div class="row">
         <div class="col-lg-9 col-xl-8 col-xxl-7">
            <?php echo $block->subtitle_first; ?>
            <!--/subtitle -->
            <?php echo $block->title; ?>
            <!--/title -->
            <?php echo $block->subtitle_second; ?>
            <!--/subtitle -->
         </div>
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
            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 gx-5 gy-5">
               <?php
               $array_terms = array();
               foreach ($terms as $term) {
                  // Получаем изображение категории
                  $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                  $image_url = wp_get_attachment_url($thumbnail_id);
                  if (!$image_url) {
                     $image_url = wc_placeholder_img_src();
                  }; ?>
                  <a href="#" class="col lift" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-<?php echo $term->term_id; ?>">
                     <figure class="rounded mb-6">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($term->name); ?>">
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
<?php
         };
      };
      do_action('button_after_flexible_content_woo_1_'); ?>
</div>
<!-- /.container -->

</section>
<!-- /section -->
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
?>

      <div class="offcanvas offcanvas-end bg-light" id="offcanvas-<?php echo $term->term_id; ?>" aria-modal="true" data-bs-scroll="true" role="dialog">
         <div class="offcanvas-header">
            <div class="display-6 text-primary"> <?php echo esc_html($term->name); ?></div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <div class="offcanvas-body pb-6">
            <div class="row row-cols-1 row-cols-md-1 gx-0 gx-md-8 gx-xl-12 gy-5">
               <?php
               // Получаем товары
               $products = new WP_Query($args);
               if ($products->have_posts()) :
                  while ($products->have_posts()) : $products->the_post();
                     // Получаем ссылку на основное изображение товара
                     $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                     echo '<a href="' . $thumbnail_url . '" data-glightbox="description: .caption1" " data-gallery="' . $term->term_id . '" class="item-link col project item text-uppercase">';
                     echo '<figure class="rounded">';
                     echo '<img src="' . $thumbnail_url . '"><div class="item-link"><i class="uil  uil-plus"></i></div>';
                     echo '</figure>';
                     echo '</a><div class="glightbox-desc caption1"><p class="display-6 fs-18">' . get_the_title() . '</p></div>';
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

foreach ($array_terms as $term) {
   get_products_by_term_id($term);
}
