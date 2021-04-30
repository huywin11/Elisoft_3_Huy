<?php

/**
 * Plugin Name: YOUR WELLCOME NEW PLUGIN
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.8.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Huy
 * Author URI:        https://author.example.com/
 */
// add bar after  the opening body
add_action('wp_body_open','tb_head');
// function get_user_or_websitename()
// {
//     if(!is_user_logger_in())
//     {
//       return "to".get_bloginto('name');
//     }
//     else {
//       $current = wp_get_current_user();
//       return $current ->user_login;
//     }
// }
function tb_head()
{
  echo '<h3 class="hadada"> Wellcome to</h3>';
}
//add css to the top Bar
// add_action('wp_print_styles','tb_css');
// function tb_css()
// {
//   echo '<style>
//   h3.tb{color:#fff;margin:0;padding:30px;text-align:center;background:orange;}
//        </style>
//        ';
// }
