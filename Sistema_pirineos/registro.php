<!DOCTYPE html>
<html>
	<head>
		<title>Pirineos</title>
		<meta charset="utf-8">
		<link href="estilos.css" rel="stylesheet" type="text/css">
		<link href="imagenes/logo_pirineos.png" rel="shortcut icon" type="image/png">
	</head>
	<body><center>
	<?php
		
		session_start();
		include 'utilerias.php';
		$cs=conecta();
		if (empty($_POST["op"])) {
		    msg("Es necesario seleccionar una opcion","rojo");
		    exit('');
		 }

		if ($_POST['op']=="1") {//Empieza Altas
			if ( !isset($_POST['usuario'], $_POST['password'], $_POST['nom_admin'], $_POST['op']) ) {
				// Could not get the data that should have been sent.
				msg("Favor de llenar la forma de registro","rojo");
				exit('');
			}
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['usuario']) == 0) {
				msg("El nombre de usuario solo puede contener letras y numeros!","rojo");
			    exit('');
			}
			if (strlen($_POST['usuario']) > 30 || strlen($_POST['usuario']) < 4) {
				msg("El nombre de usuario debe tener una logitud entre 4 y 20!","rojo");
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

			if (empty($_POST['usuario']) || empty($_POST['password']) || empty($_POST['nom_admin'])) {
				// One or more values are empty.
				msg("Favor de llenar la forma de registro","rojo");
				exit('');
				}
				if ($stmt = $cs->prepare('SELECT id, password FROM administaradores WHERE usuario = ?')) {
				// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
				$stmt->bind_param('s', $_POST['usuario']);
				$stmt->execute();
				$stmt->store_result();
				// Store the result so we can check if the account exists in the database.
				if ($stmt->num_rows > 0) {
					// Username already exists
					msg("El nombre de usuario ya existe, favor de escoger otro","rojo");
				} else {
					// Insert new account
					// Username doesnt exists, insert new account
					if ($stmt = $cs->prepare('INSERT INTO administaradores (usuario, password, nom_admin) VALUES (?, ?, ?)')) {
						// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
						$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
						$stmt->bind_param('sss', $_POST['usuario'], $password, $_POST['nom_admin']);
						$stmt->execute();
						msg("Registro completado exitosamente","verde");
						/*$usuario = $_POST['usuario'];
						$nom_admin = $_POST['nom_admin'];
						$op = $_POST['op'];
						echo "<h2>Your Input:</h2>";
						echo $usuario;
						echo "<br>";
						echo $password;
						echo "<br>";
						echo $nom_admin;
						echo "<br>";
						echo $op;*/

					} else {
						// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
						msg("No se pudo realizar la operacion","rojo");
					}
				}
				$stmt->close();
			} else {
				// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
				msg("No se pudo realizar la operacion","rojo");
			}
		}//Termina Altas

		if (($_POST['op']=="2" || $_POST['op']=="3" || $_POST['op']=="4")) {//Comienza Consultas
			if ( !isset($_POST['usuario'], $_POST['op']) ) {
				// Could not get the data that should have been sent.
				msg("Es necesario seleccionar una opcion y escribir el usuario","rojo");
				exit('');
			}
			if (empty($_POST['usuario'])) {
				// One or more values are empty.
				msg("Favor de ingresar el usuario a consultar","rojo");
				exit('');
			}
			$usuario_n=$_POST['usuario'];
			$nom_admin='';
			$query="SELECT * FROM administaradores WHERE usuario = '$usuario_n'";
			$sql=mysqli_query($cs,$query);
			$reg=mysqli_fetch_object($sql);
			if ($reg==mysqli_fetch_array($sql)){
				msg("Error, clave de producto inexistente en base de datos","rojo");
			}
			else{
				
				
				$usuario=$reg->usuario;
				$nom_admin=$reg->nom_admin;
				
				if ($_POST['op']=="2") {
					msg("Consulta realizada exitosamente","verde");
					echo "
						<form action='' method='post'>
							<table border='10%' width='80%'>
								<caption>Registro de Administradores</caption>
								
								<tr align='center'>
									<td><h2><b>Nombre de Usuario:  </b></h2></td>
									<td><input type='text' name='usuario' class='campo' value='$usuario' id='usuario' required></td>
								</tr>
								
								<tr align='center'>
									<td><h2 for='nom_admin'><b>Nombre completo:  </b></h2></td>
									<td><input type='text' name='nom_admin' class='campo' value='$nom_admin' id='nom_admin'></td>
								</tr>
							</table>
						
					";
				}

				if ($_POST['op']=="3") {//Seccion de bajas
					echo "
						<form action='' method='post'>
							<table border='10%' width='80%'>
								<caption>Registro de Administradores</caption>
								
								<tr align='center'>
									<td><h2><b>Nombre de Usuario:  </b></h2></td>
									<td><input type='text' name='usuario' class='campo' value='$usuario' id='usuario' required></td>
								</tr>
								
								<tr align='center'>
									<td><h2 for='nom_admin'><b>Nombre completo:  </b></h2></td>
									<td><input type='text' name='nom_admin' class='campo' value='$nom_admin' id='nom_admin'></td>
								</tr>
								
							</table>						
					";
					
					$usuario_n=$_POST['usuario'];
					$nom_admin='';
					$query="DELETE FROM administaradores WHERE usuario='$usuario_n'";
					$sql=mysqli_query($cs,$query);
					if (mysqli_affected_rows($cs)!=0){
						msg("El registro ha sido eliminado correctamente","verde");
					}
				}//Termina Seccion de bajas
			}
			
			

		}//Termina Consultas

		if ($_POST['op']=="4") {//Seccion de cambios
			$usuario=$_POST['usuario'];
			$query="SELECT * FROM administaradores WHERE usuario='$usuario'";

			$sql=mysqli_query($cs,$query);
			$reg=mysqli_fetch_object($sql);
			if ($reg==mysqli_fetch_array($sql)){
				msg("Error, usuario inexistente en base de datos","rojo");
			}
			else{
				$nom_admin=$_POST['nom_admin'];
				if ((strlen($nom_admin)!=0) && ($nom_admin!=$reg->nom_admin)){
					$query="UPDATE administaradores SET nom_admin='$nom_admin' WHERE usuario='$usuario'";
					$sql=mysqli_query($cs,$query);
				}
				$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				if ((strlen($password)!=0) && ($password!=$reg->password)){
					$query="UPDATE administaradores SET password='$password' WHERE usuario='$usuario'";
					$sql=mysqli_query($cs,$query);
				}
				msg("Cambio realizado correctamente","verde");
			}
			//$cs->close();		
		}//Termina Seccion de cambios

	$cs->close();


	?>

	
	</center></body>
</html>