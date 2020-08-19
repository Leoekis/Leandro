<?php
include '../../inc/conexion.php';
session_start();

$id = $_GET["editar"];
if(isset($_POST['editar'])){
    $ape_y_nom = $_POST["ape_y_nom"];
    $dni = $_POST["dni"];
    $edad = $_POST["edad"];
    $localidad = $_POST["localidad"];

    if(empty($ape_y_nom)){
        echo 'Ingrese un apellido y nombre';
    } else if(empty($dni)){
        echo 'Ingrese un dni';
    } else if(empty($edad)){
        echo 'Ingrese una edad';
    } else if(empty($localidad)){
        echo 'Ingrese una localidad';
    } else {
        $sql1 = $conexion->prepare("UPDATE personas SET ape_y_nom = '".$ape_y_nom."', dni = '".$dni."', edad = '".$edad."', localidad = '".$localidad."' WHERE id_persona = ".$id);
        $contador = $sql1->execute();
        
        if($contador === TRUE){
            echo 'Se editó correctamente';
            echo  '<br><a href="../../modulos/admin.php">Volver</a>';
        } else {
            echo 'ERROR';
        }
    }
} else {
    echo 'Vacío';
}
?>