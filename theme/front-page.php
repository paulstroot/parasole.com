<?php get_header(); ?>

<?php if (have_posts() ) { while ( have_posts() ) : the_post(); ?>
    <main class="pt-0 pb-0 main" id="main">

    <!-- <section class="p-12 mt-0 bg-secondary">
      <div class="container">
        <?php the_content(); ?>
      </div>
    </section> -->


    <section class="!py-0 bg-secondary">
      <div class="container py-12 mx-auto text-center lg:py-24 lg:text-left">
        <div class="lg:w-1/2 xl:pr-16">
          <?php the_content(); ?>
        </div>
      </div>
      <div class="relative w-full h-64 sm:h-72 md:h-96 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 lg:h-full">
        <?php echo get_the_post_thumbnail(get_the_ID(), 'large', array( 'class' => 'absolute inset-0 object-cover w-full h-full' )); ?>
      </div>
    </section>


    <section class="container prose">
      <p>This is the "Starter" theme. It utilizes tailwind, DaisyUI and esbuild. It is a work in progress.</p>
      <p>This template your are viewing can be found at starter/theme/front-page.php</p>
      <p>Tailwind css is developed in the "tailwind" folder, and is compiled into the /theme/library/css folder.</p>
      <p>Read the <a href="https://github.com/paulstroot/wordpress_starter/blob/main/src/wp-content/themes/starter/README.md" target="_blank">docs</a>, check out the <a href="/style-guide/">style guide</a>, some <a href="/sample-components/">example components</a>, or just dive in and start developing!</p>
    </section>

    <section class="mb-0 text-white bg-primary-contrast">
      <div class='container'>
        <p>Here is a search form for testing the search functionality</p>
        <?php get_search_form(); ?>
      </div>
    </section>
    </main>

<?php endwhile;
}; ?>

<?php get_footer(); ?>