<?php 

global $pivotal_option;
$post_meta_header   = '';
$header_style       = '';
$logo_height        = !empty($pivotal_option['logo-height']) ? 'style = "max-height: '.$pivotal_option['logo-height'].'"' : '';
$sticky_logo_height =!empty($pivotal_option['sticky_logo_height']) ? 'style = "max-height: '.$pivotal_option['sticky_logo_height'].'"' : '';

if(!empty($pivotal_option['header_layout'])){ 
  $header_style = $pivotal_option['header_layout'];
} 

if ( class_exists( 'WooCommerce' ) && is_shop() || class_exists( 'WooCommerce' ) && is_product_tag()  || class_exists( 'WooCommerce' ) && is_product_category()  ) {
    $pivotal_shop_id = get_option( 'woocommerce_shop_page_id' ); 
    $post_meta_header = get_post_meta($pivotal_shop_id, 'select-logo', true); 
} elseif (is_home() && !is_front_page() || is_home() && is_front_page()){

        $post_meta_header = get_post_meta(get_queried_object_id(), 'select-logo', true); 
} else {
    $post_meta_header = get_post_meta(get_queried_object_id(), 'select-logo', true); 
} 

if($post_meta_header == 'dark' || $post_meta_header == ''){ ?>
<div class="logo-area">  
 <?php
       if (!empty( $pivotal_option['logo']['url'] ) ) { ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses($logo_height, 'povital');?> src="<?php echo esc_url( $pivotal_option['logo']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
    <?php } else{?>
      <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>       

       <?php  } ?>
  </div>
<?php 

}

elseif( $post_meta_header == 'light' ) {?>
  <div class="logo-area">

     <?php

       if (!empty( $pivotal_option['logo_light']['url'] ) ) { ?>

      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses($logo_height, 'povital');?> src="<?php echo esc_url( $pivotal_option['logo_light']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
    <?php } else{?>

        <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>   
       <?php  }    

    ?>

  </div>
  
<?php }else{
  ?>
    <div class="logo-area">
      <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>  
   </div>
  <?php
}

 if (!empty( $pivotal_option['rswplogo_sticky']['url'] ) ) { ?>

    <div class="logo-area sticky-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses($sticky_logo_height,'povital');?> src="<?php echo esc_url( $pivotal_option['rswplogo_sticky']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
    </div>
    <?php } 

    else{?>
    <div class="logo-area sticky-logo">
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    </div>

<?php }



