<!--------------------- header --------------------->
<?php echo ASSETS_URI ;?>
<?php echo site_url(); ?>
<?php echo home_url(); ?>
	<title><?php echo get_bloginfo( 'name' ) ?> <?php wp_title('| ', true); ?></title>
	<link rel="shortcut icon" href="<?php echo ASSETS_URI ;?>assets/img/logo.png"/>
<?php wp_head(); ?>  // get wp header
<?php
$defaults = array(
	'theme_location'  => '',
	'menu'            => 'Main Menu',
	'depth'             => 2,
	//'container'         => 'div',
	//'container_class'   => 'collapse navbar-collapse',
	//'container_id'      => 'bs-example-navbar-collapse-1',
	'menu_class'        => 'nav navbar-nav',
	'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
	'walker'            => new wp_bootstrap_navwalker()
);
wp_nav_menu( $defaults );
?>
<?php $menu_items = wp_get_nav_menu_items(__('Top Menu')); 
	foreach($menu_items as $menu_item){
		echo '<li '.$menu_item->attr_title.'><a href="'.$menu_item->url.'">'.$menu_item->title.'</a></li>';
	}
?>

<!---------------------   /// --------------------->	
<!--------------------- footer --------------------->
<?php wp_footer(); ?>
<!--------------------- single --------------------->
<?php get_header();  ?> 
<?php the_post();  ?>
<?php
/*
 * Template Name: My Custom Page
 * Description: .
 */ ?>
 
//related
<?php   $args = array('post_type'=>$post->post_type,'posts_per_page'=>3, 'post__not_in' => array($post->ID)); ?>

<?php get_footer(); ?> 


<!--------------------- archive page --------------------->
<?php echo single_cat_title( '', false ) ; ?> 
  <?php $term = get_queried_object() ; 
	$taxonomy = $term->taxonomy ;
	 ?>
	<?php  while ( have_posts() ) : the_post(); ++$i; //print_r($post); ?>
	
		<?php   $wp_query = new WP_Query("post_type=post&cat=4&posts_per_page=4");
			  while ($wp_query->have_posts()) : $wp_query->the_post();
		?>   

		<?php   $args = array('taxonomy'=>$taxonomy ,'term'=> $term->slug,'posts_per_page'=>get_option('posts_per_page') ,'paged' => $paged,);
			$wp_query = new WP_Query($args);
			$i=0; while ($wp_query->have_posts()) : $wp_query->the_post(); ++$i; ?>   
		
		<?php endwhile; wp_reset_postdata(); ?> 	
				
		<?php   $args = array('posts_per_page'=>6  ,'meta_key'=> 'project_status', 'meta_value'=> 'done'); ?>
				$found_posts = $wp_query->found_posts;
				$post_count = $wp_query->post_count;
				$is_more = ($found_posts > $post_count)? true :false ;  

<!--------------------- Content --------------------->
<li><a href="<?php echo home_url(); ?>"><?php _e('ÇáÑÆíÓíÉ', 'z') ?></a></li>

<?php echo ASSETS_URI ;?>
<?php echo site_url(); ?>
<?php echo home_url(); ?>
<?php the_title(); ?>
<?php the_content() ?>
<?php my_thumb_url(); ?>
<?php my_thumb_url('img_news','thumbnail'); ?>
<?php the_permalink(); ?>
<?php echo get_the_date() ?> l j F¡ Y 
<?php echo get_the_date('l'); // day ?>
<?php echo get_field('our_goals') ?>
<?php the_field('price'); ?>

<?php  echo get_the_excerpt() ?>
<?php echo date('d-m-Y', strtotime(get_field('date'))); ?>
<?php moh_excerpt(350, $page_data->post_excerpt); ?> 	
<?php get_template_part('sidebar'); ?>

<?php theme_pagination();?>
 <?php wp_redirect($_POST['link']); exit; ?>
<!--------------------- users --------------------->
<?php
$current_user = wp_get_current_user();
$user_id = $current_user->ID;
?>
<!--------------------- /// --------------------->

<!--------------------- WPML --------------------->
<?php icl_object_id( $page_id, true ); ?>
<?php _e('text', 'z') ?>



<!--------------------- Gallery --------------------->
<?php
	$images = get_field('gallery'); 
	if($images){
		  $img_url = $images[0]['url'];
		  $img_thumb = $images[0]['sizes']['thumbnail'];
	  }
?>
	**********************************  

	 <?php	$menu_args2 = array(
	'taxonomy' => 'testtype',
	'hide_empty' => 1,
	'orderby' => 'slug',
	'hierarchical ' => 'false'
	);

	$terms_p = get_categories($menu_args2); 
					foreach ($terms_p as $term_p) {?>
		<option value="<?php echo $term_p->term_id;?>"><?php echo $term_p->name;?></option>
		<?php }?>
	</select>

	<?php	
	$category = get_the_category(); 
	$category[0]->cat_name ;
	?>
	////////////////////////
	<?php //wp-config
			define('WP_POST_REVISIONS', 2);
			define('WP_DEBUG', false);
			define( 'WP_MEMORY_LIMIT', '96M' );
			
	?>
	<!--------------------- gravity form --------------------->
	gf_left_half	gf_right_half
	gf_left_third	gf_middle_third	gf_right_third
	////////////////////////
	<div id="header" class="main-menu">
		<ul id="menu-categories" class="menu">
			#header .main-menu{} // container class
			#header .main-menu ul {} // container class first unordered list
			#header .main-menu ul ul {} //unordered list within an unordered list
			#header .main-menu li {} // each navigation item
			#header .main-menu li a {} // each navigation item anchor
			#header .main-menu li ul {} // unordered list if there is drop down items
			#header .main-menu li li {} // each drop down navigation item
			#header .main-menu li li a {} // each drap down navigation item anchor

			li.menu-item-has-children{}  // if li has sub menu
			ul.sub-menu{} //for the sub menu ul

			.current_page_item{} // Class for Current Page
			.current-cat{} // Class for Current Category
			.current-menu-item{} // Class for any other current Menu Item
			.menu-item-type-taxonomy{} // Class for a Categor
			.menu-item-type-post_type{} // Class for Pages
			.menu-item-type-custom{} // Class for any custom item that you added
			.menu-item-home{} // Class for the Home Link
	************************************
	
<?php	
	if(isset($_POST['form_name']) && $_POST['form_name']=="contact_us" ){  //die('mmmmmmmmmmmmmmmmm');
		 //send email
		 $admin_email = get_option( 'admin_email' );
		 $subject = get_option( 'blogname' )." - ".$_POST['sendername'] ;
$message = "
ÇÓã ÇáãÑÓá : ".$_POST['sendername']."	 
ÇáãÏíäÉ    : ".$_POST['sendercity']."
äÕ ÇáÑÓÇáÉ : ".$_POST['messagebody'];
		 $headers[] = "From: ".$_POST['sendername']." <".$_POST['sendermail'].">";
		 wp_mail( $admin_email , $subject, $message, $headers );
	}
?> 

