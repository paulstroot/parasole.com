<?php
    /**
     * Template Name: Style Guide: Layout
     */
?><?php get_header(); ?>

<?php if (have_posts() ) { while ( have_posts() ) : the_post(); ?>
<main class="main cf" id="main">

  <section class="container mb-8">
    <h1 class="pagetitle tk-purista-web cf"><?php echo esc_html(get_the_title()); ?></h1>
    <div class="prose"><?php the_content(); ?></div>
  </section>

  <div class="divider divider-accent">Containers</div>
<section class="">
<div class="my-4 container-narrow bg-primary">Narrow Container</div>
<div class="container my-4 bg-secondary">Normal Container</div>
<div class="my-4 container-wide bg-accent">Wide Container</div>
</section>
<div class="divider divider-accent">Columns</div>
<div class="overflow-x-hidden">
<div class="container">
<div class="flex-row gap-4 my-4 w-full sm:flex">
<div class="p-4 sm:w-3/4 bg-secondary">Right Col 3/4</div>
<div class="p-4 sm:w-1/4 bg-primary">Left Col 1/4</div>
</div>
<div class="flex-row gap-4 my-4 w-full sm:flex">
<div class="p-4 sm:w-2/3 bg-secondary">Right Col 2/3</div>
<div class="p-4 sm:w-1/3 bg-primary">Left Col 1/3</div>
</div>
<div class="flex-row gap-4 my-4 w-full sm:flex">
<div class="p-4 sm:w-1/2 bg-secondary">Left Col 1/2</div>
<div class="p-4 sm:w-1/2 bg-primary">Right Col 1/2</div>
</div>
<div class="sm:flex">
<div class="relative p-4 sm:w-3/4">

Columns with background color to edge of screen.A bit of a hack, but it works. The background colors actually go off the edges of the sreen, but are hidden by overflow:hidden on the parent. (This would NOT work with a background image)
<div class="left-1/2 sm:left-auto tranform -translate-x-1/2 sm:translate-x-0 absolute h-full right-0 top-0 w-[100vw] bg-secondary " style="z-index: -1;"></div>
</div>
<div class="relative p-4 sm:w-1/4">

Right Col 1/4
<div class="left-1/2 tranform -translate-x-1/2 sm:translate-x-0 absolute h-full sm:left-0 top-0 w-[100vw] bg-primary " style="z-index: -1;"></div>
</div>
</div>
</div>
<div class="divider divider-accent">Panel</div>
<section class="container">
<div class="panel">
<div class="panel-header">Panel Header</div>
<div class="panel-content">A panel is a block of text visually separated by some sort of a container. Your design may or may not have the need for this element. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum debitis suscipit perferendis est aliquam quam repellat ea! Odio illum tenetur, explicabo nulla eum, ad expedita quia voluptatem, perferendis corporis exercitationem!</div>
</div>
</section>
<div class="divider divider-accent">Data Table</div>
<section class="container">
<table class="table">
<thead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
</tr>
</thead>
<tbody>
<tr>
<td>
<div class="mobile-label">Name:</div>
Paul</td>
<td>
<div class="mobile-label">Email:</div>
paulstroot@gmail</td>
<td>
<div class="mobile-label">Phone:</div>
+1 555 555 5555</td>
</tr>
<tr>
<td>
<div class="mobile-label">Name:</div>
Leo</td>
<td>
<div class="mobile-label">Email:</div>
leonardo@dicaprio.com</td>
<td>
<div class="mobile-label">Phone:</div>
+1 555 555 5555</td>
</tr>
<tr>
<td>
<div class="mobile-label">Name:</div>
John</td>
<td>
<div class="mobile-label">Email:</div>
John@Doe.com</td>
<td>
<div class="mobile-label">Phone:</div>
+1 555 555 5555</td>
</tr>
</tbody>
</table>
</section>
<div class="divider divider-accent">Definition List</div>
<section class="container">
<dl class="data-list">
 	<dt class="">Client:</dt>
 	<dd class="">Johnson and Mable</dd>
 	<dt class="">Description:</dt>
 	<dd class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</dd>
 	<dt class="">Location:</dt>
 	<dd class="">Los Angeles, CA</dd>
 	<dt class="">Rating</dt>
 	<dd class="">Stellar</dd>
</dl>
</section>
<div class="divider divider-accent">Cards</div>
<section class="container">
<div class="max-w-xs shadow-xl card bg-base-200">
<figure><img src="https://images.pexels.com/photos/891059/pexels-photo-891059.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=1260&amp;h=750&amp;dpr=1" alt="Card Title" /></figure>
<div class="card-body">
<h2 class="card-title">Card Title</h2>
<div>This is the card description. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor lacus in ex lacinia, in mattis ipsum pretium. Nunc nec diam velit. Vivamus at sapien eu odio commodo suscipit a at mauris. Interdum et malesuada fames ac ante ipsum primis in fauc</div>
<div class="justify-end card-actions"><a class="btn btn-primary" href="{#">Read More</a></div>
</div>
</div>
</section></div>


</main>

<?php endwhile;
}; ?>

<?php get_footer(); ?>