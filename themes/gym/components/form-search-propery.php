<style>
label {
    font-family: 'Poppins';
    margin-top: 11px;
}
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}
button.tablinks {
    width: 50%;
}
@media (max-width: 768px) {
    button.tablinks {
    width: 100%;
}
.price-input {
    display: block;
}
.wrapper {
    width: 93%;
    background-color: #fff;
    border-radius: 10px;
}
input.search-field {
    width: 90%;
}
select#category-select {
    width: 90%;
}
.main-search {
    display: block;
}
section.mapa-laflet {
    margin: 6px;
    width: 97%;
}
    p.filter-item {
    margin: 0px;
    margin-left: 5px;
    padding: 3px;
    font-size: 13px;
    font-weight: 500;
}
}
@media (max-width: 550px) {
    p.filter-item {
    margin: 0px;
    margin-left: 0px;
    padding: 3px;
    font-size: 10px;
    font-weight: 500;
}
section.mapa {
    margin-top: 40px;
}

}
/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-family: 'Poppins';

  font-size: 17px;
}
select#category-select {
    padding: 7px;
    border-radius: 7px;
}
input.search-field {
    padding: 7px;
    border-radius: 7px;
    border: 1px solid #837e7e;
}
/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}


/* Create an active/current tablink class */
.tab button.active {
    background-color: var(--colorPrimario);
    color: white;
    font-family: 'Poppins';
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
button.search-submit.btn.btn-primary {
    color: black;
    font-family: 'Poppins';
}
button.search-submit.btn.btn-primary {
    color: black;
padding: 0px 9px;
    font-family: 'Poppins';
}

.search-submit .icon-search {
    margin-left: -12px;
    margin-right: 9px;
    font-size: 19px;
}
.search-submit {
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease; /* Ajusta la duración y la función de tiempo según sea necesario */
}

.icon-search {
    display: inline-block;
    vertical-align: middle;
}

/* Estilos para el efecto de escala al hacer hover */
.search-submit:hover {
    transform: scale(1.2); /* Ajusta el valor según sea necesario para el nivel de escala deseado */
}

</style>
<?php
$property = isset($_GET['ctp_select']) ? $_GET['ctp_select'] : null;
if($property == null){  
    $property = get_query_var('post_type');

}
?>

<h4>Selecciona un tipo de propiedad:</h4>

<div class="tab">
<button class="tablinks" onclick="openCity(event, 'terrenos-venta')" <?= ($property === "lotes") ? 'id="defaultOpen"' : '' ?>>Terrenos en Venta</button>
<button class="tablinks" onclick="openCity(event, 'inmuebles-venta')" <?= ($property === "venta") ? 'id="defaultOpen"' : '' ?>>Inmuebles en Venta</button>
<button class="tablinks" onclick="openCity(event, 'alquiler-temporario')" <?= ($property === "temporal") ? 'id="defaultOpen"' : '' ?>>Alquiler Temporarios</button>
<button class="tablinks" onclick="openCity(event, 'alquiler-anual')" <?= ($property === "alquiler-anual") ? 'id="defaultOpen"' : '' ?>>Alquiler Anual</button>
</div>

<div id="terrenos-venta" class="tabcontent">
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="ctp_select">Buscar por palabra clave (opcional)</label>
    <input type="search" class="search-field" placeholder="Buscar propiedades..." value="<?php echo get_search_query(); ?>" name="s" />
    
    <input type="hidden" name="ctp_select" value="lotes">

    
    <label for="selected_category">Selecciona Ubicación:</label>
<select name="selected_category" id="category-select" >
    <?php
    $prev_selected_category_id = isset($_GET['selected_category']) ? intval($_GET['selected_category']) : 0;

    // Obtener las categorías y subcategorías únicas asociadas con el tipo de publicación personalizada "venta"
    $args = array(
        'post_type' => 'lotes', // Reemplaza 'venta' con el nombre de tu custom post type
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'category', // Reemplaza 'category' con el nombre de tu taxonomía
                'field' => 'id',
                'terms' => get_terms('category', array('fields' => 'ids')), // Obtener todos los términos de la taxonomía 'category'
            ),
        ),
    );

    $query = new WP_Query($args);

    $main_categories = array(); // Array para realizar un seguimiento de categorías principales
    $subcategories = array(); // Array para realizar un seguimiento de subcategorías

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_categories = get_the_category();

            // Si hay categorías asociadas, agregarlas al array de categorías principales o subcategorías
            if (!empty($post_categories)) {
                foreach ($post_categories as $post_category) {
                    if ($post_category->parent === 0) {
                        // Categoría principal
                        $main_categories[$post_category->term_id] = $post_category;
                    } else {
                        // Subcategoría
                        $subcategories[$post_category->parent][$post_category->term_id] = $post_category;
                    }
                }
            }
        }

        // Restaurar datos post
        wp_reset_postdata();

        // Mostrar las categorías principales y subcategorías organizadas en el menú desplegable
        foreach ($main_categories as $main_category) {
            $is_selected = ($prev_selected_category_id === $main_category->term_id) ? 'selected' : '';
            echo '<option value="' . esc_attr($main_category->term_id) . '" ' . $is_selected . '>' . esc_html($main_category->name) . '</option>';

            // Mostrar las subcategorías asociadas a esta categoría principal
            if (isset($subcategories[$main_category->term_id])) {
                foreach ($subcategories[$main_category->term_id] as $subcategory) {
                    $is_selected = ($prev_selected_category_id === $subcategory->term_id) ? 'selected' : '';
                    echo '<option value="' . esc_attr($subcategory->term_id) . '" ' . $is_selected . '>-- ' . esc_html($subcategory->name) . '</option>';
                }
            }
        }
    } else {
        echo '<option value="0" selected>-- Todas las ubicaciones --</option>';
    }
    ?>
