<?php
/*
Plugin Name: Propiedades en venta
Plugin URI:  https://tusitio.com
Description: Plugin personalizado para registrar el Custom Post Type "Habilitaciones".
Version:     1.0
Author:      Tu Nombre
Author URI:  https://tusitio.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Función para registrar el Custom Post Type
function registrar_custom_post_type_habilitaciones() {
    $labels = array(
        'name'                  => 'Propiedades en Venta',
        'singular_name'         => 'Propiedad en Venta',
        'menu_name'             => 'Propiedades en Venta',
        'name_admin_bar'        => 'Propiedades en Venta',
        'add_new'               => 'Agregar nueva propiedades en Venta',
        'add_new_item'          => 'Agregar nueva propiedades en Venta',
        'edit_item'             => 'Editar Propiedad en Venta',
        'new_item'              => 'Nueva propiedades en Venta',
        'view_item'             => 'Ver propiedad en Venta',
        'all_items'             => 'Todas las Propiedades en Venta',
        'search_items'          => 'Buscar propiedad en Venta',
        'not_found'             => 'No se encontraron Propiedades en Venta',
        'not_found_in_trash'    => 'No se encontraron Propiedades en Venta en la papelera',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'venta' ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => null,
        'supports'            => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies' => array('category'), // Agregar categorías

        'menu_icon'           => 'dashicons-clipboard', // Cambia el icono aquí

    );

    register_post_type( 'venta', $args );
}
add_action( 'init', 'registrar_custom_post_type_habilitaciones' );