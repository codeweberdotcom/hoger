<?php

/**
 *  FAQ 4
 */


$block = new CW_Settings(
   $cw_settings = array(

      'title' => 'Frequently Asked Questions',
      'patternTitle' => '<h2 class="display-4 mb-4 %2$s">%1$s</h2>',

      'subtitle' => 'If you don\'t see an answer to your question, you can send us an email from our contact form.',
      'patternSubtitle' => '<p class="lead fs-lg mb-0 %2$s">%1$s</p>',

      'paragraph' => 'Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Nullam quis risus eget urna mollis ornare.',
      'patternParagraph' => '<p class="lead mb-6 %2$s">%1$s</p>',

      'buttons' => '<a href="#" class="btn btn-primary rounded-pill">All FAQ</a>',
      'buttons_pattern' => '<div class="d-flex justify-content-center justify-content-lg-start flex-wrap" data-cues="slideInDown" data-group="page-title-buttons" data-delay="900">%s</div>',

      'background_class_default' => 'wrapper',

      'divider' => true,

      'column_class_1' => '',
      'column_class_2' => 'order-lg-2',

      'accordeon_demo' => '<div class="accordion accordion-wrapper" id="accordionExample">
                     <div class="card plain accordion-item">
                        <div class="card-header" id="headingOne">
                           <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">How do I get my subscription receipt?</button>
                        </div>
                        <!--/.card-header -->
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                           <div class="card-body">
                              <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                           </div>
                           <!--/.card-body -->
                        </div>
                        <!--/.accordion-collapse -->
                     </div>
                     <!--/.accordion-item -->
                     <div class="card plain accordion-item">
                        <div class="card-header" id="headingTwo">
                           <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Are there any discounts for people in need?</button>
                        </div>
                        <!--/.card-header -->
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                           <div class="card-body">
                              <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                           </div>
                           <!--/.card-body -->
                        </div>
                        <!--/.accordion-collapse -->
                     </div>
                     <!--/.accordion-item -->
                     <div class="card plain accordion-item">
                        <div class="card-header" id="headingThree">
                           <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Do you offer a free trial edit?</button>
                        </div>
                        <!--/.card-header -->
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                           <div class="card-body">
                              <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                           </div>
                           <!--/.card-body -->
                        </div>
                        <!--/.accordion-collapse -->
                     </div>
                     <!--/.accordion-item -->
                     <div class="card plain accordion-item">
                        <div class="card-header" id="headingFour">
                           <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">How do I reset my Account password?</button>
                        </div>
                        <!--/.card-header -->
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                           <div class="card-body">
                              <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                           </div>
                           <!--/.card-body -->
                        </div>
                        <!--/.accordion-collapse -->
                     </div>
                     <!--/.accordion-item -->
                  </div>
                  <!--/.accordion -->',
   )
);
?>



<section id="<?php echo esc_html($args['block_id']); ?>" class="<?php echo $block->section_class; ?> " <?php echo $block->background_data; ?>>
   <div class="container <?php echo esc_html($args['block_class']); ?>">
      <div class="card bg-soft-primary rounded-4">
         <div class="card-body p-md-10 p-xl-11">
            <div class="row gx-lg-8 gx-xl-12 gy-10">
               <div class="col-lg-6 <?php echo $block->column_class_1; ?>">
                  <?php echo $block->subtitle_first; ?>
                  <!--/subtitle -->
                  <?php echo $block->title; ?>
                  <!--/title -->
                  <?php echo $block->subtitle_second; ?>
                  <!--/subtitle -->
                  <?php echo $block->paragraph; ?>
                  <!--/paragraph -->
                  <?php echo $block->buttons; ?>
                  <!--/buttons group -->
               </div>
               <!--/column -->
               <div class="col-lg-6 <?php echo $block->column_class_2; ?>">
                  <?php echo $block->accordeon; ?>
                  <!--/.accordion -->
               </div>
               <!--/column -->
            </div>
            <!--/.row -->
         </div>
         <!--/.card-body -->
      </div>
      <!--/.card -->
   </div>
   <!-- /.container -->
   <?php if ($block->divider_wave) {
      echo $block->divider_wave;
   } ?>
   <!-- /divider -->
</section>
<!-- /section -->