</select>
    <div class="wrapper">
        <h4>Rango de precio</h4>
        <div class="price-input">
            <div class="field">
                <span>Min</span>
                <input type="number" class="input-min" name="precio_min" value="<?php echo isset($_GET['precio_min']) ? esc_attr($_GET['precio_min']) : 0; ?>"  />
            </div>
            <div class="separator">--</div>
            <div class="field">
                <span>Max</span>
                <input type="number" class="input-max" name="precio_max" value="<?php echo isset($_GET['precio_max']) ? esc_attr($_GET['precio_max']) : 10000000; ?>" min="0" max="10000000" step="10000" />
            </div>
        </div>

    </div>
    <div class="modal-footer">
    <button type="submit" class="search-submit btn btn-primary"><div class="icon-search">
        
        </div> Buscar
</button>       </div>
</form>
</div>

<div id="inmuebles-venta" class="tabcontent">
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="ctp_select">Buscar por palabra clave (opcional):</label>
    <input type="search" class="search-field" placeholder="Buscar propiedades..." value="<?php echo get_search_query(); ?>" name="s" />
    
    <input type="hidden" name="ctp_select" value="venta">

    
    <label for="selected_category">Selecciona Ubicación:</label>
<select name="selected_category" id="category-select" >
    <?php
    $prev_selected_category_id = isset($_GET['selected_category']) ? intval($_GET['selected_category']) : 0;

    // Obtener las categorías y subcategorías únicas asociadas con el tipo de publicación personalizada "venta"
    $args = array(
        'post_type' => 'venta', // Reemplaza 'venta' con el nombre de tu custom post type
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'category', // Reemplaza 'category' con el nombre de tu taxonomía
                'field' => 'id',
                'terms' => get_terms('category', array('fields' => 'ids')), // Obtener todos los términos de la taxonomía 'category'
            ),
        ),
    );

    $query = new WP_Query($args);

    $main_categories = array(); // Array para realizar un seguimiento de categorías principales
    $subcategories = array(); // Array para realizar un seguimiento de subcategorías

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_categories = get_the_category();

            // Si hay categorías asociadas, agregarlas al array de categorías principales o subcategorías
            if (!empty($post_categories)) {
                foreach ($post_categories as $post_category) {
                    if ($post_category->parent === 0) {
                        // Categoría principal
                        $main_categories[$post_category->term_id] = $post_category;
                    } else {
                        // Subcategoría
                        $subcategories[$post_category->parent][$post_category->term_id] = $post_category;
                    }
                }
            }
        }

        // Restaurar datos post
        wp_reset_postdata();

        // Mostrar las categorías principales y subcategorías organizadas en el menú desplegable
        foreach ($main_categories as $main_category) {
            $is_selected = ($prev_selected_category_id === $main_category->term_id) ? 'selected' : '';
            echo '<option value="' . esc_attr($main_category->term_id) . '" ' . $is_selected . '>' . esc_html($main_category->name) . '</option>';

            // Mostrar las subcategorías asociadas a esta categoría principal
            if (isset($subcategories[$main_category->term_id])) {
                foreach ($subcategories[$main_category->term_id] as $subcategory) {
                    $is_selected = ($prev_selected_category_id === $subcategory->term_id) ? 'selected' : '';
                    echo '<option value="' . esc_attr($subcategory->term_id) . '" ' . $is_selected . '>-- ' . esc_html($subcategory->name) . '</option>';
                }
            }
        }
    } else {
        echo '<option value="0" selected>-- Todas las ubicaciones --</option>';
    }
    ?>
