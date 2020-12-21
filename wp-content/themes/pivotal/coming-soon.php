 <!DOCTYPE html>
<html lang="en-US">
<?php
    /*Template Name: Coming Soon
    */
    wp_head();  
    global $pivotal_option;
    $page_bg    = !empty($pivotal_option['coming_bg']) ? 'style="background:url('.$pivotal_option['coming_bg']['url'].')"': '';

    $day_text   = !empty($pivotal_option['coming_day']) ? $pivotal_option['coming_day'] : 'Days';
    $hour_text  = !empty($pivotal_option['coming_min']) ? $pivotal_option['coming_hour'] : 'Minutes';
    $sec_text   = !empty($pivotal_option['coming_sec']) ? $pivotal_option['coming_sec'] : 'Seconds';
    $min_text   = !empty($pivotal_option['coming_hour']) ? $pivotal_option['coming_min'] : 'Hours';

    $text_color  = !empty($pivotal_option['text_color']) ? $pivotal_option['text_color'] : '#ffffff';
  

    $countdown_localize_data = array(
        'day_text'   => $day_text,
        'hour_text'  => $hour_text,
        'sec_text'   => $sec_text,
        'min_text'   => $min_text,
        'text_color'  => $text_color,        
    );
        
    wp_localize_script( 'pivotal-main', 'countdown_data', $countdown_localize_data );
 
?>
<div class="page-error coming-soon" <?php echo wp_kses( $page_bg, 'povital' ); ?>>
    <div class="container">
        <div id="content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">    
                    <section class="error-404 not-found">    
                        <div class="page-content">
                            <?php   if (!empty( $pivotal_option['coming_logo']['url'] ) ) { ?>
                                <div class="logo">
                                    <img src="<?php echo esc_url( $pivotal_option['coming_logo']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                </div>
                            <?php } ?>
                            <h3>
                                <span>                                    
                                    <?php
                                        if(!empty($pivotal_option['coming_title'])){
                                            echo wp_kses($pivotal_option['coming_title'], 'povital');
                                        }
                                        else{
                                            echo esc_html__( 'Coming Soon', 'pivotal' ); 
                                        }
                                    ?>
                                </span>                      
                                <?php

                                 if(!empty($pivotal_option['coming_text'])){
                                      echo wp_kses($pivotal_option['coming_text'], 'povital');
                                 }
                                 else{
                                  echo esc_html__( 'Our Exciting Website Is Coming Soon! Check Back Later', 'pivotal' ); }
                                 ?>
                            </h3>
                            <?php 
                                if(!empty($pivotal_option['opt-date-time'])) : 
                                $timeformat =  $pivotal_option['opt-date-time'];
                            ?>
                                <div class="countdown-inner">
                                     <div data-animation-in="slideInLeft" data-animation-out="animate-out fadeOut" class="CountDownTimer" data-date="<?php echo wp_kses($timeformat, 'povital');?>"></div>
                                </div>
                            <?php endif; ?>
                            <div class="follow-us-sbuscribe"> 
                                <div class="follow-us-main">
                                    <?php if (!empty($pivotal_option['fllow_title'])) : ?>
                                        <p class="follow-us">
                                            <?php echo esc_html($pivotal_option['fllow_title']) ?>                                            
                                        </p>        
                                    <?php endif;
                                        if(!empty($pivotal_option['show-social'])){ ?>
                                            <ul class="clearfix">
                                                <?php $top_social = $pivotal_option['show-social'];                                    
                                                    if($top_social == '1'){              
                                                    if(!empty($pivotal_option['facebook'])) { ?>
                                                        <li> <a href="<?php echo esc_url($pivotal_option['facebook']);?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                                        </li>
                                                <?php }
                                                    if(!empty($pivotal_option['twitter'])) { ?>
                                                     <li> <a href="<?php echo esc_url($pivotal_option['twitter']);?> " target="_blank"><i class="fa fa-twitter"></i></a> </li>
                                                <?php } 
                                                     if(!empty($pivotal_option['rss'])) { ?>
                                                     <li> <a href="<?php  echo esc_url($pivotal_option['rss']);?> " target="_blank"><i class="fa fa-rss"></i></a> </li>
                                                <?php } ?>
                                                <?php if (!empty($pivotal_option['pinterest'])) { ?>
                                                    <li> <a href="<?php  echo esc_url($pivotal_option['pinterest']);?> " target="_blank"><i class="fa fa-pinterest-p"></i></a> </li>
                                                <?php } ?>
                                                <?php if (!empty($pivotal_option['linkedin'])) { ?>
                                                    <li> <a href="<?php  echo esc_url($pivotal_option['linkedin']);?> " target="_blank"><i class="fa fa-linkedin"></i></a> </li>
                                                <?php } ?>
                                                <?php if (!empty($pivotal_option['google'])) { ?>
                                                <li> <a href="<?php  echo esc_url($pivotal_option['google']);?> " target="_blank"><i class="fa fa-google-plus-square"></i></a> </li>
                                                <?php } ?>
                                                <?php if (!empty($pivotal_option['instagram'])) { ?>
                                                <li> <a href="<?php  echo esc_url($pivotal_option['instagram']);?> " target="_blank"><i class="fa fa-instagram"></i></a> </li>
                                                <?php } ?>
                                                <?php if(!empty($pivotal_option['vimeo'])) { ?>
                                                <li> <a href="<?php  echo esc_url($pivotal_option['vimeo']);?> " target="_blank"><i class="fa fa-vimeo"></i></a> </li>
                                                <?php } ?>
                                                <?php if (!empty($pivotal_option['tumblr'])) { ?>
                                                <li> <a href="<?php  echo esc_url($pivotal_option['tumblr']);?> " target="_blank"><i class="fa fa-tumblr"></i></a> </li>
                                                <?php } ?>
                                                <?php if (!empty($pivotal_option['youtube'])) { ?>
                                                <li> <a href="<?php  echo esc_url($pivotal_option['youtube']);?> " target="_blank"><i class="fa fa-youtube"></i></a> </li>
                                                <?php } ?>
                                                    <?php if(is_active_sidebar('language-widget')){?>                                 
                                                        <?php dynamic_sidebar('language-widget');?>                             
                                                    <?php }?>
                                                <?php } ?>
                                            </ul>
                                        <?php }
                                    ?>
                                </div>                                    
                             
                            </div>
                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->    
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>   
</div> <!-- .page-error -->
<?php
wp_footer(); ?>
</html>
