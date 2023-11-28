<h2 class="serv">Propiedades Destacadas en<span class="sec-color"> Alquiler Anual</span> </h3>
        <section class="-quienes-somos">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php
                    $args = array(
                        'post_type' => 'alquiler-anual', // Reemplaza 'tu_tipo_de_post' con el tipo de post que estás utilizando para tus tarjetas
                        'posts_per_page' => -1 // Recuperar todos los posts del tipo
                    );

                    $query = new WP_Query($args);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) :
                            $query->the_post();
                    ?>
                            <div class="swiper-slide service">
                                <div class="card">
                                <div class="imagen">
                                    <?php get_template_part('components/galeria-card'); ?>
                                    </div>
                                    <div class="left-curve"></div>
                                    <div class="right-curve"></div>
                                    <div class="info">
                                        <h3 class="text-center title-card up-case"><?php the_title(); ?></h3>
                                        <p class="text-center desc-card"><?php the_content(); ?></p>
                                        <div class="text-center div-btn">
                                            <a href="<?php the_permalink(); ?>" class="text-center btn-card">Ver Más</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    endif;
                    wp_reset_postdata(); // Restaurar datos originales
                    ?>
                </div>
            </div>
        </section>
 