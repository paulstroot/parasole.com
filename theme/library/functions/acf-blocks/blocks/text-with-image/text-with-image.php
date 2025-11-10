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
$buttons          = get_field( 'buttons' );
$background_color = get_field( 'background_color' );
$reverse_order    = get_field( 'reverse_order' );
$logo             = get_field( 'logo' );
$image            = get_field( 'image' );

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$cta_btn_class = 'btn btn-outline btn-primary mx-auto btn-sm z-10 bg-white! hover:bg-primary! hover:text-white! h-auto';


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
                <?php echo wp_get_attachment_image( $logo['ID'], 'large',false , array( 'class' => 'text-with-image__img w-auto max-h-[150px] @2xl:max-h-none mx-auto @2xl:h-40' ) ); ?>
              </figure><!-- .logo_block -->
            <?php endif; ?>

            <?php if ( $headline ) : ?>
              <h2 dir="ltr" class="text-with-image__headline text-left my-0!"><?php echo esc_html( $headline ); ?></h2>
            <?php endif; ?>

            <?php if ( $description ) : ?>
              <div dir="ltr" class="text-with-image__description text-left"><?php echo wp_kses_post( $description ); ?></div>
            <?php endif; ?>

            <?php if ( $buttons ) : ?>
              <div dir="ltr" class="@max-2xl:hidden">
                <?php
                foreach($buttons as $button):?>
                  <a  href="<?php echo esc_url( $button['button_url'] ); ?>" class="inline-block btn-arrow-after h-auto <?php echo esc_attr( $cta_btn_class ); ?>" target="_blank"><?php echo esc_html( $button['button_label'] ); ?></a>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div><!-- END Buttons -->
        </div>


        <?php if ( $buttons ) : ?>
            <div dir="ltr" class="@2xl:hidden mt-[-2.4rem]! order-3 z-2 text-center!">
              <?php foreach($buttons as $button): ?>
                <a href="<?php echo esc_url( $button['button_url'] ); ?>" class="inline-block btn-arrow-after h-auto <?php echo esc_attr( $cta_btn_class ); ?>" target="_blank"><?php echo esc_html( $button['button_label'] ); ?></a>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div><!-- END Buttons -->


      </div>


    </div>
  </div>
</section>