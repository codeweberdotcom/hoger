<?php
/*
Template Name: Projects 2
Template Post Type: projects
*/

get_header('transparent');
global $post;
if (have_rows('main_information')) :
   while (have_rows('main_information')) : the_row();

      if (get_sub_field('address')) {
         $project_address = get_sub_field('address');
      } else {
         $project_address = NULL;
      }

      // if (get_sub_field('zodchestvo')) {
      //    $project_zodchestvo = get_sub_field('zodchestvo');
      // } else {
      //    $project_zodchestvo = NULL;
      // }

      if (get_sub_field('developer')) {
         $project_developer = get_sub_field('developer');
      } else {
         $project_developer = NULL;
      }

      if (get_sub_field('architector')) {
         $project_architector = get_sub_field('architector');
      } else {
         $project_architector = NULL;
      }

      if (get_sub_field('short_description')) {
         $project_short_description = get_sub_field('short_description');
      } else {
         $project_short_description = NULL;
      }
      if (get_sub_field('title_description')) {
         $project_title_description = get_sub_field('title_description');
      } else {
         $project_title_description = NULL;
      }
      if (get_sub_field('description')) {
         $project_description = get_sub_field('description');
      } else {
         $project_description = NULL;
      }
      if (get_sub_field('title_description_2')) {
         $project_title_description_2 = get_sub_field('title_description_2');
      } else {
         $project_title_description_2 = NULL;
      }
      if (get_sub_field('description_2')) {
         $project_description_2 = get_sub_field('description_2');
      } else {
         $project_description_ = NULL;
      }
   endwhile;
endif; ?>
<?php if ($codeweber['page_settings']['page_header_type'] == 'default' || $codeweber['page_settings']['page_header_type'] == NULL) { ?>
   <section class="wrapper image-wrapper bg-image mt-0 overflow-hidden bg-overlay text-white" data-image-src="<?php echo get_the_post_thumbnail_url($post, 'project_1'); ?>">
      <div class="container pt-17 pb-12 pt-md-19 pb-md-16 text-center">
         <div class="row">
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
               <div class="post-header">
                  <?php if (wp_get_post_terms(get_the_ID(), 'projects_category')) { ?>
                     <div class="post-category text-line text-white">
                        <a href="<?php echo get_term_link(wp_get_post_terms(get_the_ID(), 'projects_category')[0]->term_id);  ?>" class="hover text-white" rel="category"><?php echo wp_get_post_terms(get_the_ID(), 'projects_category')[0]->name; ?></a>
                     </div>
                  <?php }; ?>
                  <!-- /.post-category -->
                  <h1 class="display-1 mb-3 text-white"><?php echo codeweber_page_title(); ?></h1>
                  <?php if (isset($project_short_description)) { ?>
                     <p class="lead px-md-12 px-lg-12 px-xl-15 px-xxl-18"><?php echo $project_short_description;  ?></p>
                  <?php } ?>
                  <?php codeweber_breadcrumbs(NULL, 'text-white', true); ?>
               </div>
               <!-- /.post-header -->
            </div>
            <!-- /column -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container -->
   </section>
   <!-- /section -->
<?php } ?>

