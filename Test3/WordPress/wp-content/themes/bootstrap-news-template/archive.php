<?php ?>
<?php get_header();
echo  setPostViews(get_the_ID());


 ?>
        <!-- Nav Bar End -->

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">News</a></li>
                    <?php
                    $category =get_the_category($post->ID);
// dd($post->ID);
                    $tag =get_the_tags($post->ID);
                    foreach ($category as $cd) {

                    // dd($cd->name);
              $cat = $cd->term_id;
              $name = $cd->name;
              $slug = $cd->slug;

              $category_name = $cd->category_nicename;

              // $cat->name = $cd->name;

               $args = array('post_type' => 'post',
                                    'category' => $cat,
                                    'numberposts' => '3'
                               );
               $posts = get_posts($args);

               // dd($posts_educati);
$tax = $wp_query->get_queried_object();
                ?>
              <?php  }   ?>
                    <li class="breadcrumb-item active">Category: <?php echo $name; ?>  /</li>

                    <li>  <?php if ( is_singular() ) : ?>
                			<?php the_title( '<h4 class="entry-title default-max-width">', '</h4>' ); ?>
                		<?php else : ?>
                			<?php the_title( sprintf( '<h5 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>
                		<?php endif; ?> </li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Single News Start-->
        <div class="single-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="sn-container">

                         <!-- <div class="row"> -->



                                <div class="sn-img">
                                    <!-- <img src="img/news-825x525.jpg" /> -->
                                    <img class="post" style="width:540px;height:344px"  src="<?php echo get_the_post_thumbnail_url(); ?>"/>

                                </div>
                                <div class="sn-content">

                                    <h1 class="sn-title"><?php if ( is_singular() ) : ?>
                                			<?php the_title( '<h1 class="entry-title default-max-width">', '</h1>' ); ?>
                                		<?php else : ?>
                                			<?php the_title( sprintf( '<h3 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                                		<?php endif; ?>
                                      </h1>
                                    <p>
                                      <?php
                                      // the_content(
                                      //   twenty_twenty_one_continue_reading_text()
                                      // );

                                      wp_link_pages(
                                        array(
                                          'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
                                          'after'    => '</nav>',
                                          /* translators: %: Page number. */
                                          'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
                                        )
                                      );

                                      ?>                                        <?php echo $post->post_content; wp_link_pages(); ?>

                                    </p>

                                </div>


<!-- phân trang -->
                              <div class="navigation  ">
                                  <div class="row ">
                                  <div class="col-xs-12 nav ">
                                  <?php glx_custom_pagination(); ?>
                                  </div>
                                  </div>
                                </div>



                      </div>
</div>
                        <div class="sn-related">
                            <h2>Related News</h2>
                            <div class="row sn-slider">
                              <?php
                              $category =get_the_category($post->ID);
                                     // dd($category);
                              foreach ($category as $cd) {
                              // dd($cd->term_id);
                        $cat = $cd->term_id;
                        // $cat->name = $cd->name;

                         $args = array('post_type' => 'post',
                                              'category' => $cat,
                                              'numberposts' => '3'
                                         );
                         $posts = get_posts($args);

                           }
                         // dd($posts);
                         foreach ($posts as $post) {
                          ?>
                                <div class="col-md-4">
                                    <div class="sn-img">
                                        <!-- <img src="img/news-350x223-4.jpg" /> -->
                                        <img class="post" style="width:400px;height:143px"  src="<?php echo get_the_post_thumbnail_url(); ?>"/>

                                        <div class="sn-title">
                                            <a href="<?php  the_permalink() ?>"><?php echo $post->post_title ; ?></a>
                                        </div>
                                    </div>
                                </div>
                              <?php }?>
                            </div>
                        </div>
                    </div>
<!-- In This Category -->

                </div>

        </div>
        <!-- Single News End-->

  <?php get_footer(); ?>
    </body>
</html>
?>
