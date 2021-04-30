<?php
/**
 * MyFirstTheme's functions and definitions
 *
 * @package MyFirstTheme
 * @since MyFirstTheme 1.0
 */

/**
 * First, let's set the maximum content width based on the theme's design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if ( ! isset( $content_width ) )
    $content_width = 800; /* pixels */

if ( ! function_exists( 'myfirsttheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function myfirsttheme_setup() {

    /**
     * Make theme available for translation.
     * Translations can be placed in the /languages/ directory.
     */
    load_theme_textdomain( 'myfirsttheme', get_template_directory() . '/languages' );

    /**
     * Add default posts and comments RSS feed links to <head>.
     */
    add_theme_support( 'automatic-feed-links' );

    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support( 'post-thumbnails' );

    /**
     * Add support for two custom navigation menus.
     */
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'myfirsttheme' ),
        'secondary' => __('Secondary Menu', 'myfirsttheme' ),
        'thirtary' => __('Thirtary Menu', 'myfirsttheme' ),
        'footer' => __('Footer Menu', 'myfirsttheme' ),
        'footer2' => __('Footer2 Menu', 'myfirsttheme' ),
        'navigator' => __('Navigator Menu', 'myfirsttheme' )
    ) );

    /**
     * Enable support for the following post formats:
     * aside, gallery, quote, image, and video
     */
    add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
}
endif; // myfirsttheme_setup
add_action( 'after_setup_theme', 'myfirsttheme_setup' );
require get_template_directory().'/inc/menu_functions.php';
function dd($var)
{
  echo "<pre>";
  var_dump($var);
  echo "</pre>";
  die();
}
//hàm tạo themes
function bootstrap_news_template_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'bootstrapnewstemplate' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'bootstrapnewstemplate' ),
			'before_widget' => '<div class="col-lg-3 col-md-6">
                          <div class="footer-widget">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>',
		));
register_sidebar(
    array(
      'name'          => esc_html__( 'End', 'bootstrapnewstemplate' ),
      'id'            => 'sidebar-2',
      'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'bootstrapnewstemplate' ),
      'before_widget' => '<div class="col-lg-6 col-md-6">
                          <div class="footer-widget">',
      'after_widget'  => '</div></div>',
      'before_title'  => '<h3 class="title">',
      'after_title'   => '</h3>',
    ));
register_sidebar(
    array(
      'name'          => esc_html__( 'Navigator', 'bootstrapnewstemplate' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'bootstrapnewstemplate' ),
			'before_widget' => '<div class="col-lg-4 col-md-4">
                          <div class="footer-widget">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>',
    )
	);
}
add_action( 'widgets_init', 'bootstrap_news_template_widgets_init' );














//
function create_posttype() {

    register_post_type( 'movies',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Movies' ),
                'singular_name' => __( 'Movie' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'movies'),
            'show_in_rest' => true,

        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
/*
* Creating a function to create our CPT
*/

function custom_post_type() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Movies', 'Post Type General Name', 'twentytwenty' ),
        'singular_name'       => _x( 'Movie', 'Post Type Singular Name', 'twentytwenty' ),
        'menu_name'           => __( 'Movies', 'twentytwenty' ),
        'parent_item_colon'   => __( 'Parent Movie', 'twentytwenty' ),
        'all_items'           => __( 'All Movies', 'twentytwenty' ),
        'view_item'           => __( 'View Movie', 'twentytwenty' ),
        'add_new_item'        => __( 'Add New Movie', 'twentytwenty' ),
        'add_new'             => __( 'Add New', 'twentytwenty' ),
        'edit_item'           => __( 'Edit Movie', 'twentytwenty' ),
        'update_item'         => __( 'Update Movie', 'twentytwenty' ),
        'search_items'        => __( 'Search Movie', 'twentytwenty' ),
        'not_found'           => __( 'Not Found', 'twentytwenty' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwenty' ),
    );

// Set other options for Custom Post Type

    $args = array(
        'label'               => __( 'movies', 'twentytwenty' ),
        'description'         => __( 'Movie news and reviews', 'twentytwenty' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,

    );

    // Registering your Custom Post Type
    register_post_type( 'movies', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'custom_post_type', 0 );
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'movies' ) );
    return $query;
}




// hàm lấy view
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count;
}
//hàm thiết lập views
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
function registers(){
  session_start();
}
add_action('init','registers');





// function huy_theme_setup()
// {
//  echo "hello, huy";
//
// }
// add_action('huy_before_content','huy_theme_setup');// này là hook tên là init, và callback là huy_theme_setup
// // add_action($hook,$callback,$spiority,$args);// hàm có 4 tham số, tham số thứ nhất là tham số bắt buộc là tên hook mà ta cần móc vào
// // tham số thứ 2 là hàm callback mà chúng ta muốn xây dựng cho các hook này
// // tham số thứ 3 là mức độ ưu tiên , tham số không bắt buộc, sử dụng nhiều hàm, muốn cái nào sử dụng trước thì phải sử dụng tham số này, số càng nhỏ thì thực thi càng sớm
// // cuối cùng là những đối số mà ta cần đưa nó vào

