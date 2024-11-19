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
         <div class="woo-3 grid grid-view projects-masonry shop">
            <div class="row  isotope">
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
                     $image_html = get_the_post_thumbnail($post_ids, 'archive_4', ['class' => 'img-fluid']);
                     $image_link = get_the_post_thumbnail_url($post_ids, 'sandbox_hero_18');
                     ?>
                     <div class="project item col-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="position-relative lift">
                           <a data-glightbox href="<?php echo $image_link; ?>" data-gallery="<?php echo $post_ids; ?>" class="position-relative
    ">
                              <figure class="rounded mb-6">
                                 <?php echo $image_html;
                                 ?>
                              </figure>
                              <h2 class="rounded overflow-hidden title-wrap-cw position-absolute ps-3 pe-10 w-100 pb-3 pt-10 mb-0 bottom-0 start-0 pb-0 mb-0 post-title display-6 fs-18 text-white  woocommerce-loop-product__title">
                                 <?php echo get_the_title($post_ids); ?>
                              </h2>
                              <div class="count_image text-white position-absolute bottom-0 end-0 p-3">
                                 <span class="icon_count_wrap"><i class="uil uil-images"></i></span>
                                 <span class="count_wrap"><?php echo $total_images_count; ?></span>
                              </div>
                           </a>
                        </div>
                     </div>
                     <?php // Получаем галерею изображений (ID вложений)
                     $gallery_images = get_post_meta($post_ids, '_product_image_gallery', true);
                     $gallery_images_ids = $gallery_images ? explode(',', $gallery_images) : []; ?>
                     <div class="d-none"><?php if (!empty($gallery_images_ids)) {
                            $product_id = $post_ids; 
                            foreach ($gallery_images_ids as $image_id) {
                                  $gallery_image = wp_get_attachment_image_src($image_id, 'sandbox_hero_18');
                                   $gallery_image_url = $gallery_image ? $gallery_image[0] : ''; ?>
                              <figure class="rounded mb-6">
                                 <img
                                    data-glightbox
                                    data-gallery="<?php echo $post_ids; ?>"
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