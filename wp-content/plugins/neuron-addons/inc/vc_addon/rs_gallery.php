<?php
/*
Element Description: Rs Gallery elements
*/
// Element Mapping
 if ( !defined( 'WPB_VC_VERSION' ) ) {
		return;
}
if ( !class_exists( 'AuburnForest_vc_grassyClient_mapping' ) ) {   
	class AuburnForest_vc_grassyClient_mapping extends AuburnForest_VC_Modules {
	public function __construct(){
		$this->name = __( "Gallery Module", 'rsaddon' );
		$this->base = 'rs_gallery_moduel';				
		parent::__construct();
	}
	
	 
	// Map the block with vc_map()
	public function fields(){
		$args = array(
        'post_type'           => 'gallery',
        'posts_per_page'      => -1,
        'suppress_filters'    => false,
        'ignore_sticky_posts' => 1,
    );
	$shortcode_id = '';
    $posts_array = get_posts( $args );

    if( !empty( $posts_array ) ){
        foreach ( $posts_array as $post ) {
            $post_dropdown[$post->post_title] = $post->ID;                  
        }
        
        $shortcode_id =  $posts_array[0]->ID;

    }
    else {
        $post_dropdown = $shortcode_id;
    }
		$fields = array( 
					

			array(
                "type"       => "dropdown",
                "holder"     => "div",
                "class"      => "",
                "heading"    => __( "Select An Gallery", 'rsaddon' ),
                "param_name" => "gallery_style",
                'value'      => $post_dropdown,
            ),	

			array(
				"type"       => "dropdown",
				"heading"    => __("How many Column ", "rsaddon"),
				"param_name" => "column",
				"value" => array(
					'Two'   => "Two",
					'Three' => "Three",
					'Four'  => "Four", 
				),
				'std' => "Three", 
			), 
			array(
				"type" => "dropdown",
				"heading" => __("No Gap", "rsaddon"),
				"param_name" => "gap",
				"value" => array(							    						
					'No'  => "",
					'Yes' => "Yes", 
				),						
			), 

			array(
				'type'        => 'textfield',
				'heading'     => __( 'Extra class name', 'rsaddon' ),
				'param_name'  => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'rsaddon' ),
			),
			array(
				'type'       => 'css_editor',
				'heading'    => __( 'CSS box', 'rsaddon' ),
				'param_name' => 'css',
				'group'      => __( 'Design Options', 'rsaddon' ),
			),           
		 
	);                                
  
	return $fields;                           
 }   
     
     
    // Element HTML
   public function shortcode( $atts, $content = '' ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
					'column'        => 'Three',
					'per_page'      => '6',
					'el_class'      => '',	
					'gallery_style' => '',				
					'gap' => '',				
					'css'           => ''            
                ), 
                $atts,'rs_gallery_moduel'
           )
        );
	
   
	  
	   //custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
		
	
		//extract css edit box
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		
        //******************//
        // query post
        //******************//

        $col_grid='';
		$col_group='';
		$col_full='';
		$col_filter='';
		$col_grid=$column;
		
		if($col_grid =='Two'){
			$col_group = 6;
		}
		if($col_grid =='Three'){
			$col_group = 4;
		}
		
		if($col_grid == 'Four'){
			$col_group = 3;
		}
		
		if($col_grid == 'Full'){
			$col_group=3;
			$col_full='full-grid';		
		}

		$no_gap = '';
		$col_gap = '';
		$no_gap = $gap;

		if($no_gap == 'Yes'){
			$col_gap = 'no-gutters';
		}



		$template = 'gallery-module';

		return $this->template( $template, get_defined_vars() );
				
		}
	
	}
}
new AuburnForest_vc_grassyClient_mapping;