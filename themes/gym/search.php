<style>
    .div-order {
    display: flex;
    justify-content: flex-start;
    margin-left: 38px;
    align-items: center;
}
p.order-price {
    margin: 0;
}
.paginacion.container {
    text-align: center;
    font-family: 'Poppins';
}
h4.title-marker {
    margin: 9px 0px !important;
}
p.address-market {
    margin: 5px 0px !important;
}
.leaflet-container a:hover {
    color: black;
    text-decoration: underline;
}
img.img-post {
    width: 200px;
    height: 150px;
}
select#order-select {
    padding: 5px;
    margin: 0px 14px;
    border: 1px solid var(--colorPrimario);
    border-radius: 5px;
}
</style>
<?php get_header();
$search_query = get_search_query();
$keyword = isset($_GET['s']) ? $_GET['s'] : '';
$precio_max = isset($_GET['precio_max']) ;
$precio_min = isset($_GET['precio_min']) ;
$property = $_GET['ctp_select'] ;
$selected_category_id = $_GET['selected_category'];
$category_name = get_cat_name($selected_category_id);
if($property === 'venta'){
$property_name ='Inmuebles en venta en ';
}
if($property ==='lotes'){
    $property_name = 'Terrenos en vena en ';
}if($property === 'temporal'){
    $property_name = 'Alquiler temporario en ';
}
if($property === 'alquiler-anual'){
    $property_name = 'Alquiler anual en ';
}
?>
<section class="banner-horizontal banner-search">
        <div class="empty">
            <h1></h1>
        </div>
        <div class="title-midle">
        <h3 class="title_banner"><?php echo $property_name?><span><?php echo $category_name?></span></h3>
        </div>
        <div class="btn-contact">
        </div>
</section>
<div class="pop-filtros">
    <h5>Filtrar</h5>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
<div class="boton-filtro">
  <p class="filter-item">Tipo de Propiedad</p>
  <p  class="filter-item">Ubicacion</p>
  <p class="filter-item">Filtrar Precio</p>
  <div class="icon-search">

  </div>
</div>  
</div>
</button>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Filtrar tu Busqueda</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php  get_template_part('components/form-search-propery'); ?>
      </div>
     
    </div>
  </div>
</div>

<script>
const rangeInput = document.querySelectorAll(".range-input input"),
priceInput = document.querySelectorAll(".price-input input"),
range = document.querySelector(".slider .progress");
let priceGap = 1000;
priceInput.forEach(input =>{
    input.addEventListener("input", e =>{
 
    });
});
rangeInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);
        if((maxVal - minVal) < priceGap){
            if(e.target.className === "range-min"){
                rangeInput[0].value = maxVal - priceGap
            }else{
                rangeInput[1].value = minVal + priceGap;
            }
        }else{
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
            range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
    });
});

</script>
<?php
$current_order = isset($_GET['orderPrice']) ? $_GET['orderPrice'] : '';

// Definir las opciones de orden
$order_options = array(
    'asc' => 'Ascendente',
    'desc' => 'Descendente',
);
$current_order  =isset($_GET['orderPrice']) ? $_GET['orderPrice'] : '';

$order_params = array();
if ($current_order === 'asc') {
    $order_params['orderby'] = 'meta_value_num';
    $order_params['meta_key'] = 'precio';
    $order_params['order'] = 'ASC';
} elseif ($current_order === 'desc') {
    $order_params['orderby'] = 'meta_value_num';
    $order_params['meta_key'] = 'precio';
    $order_params['order'] = 'DESC';
}
?>

<div class="div-order">

 <p class="order-price">  Ordenar por precio:</p>
    <select class=" order" id="order-select" onchange="changeOrder(this.value)">
        <option value="" <?php selected('', $current_order); ?>>Seleccionar orden</option>
        <?php foreach ($order_options as $value => $label) : ?>
            <option value="<?php echo esc_attr($value); ?>" <?php selected($value, $current_order); ?>>
                <?php echo esc_html($label); ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

<div class="main-search">   


<section class="lists-cards">
    <ul class="listado-grid">

    <?php 

    $category_slug= null;
    $args = array(
        'post_type' => $property,
        'posts_per_page' => 6,
        's' => $keyword,
        'tax_query' => array(),
        'paged' => get_query_var('page') ? get_query_var('page') : 1,

    );
    $args = array_merge($args, $order_params);

    if (!is_null($selected_category_id)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'category',  // Cambia 'category' si es una taxonomía personalizada
            'field' => 'term_id',
            'terms' => $selected_category_id,
        );
    } elseif (!is_null($category_slug)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => $category_slug,
        );
    }
    if ($precio_min !== 0 || $precio_max !== 0) {
        $meta_query = array('relation' => 'AND');

        if ($precio_min !== null) {
            $meta_query[] = array(
                'key' => 'precio',
                'value' => $precio_min,
                'compare' => '>=',
                'type' => 'NUMERIC'
            );
        }

        if ($precio_max !== null) {
            $meta_query[] = array(
                'key' => 'precio',
                'value' => $precio_max,
                'compare' => '<=',
                'type' => 'NUMERIC'
            );
        }

        $args['meta_query'] = $meta_query;
    }
$custom_query = new WP_Query($args);

