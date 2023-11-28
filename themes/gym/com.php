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
               var latitudInput = document.getElementById("acf-field_651f33015fbb4");
               var longitudInput = document.getElementById("acf-field_651f33085fbb5");
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
                    alert("El marcador se ha movido a latitud " + markerLatLng.lat.toFixed(6) + " y longitud " + markerLatLng.lng.toFixed(6));
                  });
        });
    </script>';
   
}

add_action('edit_form_after_title', 'agregar_campo_personalizado_al_editor');