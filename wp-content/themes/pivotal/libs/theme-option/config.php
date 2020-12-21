<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "pivotal_option";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'pivotal/opt_name', $opt_name );
    $theme    = wp_get_theme(); // For use with some settings. Not necessary.
    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Pivotal Option', 'pivotal' ),
        'page_title'           => esc_html__( 'Pivotal Option', 'pivotal' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string       
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 10,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        'forced_dev_mode_off' => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        'compiler' => true,
        // Enable basic customizer support
      
        'page_priority'        => 20,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        'force_output' => true,       

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( 'pivotal Theme', 'pivotal' ), $v );
    } else {
        $args['intro_text'] = esc_html__( 'pivotal Theme', 'pivotal' );
    }

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTSpivotal
     */
    /*
     *
     * ---> START SECTIONS
     *
     */     
   // -> START General Settings
   Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General Sections', 'pivotal' ),
        'id'               => 'basic-checkbox',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'container_size',
                'title'    => esc_html__( 'Container Size', 'pivotal' ),
                'subtitle' => esc_html__( 'Container Size example(1200px)', 'pivotal' ),
                'type'     => 'text',
                'default'  => '1270px'                
            ),
            array(
                'id'       => 'logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Default Logo', 'pivotal' ),
                'subtitle' => esc_html__( 'Upload your logo', 'pivotal' ),
                'url'=> true                
            ),

            array(
                'id'       => 'logo_light',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Your Light', 'pivotal' ),
                'subtitle' => esc_html__( 'Upload your light logo', 'pivotal' ),
                'url'=> true
                
            ),

            array(
                    'id'       => 'logo-height',                               
                    'title'    => esc_html__( 'Logo Height', 'pivotal' ),
                    'subtitle' => esc_html__( 'Logo max height example(50px)', 'pivotal' ),
                    'type'     => 'text',
                    'default'  => '36px'
                    
            ),
            array(
                'id'       => 'logo-height-mobile',                               
                'title'    => esc_html__( 'Mobile Logo Height', 'pivotal' ),
                'subtitle' => esc_html__( 'Mobile Logo max height example(50px)', 'pivotal' ),
                'type'     => 'text',
                'default'  => '30px'
                    
            ),

            array(
                'id'       => 'rswplogo_sticky',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Your Sticky Logo', 'pivotal' ),
                'subtitle' => esc_html__( 'Upload your sticky logo', 'pivotal' ),
                'url'=> true                
            ),

            array(
                'id'       => 'sticky_logo_height',                               
                'title'    => esc_html__( 'Sticky Logo Height', 'pivotal' ),
                'subtitle' => esc_html__( 'Sticky Logo max height example(20px)', 'pivotal' ),
                'type'     => 'text',
                'default'  => '32px'
                    
            ),

            
            array(
            'id'       => 'rs_favicon',
            'type'     => 'media',
            'title'    => esc_html__( 'Upload Favicon', 'pivotal' ),
            'subtitle' => esc_html__( 'Upload your faviocn here', 'pivotal' ),
            'url'=> true            
            ),
            
            array(
                'id'       => 'off_sticky',
                'type'     => 'switch', 
                'title'    => esc_html__('Sticky Menu', 'pivotal'),
                'subtitle' => esc_html__('You can show or hide sticky menu here', 'pivotal'),
                'default'  => false,
            ),
               
             array(
                'id'       => 'off_search',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Search', 'pivotal'),
                'subtitle' => esc_html__('You can show or hide search icon at menu area', 'pivotal'),
                'default'  => false,
            ),

             array(
                'id'       => 'off_canvas',
                'type'     => 'switch', 
                'title'    => esc_html__('Show off Canvas', 'pivotal'),
                'subtitle' => esc_html__('You can show or hide off canvas here', 'pivotal'),
                'default'  => false,
            ),            
           
            array(
                'id'       => 'show_top_bottom',
                'type'     => 'switch', 
                'title'    => esc_html__('Go to Top', 'pivotal'),
                'subtitle' => esc_html__('You can show or hide here', 'pivotal'),
                'default'  => false,
            ),
            array(
                'id'       => 'show_top_position_select',
                'type'     => 'select',
                'title'    => esc_html__( 'Positon', 'pivotal' ),  
                'options'  => array(
                    'left_option' => 'Left',
                    'right_option' => 'Right',
                ),
                'default'  => 'left_option',        
                'required' => array(
                    array(
                        'show_top_bottom',
                        'equals',
                        true,
                    ),
                ),                 
            ),          
        )
    ) );
    
    
    // -> START Header Section
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'pivotal' ),
        'id'               => 'header',
        'customizer_width' => '450px',
        'icon' => 'el el-certificate',       
         
        'fields'           => array(
        array(
            'id'     => 'notice_critical',
            'type'   => 'info',
            'notice' => true,
            'style'  => 'success',
            'title'  => esc_html__('Header Top Area', 'pivotal')            
        ),
        
        array(
            'id'       => 'show-top',
            'type'     => 'switch', 
            'title'    => esc_html__('Show Top Bar', 'pivotal'),
            'subtitle' => esc_html__('You can select top bar show or hide', 'pivotal'),
            'default'  => false,
        ),

        array(
            'id'       => 'show-top-mobile',
            'type'     => 'switch', 
            'title'    => esc_html__('Hide Top Bar At Mobile', 'pivotal'),
            'subtitle' => esc_html__('You can select top bar show or hide', 'pivotal'),
            'default'  => true,
        ),           
      
        array(
            'id'       => 'show-social',
            'type'     => 'switch', 
            'title'    => esc_html__('Show Social Icons at Header', 'pivotal'),
            'subtitle' => esc_html__('You can select Social Icons show or hide', 'pivotal'),
            'default'  => true,
        ),  
                    
        array(
            'id'     => 'notice_critical2',
            'type'   => 'info',
            'notice' => true,
            'style'  => 'success',
            'title'  => esc_html__('Header Area', 'pivotal')            
        ),

        array(
                'id'               => 'header-grid',
                'type'             => 'select',
                'title'            => esc_html__('Header Area Width', 'pivotal'),               
               
                'options'          => array(                                     
                
                    'container' => esc_html__('Container', 'pivotal'),
                    'full'      => esc_html__('Container Fluid', 'pivotal'),
                ),

                'default'          => 'container',            
            ),

        
         array(
                    'id'       => 'phone',                               
                    'title'    => esc_html__( ' Phone Number', 'pivotal' ),
                    'subtitle' => esc_html__( 'Enter Phone Number', 'pivotal' ),
                    'type'     => 'text',
                    
            ),

               
        array(
                    'id'       => 'top-email',                               
                    'title'    => esc_html__( 'Email Address', 'pivotal' ),
                    'subtitle' => esc_html__( 'Enter Email Address', 'pivotal' ),
                    'type'     => 'text',
                    'validate' => 'email',
                    'msg'      => esc_html__('Email Address Not Valid', 'pivotal')
                    
            ),  

            
        array(
                'id'       => 'quote',                               
                'title'    => esc_html__( 'Quote Button Text', 'pivotal' ),                  
                'type'     => 'text',
                
        ),  
        
        array(
                'id'       => 'quote_link',                               
                'title'    => esc_html__( 'Quote Button Link', 'pivotal' ),
                'subtitle' => esc_html__( 'Enter Quote Button Link Here', 'pivotal' ),
                'type'     => 'text',
                
            ),      
        )
    ) 

);  
   

