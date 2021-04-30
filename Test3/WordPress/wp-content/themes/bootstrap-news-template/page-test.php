<?php
// echo "action";
// echo "</br>";
// do_action('my_action',$post->ID,$post->title);
// //Tao a filter
// echo 'filter';
// echo "<hr>";
// do_action('home',$post->ID);
// $test = "in đậm";
// echo "</br>";
// $test2 = "in màu";
// echo apply_filters('home',$test);// home truyền vào để bên functions gọi ra
// // echo "</br>";
// // echo "<hr>";
// // echo apply_filters('my_filter',$test2);
//
//
// function create_plugin_database_table()
// {
//   global $wpdb;
//   // dd($wpdb);
//             $wp_track_table = $wpdb->prefix.'prefix';
//     #Check to see if the table exists already, if not, then create it
//
//     if($wpdb->get_var( "show tables like '$wp_track_table'" ) != $wp_track_table)
//     {
//       $charset_collate = $wpdb->get_charset_collate();
//                 $sql = "CREATE TABLE $wp_track_table (
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
// create_plugin_database_table();
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
//   $table = $wpdb->prefix . 'hai';
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
//      $table_name = $wpdb->prefix . 'hai';
//      $sql = "DROP TABLE IF EXISTS $table_name";
//      $wpdb->query($sql);
//      //delete_option("jal_db_version");
// }
//
// }
// $hidemysite_security = new hidemysite_security;
// echo $hidemysite_security->activate();
// echo $hidemysite_security->my_plugin_remove_database();
//   ?>