if ($custom_query->have_posts()) {
    while ($custom_query->have_posts()) {
        $custom_query->the_post();
        ?> 
            <li class="card-search">
                <div class="image-card">
                <?php the_post_thumbnail('card-image', array('class' => 'card-image')); ?>
                    
                </div>
                    <div class="contenido">
                            <a href="<?php the_permalink(); ?>">
                                <h3 class="title-card-search"> <?php the_title(); ?>    </h3>
                            </a> 
                            <a href="<?php the_permalink(); ?>">
                                <h3 class="price-card-search"> <?php   the_field('precio'); ?>    </h3>
                            </a> 
                            <a class="a-btn-search" href="<?php the_permalink(); ?>">
                                <p class="btn-search"> Leer Más    </p>
                            </a>        
                     </div>
            </li>
            <?php } ?>
            </ul >
        <div class="paginacion container">
                <?php ; // Agregar la paginación
                        $big = 999999999; // Necesario para no recibir un número de página demasiado grande
                        echo paginate_links(array(
                            'base'    => add_query_arg('page', '%#%'),
                            'format'  => '',
                            'current' => max(1, get_query_var('page')),
                            'total'   => $custom_query->max_num_pages,
                        ));
                    } else {
                        // No se encontraron archivos con esa búsqueda
                        echo 'No se encontraron archivos con esa búsqueda.';

                    }
                    wp_reset_postdata(); // Restaurar datos originales del post

                    ?>


        </div>






</section>
<section class="mapa-laflet">
<section class="mapa">
<?php
            $shortcode = '[leaflet-map scrollwheel zoomcontrol !detect-retina height=500 zoom=5 address="Argentina"]';
            echo do_shortcode($shortcode);
            ?>
         

<?php
if ($custom_query->have_posts()) :
    while ($custom_query->have_posts()) : $custom_query->the_post();
        $direccion_mapa = get_field('direccion-mapa');
        $titulo = get_the_title();
        $imagen_destacada_url = ''; // Valor predeterminado en caso de que no haya imagen destacada

        $imagen_destacada_id = get_post_thumbnail_id();
        
        if ($imagen_destacada_id) {
            $imagen_destacada = wp_get_attachment_image_src($imagen_destacada_id, 'image-marker');
        
            if ($imagen_destacada) {
                $imagen_destacada_url = $imagen_destacada[0];
            }
        }
        $enlace_al_post = get_permalink();
        $descripcion_corta = get_field("descripcion_corta");
        $post_type_esc = esc_attr($post_type);

        $lat = get_field('latitud');
        $lng = get_field('longitud');
        $precio = get_field('precio');
        $post_type = get_post_type();
        $link =get_permalink();
        $color='#6cace4';
     
        if ($direccion_mapa) {
                 $direccion_url = urlencode(str_replace(' ', '+', $direccion_mapa));
                 $url_google_maps = "https://www.google.com/maps?q=" . $direccion_url ;
                 $url_google_maps_esc = esc_url($url_google_maps);

            $shortcode_mapa= '[leaflet-marker address="' . $direccion_mapa . '" svg background="' . $color . '" iconClass="dashicons dashicons-star-filled" color="white"]';
            $shortcode_mapa .= '<div class="marker-content">';
            $shortcode_mapa .= '<div class="img-marker">';
            $shortcode_mapa .= '<img class="img-post" src="' . $imagen_destacada_url . '" alt="' . $titulo . '">';
            $shortcode_mapa .= '</div >';
            $shortcode_mapa .= '<h4 class="title-marker"><a href="' . $enlace_al_post . '">' . esc_html($titulo) . '</a></h4>';
            $shortcode_mapa .= '<p class="address-market">' . $descripcion_corta . '</p>';
            $shortcode_mapa .= '<a class="link-googlemaps" href="' . $link . '" target="_blank">Ver Más</a>';
            $shortcode_mapa .= '</div>';
            $shortcode_mapa .= '[/leaflet-marker]';
              echo do_shortcode($shortcode_mapa);
        }elseif ($lat && $lng) {
            $shortcode_mapa ='[leaflet-marker svg background="'.esc_attr($color).'" iconClass="dashicons dashicons-star-filled" color="white"  lat='.$lat.' lng='.$lng.']';
            $shortcode_mapa .= '<div class="marker-content">';
            $shortcode_mapa .= '<div class="img-marker">';
            $shortcode_mapa .= '<img class="img-post" src="' . $imagen_destacada_url . '" alt="' . $titulo . '">';
            $shortcode_mapa .= '</div >';
            $shortcode_mapa .= '<h4 class="title-marker"><a href="' . $enlace_al_post . '">' . esc_html($titulo) . '</a></h4>';
            $shortcode_mapa .= '<p class="address-market">' . $descripcion_corta . '</p>';
            $shortcode_mapa .= '<a class="link-googlemaps" href="' . $link . '" target="_blank">Ver Más</a>';
            $shortcode_mapa .= '</div>';
            $shortcode_mapa .= '[/leaflet-marker]';
            echo do_shortcode($shortcode_mapa) ;
        }
    endwhile;
    wp_reset_postdata(); // Restaurar datos originales del post
else :
    // No se encontraron propiedades
    echo 'No se encontraron propiedades en venta.';
endif;
?>

</section>

</section>
</div>   
<?php get_footer(); ?>
<script>
// Función para cambiar el valor del parámetro de orden en la URL
function changeOrder(value) {
    var currentUrl = window.location.href; // Obtener la URL actual
    var separator = currentUrl.indexOf('?') !== -1 ? '&' : '?'; // Verificar si ya hay parámetros en la URL

    // Agregar el nuevo valor del parámetro sin borrar los existentes
    var newUrl = currentUrl + separator + 'orderPrice=' + value;

    window.location.href = newUrl; // Redirigir a la nueva URL
}
</script>