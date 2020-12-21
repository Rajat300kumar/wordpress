<div class="rs-breadcrumbs  porfolio-details">  
  <?php 
    global $pivotal_option;
    if(!empty($pivotal_option['blog_banner_main']['url'])) { ?>
    <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url($pivotal_option['blog_banner_main']['url']);?>')">
    <?php } else { ?>
        <div class="breadcrumbs-single">
    <?php } ?>
      <div class="rs-breadcrumbs-inner">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="breadcrumbs-inner">
              <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'pivotal' ), '<span>' . get_search_query() . '</span>' ); ?></h1>            
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
</div>