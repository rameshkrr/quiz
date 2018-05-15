<?php

get_header(); ?>

	<div id="primary" class="content-area container">
		    <div class="col-sm-9">
		<?php
        query_posts(array('posts_per_page' => 10 )); //'category_name' => 'latest'
        if(have_posts()) : while(have_posts()) : the_post();
        ?>

        <div class="post-front">
        	<div class="col-sm-3">
                    <?php get_template_part('/content/des'); ?>
        </div>  
    </div>
          <?php
            endwhile;
            endif;
            wp_reset_query();
            ?>
   
	</div>

<div class="col-sm-3"><?php get_sidebar() ?></div>
</div>

<?php

get_footer();
