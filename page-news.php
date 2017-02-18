<?php get_header(); the_post(); ?>	

<?php
/*
 * Template Name: News
 * Description: .
 */ ?>
 <style>
	.container ~ .footer img {
		display: none;
	}
 </style>
    
	<header class="about-us-header news-header text-center service-margin">
    <h1><?php the_title(); ?></h1>
	</header>
	
	<div class="container" align="center">
    <div class=" news-content">

        <div class="row" align="center">
            <div class="scroll">
			<?php   $args = array('post_type'=>'post' ,'posts_per_page'=> 8 ,'paged' => $paged,);
			$wp_query = new WP_Query($args);
			$i=0; while ($wp_query->have_posts()) : $wp_query->the_post(); ++$i;
					$found_posts = $wp_query->found_posts;
					$post_count = $wp_query->post_count;
					$is_more = ($found_posts > $post_count)? true :false  ;	?>   

                <div class="col-md-3 col-sm-6 news-padding">
                    <div class="news">
                        <img src="<?php my_thumb_url('img-news', 'large'); ?>" alt="<?php the_title(); ?>"/>
                        <div class="new-info ">
                            <h2><?php the_title(); ?></h2>
                            <div>
                                <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date(); ?>
                            </div>
                            <span>
                                <?php the_excerpt(); ?>
                            </span>
                            <a href="<?php the_permalink(); ?>" class="news-btn-more"></a>
                        </div>
                    </div>
                </div>
				<?php endwhile; wp_reset_postdata(); ?> 
				<?php if($is_more){ ?>
                <a class="jscroll-next" href="<?php echo admin_url( 'admin-ajax.php' ) ?>?action=my_special_action_news&offset=<?php echo $i ?>">
                </a>
				<?php }  ?>
            </div>

        </div>
		</div>
	</div>
    
	
<?php get_footer(); ?>

<script>
    $(document).ready(function () {

              $('.scroll').jscroll({
loadingHtml: '<img src="<?php echo ASSETS_URI ;?>assets/images/ajax-loader.gif" alt="Loading" />',
					padding: 20,
					nextSelector: 'a.jscroll-next:last'
					});

    });
</script>
