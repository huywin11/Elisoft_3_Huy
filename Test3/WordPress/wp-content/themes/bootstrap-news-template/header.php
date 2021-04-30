
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>Bootstrap News Template - Free HTML Templates</title>
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <meta content="Bootstrap News Template - Free HTML Templates" name="keywords">
            <!-- <base href="wp-content\themes\bootstrap-news-template\img"> -->
            <base href="<?php echo get_template_directory_uri(); ?>/" >
            <meta content="Bootstrap News Template - Free HTML Templates" name="description">

            <!-- Favicon -->
            <link href="img/favicon.ico" rel="icon">

            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">

            <!-- CSS Libraries -->
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
            <!-- <link href="lib/slick/slick.css" rel="stylesheet">
            <link href="lib/slick/slick-theme.css" rel="stylesheet"> -->

            <!-- Template Stylesheet -->
            <link href="css/style.css" rel="stylesheet">
          <?php wp_head(); ?>
        </head>

        <body <?php  body_class(); ?>>
            <!-- Top Bar Start -->
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="tb-contact">
                                <p><i class="fas fa-envelope"></i><?php echo get_option( 'new_admin_email' ); ?></p>

                                <p><i class="fas fa-phone-alt"></i><?php echo get_option( 'admin_phone' ); ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tb-menu">
                                <a href="">About</a>
                                <a href="">Privacy</a>
                                <a href="">Terms</a>
                                <a href="">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Top Bar Start -->

            <!-- Brand Start -->
            <div class="brand">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4">
                            <div class="b-logo">
                                <a href="http://localhost/WordPress/">
                                  <?php $base = plugin_dir_url( __FILE__ ) ; ?>
                                    <img src="<?php  $base; ?>img/<?php echo get_option( 'logo' ); ?>" alt="logo" width="198px" height="60px">
                                    <!-- <img src="img/logo.png" alt="Logo"> -->
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4">
                            <div class="b-ads">
                                <a href="http://localhost/WordPress/">

                                    <?php $base = plugin_dir_url( __FILE__ ) ; ?>

                                    <img src=" <?php $base?>img/<?php echo get_option( 'advertisement' ); ?>" alt="advertisement" width="540px" height="90px">
                                    <!-- <img src="img/ads-1.jpg" alt="Ads"> -->
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">

                          <div class="b-search">
                          <?php get_search_form(); ?>

                          </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- Brand End -->

            <!-- Nav Bar Start -->
            <div class="nav-bar">
                <div class="container">
                    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                        <a href="#" class="navbar-brand">MENU</a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                          <?php  echo display_menu();


                                ?>
                            </div>
                            </div>
                            <div class="social ml-auto">
                              <?php   $location = get_nav_menu_locations();

                                  $social_menu =get_term($location['secondary']);
                                  // dd($primary_menu);
                                 $social_menu_items = wp_get_nav_menu_items($social_menu->term_id);
                                   foreach ($social_menu_items as $social) {?>
                                     <a href="<?php echo $social->guid; ?>"><i class="fab fa-<?php echo $social->post_name; ?>"></i></a>

                                <?php   } ?>

                            </div>
                        </div>

                    </nav>
                </div>
            </div>
