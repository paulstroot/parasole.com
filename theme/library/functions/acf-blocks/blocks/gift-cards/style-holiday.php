<?php
/**
 * Gift-cards Block template.
 *
 * @package Parasole
 * @param array $block The block settings and attributes.
 */


$vars = get_field( 'holiday' );
// Load values and assign defaults.
$headline         = $vars[ 'headline' ];
$cta              = $vars[ 'cta' ];
$image            = $vars[ 'image' ]; // ACF's imagepicker.


// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}


// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'gift-cards container';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

?>
<section <?php echo $anchor ? esc_attr( $anchor ) : ''; ?> class="<?php echo esc_attr( $class_name ); ?>">
  <div class="w-full relative @container">

      <?php if ( $image ) : ?>
        <?php echo wp_get_attachment_image( $image['ID'], 'hero',false , array( 'class' => 'w-full' ) ); ?>
      <?php endif; ?>

      <?php if ( $cta ) : ?>
        <div class="absolute left-1/2 -translate-x-1/2 top-[65%] @min-2xl:top-[74%]">
          <a href="<?php echo esc_url( $cta['url'] ); ?>" class="btn btn-arrow-after text-dark! bg-white! hover:bg-secondary! hover:text-white! border-0 @min-2xl:text-[12px] @min-2xl:h-auto @min-2xl:py-1  @max-lg:whitespace-nowrap"><?php echo esc_html( $cta['title'] ); ?></a>
        </div>
      <?php endif; ?>



  </div>
</section>