<style>
.swiper-button-next.swiper-button-disabled, .swiper-button-prev.swiper-button-disabled {
    opacity: .35;
    cursor: auto;
    pointer-events: auto;
}</style>
<?php 
$images = get_field('galeria');
if( $images ): ?>
    <div class="swiper mySwiperCard">
    <div class="swiper-wrapper">
        <?php foreach( $images as $image ): ?>
            <?php 
                // Obtiene la URL de la imagen redimensionada según el tamaño 'card-image'
                $image_src = wp_get_attachment_image_src($image['ID'], 'card-image');
            ?>
            <div class="swiper-slide">
                <img src="<?php echo esc_url($image_src[0]); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            </div>            
        <?php endforeach; ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
    </div>
<?php endif; ?>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

        <script>

var swiper2 = new Swiper(".mySwiperCard", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
    },
    watchOverflow: true,
  });

    </script>
            