    <?php get_header(); ?>

    <div class="container fullpage-content">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-9">

          <div class="page-header">
              <h1><?php wp_title(''); ?></h1>
            </div>

            <?php 
              $args = array(
                  'post_type' => 'post',
                  'category_name' => 'Features'
                );
              $the_query = new WP_Query( $args );

            ?>

          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article class="post">
              <?php 
                $thumbnail_id = get_post_thumbnail_id();
                $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'thumbnail-size', true);
              ?>
              <div class="featured-image">
                <img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?> graphic">
              </div>

              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p class="post-meta">
                By <?php the_author(); ?> 
                on <?php the_time('l, F jS, Y'); ?>
                in <?php the_category(', '); ?>. 
                <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
              </p>

              
              <?php the_excerpt(); ?>
              <hr>
            </article>

          <?php endwhile; else: ?>
            <div class="page-header">
              <h1>Oh no!</h1>
            </div>

            <p>The page you're looking for seems to be lost!</p>

          <?php endif; ?>
       </div>

          <?php get_sidebar('blog'); ?>

      </div><!-- / .row -->


<?php get_footer(); ?>
