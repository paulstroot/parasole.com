<?php
/**
 * text-with-image Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$headline         = get_field( 'headline' );
$description      = get_field( 'description' );
$cta              = get_field( 'cta' );
$background_color = get_field( 'background_color' ); // ACF's color picker.
$reverse_order    = get_field( 'reverse_order' ); // boolean
$logo             = get_field( 'logo' );// ACF's imagepicker.
$image            = get_field( 'image' ); // ACF's imagepicker.


// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$cta_btn_class = 'btn btn-outline btn-primary mx-auto';


// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'text-with-image';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['reverse'] ) ) {
    $class_name .= ' reverse';
}
if ( $background_color ) {
    $class_name .= ' @container';
}

$direction = $reverse_order ? ' dir="rtl"' : '';


?>

<section <?php echo esc_html( $anchor ); ?> <?php echo $direction; ?> class="<?php echo esc_attr( $class_name ); ?>" >
  <div class="@max-2xl:bg-light">
    <div class="container">
      <div class="flex flex-col mb-12 @2xl:flex-row @2xl:gap-8 @2xl:items-start  @max-2xl:p-8">

        <?php if ( $image ) : ?>
          <div class="z-[2] order-2 @2xl:order-1 @2xl:w-1/2 image block relative @2xl:flex @2xl:justify-end @2xl:items-start @2xl:mt-26">
            <figure class="aspect-[16/9] @2xl:aspect-[42/52] mb-0 overflow-hidden block relative @2xl:max-w-[426px] w-full">
              <?php echo wp_get_attachment_image( $image['ID'], 'full',false , array( 'class' => 'absolute inset-0 w-full h-full object-cover' ) ); ?>
            </figure><!-- .image_block -->
          </div>
        <?php endif; ?>

        <div class="order-1 @2xl:items-end @2xl:order-2 @2xl:w-1/2 relative @2xl:flex @2xl:flex-col">
          <div class="@max-2xl:hidden @2xl:absolute top-0 bottom-0 left-inherit z-[0] bg-light w-[141%]"></div>

          <div class="@2xl:px-5 @2xl:py-10 z-[1] relative" >
            <?php if ( $logo ) : ?>
              <figure class="logo max-w-[250px] @2xl:max-w-none !mx-auto">
                <?php echo wp_get_attachment_image( $logo['ID'], 'full',false , array( 'class' => 'text-with-image__img max-h-[150px] @2xl:max-h-none mx-auto @2xl:h-40' ) ); ?>
              </figure><!-- .logo_block -->
            <?php endif; ?>

            <?php if ( $headline ) : ?>
              <h2 class="text-with-image__headline text-left !my-0"><?php echo esc_html( $headline ); ?></h2>
            <?php endif; ?>

            <?php if ( $description ) : ?>
              <p class="text-with-image__description text-left"><?php echo wp_kses_post( $description ); ?></p>
            <?php endif; ?>

            <?php if ( $cta ) : ?>
              <a href="<?php echo esc_url( $cta['url'] ); ?>" class="inline-block @max-2xl:hidden h-auto <?php echo $cta_btn_class; ?>"><?php echo esc_html( $cta['title'] ); ?></a>
            <?php endif; ?>
          </div><!-- END Padding -->
        </div>


        <?php if ( $cta ) : ?>
          <a href="<?php echo esc_url( $cta['url'] ); ?>" class="inline-block mx-auto order-3 @2xl:hidden !mt-[-2.4rem] z-10 bg-white hover:bg-primary <?php echo $cta_btn_class; ?>"><?php echo esc_html( $cta['title'] ); ?></a>
        <?php endif; ?>
      </div>


    </div>
  </div>
</section>