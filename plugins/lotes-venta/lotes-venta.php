<?php
/*
Plugin Name: Lotes en Venta
Plugin URI:  https://greatweb.com.ar
Description: Plugin personalizado para registrar el Custom Post Type "Charlas y Capacitaciones".
Version:     1.0
Author:      greatweb
Author URI:  https://greatweb.com.ar
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Función para registrar el Custom Post Type
// Función para registrar el Custom Post Type
// Función para registrar el Custom Post Type "Charlas y Capacitaciones"

function registrar_custom_post_type_lotes() {
    $labels = array(
        'name'                  => 'Lotes en Venta',
        'singular_name'         => 'Lotes en Venta ',
        'menu_name'             => 'Lotes en Venta ',
        'name_admin_bar'        => 'Lotes en Venta ',
        'add_new'               => 'Agregar nueva',
        'add_new_item'          => 'Agregar nueva Lotes en Venta ',
        'edit_item'             => 'Editar Lotes en Venta',
        'new_item'              => 'Nueva Lotes en Venta ',
        'view_item'             => 'Ver Lotes en Venta ',
        'all_items'             => 'Todas las Lotes en Venta ',
        'search_items'          => 'Buscar Lotes en Venta ',
        'not_found'             => 'No se encontraron Lotes en Venta ',
        'not_found_in_trash'    => 'No se encontraron Lotes en Venta en la papelera',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'lotes' ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => null,
        'supports'            => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies' => array('category'), // Agregar categorías
        'menu_icon'           => 'dashicons-pressthis', // Cambia el icono aquí

    );

    register_post_type( 'lotes', $args );
}
add_action( 'init', 'registrar_custom_post_type_lotes' );