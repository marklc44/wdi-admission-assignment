<?php wp_reset_query(); ?>

<div class="row">
  <div class="col-sm-12 text-center">
    <h2 class="section-heading">&#8212; <a href="<?php echo bloginfo('url') . '/?p=11' ;?>">Blog</a> &#8212;</h2>
  </div>
</div><!-- / .row -->
<div class="row">
  <div class="col-sm-12 filters blog categories text-center">
    <span class="label label-default category all" data-filter="*">All categories</span>

    <?php
      $cat_list = get_categories();
    ?>

    <?php foreach ( $cat_list as $cat ) : ?>
      <span class="label label-default category <?php echo $cat->slug; ?>" data-filter="<?php echo '.' . $cat->slug; ?>"><?php echo $cat->name; ?></span>
    <?php endforeach; ?>
  </div>
</div><!-- / .row -->

<div id="posts" class="row">
  <div class="col-sm-4 sizer"></div>
  <?php
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 6
    );
    $the_query = new WP_Query( $args );

    ?>

    <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <?php 
    global $more;
    $more = 0;
      $post_cats = get_the_category();
    ?>
    <div class="col-sm-4 grid-item blog-post <?php echo $post_cats[0]->slug; ?>" data-groups="<?php echo $post_cats[0]->slug; ?>">
      <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

      <?php 
        $thumbnail_id = get_post_thumbnail_id();
        $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'thumbnail-size', true);
      ?>
      <div class="image-wrapper">
        <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?> graphic"></a>
        <div class="meta">
          <div class="category <?php echo $post_cats[0]->slug; ?>"><?php echo $post_cats[0]->name; ?></div>
        </div> 
      </div><!-- / .image-wrapper -->  
      <div class="excerpt">
        <p class="byline">By <?php the_author(); ?> 
                on <?php the_time('l, F jS, Y'); ?></p>
        <?php the_excerpt(); ?>
      </div> 
    </div>


    <?php endwhile; else: ?>
      <h3>Oops!</h3>
      <p>There are no posts to display</p>
    <?php endif; ?>

</div><!-- / .row -->
<div class="row more-posts">
  <div class="col-md-12 text-center">
    <a href="<?php bloginfo('url'); ?>/blog">More blog posts &raquo;</a>
  </div>
</div>

