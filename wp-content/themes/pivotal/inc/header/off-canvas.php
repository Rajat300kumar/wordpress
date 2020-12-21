<?php 
global $pivotal_option;
$rs_offcanvas = get_post_meta(get_the_ID(), 'show-off-canvas', true);
    //off convas here
    if(!empty( $pivotal_option['off_canvas'] ) || ($rs_offcanvas == 'show') ){
        $off = $pivotal_option['off_canvas'];
        if( ($off == 1) || ($rs_offcanvas == 'show')){
    ?>
    <nav class="menu-wrap-off nav-container nav">
        <ul class="sidenav offcanvas-icon">
           <li class="nav-link-container">  
            <a href='#' class="nav-menu-link close-button" id="close-button2">              
              <span class="hamburger1"></span>
              <span class="hamburger3"></span>
            </a> 
          </li>
          <?php dynamic_sidebar('sidebarcanvas-1');?>
          <li class="icon-list"><?php get_template_part( 'inc/header/offcanvas-content' ); ?></li>
        </ul>
    </nav>
    <?php }
}?>