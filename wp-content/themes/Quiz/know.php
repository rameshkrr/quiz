<?php
/*
 * Template Name: know-strength
 * Template Post Type: post, page, product
 */
  
 get_header();  ?>

<div class="container">
	<div class="col-sm-9">

<div class="col-md-12 text-center">
    <div id="status"></div>
 <?php get_template_part('/content/content'); ?>
</div>
</div>
<div class="col-sm-3"><?php get_sidebar() ?></div>

<?php 
        
    get_footer();

?>