
<?php
    global $pivotal_option; 
?>

<?php 
  $post_meta_data = get_post_meta(get_the_ID(), 'banner_image', true);
  $post_menu_type = get_post_meta(get_the_ID(), 'menu-type', true);
  $content_title  = get_post_meta(get_the_ID(), 'content_title', true); 
  $content_banner = get_post_meta(get_the_ID(), 'content_banner', true); 

  if($post_meta_data == ''){
    if(!empty($pivotal_option['page_banner_main']['url'])):
      $post_meta_data = $pivotal_option['page_banner_main']['url'];
    endif;
  } 

  $banner_hide = get_post_meta(get_the_ID(), 'banner_hide', true);
  if( 'show' == $banner_hide ||  $banner_hide == '' ){  
    $post_meta_data = $post_meta_data;
  }else{
    $post_meta_data = '';
  }
?>
<?php if($post_meta_data !=''){   
?>
<div class="rs-breadcrumbs">
    <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url($post_meta_data); ?>')">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">
                <?php 
                    $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);
                    if( $post_meta_title != 'hide' ){  ?>
                        <h1 class="page-title">
                            <?php if( $content_title !='' ){
                                echo esc_html( $content_title );
                            }else {
                                the_title();
                            }
                            ?>
                        </h1> 
                    <?php } 
                    if(!empty($content_banner)) : 
                        echo '<p class="content_banner">'.wp_kses($content_banner, 'povital').'</p>';
                    endif;
                    if(!empty($pivotal_option['off_breadcrumb'])){
                        $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
                        if($rs_breadcrumbs != 'hide'):        
                        if(function_exists('bcn_display')){?>
                            <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                        <?php } 
                        endif;
                    }
             
                    if (!empty( $pivotal_option['page_banner_image']['url'] ) ) {?>
                        <div class="page-banner-image">
                          <img  class="wow fadeInRight" data-wow-delay="300ms" data-wow-duration="2000ms" src="<?php echo esc_url( $pivotal_option['page_banner_image']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </div>
                    <?php } 
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<?php }
else{   
$post_meta_bread = get_post_meta(get_the_ID(), 'select-bread', true);?>
<?php if($post_meta_bread =='show' || $post_meta_bread ==''){?>
<div class="rs-breadcrumbs  porfolio-details">
  <div class="rs-breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumbs-inner">
            <?php 
                $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);?>
                <?php if($post_meta_title != 'hide'){             
            ?>
                <h1 class="page-title">
                    <?php if($content_title !=''){
                        echo esc_html($content_title);
                    } else {
                        the_title();
                    }
                ?>
                </h1>
            <?php } 
            if(!empty($content_banner)) : 
                echo '<p class="content_banner">'.wp_kses($content_banner, 'povital').'</p>';
             endif;
            if(!empty($pivotal_option['off_breadcrumb'])){             
              if(function_exists('bcn_display')){?>
                <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
              <?php } 
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  }
  else{
    $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);?>
    <?php if($post_meta_title == 'hide'){
    }
    else{
      ?>
    <div class="container inner-page-title">
        <h1>
          <?php the_title();?>
        </h1>
    </div>
    <?php } 
        }
    }
?>