<?php
    /**
     * Template Name: Style Guide: Colors
     */
?><?php get_header(); ?>



<section class="container">
      <h1 class="pagetitle tk-purista-web cf"><?php echo esc_html(get_the_title()); ?></h1>

      <div class="grid grid-cols-4 gap-3">
        <div>
          <div class="bg-base-100 px-3 py-1.5">Base 100</div>
          <div class="bg-base-200 px-3 py-1.5">Base 200</div>
          <div class="bg-base-300 px-3 py-1.5">Base 300</div>
          <small class="block px-3 py-1 text-inherit">
            Text Base Content
          </small>
        </div>

        <div>
          <div class="px-3 py-6 bg-primary text-primary-content">
            Primary
            <small class="block">(text color is primary-content)</small>
          </div>
          <div class="px-3 py-1 text-primary-contrast">
            * Primary Contrast
          </div>
        </div>

        <div class="">
          <div class="px-3 py-6 bg-secondary text-secondary-content">
            Secondary
            <small class="block">(text color is secondary-content)</small>
          </div>
          <div class="px-3 py-1 text-secondary-contrast">
            * Secondary Contrast
          </div>
        </div>
        <div class="">
          <div class="px-3 py-6 bg-accent text-accent-content">
            Accent
            <small class="block">(text color is accent-content)</small>
          </div>
          <div class="px-3 py-1 text-accent-contrast">
            * Accent Contrast
          </div>
        </div>
        <div class="">
          <div class="px-3 py-4 bg-neutral text-neutral-content">
            Neutral
            <small class="block">(text color is neutral-content)</small>
          </div>
        </div>

        <div class="">
          <div class="px-3 py-4 bg-info text-info-content">
            Info
            <small class="block">(text color is info-content)</small>
          </div>
        </div>

        <div class="">
          <div class="px-3 py-4 bg-success text-success-content">
            Success
            <small class="block">(text color is success-content)</small>
          </div>
        </div>

        <div class="">
          <div class="px-3 py-4 bg-warning text-warning-content">
            Warning
            <small class="block">(text color is warning-content)</small>
          </div>
        </div>

        <div class="">
          <div class="px-3 py-4 bg-error text-error-content">
            Error
            <small class="block">(text color is error-content)</small>
          </div>
        </div>

        <div class="p-3 text-white bg-danger">* Danger</div>
      </div>

      <div class="grid grid-cols-4 gap-3 my-3">
        <div class="">
          <div class="p-3 bg-mid-0">* mid-0</div>
          <div class="p-3 bg-mid-100">* mid-100</div>
          <div class="p-3 bg-mid-200">* mid-200</div>
          <div class="p-3 bg-mid-300 text-mid-1000">* mid-300</div>
          <div class="p-3 bg-mid-400 text-mid-1000">* mid-400</div>
          <div class="p-3 bg-mid-500 text-mid-1000">* mid-500</div>
          <div class="p-3 bg-mid-600 text-mid-0">* mid-600</div>
          <div class="p-3 bg-mid-700 text-mid-0">* mid-700</div>
          <div class="p-3 bg-mid-800 text-mid-0">* mid-800</div>
          <div class="p-3 bg-mid-900 text-mid-0">* mid-900</div>
          <div class="p-3 bg-mid-1000 text-mid-0">* mid-1000</div>
        </div>
        <div class="">
          <div class="p-3 py-5 text-black bg-white">White</div>
          <div class="p-3 py-5 text-black bg-light">Light</div>
          <div class="p-3 py-5 text-black bg-mid">Mid</div>
          <div class="p-3 py-5 text-white bg-dark">Dark</div>
          <div class="p-3 py-5 text-white bg-black">Black</div>
          <small>
            The colors above do not switch between dark and light mode.
          </small>
        </div>
      </div>
</section>


<?php get_footer(); ?>