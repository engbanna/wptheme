<?php get_header();  ?> 
<section class="mainblock">       		<ul class="navigation-bar">            	<a href="<?php echo home_url(); ?>"><li><?php _e('الرئيسية','z'); ?> </li></a>                <li>|</li>                <a href="##"><li class="navigation-active"><?php _e('لم يتم العثور على الصفحة المطلوبة','z'); ?></li></a>            </ul>						<div class="no_result">			   <h3><?php _e('لم يتم العثور على الصفحة المطلوبة','z'); ?></h3>			   <a href="<?php echo home_url(); ?>"><h3><?php _e('العودة للرئيسية','z'); ?></h3></a>			</div>
    </section>
<?php get_footer();  ?>