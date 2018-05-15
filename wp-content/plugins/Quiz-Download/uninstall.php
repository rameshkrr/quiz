<?php 

if (! defined('WP_UNINSTALL_PLUGIN')) {

	die;
}

//clear database stored data

//for post type,taxonomies etc..


/*$books = get_posts( array('post_type' => 'quiz','numberposts' => -1) );

foreach( $books as $book ){
	wp_delete_post($book->ID, true);
}*/

//Access database via SQL

global $wpdb;
$wpdb->query( "DELETE FROM xplo_posts WHERE post_type = 'quiz'" );
$wpdb->query( "DELETE FROM xplo_postmeta WHERE post_id NOT IN (SELECT if FROM xplo_posts)" );
$wpdb->query( "DELETE FROM xplo_term_relationships WHERE object_id NOT IN (SELECT if FROM xplo_posts)" );