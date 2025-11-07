<?php
/**
 * Gift-cards Block template.
 *
 * @package Parasole
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$headline         = get_field( 'headline' );
$description      = get_field( 'description' );
$links            = get_field( 'links' );
$cta              = get_field( 'cta' );
$text_color       = get_field( 'text_color' ); // ACF's color picker.
$background_color = get_field( 'background_color' ); // ACF's color picker.
$image            = get_field( 'image' ); // ACF's imagepicker.


// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}


// Create class attribute allowing for custom "className" and "align" values.
$class_name = '@container gift-cards container';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

?>
<section <?php echo $anchor ? esc_attr( $anchor ) : ''; ?> class="<?php echo esc_attr( $class_name ); ?>">
  <div style="background-color: <?php echo esc_attr( $background_color ); ?>; color: <?php echo esc_attr( $text_color ); ?>;" class="p-4 bg-exists flex flex-col @lg:flex-row @lg:gap-8 w-full">

      <?php if ( $image ) : ?>
        <figure class="@lg:w-[40%] @lg:max-w-116 flex justify-end items-center mb-0!">
          <?php echo wp_get_attachment_image( $image['ID'], 'full',false , array( 'class' => 'max-w-full max-h-max' ) ); ?>
        </figure><!-- .image_block -->
      <?php endif; ?>

      <div class="@container @md:flex-1 relative flex flex-col justify-center items-start gap-y-4">

        <?php if ( $headline ) : ?>
          <h2 class="text-with-image__headline text-left my-0!"><?php echo esc_html( $headline ); ?></h2>
        <?php endif; ?>

        <?php if ( $description ) : ?>
          <p class=""><?php echo esc_html( $description ); ?></p>
        <?php endif; ?>

        <!-- LINKS -->
        <?php if ( $links ) : ?>
          <div class="links flex flex-col gap-4 @[460px]:flex-row @[460px]:divide-x-2 @[460px]:divide-y-0 @[460px]:space-y-4">
            <?php foreach ( $links as $l ) : ?>
                <a
                  href="<?php echo esc_url( $l['link']['url'] ); ?>"
                  target="<?php echo esc_attr( $l['link']['target'] ); ?>"
                  class="text-inherit inline-block text-[clamp(16px,31px)] no-underline! pe-4 m-0 hover:text-accent! leading-5"
                  <?php if ( $text_color ) : ?>
                    style="color: <?php echo esc_attr( $text_color ); ?>;"
                  <?php endif; ?>
                >
                  <?php echo esc_html( $l['link']['title'] ); ?>
                </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <?php if ( $cta ) : ?>
          <a href="<?php echo esc_url( $cta['url'] ); ?>" class="btn btn-arrow-after text-dark! bg-white! hover:bg-secondary! hover:text-white! border-0"><?php echo esc_html( $cta['title'] ); ?></a>
        <?php endif; ?>
      </div>

  </div>
</section>