Redux::setSection( $opt_name, array(
'title'            => esc_html__( 'Header Layout', 'pivotal' ),
'id'               => 'header-style',
'customizer_width' => '450px',
'subsection'=>'true',      
'fields'    => array( 
                array(
                    'id'       => 'header_layout',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Header Layout', 'pivotal'), 
                    'subtitle' => esc_html__('Select header layout. Choose between 1, 2 or 3 layout.', 'pivotal'),
                    'options'  => array(
                    'style1'   => array(
                    'alt'      => 'Header Style 1', 
                    'img'      => get_template_directory_uri().'/libs/img/style_1.png'
                    
                    ),
                   
                    'style2' => array(
                    'alt'    => 'Header Style 2', 
                    'img'    => get_template_directory_uri().'/libs/img/style_2.png'
                    ),
                    ),
                    'default' => 'style2'
                ),                           
        )
    ) 
);
                              
//Topbar settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Toolbar area', 'pivotal' ),
        'desc'   => esc_html__( 'Toolbar area Style Here', 'pivotal' ),        
        'subsection' =>'true',  
        'fields' => array( 
                        
                array(
                    'id'        => 'toolbar_bg_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar background Color','pivotal'),
                    'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),    

                array(
                    'id'        => 'toolbar_text_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Text Color','pivotal'),
                    'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                    'default'   => '#666',                        
                    'validate'  => 'color',                        
                ), 

                 array(
                    'id'        => 'transparent_toolbar_text_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Transparent Toolbar Text Color','pivotal'),
                    'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                    'default'   => '#666',                        
                    'validate'  => 'color',                        
                ),  

                array(
                    'id'        => 'toolbar_link_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Link Color','pivotal'),
                    'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                    'default'   => '#666',                        
                    'validate'  => 'color',                        
                ),               

                array(
                    'id'        => 'toolbar_link_hover_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Link Hover Color','pivotal'),
                    'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                    'default'   => '#f26723',                        
                    'validate'  => 'color',                        
                ),  

                 array(
                    'id'        => 'transparent_toolbar_link_hover_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Transparent Toolbar Link Hover Color','pivotal'),
                    'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                    'default'   => '#f26723',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'toolbar_text_size',
                    'type'      => 'text',                       
                    'title'     => esc_html__('Toolbar Font Size','pivotal'),
                    'subtitle'  => esc_html__('Font Size', 'pivotal'),    
                    'default'   => '15px',                                            
                ), 
                
        )
    )
);

  //Preloader settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Preloader Style', 'pivotal' ),
        'desc'   => esc_html__( 'Preloader Style Here', 'pivotal' ),        
        
        'fields' => array( 
                        array(
                            'id'       => 'show_preloader',
                            'type'     => 'switch', 
                            'title'    => esc_html__('Show Preloader', 'pivotal'),
                            'subtitle' => esc_html__('You can show or hide preloader', 'pivotal'),
                            'default'  => false,
                        ), 

                        array(
                            'id'        => 'preloader_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Preloader Background Color','pivotal'),
                            'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                            'default'   => '#f1f6fc',                        
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'preloader_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Preloader Color','pivotal'),
                            'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                            'default'   => '#fff',                        
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'    => 'preloader_img', 
                            'url'   => true,     
                            'title' => esc_html__( 'Preloader Image', 'pivotal' ),                 
                            'type'  => 'media',                                  
                        ),       
                    )
                )
            );    
