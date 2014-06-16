    <?php get_header(); ?>

    <div class="container fullpage-content">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-9">

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

          <?php get_sidebar(); ?>

      </div><!-- / .row -->


<?php get_footer(); ?>
