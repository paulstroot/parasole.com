<?php
/**
 * Text-with-image Block template.
 *
 * @package Parasole
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$headline         = get_field( 'headline' );
$description      = get_field( 'description' );
$cta              = get_field( 'cta' );
$buttons          = get_field( 'buttons' );
$background_color = get_field( 'background_color' );
$reverse_order    = get_field( 'reverse_order' );
$logo             = get_field( 'logo' );
$image            = get_field( 'image' );
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$cta_btn_class = 'btn btn-outline btn-primary mx-auto btn-sm z-10 bg-light! hover:bg-primary! hover:text-light! h-auto';

$button_markup = '';
if($cta):
  $button_markup .= '<a href="' . esc_url( $cta['url'] ) . '" class="cta-button inline-block btn-arrow-after h-auto m-0! ' . esc_attr( $cta_btn_class ) . '" target="_blank">' . esc_html( $cta['title'] ) . '</a>';
endif;

if ( $buttons ) :
  if(count($buttons) == 1){
    $button_markup .= '<a href="'.esc_url( $buttons[0]['button_url'] ).'" class="cta-button inline-block btn-arrow-after h-auto m-0! '.esc_attr( $cta_btn_class ).'" target="_blank">'. esc_html( $buttons[0]['button_label'] ).'</a>';
  } else {
    $button_markup .= '<select class="cta-button border-2 border-primary mx-0 py-[3.2px] dark:bg-base-300!" name="restaurantsMenu" id="restaurantsMenu" onchange="MM_jumpMenu(\'_blank\',this,0)"><option value="">Make a Reservation</option>';
    foreach($buttons as $button):
      $button_markup .= '<option value="'. esc_url( $button['button_url'] ).'">'.esc_html( $button['button_label'] ).'</option>';
    endforeach;
    $button_markup .= '</select>';
  }
endif;



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

<section <?php echo $anchor ? esc_attr( $anchor ) : ''; ?><?php echo $reverse_order ? ' dir="rtl"' : ''; ?> class="<?php echo esc_attr( $class_name ); ?>">

<div class="@max-2xl:bg-light">
    <div class="container">
      <div class="flex flex-col mb-12 @2xl:flex-row @2xl:gap-13 @2xl:items-start  @max-2xl:p-8">

        <?php if ( $image ) : ?>
          <div class="image-container z-2 order-2  image block relative  @2xl:order-1 mt-4 @2xl:mt-0 @2xl:w-[43.2%] @2xl:flex @2xl:justify-end @2xl:items-start">
            <figure class="aspect-video @2xl:aspect-42/52 mb-0 overflow-hidden block relative @2xl:max-w-[426px] w-full">
              <?php echo wp_get_attachment_image( $image['ID'], 'large',false , array( 'class' => 'absolute inset-0 w-full h-full object-cover' ) ); ?>
            </figure><!-- .image_block -->
          </div>
        <?php endif; ?>

        <div class="order-1 @2xl:items-end @2xl:me-[4.6rem] @2xl:order-2 @2xl:w-inherit @2xl:flex-1 relative @2xl:flex @2xl:flex-col">
          <div class="@max-2xl:hidden @2xl:absolute top-0 bottom-0 left-inherit z-0 bg-light w-[125%]"></div>

          <div class="z-1 relative @2xl:py-10 @2xl:pe-[12%]" >
            <?php if ( $logo ) : ?>
              <figure class="slide-fade-in logo max-w-[250px] @2xl:max-w-none mx-auto! px-[18%]">
                <?php

                $absolute_path = get_attached_file( $logo['ID'] );
                if (str_ends_with($absolute_path, '.svg')) {
                  $upload_dir = wp_upload_dir();
                  $upload_base_path = $upload_dir['basedir'];
                  $relative_path = str_replace( $upload_base_path, '', $absolute_path );
                  $relative_path = ltrim( $relative_path, '/' );
                  echo wp_kses(file_get_contents( wp_upload_dir()["basedir"] . '/' . $relative_path ), pstroot_get_allowed_svg_args());
                } else {
                  echo wp_get_attachment_image( $logo['ID'], 'large',false , array( 'class' => 'text-with-image__img w-auto max-h-[150px] @2xl:max-h-none mx-auto @2xl:h-40' ) );
                }
                ?>


              </figure><!-- .logo_block -->
              <?php endif; ?>

              <?php if ( $headline ) : ?>
                <h2 dir="ltr" class="text-with-image__headline text-left mt-0!"><?php echo esc_html( $headline ); ?></h2>
              <?php endif; ?>

            <?php if ( $description ) : ?>
              <div dir="ltr" class="text-with-image__description text-left"><?php echo wp_kses_post( $description ); ?></div>
            <?php endif; ?>

            <div dir="ltr" class="flex flex-wrap gap-4 mt-4 @max-2xl:hidden">
              <?php echo ( $button_markup ); // phpcs:ignore ?>
            </div>
          </div>
        </div>


        <div dir="ltr" class="flex flex-wrap gap-4 @2xl:hidden mt-[-2.4rem]! order-3 z-2 text-center!">
          <?php echo ( $button_markup ); // phpcs:ignore ?>
        </div>



      </div>


    </div>
  </div>
</section>