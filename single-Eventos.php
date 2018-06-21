<?php
  
  get_header();

  while(have_posts()) {
    the_post(); ?>

    <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri("/images/ocean.jpg") ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title(); ?></h1>
      <div class="page-banner__intro">
        <p>costum field</p>
      </div>
    </div>  
  </div>

  <div class="container container--narrow page-section">
  	<div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo site_url("/eventos") ?>"><i class="fa fa-home" aria-hidden="true"></i> Eventos Home</a> <span class="metabox__main"><?php the_title(); ?></span></p>
    </div>
  	<div class="generic-content"><?php the_content(); ?></div>
  	
    <?php 

      $ProgramasRelacionados = get_field("programa(s)_relacionado(s)");

      echo "<ul class="link-list min-list">";
      foreach ($ProgramasRelacionados as $programa) { ?>
        <li><a href="<?php echo get_the_permalink($programa); ?>"><?php echo get_the_title($programa); ?></a></li>
      <?php }
      echo "</ul>";
    ?>

  </div>

    
  <?php }

  get_footer();

?>