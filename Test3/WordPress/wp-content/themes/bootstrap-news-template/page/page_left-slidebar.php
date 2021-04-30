<?php
/**
* Template Name: Left Width Page
*
* @package WordPress
* @subpackage bootstrap-news-template
* @since bootstrap-news-template 1.0
*/
get_header();
?>
<div class="row">
  <div class="col-3" >
    <h1 id="titles"> left page </h1>
  </div>
  <div class="col-9">
    <?php  the_title(); ?><br>
    <?php the_content(); ?>
  </div>
</div>
<?php get_footer(); ?>