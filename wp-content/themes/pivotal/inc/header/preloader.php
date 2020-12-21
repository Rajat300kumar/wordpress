<?php 

global $pivotal_option;
$preloader_img = "";

if(!empty($pivotal_option['show_preloader']))
  {
    $loading = $pivotal_option['show_preloader'];
    if(!empty($pivotal_option['preloader_img'])){
      $preloader_img = $pivotal_option['preloader_img'];
    }
    if($loading == 1){
      if(empty($preloader_img['url'])):
      ?>  
      <!-- Preloader area start here -->
      <div id="pivotal-load">
          <div class="loader-new" id="loader-1"></div>
      </div>
      <!--End preloader here -->
        
      <?php else: ?>
            <div id="pivotal-load">
                <img src="<?php echo esc_url($preloader_img['url']);?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
            </div>
      <?php endif; ?>
  <?php }
}?>

<?php if(!empty($pivotal_option['off_sticky'])):   
    $sticky = $pivotal_option['off_sticky'];         
    if($sticky == 1):
     $sticky_menu ='menu-sticky';        
    endif;
   else:
   $sticky_menu ='';
endif;

if( is_page() ){
 $post_meta_header = get_post_meta($post->ID, 'trans_header', true);  

     if($post_meta_header == 'Default Header'){       
        $header_style = 'default_header';             
     }
     else{
        $header_style = 'transparent_header';
    }
 }
 else{
    $header_style = 'transparent_header';
 }

 ?>   