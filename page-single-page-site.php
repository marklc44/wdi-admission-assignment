<?php
/* 
  Template Name: Single Page Site
*/
?>

<?php get_header(); ?>

<div class="jumbotron gray-bg">
  <div class="container">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php the_content(); ?>

    <?php endwhile; endif; ?>

  </div>
</div>

<div class="single-page-sections">
  
  <!-- projects section -->
  <section id="projects" class="projects">
    <div class="container">
      <?php get_template_part( 'partials/content', 'projects' ); ?>
    </div>
  </section><!-- / #projects -->

  <section class="testimonial">
    <div class="container">
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 text-center">
          <p class="lead quote">"I can list off countless experiences where sales we made and opportunities we received were directly attributable to Mark's excellent work."</p>
          <p class="endorser">&#8212; Chris P., Sr. VP, Branch Manager</p>
        </div>
      </div>
    </div>
  </section><!-- / .testimonial -->
    
  <section id="blog" class="blog">
    <div class="container">
      <?php get_template_part( 'partials/content', 'blog' ); ?>
    </div>
  </section><!-- / #blog -->

  <section class="testimonial">
    <div class="container">
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 text-center">
          <p class="lead quote">"Mark is very creative and accountable, a combination that is hard to find in any professional."</p>
          <p class="endorser">&#8212; Mark U., Sr. VP, Sales</p>
        </div>
      </div>
    </div>
  </section><!-- / .testimonial -->

  <section id="about" class="about">
    <div class="container">
    <?php get_template_part( 'partials/content', 'about' ); ?>
    </div>
  </section><!-- / #about -->

  <section id="contact"></section><!-- / #contact -->
</div><!-- / .single-page-sections -->

<div class="container">
<?php get_footer(); ?>

