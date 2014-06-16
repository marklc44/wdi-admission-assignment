<?php get_header(); ?>

<div class="container fullpage-content">
  
  <div class="page-header">
    <div class="row">
      <div class="col-sm-9">
        <h1>Project: <span class="page-subtitle"><?php wp_title(''); ?></span></h1>
      </div>

      <div class="col-sm-3 prev-next">
        <?php next_post_link( '%link', '<span class="glyphicon glyphicon-circle-arrow-left"></span>'); ?>
        <a href="<?php bloginfo('url'); ?>#projects"><span class="glyphicon glyphicon-th"></span></a>
        <?php previous_post_link( '%link', '<span class="glyphicon glyphicon-circle-arrow-right"></span>'); ?>
      </div>
    </div>
  </div>
  <div class="row">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      
      <?php // include('components/royalslider/royal-slider.php'); ?>
      <?php
        $thumbnail_id = get_post_thumbnail_id();
        $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'thumbnail-size', false);
      ?>

      <div class="jumbotron">
          <div class="image-wrapper">
            <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?> graphic"></a>
          </div>
      </div><!-- / .jumbotron --> 

  </div><!-- / .row -->

  <div class="row">
      
      <div class="col-sm-6">
        <h2><?php the_title(); ?></h2>

        <?php the_content(); ?>
        <p><a class="btn btn-info" href="<?php the_field('link'); ?>">View Final Piece <span class="glyphicon glyphicon-arrow-right"></span></a></p>

      </div>  

      <div class="col-sm-6 custom-gallery">
        <?php
          $img_src_list = get_post_gallery_images(get_the_ID());
          $img_html;
          $i = 1;
        ?>

        <?php foreach ( $img_src_list as $img_src ) : ?>

            <?php $img_trimmed = rtrim($img_src, '{-150x150.jpg}') . '00.jpg'; ?>
            <a class="thumbnail" data-toggle="modal" data-target="#modal-<?php echo $i; ?>" href="#"><img src="<?php echo $img_src; ?>"></a>
            
            <div class="modal fade" id="modal-<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                  </div>
                  <div class="modal-body">
                    <img src="<?php echo $img_trimmed; ?>">
                  </div>
                </div>
              </div>
            </div>
        <?php $i++; ?>
        <?php endforeach; ?>  
        <?php $i = 1; ?>
      </div> 

    <?php endwhile; else: ?>
      <div class="page-header">
        <h1>Oh no!</h1>
      </div>

      <p>The page you're looking for seems to be lost!</p>

    <?php endif; ?>

  </div><!-- / .row -->


<?php get_footer(); ?>

