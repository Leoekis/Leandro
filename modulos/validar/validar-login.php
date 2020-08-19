<?php
include '../../inc/conexion.php';
session_start(); //Utilizo para las sesiones

//isset = existe
if (isset($_POST['conectar'])){ 
	$correo = $_POST['correo'];
    $contra = $_POST['contra'];
	$contra2 = md5($contra);
	//Consulta para buscar un usuario con los datos recibidos
	$consulta = "SELECT * FROM usuarios_personas user JOIN personas persona ON user.id_persona = persona.id_persona WHERE user.correo = :correo and user.contra = :contra";
    $contador = $conexion->prepare($consulta);
	$contador->execute(array(":correo" => $correo, ":contra" => $contra2));
	//Pasamos a objeto los resultados
    $resultado = $contador->fetch(PDO::FETCH_OBJ);

	// Verificar campos
	if (empty($correo)){
        echo 'Correo inválido';
    } else if (empty($contra)){
        echo 'Contraseña inválida';
    } else {
		// Proceder a conectar
		if ($contador->rowCount() == 1){
            $_SESSION['ingreso'] = true;
			$_SESSION['correo'] = $resultado->correo;
			$_SESSION['nombre'] = $resultado->ape_y_nom;
			
			header ('Location: ../admin.php');
			exit;
		} else {
			echo 'Email o contraseña inválidos';
		}
	}
} else {
    echo 'Vacío';
}
?>