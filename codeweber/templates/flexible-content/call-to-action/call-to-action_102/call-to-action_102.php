<?php

/**
 *  Call to Action 101
 */

/** Phone */
$phone = get_field('phone', 'option');


$block = new CW_Settings(
   $cw_settings = array(
      'title' => 'Get Consultation',
      'patternTitle' => '<h2 class="display-6 text-white mb-4 mb-lg-0 %2$s">%1$s</h2>',

      'subtitle' => 'Call Now',
      'patternSubtitle' => '<p class="text-white lead fs-lg mb-0 %2$s">%1$s</p>',

      'buttons' => '<span><a class="btn btn-lg btn-white rounded-pill mb-0 text-nowrap">Call Back</a></span>',
      'buttons_pattern' => '<div class="d-flex justify-content-center flex-wrap justify-content-lg-end" data-cues="slideInDown" data-group="page-title-buttons" data-delay="900">%s</div>',

      'background_class_default' => 'card image-wrapper bg-full bg-image bg-overlay bg-overlay-400',
      'background_data_default' => '/dist/img/photos/bg3.jpg',
   )
);
?>

<div class="col-xl-12 mx-auto">
   <div class="<?php echo $block->section_class; ?> <?php echo esc_html($args['block_class']); ?>" <?php echo $block->background_data; ?>>
      <div class="card-body p-6 p-md-11 d-lg-flex flex-row align-items-lg-center justify-content-md-between text-left text-lg-start">
         <div class="col-lg-6 col-xl-6 col-xxl-7">
            <?php echo $block->subtitle_first; ?>
            <!--/subtitle -->
            <?php echo $block->title; ?>
            <!--/title -->
            <?php echo $block->subtitle_second; ?>
            <!--/subtitle -->
         </div>

         <div class="col">
            <?php echo $block->buttons; ?>
            <!--/buttons group -->
         </div>
      </div>
      <!--/.card-body -->
   </div>
   <!--/.card -->
</div>
<!-- /column -->