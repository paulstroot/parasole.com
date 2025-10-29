<?php
  get_header();
?>


<main class="container main cf" id="main">
  <section>
    <h1 class="pagetitle tk-purista-web cf"><?php echo esc_html(the_archive_title()); ?></h1>



    <?php
        if ( have_posts() ) {
          ?>
          <ul class="grid grid-cols-1 gap-8 p-0 mt-16 sm:grid-cols-2 md:grid-cols-3">
          <?php
          while ( have_posts() ) {
            the_post();
            echo "<li class='list-none'>";
            get_template_part( 'templates/template-parts/team-excerpt' );
            echo "</li>";
          }
          ?>
          </ul>
          <?php
        } else {
          // If no content, include the "No posts found" template.
          get_template_part( 'template-parts/content/content', 'none' );
        }
      ?>
    </section>

</main>



<?php get_footer(); ?>