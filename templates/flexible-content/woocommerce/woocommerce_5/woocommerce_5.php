<?php

/**
 * Woocommerce 3
 */

$block = new CW_Settings(
   $cw_settings = array(
      'subtitle' => 'Our Models',
      'patternSubtitle' => '<p class="lead fs-lg mb-6 %2$s">%1$s</p>',
      'title' => 'Check out some of our awesome projects with creative ideas and great design.',
      'patternTitle' => '<h3 class="display-4 mb-6 %2$s">%1$s</h3>',
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
         <div class=" projects-masonry shop">
            <div class="row g-5 isotope">
               <?php $product = get_sub_field('product'); ?>
               <?php if ($product) {
                  foreach ($product as $post_ids) {
                     $main_image_id = get_post_thumbnail_id($post_ids);
                     $gallery_images = get_post_meta($post_ids, '_product_image_gallery', true);
                     $gallery_images_ids = $gallery_images ? explode(',', $gallery_images) : [];
                     $total_images_count = count($gallery_images_ids);
                     if ($main_image_id) {
                        $total_images_count += 1;
                     }
                     if (has_post_thumbnail($post_ids)) {
                        $image_html = get_the_post_thumbnail($post_ids, 'archive_4', ['class' => 'img-fluid']);
                        $image_link = get_the_post_thumbnail_url($post_ids, 'sandbox_hero_18');
                     } else {
                        $image_html = '<img src="'
                           . get_template_directory_uri() . '/dist/img/placeholder_600x600.jpeg" class="img-fluid" alt="Placeholder Image">';
                        $image_link = get_template_directory_uri() . '/dist/img/placeholder_600x600.jpeg';
                     }
               ?>
                     <div class="project item col-12 col-md-6 col-lg-3 col-xl-3">
                        <div class="position-relative">
                           <a data-glightbox href="<?php echo $image_link; ?>" data-gallery="<?php echo $post_ids; ?><?php echo esc_html($args['block_id']); ?>" class="position-relative card lift
    ">
                              <div class="row align-items-center">
                                 <div class="col-lg-12">
                                    <figure class="rounded">
                                       <?php echo $image_html;
                                       ?>
                                       <?php if ($total_images_count > 1) { ?>
                                          <div class="count_image text-white position-absolute bottom-0 end-0 p-3">
                                             <span class="icon_count_wrap"><i class="uil uil-images"></i></span>
                                             <span class="count_wrap"><?php echo $total_images_count; ?></span>
                                          </div>
                                       <?php } ?>
                                    </figure>
                                 </div>

                                 <div class="col-lg-12">
                                    <div class="p-4">
                                       <h2 class="display-6 text-center fs-18  woocommerce-loop-product__title">
                                          <?php echo get_the_title($post_ids); ?>
                                       </h2>

                                       <?php
                                       $product = wc_get_product($post_ids);
                                       if ($product) {
                                          $description = $product->get_description();

                                          if (!empty($description)) {
                                             echo '<div class="product-description">' . esc_html($description) . '</div>';
                                          }
                                       }
                                       ?>
                                    </div>


                                 </div>


                              </div>
                           </a>
                        </div>
                     </div>
                     <?php // Получаем галерею изображений (ID вложений)
                     $gallery_images = get_post_meta($post_ids, '_product_image_gallery', true);
                     $gallery_images_ids = $gallery_images ? explode(',', $gallery_images) : []; ?>
                     <div class="d-none"><?php if (!empty($gallery_images_ids)) {
                                             $product_id = $post_ids;
                                             $count = 0; // Инициализируем счётчик
                                             foreach ($gallery_images_ids as $image_id) {
                                                $count++;

                                                $gallery_image = wp_get_attachment_image_src($image_id, 'sandbox_hero_18');
                                                $gallery_image_url = $gallery_image ? $gallery_image[0] : ''; ?>
                              <figure class="rounded mb-6">
                                 <img
                                    data-glightbox
                                    data-gallery="<?php echo $post_ids; ?><?php echo esc_html($args['block_id']); ?>"
                                    src="<?php echo esc_url($gallery_image_url); ?>"
                                    alt="Gallery Image"
                                    class="img-fluid">
                              </figure>
                        <?php };
                                          }; ?>
                     </div>
               <?php };
               }; ?>
            </div>
         </div>
         <?php the_sub_field('shortcode'); ?>
      </div>
   </div>
   <?php

   do_action('button_after_flexible_content_woo_1_');
   ?>
</section>