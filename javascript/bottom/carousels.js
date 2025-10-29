/** SwiperJS is a lightweight carousel library that does not rely on jQuery.
 *
 * It is enqueued in theme/library/functins/scripts-and-enqueing.php (both the minified JS and CSS files).
 */

if (typeof Swiper !== "undefined") {
  // eslint-disable-next-line no-undef
  new Swiper('.swiper-example', {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
}

if (typeof tns !== "undefined") {
  let tinyslider_example = tns({
    container: '.tinyslider-example',
    mouseDrag: true,
    items: 1,
    loop: true,
    arrowKeys: true,
    freezable: true,
    autoHeight: true,
    controls: true,
    controlsContainer: "#custom-controls",
    autoplayButton: '.auto',
    autoplay: true,
    autoplayText: ['Start', 'Stop'],
    autoplayHoverPause: true,
    slideBy: 1,
    gutter:0,
    edgePadding:0,
    nav:true,
    navPosition:'bottom',
    responsive: {
      400: {
        items: 2
      },
      767: {
        items: 3,
      },
      1000: {
        items: 4,
      }
    }
  });
}

