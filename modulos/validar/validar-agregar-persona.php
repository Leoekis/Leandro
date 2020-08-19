<?php
include '../../inc/conexion.php';
session_start();

if(isset($_POST['agregar'])){
    $ape_y_nom = $_POST["ape_y_nom"];
    $dni = $_POST["dni"];
    $edad = $_POST["edad"];
    $localidad = $_POST["localidad"];
    $rango = $_POST["rango"];

    if(empty($ape_y_nom)){
        echo 'Ingrese un apellido y nombre';
    } else if(empty($dni)){
        echo 'Ingrese un dni';
    } else if(empty($edad)){
        echo 'Ingrese una edad';
    } else if(empty($localidad)){
        echo 'Ingrese una localidad';
    } else {
        $sql1 = $conexion->prepare("INSERT INTO personas(ape_y_nom, dni, edad, localidad, rango)
                                    VALUES (:ape_y_nom,:dni,:edad,:localidad,:rango)");
        $sql1->execute(array(":ape_y_nom" => $ape_y_nom,
                             ":dni" => $dni,
                             ":edad" => $edad,
                             ":localidad" => $localidad,
                             ":rango" => $rango));

        if($sql1->rowCount() == 1){ 
            echo 'Se agregó una nueva persona';
            echo  '<br><a href="../admin.php">Volver</a>';
        } else {
            echo 'ERROR';
            echo  '<br><a href="../admin.php">Volver</a>';
        }
    }
} else {
    echo 'vacío';
}
?>