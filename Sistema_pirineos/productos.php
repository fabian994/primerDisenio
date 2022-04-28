<!DOCTYPE html>
<html>
	<head>
		<title>Pirineos</title>
		<meta charset="utf-8">
		<link href="estilos.css" rel="stylesheet" type="text/css">
		<link href="imagenes/logo_pirineos.png" rel="shortcut icon" type="image/png">
		<script src="productos.js" type="text/JavaScript"></script>
	</head>
	<body><center>
	<?php
		include 'utilerias.php';
		$op=$_GET['op'];
		//if ($op==0) sel_tipo_prod();
		if ($op==0) f_HaTrigo();
		/*if ($op==2) f_HaTrigo();
		if ($op==3) f_HaTrigo();
		if ($op==4) f_HaTrigo();
		if ($op==5) f_HaTrigo();*/

		if ($op==6) altas();
		if ($op==7) bajas();
		if ($op==8) consultas();
		if ($op==9) cambios();

		function tomar_datos(){
			global $cve_prod, $nom_prod, $tipo_prod, $descripcion_prod, $img_prod;
			$cve_prod=$_GET['cve_prod'];
			$nom_prod=$_GET['nom_prod'];
			$tipo_prod=$_GET['tipo_prod'];
			$descripcion_prod=$_GET['descripcion_prod'];
			$img_prod=$_GET['img_prod'];
		}

		function altas(){
			global $cve_prod, $nom_prod, $tipo_prod, $descripcion_prod, $img_prod;
			tomar_datos();

			// Verifica que no se duplique la clave del producto
			$cs=conecta();
			$query="SELECT * FROM productos WHERE cve_prod='$cve_prod'";
			$sql=mysqli_query($cs,$query);
			$reg=mysqli_fetch_object($sql);
			if ($reg!=mysqli_fetch_array($sql)){
				msg("Error, clave de producto se duplica en base de datos","rojo");
			}
			else{
				
				$query="INSERT INTO productos VALUES ('$cve_prod','$nom_prod','$tipo_prod','$descripcion_prod','$img_prod')";
				$sql=mysqli_query($cs,$query);
				msg("El registro ha sido grabado correctamente","verde");
				}
			
		} // Termina altas

		function consultas(){
			global $cve_prod, $nom_prod, $tipo_prod, $descripcion_prod, $img_prod;
			tomar_datos();
			//echo "cve_prod=".$cve_prod;
			$cs=conecta();
			$query="SELECT * FROM productos WHERE cve_prod='$cve_prod'";
			$sql=mysqli_query($cs,$query);
			$reg=mysqli_fetch_object($sql);
			if ($reg==mysqli_fetch_array($sql)){
				msg("Error, clave de producto inexistente en base de datos","rojo");
			}
			else{
				$nom_prod=$reg->nom_prod;
				$tipo_prod=$reg->tipo_prod;
				$descripcion_prod=$reg->descripcion_prod;
				$img_prod=$reg->img_prod;
				//echo "cve_prod=".$cve_prod." nom_prod=".$nom_prod." tipo_prod=".$tipo_prod." descripcion_prod=".$descripcion_prod;
				 f_HaTrigo();
			}
		} // Termina consultas

		function bajas(){
			global $cve_prod, $nom_prod, $tipo_prod, $descripcion_prod, $img_prod;
			consultas();
			$cs=conecta();
			$query="DELETE FROM productos WHERE cve_prod='$cve_prod'";
			$sql=mysqli_query($cs,$query);
			if (mysqli_affected_rows($cs)!=0){
				msg("El registro ha sido eliminado","verde");
			}
		} // Termina bajas

		function cambios(){
			global $cve_prod, $nom_prod, $tipo_prod, $descripcion_prod, $img_prod;
			tomar_datos();
			$cs=conecta();
			$query="SELECT * FROM productos WHERE cve_prod='$cve_prod'";
			$sql=mysqli_query($cs,$query);
			$reg=mysqli_fetch_object($sql);
			if ($reg==mysqli_fetch_array($sql)){
				msg("Error, clave de producto inexistente en base de datos","rojo");
			}
			else{
				if ((strlen($descripcion_prod)!=0) && ($descripcion_prod!=$reg->descripcion_prod)){
					$query="UPDATE productos SET descripcion_prod='$descripcion_prod' WHERE cve_prod='$cve_prod'";
					$sql=mysqli_query($cs,$query);
					msg("El cambio ha sido realizado","verde");
				}
				if ((strlen($img_prod)!=0) && ($img_prod!=$reg->img_prod)){
					$query="UPDATE productos SET img_prod='$img_prod' WHERE cve_prod='$cve_prod'";
					$sql=mysqli_query($cs,$query);
					msg("El cambio ha sido realizado","verde");
				}
			}
		} // Termina Cambios

		/*function sel_tipo_prod(){
			global $cve_prod, $nom_prod, $tipo_prod, $descripcion_prod, $img_prod, $lnk_prod;
			echo "
				<br><br>
				<form name='f_productos'>
				<table border='10%' width='80%'>
					<tr align='center'>
						<td colspan='2'>
							<table width='100%'>
								<tr align='center'>
									<td><input name='b_HaTrigo' type='button' class='boton' value='Harinas de Trigo' onClick='prod_op_selec(1)'>
									</td>
									<td><input name='b_Ha3Estrellas' type='button' class='boton' value='Harinas preparadas Tres Estrellas' onClick='prod_op_selec(2)'>
									</td>
									<td><input name='b_Polvo3Estrellas' type='button' class='boton' value='Polvo Para Hornear Tres Estrellas' onClick='prod_op_selec(3)'>
									</td>
									<td><input name='b_Rendimix' type='button' class='boton' value='Mejorante RendiMix' onClick='prod_op_selec(4)'>
									</td>
									<td><input name='b_DevTrigo' type='button' class='boton' value='Derivados de Trigo' onClick='prod_op_selec(5)'>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				</form>
			";
		} //Termina formulario*/
	
		function f_HaTrigo(){
				global $cve_prod, $nom_prod, $tipo_prod, $descripcion_prod, $img_prod;
				/*echo "
				<br><br>
				<form name='f_prod_selec'>
				<table border='10%' width='80%'>
					<tr align='center'>
						<td colspan='2'>
							<table width='100%'>
								<tr align='center'>
									<td><input name='b_HaTrigo' type='button' class='boton' value='Harinas de Trigo' onClick='prod_op_selec()'>
									</td>
									<td><input name='b_Ha3Estrellas' type='button' class='boton' value='Harinas preparadas Tres Estrellas' onClick='prod_op_selec()'>
									</td>
									<td><input name='b_Polvo3Estrellas' type='button' class='boton' value='Polvo Para Hornear Tres Estrellas' onClick='prod_op_selec()'>
									</td>
									<td><input name='b_Rendimix' type='button' class='boton' value='Mejorante RendiMix' onClick='prod_op_selec()'>
									</td>
									<td><input name='b_DevTrigo' type='button' class='boton' value='Derivados de Trigo' onClick='prod_op_selec()'>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				</form>
			";*/

				echo "
					<br>
					<form name='f_productos_HaTrigo'>
					<table border='10%' width='80%'>
						<caption>Producto</caption>
						
						<tr align='center'>
							<td><p>Clave del Producto</p></td>
							<td><input name='cve_prod' type='text' class='campo' maxlength='5' value='$cve_prod'></td>
						</tr>
						<tr align='center'>
							<td><p>Nombre del Producto</p></td>
							<td><input name='nom_prod' type='text' class='campo' maxlength='50' value='$nom_prod'></td>
						</tr>
						<tr align='center'>
							<td><p>Clave de la categoria de Producto</p></td>
							<td><input name='tipo_prod' type='text' class='campo' maxlength='5'value='$tipo_prod'></td>
						</tr>
						<tr align='center'>
							<td><p>Descripcion del Producto</p></td>
							<td><input name='descripcion_prod' type='text' class='campo' value='$descripcion_prod'></td>
						</tr>
						<tr align='center'>
							<td><p>Imagen del Producto</p></td>
							<td><input name='img_prod' type='text' class='campo' maxlength='255' value='$img_prod'></td>
						</tr>
						
						<tr align='center'>
							<td colspan='2'>
								<table width='100%'>
									<tr align='center'>
										<td><input name='b_altas' type='button' class='boton' value='Altas' onClick='altas()'>
										</td>
										<td><input name='b_bajas' type='button' class='boton' value='Bajas' onClick='bajas()'>
										</td>
										<td><input name='b_consultas' type='button' class='boton' value='Consultas' onClick='consultas()'>
										</td>
										<td><input name='b_cambios' type='button' class='boton' value='Cambios' onClick='cambios()'>
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