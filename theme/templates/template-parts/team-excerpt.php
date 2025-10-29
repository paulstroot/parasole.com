
<article class="shadow-xl card bg-base-200" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- <header class="entry-header">
        <?php
        if (is_sticky() && is_home() && ! is_paged() ) {
            printf('<span class="sticky-post">%s</span>', 'Featured');
        }
        the_title(sprintf('<h2 class="text-xl entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
        ?>
    </header> -->
  <!-- .entry-header -->


  <figure class="post-thumbnail">
    <a class="post-thumbnail-inner " href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
      <?php echo get_the_post_thumbnail(null, 'medium', array( 'class' => 'w-full h-auto aspect-video object-cover' )); ?>
    </a>
  </figure>

  <div class="card-body">
    <h2 class="card-title"><?php echo esc_html(get_the_title());?></h2>
    <div><?php echo esc_html(get_the_excerpt()); ?></div>
    <div class="justify-end card-actions">
      <a href="<?php echo  esc_url(get_permalink()); ?>" class="btn btn-primary">Read More</a>
    </div>
  </div>

</article>




