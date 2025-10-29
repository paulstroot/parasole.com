<?php
  get_header();
?>

<main class="pt-0 pb-0 main" id="main">

  <section class="bg-primary">
    <div class="container">
      <p>The search results page template can be found at theme/search.php. If your site does not have a search you can delete search.php and searchform.php</p>

      <p>This starter implements the default WordPress search functionality. It is not a custom search, and does not use a plugin. If you would like to enhance this search, check out some of these plug-ins:

      <ul>
        <li><a href="https://searchwp.com/" target="_blank">Search WP</a><br/>
          This one is highly rated, but there is a  $99 per year license fee. If you decide to use it check out <a href="https://wordpress.org/plugins/searchwp-live-ajax-search/" target="_blank">SearchWP Live Ajax Search</a> for generating search results as-you-type.
        </li>

        <li><a href="https://wordpress.org/plugins/acf-better-search/" target="_blank">ACF Better Search</a><br/>
          Check this out if you use ACF heavily
        </li>
        <li><a href="https://www.relevanssi.com/" target="_blank">Relevanssi</a><br/>
          The free version is not too bad. Paid version for more features. This one also has a <a href="https://www.relevanssi.com/live-ajax-search/" target="_blank">live search add-on</a>.
        </li>
        <li><a href="https://wordpress.org/plugins/ajax-search-lite/" target="_blank">Ajax Search Lite</a><br/>
          Free version of the "search as you type" functionality.
        </li>
        <li><a href="https://wordpress.org/plugins/wp-extended-search/" target="_blank">WP Extended Search</a><br/>
          This one is free. Good solution you’re on a budget
        </li>
      </ul>
      </p>
    </div>
  </section>


  <section class="container">

    <header class="page-header alignwide">
      <h1 class="page-title">
        <?php
        printf(
            esc_html__('Results for "%s"', 'pstroot'),
            '<span class="page-description search-term">' . esc_html(get_search_query()) . '</span>'
        );
        ?>
      </h1>
    </header><!-- .page-header -->

    <?php
    if (have_posts() ) {
        ?>
        <article class="flex gap-8 mb-4" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

          <figure class="w-64 post-thumbnail">
            <a class="post-thumbnail-inner" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
            <?php echo get_the_post_thumbnail(null, 'medium', array( 'class' => 'w-full h-auto' )); ?>
            </a>
          </figure>

          <div class="flex-1 entry-content">
          <?php
            the_title(sprintf('<h2 class="mt-0 text-xl entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');

            the_excerpt();

            wp_link_pages(
                array(
                'before' => '<div class="page-links">' . __('Pages:', 'pstroot'),
                'after'  => '</div>',
                )
            );
            ?>
          </div><!-- .entry-content -->


        </article>
        <?php
    } else {

        echo "<h2>Your search returned no results.</h2>";

    }
    ?>
  </section>

  <section class="mb-0 bg-secondary">
      <div class='container'>
        <p>Here is a search form for testing the search functionality</p>
        <?php get_search_form(); ?>
      </div>
    </section>


</main>



<?php get_footer(); ?>