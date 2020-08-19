<?php
include '../inc/conexion.php';
session_start();

$id = $_GET["eliminar"];
$sql2 = $conexion->prepare("DELETE FROM usuarios_personas WHERE id = ".$id);
$sql2->execute(); 
?>
<!DOCTYPE html>
<html dir="ltr" lang="es">
<head>
    
</head>
<body>  
            <div class="container-fluid">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    ¡Persona eliminado con éxito! <br>

                    <a href="usuarios.php">Volver</a>
                </div>
            </div>     
</body>
</html>