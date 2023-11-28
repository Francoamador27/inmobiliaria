<ul class="menu-post">
<?php
    $custom_post_type = array('habilitaciones','ergonomia','ruidos','cyc');
     $args = array(
        'post_type' => $custom_post_type,
        'posts_per_page' => 5,
        'orderby'=>'date',
    );
    $query = new WP_Query($args);

    // Comprobar si hay posts disponibles
    if ($query->have_posts()) {

    ?>
        
        <?php
        while ($query->have_posts()) {
            $query->the_post();
            // Obtener el campo personalizado (ACF) "descripcion_corta"
            ?>
            
               
            <li class="list-post"><p><a  href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></p></li>
         

        
        <?php } ?>
</ul>
     
        <?php
        // Restaurar los datos originales del loop de WordPress
        wp_reset_postdata();
    } else {
        echo '<p>No se encontraron habilitaciones.</p>';
    }
    ?>