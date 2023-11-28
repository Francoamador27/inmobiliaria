<?php
/*
Plugin Name: Propiedades alquiler Anual
Plugin URI:  https://greatweb.com.ar
Description: Plugin personalizado para registrar el Custom Post Type "Charlas sobreRuidos".
Version:     1.0
Author:      https://greatweb.com.ar
Author URI:  https://greatweb.com.ar
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Función para registrar el Custom Post Type
// Función para registrar el Custom Post Type
function registrar_custom_post_type_propiedad_alquiler_anual() {
    $labels = array(
        'name'                  => 'Propiedades alquiler Anual',
        'singular_name'         => 'Propiedad alquiler anual',
        'menu_name'             => 'Propiedades alquiler Anual',
        'name_admin_bar'        => 'Propiedad alquiler anual',
        'add_new'               => 'Agregar nuevo',
        'add_new_item'          => 'Agregar nuevo propiedad alquiler anual',
        'edit_item'             => 'Editar propiedad alquiler anual',
        'new_item'              => 'Nuevo propiedad alquiler anual',
        'view_item'             => 'Ver propiedad',
        'all_items'             => 'Todos los Propiedades alquiler Anual',
        'search_items'          => 'Buscar Propiedades alquiler Anual',
        'not_found'             => 'No se encontraron Propiedades alquiler Anual',
        'not_found_in_trash'    => 'No se encontraron Propiedades alquiler Anual en la papelera',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'alquiler-anual' ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => null,
        'supports'            => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies' => array('category'), // Agregar categorías
        'menu_icon'           => 'dashicons-admin-home', // Cambia el icono aquí

    );

    register_post_type( 'alquiler-anual', $args );
}
add_action( 'init', 'registrar_custom_post_type_propiedad_alquiler_anual' );