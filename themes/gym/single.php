<style>
    h4.title-marker {
    font-size: 17px;
    margin: 0px;
    margin-bottom: 10px;
    font-weight: 600;
}
.title_banner{

    text-align: center;
}
.background{
    background-color: #015089;
    padding: 20px;
}
h1.title_single {
    color: white;
    font-family: var(--fuentePrincipal);
    font-weight: 900;
    font-size: 40px;
}
.title_single a {
    color: white;
    text-decoration: underline;
}


</style>
<style>
 

    .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

  

    .swiper {
      width: 100%;
      height: 300px;
      margin-left: auto;
      margin-right: auto;
    }

    .swiper-slide {
      background-size: cover;
      background-position: center;
    }

    .mySwiper2 {
      height: 80%;
      width: 100%;
    }

    .mySwiper {
      height: 20%;
      box-sizing: border-box;
      padding: 10px 0;
    }

    .mySwiper .swiper-slide {
      width: 25%;
      height: 100%;
      opacity: 0.4;
    }

    .mySwiper .swiper-slide-thumb-active {
      opacity: 1;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    section.carrousel-gallery {
    width: 500px;
    height: 70%;
}
.swiper.mySwiperMiniaturas.swiper-initialized.swiper-horizontal.swiper-free-mode.swiper-watch-progress.swiper-backface-hidden.swiper-thumbs {
    height: 80px;
}
  </style>
<?php get_header();?>
<?php 
 $categorias = get_the_category();
?>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<div class="background">
 <section class="main-single">
        <div class="title-midle">
        <h1 class="title_single"><?php the_title();?> en <?php
             if ($categorias) {
                // Itera sobre cada categoría
                foreach ($categorias as $categoria) {
                    // Muestra el nombre de la categoría
                    echo '<a href="' . esc_url(get_category_link($categoria->term_id)) . '">' . esc_html($categoria->name) . ' </a>';
                }
            }
        ?></h1>
        <p class="eslogan"><?php echo get_field('descripcion_corta') ?></p>
        </div>
        <div class="img-single">
        <section class="carrousel-gallery">
        <?php
// Obtén el valor del campo 'galeria'
$galeria = get_field('galeria');

// Verifica si hay imágenes en el campo 'galeria'
if ($galeria) {
    ?>
    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiperCarrousel">
        <div class="swiper-wrapper">
            <?php
            // Itera sobre las imágenes y crea los slides
            foreach ($galeria as $imagen) {
                ?>
                <div class="swiper-slide">
                    <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" />
                </div>
                <?php
            }
            ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <!-- Miniaturas -->
    <div thumbsSlider="" class="swiper mySwiperMiniaturas">
        <div class="swiper-wrapper">
            <?php
            // Itera sobre las imágenes y crea las miniaturas
            foreach ($galeria as $imagen) {
                ?>
                <div class="swiper-slide">
                    <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" />
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}
?>
  </section>
        </div>
</section>
</div>

<main class="container">
             <div class=" flex-service">
        <div class="principal">
            
            <?php the_content(); ?>
            <?php
            $address_variable = get_field('direccion-mapa'); // Puedes definir aquí la dirección que desees.
            $shortcode = '[leaflet-map height=500  address="' . esc_attr($address_variable) . '" zoom=15 zoomcontrol detect-retina]';
            $post_title = get_the_title();
            echo do_shortcode($shortcode);
            ?>
            <?php
            $direccion = get_field('direccion-mapa'); // Cambia esto según la dirección que desees mostrar.
            $zoom = 15; // Cambia esto al nivel de zoom deseado.
            $direccion_url = urlencode(str_replace(' ', '+', $direccion));
            $url_google_maps = "https://www.google.com/maps?q=" . $direccion_url . "&z=" . $zoom;
            ?>
<?php
echo do_shortcode('[leaflet-marker svg background="yellow" iconClass="dashicons dashicons-star-filled" color="white"] <h4 class="title-marker">' . esc_html($post_title) . '</h4> ' .'<p class="address-market">'. esc_attr($address_variable) .'</p> <a class="link-googlemaps" href="' . esc_url($url_google_maps) . '" target="_blank">Ver en Google Maps</a> [/leaflet-marker]');
?>
<a class="link-googlemaps" href="<?php echo esc_url($url_google_maps); ?>" target="_blank">Ver en Google Maps</a>
        </div>
    
</main>

<script>
    var swiper = new Swiper(".mySwiperMiniaturas", {
      loop: true,
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiperCarrousel", {
      loop: true,
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiper,
      },
    });
  </script>


    
<?php get_footer();?>