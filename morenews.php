<?php
//include "../../../wp-load.php";
$offset = (isset($_GET['offset']))? $_GET['offset'] : 8 ;
//echo $offset; die(); 
?>
<?php   $args2 = array('post_type'=>'post' ,'posts_per_page'=> 4 ,'offset' => $offset);
	$wp_query = new WP_Query($args2);
	$i= $offset;  while ($wp_query->have_posts()) : $wp_query->the_post(); ++$i; ?>   
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
				<?php if ($wp_query->have_posts()) : ?>
				<a class="jscroll-next" href="<?php echo admin_url( 'admin-ajax.php' ) ?>?action=my_special_action_news&offset=<?php echo $i ?>">
                    <div class="loader loader--style2" title="1">
                        <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                      <path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                        <animateTransform attributeType="xml"
                          attributeName="transform"
                          type="rotate"
                          from="0 25 25"
                          to="360 25 25"
                          dur="0.6s"
                          repeatCount="indefinite"/>
                        </path>
						</svg>
                    </div>
                </a>
				<?php endif ?>
			<?php die(); ?>
