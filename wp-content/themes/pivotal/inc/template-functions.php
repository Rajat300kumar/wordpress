<?php
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function pivotal_body_classes( $classes ) {
  // Adds a class of hfeed to non-singular pages.
  if ( ! is_singular() ) {
    $classes[] = 'hfeed';
  }

  return $classes;
}
add_filter( 'body_class', 'pivotal_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function pivotal_pingback_header() {
  if ( is_singular() && pings_open() ) {
    echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
  }
}

add_action( 'wp_head', 'pivotal_pingback_header' );

/*
Register Fonts theme google font
*/
function pivotal_studio_fonts_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'pivotal' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Poppins:300,400,500,600,700' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}

function cretic_prefix_kses_allowed_html($tags, $context) {
  switch($context) {
    case 'povital': 
      $tags = array( 
        'a' => array('href' => array()),
        'b' => array()
      );
      return $tags;
    default: 
      return $tags;
  }
}

add_filter( 'wp_kses_allowed_html', 'cretic_prefix_kses_allowed_html', 10, 2);
/*
Enqueue scripts and styles.
*/
function pivotal_studio_scripts() {
    wp_enqueue_style( 'studio-fonts', pivotal_studio_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'pivotal_studio_scripts' );


//Favicon Icon
function pivotal_site_icon() {
 if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {     
    global $pivotal_option;
     
    if(!empty($pivotal_option['rs_favicon']['url']))
    {?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url(($pivotal_option['rs_favicon']['url'])); ?>"> 
  <?php 
    }
  }
}
add_filter('wp_head', 'pivotal_site_icon');

function pivotal_add_excerpt_support_for_cpt() {
 add_post_type_support( 'services', 'excerpt' );
}
add_action( 'init', 'pivotal_add_excerpt_support_for_cpt' );

//excerpt for specific section

function pivotal_wpex_get_excerpt( $args = array() ) {
  // Defaults
  $defaults = array(
    'post'            => '',
    'length'          => 68,
    'readmore'        => false,
    'readmore_text'   => esc_html__( 'read more', 'pivotal' ),
    'readmore_after'  => '',
    'custom_excerpts' => true,
    'disable_more'    => false,
  );
  // Apply filters
  $defaults = apply_filters( 'pivotal_wpex_get_excerpt_defaults', $defaults );
  // Parse args
  $args = wp_parse_args( $args, $defaults );
  // Apply filters to args
  $args = apply_filters( 'pivotal_wpex_get_excerpt_args', $defaults );
  // Extract
  extract( $args );
  // Get global post data
  if ( ! $post ) {
    global $post;
  }

  // Get post ID
  $post_id = $post->ID;

  // Check for custom excerpt
  if ( $custom_excerpts && has_excerpt( $post_id ) ) {
    $output = $post->post_excerpt;
  }
  // No custom excerpt...so lets generate one
  else {
    // Readmore link
    $readmore_link = '<a href="' . get_permalink( $post_id ) . '" class="readmore">' . $readmore_text . $readmore_after . '</a>';
    // Check for more tag and return content if it exists
    if ( ! $disable_more && strpos( $post->post_content, '<!--more-->' ) ) {
      $output = apply_filters( 'the_content', get_the_content( $readmore_text . $readmore_after ) );
    }
    // No more tag defined so generate excerpt using wp_trim_words
    else {
      // Generate excerpt
      $output = wp_trim_words( strip_shortcodes( $post->post_content ), $length );
      // Add readmore to excerpt if enabled
      if ( $readmore ) {
        $output .= apply_filters( 'pivotal_wpex_readmore_link', $readmore_link );
      }

    }

  }
  // Apply filters and echo
  return apply_filters( 'pivotal_wpex_get_excerpt', $output );
}


//Demo content file include here

function pivotal_import_files() {
  return array(
    array(
      'import_file_name'           => 'Pivotal Demo Import',
      'categories'                 => array( 'Category 1' ),
      'import_file_url'            => trailingslashit( get_template_directory_uri() ) . 'ocdi/pivotal-content.xml',
      'import_widget_file_url'     => trailingslashit( get_template_directory_uri() ) . 'ocdi/pivotal-widget.wie',      
      'import_redux'               => array(
        array(
          'file_url'    => trailingslashit( get_template_directory_uri() ) . 'ocdi/pivotal-options.json',
          'option_name' => 'pivotal_option',
        ),
      ),
      
      'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'pivotal' ),
      
    ),
    
  );
}

add_filter( 'pt-ocdi/import_files', 'pivotal_import_files' );

function pivotal_after_import_setup() {
  // Assign menus to their locations.
  $main_menu   = get_term_by( 'name', 'Main Menu', 'nav_menu' );
 

  set_theme_mod( 'nav_menu_locations', array(
      'menu-1' => $main_menu->term_id         
    )
  );

  // Assign front page and posts page (blog page).
  $front_page_id = get_page_by_title( 'Home' );
  $blog_page_id  = get_page_by_title( 'Blog' );

  update_option( 'show_on_front', 'page' );
  update_option( 'page_on_front', $front_page_id->ID );
  update_option( 'page_for_posts', $blog_page_id->ID ); 

  //Import Revolution Slider
  if ( class_exists( 'RevSlider' ) ) {
    $slider_array = array(
      get_template_directory()."/ocdi/sliders/home.zip",
      get_template_directory()."/ocdi/sliders/home1.zip",
      get_template_directory()."/ocdi/sliders/home-2.zip", 
      get_template_directory()."/ocdi/sliders/home4.zip", 
      get_template_directory()."/ocdi/sliders/home5.zip", 
      get_template_directory()."/ocdi/sliders/mainhome.zip",                              
      get_template_directory()."/ocdi/sliders/about-banner.zip",                              
      get_template_directory()."/ocdi/sliders/Work-Process.zip",                              
    );

    $slider = new RevSlider();
    foreach($slider_array as $filepath){
      $slider->importSliderFromPost(true,true,$filepath);  
    }
  } 
}
add_action( 'pt-ocdi/after_import', 'pivotal_after_import_setup' );