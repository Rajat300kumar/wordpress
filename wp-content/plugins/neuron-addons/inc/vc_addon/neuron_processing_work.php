<?php
/*
Element Description: Rs Addon 
*/
 if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
}
    // Element Mapping
     function vc_RsServices_circle_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Processing Works', 'neuron'),
                'base' => 'vc_RsServices_Circle',
                'description' => __('Neuron works Information', 'neuron'), 
                'category' => __('by AuburnForest', 'neuron'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(
                array(
                    "type" => "dropdown",
                    "heading" => __("Select Process Style", "rsaddon"),
                    "param_name" => "process_style",
                    "value" => array(                               
                        'Style 1' => "Style 1",                     
                        'Style 2' => "Style 2",             
                        'Style 3' => "Style 3",             
                    ),                      
                ),
	    
    		    array(
    		      'type' => 'param_group',
    		      'param_name' => 'values',
    		      'params' => array(

                     	
                    array(
                        "type"        => "attach_image",
                        "heading"     => __( "Process Image", "rsaddon" ),
                        "description" => __( "Add process image", "rsaddon" ),
                        "param_name"  => "screenshots",
                        "value"       => "",					
                    ),
                
                    				
    		        array(
        		          'type' => 'textfield',
        		          'name' => 'label',
        		          'heading' => __('Heading', 'neuron'),
        		          'param_name' => 'label',
                    ),

                    array(
                        'type' => 'textarea',
                        'name' => 'Content',
                        'heading' => __('Content', 'rsaddon'),
                        'param_name' => 'excerpt',
                    ),
    		    )),

                array(
                    "type" => "colorpicker",
                    "class" => "",
                    'admin_label' => false,
                    "heading" => __( "Title Color", "rsaddon" ),
                    "param_name" => "title_color",
                    "value" => '',
                    "description" => __( "Choose title color", "rsaddon" ),
                    'group' => 'Styles',
                            
                ),

		    	array(
					'type' => 'css_editor',
					'heading' => __( 'CSS box', 'neuron' ),
					'param_name' => 'css',
					'group' => __( 'Design Options', 'neuron' ),
				),  
		  ),

		));                     
        
    }
     
  add_action( 'vc_before_init', 'vc_RsServices_circle_mapping' );
     
    // Element HTML
    function vc_RsServices_circle_html( $atts,$content ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(					
                    'title_color'    => '',
                    'process_style'    => '',
                    'values'        => '',
					'css'           =>'',					
                ), 
                $atts,'vc_RsServices_Circle'
            )
        ); 




        //for css edit box value extract
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
        $list ='';  

        $values = vc_param_group_parse_atts($atts['values']);

        $i=0;
        
		$new_accordion_value = array();
		foreach($values as $data){
        $new_line = $data;

        $img = wp_get_attachment_image_src($new_line["screenshots"], "large");
        $imgSrc = $img[0];
        
        $new_line['screenshots']     = isset($imgSrc)? $imgSrc : '';

        $new_line['label'] = isset($new_line['label']) ? $new_line['label'] : '';

   
        
        $new_line['excerpt']     = isset($new_line['excerpt']) ? $new_line['excerpt'] : '';	
        	
		$new_accordion_value[] = $new_line;}

        $show_title_color = '';
        if( $title_color != ''){
            $show_title_color ='style="color:'.$title_color.'"';
        }	

  		

        if( $process_style == 'Style 2'){
            $list .='<div class="af-proces-style2 '.$css_class.'">
                    <div class="rs-timeline-inner">';
                        foreach($new_accordion_value as $accordion):
                        $list .='<div class="rs-time-item2"> 
                                <div class="process_icon2">
                                    <img src="'.$accordion['screenshots'].'" alt="Process Image">
                                </div>
                                <h4 '.$show_title_color.' class="title">'.$accordion['label'].'</h4>
                                <p>'.$accordion['excerpt'].'</p>
                        </div>';   
                                
                        endforeach;
                    $list .='
                    </div>
                </div>';        
        
            return $list;
            wp_reset_query();
        }
        if( $process_style == 'Style 3'){
            $list .='<div class="af-proces-style3 '.$css_class.'">
                    <ul class="rs-timeline-inner">';
                        foreach($new_accordion_value as $accordion):
                        $list .='<li class="rs-time-item2"> 
                            <div class="process-inners">
                                <div class="process_icon2">
                                    <img src="'.$accordion['screenshots'].'" alt="Process Image">
                                </div>
                                <div class="process_content">
                                    <h4 '.$show_title_color.' class="title">'.$accordion['label'].'</h4>
                                    <p>'.$accordion['excerpt'].'</p>
                                </div>
                            </div>
                        </li>';   
                                
                        endforeach;
                    $list .='
                    </ul>
                </div>';        
        
            return $list;
            wp_reset_query();
        }
        else{
            $list .='<div class="rs-horizontal-timeline '.$css_class.'">
                    <div class="rs-timeline-inner">';
                          foreach($new_accordion_value as $accordion):

                            if($i%2 == 0){
                                $list .='<div class="rs-time-items top-alignment"> 
                                    <div class="rs-inner-process">
                                        <div class="work-title">
                                            <h4 '.$show_title_color.' class="title">'.$accordion['label'].'</h4>
                                        </div>
                                        <div class="timeline_img">
                                            <p>'.$accordion['excerpt'].'</p>
                                            <img src="'.$accordion['screenshots'].'" alt="Process Image">
                                        </div>
                                    </div>
                                </div>';   
                            }

                            else{
                                $list .='<div class="rs-time-items bottom-alignment"> 
                                    <div class="rs-inner-process af_hidden_mobile">
                                        <div class="timeline_img">
                                            <img src="'.$accordion['screenshots'].'" alt="Process Image">
                                            <p>'.$accordion['excerpt'].'</p>
                                        </div>
                                        <div class="work-title">
                                            <h4 '.$show_title_color.' class="title">'.$accordion['label'].'</h4>
                                        </div>
                                    </div>
                                    <div class="rs-inner-process af_hidden_large">
                                        <div class="work-title">
                                            <h4 '.$show_title_color.' class="title">'.$accordion['label'].'</h4>
                                        </div>
                                        <div class="timeline_img">
                                            <p>'.$accordion['excerpt'].'</p>
                                            <img src="'.$accordion['screenshots'].'" alt="Process Image">
                                        </div>
                                    </div>
                                </div>'; 
                            }
                        $i++;                   
                        endforeach;
                        

                    $list .='
                    </div>
                </div>';        
        
        return $list;
        wp_reset_query();   
        }
						
	}
add_shortcode( 'vc_RsServices_Circle', 'vc_RsServices_circle_html' ); 