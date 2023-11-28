

<style>
   
.title-logos{
    text-align: center;
    color: white;
        text-transform: uppercase;
}
    .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide.logos {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide.logos img {
      display: block;
      width: 50%;
      height: 100%;
      object-fit: cover;
    }
 
  </style>
  <div class="title-single">
  <h3 class="title-logos">Confían en nosotros</h3>

			</div>

<div class="swiper mySwiperLogos">
    <div class="swiper-wrapper">
      <div class="swiper-slide .logos"><img src="/wp-content/uploads/2023/08/logo8.png" /></div>
      <div class="swiper-slide .logos"><img src="/wp-content/uploads/2023/08/logo7.png" /></div>
      <div class="swiper-slide .logos"><img src="/wp-content/uploads/2023/08/logo6.png" /></div>
      <div class="swiper-slide .logos"><img src="/wp-content/uploads/2023/08/logo5.png" /></div>
      <div class="swiper-slide .logos"><img src="/wp-content/uploads/2023/08/logo3.png" /></div>
      <div class="swiper-slide .logos"><img src="/wp-content/uploads/2023/08/logo2.png" /></div>
      <div class="swiper-slide .logos"><img src="/wp-content/uploads/2023/08/logo1.png" /></div>
      <div class="swiper-slide .logos"><img src="/wp-content/uploads/2023/08/logo9.png" /></div>
      <div class="swiper-slide .logos"><img src="/wp-content/uploads/2023/08/logo10.png" /></div>
      <div class="swiper-slide .logos"><img src="/wp-content/uploads/2023/08/logo11.png" /></div>
      <div class="swiper-slide .logos"><img src="/wp-content/uploads/2023/08/logo12.png" /></div>
     
    </div>
  </div>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiperLogos", {
      slidesPerView: 4,
      centeredSlides: true,
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
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
          slidesPerView: 3,
          spaceBetween: 40,
        },
        "@1.50": {
          slidesPerView: 4,
          spaceBetween: 50,
        },
      },
      spaceBetween: 30,
      grabCursor: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>