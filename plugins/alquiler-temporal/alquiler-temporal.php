<?php
/*
Plugin Name: Alquiler Temporario
Plugin URI:  https://greatweb.com.ar
Description: Plugin personalizado para registrar el Custom Post Type "Ergonomia".
Version:     1.0
Author:      Tu Nombre
Author URI:  https://greatweb.com.ar
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Función para registrar el Custom Post Type
// Función para registrar el Custom Post Type
function registrar_custom_post_type_ergonomia() {
    $labels = array(
        'name'                  => 'Alquiler Temporal',
        'singular_name'         => 'Alquiler Temporal',
        'menu_name'             => 'Alquiler Temporal',
        'name_admin_bar'        => 'Alquiler Temporal',
        'add_new'               => 'Agregar nueva',
        'add_new_item'          => 'Agregar nueva Alquiler Temporal',
        'edit_item'             => 'Editar Alquiler Temporal',
        'new_item'              => 'Nueva Alquiler Temporal',
        'view_item'             => 'Ver Alquiler Temporal',
        'all_items'             => 'Todas las Alquiler Temporal',
        'search_items'          => 'Buscar Alquiler Temporals',
        'not_found'             => 'No se encontraron Alquiler Temporals',
        'not_found_in_trash'    => 'No se encontraron Alquiler Temporals en la papelera',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'temporal' ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => null,
        'supports'            => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies' => array('category'), // Agregar categorías
        'menu_icon'           => 'dashicons-palmtree', // Cambia el icono aquí

    );

    register_post_type( 'temporal', $args );
}
add_action( 'init', 'registrar_custom_post_type_ergonomia' );
