<div class="row">
  <div class="col-sm-12 text-center">
    <h2 class="section-heading">&#8212; Projects &#8212;</h2>
  </div>
</div><!-- / .row -->
<div class="row">
  <div class="col-sm-12 p-filters projects categories text-center">
    <span class="label label-default category all" data-filter="*">All projects</span>

    <?php
      $taxonomy = 'p_categories';
      $tax_terms = get_terms($taxonomy);
    ?>

    <?php foreach ( $tax_terms as $tax_term ) : ?>
      <span class="label label-default category <?php echo $tax_term->slug; ?>" data-filter="<?php echo '.' . $tax_term->slug; ?>"><?php echo $tax_term->name; ?></span>
    <?php endforeach; ?>
  </div>
</div><!-- / .row -->

<div id="p-items" class="row">
  <div class="col-sm-4 sizer"></div>
  <?php
    $args = array(
      'post_type' => 'portfolio'
    );
    $the_query = new WP_Query( $args );

    ?>

    <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <?php 
      $terms_list = wp_get_post_terms(get_the_ID(), 'p_categories', array('fields' => 'slugs'));
      $project_cat;
      foreach ( $terms_list as $this_term ) {
        $project_cat = $this_term;
      }
    ?>
    
    <div class="col-sm-4 grid-item project <?php echo $project_cat; ?>" data-groups="<?php echo $project_cat; ?>">
      <h3 class="project-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

      <?php 
        $thumbnail_id = get_post_thumbnail_id();
        $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'thumbnail-size', true);
      ?>
      <div class="image-wrapper">
        <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?> graphic"></a>
        <div class="project-meta">
          <?php
            $term_list = get_the_terms( $post->ID, 'tools');
            
            $term_code;
            foreach ( $term_list as $term_item ) {
              $term_code .= '<span class="tool ' . $term_item->slug . '">' . $term_item->name . '</span><br>';
            }
          ?>
          <div class="project-tags"><?php echo $term_code; ?></div>
          <?php 
            $project_cats = get_the_terms( $post->ID, 'p_categories' );
            $cat_slugs = array();
            foreach ( $project_cats as $p_cat ) {
              $cat_slugs[] = $p_cat->slug;
            }
            $cat_slug = join( ", ", $cat_slugs );

          ?>
          <div class="project-category <?php echo $cat_slug; ?>"><?php the_terms( $post->ID, 'p_categories' ); ?></div>
          <?php $cat_slug = ''; ?>
          <?php $term_code = ''; ?>  
        </div> 
      </div><!-- / .image-wrapper -->
      
      
    </div>

    <?php
      $portfolio_count = $the_query->current_post + 1;
    ?>
    <?php //if ( $portfolio_count % 3 == 0 ): ?>

      <!--/div><div class="row"-->
    
    <?php //endif; ?>

    <?php endwhile; else: ?>
      <h3>Oops!</h3>
      <p>There are no posts to display</p>
    <?php endif; ?>

</div><!-- / .row -->

