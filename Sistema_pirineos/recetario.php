<!DOCTYPE html>
<html>
	<head>
		<title>Pirineos</title>
		<meta charset="utf-8">
		<link href="estilos.css" rel="stylesheet" type="text/css">
		<link href="imagenes/logo_pirineos.png" rel="shortcut icon" type="image/png">
		<script src="recetario.js" type="text/JavaScript"></script>
	</head>
	<body><center>
	<?php
		include 'utilerias.php';
		$op=$_GET['op'];
		$tipo_rec=$_GET['tipo_rec'];
		//if ($op==0) sel_tipo_prod();
		if ($op==0) sel_tipo_prod();
		if ($op==1) f_recetario($op, $tipo_rec);
		if ($op==2) f_recetario($op, $tipo_rec);
		if ($op==3) f_recetario($op, $tipo_rec);
		if ($op==4) f_recetario($op, $tipo_rec);
		if ($op==5) f_recetario($op, $tipo_rec);

		if ($op==6) altas();
		if ($op==7) bajas();
		if ($op==8) consultas();
		if ($op==9) cambios();

		function tomar_datos(){
			global $cve_rec, $nom_rec, $tipo_rec, $img_rec, $cat;
			$cve_rec=$_GET['cve_rec'];
			$nom_rec=$_GET['nom_rec'];
			$tipo_rec=$_GET['tipo_rec'];
			$img_rec=$_GET['img_rec'];
			$cat=$_GET['cat'];
		}

		function altas(){
			global $cve_rec, $nom_rec, $tipo_rec, $img_rec, $cat, $op;
			tomar_datos();

			// Verifica que no se duplique la clave del recetas
			$cs=conecta();

			$query="SELECT * FROM recetas WHERE cve_rec='$cve_rec'";
			$sql=mysqli_query($cs,$query);
			$reg=mysqli_fetch_object($sql);
			if ($reg!=mysqli_fetch_array($sql)){
				msg("Error, clave de producto se duplica en base de datos","rojo");
			}
			else{
				$query="INSERT INTO recetas VALUES ('$cve_rec','$nom_rec','$tipo_rec','$img_rec')";
				$sql=mysqli_query($cs,$query);
				msg("El registro ha sido grabado correctamente","verde");
				
			}
			
		} // Termina altas

		function consultas(){
			global $cve_rec, $nom_rec, $tipo_rec, $img_rec, $cat, $op;
			tomar_datos();
			//echo "cve_prod=".$cve_prod;
			
			$cs=conecta();

			$query="SELECT * FROM recetas WHERE cve_rec='$cve_rec'";
			
			
			$sql=mysqli_query($cs,$query);
			$reg=mysqli_fetch_object($sql);
			if ($reg==mysqli_fetch_array($sql)){
				msg("Error, clave de producto inexistente en base de datos","rojo");
			}
			else{
				$nom_rec=$reg->nom_rec;
				$tipo_rec=$reg->tipo_rec;
				$img_rec=$reg->img_rec;
				//echo "cve_prod=".$cve_prod." nom_prod=".$nom_prod." tipo_prod=".$tipo_prod." descripcion_prod=".$descripcion_prod;
				msg("Accion realizada","verde");
				f_recetario($op, $tipo_rec);
			}
		} // Termina consultas

		function bajas(){
			global $cve_rec, $nom_rec, $tipo_rec, $img_rec, $cat, $op;
			consultas();
			$cs=conecta();

			//$query="DELETE Fif ($cat==1) {
			$query1="DELETE FROM recetas WHERE cve_rec='$cve_rec'";
			$sql1=mysqli_query($cs,$query1);
			if (mysqli_affected_rows($cs)!=0){
				msg("El registro ha sido eliminado","verde");
			}
		} // Termina bajas

		function cambios(){
			global $cve_rec, $nom_rec, $tipo_rec, $img_rec, $cat, $op;
			tomar_datos();
			$cs=conecta();

			$query="SELECT * FROM recetas WHERE cve_rec='$cve_rec'";

			$sql=mysqli_query($cs,$query);
			$reg=mysqli_fetch_object($sql);
			if ($reg==mysqli_fetch_array($sql)){
				msg("Error, clave de producto inexistente en base de datos","rojo");
			}
			else{
				
				if ((strlen($img_rec)!=0) && ($img_rec!=$reg->img_rec)){
					$query="UPDATE recetas SET img_rec='$img_rec' WHERE cve_rec='$cve_rec'";
					$sql=mysqli_query($cs,$query);
					
				}
				if ((strlen($nom_rec)!=0) && ($nom_rec!=$reg->nom_rec)){
					$query="UPDATE recetas SET nom_rec='$nom_rec' WHERE cve_rec='$cve_rec'";
					$sql=mysqli_query($cs,$query);
					
				}
				msg("El cambio ha sido realizado","verde");
			}
			
		} // Termina Cambios

		function sel_tipo_prod(){
			global $cve_rec, $nom_rec, $tipo_rec, $img_rec, $cat;
			echo "
				<br><br>
				<form name='f_recetario'>
				<table border='10%' width='80%'>
					<tr align='center'>
						<td colspan='2'>
							<table width='100%'>
								<tr align='center'>
									<td><input name='b_HaTrigo' type='button' class='boton_prod' value='Harinas de Trigo' onClick='prod_op_selec(1)'>
									</td>
									<td><input name='b_Ha3Estrellas' type='button' class='boton_prod' value='Harinas preparadas Tres Estrellas' onClick='prod_op_selec(2)'>
									</td>
									<td><input name='b_Polvo3Estrellas' type='button' class='boton_prod' value='Polvo Para Hornear Tres Estrellas' onClick='prod_op_selec(3)'>
									</td>
									<td><input name='b_Rendimix' type='button' class='boton_prod' value='Mejorante RendiMix' onClick='prod_op_selec(4)'>
									</td>
									<td><input name='b_DevTrigo' type='button' class='boton_prod' value='Derivados de Trigo' onClick='prod_op_selec(5)'>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				</form>
			";
		} //Termina formulario
	
		function f_recetario($op, $tipo_rec){
				global $cve_rec, $nom_rec, $tipo_rec, $img_rec, $op;
				echo "
				<br><br>
				<form name='f_prod_selec'>
				<table border='10%' width='80%'>
					<tr align='center'>
						<td colspan='2'>
							<table width='100%'>
								<tr align='center'>
									<td><input name='b_HaTrigo' type='button' class='boton_prod' value='Harinas de Trigo' onClick='prod_op_selec(1)'>
									</td>
									<td><input name='b_Ha3Estrellas' type='button' class='boton_prod' value='Harinas preparadas Tres Estrellas' onClick='prod_op_selec(2)'>
									</td>
									<td><input name='b_Polvo3Estrellas' type='button' class='boton_prod' value='Polvo Para Hornear Tres Estrellas' onClick='prod_op_selec(3)'>
									</td>
									<td><input name='b_Rendimix' type='button' class='boton_prod' value='Mejorante RendiMix' onClick='prod_op_selec(4)'>
									</td>
									<td><input name='b_DevTrigo' type='button' class='boton_prod' value='Derivados de Trigo' onClick='prod_op_selec(5)'>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				</form>
			";

				echo "
					<br>
					<form name='f_recetario'>
					<table border='10%' width='80%'>
						<caption>Recetario</caption>
						
						<tr align='center'>
							<td><p>Clave de la receta</p></td>
							<td><input name='cve_rec' type='text' class='campo' maxlength='5' value='$cve_rec'></td>
						</tr>
						<tr align='center'>
							<td><p>Nombre de la receta</p></td>
							<td><input name='nom_rec' type='text' class='campo' maxlength='50' value='$nom_rec'></td>
						</tr>
						<tr align='center'>
							<td><p>Clave de la categoria de la receta</p></td>
							<td><input name='tipo_rec' type='text' class='campo' maxlength='5' value='$tipo_rec' disabled style= 'background: grey'></td>
						</tr>
						
						<tr align='center'>
							<td><p>Imagen de la receta</p></td>
							<td><input name='img_rec' type='text' class='campo' maxlength='255' value='$img_rec'></td>
						</tr>
						
						<tr align='center'>
							<td colspan='2'>
								<table width='100%'>
									<tr align='center'>
										<td><input name='b_altas' type='button' class='boton' value='Altas' onClick='altas($op)'>
										</td>
										<td><input name='b_bajas' type='button' class='boton' value='Bajas' onClick='bajas($op)'>
										</td>
										<td><input name='b_consultas' type='button' class='boton' value='Consultas' onClick='consultas($op)'>
										</td>
										<td><input name='b_cambios' type='button' class='boton' value='Cambios' onClick='cambios($op)'>
										</td>
										<td><input name='b_reset' type='reset' class='boton' value='Reiniciar' id='rojo'>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					</form>
				";				

		} //Termina formulario
	?>
	</center></body>
</html>