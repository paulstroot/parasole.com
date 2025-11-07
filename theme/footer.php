<?php
/**
 *
 * Footer template.
 *
 * @package Parasole
 */

?>
<footer id="footer" class="mt-0 bg-primary/10">

  <div class="container py-12 p-0 m-0  text-xs">
    <div class="flex flex-col sm:flex-row">

      <div class="flex flex-col-reverse gap-y-8 md:flex-row w-full justify-between">

      <div class="flex flex-col gap-y-8">
        <div class="flex flex-col items-center md:flex-row md:items-start gap-x-22 gap-y-10">
          <div class="address leading-7 text-center md:text-left">
            <b class="block"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></b>
            <address class="not-italic" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
              <?php
              $address = get_theme_mod('address');
              if ( ! empty( $address ) ) {
                  echo '<div class="address" itemprop="streetAddress">' . esc_html( $address ) . '</div>';
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
              <?php
              if (strlen(get_theme_mod('phone')) > 0 ) {
                  echo '<div class="phone" itemprop="phone"><a href="tel:' . esc_html(get_theme_mod('phone')) . '">' . esc_html(get_theme_mod('phone')) . '</a></div>';
              }
              ?>
            </address>
          </div>

          <?php
            wp_nav_menu(
                array(
                'menu' => 'footer',
                'container' => 'nav',
                'menu_id' => 'footer-menu-container',
                'menu_class' => 'flex flex-row gap-10 mt-0 pl-0',
                // 'walker' => new Pstroot_Nav_Menu()
                )
            );
          ?>
        </div>
        <span class="copyright text-center md:text-start text-tiny text-normal ">
          &copy;<?php echo esc_attr(gmdate('Y')); ?> <?php echo esc_html(get_bloginfo('name')); ?> Restaurant Holdings. All rights reserved
            <?php
            wp_nav_menu(
              array(
              'menu' => 'Footer Utility Links',
              'container' => 'nav',
              'menu_id' => 'footer-utility-menu-container',
              'container_class' => 'block md:inline',
              'menu_class' => 'inline ',
              'depth' => 1
              )
          );
          ?>

        </span>

      </div>

      <div class="flex flex-col">
        <a href="<?php echo esc_url(get_home_url()); ?>" class="mx-auto my-4 md:my-0 md:mx-0 logo">
          <img
            src="<?php bloginfo('template_url'); ?>/library/images/logo.svg"
            alt="<?php echo esc_url(get_bloginfo('name')); ?>"
            class="block h-24"
            height=48
            priority
          />
        </a>

        <div class="w-36 md:mt-18 text-2xl m-auto text-secondary">
          <?php
            pstroot_show_social_icons();
          ?>
        </div>
      </div>

    </div>
  </div>



  <?php wp_footer(); ?>
</footer>

</body>
</html>