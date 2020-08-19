<?php
include '../../inc/conexion.php';
session_start();

$id = $_GET["editar"];
if(isset($_POST['editar'])){
    $correo = $_POST["correo"];
    $contra = $_POST["contra"];
    $contra2 = $_POST["contra2"];
    $contraDB = md5($contra);

    if(empty($correo)){
        echo 'Ingrese un correo';
    } else if(empty($contra)){
        echo 'Ingrese una contraseña';
    } else if($contra2 !== $contra){
        echo 'Repita la contraseña';
    } else {
        $sql1 = $conexion->prepare("UPDATE usuarios_personas SET correo = '".$correo."', contra = '".$contraDB."' WHERE id = ".$id);
        $contador = $sql1->execute();
        
        if($contador === TRUE){
            echo 'El usuario se editó correctamente'; 
            echo  '<br><a href="../usuarios.php">Volver</a>';
        } else {
            echo 'ERROR';
            echo  '<br><a href="../usuarios.php">Volver</a>';
        }
    }
} else {
    echo 'vacío';
}
?>