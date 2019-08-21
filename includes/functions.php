<?php 

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/db.php');

function obtener_barrios($conexion) {

$query = "SELECT bar.id,numero,logo,banner,latitud,longitud 
                FROM barrios as bar
                INNER JOIN id_barrios as idb 
                ON bar.id_barrio = idb.id";

                $result = mysqli_query($conexion, $query);
                
                if ($conexion->connect_errno) {
                  printf("Connect failed: %s\n", $conexion->connect_error);
                 die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
                } 

    return $result->fetch_all(MYSQLI_ASSOC);
}

function post_index($conexion) {

    $barrio = $_POST['barrio']; 
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    
    $uploadDir = '/wamp64/www/paula_ss/imagenes/'; 
    $logoTmp = $_FILES['logo']['tmp_name']; 
    $logoName = $_FILES['logo']['name']; 
    
    if (move_uploaded_file($logoTmp, $uploadDir . $logoName)) { 
        //echo "El logo se subió correctamente.\n";
    } else {
        //echo "El logo no pudo ser cargado\n";
    }

    $uploadDir = '/wamp64/www/paula_ss/imagenes/'; 
    $bannerTmp = $_FILES['banner']['tmp_name']; 
    $bannerName = $_FILES['banner']['name']; 
    
    if (move_uploaded_file($bannerTmp, $uploadDir . $bannerName)) { 
        //echo "El banner se subió correctamente.\n";
    } else {
        //echo "El banner no pudo ser cargado\n";
    }

    $result = insertar_barrio($conexion, $barrio, $logoName, $bannerName, $latitud, $longitud);   
}

function insertar_barrio($conexion, $barrio, $logoName, $bannerName, $latitud, $longitud) {

    $query = "INSERT INTO  barrios (id_barrio,logo,banner,latitud,longitud)  
    VALUES ('$barrio','$logoName','$bannerName','$latitud','$longitud')";

    $result = mysqli_query($conexion, $query);
    
    if($result) {
       echo '<script language="javascript">alert("Los datos se subieron correctamente");</script>'; 
    } else {
        echo  '<script language="javascript">alert("No se pudieron subir los datos");</script>'; 
    echo $conexion->error;
    }

    return $result;
}

//edit.php

function obtener_barrio($conexion, $id) {

    $query = "SELECT bar.id,id_barrio,logo,banner,latitud,longitud
    FROM barrios as bar
    INNER JOIN id_barrios as idb
    ON bar.id_barrio = idb.id WHERE bar.id = $id";
 
    $result = mysqli_query($conexion, $query);
 
    if ($conexion->connect_errno) {
        printf("Connect failed: %s\n", $conexion->connect_error);
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    }

    return $result->fetch_assoc();
}


function actualizar_barrio($conexion, $barrio, $logoName, $bannerName, $latitud, $longitud, $id) {

    $query = "UPDATE barrios
    SET id_barrio = '$barrio',
    logo = '$logoName',
    banner = '$bannerName',
    latitud = '$latitud',
    longitud = '$longitud'
    WHERE id = $id";
 
    $result = mysqli_query($conexion, $query);

    return $result;
}

function post_edit($conexion, $logo, $banner) {

        $id = $_GET['id'];
       
        $barrio = $_POST['barrio'];
        $latitud = $_POST['latitud'];
        $longitud = $_POST['longitud'];
     
        $uploadDir = '/wamp64/www/paula_ss/imagenes/';
        $logoTmp = $_FILES['logo']['tmp_name'];
     
        if ($_FILES['logo']['name'] === "") {
            
            $logoName = $logo;
    
        } else {
            
            $logoName = $_FILES['logo']['name'];
    
            if (move_uploaded_file($logoTmp, $uploadDir . $logoName)) {
               //echo "El logo se subió correctamente.\n";
            } else {
                //echo "El logo no pudo ser cargado\n";
            }
            
        }
     
        $uploadDir = '/wamp64/www/paula_ss/imagenes/';
        $bannerTmp = $_FILES['banner']['tmp_name'];
    
        if ($_FILES['banner']['name'] === "") {
    
            $bannerName = $banner;
    
        } else {
    
            $bannerName = $_FILES['banner']['name'];
    
            if (move_uploaded_file($bannerTmp, $uploadDir . $bannerName)) {
                //echo "El banner se subió correctamente.\n";
            } else {
                //echo "El banner no pudo ser cargado\n";
            }
        }
       
        $result = actualizar_barrio($conexion, $barrio, $logoName, $bannerName, $latitud, $longitud, $id);
       
        if(!$result) {
            die('Query Failed: ' . $conexion->error);
        } else {
            echo"<script language='javascript'>window.location='../index.php'</script>;";
        }   
}

//delete.php

function delete($conexion, $id) {

    $id = $_GET['id'];
    
    $query = "DELETE FROM barrios WHERE id = $id";
    
    
    $result = mysqli_query($conexion, $query);
    
    if(!$result) {
        die("Query Failed.");
    } else {
        echo"<script language='javascript'>window.location='../index.php'</script>;";
    }

    return $result;

}
