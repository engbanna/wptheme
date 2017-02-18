<?php

///////////////////// Customize Login Page  /////////////////////
function arwp_loginLogo() {
    $logoUrl = get_template_directory_uri().'/assets/images/logo.png' ;
     
    echo '<style> .login h1 a { background-image: url('.$logoUrl.'); width: 160px;
height: 100px;
display: block;
margin-right: auto;
margin-left: auto;background-size: cover;
background-position: center;  } </style>' ;
}
 
add_action( 'login_head', 'arwp_loginLogo' );
///
function arwp_loginTitle( $title ) {
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'arwp_loginTitle' );
/////
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

/////////////////////////////////////////////////////////

function wps_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_node('wp-logo');
    $wp_admin_bar->remove_node('about');
    $wp_admin_bar->remove_node('wporg');
    $wp_admin_bar->remove_node('documentation');
    $wp_admin_bar->remove_node('support-forums');
   // $wp_admin_bar->remove_node('feedback');
   // $wp_admin_bar->remove_node('new-post');
    $wp_admin_bar->remove_node('comments');
    $wp_admin_bar->remove_node('themes');
    $wp_admin_bar->remove_node('menus');
    $wp_admin_bar->remove_node('customize');
    $wp_admin_bar->remove_node('widgets');
}
add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );
/////////////////////////////////////////////
function arwp_remove_dashboard_widgets() {
    $metaboxes = array(
    'dashboard_browser_nag'     => 'normal',	//����� ���� ��� ��� ������� �������� �����
   // 'dashboard_right_now'       => 'normal',	// ����� ��������
    'dashboard_recent_comments' => 'normal',	// ����� ���� ���������
   // 'dashboard_incoming_links'  => 'normal',	// ����� ������� ��������
    'dashboard_plugins'         => 'normal',	// ����� ������
    'dashboard_quick_press'     => 'side',	// ����� ��� ����
    'dashboard_recent_drafts'   => 'side',	// ����� ��� ��������
    'dashboard_primary'         => 'side',	// ����� ������ RSS �����
    'dashboard_secondary'       => 'side',	// ����� ������ RSS ������
    );
    foreach ( $metaboxes as $metabox => $context ) {
        remove_meta_box( $metabox, 'dashboard', $context );
    }
} 
add_action( 'wp_dashboard_setup', 'arwp_remove_dashboard_widgets' );
