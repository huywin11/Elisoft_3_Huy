<?php
/**
* Template Name: Full Width Page
*
* @package WordPress
* @subpackage bootstrap-news-template
* @since bootstrap-news-template 1.0
*/
get_header();
?>

<div class="content">

    <?php  the_title(); ?><br>
    <?php the_content(); ?>

  </div>
</div>
<?php  get_footer(); ?>
