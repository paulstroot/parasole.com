<?php get_template_part("head"); ?>

<body <?php body_class(); ?>>

<header id="pageHeader" class='sticky top-0 z-50 bg-base text-base-content '>

  <a href="#main" class="screen-reader-shortcut">Skip to main content</a>
  <div class='container py-7'>
    <div class='flex flex-row justify-between'>
      <div class="flex items-center logo">
        <a href="/" class="flex flex-row items-baseline justify-end gap-7 text-base-content no-underline hover:text-primary">
          <img
            src="<?php bloginfo('template_url'); ?>/library/images/logo.svg"
            alt="Parasole"
            class="logodark:invert"
            width=200
            priority
          />
          <img
            src="<?php bloginfo('template_url'); ?>/library/images/restaurant-holdings.svg"
            alt="Restaurant Holdings"
            class="tagline dark:invert min-[520px]:block hidden"
            width=205
            priority
          />
        </a>
      </div>

      <nav aria-label="Main Menu" class="inset-x-0 top-0 flex transition open-on-focus_DISABLED justify-stretch">

        <button aria-expanded="false" type="button" class="relative text-base-content bg-transparent border-none mobile-menu-toggle" id="mobile-menu-toggle">
          <span class="sr-only">Toggle main menu</span>
          <div class="flex flex-col gap-y-1.5 hamburger padding-2" >
            <div class="w-7 h-1 rounded-none bg-base-content"></div>
            <div class="w-7 h-1 rounded-none bg-base-content"></div>
            <div class="w-7 h-1 rounded-none bg-base-content"></div>
          </div>
        </button>

        <div class="nav-wrapper">
          <div class="container nav-wrapper-inner">
          <?php

            wp_nav_menu(
                array(
                'menu_class' =>  'home-nav',
                'menu' => 'home-nav',
                'container' => 'home-nav',
                // 'walker' => new Pstroot_Nav_Menu()
                )
            );

            wp_nav_menu(
                array(
                'menu_class' =>  'primary-nav',
                'menu' => 'primary-nav',
                'container' => 'primary-nav',
                // 'walker' => new Pstroot_Nav_Menu()
                )
            );

            ?>
          </div>
        </div>

      </nav>

    </div>
  </div>
</header>







