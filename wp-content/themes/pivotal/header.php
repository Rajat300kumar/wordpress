<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="//gmpg.org/xfn/11">
<?php global $pivotal_option; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open();
    global $pivotal_option;
    require get_parent_theme_file_path('inc/header/header-options.php');

    if(!empty( $pivotal_option['show-comingsoon']) && !is_user_logged_in()){
        get_template_part( 'coming-soon' );
        die();
    }
    if(!empty($pivotal_option['off_canvas']) || (!empty($pivotal_option['off_canvas_header3'])) || ($rs_offcanvas == 'show') ): ?>
        <div class="offwrap">
            <div class="offwrapcon"></div>
        </div>
    <?php endif; ?>
    <?php 
        global $pivotal_option;    
        require get_parent_theme_file_path('inc/header/header-options.php'); ?>       
        <!--Preloader start here-->
        <?php get_template_part( 'inc/header/preloader' ); ?>
        <!--Preloader area end here-->
        <div id="page" class="site">
            <?php get_template_part('inc/header/header'); ?>     
            <!-- End Header Menu End -->
            <?php 
                $page_bg = get_post_meta(get_the_ID(), 'page_bg', true);
                if($page_bg !='' && is_page()): ?>
                    <div class="main-contain offcontents" style="background-image: url('<?php echo esc_url( $page_bg );?>'); ">
                <?php else: ?>
                    <div class="main-contain offcontents">                
            <?php endif; ?>