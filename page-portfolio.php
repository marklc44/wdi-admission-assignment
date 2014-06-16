<?php
/*
  Template Name: Portfolio Grid Template
*/
?>


    <?php get_header(); ?>

    <div class="container fullpage-content">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">

          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="page-header">
              <h1><?php the_title(); ?></h1>
            </div>

            <?php the_content(); ?>

          <?php endwhile; else: ?>
            <div class="page-header">
              <h1>Oh no!</h1>
            </div>

            <p>The page you're looking for seems to be lost!</p>

          <?php endif; ?>
       </div>

      </div><!-- / .row -->

      <div class="row">
        <?php
          $args = array(
            'post_type' => 'portfolio'
          );
          $the_query = new WP_Query( $args );

          ?>

          <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

          <div class="col-sm-3 portfolio-item">
            <?php 
              $thumbnail_id = get_post_thumbnail_id();
              $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'thumbnail-size', true);
            ?>
            <div class="image-wrapper">
              <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?> graphic"></a>
            </div>
            
            <a href="<?php the_permalink(); ?>"><h3 class="portfolio-item-title"><?php the_title(); ?></h3></a>
          </div>

          <?php
            $portfolio_count = $the_query->current_post + 1;
          ?>
          <?php if ( $portfolio_count % 4 == 0 ): ?>

            </div><div class="row">
          
          <?php endif; ?>

          <?php endwhile; else: ?>
            <h3>Oops!</h3>
            <p>There are no posts to display</p>
          <?php endif; ?>

      </div><!-- / .row -->


<?php get_footer(); ?>