</select>
    <div class="wrapper">
        <h4>Rango de precio</h4>
        <div class="price-input">
            <div class="field">
                <span>Min</span>
                <input type="number" class="input-min" name="precio_min" value="<?php echo isset($_GET['precio_min']) ? esc_attr($_GET['precio_min']) : 0; ?>"  />
            </div>
            <div class="separator">--</div>
            <div class="field">
                <span>Max</span>
                <input type="number" class="input-max" name="precio_max" value="<?php echo isset($_GET['precio_max']) ? esc_attr($_GET['precio_max']) : 10000000; ?>" min="0" max="10000000" step="10000" />
            </div>
        </div>

    </div>
    <div class="modal-footer">
    <button type="submit" class="search-submit btn btn-primary"><div class="icon-search">
        
        </div> Buscar
</button>       </div>
</form>
</div>

<div id="alquiler-temporario" class="tabcontent">
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="ctp_select">Buscar por palabra clave (opcional):</label>
    <input type="search" class="search-field" placeholder="Buscar propiedades..." value="<?php echo get_search_query(); ?>" name="s" />
    
    <input type="hidden" name="ctp_select" value="temporal">

    
    <label for="selected_category">Selecciona Ubicación:</label>
<select name="selected_category" id="category-select" >
    <?php
    $prev_selected_category_id = isset($_GET['selected_category']) ? intval($_GET['selected_category']) : 0;

    // Obtener las categorías y subcategorías únicas asociadas con el tipo de publicación personalizada "venta"
    $args = array(
        'post_type' => 'temporal', // Reemplaza 'venta' con el nombre de tu custom post type
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'category', // Reemplaza 'category' con el nombre de tu taxonomía
                'field' => 'id',
                'terms' => get_terms('category', array('fields' => 'ids')), // Obtener todos los términos de la taxonomía 'category'
            ),
        ),
    );

    $query = new WP_Query($args);

    $main_categories = array(); // Array para realizar un seguimiento de categorías principales
    $subcategories = array(); // Array para realizar un seguimiento de subcategorías

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_categories = get_the_category();

            // Si hay categorías asociadas, agregarlas al array de categorías principales o subcategorías
            if (!empty($post_categories)) {
                foreach ($post_categories as $post_category) {
                    if ($post_category->parent === 0) {
                        // Categoría principal
                        $main_categories[$post_category->term_id] = $post_category;
                    } else {
                        // Subcategoría
                        $subcategories[$post_category->parent][$post_category->term_id] = $post_category;
                    }
                }
            }
        }

        // Restaurar datos post
        wp_reset_postdata();

        // Mostrar las categorías principales y subcategorías organizadas en el menú desplegable
        foreach ($main_categories as $main_category) {
            $is_selected = ($prev_selected_category_id === $main_category->term_id) ? 'selected' : '';
            echo '<option value="' . esc_attr($main_category->term_id) . '" ' . $is_selected . '>' . esc_html($main_category->name) . '</option>';

            // Mostrar las subcategorías asociadas a esta categoría principal
            if (isset($subcategories[$main_category->term_id])) {
                foreach ($subcategories[$main_category->term_id] as $subcategory) {
                    $is_selected = ($prev_selected_category_id === $subcategory->term_id) ? 'selected' : '';
                    echo '<option value="' . esc_attr($subcategory->term_id) . '" ' . $is_selected . '>-- ' . esc_html($subcategory->name) . '</option>';
                }
            }
        }
    } else {
        echo '<option value="0" selected>-- Todas las ubicaciones --</option>';
    }
    ?>
