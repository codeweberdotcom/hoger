<?php
global $codeweber;
?>

<section class="wrapper bg-light<?php echo $codeweber['page_settings']['angle_class']; ?>">
   <div class="container <?php echo $codeweber['page_settings']['container_class']; ?>">
      <div class="row">
         <div class="col-12 <?php echo $codeweber['page_settings']['content_class']; ?>">
            <div class="row">
               <?php
               $row = 0;
               while (have_posts()) {
                  the_post();
                  $post_id = get_the_ID();
                  if ($row % 2 === 0) {
                     $col_class_1 = 'col-lg-6 p-10 ';
                     $col_class_2 = 'col-lg-6';
                     $card_body_class = 'card lift';
                     $row_class = 'row gy-10 align-items-center';
                  } else {
                     $col_class_1 = 'col-lg-6 p-10';
                     $col_class_2 = 'col-lg-6';
                     $card_body_class = 'card lift';
                     $row_class = 'row gy-10 align-items-center';
                  }
                  if ($row == 0 || $row == 2 || $row == 3 || $row == 4 || $row == 5) {
                     $bg_card_color = 'bg-soft-primary';
                  } elseif ($row == 1 || $row == 3 || $row == 4 || $row == 5 || $row == 6) {
                     $bg_card_color  = 'bg-soft-violet';
                  }
               ?>
                  <div class="col-lg-6 mb-10">
                     <a href="<?php the_permalink(); ?>" class="<?php echo $card_body_class; ?> h-100">
                        <div class="<?php echo $row_class; ?>">
                           <div class="<?php echo $col_class_1; ?>">
                              <?php $category_service = wp_get_post_terms(get_the_ID(), 'service_category'); ?>
                              <?php if (isset($category_service[0])) { ?>
                                 <div class="post-category mb-3 text-muted">
                                    <?php
                                    echo $category_service[0]->name;
                                    ?>
                                 </div>
                              <?php
                              } ?>
                              <h2 class="display-5 text-primary post-title mb-3"> <?php the_title(); ?></h2>

                           </div>
                           <!-- /column -->
                           <div class="<?php echo $col_class_2; ?>">
                              <figure><img class="img-fluid rounded" src="<?php echo get_the_post_thumbnail_url($post_id, 'archive_4_1'); ?>" srcset="<?php echo get_the_post_thumbnail_url($post_id, 'archive_4_1'); ?>" alt="" /></figure>
                           </div>
                           <!-- /column -->
                        </div>
                        <!-- /.row -->
                     </a>
                     <!--/.card-body -->
                  </div>
                  <!--/.card -->

               <?php $row++;
               }; ?>

               <?php codeweber_pagination(); ?>
               <!-- /post pagination -->
            </div>
         </div>
         <!-- /.container -->

      </div>
   </div>
</section>
<!-- /section -->