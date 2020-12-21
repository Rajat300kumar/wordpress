<?php
/**
 * main footer
 */
?>
     
</div><!-- .main-container -->
<?php
global $pivotal_option;

// Footer Options here
require get_parent_theme_file_path('inc/footer/footer-options.php');


if(!empty( $footer_bg_img)):?>
    <footer id="rs-footer" class="<?php echo esc_attr($footer_select);?> rs-footer footer-style-1" style="background-image: url('<?php echo esc_url($footer_bg_img); ?>'); background-position: <?php echo esc_attr($footer_bg_pos); ?>; <?php if (!empty($footer_bg)): ?> background-color: <?php echo esc_attr($footer_bg) ?> <?php endif; ?>">

<?php elseif(!empty( $footer_bg)):?>
    <footer id="rs-footer" class="<?php echo esc_attr($footer_select);?> rs-footer footer-style-1" style="background: <?php echo esc_attr($footer_bg);?>; background-position: <?php echo esc_attr($footer_bg_pos); ?>">

<?php elseif( !empty( $pivotal_option['footer_bg_image']['url'])):?>
    <footer id="rs-footer" class="<?php echo esc_attr($footer_select);?> rs-footer footer-style-1" style="background-image: url('<?php echo esc_url($pivotal_option['footer_bg_image']['url']);?>'); background-position: <?php echo esc_attr($footer_bg_pos); ?>">
    <?php else:?>
        <footer id="rs-footer" class="<?php echo esc_attr($footer_select);?> rs-footer footer-style-1" >
<?php 
endif; 
get_template_part( 'inc/footer/footer','top' );

?>


<div class="footer-bottom" <?php if(!empty( $copyright_bg)): ?> style="background: <?php echo esc_attr($copyright_bg); ?> !important;" <?php elseif(!empty( $copy_trans)): ?> style="background: <?php echo esc_attr($copy_trans); ?> !important;" <?php endif; ?>>
    <div class="container">
        <div class="copyright text-center" <?php if(!empty( $copy_space)): ?> style="padding: <?php echo esc_attr($copy_space); ?>" <?php endif; ?> >
            <?php if(!empty($pivotal_option['copyright'])){?>
            <p><?php echo wp_kses($pivotal_option['copyright'],'povital'); ?></p>
            <?php }
                else{
                ?>
            <p><?php echo esc_html('&copy;')?> <?php echo date("Y");?>. <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> 
            </p>
            <?php
                }   
            ?>
        </div>
    </div>
</div>
</footer>
</div><!-- #page -->
<?php 
if(!empty($pivotal_option['show_top_bottom'])){
?>
    <div id="scrollUp" class="<?php echo esc_attr($pivotal_option['show_top_position_select']); ?>">
        <i class="fa fa-angle-up"></i>
    </div>   
<?php } ?>   

<?php wp_footer(); ?>

  </body>
</html>