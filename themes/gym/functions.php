<?php
require get_template_directory() . '/includes/widgets.php';

//cuando el tema es activado
function hyslfi_setup(){
    function mi_login_logo_one() { 
        ?>
        <style type="text/css"> 
        body.login div#login h1 a {
            background-image: url("<?php echo get_template_directory_uri(); ?>/img/logo_nuevo.png");
            padding-bottom: 30px; 
        } 
        </style>
        <?php 
        } 
add_action( 'login_enqueue_scripts', 'mi_login_logo_one' );
// Habilitar imagenes destacadas
add_theme_support('post-thumbnails');

 //agregar tamaño de imagenes
add_image_size('square', 246, 230, true);
add_image_size('card-image', 250, 297, true);
add_image_size('image-marker', 200, 150, true);
add_image_size('portrait', 350, 724, true);
add_image_size('cajas', 410, 297, true);
add_image_size('mediano', 700, 400, true);
add_image_size('blog', 966, 644, true);
//TITULOS PARA SEO
add_theme_support('title-tag');

}

add_action('after_setup_theme', 'hyslfi_setup');
function cambiar_tamano_thumbnail() {
    set_post_thumbnail_size(300, 9999); // Ancho de 300 píxeles y altura proporcional
}
add_action('after_setup_theme', 'cambiar_tamano_thumbnail');
// MENU DE NAVEGACIO,. AGREGAR UTILIZANDO EL ARRAY
function menus_gym(){
register_nav_menus(array(
"menu-principal" => __( " Menu Principal", "hyslfi"),
"menu-principal2" => __( " Menu Principal 2", "hyslfi"),
"menu-principal3" => __( " Menu Principal 3", "hyslfi")
));
}
add_action("init", "menus_gym");


//SCRIPTS Y STYLES

function gtm_scripts_styles(){
    // agregar normalize.css
    wp_enqueue_style("normalize", get_template_directory_uri() . "/css/normalize.css", array(), "8.0.1");

    wp_enqueue_style("slickNavCSS", get_template_directory_uri() . "/css/slicknav.min.css", array(), "1.0.0");

    //AGREGAR FUENTES DE GOOGLE FONTS
    wp_enqueue_style("googlefonts", "https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,500;0,600;0,700;1,400&family=Raleway:wght@100;300;700&family=Staatliches&display=swap", array(), "1.0.0");
    wp_enqueue_style("googlefonts2", "https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap", array(), "1.0.0");

    //AGREGAR FONTWASONE
    wp_enqueue_style("fontwasone", "//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css", array(), "1.0.0");

    //Agregar CSS de Swiper

    wp_enqueue_style("swiperCss", "https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css", array(), "1.0.0");

    //agregar hoja de estilos principal
    wp_enqueue_style("style", get_stylesheet_uri(), array(), "1.0.0");

    wp_enqueue_style('services-style', get_template_directory_uri() . './styles/services.css');
    
    wp_enqueue_style('banner-style', get_template_directory_uri() . './styles/banner.css');
    wp_enqueue_style('home-style', get_template_directory_uri() . './styles/home.css');
    wp_enqueue_style('single-post-style', get_template_directory_uri() . './styles/single-post.css');
    wp_enqueue_style('card-habilitaciones', get_template_directory_uri() . './styles/card-habilitaciones.css');
    wp_enqueue_style('banner-horizontal', get_template_directory_uri() . './styles/banner-horizontal.css');
    wp_enqueue_style('logos-companias', get_template_directory_uri() . './styles/logos-companias.css');
    wp_enqueue_style('busqueda-style', get_template_directory_uri() . './styles/busqueda-style.css');
    wp_enqueue_style('ligthbox-css', get_template_directory_uri() . './styles/lightbox.css');

    
    wp_enqueue_script("slickNavJS", get_template_directory_uri() . '/js/jquery.slicknav.min.js', array("jquery"), "1.0.0", true);
    wp_enqueue_script("Lightbox", get_template_directory_uri() . '/js/lightbox.js', array("jquery"), "1.0.0", true);
    wp_enqueue_script("Swiper", "https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js", array(), "6.0.0", true);



    wp_enqueue_script("scriptsJs", get_template_directory_uri() . '/js/scripts.js', array("jquery","slickNavJS"), "1.0.0", true);

    wp_enqueue_script("fontawesome", "https://kit.fontawesome.com/7a0abd0201.js", array(), "6.0.0", true);

};

