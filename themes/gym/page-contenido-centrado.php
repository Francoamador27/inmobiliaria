<?php 

/* 
*Template Name: Servicios con SIDEBAR 
*/
get_header();?>
  <section class="banner-horizontal banner-service">
        <div class="empty">
            <h1></h1>
        </div>
        <div class="title-midle">
        <h3 class="title_banner"><?php the_title(); ?></h3>
        <p class="eslogan">Los mejores expertos en higiene y seguridad  </p>
        </div>
        <div class="btn-contact">
        <a href="https://wa.link/bewc5x" class="btn-cont">CONTACTANOS</a>
        </div>
    </section>

<main class="container">
  
    <div class=" flex-service">
        <div class="principal">
            <?php if(has_post_thumbnail()) :
					the_post_thumbnail('mediano',array('class' => 'imagen-destacada-blog'));
				endif; ?>
            <?php the_content(); ?>
        </div>
        <div class="sidebar">
        <?php dynamic_sidebar('sidebar_1')?>
       
            <h4 class="destacados">DESTACADOS</h4>
            <?php get_template_part('components/list-sidebar'); ?>
                       <h4 class="destacados">CONTACTO</h4>
        
            <div class="botones "> 
                <p class="botones-botom" >Email: info@higieneyseguridadlfi.com.ar </p>
                 <p class="botones-botom">Whatsapp: 32332432423 </p>
            
                <a class="btn-read">LLamar</a>
                <a href="https://wa.link/bewc5x" class="btn-read">Whatsapp</a>

            </div>
        </div>
   
</div>
   
    
</main>
<div class="row">
        <div class="col-md-6">
            
        <?php
            $habilitaciones = get_the_title();
            ?>
            
            <?php // Aquí puedes cambiar "mi_valor" por el valor que desees
            $partial = 'components/' . $habilitaciones;

            get_template_part($partial);
            ?>
        </div>
     
    </div>
<?php get_footer();?>
