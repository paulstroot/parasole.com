<?php
/**
 * Gift-cards Block template.
 *
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

$cta_btn_class = 'btn btn-outline btn-white mx-auto';


// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'gift-cards container';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// if ( $background_color ) {
//     $class_name .= ' bg-light md:!bg-transparent bg-custom has-custom-acf-color';
//     $style .= ' bg-light md:!bg-transparent bg-custom has-custom-acf-color';
// }

?>

<section <?php echo esc_attr( $anchor ); ?> <?php echo $direction; ?> class="<?php echo esc_attr( $class_name ); ?>" >
  <div style="background-color: <?php echo $background_color; ?>; color: <?php echo $text_color; ?>;" class=" p-8 bg-exists flex flex-col md:flex-row md:gap-8 w-full">


      <?php if ( $image ) : ?>
        <figure class="md:w-1/2 block ">
          <?php echo wp_get_attachment_image( $image['ID'], 'full',false , array( 'class' => 'max-w-full' ) ); ?>
        </figure><!-- .image_block -->
      <?php endif; ?>

      <div class="md:flex-1 relative">

        <?php if ( $headline ) : ?>
          <h3 class="text-with-image__headline text-left !my-0"><?php echo esc_html( $headline ); ?></h3>
        <?php endif; ?>

        <?php if ( $description ) : ?>
          <p class=""><?php echo esc_html( $description ); ?></p>
        <?php endif; ?>

        <!-- LINKS -->

        <?php if ( $links ) : ?>
          <div class="links">
            <?php foreach ( $links as $link ) : ?>
                <a href="<?php echo esc_url( $link['link']['url'] ); ?>" target="<?php echo esc_attr( $link['link']['target'] ); ?>" class="text-inherit !no-underline" style="color: <?php echo $text_color; ?>; "><?php echo esc_html( $link['link']['title'] ); ?></a> |
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <?php if ( $cta ) : ?>
          <a href="<?php echo esc_url( $cta['url'] ); ?>" class="hidden md:inline-block <?php echo $cta_btn_class; ?>"><?php echo esc_html( $cta['title'] ); ?></a>
        <?php endif; ?>
      </div>

  </div>
</section>