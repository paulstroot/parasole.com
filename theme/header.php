<?php get_template_part("head"); ?>

<body <?php body_class(); ?>>

<header id="pageHeader" class='sticky top-0 z-50 text-white bg-mid-700 '>

  <a href="#main" class="screen-reader-shortcut">Skip to main content</a>
  <div class='container py-0'>
    <div class='flex flex-row justify-between'>
      <div class="flex items-center py-2 logo">
        <a href="/" class="flex flex-row items-center gap-4 text-white no-underline hover:text-primary">
          <img
            src="<?php bloginfo('template_url'); ?>/library/images/logo.svg"
            alt="Logo"
            class="dark:invert"
            width=70
            priority
          />
          <h1 class="m-0 text-lg"><?php echo esc_html(get_bloginfo('name')); ?></h1>
        </a>
      </div>

      <nav aria-label="Main Menu" class="inset-x-0 top-0 flex transition disclosure-nav open-on-focus_DISABLED justify-stretch">

        <button aria-expanded="false" type="button" class="relative text-white bg-transparent border-none mobile-menu-toggle md:hidden" id="mobile-menu-toggle">
          <span class="sr-only">Toggle main menu</span>
          <div class="space-y-2 hamburger padding-2" >
            <div class="w-8 h-1 rounded-full bg-mid-200"></div>
            <div class="w-8 h-1 rounded-full bg-mid-200"></div>
            <div class="w-8 h-1 rounded-full bg-mid-200"></div>
          </div>
        </button>

        <div class="justify-between nav-wrapper">

          <?php
            wp_nav_menu(
                array(
                'menu_class' =>  '',
                'menu' => 'primary-nav',
                'container' => 'primary-nav',
                'walker' => new Pstroot_Nav_Menu()
                )
            );

            wp_nav_menu(
                array(
                'menu_class' =>  '',
                'menu' => 'utility-nav',
                'container' => 'utility-nav',
                'walker' => new Pstroot_Nav_Menu()
                )
            );
            ?>
        </div>

      </nav>

    </div>
  </div>
</header>







