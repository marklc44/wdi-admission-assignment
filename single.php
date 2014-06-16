    <?php get_header(); ?>

    <div class="container fullpage-content">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-9">

          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="page-header">
              <h1><?php the_title(); ?></h1>
              
              <p class="post-meta">
                By <?php the_author(); ?> 
                on <?php the_time('l, F jS, Y'); ?>
                in <?php the_category(', '); ?>. 
                <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
              </p>
            </div>
            <?php 
              $thumbnail_id = get_post_thumbnail_id();
              $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'thumbnail-size', true);
              $thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true);
            ?>
            <p class="featured-image">
              <img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $thumbnail_meta; ?>">
            </p>


            <?php the_content(); ?>

            <hr>
            <?php $rp_id = get_the_id(); ?>

            <div class="related-posts">
              <h3>Related posts:</h3>
              <ul>
                <?php
                  // related posts loop                
                  $cat = get_the_category($rp_id);
                  $args = array(
                      'category_name' => $cat[0]->slug,
                      'posts_per_page' => 3,
                      'offset' => 0
                    );

                  $rp_query = new WP_Query($args);
                ?>

                <?php if ( $rp_query->have_posts() ) : while ( $rp_query->have_posts() ) : $rp_query->the_post(); ?>
                
                  <?php if ( $post->ID !== $rp_id ): ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                  <?php endif; ?>  

                <?php endwhile; else: ?>

                  <li>No posts related to this at the moment</li>

                <?php endif; ?>
              </ul>
            </div><!-- / .related-posts -->
            
            <hr>

            <?php comments_template(); ?>

          <?php endwhile; else: ?>
          <?php wp_reset_postdata(); ?>

            <div class="page-header">
              <h1>Oh no!</h1>
            </div>

            <p>The page you're looking for seems to be lost!</p>

          <?php endif; ?>

          
       </div>
            <?php get_sidebar('blog'); ?>
      </div><!-- / .row -->


<?php get_footer(); ?>
