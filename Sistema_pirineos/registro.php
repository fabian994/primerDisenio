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
				// No recibe valores
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
				// Los verifica que los valores no este vacios
				msg("Favor de llenar la forma de registro","rojo");
				exit('');
				}
				if ($stmt = $cs->prepare('SELECT id, password FROM administradores WHERE usuario = ?')) {
				$stmt->bind_param('s', $_POST['usuario']);
				$stmt->execute();
				$stmt->store_result();
				// Verifica que el usuario exista en la DB
				if ($stmt->num_rows > 0) {
					// Usuario ya existe
					msg("El nombre de usuario ya existe, favor de escoger otro","rojo");
				} else {
					// Prepara para crear nueva cuenta
					if ($stmt = $cs->prepare('INSERT INTO administradores (usuario, password, nom_admin) VALUES (?, ?, ?)')) {
						// Se encripta la contrasela usado password_hash y en el login password_verify se usa para verifcarla al momento de ingresar
						$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
						$stmt->bind_param('sss', $_POST['usuario'], $password, $_POST['nom_admin']);
						$stmt->execute();
						msg("Registro completado exitosamente","verde");

					} else {
						msg("No se pudo realizar la operacion","rojo");
					}
				}
				$stmt->close();
			} else {
				msg("No se pudo realizar la operacion","rojo");
			}
		}//Termina Altas

		if (($_POST['op']=="2" || $_POST['op']=="3")) {//Comienza Consultas
			if ( !isset($_POST['usuario'], $_POST['op']) ) {
				// No se escribio el usuario
				msg("Es necesario seleccionar una opcion y escribir el usuario","rojo");
				exit('');
			}
			if (empty($_POST['usuario'])) {
				msg("Favor de ingresar el usuario a consultar","rojo");
				exit('');
			}
			$usuario_n=$_POST['usuario'];
			$nom_admin='';
			$query="SELECT * FROM administradores WHERE usuario = '$usuario_n'";
			$sql=mysqli_query($cs,$query);
			$reg=mysqli_fetch_object($sql);
			if ($reg==mysqli_fetch_array($sql)){
				msg("Error, usuario inexistente en base de datos","rojo");
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
					$query="DELETE FROM administradores WHERE usuario='$usuario_n'";
					$sql=mysqli_query($cs,$query);
					if (mysqli_affected_rows($cs)!=0){
						msg("El registro ha sido eliminado correctamente","verde");
					}
				}//Termina Seccion de bajas
			}
			
			

		}//Termina Consultas

		if ($_POST['op']=="4") {//Seccion de cambios
			$usuario=$_POST['usuario'];
			$query="SELECT * FROM administradores WHERE usuario='$usuario'";

			$sql=mysqli_query($cs,$query);
			$reg=mysqli_fetch_object($sql);
			if ($reg==mysqli_fetch_array($sql)){
				msg("Error, usuario inexistente en base de datos","rojo");
			}
			else{
				$nom_admin=$_POST['nom_admin'];
				if ((strlen($nom_admin)!=0) && ($nom_admin!=$reg->nom_admin)){
					$query="UPDATE administradores SET nom_admin='$nom_admin' WHERE usuario='$usuario'";
					$sql=mysqli_query($cs,$query);
				}
				$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				if ((strlen($password)!=0) && ($password!=$reg->password)){
					if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['password']) == 0) {
						msg("La contraseña solo puede contener letras y numeros!","rojo");
					    exit('');
					}
					if (strlen($_POST['password']) > 16 || strlen($_POST['password']) < 8) {
						msg("La contraseña debe de tener entre 8 y 16 caracteres!","rojo");
						exit('');
					$query="UPDATE administradores SET password='$password' WHERE usuario='$usuario'";
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