<section class="wrapper bg-light wrapper-border">
   <div class="container pt-14 pt-md-16 pb-13 pb-md-15">
      <div class="row">
         <div class="col-lg-10 offset-lg-1">
            <article>
               <?php if (isset($project_title_description)) { ?>
                  <h2 class="display-6 mb-4"><?php echo $project_title_description; ?></h2>
               <?php } else { ?>
                  <h2 class="display-6 mb-4"><?php esc_html_e('Title', 'codeweber'); ?></h2>
               <?php } ?>
               <div class="row gx-0">
                  <?php $class_col_one = "col-md-12"; ?>

                  <div class="<?php echo $class_col_one; ?> text-justify">
                     <table class="table">
                        <?php if (isset($project_address)) { ?>
                           <tr>
                              <td class="ps-0">
                                 <div class="display-6 fs-16 mb-1 text-primary"><?php echo __('Адрес объекта', 'codeweber'); ?></div>
                              </td>
                              <td class="ps-0">
                                 <?php echo $project_address; ?>
                              </td>
                           </tr>
                        <?php }; ?>
                        <?php if (isset($project_developer)) { ?>
                           <tr>
                              <td class="ps-0">
                                 <div class="display-6 fs-16 mb-1 text-primary"><?php echo __('Девелопер проекта', 'codeweber'); ?></div>
                              </td>
                              <td class="ps-0">
                                 <?php echo $project_developer; ?>
                              </td>
                           </tr>
                        <?php }; ?>
                        <?php if (isset($project_architector)) { ?>
                           <tr>
                              <td class="ps-0">
                                 <div class="display-6 fs-16 mb-1 text-primary"><?php echo __('Архитектор проекта', 'codeweber'); ?></div>
                              </td>
                              <td class="ps-0">
                                 <?php echo $project_architector; ?>
                              </td>
                           </tr>
                        <?php }; ?>


                        <?php if (have_rows('main_information')) :
                           while (have_rows('main_information')) : the_row();

                              if (get_sub_field('title_works')) {
                                 echo '<tr><td class="ps-0"><div class="display-6 fs-16 mb-1 text-primary">' . get_sub_field('title_works') . '</div></td>';
                              } else {
                                 echo '<tr><td class="ps-0"><div class="display-6 fs-16 mb-1 text-primary">На объекте были выполнены следющие работы:</div></td>';
                              }

                              if (have_rows('works')) : ?>

                                 <td class="ps-0">
                                    <ul class="unordered-list bullet-primary">
                                       <?php
                                       $project_works = '';
                                       while (have_rows('works')) : the_row();
                                          echo '<li>' . get_sub_field('work') . '</li>';
                                       endwhile;
                                       ?>
                                    </ul>
                                 </td>
                                 </tr>
                        <?php
                              else :
                                 $project_works = NULL;
                              endif;
                           endwhile;
                        endif; ?>
                     </table>
                  </div>
                  <!--/column -->



               </div>
               <!--/.row -->
            </article>
            <!-- /.project -->
         </div>
         <!-- /column -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container -->
   <div class="container-fluid px-md-6">
      <div class="swiper-container blog grid-view mb-17 mb-md-19" data-margin="30" data-nav="true" data-dots="true" data-items-xxl="3" data-items-md="2" data-items-xs="1">
         <div class="swiper">
            <div class="swiper-wrapper">
               <?php if (have_rows('izobrazheniya')) : ?>
                  <?php while (have_rows('izobrazheniya')) : the_row(); ?>
                     <?php if (have_rows('image')) : ?>
                        <?php while (have_rows('image')) :
                           the_row(); ?>
                           <?php $image = get_sub_field('image'); ?>
                           <?php if ($image) : ?>
                              <div class="swiper-slide">

                                 <figure class="hover-scale rounded cursor-dark"><a href="<?php echo esc_url($image['url']); ?>" data-glightbox data-gallery="project-1"><img src="<?php echo esc_url($image['sizes']['project_1_1']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a></figure>
                              </div>
                              <!--/.swiper-slide -->
                           <?php endif; ?>
                        <?php endwhile; ?>
                     <?php endif; ?>
                  <?php endwhile; ?>
               <?php endif; ?>
            </div>
            <!--/.swiper-wrapper -->
         </div>
         <!-- /.swiper -->
      </div>
      <!-- /.swiper-container -->
   </div>
   <!-- /.container-fluid -->
</section>
<!-- /section -->
<?php the_content(); ?>
<!-- /content -->
<section class="wrapper bg-light">
   <div class="container py-10">
      <div class="row gx-md-6 gy-3 gy-md-0">
         <?php codeweber_posts_nav(); ?>
         <aside class="col-md-4 sidebar text-center text-md-end">
            <?php codeweber_share_page(); ?>
         </aside>
         <!-- /column .sidebar -->
      </div>
      <!--/.row -->
   </div>
   <!-- /.container -->
</section>
<!-- /section -->
</div>
<!-- /.content-wrapper -->
<?php get_footer();
