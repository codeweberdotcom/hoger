  <footer class="bg-navy text-inverse">
     <div class="container pt-15 pt-md-13 pb-13 pb-md-15">
        <div class="d-lg-flex flex-row align-items-lg-center">
           <h2 class="display-4 mb-6 mb-lg-0 w-100 text-white"><?php cta_footer_text(); ?></h2>
           <?php cta_footer_button(); ?>
        </div>
        <!--/div -->
        <hr class="mt-11 mb-12" />
        <div class="row gy-6 gy-lg-0">
           <div class="col-md-4 col-lg-3">
              <div class="widget">
                 <?php echo codeweber_logo('light', true, NULL); ?>
                 <p class="mb-4"><a class="text-white-50" href="<?php echo esc_attr(wp_get_theme()->get('ThemeURI')); ?>" target="_blank">
                       © <?php echo date("Y"); ?> <?php the_field('company', 'option'); ?></a>
                    <br class="d-none d-lg-block" /><?php esc_html_e('All rights reserved.', 'codeweber'); ?>
                 </p>
                 <nav class="nav social social-white">
                    <?php if (class_exists('ACF')) {
                        get_template_part('templates/components/socialicons', '');
                     }; ?>
                 </nav>
                 <!-- /.social -->
              </div>
              <!-- /.widget -->
           </div>
           <!-- /column -->
           <div class="col-md-4 col-lg-3">
              <div class="widget">
                 <h4 class="widget-title display-6 fs-18 text-white mb-3"><?php echo esc_html__('Get in Touch', 'codeweber'); ?></h4>
                 <address class="pe-xl-15 pe-xxl-17"><?php echo brk_adress(); ?></address>
                 <a href="mailto:<?php echo brk_email(); ?>"><?php echo brk_email(); ?></a><br />
                 <?php echo brk_phone_one(NULL); ?><br />
                 <?php echo brk_phone_two(NULL); ?><br />
              </div>
              <!-- /.widget -->
           </div>
           <!-- /column -->
           <div class="col-md-4 col-lg-3">
              <div class="widget">
                 <h4 class="widget-title display-6 fs-18 text-white mb-3"><?php esc_html_e('Learn More', 'codeweber'); ?></h4>
                 <?php get_template_part('templates/components/footer-menu', ''); ?>
              </div>
              <!-- /.widget -->
           </div>
           <!-- /column -->
           <div class="col-md-12 col-lg-3">
              <div class="widget">
                 <h4 class="widget-title display-6 fs-18 text-white mb-3"><?php esc_html_e('Popular Posts', 'codeweber'); ?></h4>
                 <?php sandbox_recent_post(); ?>
              </div>
              <!-- /.widget -->
           </div>
           <!-- /column -->
        </div>
        <!--/.row -->
        <p class="mt-6 mb-0 text-center"><a class="text-white-50 mt-6 mb-0" href="<?php echo esc_attr(wp_get_theme()->get('ThemeURI')); ?>" target="_blank">
              © <?php esc_html_e('Made with', 'codeweber'); ?> Codeweber</a></p>
     </div>
     <!-- /.container -->
  </footer>