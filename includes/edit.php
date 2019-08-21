<?php
include("functions.php");
include("../head.php");
 
    $id = $_GET['id'];
 
    $barrio = obtener_barrio($conexion, $id);
 
    $barrio_id = $barrio['id_barrio'];
    $logo = $barrio['logo'];
    $banner = $barrio['banner'];
    $latitud = $barrio['latitud'];
    $longitud = $barrio['longitud'];


if($_SERVER['REQUEST_METHOD'] === 'POST') {   

    post_edit($conexion, $logo, $banner);
    
}

    $barrio_id = $barrio['id_barrio'];
    $logo = $barrio['logo'];
    $banner = $barrio['banner'];
    $latitud = $barrio['latitud'];
?>
 
<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2> Paula SS - Editar Barrio</h2>
                    </div>
                </div>
        </div>
 
       <?php include('form.php'); ?>
 
</div>
 
<script src = "../js/new.js"> </script>
<?php include('../footer.php'); ?>