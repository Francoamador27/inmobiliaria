<section class="mapa">
<?php
            $address_variable = 'wilson 2435,Cordoba,Argentina'; // Puedes definir aquí la dirección que desees.
            $shortcode = '[leaflet-map scrollwheel zoomcontrol !detect-retina height=500 zoom=5 address="Argentina"]';
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
$post_types = get_post_types(array('public' => true), 'names');
$exclude_post_types = array('attachment', 'page');
$post_types = array_diff($post_types, $exclude_post_types);$args = array(
    'post_type' => $post_types, // Reemplaza con el nombre de tu CPT
    'posts_per_page' => -1, // -1 para obtener todos los posts
);

$post_types = new WP_Query($args);

if ($post_types->have_posts()) :
    while ($post_types->have_posts()) : $post_types->the_post();
        // Obtener el campo personalizado ACF "direccion-mapa"
        $direccion_mapa = get_field('direccion-mapa');
        $precio = get_field('precio');
        $post_type = get_post_type();
        $link =get_permalink();
        if($post_type==='venta'){
          $color= 'green';
        } if($post_type==='alquiler-anual'){
          $color= '#209b90';
        }else{
          $color='yellow';
        }
        // Verificar si el campo personalizado tiene valor
        if ($direccion_mapa) {
            if ($direccion_mapa) {
              echo do_shortcode('[leaflet-marker address="' . esc_attr($direccion_mapa) . '" svg background="'.esc_attr($color).'" iconClass="dashicons dashicons-star-filled" color="white"] <h4 class="title-marker">' . esc_html(get_the_title()) . '</h4> ' .'<p class="address-market">'. esc_attr($post_type) .'</p>'.'<p class="address-market">'. esc_attr($direccion_mapa) .'</p>  <a class="link-googlemaps" href="' . esc_url($url_google_maps) . '" target="_blank">Ver en Google Maps</a> [/leaflet-marker]');
          }
            // Agrega aquí cualquier otro contenido que desees mostrar para cada propiedad.
        }

    endwhile;
    wp_reset_postdata(); // Restaurar datos originales del post
else :
    // No se encontraron propiedades
    echo 'No se encontraron propiedades en venta.';
endif;
?>

<a class="link-googlemaps" href="<?php echo esc_url($url_google_maps); ?>" target="_blank">Ver en Google Maps</a>
</section>