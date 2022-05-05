<?php
	session_start();
	include 'utilerias.php';
	$cs=conecta();
	if ( !isset($_POST['usuario']) ) {
		// Could not get the data that should have been sent.
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
	if ($stmt = $cs->prepare('SELECT * FROM administaradores WHERE usuario = ?')) {
		// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
		$stmt->bind_param('s', $_POST['usuario']);
		$stmt->execute();
		$stmt->store_result();
		// Store the result so we can check if the account exists in the database.
		if ($stmt->num_rows > 0) {
			// Username already exists
			//(strlen($descripcion_prod)!=0) && ($descripcion_prod!=$reg->descripcion_prod)
			
			
			if (strlen($password)!=0 ){
				if (password_verify($_POST['password'], $password)){
					$password=$password;
				}
				else{
					$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				}
			}

			if ((strlen($nom_admin)!=0) && ($nom_admin!=$stmt->nom_admin)){
				$nom_admin=$_POST['nom_admin'];
			}
			else{
				$nom_admin=$stmt->nom_admin;
			}

			if ($stmt = $cs->prepare("UPDATE administaradores SET password='$password', nom_admin='$nom_admin' WHERE usuario='$usuario'")) {
				// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
				
				$stmt->bind_param('ss', $password, $_POST['nom_admin']);
				$stmt->execute();
				msg("Cambio(s) completado exitosamente","verde");
			}
		}
	}

?>