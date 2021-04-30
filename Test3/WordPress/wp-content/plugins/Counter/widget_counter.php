<?php
/**
 * Plugin Name:       Counter Plugin widget
 * Description:       Counter widget Visiter
 * Author:            Lê Cao Huy
 */




 // Call JS file
function my_custom_script_load(){
wp_enqueue_script( 'my-custom-script', plugin_dir_url(__FILE__) . 'js/custom.js', array( 'jquery' ),'1', false );
wp_enqueue_style( 'wps-visitor-style', plugin_dir_url(__FILE__).'css/default.css', array(),'2' );
}

add_action( 'widgets_init', 'my_custom_script_load' );
// add_action( 'wp_enqueue_scripts', 'my_custom_script_load' ,1);



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

        //get data by day, week, month, year
        global $table_prefix, $wpdb;
        $count_by_day = $wpdb->get_var($wpdb->prepare("SELECT SUM(count) FROM wp_counter WHERE  DATE(date) = CURDATE();"));
        $count_by_week = $wpdb->get_var($wpdb->prepare("SELECT SUM(count) FROM wp_counter WHERE YEARWEEK(date) = YEARWEEK(NOW());"));
        $count_by_month = $wpdb->get_var($wpdb->prepare("SELECT SUM(count) FROM wp_counter WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE());"));
        $count_by_year = $wpdb->get_var($wpdb->prepare("SELECT SUM(count) FROM wp_counter WHERE YEAR(date) = YEAR(CURRENT_DATE());"));
        $count_total = $wpdb->get_var($wpdb->prepare("SELECT SUM(count) FROM wp_counter;"));

        //count length and format
        $number_zero_day = $instance['number'] - strlen($count_by_day);
        $number_zero_week = $instance['number'] - strlen($count_by_week);
        $number_zero_month = $instance['number'] - strlen($count_by_month);
        $number_zero_year = $instance['number'] - strlen($count_by_year);
        $number_zero_total = $instance['number'] - strlen($count_total);
        if(strlen($count_by_day) < $instance['number']){
            for($i = 0; $i < $number_zero_day;$i++){
                $count_by_day = '0'.$count_by_day;
            }
        }
        if(strlen($count_by_week) < $instance['number']){
            for($i = 0; $i < $number_zero_week;$i++){
                $count_by_week = '0'.$count_by_week;
            }
        }
        if(strlen($count_by_month) < $instance['number']){
            for($i = 0; $i < $number_zero_month;$i++){
                $count_by_month = '0'.$count_by_month;
            }
        }
        if(strlen($count_by_year) < $instance['number']){
            for($i = 0; $i < $number_zero_year;$i++){
                $count_by_year = '0'.$count_by_year;
            }
        }
        if(strlen($count_total) < $instance['number']){
            for($i = 0; $i < $number_zero_total;$i++){
                $count_total = '0'.$count_total;
            }
        }

        // $this->count();
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
          echo '<div class="textwidget" style="color:white">';

        if($instance['view_with_image'] == 0):

            echo '<table class ="counter_view">';
            if($instance['today'] == 1) echo '<tr class = "one-by-count"><th class = "title-counter-visiter">Hôm nay: </th><td class="counter-visiter-data">'.$count_by_week.'</td></tr>';
            if($instance['by_week'] == 1) echo '<tr class = "one-by-count"><th class = "title-counter-visiter">Tuần này: </th><td class = "counter-visiter-data">'.$count_by_week.'</td></tr>';
            if($instance['by_month'] == 1) echo '<tr class = "one-by-count"><th class = "title-counter-visiter">Tháng này: </th><td class="counter-visiter-data">'.$count_by_month.'</td></tr>';
            if($instance['by_year'] == 1) echo '<tr class = "one-by-count"><th class = "title-counter-visiter">Năm nay: </th><td class = "counter-visiter-data">'.$count_by_year.'</td></tr>';
            echo '<tr class = "one-by-count"><th class = "title-counter-visiter">Từ trước đến nay : </th><td class = "counter-visiter-data">'.$count_total.'</td></tr>';
            echo '</table>';
        else:
            echo "<span class='title-count-by'>Hôm nay: </span>";
            if($instance['today'] == 1) echo '<div> '.$this->display_by_image($count_by_week).'</div><br>';
            echo "<span class='title-count-by'>Tuần này: </span>";
            if($instance['by_week'] == 1) echo '<div>'.$this->display_by_image($count_by_week).'</div><br>';
            echo "<span class='title-count-by'>Tháng này: </span>";
            if($instance['by_week'] == 1) echo '<div>'.$this->display_by_image($count_by_month).'</div><br>';
            echo "<span class='title-count-by'>Năm nay: </span>";
            if($instance['by_week'] == 1) echo '<div>'.$this->display_by_image($count_by_year).'</div><br>';
            echo "<span class='title-count-by'>Từ trước đến nay: </span>";
            if($instance['by_week'] == 1) echo '<div>'.$this->display_by_image($count_total).'</div><br>';
        endif;
        echo '</div>';

        echo $args['after_widget'];
      }

    public function form( $instance ) {

        // $title = $instance['title'];
        // $number = $instance['number'];
        // $today = $instance['today'];
        // $by_week = $instance['by_week'];
        // $by_month = $instance['by_month'];
        // $by_year = $instance['by_year'];
        // $view_with_image = $instance['view_with_image'];

        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
        $number = ! empty( $instance['number'] ) ? $instance['number'] : esc_html__( '', 'text_domain' );
        $today = ! empty( $instance['today'] ) ? $instance['today'] : esc_html__( '', 'text_domain' );
        $today       = isset( $instance['today'] ) ? (bool) $instance['today'] : false;
        $by_week       = isset( $instance['by_week'] ) ? (bool) $instance['by_week'] : false;
        $by_month      = isset( $instance['by_month'] ) ? (bool) $instance['by_month'] : false;
        $by_year     = isset( $instance['by_year'] ) ? (bool) $instance['by_year'] : false;
        $view_with_image     = isset( $instance['view_with_image'] ) ? (bool) $instance['view_with_image'] : false;
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php echo esc_html__( 'Minimum length:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" min='5' max='10' type="number" value="<?php echo esc_attr( $number ); ?>">
        </p>
        <p>
            <input <?php echo $today == 1 ? 'checked' :  ''; ?> class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'today' ) ); ?>" type="checkbox" value="1<?php //echo esc_attr( $today ); ?>">
            <label for="<?php echo esc_attr( $this->get_field_id( 'checkbox' ) ); ?>"><?php echo esc_html__( 'By Today', 'text_domain' ); ?></label>
        </p>
        <p>
            <input <?php echo $by_week == 1 ? 'checked' :  ''; ?> class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'by_week' ) ); ?>" type="checkbox" value="1<?php //echo esc_attr( $by_week ); ?>" >
            <label for="<?php echo esc_attr( $this->get_field_id( 'checkbox' ) ); ?>"><?php echo esc_html__( 'By This Week', 'text_domain' ); ?></label>
        </p>
        <p>
            <input <?php echo $by_month == 1 ? 'checked' :  ''; ?> class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'by_month' ) ); ?>" type="checkbox" value="1<?php //echo esc_attr( $by_month ); ?>" >
            <label for="<?php echo esc_attr( $this->get_field_id( 'checkbox' ) ); ?>"><?php echo esc_html__( 'By This Month', 'text_domain' ); ?></label>
        </p>
        <p>
            <input <?php echo $by_year == 1 ? 'checked' :  ''; ?> class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'by_year' ) ); ?>" type="checkbox" value="1<?php //echo esc_attr( $by_year ); ?>" >
            <label for="<?php echo esc_attr( $this->get_field_id( 'checkbox' ) ); ?>"><?php echo esc_html__( 'By This Year', 'text_domain' ); ?></label>
        </p>
        <p>
            <input <?php echo $view_with_image == 1 ? 'checked' :  ''; ?> class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'view_with_image' ) ); ?>" type="checkbox" value="1<?php //echo esc_attr( $view_with_image ); ?>" >
            <label for="<?php echo esc_attr( $this->get_field_id( 'checkbox' ) ); ?>"><?php echo esc_html__( 'View with image', 'text_domain' ); ?></label>
        </p>
        <?php

    }

    public function update( $new_instance, $old_instance ) {

        // $instance = array();
        parent::update( $new_instance, $old_instance );

        $instance = $old_instance;

        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['number'] = ( !empty( $new_instance['number'] ) ) ? $new_instance['number'] : 0;
        $instance['today'] = ( !empty( $new_instance['today'] ) ) ? $new_instance['today'] : 0;
        $instance['by_week'] = ( !empty( $new_instance['by_week'] ) ) ? $new_instance['by_week'] : 0;
        $instance['by_month'] = ( !empty( $new_instance['by_month'] ) ) ? $new_instance['by_month'] : 0;
        $instance['by_year'] = ( !empty( $new_instance['by_year'] ) ) ? $new_instance['by_year'] : 0;
        $instance['view_with_image'] = ( !empty( $new_instance['view_with_image'] ) ) ? $new_instance['view_with_image'] : 0;

        return $instance;
    }

    public function count(){
        $ip = $_SERVER['REMOTE_ADDR'];
        if(!isset($_SESSION['visiter'])){
            $_SESSION['visiter'][] = $ip;

            // WP Globals
            global $table_prefix, $wpdb;


            // Customer Table
            $customerTable = $table_prefix . 'counter';

            $today = date("Y-m-d");
            $count = $wpdb->get_var($wpdb->prepare("SELECT count FROM $customerTable WHERE ip = '$ip' AND date = '$today';"));

            if($count == 0){
                $sql = "REPLACE INTO $customerTable (ip,`count`, date) VALUES ('$ip', 1,'$today');";
            }
            else{
               $count = $count + 1;
               $sql = "REPLACE INTO $customerTable (ip,`count`, date) VALUES ('$ip', '$count','$today');";
            }

            $wpdb->query($sql);
        }
    }

    public function display_by_image($num){
        $result = str_split($num);
        $base = plugin_dir_url( __FILE__ ) ;
        echo "<div class='img-number'>";
            foreach($result as $re):
                echo "<img src='$base/img/$re.png' alt='Number $re' width='20' height='30'>";
                // echo "<img src='img/logo.png' alt='Number $re' width='20' height='30'>";
            endforeach;
        echo "</div>";
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
