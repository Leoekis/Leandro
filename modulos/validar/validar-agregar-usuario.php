<?php
include '../../inc/conexion.php';
session_start();

if(isset($_POST['agregar'])){
    $correo = $_POST["correo"];
    $contra = $_POST["contra"];
    $contra2 = $_POST["contra2"];
    $contraDB = md5($contra);
    $id_persona = $_POST["id_persona"];

    if(empty($correo)){
        echo 'Ingrese un correo';
    } else if(empty($contra)){
        echo 'Ingrese una contraseña';
    } else if($contra2 !== $contra){
        echo 'Repita la contraseña';
    } else {
        $sql1 = $conexion->prepare("INSERT INTO usuarios_personas(correo, contra, id_persona)
                                    VALUES (:correo,:contra,:id_persona)");
        $sql1->execute(array(":correo" => $correo,
                             ":contra" => $contraDB,
                             ":id_persona" => $id_persona));
        
        if($sql1->rowCount() == 1){
            echo 'Se agregó un nuevo usuario';
            echo  '<br><a href="../alumnos.php">Volver</a>';
        } else {
            echo 'ERROR';
            echo  '<br><a href="../alumnos.php">Volver</a>';
        }
    }
} else {
    echo 'vacío';
}
?>