</select>
    <div class="wrapper">
        <h4>Rango de precio</h4>
        <div class="price-input">
            <div class="field">
                <span>Min</span>
                <input type="number" class="input-min" name="precio_min" value="<?php echo isset($_GET['precio_min']) ? esc_attr($_GET['precio_min']) : 0; ?>"  />
            </div>
            <div class="separator">--</div>
            <div class="field">
                <span>Max</span>
                <input type="number" class="input-max" name="precio_max" value="<?php echo isset($_GET['precio_max']) ? esc_attr($_GET['precio_max']) : 10000000; ?>" min="0" max="10000000" step="10000" />
            </div>
        </div>

    </div>
    <div class="modal-footer">
    <button type="submit" class="search-submit btn btn-primary"><div class="icon-search">
        
        </div> Buscar
</button>       </div>
</form>
</div>
<div id="alquiler-anual" class="tabcontent">
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="ctp_select">Buscar por palabra clave (opcional):</label>
    <input type="search" class="search-field" placeholder="Buscar propiedades..." value="<?php echo get_search_query(); ?>" name="s" />
    
    <input type="hidden" name="ctp_select" value="alquiler-anual">

    
    <label for="selected_category">Selecciona Ubicación:</label>
<select name="selected_category" id="category-select" >
    <?php
    $prev_selected_category_id = isset($_GET['selected_category']) ? intval($_GET['selected_category']) : 0;

    // Obtener las categorías y subcategorías únicas asociadas con el tipo de publicación personalizada "venta"
    $args = array(
        'post_type' => 'alquiler-anual', // Reemplaza 'venta' con el nombre de tu custom post type
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'category', // Reemplaza 'category' con el nombre de tu taxonomía
                'field' => 'id',
                'terms' => get_terms('category', array('fields' => 'ids')), // Obtener todos los términos de la taxonomía 'category'
            ),
        ),
    );

    $query = new WP_Query($args);

    $main_categories = array(); // Array para realizar un seguimiento de categorías principales
    $subcategories = array(); // Array para realizar un seguimiento de subcategorías

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_categories = get_the_category();

            // Si hay categorías asociadas, agregarlas al array de categorías principales o subcategorías
            if (!empty($post_categories)) {
                foreach ($post_categories as $post_category) {
                    if ($post_category->parent === 0) {
                        // Categoría principal
                        $main_categories[$post_category->term_id] = $post_category;
                    } else {
                        // Subcategoría
                        $subcategories[$post_category->parent][$post_category->term_id] = $post_category;
                    }
                }
            }
        }

        // Restaurar datos post
        wp_reset_postdata();

        // Mostrar las categorías principales y subcategorías organizadas en el menú desplegable
        foreach ($main_categories as $main_category) {
            $is_selected = ($prev_selected_category_id === $main_category->term_id) ? 'selected' : '';
            echo '<option value="' . esc_attr($main_category->term_id) . '" ' . $is_selected . '>' . esc_html($main_category->name) . '</option>';

            // Mostrar las subcategorías asociadas a esta categoría principal
            if (isset($subcategories[$main_category->term_id])) {
                foreach ($subcategories[$main_category->term_id] as $subcategory) {
                    $is_selected = ($prev_selected_category_id === $subcategory->term_id) ? 'selected' : '';
                    echo '<option value="' . esc_attr($subcategory->term_id) . '" ' . $is_selected . '>-- ' . esc_html($subcategory->name) . '</option>';
                }
            }
        }
    } else {
        echo '<option value="0" selected>-- Todas las ubicaciones --</option>';
    }
    ?>
</select>
    <div class="wrapper">
        <h4>Rango de precio</h4>
        <div class="price-input">
            <div class="field">
                <span>Min</span>
                <input type="number" class="input-min" name="precio_min" value="<?php echo isset($_GET['precio_min']) ? esc_attr($_GET['precio_min']) : 0; ?>"  />
            </div>
            <div class="separator">--</div>
            <div class="field">
                <span>Max</span>
                <input type="number" class="input-max" name="precio_max" value="<?php echo isset($_GET['precio_max']) ? esc_attr($_GET['precio_max']) : 10000000; ?>" min="0" max="10000000" step="10000" />
            </div>
        </div>

    </div>
    <div class="modal-footer">
        
        <button type="submit" class="search-submit btn btn-primary"><div class="icon-search">
        
        </div> Buscar
</button>    </div>
</form>
</div>

    
<script>
    function mostrarCampoCantidad() {
  var tipo = document.getElementById("tipo").value;
  var campoCantidad = document.getElementById("campoCantidad");
alert("hola")
  if (tipo === "casas") {
    campoCantidad.style.display = "block";
  } else {
    campoCantidad.style.display = "none";
  }
}
</script>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   