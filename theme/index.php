<?php
  get_header();
?>


<main class="main cf" id="main">
  <section>
    <h1 class="pagetitle tk-purista-web cf"><?php echo esc_html(get_the_title()); ?></h1>

    <?php
        if ( have_posts() ) {


          ?>
          <div class='relative grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4'>
          <?php
          while ( have_posts() ) {
            the_post();
            get_template_part( 'templates/template-parts/loop-excerpt' );
          }
          ?>
          </div>
          <?php
        } else {

          // If no content, include the "No posts found" template.
          get_template_part( 'template-parts/content/content', 'none' );

        }
      ?>
  </section>

</main>



<?php get_footer(); ?>