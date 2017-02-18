<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Pagination Functions
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*//*------------------------------------------------------------------------
*Theme Pagination
------------------------------------------------------------------------*/
function theme_pagination() 
{ 
	$pagination =1;	if($pagination == '1') {
		theme_page_navi ();
	}elseif($pagination == '3' && function_exists('wp_pagenavi')){	
		wp_pagenavi();	
	}else{
		theme_prev_next();	
	}
}
/*------------------------------------------------------------------------
*Load WP Pagination
------------------------------------------------------------------------*/
function theme_page_navi ($pages = '')
{
	global $paged;
global $pp;	if(empty($paged))$paged = 1;
	$prev = $paged - 1;							
	$next = $paged + 1;	
	$range = 2; // only edit this if you want to show more page-links
	$showitems = 1;	if($pages == '')
	{	
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{			$pages = 1; 
		}
	}
	if(1 != $pages)
	{ 		$pp="<ul class='pagination'>";
		if($pages > 2 && $paged >2 ){ $pp=$pp."<li><a href='".get_pagenum_link(1)."' class='arrows'><<</a></li>";}else $pp=$pp."";
		if($paged > 1 && $showitems < $pages){ $pp=$pp."<li style='margin-right: 6px;'><a href='".get_pagenum_link($prev)."' class='arrows'><</a></li>" ;}else $pp=$pp."";
		for ($i=1; $i <= $pages; $i++){		if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
		if($paged == $i){ $pp=$pp."<li class='active'><a href='".get_pagenum_link($i)."'>".$i."</a></li>";}else {$pp=$pp."<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";}
		}
		}
			if($paged < $pages && $showitems < $pages) {$pp=$pp."<li style='margin-right: 6px;'><a href='".get_pagenum_link($prev)."' class='arrows'>></a></li>" ;}else $pp=$pp."";
		if($pages > 2 && $pages!=$paged && $pages-1!=$paged){ $pp=$pp."<li><a href='".get_pagenum_link($pages)."' class='arrows'>>></a></li>";}else $pp=$pp."";
		$pp=$pp. " </ul> ";
				echo $pp;
	} 
}
/*------------------------------------------------------------------------
*Load Prev Next Pagination
------------------------------------------------------------------------*/
function theme_prev_next () 
{
	//echo "<section id='list_pagination'>";
	// previous_posts_link('السابق'); 
	// echo '</span><span class="next">';
	// next_posts_link(__('التالي', 'HK')); 
	// echo '</span></div></section>';
}
?>