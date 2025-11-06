<?php
/**
 * Testimonial Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$image        = get_field( 'image' );
$title        = get_field( 'title' );
$description  = get_field( 'description' );
$cta          = get_field( 'cta' ); // ACF's color picker.

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'career-modal text-base-content relative aspect-square overflow-hidden';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Build a valid style attribute for background and text colors.
$styles = array( 'background-color: ' . $background_color, 'color: ' . $text_color );
$style  = implode( '; ', $styles );


?>

<div class="<?php echo $class_name; ?>">
    <button class="cursor-pointer w-full h-full " onclick="modal_<?php echo $block['id']; ?>.showModal()">
      <?php echo wp_get_attachment_image( $image['ID'], 'large',false , array( 'class' => 'absolute inset-0 w-full h-full! object-cover object-center','alt'=>$image['alt'] ) ); ?>
    </button>
    <dialog id="modal_<?php echo $block['id']; ?>" class="modal">
      <div class="modal-box bg-base">
        <form method="dialog">
          <button class="absolute btn btn-sm w-6 h-6 p-0! leading-0 rounded-full! right-2 top-2 border! bg-base! hover:bg-accent! text-base-content!"><i class="ri-close-line"></i>
          </button>
        </form>

        <h3 class="text-lg font-bold"><?php echo $title; ?></h3>
        <div class="text-sm">
          <?php echo $description; ?>
        </div>

        <?php if ( $cta ) : ?>
          <div class="text-right">
            <a href="<?php echo esc_url( $cta['url'] ); ?>" class="btn btn-arrow-after btn-outline"><?php echo esc_html( $cta['title'] ); ?></a>
          </div>
        <?php endif; ?>

        <!-- <div class="modal-action">
          <form method="dialog">
            <button class="btn">Close</button>
          </form>
        </div> -->
      </div>
      <form class="modal-backdrop" method="dialog">
        <button>close</button>
      </form>
    </dialog>
  </div>