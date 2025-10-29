<?php
    /**
     * Template Name: Contact Us
     */
?><?php get_header(); ?>

<?php if (have_posts() ) { while ( have_posts() ) : the_post(); ?>
    <main class="main container cf" id="main">

        <?php
        $page_title = get_field('header_copy') ? get_field('header_copy') : get_the_title();
        ?>

    <h1 class="pagetitle tk-purista-web cf"><?php echo esc_html($page_title); ?></h1>

    <div class="contactinfo mb-8">
      <h2 class="h3 mb-0 ">Address</h2>
      <address class="not-italic" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
        <?php
        if (strlen(get_theme_mod('address')) > 0 ) {
            echo '<div class="address" itemprop="streetAddress">' . esc_html(get_theme_mod('address')) . '</div>';
        }
        if (strlen(get_theme_mod('address2')) > 0 ) {
            echo '<div class="address2">' . esc_html(get_theme_mod('address2')) . '</div>';
        }
        ?>
        <div>
          <span class="locality" itemprop="addressLocality">
            <?php echo esc_html(get_theme_mod('city')); ?>,
            <?php echo esc_html(get_theme_mod('state')); ?>
          </span>
          <span class="postalcode" itemprop="postalCode">
            <?php echo esc_html(get_theme_mod('zip')); ?>
          </span>
        </div>

      </address>
        <?php

        if (strlen(get_theme_mod('phone')) > 0 ) {
            echo '<div class="phone">Phone:  <a href="tel:' . esc_html(get_theme_mod('phone')) . '" itemprop="telephone">' . esc_html(get_theme_mod('phone')) . '</a></div>';
        }
        if (strlen(get_theme_mod('fax')) > 0 ) {
            echo '<div class="fax">Fax: <span itemprop="faxNumber">' . esc_html(get_theme_mod('fax')) . '</span></div>';
        }
        if (strlen(get_theme_mod('email')) > 0 ) {
            echo '<div class="email"><a href="mailto:'.esc_attr(get_theme_mod('email')).'"  itemprop="email">' . esc_html(get_theme_mod('email')) . '</a></div>';
        }
        ?>

    </div>

        <?php the_content(); ?>

    </main>


<?php endwhile;
}; ?>

<?php get_footer(); ?>