

    <?php
//     $location = get_nav_menu_locations();
// // dd($location);
//       $primary_menu =get_term($location['footer2']);
//       // dd($primary_menu);
//      $primary_menu_items = wp_get_nav_menu_items($primary_menu->term_id);
//        dd($primary_menu_items);
     ?>

<?php get_header(); ?>
            <!-- Nav Bar End -->


            <?php

// category slider
//
$args = array('post_type' => 'slider',           // post_type này là loại nó nằm trong phần tạo slider, tên slug là gì thì gọi ra
              'numberposts'  => '3'    );            // này là số tin , bài trên 1 trang
$posts_slider = get_posts($args);
// dd($posts_slider);
$the_query = new WP_Query( $args );

//category chính trị
$args = array('post_type' => 'post',
                      'category' => '8',         // 8 này là term_id trong bảng wp_term_taxonomy ,cần category nào thì lấy ra, đối chiếu trong admin, category, id nào là category đó
                      'numberposts' => '4'
                 );
$posts_category = get_posts($args);
$the_query = new WP_Query( $args );
// category thể thao
$args = array('post_type' => 'post',
                      'category' => '6',
                      'numberposts' => '4'
                 );
 $posts_sports = get_posts($args);
//category education
$args = array('post_type' => 'post',
                      'category' => '11',
                      'numberposts' => '4'
                 );
 $posts_education = get_posts($args);
$args = array('post_type' => 'post',
                      'category' => '7',
                      'numberposts' => '3',
                      'meta_key'  => 'post_views_count',
                      'orderby' => 'meta_value_num',
                      'order' => 'DESC'
                 );
 $posts_economic = get_posts($args);
 // dd($posts_economic);
$args = array('post_type' => 'post',
                      'category' => '9',
                      'numberposts' => '3'
                 );
 $posts_law = get_posts($args);
  // dd($postcategory);
 // dd($post);
// The Query

// $the_querycategory = new WP_Query( $argscategogy );

// The Loop
// if ( $the_query->have_posts() ) {
//    echo '<ul>';
//    while ( $the_query->have_posts() ) {
//        $the_query->the_post();
//        echo '<li>' . get_the_title() . '</li>';
//    }
//    echo '</ul>';
// } else {
//    // no posts found
// }
/* Restore original Post Data */
wp_reset_postdata();
             $query = new WP_Query( array( 'post_type' => 'page' ) );
              // dd($query);


