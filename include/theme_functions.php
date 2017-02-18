<?php

add_action( 'after_setup_theme', 'td_setup' );
function td_setup() {
	register_nav_menus( array(
		'menu_top' => __( 'Main Menu', 'z_fun')
	) );
}
/////////////////////
add_theme_support( 'post-thumbnails' );
add_action('init', 'my_custom_init');
function my_custom_init() {
	add_post_type_support( 'page', 'excerpt' );
}

//////
//wp_nav_menu change sub-menu class name?
class My_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }
}

///Upload a .csv file to media library
add_filter('upload_mimes', 'my_upload_mimes');

function my_upload_mimes ( $existing_mimes=array() ) {
    $existing_mimes['csv'] = 'text/csv';
    return $existing_mimes;
}
//////////

////////////////////////// Ajax orphan //////////////////////////
/* add_action('wp_ajax_nopriv_my_special_action_orphan', 'implement_ajax_orphan');//for users that are not logged in.
	add_action('wp_ajax_my_special_action_orphan', 'implement_ajax_orphan');
	
	function implement_ajax_orphan() { 

	require_once('ajax_getorphan.php');
	} 
 */	
//////Pronamic Google Maps - How to display description in the popup box
/*
function prefix_pgmm_item($itemContent) {
	$itemContent = '<div class="itemContent" style="width:200px">';
	$itemContent .= '<h2 style="font-weight: bold;">'.get_the_title().'</h2>';
	$itemContent .= '<br />';
     $itemContent .= '<img src="'.wp_get_attachment_url( get_post_thumbnail_id($post->ID) ).'" width="100">';
	//$itemContent .= '<h3 style="font-weight: bold;">'.__('«·⁄‰Ê«‰').' : </h3>';
	//$itemContent .= wpautop(get_post_meta(get_the_ID(), '_pronamic_google_maps_address', true));
	$itemContent .= '<h3 style="font-weight: bold;">'.__(' ›«’Ì·').' : </h3>';
	$itemContent .= wpautop(get_post_meta(get_the_ID(), '_pronamic_google_maps_description', true));
	$itemContent .= '</div>';
	return $itemContent;
}
add_filter('pronamic_google_maps_mashup_item', 'prefix_pgmm_item');
*/

////////////////////////////// Fix Gravity Form Tabindex Conflicts
/*
add_filter( 'gform_tabindex', 'gform_tabindexer', 10, 2 );
function gform_tabindexer( $tab_index, $form = false ) {
    $starting_index = 1000; // if you need a higher tabindex, update this number
    if( $form )
        add_filter( 'gform_tabindex_' . $form['id'], 'gform_tabindexer' );
    return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}
*/
////////////////////////////Set Default Terms for your Custom Taxonomies
/* function mfields_set_default_object_terms( $post_id, $post ) {
function add_taxonomy_automatically($post_ID) {

    $slug = 'productive_family';
    if ( $slug != $_POST['post_type'] ) {
        return;
    }  
		$term = (ICL_LANGUAGE_CODE == 'ar')? '«·√”—-«·„‰ Ã…' : 'productive-families' ;
		$taxonomy = 'productive_category' ;
	if(!has_term($term, $taxonomy, $post_ID)){
		wp_set_object_terms($post_ID, $term, $taxonomy );
	}
}
add_action('save_post', 'add_taxonomy_automatically');
 */

 