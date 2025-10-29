<footer id="footer">

  <div class="container py-2">
    <div class="flex flex-col sm:flex-row">
      <div class="flex items-center w-full sm:w-1/3 logo">
        <a href="<?php echo esc_url(get_home_url()); ?>" class="mx-auto my-4 md:my-0 md:mx-0">
          <img
            src="<?php bloginfo('template_url'); ?>/library/images/logo-horizontal-dark.svg"
            alt="<?php echo esc_url(get_bloginfo('name')); ?>"
            class="block h-12"
            height=48
            priority
          />
        </a>
      </div>
      <div class="flex justify-center items-center w-full sm:w-2/3 logo sm:justify-end">

        <?php
        wp_nav_menu(
            array(
            'menu' => 'footer',
            'container' => 'nav',
            'menu_id' => 'footer-menu-container',
            'menu_class' => 'flex flex-row gap-4',
            'walker' => new Pstroot_Nav_Menu()
            )
        );
        ?>
      </div>
    </div>
  </div>

  <div class="w-full bg-dark text-light">
    <div class="container">
      <div class="justify-between py-2 text-sm text-center sm:flex sm:flex-row">
        <div class="copyright logo">
          &copy;<?php echo esc_attr(gmdate('Y')); ?> <?php echo esc_html(get_bloginfo('name')); ?>
        </div>

        <div class="">
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