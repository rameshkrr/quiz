<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

 <title> 

<?php if ( is_single() ) {
    single_post_title('', true); 
} else {
    bloginfo('name'); echo " | "; bloginfo('description');
}
?>

</title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width" , initial-scale=1>
   <meta name="title" content="<?php if ( is_single() ) {
        single_post_title('', true); 
    } else {
        bloginfo('name'); echo " - "; bloginfo('description');
    }
    ?>" />
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
	
</head>

 <body <?php body_class(); ?>>
<div class="menu1">	
	<div class="container">
	<div class="col-sm-1">
		
		<ul class="logotext"><a href="#" >Tailor</a></ul>
		

	</div>
	<div class="col-sm-11">
		
	<?php
		wp_nav_menu( array(
			'theme_location' => 'primary', // Defined when registering the menu
			//'menu_id'        => 'primary',
			//'container'      => true,
			'depth'          => 2,
			'menu_class'     => 'menustyle',
		) );
		?>
	
</div>

</div>
</div>