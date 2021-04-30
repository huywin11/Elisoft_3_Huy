<?php ?>
<?php get_header();
// echo  setPostViews(get_the_ID());


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
                    // dd($category);
                    $tag =get_the_tags($post->ID);
                    foreach ($category as $cd) {
                    // dd($category);
              $cat = $cd->term_id;
              $name = $cd->name;

              // $cat->name = $cd->name;

               $args = array('post_type' => 'post',
                                    'category' => $cat,
                                    'numberposts' => '3'
                               );
               $posts_education = get_posts($args);

               // dd($posts_sports);
               $args1 = array(
                 'post_type' => 'post',
                'category' => $cat,
                'count'   => true // Return only the count
                  );
$comments_count = get_comments( $args1 );


                ?>
                  <?php } ?>
                    <li class="breadcrumb-item active"><?php echo $name ?></li>


                    <li class="breadcrumb-item active">

                      <?php $id = $post->ID;
        //$_SESSION['view'] = [];
        $_SESSION['view'][] = $id;
        $flag = 0;
        foreach($_SESSION['view'] as $k=>$v){
            if($v == $id){
                $flag++;
            }
        }
        if($flag == 1){
            setPostViews(get_the_ID());
        } ?>

        <span class="count-views"><i class="fas fa-eye"></i> <?php echo getPostViews(get_the_ID()); ?> </span>
        <li class="breadcrumb-item active"><i class="far fa-comments"></i>  <?php $post = get_post( $id );

	if ( ! $post ) {
		$count = 0;
	} else {
	echo	$count   = $post->comment_count;

	} ?> </li>


                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Single News Start-->
        <div class="single-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="sn-container">

                            <div class="sn-img">
                                <!-- <img src="img/news-825x525.jpg" /> -->
                                <img class="post" style="width:540px;height:344px"  src="<?php echo get_the_post_thumbnail_url(); ?>"/>

                            </div>
                            <div class="sn-content">

                                <h1 class="sn-title"><?php echo $post->post_title; ?></h1>
                                <p>
                                    <?php echo $post->post_content; ?>
                                </p>

                            </div>
                            <h1 class="sn-title">
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
                                // dd($posts_sports);

                                 ?>

                          </h1>
                        </div>


                        <?php
                        while ( have_posts() ) :
                          the_post();

                          get_template_part( 'template-parts/content/content', 'single' );

                          if ( is_singular( 'attachment' ) ) {
                            // Parent post navigation.
                            the_post_navigation(
                              array(
                                /* translators: %s: Parent post link. */
                                'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'bootstrap-news-template' ), '%title' ),
                              )
                            );
                          } elseif ( is_singular( 'post' ) ) {
                            // Previous/next post navigation.
                            the_post_navigation(
                              array(
                                'next_text' =>

                                  '<span class="post-title" style = "color:red;" >
                                  %title
                                   ->></span>',
                                'prev_text' =>

                                  '<span class="post-title" style = "color:red;"><<-
                                  %title
                                  </span>',
                              )
                            );
                          }


                        endwhile; // End the loop.?>
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
                         // dd($posts_sports);
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

                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="sidebar-widget">
                                <h2 class="sw-title">In This Category</h2>
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
                           // dd($posts_sports);
                           foreach ($posts as $post) {
                            ?>
                                <div class="news-list">

                                    <div class="nl-item">
                                        <div class="nl-img">
                                          <img class="post" style="width:100px;height:64px"  src="<?php echo get_the_post_thumbnail_url(); ?>"/>
                                            <!-- <img src="img/news-350x223-1.jpg" /> -->
                                        </div>
                                        <div class="nl-title">
                                            <a href="<?php  the_permalink() ?>"><?php echo $post->post_title ; ?></a>
                                        </div>
                                    </div>

                                </div>
                                  <?php }?>
                            </div>

                            <div class="sidebar-widget">
                                <div class="image">
                                    <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image"></a>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <div class="tab-news">
                                    <ul class="nav nav-pills nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#featured">Featured</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#popular">Popular</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#latest">Latest</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="featured" class="container tab-pane active">
                                          <?php
                                           foreach ($posts as $post) {
                                           ?>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img class="post" style="width:100px;height:64px"  src="<?php echo get_the_post_thumbnail_url(); ?>"/>
                                                    <!-- <img src="img/news-350x223-1.jpg" /> -->
                                                </div>
                                                <div class="tn-title">
                                                    <a href="<?php  the_permalink() ?>"><?php echo $post->post_title ; ?></a>
                                                </div>
                                            </div>
                                          <?php }?>
                                        </div>
                                        <div id="popular" class="container tab-pane fade">
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-4.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-3.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-2.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-1.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-2.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="latest" class="container tab-pane fade">
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-3.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-4.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-5.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-4.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/news-350x223-3.jpg" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <div class="image">
                                    <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image"></a>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2 class="sw-title">News Category</h2>
                                <div class="category">
                                  <?php
                                  $category =get_the_category($post->ID);

                                  foreach ($category as $cd) {
                                  // dd($category);
                            $cat = $cd->term_id;
                            $name = $cd->name;
                            $count = $cd->count;

                            // $cat->name = $cd->name;

                             $args = array('post_type' => 'post',
                                                  'category' => $cat,
                                                  'numberposts' => '3'
                                             );
                             $posts_education = get_posts($args);

                             // dd($posts_sports);

                              ?>
                                    <ul>
                                        <li><a href=""><?php echo $name ?></a><span>(<?php echo $count ?>)</span></li>

                                    </ul>
                                  <?php }?>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <div class="image">
                                    <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image"></a>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2 class="sw-title">Tags Cloud</h2>
                                <?php
                                foreach ($tag as $t) {
                                 ?>
                                <div class="tags">
                                    <a href="<?php get_the_archive_description(); ?>"><?php echo $t->name ?></a>
                                </div>
                              <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--Link and comments  -->
        <?php
        while ( have_posts() ) :
          the_post();
          get_template_part( 'template-parts/content/content', 'single' );
          // If comments are open or we have at least one comment, load up the comment template.
          if ( comments_open() || get_comments_number() ) {
            comments_template();
          }

        endwhile; // End the loop.?>
        <!-- Single News End-->

  <?php get_footer(); ?>
    </body>
</html>
?>
