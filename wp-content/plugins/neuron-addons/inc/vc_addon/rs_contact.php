<?php
/*
Element Description: Rs Contact Module
*/
 
     
    // Element Mapping
    function vc_contact_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Contact Information', 'neuron_addon'),
                'base' => 'vc_contact',
                'description' => __('contact info box', 'neuron_addon'), 
                'category' => __('by AuburnForest', 'neuron_addon'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(

                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'phone-title',
                        'heading' => __( 'Phone Heading', 'neuron_addon' ),
                        'param_name' => 'phone_heading',
                        'value' => __( '', 'neuron_addon' ),
                        'description' => __( 'Phone heading here', 'neuron_addon' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'value'=> 'Call Us'                       
                    ),        
                         
                    array(
                        'type' => 'textarea',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Phone Number', 'neuron_addon' ),
                        'param_name' => 'primary_phone',
                        'value' => __( '', 'neuron_addon' ),
                        'description' => __( 'Primary phone no. here', 'neuron_addon' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'value' => '(+088)589-8745'
                       
                    ),                
                  
                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'email-title',
                        'heading' => __( 'Email Heading', 'neuron_addon' ),
                        'param_name' => 'email_heading',
                        'value' => __( '', 'neuron_addon' ),
                        'description' => __( 'Mail heading here', 'neuron_addon' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'value' => 'Mail Us'                       
                    ), 
                    
                      array(
                        'type' => 'textarea',
                        'holder' => 'h4',
                        'class' => 'text-class',
                        'heading' => __( 'Email Address', 'neuron_addon' ),
                        'param_name' => 'email_address',
                        'value' => __( '', 'neuron_addon' ),
                        'description' => __( 'Enter your email address', 'neuron_addon' ),
                        'admin_label' => false,
                        'weight' => 0,    
                        'value' => 'support@rstheme.com'                    
                    ),
                    
                     array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'fax-title',
                        'heading' => __( 'Fax Heading', 'neuron_addon' ),
                        'param_name' => 'fax_heading',
                        'value' => __( '', 'neuron_addon' ),
                        'description' => __( 'Fax heading here', 'neuron_addon' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'value' => 'Fax'
                       
                    ), 
                    
                      array(
                        'type' => 'textfield',
                        'holder' => 'h4',
                        'class' => 'text-class',
                        'heading' => __( 'Fax No.', 'neuron_addon' ),
                        'param_name' => 'fax_no',
                        'value' => __( '', 'neuron_addon' ),
                        'description' => __( 'Enter your fax number', 'neuron_addon' ),
                        'admin_label' => false,
                        'weight' => 0,  
                        'value' => '+222-4344-666'                      
                    ),


                     array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'address',
                        'heading' => __( 'Address Heading', 'neuron_addon' ),
                        'param_name' => 'address_heading',
                        'value' => __( '', 'neuron_addon' ),
                        'description' => __( 'Address heading here', 'neuron_addon' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'value' => 'Address'
                       
                    ),   
                    
                    
                    array(
                        "type" => "textarea_html",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __( "Address", "rsaddon" ),
                        "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a     "param_name"
                        "value" =>'rsaddon Pro, 103, Mallin Street
New Youk, NY 100 254',
                        "description" => __( "Enter your address.", "rsaddon" )

                     ),

                     array(
                        "type" => "dropdown",
                        "heading" => __("Select Contact Info Style", "rsaddon"),
                        "param_name" => "contact_style",
                        "value" => array(       
                            __("Style 1", "rsaddon") => "1",
                            __("Style 2", "rsaddon") => "2",
                            __("Style 3", "rsaddon") => "3",
                           
                        ),
                        "description" => __("Select your style here", "rsaddon"),                                         
                    ),  

                    array(
                        "type" => "colorpicker",
                        "class" => "",
                        "heading" => __( "Text Color", "bstart" ),
                        "param_name" => "text_color",
                        "value" => '',
                        "description" => __( "Choose text color here", "bstart" ),
                        'group' => 'Styles',
                    ),

                    array(
                        "type" => "colorpicker",
                        "class" => "",
                        "heading" => __( "Icon Color", "bstart" ),
                        "param_name" => "icon_color",
                        "value" => '',
                        "description" => __( "Choose Icon color here", "bstart" ),
                        'group' => 'Styles',
                    ),

                
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Extra class name', 'js_composer' ),
                        'param_name' => 'el_class',
                        'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'neuron_addon' ),
                    ),  
                                
                    array(
                    'type' => 'css_editor',
                    'heading' => __( 'CSS box', 'neuron_addon' ),
                    'param_name' => 'css',
                    'group' => __( 'Design Options', 'neuron_addon' ),
                ),                  
                        
                ),
            )
        );                                
        
    }
    add_action( 'vc_before_init', 'vc_contact_mapping' );
    
  
    // Element HTML
    function vc_contact_html( $atts,$content ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'primary_phone'   => '(+088)589-8745',
                    'phone_heading'   => 'Call Us',
                    'email_heading'   => 'Mail Us',
                    'email_address'   => 'support@auburnforest.com',
                    'fax_heading'     => 'Fax',
                    'address_heading' => 'Address',
                    'fax_no'          => '+222-4344-666',
                    'contact_style'   => 'Style 1',
                    'icon_color'   => '',
                    'text_color'   => '',
                    'el_class'        =>'',                                     
                    'css'             =>''
                ), 
                $atts, 'vc_contact'
            )
        );
        
        
        
        
        //for css edit box value extract
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
        
     //custom class added
        $icon_color       = ($icon_color) ? ' style="color: '.$icon_color.'"' : '';
        $text_color       = ($text_color) ? ' style="color: '.$text_color.'"' : '';
        $wrapper_classes = array($el_class) ;           
        $class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );        
        $css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
    
        $phone_heading_title   = ($phone_heading != '') ?  '<h3 class="contact-title" '. $text_color .'>'.$phone_heading.'</h3>' : '';
        
        $email_heading_title   = ($email_heading != '') ?  '<h3 class="contact-title" '. $text_color .'>'.$email_heading.'</h3>' : '';
        
        $fax_heading_title     = ($fax_heading != '') ?  '<h3 class="contact-title" '. $text_color .'>'.$fax_heading.'</h3>' : '';
        $address_heading_title = ($address_heading != '') ?  '<h3 class="contact-title" '. $text_color .'>'.$address_heading.'</h3>' : '';
        

        $contact_style_2 = ($contact_style == '2') ? 'style2': '';
        $contact_style_3 = ($contact_style == '3') ? 'style3': '';

        // Fill $html var with data
        $html = '
       <div class="rs-contact">
        <div class="contact-address '.$contact_style_3.' '.$css_class.' '.$css_class_custom.' '.$contact_style_2.'">';
       if($address_heading_title!=''){
            
        $html .='<div class="address-item">
                    <div class="address-icon">
                        <i class="flaticon-place" '. $icon_color .'></i>
                    </div>
                    <div class="address-text" '. $text_color .'>
                        '.$address_heading_title.'
                        '.$content.'
                    </div>
                </div>';
        }
        
       if( $primary_phone!=''){ 
          
      $html .='<div class="address-item">
                <div class="address-icon">
                    <i class="flaticon-phone" '. $icon_color .'></i>
                </div>
                <div class="address-text" '. $text_color .'>
                    '.$phone_heading_title.'
                    <span '. $text_color .'>'.$primary_phone.'</span>
                </div>
            </div>';
            
       }
       if( $email_address!='' ){
           
        $html .='<div class="address-item">
                    <div class="address-icon">
                        <i class="flaticon-mail-1" '. $icon_color .'></i>
                    </div>
                    <div class="address-text">
                        '.$email_heading_title.'
                        <span '. $text_color .'>'.$email_address.'</span>                   
                    </div>
                </div>';
       }

        if( $fax_no!='' ){
           
        $html .='<div class="address-item">
                    <div class="address-icon">
                        <i class="icon icon-basic-printer" '. $icon_color .'></i>
                    </div>
                    <div class="address-text">
                        '.$fax_heading_title.'
                        '.$fax_no.'                 
                    </div>
                </div>';
       }
        
        
        $html .= '</div></div>';       
   return $html;         
}

add_shortcode( 'vc_contact', 'vc_contact_html' );