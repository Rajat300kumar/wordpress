<?php

/*
Header Style 1
*/

global $pivotal_option;
$sticky = $pivotal_option['off_sticky']; 
$sticky_menu = ($sticky == 1) ? ' menu-sticky' : '';

// Header Options here
require get_parent_theme_file_path('inc/header/header-options.php');

if(!empty($pivotal_option['off_canvas']) || ($rs_offcanvas == 'show') ): ?>
    <?php 
        //off convas here
        get_template_part('inc/header/off-canvas');
    ?> 
<?php endif; ?>

<!-- Mobile Menu Start -->
  <div class="responsive-menus"><?php require get_parent_theme_file_path('inc/header/responsive-menu.php');?></div>
<!-- Mobile Menu End -->

<header id="rs-header" class="single-header header-style1 mainsmenu<?php echo esc_attr($main_menu_hides);?>">
    <?php 
      //include sticky search here
      get_template_part('inc/header/search');
    ?>
    <div class="header-inner <?php echo esc_attr($sticky_menu);?>">
        <!-- Toolbar Start -->
        <?php       
           get_template_part('inc/header/top-head/top-head','two');
        ?>
        <!-- Toolbar End -->
        
        <!-- Header Menu Start -->
        <?php
          $menu_bg_color           = !empty($menu_bg) ? 'style=background:'.$menu_bg.'' : '';
          $container_right_padding = ($rs_offcanvas == 'hide' || empty($pivotal_option['off_canvas'])  ) ? 'container_right_padding' : '';
        ?>
        <div class="menu-area menu_type_<?php echo esc_attr($main_menu_type);?>" <?php echo wp_kses($menu_bg_color, 'povital');?>>
            <div class="<?php echo esc_attr($header_width);?> <?php echo esc_attr($container_right_padding);?>">
                <div class="row-table">
                    <div class="col-cell header-logo">
                    <?php get_template_part('inc/header/logo');  ?>
                    </div>
                    <div class="col-cell menu-responsive">  
                        <?php               
                        if(is_page_template('page-single.php')){
                            require get_parent_theme_file_path('inc/header/menu-single.php'); 
                        }else{
                            require get_parent_theme_file_path('inc/header/menu.php'); 
                        }               
                        ?>               
                    </div>

                    <div class="col-cell">  
                        <?php 
                        $offborder ="";
                        if(!empty($pivotal_option['off_canvas']) && !empty($pivotal_option['off_search'])):
                             $offborder="off-border-left"; 
                        endif;                     
                        
                        
                        //include Cart here
                        if(!empty($pivotal_option['wc_cart_icon']) || ($rs_show_cart == 'show') ){ ?>
                            <?php  get_template_part('inc/header/cart'); ?>
                        <?php }

                        if(!empty($pivotal_option['off_search']) || ($rs_top_search == 'show') ){ ?>
                          <div class="sidebarmenu-search text-right">
                              <div class="sidebarmenu-search">
                                  <div class="sticky_search"> 
                                    <i class="flaticon-search"></i> 
                                  </div>
                              </div>
                          </div>                        
                        <?php
                        }

                        if($rs_offcanvas != 'hide'):
                          if(!empty($pivotal_option['off_canvas']) || ($rs_offcanvas == 'show') ): ?>
                          <div class="sidebarmenu-area text-right default-sidebarmenu">
                            <?php if(!empty($pivotal_option['off_canvas']) || ($rs_offcanvas == 'show') ){
                                    $off = $pivotal_option['off_canvas'];
                                    if( ($off == 1) || ($rs_offcanvas == 'show') ){
                               ?>
                                <ul class="offcanvas-icon">
                                  <li class="nav-link-container"> 
                                    <a href='#' class="nav-menu-link menu-button" id="open-button2">
                                      <span class="hamburger1"></span>
                                      <span class="hamburger2"></span>
                                      <span class="hamburger3"></span>
                                    </a> 
                                  </li>
                                </ul>
                                <?php } 
                            }?> 
                          </div>
                        <?php endif; endif; ?>

                        <div class="sidebarmenu-area text-right mobilehum">                                    
                            <ul class="offcanvas-icon">
                              <li class="nav-link-container"> 
                                <a href='#' class="nav-menu-link menu-button">
                                  <span class="hamburger1"></span>
                                  <span class="hamburger2"></span>
                                  <span class="hamburger3"></span>
                                </a> 
                              </li>
                            </ul>                                       
                        </div> 
                        <?php
                        if(!empty($pivotal_option['off_canvas']) || !empty($pivotal_option['off_search'])):
                          $menu_right='nav-right-bar';
                        else:
                          $menu_right=''; 
                        endif;                                         
                                      
                        ?>               
                    </div>
                </div>
            </div> 
        </div>
        <!-- Header Menu End -->
    </div>
     <!-- End Slider area  -->
   <?php 
    get_template_part( 'inc/breadcrumbs' );
  ?>
</header>

<?php  
    get_template_part('inc/header/slider/slider');
?>
