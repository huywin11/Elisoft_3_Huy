<?php
echo "action";
do_action('my_action');
//Tao a filter
echo 'filter';
$test = 1;
echo apply_filters('my_filter',$test);

 ?>
