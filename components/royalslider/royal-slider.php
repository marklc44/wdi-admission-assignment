

  <?php $cur_post_id = get_the_ID(); ?>

  <?php 
    // echo get_post_gallery($cur_post_id, false);
    $has_post_gallery = get_post_gallery($cur_post_id, false);
    // this check is not returning false when there is no gallery
    // also if(get_post_gallery()) also not returning false
    if ( count( $has_post_gallery['src'] ) > 1 ): 
  ?>

  <div id="rslider" class="royalSlider rsDefault visibleNearby">

  <?php 
    $attached_imgs = get_post_gallery( $cur_post_id, false );
    $img_ids = explode(',', $attached_imgs['ids'] );
    $img_list = '';

    foreach ( $img_ids as $img_id ) {
        $tn_url = wp_get_attachment_image_src($img_id, 'thumbnail-size', false);
        $img_list .= '<a  class="rsImg" data-rsw="'. $tn_url[1] . '" data-rsh="'.  $tn_url[2] . '" href="' . $tn_url[0] . '"></a>';
    }
    echo $img_list; 
  ?>

  </div><!-- / royal slider -->

  <?php else: ?>

  <?php
    $thumbnail_id = get_post_thumbnail_id();
    $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'thumbnail-size', false);
  ?>

  <div class="jumbotron">
      <div class="image-wrapper">
        <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?> graphic"></a>
      </div>
  </div><!-- / .jumbotron -->  
  <?php endif; ?>
