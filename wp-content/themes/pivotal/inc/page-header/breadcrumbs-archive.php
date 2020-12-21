<?php
  global $pivotal_option;
  $header_trans = '';
    if(!empty($pivotal_option['header_layout'])){  
               
        $header_style = $pivotal_option['header_layout'];               
        if($header_style == 'style2'){       
            $header_trans = 'heads_trans';    
        }
    }

?>

<div class="rs-breadcrumbs  porfolio-details <?php echo esc_attr($header_trans);?>">
  <?php
  if(!empty($pivotal_option['blog_banner_main']['url'])) { ?>
  <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url($pivotal_option['blog_banner_main']['url']);?>')">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="breadcrumbs-inner">
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                ?>
              
                <?php 
                    if(!empty($pivotal_option['off_breadcrumb'])){
                    if(function_exists('bcn_display')){?>
                        <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                    <?php } 
                }
              
                if (!empty( $pivotal_option['page_banner_image']['url'] ) ) {?>
                    <div class="page-banner-image">
                      <img  src="<?php echo esc_url( $pivotal_option['page_banner_image']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                    </div>
                <?php } 
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php }
  else{   
  ?>
  <div class="rs-breadcrumbs-inner">  
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumbs-inner">
            <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
            ?>
            <?php 
                if(!empty($pivotal_option['off_breadcrumb'])){
                    if(function_exists('bcn_display')){?>
                        <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                    <?php }
                }
       
            if (!empty( $pivotal_option['page_banner_image']['url'] ) ) {?>
                <div class="page-banner-image">
                  <img  src="<?php echo esc_url( $pivotal_option['page_banner_image']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  }
?>  
</div>