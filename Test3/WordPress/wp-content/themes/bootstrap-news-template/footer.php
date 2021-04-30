<div class="footer">
    <div class="container" >
        <div class="row">
          <div class="col-lg-3 col-md-6">
               <div class="footer-widget">
                   <h3 class="title">Liện hệ</h3>
                   <div class="contact-info">
                       <p><i class="fa fa-map-marker"></i><?php bloginfo( 'url' ); ?></p>
                       <p><i class="fa fa-envelope"></i><?php bloginfo( 'admin_email' ); ?></p>
                       <p><i class="fa fa-phone"></i><?php bloginfo( 'phone' ); ?></p>
                       <div class="social">
                         <?php   $location = get_nav_menu_locations();

                             $social_menu =get_term($location['secondary']);
                             // dd($primary_menu);
                            $social_menu_items = wp_get_nav_menu_items($social_menu->term_id);
                              foreach ($social_menu_items as $social) {?>
                                <a href="<?php echo $social->guid; ?>"><i class="fab fa-<?php echo $social->post_name; ?>"></i></a>

                           <?php   } ?>
                       </div>
                   </div>
               </div>
           </div>
          <?php
          if(is_active_sidebar(index: 'sidebar-1'))
            dynamic_sidebar(index: 'sidebar-1');

          ?>





            <!-- <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="title">Bảng tin</h3>
                    <div class="newsletter">
                        <p>
                            Tình hình dịch bệnh trong nước đang dần được kiểm soát, không được chủ quan khi dịch vẫn đang diễn biến phức tạp ở các nước khác.
                        </p>
                        <form>
                            <input class="form-control" type="email" placeholder="Your email here">
                            <button class="btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div> -->
            <?php if(is_active_sidebar(index: 'sidebar-3'))
              dynamic_sidebar(index: 'sidebar-3'); ?>
              <?php if(is_active_sidebar(index: 'sidebar-2'))
                dynamic_sidebar(index: 'sidebar-2'); ?>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Footer Menu Start -->

<!-- Footer Menu End -->

<!-- Footer Bottom Start -->
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6 copyright">
                <p>Copyright &copy; <a href="https://htmlcodex.com">HTML Codex</a>. All Rights Reserved</p>
            </div>

            <div class="col-md-6 template-by">
                <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
            </div>
        </div>
    </div>
</div>
<!-- Footer Bottom End -->

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/slick/slick.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
<?php wp_footer(); ?>
