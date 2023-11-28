<!-- mi_componente.php -->
<div class="mi-componente">
    <h3 class="hab-title3"> Habilitaciones</h3>
    <h4 class="habi-serv">Te asesoramos y logramos  todos los requisitos para conseguir tu habilitación</h4>

    <?php
     $args = array(
        'post_type'      => 'habilitaciones',
        'posts_per_page' => 10,
    );
    $query = new WP_Query($args);

    // Comprobar si hay posts disponibles
    if ($query->have_posts()) {

    ?>
        <div class="swiper mySwiper">
         <div class="swiper-wrapper">
        <?php
        while ($query->have_posts()) {
            $query->the_post();
            // Obtener el campo personalizado (ACF) "descripcion_corta"
            ?>
            <div class="swiper-slide">
                <div class="habilitacion-item">
                <a href="' . get_permalink() . '">
                    <!--  Mostrar la imagen destacada -->
                 <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('square'); // Puedes cambiar el tamaño de la imagen aquí (ejemplo: 'medium', 'large', etc.)
                    }?>
                 </a>
            <h3 class="card-title"><a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></h3>
            <p class="texto-contenedor">      <?php
                    $descripcion_corta = get_field('descripcion_corta');
                    $words = explode(' ', $descripcion_corta);
                    $limited_description = implode(' ', array_slice($words, 0, 100));
                    
                    // Si el número de palabras en el texto es mayor que 100, agregamos "..."
                    if (count($words) > 100) {
                        $limited_description .= '...';
                    }
                    
                    echo $limited_description;
                    ?></p>
            <a class="btn-read" href="<?php echo get_permalink() ?>"> Leer Más</a></h2>

            </div>
            </div>
        <?php } ?>
     
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>

        </div>

        <?php
        // Restaurar los datos originales del loop de WordPress
        wp_reset_postdata();
    } else {
        echo '<p>No se encontraron habilitaciones.</p>';
    }
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<div class="contact-habi">
    <h3 class="hab-title3">Contacta con los mejores profesionales</h3>
    <h3 class="">Tu Habilitación Segura y Exitosa. ¡Somos la Elección Indiscutible !</h3>
</div> 
   

<!-- Importar asi  -->
<!--
    <div class="">
            <?php // get_template_part('components/list-habilitaciones'); ?>
    </div>  -->