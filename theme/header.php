<?php get_template_part("head"); ?>

<?php
$add_promotion_bug = get_field('promotion_bug', 'option');
$bug_image = get_field('bug_image', 'option');
$bug_link = get_field('link', 'option');
$mobile_text = get_field('mobile_text', 'option');
$mobile_style = get_field('mobile_style', 'option');

$logo = file_get_contents( get_template_directory() . '/library/images/logo.svg' );
$tagline = file_get_contents( get_template_directory() . '/library/images/restaurant-holdings.svg' );


?>

<body <?php body_class(); ?>>



<?php if ($add_promotion_bug): ?>
  <div class="min-[816px]:bg-transparent!" style="<?php echo esc_attr($mobile_style); ?>">
    <div class="container relative">
      <a href="<?php echo esc_url($bug_link);?>" class="text-inherit! no-underline!">
        <div class="min-[816px]:hidden text-center"><?php echo wp_kses_post($mobile_text); ?></div>
        <?php echo wp_get_attachment_image($bug_image['ID'], 'medium', false, array('class' => 'w-[160px] absolute z-60 right-40 hidden min-[816px]:block', 'alt' => esc_attr($bug_image['alt']))); ?>
      </a>
    </div>
  </div>
<?php endif; ?>

<header id="pageHeader" class='sticky top-0 z-50 bg-base-100 text-base-content'>


  <a href="#main" class="screen-reader-shortcut">Skip to main content</a>

  <div class='container py-7'>
    <div class='flex flex-row justify-between'>
      <div class="flex items-center logo">
        <a href="/" class="logo flex flex-row items-baseline justify-end gap-7 text-base-content no-underline hover:text-primary">
        <div class="logo-parasole logodark:invert relative w-[200px]">
            <?php echo wp_kses($logo, pstroot_get_allowed_svg_args()); ?>
          </div>
          <div class="tagline min-[520px]:block hidden w-[205px]">
            <?php echo wp_kses($tagline, pstroot_get_allowed_svg_args()); ?>
          </div>
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



      </nav>

    </div>
  </div>
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

</header>







