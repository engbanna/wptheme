<?php get_header();  ?>
<?php the_post();  ?>
<?php
/*
 * Template Name: Contact
 */ ?>


<div class="section_header">
    <div class="container">
        <h3><?php the_title() ?></h3>
    </div>
</div>

<section class="block-section white" id="contact_section">
    <div class="container">
        <ul>
            <li>
                <ul class="social_contacts list-inline">
                    <li><a href="<?php the_field('facebook', 'option') ?>"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="<?php the_field('linkedin', 'option') ?>"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="<?php the_field('email', 'option') ?>"><i class="fa fa-envelope"></i></a></li>
                </ul>
            </li>
            <li><i class="fa fa-map-marker"></i><span><?php echo get_field('address_'.__('en', 'z'), 'option') ?> </span></li>
            <li>
                <ul class="list-inline">
                    <li><i class="fa fa-phone fa-fw fa-lg"></i><?php the_field('tel1', 'option') ?></li>
                    <li><i class="fa fa-phone fa-fw fa-lg"></i><?php the_field('tel2', 'option') ?></li>
                    <li><i class="fa fa-fax fa-fw fa-lg"></i><?php the_field('fax', 'option') ?></li>
                    <li><i class="fa fa-envelope-o fa-fw fa-lg"></i><a href="mailto:<?php the_field('email', 'option') ?>"><?php the_field('email', 'option') ?></a></li>
                </ul>
            </li>
        </ul>
    </div>
</section>
<section id="map">
    <div id="map-canvas"></div>
</section>

<?php
if(isset($_POST['form_name']) && $_POST['form_name']=="contact_us" && $_POST['contactname']!=''){
    //send email
    $name = $_POST['contactname'];
    $email = $_POST['contactmail'];
    $address = $_POST['contactaddress'];
    $msg = $_POST['contactmessage'];
    $subject = get_option( 'blogname' )." - ".$name ;
    $admin_email = get_option( 'admin_email' );

/////
    $message ='
<!DOCTYPE html>
<html>
    <head>
        <title>'.get_option( 'blogname' ).'</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
     <table align="center" style="width: 670px;border: 1px solid #f2f2f0;border-collapse: collapse">
            <tbody>
			<col width="100">

				<tr style="background-color: #838080;">
					<td colspan="2" style="text-align: center;">
                        <div style="padding:10px">
                            <img src="'.ASSETS_URI.'assets/images/logo.png" style="width: 150px" alt="'.get_option( 'blogname' ).'"/>

                        </div>
                    </td>
				</tr>
                <tr style="background-color: #f2f2f0; height: auto;">
					<td style="padding-left: 10px;"> Name : </td>
					<td> <span style="font-size: 13px">'.$name.'</span> </td>
                </tr>
                <tr style="background-color: #f2f2f0; height: auto;">
					<td style="padding-left: 10px;"> Email : </td>
					<td> <span style="font-size: 13px">'.$email.'</span> </td>
                </tr>
				<tr style="background-color: #f2f2f0; height: auto;">
					<td style="padding-left: 10px;"> Address : </td>
					<td> <span style="font-size: 13px">'.$address.'</span> </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div style="padding: 10px"><pre>'.$msg.'</pre></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div style="background-color: #f2f2f0; padding: 10px 0;">
                            <p style="text-align: center;font-size: 10px;padding: 0;margin: 0;font-family: arial;color: gray">
                                © 2015 .
                                <a href="'.home_url().'" style="color: #6ba477; text-decoration: none;font-weight: bold;font-size: 11px;"
                                   target="_blank">'.get_option( 'blogname' ).'</a>
                            </p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: ".$name." <".$email.">";

    wp_mail( $admin_email , $subject, $message, $headers );
    echo 'success';
}
?>
<section id="send_msg">
    <div class="section_title text-center clearfix">
        <div class="section_header">
            <div class="container">
                <h3><?php _e('SEND MESSAGE', 'z') ?></h3>
            </div>
        </div>
        <div class="container">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <span  class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                            <input type="text" name="contactname" class="form-control name" placeholder="<?php _e('name', 'z') ?>"  aria-describedby="basic-addon1"/>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <span  class="input-group-addon" id="basic-addon2"><i class="fa fa-envelope-square"></i></span>
                            <input type="text" name="contactmail" class="form-control email" placeholder="<?php _e('Email', 'z') ?>"  aria-describedby="basic-addon2"/>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <span  class="input-group-addon" id="basic-addon3"><i class="fa fa-home"></i></span>
                            <input type="text" name="contactaddress" class="form-control address" placeholder="<?php _e('Address', 'z') ?>"  aria-describedby="basic-addon3"/>
                        </div>
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span  class="input-group-addon" id="basic-addon4"><i class="fa fa-comment"></i></span>
                            <textarea  name="contactmessage" class="form-control msg" placeholder="<?php _e('Enter your message', 'z') ?>" aria-describedby="basic-addon4"></textarea>
                        </div>

                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-sm-12 pull-right">
                        <a href="#" class="btn btn-primary form-control send_btn"><?php _e('SEND', 'z') ?></a>
                    </div>
                </div> <!-- row -->

            </form>
        </div> <!-- container -->
    </div>
</section>



<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
<?php get_footer() ?>

<script>
    /***** map code *****/
    function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
            <?php $location = get_field('location', 'option'); ?>
            center: new google.maps.LatLng(<?php echo $location['lat'] ?>, <?php echo $location['lng'] ?>),
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
    }
    google.maps.event.addDomListener(window, 'load', initialize);

</script>
</body>