function enqueue_bootstrap_styles_scripts() {
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js','https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js', array('jquery'), false, true);
    wp_enqueue_script('popper-js','https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r', array('jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_styles_scripts');

add_action("wp_enqueue_scripts","gtm_scripts_styles");


// Definir Zonda de widgets
function gym_widgets(){
    register_sidebar(
        array(
'name' => 'sidebar 1',
'id' => 'sidebar_1',
'before_widget' => '<div class="widget">',
'after_widget' => '</div>',
'befor_title' => '<h3 class="text-center text-primary"> ',
'after_title' =>'</h3>'
));
register_sidebar(
    array(
'name' => 'sidebar 2',
'id' => 'sidebar_2',
'before_widget' => '<div class="widget">',
'after_widget' => '</div>',
'befor_title' => '<h3 class="text-center text-primary"> ',
'after_title' =>'</h3>'
));

}

add_action('widgets_init', 'gym_widgets');
 


//CREAR PAGINA DE 404
function redirigir_404_personalizada() {
    if( is_404() ) {
        $pagina_404_id = 97; // Reemplaza 1234 con el ID de tu página 404
        wp_redirect( get_permalink( $pagina_404_id ) );
        exit();
    }
}
add_action( 'template_redirect', 'redirigir_404_personalizada' );

function custom_search_filter($query) {
    if ($query->is_search && !is_admin()) {
        $precio_min = isset($_GET['precio_min']) ? intval($_GET['precio_min']) : null;
        $precio_max = isset($_GET['precio_max']) ? intval($_GET['precio_max']) : null;

        if ($precio_min !== null && $precio_max !== null) {
            $meta_query = array(
                'key' => 'precio',
                'value' => array($precio_min, $precio_max),
                'compare' => 'BETWEEN',
                'type' => 'NUMERIC'
            );

            $query->set('meta_query', array($meta_query));
        }
    }
}
add_action('pre_get_posts', 'custom_search_filter');
function cambiar_etiqueta_categoria() {
    global $wp_taxonomies;
    $labels = &$wp_taxonomies['category']->labels;
    $labels->name = 'Ubicaciones';
    $labels->singular_name = 'Ubicación';
    $labels->menu_name = 'Ubicaciones';
}
add_action( 'init', 'cambiar_etiqueta_categoria' );
function cambiar_etiquetas_categorias() {
    $labels = array(
        'name' => 'Ubicaciones',
        'singular_name' => 'Ubicación',
        'search_items' => 'Buscar Ubicaciones',
        'all_items' => 'Todas las Ubicaciones',
        'parent_item' => 'Ubicación padre',
        'parent_item_colon' => 'Ubicación padre:',
        'edit_item' => 'Editar Ubicación',
        'update_item' => 'Actualizar Ubicación',
        'add_new_item' => 'Agregar Nueva Ubicación',
        'new_item_name' => 'Nombre de Nueva Ubicación',
        'menu_name' => 'Ubicaciones',
    );

    register_taxonomy(
        'ubicacion',
        'productos',
        array(
            'hierarchical' => true,
            'labels' => $labels,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'ubicacion' ),
        )
    );
}
add_action( 'init', 'cambiar_etiquetas_categorias' );
function agregar_campo_personalizado_al_editor($post) {
    // Verifica si estamos en el editor de una entrada.
    
        // Obtiene el valor del campo personalizado "nombre_del_campo" de ACF.
        $texto_personalizado = get_field('direccion-mapa', $post->ID);
        if(empty($texto_personalizado)){
        // MAPA CON LOGITUD Y LATITUD
          $latitud = get_field('latitud',$post->ID);
          $longitud = get_field('longitud',$post->ID);
            $shortcode ='[leaflet-map height=500 lat="'. esc_attr($latitud) .'" lng="'. esc_attr($longitud) .'" zoomcontrol detect-retina zoom=13]';
        }else{
        $shortcode = '[leaflet-map  height=500  address="' . esc_attr($texto_personalizado) . '" zoom=15 zoomcontrol detect-retina]';
        }

        $post_title = get_the_title($post->ID);

        // Imprime el campo personalizado en el editor de la parte posterior.
        echo '<div class="acf-editor-field">';
        echo '<label for="acf-campo-personalizado">Direccion:</label>';
        echo '<h4>' . esc_attr($texto_personalizado) . '<h4/>';
        echo '</div>';
        echo '<div id="leaflet-map-container" style="width: 100%; height: 400px;"></div>
        ';
        echo '<div class="inputs-latLng"> ';
        echo '<p>Latitud</p><input type="text" id="lat-input" name="lat" value="">';
        echo '<p>Longitud</p><input type="text" id="lng-input" name="lng" value="">';
        echo '</div > ';
      
        echo do_shortcode($shortcode);
        echo do_shortcode('[leaflet-marker svg background="yellow" iconClass="dashicons dashicons-star-filled" color="white"] <h4 class="title-marker">' . esc_html($post_title) . '</h4> ' . esc_attr($texto_personalizado) . ' [/leaflet-marker]');
        if (empty($latitud)) {
            $variableLat ="-31.418702" ;
            $variableLong ="-64.186935" ;
            
        } else {
            $variableLat = $latitud;
            $variableLong = $longitud;
        
        }
        
        echo '<script>
        var latitud = ' . esc_js($variableLat) . '; 
        var longitud = ' . esc_js($variableLong) . '; 
        document.addEventListener("DOMContentLoaded", function() {
            var map = L.map("leaflet-map-container").setView([latitud, longitud], 8);

            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: \'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors\'
            }).addTo(map);
            var marker = L.marker([latitud, longitud], {
                draggable:true,
                title:"Resource location",
                alt:"Resource Location",
                riseOnHover:true
               }).addTo(map)
               var latitudInput = document.getElementById("acf-field_650820fee6df0");
               var longitudInput = document.getElementById("acf-field_65082115e6df1");
                 // Función para actualizar los valores de los inputs
                 function updateInputs(latlng) {
                    document.getElementById("lat-input").value = latlng.lat.toFixed(6);
                    document.getElementById("lng-input").value = latlng.lng.toFixed(6);
                    latitudInput.value = latlng.lat.toFixed(6);
                    longitudInput.value = latlng.lng.toFixed(6);
                }
   
                 marker.on("dragend", function(event) {
                    var markerLatLng = event.target.getLatLng();
                    updateInputs(markerLatLng);
                    
                    // Mostrar un alert cuando el marcador se mueva
                  });
        });
    </script>';
   
}

add_action('edit_form_after_title', 'agregar_campo_personalizado_al_editor');