function   hook_get_posts($query)// sử dụng biến nào thì truyền tham số vào
{  // muốn trang chủ hiển thị ngẩu nghiên, các trang khác hiển thị bình thường thì kiểm tra điều kiện như sau
  // is_home là hiểm tra query này đã có ở trang chủ, và query là mặc định của WordPress chứ hk phải query tự tạo
  //thì mình sẻ sửa lại tham số của truy vấn bằng "set", "orderby" là sắp xếp theo "rand" là random
  if($query->is_home() && $query->is_main_query())
  $query->set('orderby','rand');
}
add_action('pre_get_posts','hook_get_posts');

// css , javascript
function add_theme_scripts() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );

  wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/style.css', array(), '1.2', 'all');
  wp_register_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), null, false );
  wp_register_style( 'bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css', array(), null, false );
  wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/lib/slick/slick-theme.css', array(), '1.2', 'all');
  wp_enqueue_style( 'slick',get_template_directory_uri().'/lib/slick/slick.css', array(), '1.2', 'all');

  // wp_register_style( 'bootstrap', plugins_url( '/css/bootstrap.min.css', __FILE__ ), array(), '4.4.1', 'all' );

  wp_enqueue_script( 'bootstrap',  'https://code.jquery.com/jquery-3.4.1.min.js', array ( 'jquery' ));
  wp_enqueue_script( 'bootstrap',  'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js');
  wp_enqueue_script( 'easing', get_template_directory_uri() . '/lib/easing/easing.min.js', array ( '' ), 1.1, true);
  wp_enqueue_script( 'slick', get_template_directory_uri() . '/lib/slick/slick.min.js', array ( '' ), 1.1, true);
  wp_enqueue_script( 'script', get_template_directory_uri() . '/js/main.js', array ( 'slick' ), 1.1, true);



    if ( is_singular()&& comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
// bumble, easing, slick,main



//gmp_testbit
// function test($hello,$h)
// {
//   echo "Chao tat ca cac ban".$hello;
//   echo "</br>".$h;
// }
// function test1($name)
// {
//   echo "</br>Callback2".$name;
//   echo "</br>";
// }
// add_action('my_action','test',12,2);// so 2 la vi truyen 2 tham so nen phai de so 2, 1 la hk can gi
// add_action('my_action','test1',13,2);
// add_action('home','test1',11);
function filter($name)
{
  // return "Hello";
  return '<b>'.$name.'</b>';
}
function filter1($name)
{
  // return "Hello";
  return '<i>'.$name.'</i>';
}
add_filter('home','filter',11);
add_filter('home','filter1',10);
// add_filter('home','filter',12);


// Xử lí setting General
function link_settings_api_init() {
    // Add the section to general settings so we can add our
    // fields to it
    add_settings_section(
       'links_setting_section',
       'Social Links',
       'links_setting_section_callback_function',
       'general'
   );

    // Add the field with the names and function to use for our new
    // settings, put it in our new section
    add_settings_field(
       'admin_phone',
       'Phone Link',
       'phone_function',
       'general',
       'links_setting_section'
   );

   add_settings_field(
        'new_admin_email',
        'Email Link',
        'email_function',
        'general',
        'links_setting_section'
    );

    register_setting( 'general', 'admin_phone' );
    register_setting( 'general', 'new_admin_email' );

    add_settings_section("section", "Section", null, "general");
    add_settings_field("logo", "Logo", "upload_file_display", "general",'default',array( 'name' => 'logo' ));
    register_setting("general", "logo", "handle_file_upload_logo");

    add_settings_section("section", "Section", null, "general");
    add_settings_field("advertisement", "Advertisement", "upload_file_display", "general",'default',array( 'name' => 'advertisement' ));
    register_setting("general", "advertisement", "handle_file_upload_ads");

} // link_settings_api_init()

add_action( 'admin_init', 'link_settings_api_init' );

function links_setting_section_callback_function() {
    echo '<p>Add Email,Phone, image</p>';
}

function phone_function() {
$admin_phone = get_option( 'admin_phone', '' );
echo '<input id="admin_phone" style="width: 35%;" type="number" title="Phone" name="admin_phone" value="' . sanitize_text_field($admin_phone) . '" />';
}

function email_function() {
$new_admin_email = get_option( 'new_admin_email', '' );
echo '<input id="new_admin_email" style="width: 35%;" type="email" title="Email Link" name="new_admin_email" value="' . sanitize_text_field($new_admin_email) . '" />';
}

function upload_file_display($args)
{


    if($args['name'] == 'logo'){
        $val = '';
        $val = get_option('logo'); ?>
        <input type="file" name="logo" value='<?=$val;?>' />
        <?php   echo get_option('logo');
    }
    if($args['name'] == 'advertisement'){
        $val = '';
        $val = get_option('advertisement'); ?>
        <input type="file" name="advertisement" value='<?=$val;?>' />
        <?php   echo get_option('advertisement');
    }


}


function handle_file_upload($option)
{
  if(!empty($_FILES["logo"]["tmp_name"]))
  {
    $urls = wp_handle_upload($_FILES["logo"], array('test_form' => FALSE));
    $temp = $urls["url"];
    return $temp;
  }

  return $option;
}

function demo_file_display()
{
   ?>
        <input type="file" name="logo" />
        <?php echo get_option('logo'); ?>
   <?php
}
function handle_file_upload_logo($option)
{

  if(!empty($_FILES["logo"]["tmp_name"]))
  {

    $urls = wp_handle_upload($_FILES["logo"], array('test_form' => FALSE));
    //dd($urls);
    $temp = $urls["url"];

    return $temp;
  }

  return $option;
}

function handle_file_upload_ads($option)
{
    if(!empty($_FILES["advertisement"]["tmp_name"]))
    {
      $urls = wp_handle_upload($_FILES["advertisement"], array('test_form' => FALSE));
      $temp = $urls["url"];
        //dd($urls);
      return $temp;
    }

  return $option;
}




// phân trader_trange
if(!function_exists('glx_custom_pagination'))
{
  function glx_custom_pagination(WP_Query $wp_query = null, $echo = true)
  {
    if ($wp_query == null) {
      global $wp_query;
    }
    $pages = paginate_links(array(
        'base'    => str_replace(99999999,'%#%', esc_url(get_pagenum_link(99999999))),
        'format'  => '?paged=%#%',
        'current'  => max(1, get_query_var('paged')),
        'total'  => $wp_query->max_num_pages,
        'type'  => 'array',
        'show_all'  => false,
        'end_size'  => 2,
        'mid_size'  => 1,
        'prev_next'  => true,
        'prev_text'          => __( ' Last &raquo;' ),
        'next_text'          => __( 'Next &raquo;' ),
        'add_args'  => false,
        'add_fragment'  => ''
    ));
// dd($pages);
    if (is_array($pages)) {
        $pagination  = '<ol class="wp-paginate font-inherit">
			    <li><span class="title"><a> Pages:1 of 5 </a></span>
			    </li>
					';
        foreach ($pages as $page)
				{
	          $pagination .= '<li><span ' .(strpos($page,'current')!==false ? 'class="page current"':'').'>';
	          if (strpos($page,'current')!==false)
						 {
			            if(get_query_var('paged')>0)
			            {
			                $pagination .= get_query_var('paged');
										} else {
			                      $pagination .=1;
			                     }
			        }
							else
			            {

			                $pagination .= str_replace('class="page-numbers"','',$page);

			            }
			            $pagination .='</span></li>';
	          }

	          $pagination .= $pages[0].'</ul></div>';
	          echo $pagination;
        }
    }
  }


///created tables
// function create_plugin_database_table()
// {
//   global $wpdb;
//   dd($wpdb);
//             $wp_track_table = $wpdb->prefix.'prefix_counter';
//     #Check to see if the table exists already, if not, then create it
//
//     if($wpdb->get_var( "show tables like '$wp_track_table'" ) != $wp_track_table)
//     {
//       $charset_collate = $wpdb->get_charset_collate();
//                 $sql = "CREATE TABLE $table (
//                 id mediumint(9) NOT NULL AUTO_INCREMENT,
//                 name tinytext NOT NULL,
//                 text text NOT NULL,
//                 url varchar(55) DEFAULT '' NOT NULL,
//                 PRIMARY KEY  (id)
//                 ) $charset_collate;";
//         require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
//         dbDelta($sql);
//     }
// }
//
//  register_activation_hook( __FILE__, 'create_plugin_database_table' );


/*
 * Fired during plugin activation.
 **/
 // class hidemysite_security{
 //
 //  public function __construct() {
 //   if (is_admin()) {
 //     register_activation_hook(__FILE__, array(&$this, 'activate'));
 //       register_deactivation_hook( __FILE__, 'my_plugin_remove_database' );
 //
 //   }
 // }
 //
 // public function activate() {
 //   global $wpdb;
 //   $table = $wpdb->prefix . 'huy';
 //   if($wpdb->get_var( "show tables like '$table'" ) != $table)
 //   {
 //   //     {
 //   $charset = $wpdb->get_charset_collate();
 //     $charset_collate = $wpdb->get_charset_collate();
 //     $sql = "CREATE TABLE $table (
 //         id mediumint(9) NOT NULL AUTO_INCREMENT,
 //         name tinytext NOT NULL,
 //         text text NOT NULL,
 //         url varchar(55) DEFAULT '' NOT NULL,
 //         PRIMARY KEY  (id)
 //     ) $charset_collate;";
 //
 //     require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
 //     dbDelta( $sql );
 //   }
 // }
 //
 // public function my_plugin_remove_database() {
 //      global $wpdb;
 //      $table_name = $wpdb->prefix . 'huy';
 //      $sql = "DROP TABLE IF EXISTS $table_name";
 //      $wpdb->query($sql);
 //      //delete_option("jal_db_version");
 // }
 //
 // }
 // $hidemysite_security = new hidemysite_security;
 // echo $hidemysite_security->activate();
 // echo $hidemysite_security->my_plugin_remove_database();
   ?>
