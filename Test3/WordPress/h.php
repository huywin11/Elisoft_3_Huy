<?php
/**
 * Plugin Name:       Counter Plugin
 * Description:       Counter Users
 * Author:            HuyWin

 */



class Counter extends WP_Widget {
    function __construct() {

        parent::__construct(
            'counter_visiter',  // Base ID
            'Counter Visiter' ,  // Name
            array( 'description' => __( 'Show count visiter in your site', 'text_domain' ), ) // Args
        );

        add_action( 'widgets_init', function() {
            register_widget( 'My_Widget' );
        });

    }

    public $args = array(
        'before_title'  => '<h3 class="title">',
        'after_title'   => '</h3>',
        'before_widget' => '<div style="color:white" class="col-lg-9 col-md-6"><div class="footer-widget">',
        'after_widget'  => '</div></div>'
    );

    public function widget( $args, $instance ) {
        $this->count();
        global $count;
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        echo '<div class="textwidget" style="color:white">';
        echo '<table class ="counter_view">';
        echo ' <tr>
                <th>Length</th>';
        echo '<td>'.esc_html__( $instance['length'], 'text_domain' ).'</td><tr>';
        echo ' <tr>
                <th>Hôm nay</th>';
        echo '<td>'.esc_html__( $instance['today'], 'text_domain' ).'</td><tr>';
        echo ' <tr>
                <th>Tuần này</th>';
        echo '<td>'.esc_html__( $instance['week'], 'text_domain' ).'</td><tr>';
        echo ' <tr>
                <th>Tháng này</th>';
        echo '<td>'.esc_html__( $instance['month'], 'text_domain' ).'</td><tr>';
        echo ' <tr>
                <th>Năm này</th>';
        echo '<td>'.esc_html__( $instance['year'], 'text_domain' ).'</td><tr>';
        echo ' <tr>
                <th>image</th>';
        echo '<td>'.esc_html__( $instance['images'], 'text_domain' ).'</td><tr>';
        echo ' <tr>
                <th>Tổng</th>';
        echo '<td>'. $count.'</td><tr>';


        echo '</table>';
          echo '</div>';
        echo $args['after_widget'];

    }

