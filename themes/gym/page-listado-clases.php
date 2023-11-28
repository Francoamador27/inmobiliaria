<?php 

/* 
Template Name: Listado de clases
*/

get_header();?>


<main class="contenedor  seccion ">
<div class="contenido-principal">
    <h2 class="text-center">Directorio</h2>
    <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>



<ul class="listado-grid">

    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = array(
        'post_type' => 'gymfitness_clases',
        'posts_per_page' => 10,
        'paged' => $paged,


    );
    $clases = new WP_Query($args);

    while($clases-> have_posts()){
        $clases->the_post();
        ?>
<li class="card">
            <?php the_post_thumbnail(); ?>
<div class="contenido">
                    <a href="<?php the_permalink(); ?>">
                <h3 class="title-card"> <?php the_title(); ?>    </h3>

                
                </a>
                <a href="<?php the_permalink(); ?>">
                <?php 
                $hora_inicio = get_field('hora_inicio');
              $hora_fin = get_field('hora_fin');
                ?>
                <p class="dias-hs"><?php the_field('dias_clase');?> - <?php echo $hora_inicio . ' a ' . $hora_fin  ?></p>
                <?php $terkep = get_field('location'); 
                $direccion = $terkep['address'];
                
                ?>
                <div class="direccion">
                <p><?php echo $direccion ?> </p>


                </div>
                </a>

                <div class="texto-clase search">
          <p>

        <?php
$categories = get_the_category();
 
if (!empty($categories)) {
    foreach ($categories as $category) {
        echo esc_html( $category-> name. " / " );
    
    }
}
?>
</p>
</div>
    </div>


</li>

   <?php }
   wp_reset_postdata();
   
   ?>



</ul>

</div>
   <section class="paginacion"> 
<?php 
    $total_pages = $clases->max_num_pages;

    if ($total_pages > 1){

        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text'    => __('« Anterior'),
            'next_text'    => __('Siguiente »'),
        ));
    }
    ?>    
</section>
</main>
<?php get_footer();?>
