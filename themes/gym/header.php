<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css">
    <link rel="stylesheet" href="css/leaflet.awesome-markers.css">
    <script src="js/leaflet.awesome-markers.js"></script>
    <?php wp_head(); ?>
</head>
<body>
    <header class="site_header">
		<div class="logo-mobile text-center">
           <a href="/">
            CBAPROP
            </a>  
        </div>
        <div class="">
            <div class="barra-navegacion ">
            <h2 class="title-logo up-case">CBAPROP</h2>

                    <!-- OBTENER MENU -->
            <?php 
            $args  = array(
            "theme_location" =>"menu-principal", 

            "container" => "nav",
            "container_class"=> "menu-principal"
            );
            wp_nav_menu($args);
            ?>
            
            <div class="btn-read">
                <a class="btn-read" href="">Contactanos</a>
                 </div>
                 
            </div>

        </div>
   

    </header>
