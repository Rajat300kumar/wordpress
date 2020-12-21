<!-- Portfolio Detail Start -->
<div class="container">
    <div id="content">
    <!-- Portfolio Detail Start -->
    <div class="rs-porfolio-details project-gallery">
 
        <?php while ( have_posts() ) : the_post();
            $post_client        = get_post_meta( get_the_ID(), 'client', true );
            $post_location      = get_post_meta( get_the_ID(), 'location', true );
            $post_surface_area  = get_post_meta( get_the_ID(), 'surface_area', true );
            $post_date          = get_post_meta( get_the_ID(), 'date', true );
            $post_project_value = get_post_meta( get_the_ID(), 'project_value', true );
            $post_created       = get_post_meta( get_the_ID(), 'created', true );
        ?>
           
        <div class="row">
            <div class="col-lg-8">
                <div class="project-desc">       
                   <?php  the_content(); ?>
                </div>                
            </div>
            <div class="col-lg-4">            

              <?php if($post_created || $post_date || $post_client || $post_location || $post_surface_area || $post_project_value){ ?>
                <div class="ps-informations">
                    <h3 class="info-title"><?php esc_html_e('Project Details','pivotal');                  
                    ?></h3>                    
                    <ul>
                      <li>
                        <span><?php esc_html_e('Category:', 'pivotal');?></span>
                        <?php 
                            if ( is_singular('portfolios') ) {
                                $terms = get_the_terms($post->ID, 'portfolio-category');
                                foreach ($terms as $term) {
                                    $term_link = get_term_link($term, 'portfolio-category');
                                    if (is_wp_error($term_link))
                                        continue;
                                    echo esc_html($term->name) ;
                                }
                            }
                        ?>
                      </li>
                      <?php if($post_client){?>
                      <li><span><?php esc_html_e('Client:','pivotal');?>  </span><?php   echo esc_html($post_client); ?></li>
                      <?php }?>

                      <?php if($post_location){?>
                      <li><span><?php esc_html_e('Location:','pivotal');?> </span><?php echo esc_html($post_location); ?></li>
                      <?php }?>

                      <?php if($post_project_value){?>
                      <li><span><?php esc_html_e('Budget:','pivotal');?>  </span><?php  echo esc_html($post_project_value); ?></li>
                      <?php }?>

                      <?php if($post_date){?>
                      <li><span><?php esc_html_e('Completed:','pivotal');?>  </span><?php   echo esc_html($post_date); ?></li>
                      <?php }?>                     
                      

                      <?php if($post_created){?>
                      <li><span><?php esc_html_e('Project URL:','pivotal');?> </span><?php echo esc_html($post_created); ?></li>
                      <?php }?>

                    </ul>

                  
                </div>

                <?php } ?>

                  <div class="information-sidebar-project">
                      <?php dynamic_sidebar('project-1'); ?>
                  </div> 
                               
            </div>
        </div>

      <?php endwhile; ?> 
            
      <!-- .ps-navigation -->      
      </div>
    </div>
</div>
<!-- Portfolio Detail End -->