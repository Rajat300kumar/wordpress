<?php
function pivotal_scripts() {
	//register styles
	wp_enqueue_style( 'boostrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css' );	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css');
	wp_enqueue_style( 'icofont', get_template_directory_uri() .'/assets/css/icofont.css');
	wp_enqueue_style( 'flaticon', get_template_directory_uri() .'/assets/css/flaticon.css');
	wp_enqueue_style( 'lineicon', get_template_directory_uri() .'/assets/css/lineicons.css');
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() .'/assets/css/owl.carousel.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() .'/assets/css/animate.css' );
	wp_enqueue_style( 'slick', get_template_directory_uri() .'/assets/css/slick.css' );	
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() .'/assets/css/magnific-popup.css');
	wp_enqueue_style( 'pivotal-style-default', get_template_directory_uri() .'/assets/css/default.css' );
	wp_enqueue_style( 'pivotal-style-responsive', get_template_directory_uri() .'/assets/css/responsive.css' );
	wp_enqueue_style( 'pivotal-style', get_stylesheet_uri() );	
		
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr-2.8.3.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '20151215', true );	
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'waypoints-sticky', get_template_directory_uri() . '/assets/js/waypoints-sticky.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'jquery-counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'isotope-pivotal', get_template_directory_uri() . '/assets/js/isotope-pivotal.js', array('jquery', 'imagesloaded'), '20151215', true );	
	wp_enqueue_script('jflickrfeed', get_template_directory_uri().'/assets/js/flickr/jflickrfeed.min.js', array('jquery'), '20151215', true);
	wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '20151215', true );	
		
	if (class_exists( 'ReduxFramework' )){	
		wp_enqueue_script( 'time-circle', get_template_directory_uri() . '/assets/js/time-circle.js', array('jquery'), '20151215', true );
	}
	wp_enqueue_script('pivotal-classie', get_template_directory_uri() . '/assets/js/classie.js', array('jquery'), '201513434', true);	

	wp_enqueue_script('pivotal-offcanvas', get_template_directory_uri() . '/assets/js/offcanvas.main.js', array('jquery'), '201513434', true);	

	wp_enqueue_script('pivotal-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '201513434', true);
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pivotal_scripts' );

	
add_action( 'admin_enqueue_scripts', 'pivotal_load_admin_styles' );
function pivotal_load_admin_styles($screen) {
	wp_enqueue_style( 'pivotal-admin-style', get_template_directory_uri() . '/assets/css/admin-style.css', true, '1.0.0' );
	wp_enqueue_script( 'pivotal-admin-script', get_template_directory_uri() . '/assets/js/admin-script.js', array('jquery'), '20151215', true );
}  
