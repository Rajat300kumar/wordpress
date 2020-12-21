
 <!DOCTYPE html>
<html lang="en-US">
<?php
wp_head();  
global $pivotal_option;
$error_bg = !empty($pivotal_option['error_bg']) ? 'style="background:url('.$pivotal_option['error_bg']['url'].')"': '';
?>

<div class="page-error <?php if($pivotal_option){
    echo 'not-found-bg';
}?>" <?php echo wp_kses( $error_bg, 'povital' ); ?>>
    <div class="container">
        <div id="content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">    
                    <section class="error-404 not-found">    
                        <div class="page-content">
                            <h3>
                                <span>                                    
                                    <?php
                                        if(!empty($pivotal_option['title_404'])){
                                            echo wp_kses($pivotal_option['title_404'], 'povital');
                                        }
                                        else{
                                            echo esc_html__( '404', 'pivotal' ); 
                                        }
                                    ?>
                                </span>                      
                                <?php

                                 if(!empty($pivotal_option['text_404'])){
                                      echo wp_kses($pivotal_option['text_404'], 'povital');
                                 }
                                 else{
                                  echo esc_html__( 'Page Not Found', 'pivotal' ); }
                                 ?>
                            </h3>
                            <a href="<?php echo esc_url( home_url('/') ); ?>">
                                <?php
                                 if(!empty($pivotal_option['back_home'])){
                                     echo esc_html($pivotal_option['back_home']);
                                 }
                                 else{
                                     esc_html_e('Or back to home page', 'pivotal'); 
                                  }
                                ?>
                            </a>
                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->    
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>   
</div> <!-- .page-error -->
<?php
wp_footer();?>
</html>
