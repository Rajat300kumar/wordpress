<?php
get_header(); ?>
<div id="rs-blog" class="rs-blog blog-page">
   <?php
    //checking blog layout form option  
    $col='';
    $blog_layout=''; 
    $column=''; 
    $blog_grid='';

    if(!empty($pivotal_option['blog-layout']) || !is_active_sidebar( 'sidebar-1' )){
        $blog_layout=($pivotal_option['blog-layout']);
        $blog_grid = $pivotal_option['blog-grid'];
        $blog_grid = !empty($blog_grid) ? $blog_grid : '12';
        if($blog_layout == 'full' || !is_active_sidebar( 'sidebar-1' )){
            $layout ='full-layout';
            $col = '-full';
            $column = 'sidebar-none';  
        }          
        elseif($blog_layout == '2left'){
            $layout = 'full-layout-left';  
        }    
        elseif($blog_layout == '2right'){
            $layout = 'full-layout-right'; 
        } 
        else{
            $col = '';
            $blog_layout = ''; 
        }
    }
    else{
        $col         ='';
        $blog_layout =''; 
        $layout      ='';
        $blog_grid   ='12';
    }
    ?>
   <div class="container">
        <div id="content">
            <div class="row padding-<?php echo esc_attr( $layout) ?>">       
                <div class="col-md-12 col-lg-8<?php echo esc_attr($col); ?> <?php echo esc_attr($layout); ?>"> 
                   
                    <div class="row">            
                        <?php
                        if ( have_posts() ) :           
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                            $post_id = get_the_id();
                        ?>
                        <?php 
                        $no_thumb = "";
                          if ( !has_post_thumbnail() ) {
                            $no_thumb = "no-thumbs";
                          }
                        ?>
                        <div class="col-sm-<?php echo esc_attr($blog_grid);?> col-xs-12">
                            <article <?php post_class();?>>
                                <div class="blog-item <?php echo esc_attr($no_thumb); ?>">                                       
                                 <?php if ( has_post_thumbnail() ) {?>
                                    <div class="blog-img">
                                       <a href="<?php the_permalink();?>">
                                        <?php
                                          the_post_thumbnail();
                                        ?>
                                      </a>                                     
                                    </div><!-- .blog-img -->                                    
                                <?php }                           
                                    
                                ?>                                                     

                                  <div class="full-blog-content">
                                        <div class="title-wrap">              
                                          
                                            <div class="blog-meta">
                                                <ul class="btm-cate">
                                                <?php
                                                if (!empty($pivotal_option['blog-date'])):
                                                    if ($pivotal_option['blog-date'] == 1): ?>
                                                      <li>
                                                        <div class="blog-date">
                                                          <i class="fa fa-calendar-check-o"></i> <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                                                        </div>                                              
                                                      </li>                                                   
                                                <?php endif;
                                                else:
                                                    if ($pivotal_option['blog-date'] == "0"):
                                                        else: ?>
                                                            <li>
                                                                <div class="blog-date">
                                                                    <i class="fa fa-calendar-check-o"></i> <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                                                                </div>                                              
                                                            </li>
                                                    <?php endif; 
                                                endif; ?>
                                              

                                                 <?php if(!empty($pivotal_option['blog-author-post'])){
                                                 if ($pivotal_option['blog-author-post'] == 'show'): ?>
                                                  <li>
                                                      <div class="author">
                                                        <i class="fa fa-user-o"></i> <?php echo get_the_author(); ?>
                                                      </div>
                                                  </li>
                                                  <?php endif; }
                                                  else{ ?>
                                                    <li>
                                                      <div class="author">
                                                        <i class="fa fa-user-o"></i> <?php echo get_the_author(); ?>
                                                      </div>
                                                  </li>
                                                 <?php }; 

                                                 if(get_the_category()): ?>                                                                 
                                                  <?php
                                                      //tag add
                                                      $seperator       = ', '; // blank instead of comma
                                                      $after           = '';
                                                      $before          = '';
                                                      echo '<li class ="tag-line without-option-cat">';
                                                      echo '<i class   ="fa fa-folder-o"></i>';
                                                      the_category(', '); 
                                                      echo '</li>';
                                                    ?>                                      
                                              <?php
                                            endif; ?>
                                              </ul>                                                         
                                            </div>
                                          <h3 class="blog-title">
                                              <a href="<?php the_permalink();?>">
                                                  <?php the_title();?>
                                              </a>
                                          </h3>
                                      </div>

                                        <div class="blog-desc">   
                                            <?php echo pivotal_custom_excerpt(26);?>                                     
                                        </div>

                                        <?php 
                                            $no_view = "";
                                            if ($pivotal_option['view-comments'] == 'hide'){
                                                $no_view = "left-btn";
                                            }
                                            if(!empty($pivotal_option['blog_readmore'])):?>
                                                <div class="blog-button <?php echo esc_attr($no_view); ?>">
                                                    <a href="<?php the_permalink();?>">
                                                        <?php echo esc_html($pivotal_option['blog_readmore']); ?>
                                                    </a>
                                                </div>
                                        <?php endif; ?>

                                      <?php if(empty($pivotal_option['blog_readmore'])):?>
                                          <div class="blog-button <?php echo esc_attr($no_view); ?>">
                                            <a href="<?php the_permalink();?>"><?php esc_html_e('Read More', 'pivotal');?></a>
                                          </div>
                                      <?php endif; ?>

                                </div>
                              </div>
                            </article>
                        </div>
                        
                        <?php  
                        endwhile; 
                           wp_reset_query();
                        ?>
                    </div>
                    <div class="pagination-area">
                        <?php
                            the_posts_pagination();
                        ?>
                    </div>
                    <?php
                    else :
                    get_template_part( 'template-parts/content', 'none' );
                    endif; ?> 
                </div>
            <?php if( $layout != 'full-layout' ):     
               get_sidebar();    
             endif;
            ?>
          </div>
        </div>
    </div>
</div>
<?php get_footer();