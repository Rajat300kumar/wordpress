<?php
    global $pivotal_option; 
    $header_grid2 = "";
    
    $header_width_meta = get_post_meta(get_queried_object_id(), 'header_width_custom2', true);
    $footer_type       = get_post_meta(get_queried_object_id(), 'footer_select', true);
    
    if ($header_width_meta != ''){
        $header_width = ( $header_width_meta == 'full' ) ? 'container-fluid': 'container';
    }else{
        $header_width = $pivotal_option['header_grid2'];
        $header_width = ( $header_width == 'full' ) ? 'container-fluid': 'container';
    }

    $footer_logo_size = !empty($pivotal_option['footer-logo-height']) ? 'style="height: '.$pivotal_option['footer-logo-height'].'"' : '';
?>

<?php if ( class_exists( 'ReduxFramework' ) ) {?>
<div class="footer-logo-box">
  <div class="container">
              <?php              
                if($footer_type == 'footerdark'){
                    if(!empty($pivotal_option['footer_dark_logo']['url'])) { ?>
                    <div class="footer-logo-wrap">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-top-logo dfdf">
                        <img <?php echo wp_kses($footer_logo_size, 'povital');?> src="<?php  echo esc_url($pivotal_option['footer_dark_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                        </a>
                    </div>
            <?php }} ?>

            <?php if($footer_type != 'footerdark'){
                if(!empty($pivotal_option['footer_logo']['url'])) { ?>
                    <div class="footer-logo-wrap">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-top-logo ghhg">
                            <img <?php echo wp_kses($footer_logo_size, 'povital');?> src="<?php  echo esc_url($pivotal_option['footer_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                        </a>
                    </div>
            <?php }} ?>       
        <?php dynamic_sidebar('footer_top');?>   
  </div>
</div>
<?php } ?>