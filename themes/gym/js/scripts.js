jQuery(document).ready( $=>{
 
 

  $("li").hover(
    function() {
      $(this).find("ul.sub-menu").addClass("show-block");
    },
    function() {
      $(this).find("ul.sub-menu").removeClass("show-block");

    }
  );



  $(".card").hover(
    function() {
      $(this).find(".left-curve, .right-curve").addClass("active-hover");
      $(this).find(".btn-card").addClass("active-btn");

    },
    function() {
      $(this).find(".left-curve, .right-curve").removeClass("active-hover");
      $(this).find(".btn-card").removeClass("active-btn");

    }
  );
  // MENU
  $('.site_header .menu-principal .menu').slicknav({
    label:'',
    appendTo:".site_header",
});




  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 4,
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      "@0.00": {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      "@0.75": {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      "@1.00": {
        slidesPerView: 2,
        spaceBetween: 40,
      },
      "@1.50": {
        slidesPerView: 3,
        spaceBetween: 50,
      },
    },
  });

  // BANNER JS
  var swiper2 = new Swiper(".mySwiper2", {
    speed: 800,
    navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          "@0.00": {
            slidesPerView: 1,
            spaceBetween: 10,
          },
          "@0.75": {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          "@1.00": {
            slidesPerView: 2,
            spaceBetween: 40,
          },
          "@1.50": {
            slidesPerView: 3,
            spaceBetween: 50,
          },
        },
        autoplay: {
              delay: 5500,
              disableOnInteraction: false,
            },
            pagination: {
                  el: ".swiper-pagination",
                  clickable: true,
                },
  });


  var swiperSingle = new Swiper(".mySwiperSingle", {
    speed: 800,
    navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          "@0.00": {
            slidesPerView: 1,
            spaceBetween: 10,
          },
          "@0.75": {
            slidesPerView: 1,
            spaceBetween: 20,
          },
          "@1.00": {
            slidesPerView: 2,
            spaceBetween: 40,
          },
          "@1.50": {
            slidesPerView: 3,
            spaceBetween: 50,
          },
        },
        autoplay: {
              delay: 5500,
              disableOnInteraction: false,
            },
            pagination: {
                  el: ".swiper-pagination",
                  clickable: true,
                },
  });


  var mapContainer = document.getElementById('leaflet-map-container');
  
  if (mapContainer) {
    var map = L.map(mapContainer).setView([-33.85, 151.21], 8);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker([-33.85, 151.21], { draggable: true }).addTo(map);
  }

});



