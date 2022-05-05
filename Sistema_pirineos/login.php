<?php
	session_start();
	include 'utilerias.php';
	$cs=conecta();
	if ( !isset($_POST['usuario'], $_POST['password']) ) {
		// Could not get the data that should have been sent.
		msg2("LLenar el usuario y contraseña, favor de recargar la pagina","rojo");
		exit('');
	}

	
	if ($stmt = $cs->prepare('SELECT id, password FROM administaradores WHERE usuario = ?')) {
		$stmt->bind_param('s', $_POST['usuario']);
		$stmt->execute();
		$stmt->store_result();

		if ($stmt->num_rows > 0) {
			$stmt->bind_result($id, $password);
			$stmt->fetch();
			// Account exists, now we verify the password.
			// Note: remember to use password_hash in your registration file to store the hashed passwords.
			if (password_verify($_POST['password'], $password)) {
				// Verification success! User has logged-in!
				// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
				session_regenerate_id();
				$_SESSION['loggedin'] = TRUE;
				$_SESSION['name'] = $_POST['usuario'];
				$_SESSION['id'] = $id;
				header('Location: menu_sis.html');
			} else {
				// Incorrect password
				msg2("Usuario y/o contraseña incorrectos","rojo");
			}
		} else {
			// Incorrect username
			msg2("Usuario y/o contraseña incorrectos","rojo");
		}




		$stmt->close();
	}



?>

