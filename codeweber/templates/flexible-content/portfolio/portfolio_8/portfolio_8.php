<?php

/**
 * Portfolio 5
 */

$argss = array(
   'posts_per_page' => 6,
   'post_type' => 'projects',
);
$portfolio = get_sub_field('posts');
if ($portfolio) {
   $cw_post_ids = array();
   foreach ($portfolio as $post_ids) {
      $cw_post_ids[] = $post_ids;
   }
   $cw_post_idsd = implode(',', $portfolio);
   $argss['post__in'] = $cw_post_ids;
}
$categories = get_sub_field('categories');
if ($categories) {
   $get_terms_args = array(
      'taxonomy' => 'projects_category',
      'include' => $categories,
   );
   $argss['tax_query'] = array(
      array(
         'taxonomy' => 'projects_category',
         'field' => 'id',
         'terms' => $categories
      )
   );
}

$block = new CW_Settings(
   $cw_settings = array(
      'subtitle' => 'Our Projects',
      'patternSubtitle' => '<h2 class="fs-16 text-uppercase text-muted text-center mb-3 %2$s">%1$s</h2>',
      'title' => 'Check out some of our awesome projects with creative ideas and great design.',
      'patternTitle' => '<h3 class="display-3 mb-0 %2$s">%1$s</h3>',
      'background_class_default' => 'wrapper bg-light',
      'divider' => true,
   )
);
?>

<section id="<?php echo esc_html($args['block_id']); ?>" class="<?php echo $block->section_class; ?> <?php echo esc_html($args['block_class']); ?>" <?php echo $block->background_data; ?>>
   <div class="container py-14 py-md-16">
      <div class="row">
         <div class="mb-10">
            <?php echo $block->subtitle_first; ?>
            <?php echo $block->title; ?>
            <?php echo $block->subtitle_second; ?>
         </div>
         <!-- /column -->
      </div>
      <!-- /.row -->

      <div class="grid grid-view projects-masonry">
         <div class="row gx-md-8 gy-10 gy-md-13">
            <?php

            $querys = new WP_Query($argss);
            if ($querys->have_posts()) {
               while ($querys->have_posts()) {
                  $querys->the_post();
                  $post_id =  get_the_id();
            ?>
                  <a href="<?php echo the_permalink(); ?>" class="project item col-md-6 col-xl-4 lift">
                     <figure class="<?php echo get_theme_mod('codeweber_image'); ?> mb-6"><img src="<?php echo get_the_post_thumbnail_url($post_id, 'sandbox_hero_11'); ?>" srcset="<?php echo get_the_post_thumbnail_url($post_id, 'sandbox_hero_11'); ?>" alt="" /></figure>
                     <div class="project-details d-flex justify-content-center flex-column">
                        <div class="post-header">
                           <h2 class="post-title display-6 text-dark fs-22"><?php echo get_the_title(); ?></h2>
                           <div class="post-category text-primary"><?php echo strip_tags(get_the_term_list($post_id, 'projects_category', NULL, ',', '')); ?></div>
                        </div>
                        <!-- /.post-header -->
                     </div>
                     <!-- /.project-details -->
                  </a>
                  <!-- /.item -->
            <?php
               }
            }
            ?>
            <?php
            wp_reset_postdata();
            ?>
         </div>
         <!-- /.row -->
      </div>
      <!-- /.grid -->
   </div>
   <!-- /.container -->
   <?php if ($block->divider_wave) {
      echo $block->divider_wave;
   } ?>
   <!-- /divider -->
</section>
<!-- /section -->