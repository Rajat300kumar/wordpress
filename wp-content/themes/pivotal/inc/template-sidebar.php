<?php
function pivotal_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pivotal' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here for blog page and single page.', 'pivotal' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar Shop', 'pivotal' ),
			'id'            => 'sidebar_shop',
			'description'   => esc_html__( 'Sidebar Shop', 'pivotal' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
	if (class_exists( 'ReduxFramework' )){
		register_sidebar( array(
			'name'          => esc_html__( 'Off Canvas Sidebar', 'pivotal' ),
			'id'            => 'sidebarcanvas-1',
			'description'   => esc_html__( 'Add widgets here.', 'pivotal' ),
			'before_widget' => '<li id="%1$s" class="widget icon-list %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Project Sidebar', 'pivotal' ),
			'id'            => 'project-1',
			'description'   => esc_html__( 'Add widgets here.', 'pivotal' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Service Sidebar', 'pivotal' ),
			'id'            => 'service-1',
			'description'   => esc_html__( 'Add widgets here.', 'pivotal' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );	
	}

	

	register_sidebar( array(
			'name' => esc_html__( 'Footer One Widget Area', 'pivotal' ),
			'id' => 'footer1',
			'description' => esc_html__( 'Footer column one widgets area', 'pivotal' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="footer-title">',
			'after_title' => '</h3>'
	) ); 		 				

	 register_sidebar( array(
			'name' => esc_html__( 'Footer Two Widget Area', 'pivotal' ),
			'id' => 'footer2',
			'description' => esc_html__( 'Footer column two widgets area', 'pivotal' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="footer-title">',
			'after_title' => '</h3>'
	) ); 
	 register_sidebar( array(
			'name' => esc_html__( 'Footer Three Widget Area', 'pivotal' ),
			'id' => 'footer3',
			'description' => esc_html__( 'Footer column three widgets area', 'pivotal' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="footer-title">',
			'after_title' => '</h3>'
	) );

	register_sidebar( array(
			'name' => esc_html__( 'Footer Four Widget Area', 'pivotal' ),
			'id' => 'footer4',
			'description' => esc_html__( 'Footer column foru widgets area', 'pivotal' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="footer-title">',
			'after_title' => '</h3>'
	) ); 

			
}
add_action( 'widgets_init', 'pivotal_widgets_init' );