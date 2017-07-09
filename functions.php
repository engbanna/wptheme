<?php 
error_reporting(0);
define('ASSETS_URI', get_template_directory_uri(). '/');

require_once('include/wrap_pagination.php');
require_once('include/widgets.php');
require_once('include/wp_bootstrap_navwalker.php');
require_once('include/TGMPA-TGM/required_plugins.php'); 

 if ( is_rtl() ) { define('lang',"ar");}else{ define('lang',"en"); }
 
 
 ///////////////////////////////////////////////////////


///////////////////////////////////////////////////////




//////////////////////////////////////////
function z_excerpt($charlength=500 ,$excerpt=0 ) { 
	if(!$excerpt) $excerpt = get_the_excerpt();
	if(mb_strlen ($excerpt)> $charlength){
	 $excerpt = mb_substr($excerpt, 0, $charlength);
	 $excerpt = mb_substr($excerpt, 0, strripos($excerpt, " "));
	 }

	echo $excerpt;
}
//////////////////////////////////////////
function the_tube_link($video_link ) { 
	$video_code = substr($video_link, strpos($video_link, 'v=')+2 ); 
	echo 'http://www.youtube.com/v/'.$video_code;
}
//////////////////////////////////////////


//////////////////// WPML ////////////////////
function change_lang($lang=0){
	$lang = (lang == 'en') ? 'ar' : 'en' ;
	if(function_exists ('icl_get_languages')){
    $languages = icl_get_languages('skip_missing=0&orderby=code');
     return $languages[$lang]['url'];
	 }else{ return ; }
}

if(!function_exists ('icl_object_id')){
	function icl_object_id($id){
		return $id;
	}
}
////////////////////////////////////////////////////////////////////
function z_get_page_id($name){
	$page = get_page_by_path($name); 
	return icl_object_id( $page->ID, true );
}

/////////////////////////////////////////
//size = thumbnail, medium, large, full
function my_thumb_url($alternative_img ='img_news' , $size='thumbnail', $id=0){
	$id= ($id != 0)? $id : get_the_ID() ;
	if( has_post_thumbnail() ) { 
	 $image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id) , $size ) ;
	 echo $image_thumb[0];
	/*}else{ 
		$image = get_field($alternative_img,'option');
		if( !empty($image) ){
		echo  $image['sizes'][$size];
		}
	*/
	 }
}

////////////////////////// Creates sharethis shortcode //////////////////////////
/*
if (function_exists('st_makeEntries')) :
add_shortcode('sharethis', 'st_makeEntries');
endif;
<?php echo do_shortcode('[sharethis]') ?>
*/