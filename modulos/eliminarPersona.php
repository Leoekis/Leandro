<?php
include '../inc/conexion.php';
session_start();

$id = $_GET["eliminar"];
$sql2 = $conexion->prepare("DELETE FROM personas WHERE id_persona = ".$id);
$sql2->execute(); 
?>
<!DOCTYPE html>
<html dir="ltr" lang="es">
<head>
    
</head>
<body>  
            <div class="container-fluid">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    ¡Persona eliminada con éxito! <br>

                    <a href="admin.php">Volver</a>
                </div>
            </div>     
</body>
</html>