    public function form( $instance ) {

      $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
      // kiểm tra có dữ liệu điền vào ở ô title, nếu có thì hiện ở ô đó, còn hk thì để trống, có dữ liệu thì gán vào biến title
      // $text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'text_domain' );
      // kiểm tra có dữ liệu điền vào ở ô text, nếu có thì hiện ở ô đó, còn hk thì để trống, có dữ liệu thì gán vào biến text
      $length = ! empty( $instance['length'] ) ? $instance['length'] : esc_html__( '', 'text_domain' );
      $today = ! empty( $instance['today'] ) ? $instance['today'] : esc_html__( '', 'text_domain' );
      // kiểm tra có dữ liệu điền vào ở ô text, nếu có thì hiện ở ô đó, còn hk thì để trống, có dữ liệu thì gán vào biến text


      $today       = isset( $instance['today'] ) ? (bool) $instance['today'] : false;
      $week       = isset( $instance['week'] ) ? (bool) $instance['week'] : false;
      $month      = isset( $instance['month'] ) ? (bool) $instance['month'] : false;
      $year     = isset( $instance['year'] ) ? (bool) $instance['year'] : false;
      $images     = isset( $instance['images'] ) ? (bool) $instance['images'] : false;
      // $count        = isset( $instance['count'] ) ? (bool) $instance['count'] : false;
      // $hierarchical = isset( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : false;
      // $dropdown     = isset( $instance['dropdown'] ) ? (bool) $instance['dropdown'] : false;
      ?>
      <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'text_domain' ); ?></label>
      <!-- cái this->get_field_id là để truyền cái giá trị "widget-my-text-2-title" vào for với name, còn esc_html__( 'Title:', 'text_domain' ) là truyền text Title trên form -->
      <!-- esc_attr là hàm loại bỏ các kí tự đặt biệt có trong chuỗi -->
          <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
      </p>
      <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'length' ) ); ?>"><?php echo esc_html__( 'Minimum length:', 'text_domain' ); ?></label>
      <!-- cái this->get_field_id là để truyền cái giá trị "widget-my-text-2-title" vào for với name, còn esc_html__( 'Title:', 'text_domain' ) là truyền text Title trên form -->
      <!-- esc_attr là hàm loại bỏ các kí tự đặt biệt có trong chuỗi -->
          <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'length' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'length' ) ); ?>" type="number" value="<?php echo esc_attr( $length ); ?>">
      </p>
      <!-- <p>
        <input type="checkbox" id="today" name="today" value="<?php echo  $today ?>">
        <label for="today"> By Today</label><br>
        <input type="checkbox" id="week" name="week" value="week">
        <label for="week"> By This Week</label><br>
        <input type="checkbox" id="Month" name="Month" value="Month">
        <label for="Month"> By This Month</label><br>
        <input type="checkbox" id="Year" name="Year" value="Year">
        <label for="Year"> By This Year</label><br>
        <input type="checkbox" id="images" name="images" value="images">
        <label for="images"> View with images</label><br><br>
      </p> -->
      <p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'today' ); ?>" name="<?php echo $this->get_field_name( 'today' ); ?>"<?php checked( $today ); ?> />
        <label for="<?php echo $this->get_field_id( 'today' ); ?>"><?php _e( 'By Today' ); ?></label>
        <br />

        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'week' ); ?>" name="<?php echo $this->get_field_name( 'week' ); ?>"<?php checked( $week ); ?> />
        <label for="<?php echo $this->get_field_id( 'week' ); ?>"><?php _e( 'By Week' ); ?></label>
        <br />

        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'month' ); ?>" name="<?php echo $this->get_field_name( 'month' ); ?>"<?php checked( $month ); ?> />
        <label for="<?php echo $this->get_field_id( 'month' ); ?>"><?php _e( 'By Month' ); ?></label>
        <br />

        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'year' ); ?>" name="<?php echo $this->get_field_name( 'year' ); ?>"<?php checked( $year ); ?> />
        <label for="<?php echo $this->get_field_id( 'year' ); ?>"><?php _e( 'By Year' ); ?></label>
        <br />

        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'images' ); ?>" name="<?php echo $this->get_field_name( 'images' ); ?>"<?php checked( $images ); ?> />
        <label for="<?php echo $this->get_field_id( 'images' ); ?>"><?php _e( 'By Images' ); ?></label>
        <br />


      </p>
        <?php

    }

    public function update( $new_instance, $old_instance ) {

      $instance = array();
      $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
      // hàm strip_tags là loại bỏ all các thẻ html và php ra khỏi chuỗi
      // $instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';
      $instance['length'] = ( !empty( $new_instance['length'] ) ) ? $new_instance['length'] : '';
      $instance['today'] = ( !empty( $new_instance['today'] ) ) ? $new_instance['today'] : '';




      $instance['today']        = ! empty( $new_instance['today'] ) ? 1 : 0;
      $instance['week'] = ! empty( $new_instance['week'] ) ? 1 : 0;
      $instance['month']        = ! empty( $new_instance['month'] ) ? 1 : 0;
      $instance['year'] = ! empty( $new_instance['year'] ) ? 1 : 0;
      $instance['images'] = ! empty( $new_instance['images'] ) ? 1 : 0;
      // $instance['count']        = ! empty( $new_instance['count'] ) ? 1 : 0;
      // $instance['hierarchical'] = ! empty( $new_instance['hierarchical'] ) ? 1 : 0;
      // $instance['dropdown']     = ! empty( $new_instance['dropdown'] ) ? 1 : 0;

        return $instance;
    }

    public function count(){
        $ip = $_SERVER['REMOTE_ADDR'];
        // dd($ip);
        // //session_start();
        if(!isset($_SESSION['visiter'])){
            $_SESSION['visiter'][] = $ip;

            // WP Globals
            global $table_prefix, $wpdb;
//ddaay
            // active lại cho n sinh ra db mưới đi
            // Customer Table
            $customerTable = $table_prefix . 'counter';

            $today = date("Y-m-d");
            $count = $wpdb->get_var($wpdb->prepare("SELECT count FROM $customerTable WHERE ip = '$ip' AND date = '$today';"));
            //$count = $count[0]->count;
            // echo "abc";
            // dd($count);
            if($count == 0){
                $sql = "REPLACE INTO $customerTable (ip,`count`, date) VALUES ('$ip', 1,'$today');";
            }
            else{
               $count = $count + 1;
               $sql = "REPLACE INTO $customerTable (ip,`count`, date) VALUES ('$ip', '$count','$today');";
            }

               $wpdb->query($sql);

            // echo $count;
        }
    }
}

add_action( 'widgets_init', 'wpdocs_register_widgets' );


function wpdocs_register_widgets() {
    register_widget('Counter');
}


/*
*
*   Click Active Plugin Button
*   Call function init database
*/

if ( !defined( 'ABSPATH' ) ) exit;

function activate_myplugin() {

	// Execute tasks on Plugin activation

	// Insert DB Tables
	init_db_myplugin();
}


function init_db_myplugin() {

	// WP Globals
	global $table_prefix, $wpdb;

	// Customer Table
	$customerTable = $table_prefix . 'counter';

	// Create Customer Table if not exist
	if( $wpdb->get_var( "show tables like '$customerTable'" ) != $customerTable ) {

		// Query - Create Table
        $sql = "CREATE TABLE $customerTable (";
        $sql .= " count int NOT NULL,";
        $sql .= " ip text NOT NULL,";
        $sql .= " date DATE  NOT NULL DEFAULT CURRENT_TIMESTAMP,";
        $sql .= " CONSTRAINT uinque_wp_counter UNIQUE (ip,date));";

//vào admin á
// khoan
// vào plugin nén cái này lại

		// Include Upgrade Script
		require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

		// Create Table
		dbDelta( $sql );
	}

}

// End Active Plugin



/*
*
*   Click Deactive Plugin Button
*/
function deactivate_myplugin() {

    // WP Globals
	global $table_prefix, $wpdb;
	// Customer Table
    $customerTable = $table_prefix . 'counter';

    $sql = "DROP TABLE IF EXISTS $customerTable";
    $wpdb->query($sql);
    delete_option("my_plugin_db_version");

}



// Act on plugin activation
register_activation_hook(__FILE__, "activate_myplugin" );

// Act on plugin de-activation
register_deactivation_hook(__FILE__, "deactivate_myplugin" );
// $couter = new Counter ;
// echo $couter->count();
// Call JS file
add_action( 'widgets_init', 'my_custom_script_load' );
function my_custom_script_load(){
  wp_enqueue_script( 'my-custom-script', plugin_dir_url(__FILE__) . '/custom.js', array( 'jquery' ) );
}
