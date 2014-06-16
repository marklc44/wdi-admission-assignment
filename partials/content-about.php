<?php wp_reset_query(); ?>

<div class="row">
  <div class="col-sm-12 text-center">
    <h2 class="section-heading">&#8212; About &#8212;</h2>
  </div>
</div><!-- / .row -->

<div class="row">
  <?php
    $args = array(
      'post_type' => 'about_item'
    );
    $the_query = new WP_Query( $args );
    ?>

    <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

    <div class="col-sm-12 about-item">

      <?php 
        $thumbnail_id = get_post_thumbnail_id();
        $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'thumbnail-size', true);
      ?>
      <div class="image-wrapper">
        <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?> graphic"></a>
      </div><!-- / .image-wrapper -->  

      <div class="content">
        <?php the_content(); ?>
      </div> 
    </div>

    <?php endwhile; else: ?>
      <h3>Oops!</h3>
      <p>There are no posts to display</p>
    <?php endif; ?>

</div><!-- / .row -->