//End Preloader settings  
    // -> START Style Section
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Style', 'pivotal' ),
        'id'               => 'stle',
        'customizer_width' => '450px',
        'icon' => 'el el-brush',
        ));
    
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Global Style', 'pivotal' ),
        'desc'   => esc_html__( 'Style your theme', 'pivotal' ),        
        'subsection' =>'true',  
        'fields' => array( 
                        
                        array(
                            'id'        => 'body_bg_color',
                            'type'      => 'color',                           
                            'title'     => esc_html__('Body Backgroud Color','pivotal'),
                            'subtitle'  => esc_html__('Pick body background color', 'pivotal'),
                            'default'   => '#ffffff',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'body_text_color',
                            'type'      => 'color',            
                            'title'     => esc_html__('Text Color','pivotal'),
                            'subtitle'  => esc_html__('Pick text color', 'pivotal'),
                            'default'   => '#555',
                            'validate'  => 'color',                        
                        ),     
        
                        array(
                            'id'        => 'primary_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Primary Color','pivotal'),
                            'subtitle'  => esc_html__('Select Primary Color.', 'pivotal'),
                            'default'   => '#f26723',
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'secondary_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Secondary Color','pivotal'),
                            'subtitle'  => esc_html__('Select Secondary Color.', 'pivotal'),
                            'default'   => '#173969',
                            'validate'  => 'color',                        
                        ),

                        array(
                            'id'        => 'link_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Link Color','pivotal'),
                            'subtitle'  => esc_html__('Pick Link color', 'pivotal'),
                            'default'   => '#f26723',
                            'validate'  => 'color',                        
                        ),
                        
                        array(
                            'id'        => 'link_hover_text_color',
                            'type'      => 'color',                 
                            'title'     => esc_html__('Link Hover Color','pivotal'),
                            'subtitle'  => esc_html__('Pick link hover color', 'pivotal'),
                            'default'   => '#666',
                            'validate'  => 'color',                        
                        ),    
                       
                 ) 
            ) 
    ); 

       
    
    //Menu settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Main Menu', 'pivotal' ),
        'desc'   => esc_html__( 'Main Menu Style Here', 'pivotal' ),        
        'subsection' =>'true',  
        'fields' => array( 
                        
                        array(
                            'id'     => 'notice_critical_menu',
                            'type'   => 'info',
                            'notice' => true,
                            'style'  => 'success',
                            'title'  => esc_html__('Main Menu Settings', 'pivotal'),                                           
                        ),

                        array(
                            'id'        => 'menu_area_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Background Color','pivotal'),
                            'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                            'default'   => '',                        
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'menu_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Color','pivotal'),
                            'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                            'default'   => '#333333',                        
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'transparent_menu_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Tranparent Menu Text Color','pivotal'),
                            'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                            'default'   => '#333333',                        
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'transparent_menu_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Tranparent Menu Hover Color','pivotal'),
                            'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                            'default'   => '#f26723',                        
                            'validate'  => 'color',                        
                        ),  

                        array(
                            'id'        => 'transparent_menu_active_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Tranparent Menu Active Color','pivotal'),
                            'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                            'default'   => '#f26723',                        
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'menu_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Hover Color','pivotal'),
                            'subtitle'  => esc_html__('Pick color', 'pivotal'),           
                            'default'   => '#f26723',                 
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'menu_text_active_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Active Color','pivotal'),
                            'subtitle'  => esc_html__('Pick color', 'pivotal'),
                            'default'   => '#f26723',
                            'validate'  => 'color',                        
                        ),

                        array(
                            'id'        => 'menu_item_gap',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Left Right Gap','pivotal'),   
                            'default'   => '25px',                             
                        ), 
                        array(
                            'id'        => 'menu_item_gap2',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Top Gap','pivotal'),   
                            'default'   => '27px',                             
                        ),                        

                        array(
                            'id'        => 'menu_item_gap3',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Bottom Gap','pivotal'),   
                            'default'   => '27px',                             
                        ),

                        array(
                            'id'       => 'menu_text_trasform',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Menu Text Uppercase', 'pivotal' ),
                            'on'       => esc_html__( 'Enabled', 'pivotal' ),
                            'off'      => esc_html__( 'Disabled', 'pivotal' ),
                            'default'  => false,
                        ),

                        array(
                            'id'     => 'notice_critical_dropmenu',
                            'type'   => 'info',
                            'notice' => true,
                            'style'  => 'success',
                            'title'  => esc_html__('Dropdown Menu Settings', 'pivotal'),                                           
                        ),
                                               
                        array(
                            'id'        => 'drop_down_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Background Color','pivotal'),
                            'subtitle'  => esc_html__('Pick bg color', 'pivotal'),
                            'default'   => '#fff',
                            'validate'  => 'color',                        
                        ), 
                            
                        
                        array(
                            'id'        => 'drop_text_color',
                            'type'      => 'color',                     
                            'title'     => esc_html__('Dropdown Menu Text Color','pivotal'),
                            'subtitle'  => esc_html__('Pick text color', 'pivotal'),
                            'default'   => '#666',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'drop_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Hover Text Color','pivotal'),
                            'subtitle'  => esc_html__('Pick text color', 'pivotal'),
                            'default'   => '#f26723',
                            'validate'  => 'color',                        
                        ),                              
                     

                        array(
                            'id'       => 'menu_text_trasform2',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Dropdown Menu Text Uppercase', 'pivotal' ),
                            'on'       => esc_html__( 'Enabled', 'pivotal' ),
                            'off'      => esc_html__( 'Disabled', 'pivotal' ),
                            'default'  => false,
                        ),

                        array(
                             'id'        => 'dropdown_menu_item_gap',
                             'type'      => 'text',                       
                             'title'     => esc_html__('Dropdown Menu Item Left Right Gap','pivotal'),   
                             'default'   => '40px',                             
                         ), 

                        array(
                             'id'        => 'dropdown_menu_item_separate',
                             'type'      => 'text',                       
                             'title'     => esc_html__('Dropdown Menu Item Middle Gap','pivotal'),   
                             'default'   => '10px',                             
                         ), 
                         array(
                             'id'        => 'dropdown_menu_item_gap2',
                             'type'      => 'text',                       
                             'title'     => esc_html__('Dropdown Menu Boxes Top Bottom Gap','pivotal'),   
                             'default'   => '21px',                             
                         ),
                         array(
                             'id'     => 'notice_critical3',
                             'type'   => 'info',
                             'notice' => true,
                             'style'  => 'success',
                             'title'  => esc_html__('Mega Menu Settings', 'pivotal'),                                           
                         ),

                          array(
                            'id'        => 'meaga_menu_item_gap',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Mega Menu Item Left Right Gap','pivotal'),   
                            'default'   => '40px',                             
                        ), 

                         array(
                            'id'        => 'mega_menu_item_separate',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Mega Menu Item Middle Gap','pivotal'),   
                            'default'   => '10px',                             
                        ),  
                        array(
                            'id'        => 'mega_menu_item_gap2',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Mega Menu Boxes Top Bottom Gap','pivotal'),   
                            'default'   => '21px',                             
                        ),                       
                        
                        
                )
            )
        ); 

     //Sticky Menu settings
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Sticky Menu', 'pivotal' ),
        'desc'       => esc_html__( 'Sticky Menu Style Here', 'pivotal' ),        
        'subsection' =>'true',  
        'fields' => array(                       

                        array(
                            'id'        => 'stiky_menu_area_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Sticky Menu Area Background Color','pivotal'),
                            'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                            'default'   => '#fff',                        
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'stikcy_menu_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Menu Text Color','pivotal'),
                            'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                            'default'   => '#666',                        
                            'validate'  => 'color',                        
                        ), 
                       

                        array(
                            'id'        => 'sticky_menu_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Menu Text Hover Color','pivotal'),
                            'subtitle'  => esc_html__('Pick color', 'pivotal'),           
                            'default'   => '#f26723',                 
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'stikcy_menu_text_active_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Active Color','pivotal'),
                            'subtitle'  => esc_html__('Pick color', 'pivotal'),
                            'default'   => '#f26723',
                            'validate'  => 'color',                        
                        ),
                                               
                        array(
                            'id'        => 'sticky_drop_down_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Background Color','pivotal'),
                            'subtitle'  => esc_html__('Pick bg color', 'pivotal'),
                            'default'   => '#fff',
                            'validate'  => 'color',                        
                        ), 
                            
                        
                        array(
                            'id'        => 'stikcy_drop_text_color',
                            'type'      => 'color',                     
                            'title'     => esc_html__('Dropdown Menu Text Color','pivotal'),
                            'subtitle'  => esc_html__('Pick text color', 'pivotal'),
                            'default'   => '#666',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'sticky_drop_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Hover Text Color','pivotal'),
                            'subtitle'  => esc_html__('Pick text color', 'pivotal'),
                            'default'   => '#f26723',
                            'validate'  => 'color',                        
                        ),   
                     
                        
                )
            )
        ); 

    //Breadcrumb settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Page Banner', 'pivotal' ),      
        'subsection' =>'true',  
        'fields' => array( 

                      array(
                        'id'       => 'off_breadcrumb',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Show off Breadcrumb', 'pivotal'),
                        'subtitle' => esc_html__('You can show or hide off breadcrumb here', 'pivotal'),
                        'default'  => false,
                    ),

                    array(
                        'id'        => 'breadcrumb_bg_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Background Color','pivotal'),
                        'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                        'default'   => '#e7eaf1',                        
                        'validate'  => 'color',                        
                    ), 

                    array(
                        'id'       => 'page_banner_main',
                        'type'     => 'media',
                        'title'    => esc_html__( 'Background Banner', 'pivotal' ),
                        'subtitle' => esc_html__( 'Upload your banner', 'pivotal' ),                  
                    ), 

                     array(
                        'id'       => 'page_banner_image',
                        'type'     => 'media',
                        'title'    => esc_html__( 'Banner Area Image', 'pivotal' ),
                        'subtitle' => esc_html__( 'Upload your image', 'pivotal' ),                  
                    ),
                    
                    array(
                        'id'        => 'breadcrumb_title_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Title Color','pivotal'),
                        'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                        'default'   => '#333333',                        
                        'validate'  => 'color',                        
                    ), 

                    array(
                        'id'        => 'breadcrumb_text_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Text Color','pivotal'),
                        'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                        'default'   => '#666666',                        
                        'validate'  => 'color',                        
                    ), 
                    
                    array(
                        'id'        => 'breadcrumb_top_gap',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Top Gap','pivotal'),                          
                        'default'   => '225px',                        
                                            
                    ), 
                     array(
                        'id'        => 'breadcrumb_bottom_gap',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Bottom Gap','pivotal'),                          
                        'default'   => '175px',                   
                    ),     
                        
                )
            )
        );

    //Button settings
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Button Style', 'pivotal' ),
        'desc'       => esc_html__( 'Button Style Here', 'pivotal' ),        
        'subsection' =>'true',  
        'fields' => array( 

                    array(
                        'id'        => 'btn_bg_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Button Background Color','pivotal'),
                        'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                        'default'   => '#f26723',                        
                        'validate'  => 'color',                        
                    ), 

                    array(
                        'id'        => 'btn_bg_color2',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Button Hover Background Color','pivotal'),
                        'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                        'default'   => '#ff7c3f',                        
                        'validate'  => 'color',                        
                    ), 
                    
                    array(
                        'id'        => 'btn_text_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Text Color','pivotal'),
                        'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                        'default'   => '#fff',                        
                        'validate'  => 'color',                        
                    ), 
                    
                    array(
                        'id'        => 'btn_txt_hover_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Hover Text Color','pivotal'),
                        'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                        'default'   => '#fff',                        
                        'validate'  => 'color',                        
                    ),  
                )
            )
        );   

    

    //-> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Typography', 'pivotal' ),
        'id'     => 'typography',
        'desc'   => esc_html__( 'You can specify your body and heading font here','pivotal'),
        'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'       => 'opt-typography-body',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font', 'pivotal' ),
                'subtitle' => esc_html__( 'Specify the body font properties.', 'pivotal' ),
                'google'   => true, 
                'font-style' =>false,           
                'default'  => array(                    
                    'font-size'   => '15px',
                    'font-family' => 'Poppins',
                    'font-weight' => '400',
                ),
            ),
             array(
                'id'       => 'opt-typography-menu',
                'type'     => 'typography',
                'title'    => esc_html__( 'Navigation Font', 'pivotal' ),
                'subtitle' => esc_html__( 'Specify the menu font properties.', 'pivotal' ),
                'google'   => true,
                'font-backup' => true,                
                'all_styles'  => true,              
                'default'  => array(
                    'color'       => '#ffffff',                    
                    'font-family' => 'Poppins',
                    'google'      => true,
                    'font-size'   => '16px',                    
                    'font-weight' => '700',                    
                ),
            ),
            array(
                'id'          => 'opt-typography-h1',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H1', 'pivotal' ),
                'font-backup' => true,                
                'all_styles'  => true,
                'units'       => 'px',
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'pivotal' ),
                'default'     => array(
                    'color'       => '#222',
                    'font-style'  => '700',
                    'font-family' => 'Poppins',
                    'google'      => true,
                    'font-size'   => '48px',
                    'line-height' => '55px'
                    
                    ),
                ),
            array(
                'id'          => 'opt-typography-h2',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H2', 'pivotal' ),
                'font-backup' => true,                
                'all_styles'  => true,                 
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'pivotal' ),
                    'default'     => array(
                        'color'       => '#222',
                        'font-style'  => '600',
                        'font-family' => 'Poppins',
                        'google'      => true,
                        'font-size'   => '36px',
                        'line-height' => '42px'
                        
                    ),
                ),
            array(
                'id'          => 'opt-typography-h3',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H3', 'pivotal' ),             
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'pivotal' ),
                'default'     => array(
                    'color'       => '#222',
                    'font-style'  => '600',
                    'font-family' => 'Poppins',
                    'google'      => true,
                    'font-size'   => '30px',
                    'line-height' => '40px'
                    
                    ),
                ),
            array(
                'id'          => 'opt-typography-h4',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H4', 'pivotal' ),
                //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                //'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,                
                'all_styles'  => true,               
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'pivotal' ),
                'default'     => array(
                    'color'       => '#222',
                    'font-style'  => '600',
                    'font-family' => 'Poppins',
                    'google'      => true,
                    'font-size'   => '24px',
                    'line-height' => '30px'
                    ),
                ),
            array(
                'id'          => 'opt-typography-h5',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H5', 'pivotal' ),
                //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                //'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,                
                'all_styles'  => true,                
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'pivotal' ),
                'default'     => array(
                    'color'       => '#222',
                    'font-style'  => '600',
                    'font-family' => 'Poppins',
                    'google'      => true,
                    'font-size'   => '21px',
                    'line-height' => '28px'
                    ),
                ),
            array(
                'id'          => 'opt-typography-6',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H6', 'pivotal' ),
             
                'font-backup' => false,                
                'all_styles'  => true,                
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'pivotal' ),
                'default'     => array(
                    'color'       => '#222',
                    'font-style'  => '500',
                    'font-family' => 'Poppins',
                    'google'      => true,
                    'font-size'   => '18px',
                    'line-height' => '24px'
                ),
                ),
                
                )
            )
                    
   
    );

    /*Blog Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog', 'pivotal' ),
        'id'               => 'blog',
        'customizer_width' => '450px',
        'icon' => 'el el-comment',
        )
        );
        
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Settings', 'pivotal' ),
        'id'               => 'blog-settings',
        'subsection'       => true,
        'customizer_width' => '450px',      
        'fields'           => array(
        
                                array(
                                    'id'    => 'blog_banner_main', 
                                    'url'   => true,     
                                    'title' => esc_html__( 'Blog Page Banner', 'pivotal' ),                 
                                    'type'  => 'media',                                  
                                ),  

                                array(
                                    'id'        => 'blog_bg_color',
                                    'type'      => 'color',                           
                                    'title'     => esc_html__('Body Backgroud Color','pivotal'),
                                    'subtitle'  => esc_html__('Pick body background color', 'pivotal'),
                                    'default'   => '#fff',
                                    'validate'  => 'color',                        
                                ),
                                
                                array(
                                    'id'       => 'blog_title',                               
                                    'title'    => esc_html__( 'Blog  Title', 'pivotal' ),
                                    'subtitle' => esc_html__( 'Enter Blog  Title Here', 'pivotal' ),
                                    'type'     => 'text',                                   
                                ),
                                
                                array(
                                    'id'               => 'blog-layout',
                                    'type'             => 'image_select',
                                    'title'            => esc_html__('Select Blog Layout', 'pivotal'), 
                                    'subtitle'         => esc_html__('Select your blog layout', 'pivotal'),
                                    'options'          => array(
                                    'full'             => array(
                                    'alt'              => 'Blog Style 1', 
                                    'img'              => get_template_directory_uri().'/libs/img/1c.png'                                      
                                ),
                                    '2right'           => array(
                                    'alt'              => 'Blog Style 2', 
                                    'img'              => get_template_directory_uri().'/libs/img/2cr.png'
                                ),
                                '2left'            => array(
                                'alt'              => 'Blog Style 3', 
                                'img'              => get_template_directory_uri().'/libs/img/2cl.png'
                                ),                                  
                                ),
                                'default'          => '2right'
                                ),                      
                                
                                array(
                                    'id'               => 'blog-grid',
                                    'type'             => 'select',
                                    'title'            => esc_html__('Select Blog Gird', 'pivotal'),                   
                                    'desc'             => esc_html__('Select your blog gird layout', 'pivotal'),
                                //Must provide key => value pairs for select options
                                'options'          => array(
                                    '12'               => esc_html__('1 Column','pivotal'),                                   
                                    '6'                => esc_html__('2 Column', 'pivotal'),                                         
                                    '4'                => esc_html__('3 Column', 'pivotal'),
                                    '3'                => esc_html__('4 Column', 'pivotal'),
                                    ),
                                    'default'          => '12',                                  
                                ),  
                                
                                array(
                                'id'               => 'blog-author-post',
                                'type'             => 'select',
                                'title'            => esc_html__('Show Author Info ', 'pivotal'),                   
                                'desc'             => esc_html__('Select author info show or hide', 'pivotal'),
                                //Must provide key => value pairs for select options
                                'options'          => array(                                            
                                'show'             => esc_html__('Show','pivotal'), 
                                'hide'             => esc_html__('Hide', 'pivotal'),
                                ),
                                'default'          => 'show',
                                
                                ), 

                                

                                array(
                                'id'               => 'blog-category',
                                'type'             => 'select',
                                'title'            => esc_html__('Show Category', 'pivotal'),                   
                               
                                //Must provide key => value pairs for select options
                                'options'          => array(                                            
                                'show'             => esc_html__('Show','pivotal'), 
                                'hide'             => esc_html__('Hide', 'pivotal'),
                                ),
                                'default'          => 'show',
                                
                                ), 

                                array(
                                'id'               => 'view-comments',
                                'type'             => 'select',
                                'title'            => esc_html__('Show View & Comments', 'pivotal'),                   
                               
                                //Must provide key => value pairs for select options
                                'options'          => array(                                            
                                'show'             => esc_html__('Show','pivotal'), 
                                'hide'             => esc_html__('Hide', 'pivotal'),
                                ),
                                'default'          => 'show',
                                
                                ), 
                                
                                array(
                                    'id'               => 'blog-date',
                                    'type'             => 'switch',
                                    'title'            => esc_html__('Show Date', 'pivotal'),                   
                                    'desc'             => esc_html__('You can show/hide date at blog page', 'pivotal'),
                                    
                                    'default'          => true,
                                ), 
                                array(
                                    'id'               => 'blog_readmore',                               
                                    'title'            => esc_html__( 'Blog  ReadMore Text', 'pivotal' ),
                                    'subtitle'         => esc_html__( 'Enter Blog  ReadMore Here', 'pivotal' ),
                                    'type'             => 'text',                                   
                                ),
                                
                            )
                        ) 
                                
                    );
    
    
    /*Single Post Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Post', 'pivotal' ),
        'id'               => 'spost',
        'subsection'       => true,
        'customizer_width' => '450px',      
        'fields'           => array(                            
        
                            array(
                                    'id'       => 'blog_banner', 
                                    'url'      => true,     
                                    'title'    => esc_html__( 'Blog Single page banner', 'pivotal' ),                  
                                    'type'     => 'media',
                                    
                            ),  
                           
                            array(
                                    'id'       => 'blog-comments',
                                    'type'     => 'select',
                                    'title'    => esc_html__('Show Comment', 'pivotal'),                   
                                    'desc'     => esc_html__('Select comments show or hide', 'pivotal'),
                                     //Must provide key => value pairs for select options
                                    'options'  => array(                                            
                                            'show' => esc_html__('Show', 'pivotal'),
                                            'hide' => esc_html__('Hide', 'pivotal'),
                                            ),
                                        'default'  => 'show',
                                        
                            ),  
                            
                            array(
                                    'id'       => 'blog-author',
                                    'type'     => 'select',
                                    'title'    => esc_html__('Show Ahthor Info', 'pivotal'),                   
                                    'desc'     => esc_html__('Select author info show or hide', 'pivotal'),
                                     //Must provide key => value pairs for select options
                                    'options'  => array(                                            
                                            'show' => esc_html__('Show', 'pivotal'),
                                            'hide' => esc_html__('Hide', 'pivotal'),
                                        ),
                                    'default'  => 'show',
                                        
                            ),  
                            
                            array(
                                    'id'       => 'blog-post',
                                    'type'     => 'select',
                                    'title'    => esc_html__('Show Related Post', 'pivotal'),                  
                                    'desc'     => esc_html__('Choose related product show or hide', 'pivotal'),
                                     //Must provide key => value pairs for select options
                                    'options'  => array(                                            
                                            'show' => esc_html__('Show', 'pivotal'),
                                            'hide' => esc_html__('Hide', 'pivotal'),
                                            ),
                                    'default'  => 'show',
                                        
                            ),  
                        )
                ) 
    
    
    );

  
    /*Team Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Team Section', 'pivotal' ),
        'id'               => 'team',
        'customizer_width' => '450px',
        'icon' => 'el el-user',
        'fields'           => array(
        
            array(
                    'id'       => 'team_single_image', 
                    'url'      => true,     
                    'title'    => esc_html__( 'Team Single page banner image', 'pivotal' ),                    
                    'type'     => 'media',                    
            ),

            array(
                    'id'       => 'team_single_custom_title',                    
                    'title'    => esc_html__( 'Team Single Title', 'pivotal' ),                    
                    'type'     => 'text',                    
            ),

              array(
                    'id'       => 'team_single_banner_content',                      
                    'title'    => esc_html__( 'Team Single Banner Content', 'pivotal' ),                    
                    'type'     => 'text',                    
            ), 

             array(
                'id'        => 'team_single_bg_color',
                'type'      => 'color',                           
                'title'     => esc_html__('Sinlge Team Body Backgroud Color','pivotal'),
                'subtitle'  => esc_html__('Pick body background color', 'pivotal'),
                'default'   => '#fff',
                'validate'  => 'color',                        
            ),
            
            array(
                    'id'       => 'team_slug',                               
                    'title'    => esc_html__( 'Team Slug', 'pivotal' ),
                    'subtitle' => esc_html__( 'Enter Team Slug Here', 'pivotal' ),
                    'type'     => 'text',
                    'default'  => esc_html__('teams', 'pivotal'),
                    
                ),               
                          
             )
         ) 
    );

    

  
    /*Portfolio Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Portfolio Section', 'pivotal' ),
        'id'               => 'Portfolio',
        'customizer_width' => '450px',
        'icon' => 'el el-align-right',
        'fields'           => array(
        
            array(
                    'id'       => 'department_single_image', 
                    'url'      => true,     
                    'title'    => esc_html__( 'Portfolio Single page banner image', 'pivotal' ),                    
                    'type'     => 'media',
                    
            ),  

             array(
                    'id'       => 'portfolio_slug',                               
                    'title'    => esc_html__( 'Portfolio Slug', 'pivotal' ),
                    'subtitle' => esc_html__( 'Enter Portfolio Slug Here', 'pivotal' ),
                    'type'     => 'text',
                    'default'  => 'portfolio',
                    
                ), 
            )
         ) 
    );




    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Social Icons', 'pivotal' ),
        'desc'   => esc_html__( 'Add your social icon here', 'pivotal' ),
        'icon'   => 'el el-share',
         'submenu' => true, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
        'fields' => array(
                    array(
                        'id'       => 'facebook',                               
                        'title'    => esc_html__( 'Facebook Link', 'pivotal' ),
                        'subtitle' => esc_html__( 'Enter Facebook Link', 'pivotal' ),
                        'type'     => 'text',                     
                    ),
                        
                     array(
                        'id'       => 'twitter',                               
                        'title'    => esc_html__( 'Twitter Link', 'pivotal' ),
                        'subtitle' => esc_html__( 'Enter Twitter Link', 'pivotal' ),
                        'type'     => 'text'
                    ),
                    
                        array(
                        'id'       => 'rss',                               
                        'title'    => esc_html__( 'Rss Link', 'pivotal' ),
                        'subtitle' => esc_html__( 'Enter Rss Link', 'pivotal' ),
                        'type'     => 'text'
                    ),
                    
                     array(
                        'id'       => 'pinterest',                               
                        'title'    => esc_html__( 'Pinterest Link', 'pivotal' ),
                        'subtitle' => esc_html__( 'Enter Pinterest Link', 'pivotal' ),
                        'type'     => 'text'
                    ),
                     array(
                        'id'       => 'linkedin',                               
                        'title'    => esc_html__( 'Linkedin Link', 'pivotal' ),
                        'subtitle' => esc_html__( 'Enter Linkedin Link', 'pivotal' ),
                        'type'     => 'text',
                        
                    ),
                     array(
                        'id'       => 'google',                               
                        'title'    => esc_html__( 'Google Plus Link', 'pivotal' ),
                        'subtitle' => esc_html__( 'Enter Google Plus  Link', 'pivotal' ),
                        'type'     => 'text',                       
                    ),

                    array(
                        'id'       => 'instagram',                               
                        'title'    => esc_html__( 'Instagram Link', 'pivotal' ),
                        'subtitle' => esc_html__( 'Enter Instagram Link', 'pivotal' ),
                        'type'     => 'text',                       
                    ),

                     array(
                        'id'       => 'youtube',                               
                        'title'    => esc_html__( 'Youtube Link', 'pivotal' ),
                        'subtitle' => esc_html__( 'Enter Youtube Link', 'pivotal' ),
                        'type'     => 'text',                       
                    ),

                    array(
                        'id'       => 'tumblr',                               
                        'title'    => esc_html__( 'Tumblr Link', 'pivotal' ),
                        'subtitle' => esc_html__( 'Enter Tumblr Link', 'pivotal' ),
                        'type'     => 'text',                       
                    ),

                    array(
                        'id'       => 'vimeo',                               
                        'title'    => esc_html__( 'Vimeo Link', 'pivotal' ),
                        'subtitle' => esc_html__( 'Enter Vimeo Link', 'pivotal' ),
                        'type'     => 'text',                       
                    ),         
            ) 
        ) 
    );
    
    if ( class_exists( 'WooCommerce' ) ) {
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Woocommerce', 'pivotal' ),    
        'icon'   => 'el el-shopping-cart',    
        ) 
    ); 

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Shop', 'pivotal' ),
        'id'               => 'shop_layout',
        'customizer_width' => '450px',
        'subsection' =>'true',      
        'fields'           => array(                      
            array(
                'id'       => 'shop_banner', 
                'url'      => true,     
                'title'    => esc_html__( 'Shop page banner', 'pivotal' ),                    
                'type'     => 'media',
            ), 
            array(
                    'id'       => 'shop-layout',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Select Shop Layout', 'pivotal'), 
                    'subtitle' => esc_html__('Select your shop layout', 'pivotal'),
                    'options'  => array(
                        'full'      => array(
                            'alt'   => 'Shop Style 1', 
                            'img'   => get_template_directory_uri().'/libs/img/1c.png'                                      
                        ),
                            'right-col' => array(
                            'alt'       => 'Shop Style 2', 
                            'img'       => get_template_directory_uri().'/libs/img/2cr.png'
                        ),
                        'left-col'  => array(
                            'alt'   => 'Shop Style 3', 
                            'img'   => get_template_directory_uri().'/libs/img/2cl.png'
                        ),                                  
                    ),
                    'default' => 'full'
                ),

                array(
                    'id'       => 'wc_num_product',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Number of Products Per Page', 'pivotal' ),
                    'default'  => '9',
                ),

                array(
                    'id'       => 'wc_num_product_per_row',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Number of Products Per Row', 'pivotal' ),
                    'default'  => '3',
                ),

                array(
                    'id'       => 'wc_cart_icon',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Cart Icon Show At Menu Area', 'pivotal' ),
                    'on'       => esc_html__( 'Enabled', 'pivotal' ),
                    'off'      => esc_html__( 'Disabled', 'pivotal' ),
                    'default'  => false,
                ),

                array(
                    'id'       => 'wc_wishlist_icon',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Show Wishlist Icon', 'pivotal' ),
                    'on'       => esc_html__( 'Enabled', 'pivotal' ),
                    'off'      => esc_html__( 'Disabled', 'pivotal' ),
                    'default'  => false,
                ),
                array(
                    'id'       => 'wc_quickview_icon',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Product Quickview Icon', 'pivotal' ),
                    'on'       => esc_html__( 'Enabled', 'pivotal' ),
                    'off'      => esc_html__( 'Disabled', 'pivotal' ),
                    'default'  => false,
                ),

                array(
                'id'       => 'disable-sidebar',
                'type'     => 'switch', 
                'title'    => esc_html__('Sidebar Disable For Single Product Page', 'pivotal'),                
                'default'  => true,
                ), 
               
            )
        ) 
    );
}   

   
    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Footer Option', 'pivotal' ),
    'desc'   => esc_html__( 'Footer style here', 'pivotal' ),
    'icon'   => 'el el-th-large',    
    'fields' => array(
                array(
                        'id'       => 'footer_bg_image', 
                        'url'      => true,     
                        'title'    => esc_html__( 'Footer Background Image', 'pivotal' ),                 
                        'type'     => 'media',                                  
                ),

                array(
                        'id'        => 'footer_bg_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Footer Bg Color','pivotal'),
                        'subtitle'  => esc_html__('Pick color.', 'pivotal'),
                        'default'   => '#f1f6fd',
                        'validate'  => 'color',                        
                    ),  

                 array(
                    'id'               => 'header_grid2',
                    'type'             => 'select',
                    'title'            => esc_html__('Footer Area Width', 'pivotal'), 
                                  
                    'options'          => array(                            
                    
                        'container' => esc_html__('Container', 'pivotal'),
                        'full'      => esc_html__('Container Fluid', 'pivotal')
                    ),

                    'default'          => 'container',            
                ),

                array(
                        'id'       => 'footer_logo',
                        'type'     => 'media',
                        'title'    => esc_html__( 'Footer Logo', 'pivotal' ),
                        'subtitle' => esc_html__( 'Upload your footer logo', 'pivotal' ),                  
                    ), 

                array(
                        'id'       => 'footer_dark_logo',
                        'type'     => 'media',
                        'title'    => esc_html__( 'Footer Dark Logo', 'pivotal' ),
                        'subtitle' => esc_html__( 'Upload your footer dark logo', 'pivotal' ),                  
                    ),  
                array(
                    'id'       => 'footer-logo-height',                               
                    'title'    => esc_html__( 'Logo Height', 'pivotal' ),
                    'subtitle' => esc_html__( 'Logo max height example(50px)', 'pivotal' ),
                    'type'     => 'text',
                    'default'  => '40px'                    
                ),
                array(
                        'id'        => 'foot_social_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Social Icon Color','pivotal'),
                        'subtitle'  => esc_html__('Pick color.', 'pivotal'),
                        'default'   => '#ff7c3f',
                        'validate'  => 'color',                        
                    ),                   

                array(
                        'id'        => 'foot_social_hover',
                        'type'      => 'color',
                        'title'     => esc_html__('Social Icon Hover Color','pivotal'),
                        'subtitle'  => esc_html__('Pick color.', 'pivotal'),
                        'default'   => '#333',
                        'validate'  => 'color',                        
                    ), 
                array(
                        'id'        => 'footer_title_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Footer Title Color','pivotal'),
                        'subtitle'  => esc_html__('Pick color.', 'pivotal'),
                        'default'   => '#333',
                        'validate'  => 'color',                        
                    ),  

                array(
                        'id'        => 'footer_h3_size',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Footer Title Font Size','pivotal'),
                        'subtitle'  => esc_html__('Font Size', 'pivotal'),    
                        'default'   => '20px',                                            
                    ),    

                array(
                        'id'        => 'footer_text_size',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Footer Font Size','pivotal'),
                        'subtitle'  => esc_html__('Font Size', 'pivotal'),    
                        'default'   => '16px',                                            
                    ),  
                 

                array(
                        'id'        => 'footer_link_size',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Footer Link Font Size','pivotal'),
                        'subtitle'  => esc_html__('Font Size', 'pivotal'),    
                        'default'   => '15px',                                            
                    ),  

                array(
                        'id'        => 'footer_text_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Footer Text Color','pivotal'),
                        'subtitle'  => esc_html__('Pick color.', 'pivotal'),
                        'default'   => '#666666',
                        'validate'  => 'color',                        
                    ),  

                array(
                        'id'        => 'footer_link_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Footer Link Hover Color','pivotal'),
                        'subtitle'  => esc_html__('Pick color.', 'pivotal'),
                        'default'   => '#ff7c3f',
                        'validate'  => 'color',                        
                    ),         
  
                
                array(
                    'id'       => 'copyright',
                    'type'     => 'textarea',
                    'title'    => esc_html__( 'Footer CopyRight', 'pivotal' ),
                    'subtitle' => esc_html__( 'Change your footer copyright text ?', 'pivotal' ),
                    'default'  => esc_html__( '2020 All Rights Reserved', 'pivotal' ),
                ),  

                array(
                    'id'       => 'copyright_bg',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Copyright Background', 'pivotal' ),
                    'subtitle' => esc_html__( 'Copyright Background Color', 'pivotal' ),      
                    'default'  => '',            
                ),
                array(
                    'id'       => 'copyright_borders',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Copyright Border Color', 'pivotal' ),
                    'subtitle' => esc_html__( 'Copyright Border Color', 'pivotal' ),      
                    'default'  => '',            
                ),
                array(
                    'id'       => 'copyright_text_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Copyright Text Color', 'pivotal' ),
                    'subtitle' => esc_html__( 'Copyright Text Color', 'pivotal' ),      
                    'default'  => '#333333',            
                ), 
            ) 
        ) 
    ); 

    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Coming Soon Page', 'pivotal' ),
    'desc'   => esc_html__( 'You can set coming soon/maintenance mode here', 'pivotal' ),
    'icon'   => 'el el-error-alt',    
    'fields' => array(

                array(
                    'id'       => 'show-comingsoon',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Enable Coming Soon', 'pivotal'),
                    'subtitle' => esc_html__('You can enable/disable coming soon', 'pivotal'),
                    'default'  => false,
                ),

                array(
                    'id'       => 'coming_logo',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Upload Coming Soon Logo', 'pivotal' ),
                    'subtitle' => esc_html__( 'Upload your image', 'pivotal' ),
                    'url'=> true                
                ), 

                array(
                    'id'       => 'coming_title',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Title', 'pivotal' ),
                    'subtitle' => esc_html__( 'Enter title for coming soon page', 'pivotal' ), 
                    'default'  => esc_html__('Coming Soon', 'pivotal')                
                ),  
                
                array(
                    'id'       => 'coming_text',
                    'type'     => 'textarea',
                    'title'    => esc_html__( 'Text', 'pivotal' ),
                    'subtitle' => esc_html__( 'Enter text coming soon page', 'pivotal' ),  
                    'default'  => esc_html__('Our Exciting Website Is Coming Soon! Check Back Later
', 'pivotal')             
                ),                         
                
                array(
                    'id'            => 'opt-date-time',
                    'type'          => 'text',
                    'title'         => esc_html__('Date/Time', 'pivotal'),
                    'subtitle'      => esc_html__('Add Date/Time ex(Y-m-d  H:m:s)','pivotal'), 
                    'default'  =>   esc_html__('2020-10-22 17:40:12','pivotal'),                          
                ),
                array(
                    'id'       => 'coming_day',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Day Text', 'pivotal' ),                  
                    'default'  => esc_html__('Days', 'pivotal')                
                ),

              
                array(
                    'id'       => 'coming_hour',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Hour Text', 'pivotal' ),                  
                    'default'  => esc_html__('Hours', 'pivotal')                
                ), 

                array(
                    'id'       => 'coming_min',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Minute Text', 'pivotal' ),                  
                    'default'  => esc_html__('Minutes', 'pivotal')                
                ),

               

                array(
                    'id'       => 'coming_sec',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Second Text', 'pivotal' ),                  
                    'default'  => esc_html__('Seconds', 'pivotal')                
                ),

               
              
                array(
                    'id'       => 'coming_bg',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Upload Page Background', 'pivotal' ),
                    'subtitle' => esc_html__( 'Upload your image', 'pivotal' ),
                    'url'=> true                
                ), 

                 array(
                    'id'       => 'fllow_title',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Social Title', 'pivotal' ),
                    'subtitle' => esc_html__( 'Enter title', 'pivotal' ), 
                    'default'  => esc_html__('Follow us', 'pivotal')                
                ), 

                array(
                    'id'        => 'text_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Text Color','pivotal'),
                    'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                    'default'   => '#fff',                        
                    'validate'  => 'color',                        
                ),

                array(
                    'id'        => 'circle_border_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Countdown Circle Border Color','pivotal'),
                    'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                    'default'   => '#fff',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'circle_primary_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Countdown Circle Bg Color','pivotal'),
                    'subtitle'  => esc_html__('Pick color', 'pivotal'),    
                    'default'   => '#f26723',                        
                    'validate'  => 'color',                        
                ),       
                                  
            ) 
        ) 
    ); 

    
    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( '404 Error Page', 'pivotal' ),
    'desc'   => esc_html__( '404 details  here', 'pivotal' ),
    'icon'   => 'el el-error-alt',
    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
    'fields' => array(

                array(
                    'id'       => 'title_404',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Title', 'pivotal' ),
                    'subtitle' => esc_html__( 'Enter title for 404 page', 'pivotal' ), 
                    'default'  => esc_html__('404', 'pivotal')                
                ),  
                
                array(
                    'id'       => 'text_404',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Text', 'pivotal' ),
                    'subtitle' => esc_html__( 'Enter text for 404 page', 'pivotal' ),  
                    'default'  => esc_html__('Page Not Found', 'pivotal')             
                ),                      
                
                array(
                    'id'       => 'back_home',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Back to Home Button Label', 'pivotal' ),
                    'subtitle' => esc_html__( 'Enter label for "Back to Home" button', 'pivotal' ),
                    'default'  => esc_html__('Back to Homepage', 'pivotal')   
                                
                ),  

                array(
                    'id'       => 'error_bg',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Upload 404 Page Bg', 'pivotal' ),
                    'subtitle' => esc_html__( 'Upload your image', 'pivotal' ),
                    'url'=> true                
                ),  
            
                                  
            ) 
        ) 
    ); 


    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";         
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri()() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'pivotal' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'pivotal' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {     

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_action( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }