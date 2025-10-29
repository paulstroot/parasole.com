<?php
    /**
     * Template Name: Style Guide: Components
     */
?><?php get_header(); ?>


<?php
$accordion_content = [
  (object) [
    'title' => 'First Accordion Item',
    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum varius sit amet mattis vulputate enim nulla aliquet. Et malesuada fames ac turpis egestas integer eget aliquet. Eget felis eget nunc lobortis mattis. Leo integer malesuada nunc vel risus. Ultricies mi eget mauris pharetra et ultrices. Tristique senectus et netus et. Felis eget velit aliquet sagittis id. Tempor commodo ullamcorper a lacus vestibulum sed arcu. Amet mattis vulputate enim nulla. Vulputate enim nulla aliquet porttitor lacus luctus accumsan. A erat nam at lectus urna duis convallis. Id aliquet risus feugiat in ante metus dictum at. Pharetra pharetra massa massa ultricies mi quis.',
  ],
  (object) [
    'title' => 'Second item in the accordion',
    'content' => 'Libero id faucibus nisl tincidunt eget. Augue neque gravida in fermentum et sollicitudin ac orci. Hendrerit gravida rutrum quisque non tellus orci ac. Ut morbi tincidunt augue interdum velit euismod in pellentesque. Quis ipsum suspendisse ultrices gravida dictum fusce ut placerat. Id diam maecenas ultricies mi eget. Tortor vitae purus faucibus ornare suspendisse sed. Non quam lacus suspendisse faucibus interdum. Sagittis eu volutpat odio facilisis mauris sit amet massa vitae. Et ultrices neque ornare aenean euismod elementum nisi quis. Turpis in eu mi bibendum neque.',
  ],
  (object) [
    'title' => 'Here is one more item.',
    'content' => 'Nunc sed velit dignissim sodales. Egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Nisi est sit amet facilisis magna. Faucibus vitae aliquet nec ullamcorper sit amet. Et leo duis ut diam quam nulla. Aenean sed adipiscing diam donec. Donec pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu. Consectetur adipiscing elit ut aliquam purus sit amet luctus. Maecenas accumsan lacus vel facilisis. Integer vitae justo eget magna fermentum iaculis eu non. Velit scelerisque in dictum non consectetur a erat nam. Auctor eu augue ut lectus arcu bibendum at. Quis viverra nibh cras pulvinar mattis. Nibh venenatis cras sed felis eget.',
  ]
];
?>

<?php if (have_posts() ) { while ( have_posts() ) : the_post(); ?>
<main class="main cf" id="main">

  <section class="container mb-8">
    <h1 class="pagetitle tk-purista-web cf"><?php echo esc_html(get_the_title()); ?></h1>
    <div class="prose"><?php the_content(); ?></div>
  </section>


  <div class="divider divider-accent">Buttons</div>
  <section class="container">

    <div class="grid grid-cols-2 gap-2 my-8 md:grid-cols-4">
      <button class="btn">Default</button>
      <button class="btn btn-primary">btn-primary</button>
      <button class="btn btn-secondary">btn-secondary</button>
      <button class="btn btn-accent">btn-accent</button>
      <button class="btn btn-info">btn-info</button>
      <button class="btn btn-success">btn-success</button>
      <button class="btn btn-warning">btn-warning</button>
      <button class="btn btn-error">btn-error</button>
    </div>
    <div class="grid grid-cols-2 gap-2 my-8 md:grid-cols-4">
      <button class="btn btn-outline">btn-outline</button>
      <button class="btn btn-primary btn-outline">btn-outline btn-primary</button>
      <button class="btn btn-secondary btn-outline">btn-outline btn-secondary</button>
      <button class="btn btn-accent btn-outline">btn-outline btn-accent</button>
      <button class="btn btn-info btn-outline">bbtn-outline tn-info</button>
      <button class="btn btn-success btn-outline">btn-outline btn-success</button>
      <button class="btn btn-warning btn-outline">btn-outline btn-warning</button>
      <button class="btn btn-error btn-outline">btn-outline btn-error</button>
    </div>
    <div class="grid grid-cols-2 gap-2 my-8 md:grid-cols-5">
      <button class="btn btn-xs"> btn-xs</button>
      <button class="btn btn-sm"> btn-sm</button>
      <button class="btn"> normal</button>
      <button class="btn btn-lg">btn-lg</button>
    </div>
    <div class="grid grid-cols-2 gap-2 mt-8 md:grid-cols-4">
      <button class="btn">
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
        Icon
      </button>
      <button class="btn">
        Icon After
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M432,320H400a16,16,0,0,0-16,16V448H64V128H208a16,16,0,0,0,16-16V80a16,16,0,0,0-16-16H48A48,48,0,0,0,0,112V464a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V336A16,16,0,0,0,432,320ZM488,0h-128c-21.37,0-32.05,25.91-17,41l35.73,35.73L135,320.37a24,24,0,0,0,0,34L157.67,377a24,24,0,0,0,34,0L435.28,133.32,471,169c15,15,41,4.5,41-17V24A24,24,0,0,0,488,0Z"></path></svg>
      </button>
      <button class="btn btn-icon">
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M488.56 23.44a80 80 0 0 0-113.12 0l-352 352a80 80 0 1 0 113.12 113.12l352-352a80 80 0 0 0 0-113.12zm-49.93 95.19c-19.6 19.59-37.52 22.67-51.93 25.14C373.76 146 364.4 147.6 352 160s-14 21.76-16.23 34.71c-2.48 14.4-5.55 32.33-25.15 51.92s-37.52 22.67-51.92 25.15C245.75 274 236.4 275.6 224 288s-14 21.75-16.23 34.7c-2.47 14.4-5.54 32.33-25.14 51.92s-37.53 22.68-51.93 25.15C117.76 402 108.4 403.6 96 416a16 16 0 0 1-22.63-22.63c19.6-19.59 37.52-22.67 51.92-25.14 13-2.22 22.3-3.82 34.71-16.23s14-21.75 16.22-34.7c2.48-14.4 5.55-32.33 25.15-51.92s37.52-22.67 51.92-25.14c13-2.22 22.3-3.83 34.7-16.23s14-21.76 16.24-34.71c2.47-14.4 5.54-32.33 25.14-51.92s37.52-22.68 51.92-25.15C394.24 110 403.59 108.41 416 96a16 16 0 0 1 22.63 22.63zM31.44 322.18L322.18 31.44l-11.54-11.55c-25-25-63.85-26.66-86.79-3.72L16.17 223.85c-22.94 22.94-21.27 61.79 3.72 86.78zm449.12-132.36L189.82 480.56l11.54 11.55c25 25 63.85 26.66 86.79 3.72l207.68-207.68c22.94-22.94 21.27-61.79-3.72-86.79z"></path></svg>
      </button>
    </div>
  </section>

  <div class="divider divider-accent">Badges</div>
  <section class="container">
      <div class="grid grid-cols-4 gap-2 my-8 place-items-center lg:grid-cols-8">
        <span class="badge">badge</span>
        <span class="badge badge-primary">primary</span>
        <span class="badge badge-secondary">secondary</span>
        <span class="badge badge-accent">accent</span>
        <span class="badge badge-info">info</span>
        <span class="badge badge-success">success</span>
        <span class="badge badge-warning">warning</span>
        <span class="badge badge-error">error</span>
        <span class="badge badge-outline">badge</span>
        <span class="badge badge-primary badge-outline">primary</span>
        <span class="badge badge-secondary badge-outline">secondary</span>
        <span class="badge badge-accent badge-outline">accent</span>
        <span class="badge badge-info badge-outline">info</span>
        <span class="badge badge-success badge-outline">success</span>
        <span class="badge badge-warning badge-outline">warning</span>
        <span class="badge badge-error badge-outline">error</span>
      </div>
      <div class="grid grid-cols-2 gap-2 my-8 place-items-center md:grid-cols-3">
        <span class="badge badge-success"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg>
          Icon Before
        </span>
        <span class="badge badge-primary">
          Icon After
          <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"></path></svg>
        </span>
        <span class="badge badge-secondary">
          <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M488.56 23.44a80 80 0 0 0-113.12 0l-352 352a80 80 0 1 0 113.12 113.12l352-352a80 80 0 0 0 0-113.12zm-49.93 95.19c-19.6 19.59-37.52 22.67-51.93 25.14C373.76 146 364.4 147.6 352 160s-14 21.76-16.23 34.71c-2.48 14.4-5.55 32.33-25.15 51.92s-37.52 22.67-51.92 25.15C245.75 274 236.4 275.6 224 288s-14 21.75-16.23 34.7c-2.47 14.4-5.54 32.33-25.14 51.92s-37.53 22.68-51.93 25.15C117.76 402 108.4 403.6 96 416a16 16 0 0 1-22.63-22.63c19.6-19.59 37.52-22.67 51.92-25.14 13-2.22 22.3-3.82 34.71-16.23s14-21.75 16.22-34.7c2.48-14.4 5.55-32.33 25.15-51.92s37.52-22.67 51.92-25.14c13-2.22 22.3-3.83 34.7-16.23s14-21.76 16.24-34.71c2.47-14.4 5.54-32.33 25.14-51.92s37.52-22.68 51.92-25.15C394.24 110 403.59 108.41 416 96a16 16 0 0 1 22.63 22.63zM31.44 322.18L322.18 31.44l-11.54-11.55c-25-25-63.85-26.66-86.79-3.72L16.17 223.85c-22.94 22.94-21.27 61.79 3.72 86.78zm449.12-132.36L189.82 480.56l11.54 11.55c25 25 63.85 26.66 86.79 3.72l207.68-207.68c22.94-22.94 21.27-61.79-3.72-86.79z"></path></svg></span><span class="badge badge-success badge-outline"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg> Icon Before</span><span class="badge badge-primary badge-outline"> <!-- -->Icon After <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"></path></svg></span><span class="badge badge-secondary badge-outline"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M488.56 23.44a80 80 0 0 0-113.12 0l-352 352a80 80 0 1 0 113.12 113.12l352-352a80 80 0 0 0 0-113.12zm-49.93 95.19c-19.6 19.59-37.52 22.67-51.93 25.14C373.76 146 364.4 147.6 352 160s-14 21.76-16.23 34.71c-2.48 14.4-5.55 32.33-25.15 51.92s-37.52 22.67-51.92 25.15C245.75 274 236.4 275.6 224 288s-14 21.75-16.23 34.7c-2.47 14.4-5.54 32.33-25.14 51.92s-37.53 22.68-51.93 25.15C117.76 402 108.4 403.6 96 416a16 16 0 0 1-22.63-22.63c19.6-19.59 37.52-22.67 51.92-25.14 13-2.22 22.3-3.82 34.71-16.23s14-21.75 16.22-34.7c2.48-14.4 5.55-32.33 25.15-51.92s37.52-22.67 51.92-25.14c13-2.22 22.3-3.83 34.7-16.23s14-21.76 16.24-34.71c2.47-14.4 5.54-32.33 25.14-51.92s37.52-22.68 51.92-25.15C394.24 110 403.59 108.41 416 96a16 16 0 0 1 22.63 22.63zM31.44 322.18L322.18 31.44l-11.54-11.55c-25-25-63.85-26.66-86.79-3.72L16.17 223.85c-22.94 22.94-21.27 61.79 3.72 86.78zm449.12-132.36L189.82 480.56l11.54 11.55c25 25 63.85 26.66 86.79 3.72l207.68-207.68c22.94-22.94 21.27-61.79-3.72-86.79z"></path></svg>
        </span>
      </div>
  </section>

  <div class="divider divider-accent">Alerts</div>
  <section class="container">
    <div class="flex flex-col gap-3 mt-8">
      <div class="alert">
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path></svg>
        <span>12 unread messages. Tap to see.</span>
      </div>
      <div class="alert alert-info">
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path></svg>
        <span>New software update available.</span>
      </div>
      <div class="alert alert-success">
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg>
        <span>Your purchase has been confirmed!</span>
      </div>
      <div class="alert alert-warning">
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><g id="Warning"><g><g><path d="M12.5,8.752a.5.5,0,0,0-1,0h0v6a.5.5,0,0,0,1,0Z"></path><circle cx="11.999" cy="16.736" r="0.5"></circle></g><path d="M18.642,20.934H5.385A2.5,2.5,0,0,1,3.163,17.29L9.792,4.421a2.5,2.5,0,0,1,4.444,0L20.865,17.29a2.5,2.5,0,0,1-2.223,3.644ZM12.014,4.065a1.478,1.478,0,0,0-1.334.814L4.052,17.748a1.5,1.5,0,0,0,1.333,2.186H18.642a1.5,1.5,0,0,0,1.334-2.186L13.348,4.879A1.478,1.478,0,0,0,12.014,4.065Z"></path></g></g></svg>
        <span>Warning: Invalid email address!</span>
      </div>
      <div class="alert alert-error">
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path></svg>
        <span>Error! Task failed successfully.</span>
      </div>
    </div>
  </section>

  <div class="divider divider-accent">Modals</div>
  <section class="container">
    <button class="btn btn-secondary" onclick="my_modal_2.showModal()">open modal</button>
    <dialog id="my_modal_2" class="modal">
      <div class="modal-box">
        <form method="dialog">
          <button class="absolute btn btn-sm btn-circle btn-ghost right-2 top-2">✕</button>
        </form>
        <h3 class="text-lg font-bold">Hello Modal!</h3>
        <p class="py-4">Close the modal with the ESC key, the "X" button in the corner, the close button or click outside.</p>
        <div class="modal-action">
          <form method="dialog">
            <button class="btn">Close</button>
          </form>
        </div>
      </div>
      <form class="modal-backdrop" method="dialog">
        <button>close</button>
      </form>
    </dialog>
  </section>

  <div class="divider divider-accent">Expand/Collapse</div>
  <section class="container">
    <div class="mb-8">
      <details class="collapse collapse-arrow bg-base-200">
        <summary class="text-xl font-medium collapse-title">Click to open/close</summary>
        <div class="collapse-content">
          <p>content</p>
        </div>
      </details>
    </div>
    <div>
      <details class="rounded-md collapse collapse-arrow bg-base-200">
        <summary class="p-2 text-lg font-medium text-white collapse-title bg-dark !min-h-0">This one has a dark header</summary>
        <div class="collapse-content">
          <div class="p-8">content</div>
        </div>
      </details>
    </div>
  </section>

  <div class="divider divider-accent">Accordion</div>
  <section class="container">
      <div class="flex flex-col items-center justify-center gap-2">
        <div class="collapse bg-base-200">
          <input type="radio" name="my-accordion-1" checked="checked" />
          <div class="text-xl font-medium collapse-title">
            Click to open this one and close others
          </div>
          <div class="collapse-content">
            <p>hello</p>
          </div>
        </div>
        <div class="collapse bg-base-200">
          <input type="radio" name="my-accordion-1" />
          <div class="text-xl font-medium collapse-title">
            Click to open this one and close others
          </div>
          <div class="collapse-content">
            <p>hello</p>
          </div>
        </div>
        <div class="collapse bg-base-200">
          <input type="radio" name="my-accordion-1" />
          <div class="text-xl font-medium collapse-title">
            Click to open this one and close others
          </div>
          <div class="collapse-content">
            <p>hello</p>
          </div>
        </div>
      </div>
  </section>


  <div class="divider divider-accent">Checks, Radios and Range Pickers</div>
  <section class="container">
      <div class="flex flex-col gap-3 mt-8 md:flex-row">
        <div class="md:w-1/2">
          <div class="flex gap-2 mb-2">
            <input type="checkbox" class="toggle">
            <input type="checkbox" class="toggle toggle-primary">
            <input type="checkbox" class="toggle toggle-secondary">
            <input type="checkbox" class="toggle toggle-accent">
          </div>
          <div class="flex gap-2 mb-2">
            <input type="checkbox" class="checkbox">
            <input type="checkbox" class="checkbox checkbox-primary">
            <input type="checkbox" class="checkbox checkbox-secondary">
            <input type="checkbox" class="checkbox checkbox-accent">
          </div>
          <div class="flex gap-2 mb-2">
            <input type="radio" class="radio" name="radio-1">
            <input type="radio" class="radio radio-primary" name="radio-1">
            <input type="radio" class="radio radio-secondary" name="radio-1">
            <input type="radio" class="radio radio-accent" name="radio-1">
          </div>
        </div>
        <div class="md:w-1/2">
          <input type="range" min="0" max="100" class="range range-xs bg-mid-400" value="90">
          <input type="range" min="0" max="100" class="range range-xs range-primary bg-mid-200" value="70">
          <input type="range" min="0" max="100" class="range range-xs range-secondary bg-mid-200" value="50">
          <input type="range" min="0" max="100" class="range range-xs range-accent bg-mid-200" value="40">
        </div>
      </div>
  </section>

  <div class="divider divider-accent">Steps</div>
  <section class="container">
      <div class="mt-10">
        <ul class="w-full m-0 steps steps-horizontal">
          <li class="step step-primary">Step 1</li>
          <li class="step step-primary">Step 2</li>
          <li class="step">Step 3</li>
          <li class="step">Step 4</li>
        </ul>
      </div>
  </section>

  <div class="divider divider-accent">Icons</div>
  <section class="container">
    <p>
      This starter uses "<a href="https://remixicon.com/icon/twitter-fill" target="_blank">Remixicon</a>" icons. The CSS include can be found in _includes/head.html. Search <a href="https://remixicon.com/icon/twitter-fill" target="_blank">the Remixicon site</a> for a list of available icons and how to implement.
    </p>
    <div class="text-4xl">
      <i class="ri-facebook-circle-fill"></i>
      <i class="ri-twitter-fill"></i>
      <i class="ri-linkedin-box-fill"></i>
      <i class="ri-instagram-fill"></i>
      <i class="ri-star-fill"></i>
    </div>
  </section>



  <div class="divider divider-accent">Tiny Slider Carousel</div>
  <section class="container">
      <div class="overflow-hidden slider-extend-beyond-bounds" role="region" aria-labelledby="carouselheading" aria-roledescription="carousel">
        <?php
        if (wp_script_is('tiny-slider', 'enqueued')) {
            ?>
          <p>The Tiny Slider javascript is included directly in this page. If you use it for your site you will probably want to move it to it's own javascript file in the lib/scripts directory.</p>
          <p class="text-sm text-mid"><i>Note: Tiny Slider library is no longer maintained. You may want to use a different carousel library</i></p>
          <div class="flex tinyslider-example ">
            <div class="p-10 bg-red-300" role=group aria-roledescription="slide" aria-labelledby="slide-1_heading">
              <article>
                <h3 id="slide-1_heading"><a class='leading-3 text-base' href="https://www.smashingmagazine.com/2023/02/guide-building-accessible-carousels/">Accessible Carousels</a></h3>
                <p>Most carousels come along with usability and accessibility issues. To avoid these issues, this article addresses step-by-step design considerations as well as semantic requirements for carousels to be accessible. </p>
              </article>
            </div>
            <div class="p-10 bg-gray-400" role=group aria-roledescription="slide" aria-labelledby="slide-2_heading">
              <article>
                <h3 id="slide-2_heading"><a href="https://www.w3.org/WAI/ARIA/apg/patterns/carousel/">W3C implementing an accessible carousel </a></h3>
                <p>W3C's Guidance on how to implement an accessible carousel.</p>
              </article>
            </div>
            <div class="p-10 bg-primary" role=group aria-roledescription="slide" aria-labelledby="slide-3_heading">
              <article>
                <h3 id="slide-3_heading">Aria Roles on Container</h3>
                <p>Note that the container element has "ariea-labeldby" which points to the h2 element. If there is not a visible header element you could use the aria-label tag and name the carousel using a string parameter.</p>
              </article>
            </div>
            <div class="p-10 bg-gray-600" role=group aria-roledescription="slide" aria-labelledby="slide-4_heading">
              <article>
                <h3 id="slide-4_heading">Aria Roles on Slide</h3>
                <p>This example uses an HTML5 list. If you are using div elements, you should put "role=group" on each slide</p>
              </article>
            </div>
            <div class="p-10 bg-blue-200" role=group aria-roledescription="slide" aria-label="Slide 5 of 6">
              <h3 id="slide-4_heading">Aria Label Example</h3>
              <p>Example of adding aria-label instead of area-labelledby</p>
            </div>
            <div class="p-10 bg-gray-600" role=group aria-roledescription="slide" aria-labelledby="slide-6_heading">
              <article>
                <h3 id="slide-6_heading">Use List or DIVs?</h3>
                <p>If you truly hide the slides that are not visible, you should not use list markup for the whole set of slides. Screen readers do announce the number of list items (which may seem helpful) but will ignore hidden ones. Concerning the carousel, list markup would not result in an output of the total number of list items but just the visible ones. If only one slide is visible, that wouldn’t be very helpful.</p>
              </article>
            </div>
          </div>

          <div id="custom-controls" role="group" aria-label="Carousel Navigation" tabindex="0" class="flex justify-between mt-3 border">
              <button class="p-3 bg-blue-200 previous" aria-label="show previous slide">Prev</button>
              <button class="p-3 bg-blue-200 next" aria-label="show next slide">Next</button>
          </div>
          <button class="block m-auto auto"></button>
        <?php } else { ?>
          <p>Tiny Slider is currently deactivated. To activate, uncomment the "tiny-slider" scripts in theme/library/functions/scripts-and-enqueing.php
        <?php } ?>
      </div>
  </section>

  <div class="divider divider-accent">Swiper Carousel</div>
    <section>
      <div class="container">
        <?php
        if (wp_script_is('swiper', 'enqueued')) {
            ?>
          <!-- Slider main container -->
          <div class="swiper swiper-example">
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="py-20 text-center swiper-slide bg-accent">Slide 1</div>
                <div class="py-20 text-center swiper-slide bg-primary">Slide 2</div>
                <div class="py-20 text-center swiper-slide bg-secondary">Slide 3</div>
                <div class="py-20 text-center swiper-slide bg-primary">Slide 4</div>
                <div class="py-20 text-center swiper-slide bg-error">Slide 5</div>
                <div class="py-20 text-center swiper-slide bg-primary-contrast">Slide 6</div>
            </div>
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <!-- <div class="swiper-scrollbar"></div> -->

          </div>

            <?php
        } else {
            ?>
            <p class="my-4"><a href="https://swiperjs.com/" target="_blank">Swiper carousel</a> is currently deactivated. To activate, uncomment the "swiper" scripts in theme/library/functions/scripts-and-enqueing.php</p>
            <p><a href="https://swiperjs.com/get-started" target="_blank">Click here for documentation</a></p>
            <?php
        }
        ?>
      </div>
    </section>



</main>

<?php endwhile;
}; ?>

<?php get_footer(); ?>