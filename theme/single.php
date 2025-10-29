<?php
  get_header();
?>


<main class="main cf" id="main">

  <section class="container">
    <?php
      if ( have_posts() ) {


        ?>
        <div class='relative'>
        <?php
        while ( have_posts() ) {
          the_post();
          ?>

          <article class="mb-4" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <h2 class="pagetitle tk-purista-web cf"><?php echo esc_html(get_the_title()); ?></h2>


            <figure class="post-thumbnail max-w-24">
              <a class="post-thumbnail-inner" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php echo get_the_post_thumbnail( null, 'medium' ,array( 'class' => 'w-full h-auto' ) ); ?>
              </a>
            </figure>


            <div class="entry-content">
              <?php
              the_content(
                sprintf(
                  wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'pstroot'),
                    array(
                      'span' => array(
                        'class' => array(),
                      ),
                    )
                  ),
                  get_the_title()
                )
              );

              wp_link_pages(
                array(
                  'before' => '<div class="page-links">' . __( 'Pages:', 'pstroot'),
                  'after'  => '</div>',
                )
              );
              ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer">
              <?php
              // Hide author, post date, category and tag text for pages.
              if ( 'post' === get_post_type() ) {

                // Posted by
                printf(
                  /* translators: 1: SVG icon. 2: post author, only visible to screen readers. 3: author link. */
                  '<div class="byline">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></div>',
                  'Author: ',
                  'Author',
                  esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                  esc_html( get_the_author() )
                );


                printf(
                  '<div class="posted-on">%1$s: <a href="%2$s" rel="bookmark">%3$s</a></div>',
                  'Date',
                  esc_url( get_permalink() ),
                  sprintf(
                    '<time class="entry-date published updated" datetime="%1$s">%2$s</time>',
                    esc_attr( get_the_date( DATE_W3C ) ),
                    esc_html( get_the_date() )
                  )
                );

                /* translators: used between list items, there is a space after the comma. */
                $categories_list = get_the_category_list( __( ', ', 'pstroot') );
                if ( $categories_list ) {
                  printf(
                    /* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
                    '<div class="cat-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</div>',
                    ' Categories: ',
                    esc_html__( 'Posted in', 'pstroot'),
                    esc_html($categories_list)
                  ); // WPCS: XSS OK.
                }

                /* translators: used between list items, there is a space after the comma. */
                $tags_list = get_the_tag_list( '', __( ', ', 'pstroot') );
                if ( $tags_list ) {
                  printf(
                    /* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of tags. */
                    '<div class="tags-links">%1$s: <span class="screen-reader-text">%2$s </span>%3$s</div>',
                    'Tags: ',
                    esc_html__( 'Tags', 'pstroot'),
                    esc_html($tags_list)
                  ); // WPCS: XSS OK.
                }
              }
              ?>
            </footer><!-- .entry-footer -->
          </article>

          <?php
        }
        ?>
        </div>
        <?php
      }
    ?>
  </section>
</main>



<?php get_footer(); ?>