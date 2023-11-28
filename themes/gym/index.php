<!-- PAGINA PRINCIPAL -->

<?php 
/* 
Template Name: Listado de clases
*/
get_header();?>
<!-- BANNER -->
<section>
  <div class="">
            <?php  get_template_part('components/banner'); ?>
    </div>  
</section>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Filtros</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="">
            <?php  get_template_part('components/form-search-propery'); ?>
     </div>
      </div>
   
    </div>
  </div>
</div>


<div class="">
     <div class="">
        <!-- Otros contenidos -->
        <?php get_template_part('components/temporario-premium'); ?>

     </div>
</div>
        <div class="">
             <div class="">
                <!-- Otros contenidos -->
                <?php get_template_part('components/propiedades-premium'); ?>

             </div>
        </div>
        <div class="">
             <div class="">
                <!-- Otros contenidos -->
                <?php get_template_part('components/alquiler-anual'); ?>

             </div>
        </div>
         
             <div class="">
                <!-- Otros contenidos -->
                <?php get_template_part('components/banner-horizontal'); ?>

             </div>

        <div class="row">
            <div class="">
                <?php get_template_part('components/sileder-inicio'); ?>
            </div>
            
        </div>
     
    
<?php get_footer();?>
