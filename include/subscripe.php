<?php/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>
<style>
    .formErrorContent{
        position: relative;
        top: 42px;
        right: 200px;
    }
</style>
<!--START Scripts : this is the script part you can add to the header of your theme-->
<script type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/jquery/jquery.js?ver=2.6.5"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/plugins/wysija-newsletters/js/validate/languages/jquery.validationEngine-<?php _e('en'); ?>.js?ver=2.6.5"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/plugins/wysija-newsletters/js/validate/jquery.validationEngine.js?ver=2.6.5"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/plugins/wysija-newsletters/js/front-subscribers.js?ver=2.6.5"></script>
<script type="text/javascript">
                /* <![CDATA[ */
                var wysijaAJAX = {"action":"wysija_ajax","controller":"subscribers","ajaxurl":"<?php echo site_url(); ?>/wp-admin/admin-ajax.php","loadingTrans":"<?php _e('Loading...')?>"};
                /* ]]> */
                </script><script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/plugins/wysija-newsletters/js/front-subscribers.js?ver=2.6.5"></script>
<!--END Scripts-->
<div class="widget_wysija_cont html_wysija">
    <div id="msg-form-wysija-html5369cb6a178e8-1" class="wysija-msg ajax"></div><form id="form-wysija-html5369cb6a178e8-1" method="post" action="#wysija" class="widget_wysija html_wysija">        <div class="wysija-msg ajax"></div><input type="hidden" value="f351453e25" id="wysijax" />
<p>
<div class="form-group">
<input type="text" name="wysija[user][email]" class="wysija-input validate[required,custom[email]]  form-control"  value="" placeholder="<?php _e('Your E-mail','z') ?>"  />
  <span class="glyphicon glyphicon-envelope form-control-feedback" aria-hidden="true"></span>
</div>
 <!--<input class="wysija-submit wysija-submit-field" type="submit" value="<?php _e('Subscripe','z'); ?>" /> --></p>		<?php  $form_id = 1; ?>
    <input type="hidden" name="form_id" value="<?php echo $form_id ?>" />
    <input type="hidden" name="action" value="save" />
    <input type="hidden" name="controller" value="subscribers" />
    <input type="hidden" value="1" name="wysija-page" />
        <input type="hidden" name="wysija[user_list][list_ids]" value="1" /> </form></div>

