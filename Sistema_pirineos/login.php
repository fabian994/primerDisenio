<?php
	session_start();
	include 'utilerias.php';
	$cs=conecta();
	if ( !isset($_POST['usuario'], $_POST['password']) ) {
		// No se encuentra la informacion necesaria
		msg2("LLenar el usuario y contraseña, favor de recargar la pagina","rojo");
		exit('');
	}

	
	if ($stmt = $cs->prepare('SELECT id, password FROM administradores WHERE usuario = ?')) {//Query para comparar usuario y contraseña
		$stmt->bind_param('s', $_POST['usuario']);
		$stmt->execute();
		$stmt->store_result();

		if ($stmt->num_rows > 0) {// Usuario existe
			$stmt->bind_result($id, $password);// guarda la contraseña.
			$stmt->fetch();
			if (password_verify($_POST['password'], $password)) {// Verifica la contrasena con la de la DB
				// Abre sesion para el sistema
				session_regenerate_id();
				$_SESSION['loggedin'] = TRUE;
				$_SESSION['name'] = $_POST['usuario'];
				$_SESSION['id'] = $id;
				header('Location: menu_sis.html');
			} else {
				// contrasena incorrecta
				msg2("Usuario y/o contraseña incorrectos","rojo");
			}
		} else {
			// usuario incorrecto
			msg2("Usuario y/o contraseña incorrectos","rojo");
		}




		$stmt->close();
	}



?>

