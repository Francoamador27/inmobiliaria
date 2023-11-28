<?php

while(have_posts() ): the_post();
?> 
<h1 class="text-center texto-primario"><?php the_title(); ?></h1>


<?php if(has_post_thumbnail()) :
    the_post_thumbnail('blog',array('class' => 'imagen-destacada-clase'));
  

    endif; ?>

<?php 
$hora_inicio = get_field('hora_inicio');
 $hora_fin = get_field('hora_fin');


        the_field('dias_clase');
        echo ' ' . $hora_inicio . ' a ' . $hora_fin;
?>


<?php endwhile ;