// function the_post_thumbnail_url( $size = 'post-thumbnail' ) {
//     $url = get_the_post_thumbnail_url( null, $size );
//
//     if ( $url ) {
//         echo esc_url( $url );
//     }
// }
             ?>
            <!-- Top News Start-->
            <?php do_action('huy_before_content'); ?>
            <!-- khi tạo thì tất cả các hàm móc vào trong cái hook này thì nó sẽ chạy ngay phần này, ngay vị trí này

          tức là qua file functions bỏ nay hook init thay bằng hook huy_before_content -->
            <div class="top-news">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 tn-left">
                            <div class="row tn-slider">

                                      <?php foreach ($posts_slider as $post) { ?>
                                             <div class="col-md-6">
                                                 <div class="tn-img">
                                              <?php if(has_post_thumbnail($post->ID)): ?>
                                             <img class="post" style="width:540px;height:344px"  src="<?php echo get_the_post_thumbnail_url(); ?>"/>
                                           <?php endif ;?>
                                      <?php ?>
                                        <div class="tn-title">
                                            <a href="<?php  the_permalink() ?>"><?php echo $post->post_title; ?></a>
                                        </div>


                                      </div>
                                  </div>
                                        <?php }

                                       ?>

                                <!-- <div class="col-md-6">
                                    <div class="tn-img">
                                        <img src="img/news-450x350-2.jpg" />
                                        <div class="tn-title">
                                            <a  href="">Integer hendrerit elit eget purus sodales maximus</a>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-md-6 tn-right">
                            <div class="row">
                              <?php
                                     foreach ($posts_category as $post) { ?>
                                     <div class="col-md-6">
                                         <div class="tn-img">

                                        <!-- <img src="img/news-350x223-1.jpg" />
                                        <div class="tn-title">
                                            <a href="">Lorem ipsum dolor sit</a>
                                        </div> -->
                                          <img class="post" style="width:270px;height:172px"  src="<?php echo get_the_post_thumbnail_url(); ?>"/>
                                     <!-- <img src="img/news-450x350-1.jpg" /> -->
                                     <div class="tn-title">
                                         <a href="<?php  the_permalink() ?>"><?php echo $post->post_title ; ?></a>
                                     </div>
                                 </div>
                             </div>
                           <?php
                                   // echo '</ul>';
                                }?>
                                <!-- <div class="col-md-6">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-2.jpg" />
                                        <div class="tn-title">
                                            <a href="">Lorem ipsum dolor sit</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-3.jpg" />
                                        <div class="tn-title">
                                            <a href="">Lorem ipsum dolor sit</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-4.jpg" />
                                        <div class="tn-title">
                                            <a href="">Lorem ipsum dolor sit</a>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Top News End-->

            <!-- Category News Start-->
            <div class="cat-news">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Sports</h2>
                            <div class="row cn-slider">
                              <?php foreach ($posts_sports as $post) { ?>
                                <div class="col-md-6">
                                    <div class="cn-img">
                                      <img class="post" style="width:255px;height:162px"  src="<?php echo get_the_post_thumbnail_url(); ?>"/>
                                        <!-- <img src="img/news-350x223-1.jpg" /> -->
                                        <div class="cn-title">
                                            <a href="<?php  the_permalink() ?>"><?php echo $post->post_title ; ?></a>
                                        </div>
                                    </div>
                                </div>
                              <?php }?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <h2>Technology</h2>
                            <div class="row cn-slider">
                              <?php foreach ($posts_education as $post) { ?>
                                <div class="col-md-6">
                                    <div class="cn-img">
                                      <img class="post" style="width:255px;height:162px"  src="<?php echo get_the_post_thumbnail_url(); ?>"/>

                                        <!-- <img src="img/news-350x223-4.jpg" /> -->
                                        <div class="cn-title">
                                            <a href="<?php  the_permalink() ?>"><?php echo $post->post_title ; ?></a>
                                        </div>
                                    </div>
                                </div>
                              <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Category News End-->

            <!-- Category News Start-->
            <div class="cat-news">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Business</h2>
                            <div class="row cn-slider">
                              <?php foreach ($posts_category as $post) {
                               ?>
                                <div class="col-md-6">
                                    <div class="cn-img">
                                      <img class="post" style="width:255px;height:162px"  src="<?php echo get_the_post_thumbnail_url(); ?>"/>

                                        <!-- <img src="img/news-350x223-5.jpg" /> -->
                                        <div class="cn-title">
                                            <a href="<?php  the_permalink() ?>"><?php echo $post->post_title ; ?></a>
                                        </div>
                                    </div>
                                </div>
                              <?php }?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h2>Entertainment</h2>
                            <div class="row cn-slider">
                              <?php foreach ($posts_law as $post) {
                               ?>
                                <div class="col-md-6">
                                    <div class="cn-img">
                                      <img class="post" style="width:255px;height:162px"  src="<?php echo get_the_post_thumbnail_url(); ?>"/>

                                        <!-- <img src="img/news-350x223-2.jpg" /> -->
                                        <div class="cn-title">
                                          <a href="<?php  the_permalink() ?>"><?php echo $post->post_title ; ?></a>

                                        </div>
                                    </div>
                                </div>
                              <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Category News End-->

            <!-- Tab News Start-->
            <div class="tab-news">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#featured">Slider</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#popular">Sports</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#latest">Economic</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="featured" class="container tab-pane active">
                                  <?php foreach ($posts_slider as $post) {
                                  ?>
                                    <div class="tn-news">
                                        <div class="tn-img">
                                          <img class="post" style="width:150px;height:96px"  src="<?php echo get_the_post_thumbnail_url(); ?>"/>
                                            <!-- <img src="img/news-350x223-1.jpg" /> -->
                                        </div>
                                        <div class="tn-title">
                                              <a href="<?php  the_permalink() ?>"><?php echo $post->post_title ; ?></a>
                                        </div>
                                    </div>
                                  <?php }?>
                                </div>
                                <div id="popular" class="container tab-pane fade">
                                  <?php foreach ($posts_sports as $post) {
                                  ?>
                                    <div class="tn-news">
                                        <div class="tn-img">
                                          <img class="post" style="width:150px;height:96px"  src="<?php echo get_the_post_thumbnail_url(); ?>"/>
                                            <!-- <img src="img/news-350x223-4.jpg" /> -->
                                        </div>
                                        <div class="tn-title">
                                              <a href="<?php  the_permalink() ?>"><?php echo $post->post_title ; ?></a>
                                        </div>
                                    </div>
                                  <?php }?>
                                </div>
                                <div id="latest" class="container tab-pane fade">
                                  <?php foreach ($posts_economic as $post) {
                                  ?>
                                    <div class="tn-news">
                                        <div class="tn-img">
                                          <img class="post" style="width:150px;height:96px"  src="<?php echo get_the_post_thumbnail_url(); ?>"/>
                                            <!-- <img src="img/news-350x223-2.jpg" /> -->
                                        </div>
                                        <div class="tn-title">
                                          <a href="<?php  the_permalink() ?>"><?php echo $post->post_title ; ?></a>
                                        </div>
                                    </div>
                                  <?php }?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#m-viewed">Giáo dục</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#m-read">Pháp luật</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#m-recent">Kinh tế</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="m-viewed" class="container tab-pane active">
                                  <?php foreach ($posts_education as $post) {
                                  ?>
                                    <div class="tn-news">
                                        <div class="tn-img">
                                          <img class="post" style="width:150px;height:96px"  src="<?php echo get_the_post_thumbnail_url(); ?>"/>
                                            <!-- <img src="img/news-350x223-1.jpg" /> -->
                                        </div>
                                        <div class="tn-title">
                                              <a href="<?php  the_permalink() ?>"><?php echo $post->post_title ; ?></a>
                                        </div>
                                    </div>
                                  <?php }?>
                                </div>
                                <div id="m-read" class="container tab-pane fade">
                                  <?php foreach ($posts_law as $post) {
                                  ?>
                                    <div class="tn-news">
                                        <div class="tn-img">
                                          <img class="post" style="width:150px;height:96px"  src="<?php echo get_the_post_thumbnail_url(); ?>"/>
                                            <!-- <img src="img/news-350x223-4.jpg" /> -->
                                        </div>
                                        <div class="tn-title">
                                              <a href="<?php  the_permalink() ?>"><?php echo $post->post_title ; ?></a>
                                        </div>
                                    </div>
                                  <?php }?>

                                </div>
                                <div id="m-recent" class="container tab-pane fade">
                                  <?php foreach ($posts_sports as $post) {
                                  ?>
                                    <?php  echo getCrunchifyPostViews(get_the_ID()); ?>
                                    <div class="tn-news">

                                        <div class="tn-img">
                                          <img class="post" style="width:150px;height:96px"  src="<?php echo get_the_post_thumbnail_url(); ?>"/>
                                            <!-- <img src="img/news-350x223-4.jpg" /> -->
                                        </div>

                                        <div class="tn-title">
                                              <a href="<?php  the_permalink() ?>"><?php echo $post->post_title ; ?></a>
                                        </div>
                                    </div>
                                  <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tab News Start-->

            <!-- Main News Start-->
            <div class="main-news">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row">

                                <?php foreach ($posts_economic as $post) {
                                ?>
                                <div class="col-md-4">
                                    <div class="mn-img">
                                        <img class="post" style="width:255px;height:162px"  src="<?php echo get_the_post_thumbnail_url(); ?>"/>
                                          <!-- <img src="img/news-350x223-4.jpg" /> -->
                                      <div class="mn-title">
                                            <a href="<?php  the_permalink() ?>"><?php echo $post->post_title ; ?></a>
                                      </div>
                                      </div>
                                  </div>
                                <?php }?>


                                <?php foreach ($posts_slider as $post) {
                                ?>
                                <div class="col-md-4">
                                    <div class="mn-img">
                                        <img class="post" style="width:255px;height:162px"  src="<?php echo get_the_post_thumbnail_url(); ?>"/>
                                          <!-- <img src="img/news-350x223-4.jpg" /> -->
                                      <div class="mn-title">
                                            <a href="<?php  the_permalink() ?>"><?php echo $post->post_title ; ?></a>
                                      </div>
                                      </div>
                                  </div>
                                <?php }?>
                                <?php foreach ($posts_education as $post) {
                                ?>
                                <div class="col-md-4">
                                    <div class="mn-img">
                                        <img class="post" style="width:255px;height:162px"  src="<?php echo get_the_post_thumbnail_url(); ?>"/>
                                          <!-- <img src="img/news-350x223-4.jpg" /> -->
                                      <div class="mn-title">
                                            <a href="<?php  the_permalink() ?>"><?php echo $post->post_title ; ?></a>
                                      </div>
                                      </div>
                                  </div>
                                <?php }?>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="mn-list">
                                <h2>Read More</h2>
                                <ul>
                                  <?php foreach ($posts_education as $post) {
                                   ?>
                                    <li><a href="<?php  the_permalink() ?>"><?php echo $post->post_title ; ?></a></li>

                                  <?php } ?>
                                  <?php foreach ($posts_category as $post) {
                                   ?>
                                    <li><a href="<?php  the_permalink() ?>"><?php echo $post->post_title ; ?></a></li>

                                  <?php } ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main News End-->

            <!-- Footer Start -->

          <?php get_footer(); ?>
        </body>
    </html>
