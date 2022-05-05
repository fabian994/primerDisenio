<?php
	session_start();
	include 'utilerias.php';
	$cs=conecta();
	if ( !isset($_POST['usuario']) ) {
		// Verifica si recibio datos
		msg("Favor de llenar el campo de usuario","rojo");
		exit('');
	}

	if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['password']) == 0) {
		msg("La contraseña solo puede contener letras y numeros!","rojo");
	    exit('');
	}
	if (strlen($_POST['password']) > 16 || strlen($_POST['password']) < 8) {
		msg("La contraseña debe de tener entre 8 y 16 caracteres!","rojo");
		exit('');
	}
	if ($stmt = $cs->prepare('SELECT * FROM administradores WHERE usuario = ?')) {
		$stmt->bind_param('s', $_POST['usuario']);
		$stmt->execute();
		$stmt->store_result();
		// Almacena el resultado y verifica si existe en la DB
		if ($stmt->num_rows > 0) {
			
			if (strlen($password)!=0 ){//Verifica que longitud > 0
				if (password_verify($_POST['password'], $password)){//Verifica si el hash de la contraseña es igual al de la base de datos
					$password=$password;
				}
				else{
					$password = password_hash($_POST['password'], PASSWORD_DEFAULT);//Crea hash de la contraseña
				}
			}

			if ((strlen($nom_admin)!=0) && ($nom_admin!=$stmt->nom_admin)){//Verifica longitud >0 y que no sea identico al contenido de la DB
				$nom_admin=$_POST['nom_admin'];
			}
			else{
				$nom_admin=$stmt->nom_admin;//
			}

			if ($stmt = $cs->prepare("UPDATE administradores SET password='$password', nom_admin='$nom_admin' WHERE usuario='$usuario'")) {//Actualiza registro en la DB
				$stmt->bind_param('ss', $password, $_POST['nom_admin']);
				$stmt->execute();
				msg("Cambio(s) completado exitosamente","verde");
			}
		}
	}

?>