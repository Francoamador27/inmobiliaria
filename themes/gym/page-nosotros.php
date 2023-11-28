<?php get_header();?>
<main class="contenedor">
<div class="title-single">
  <h3 class="title-logos"><?php the_title();  ?></h3>	
</div>
  <?php if( get_field('texto_principal') ): ?>
	<div class="text-principal"><?php the_field('texto_principal'); ?></div>
  <?php endif; ?>
<section class="principal-page">
  <div class="contenido-txt">
    <?php if( get_field('primer_titulo') ): ?>
    <h3 class="title-myv"><?php the_field('primer_titulo'); ?> </h3>
    <?php endif; ?>
    <?php if( get_field('descripcion_primer_titulo') ): ?>
    <p class="desc-primer"> <?php the_field('descripcion_primer_titulo'); ?> </p>
    <?php endif; ?>

  </div>
  <div>
    <div class="hero">
      <?php $image = get_field('imagen_primera_seccion'); ?>
      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
    </div>
  </div>  
</section>
<section class="principal-page">
  <div>
    <div class="hero">
      <?php $image = get_field('imagen_primera_segunda'); ?>
      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
    </div>
  </div> 
  <div class="contenido-txt">
    <?php if( get_field('segundo_titulo') ): ?>
    <h3 class="title-myv"><?php the_field('segundo_titulo'); ?> </h3>
    <?php endif; ?>
    <?php if( get_field('descripcion_primer_titulo') ): ?>
    <p class="desc-primer"> <?php the_field('descripcion_primer_titulo'); ?> </p>
    <?php endif; ?>

  </div> 
</section>
		</main>
    <section class="banner-horizontal banner-service">
        <div class="empty">
            <h1></h1>
        </div>
        <div class="title-midle">
        <h3 class="title_banner">LFI HIGIENE Y SEGURIDAD</h3>
        <p class="eslogan">Los mejores expertos en higiene y seguridad  </p>
        </div>
        <div class="btn-contact">
        <a href="https://wa.link/bewc5x" class="btn-cont">CONTACTANOS</a>
        </div>
    </section>
<section>
  <h3 class="text-center">CONTACTO</h3>
  <div class="cards-contact">
      <div class="card-contact">
        <h4>Telefono</h4>
        <p class="desc-cont">Hace click y llamanos ya</p>
        <a class="btn-contact">Llamar</a>
      </div>
      <div class="card-contact">
        <h4>Whatsapp</h4>
        <p class="desc-cont">Contactate por Whatsapp</p>
        <a href="https://wa.link/bewc5x" class="btn-contact">Whatsapp</a>
      </div>
      <div class="card-contact">
        <h4>Email</h4>
        <p class="desc-cont">Envianos un Email con tu consulta</p>
        <a class="btn-contact">Email</a>
      </div>

  </div>
</section>
<?php get_footer();?>