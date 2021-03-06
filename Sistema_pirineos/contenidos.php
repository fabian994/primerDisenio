<!DOCTYPE html>
<html>
	<head>
		<title>Pirineos</title>
		<meta charset="utf-8">
		<link href="estilos.css" rel="stylesheet" type="text/css">
		<link href="imagenes/logo_pirineos.png" rel="shortcut icon" type="image/png">
		<script src="contenidos.js" type="text/JavaScript"></script>
	</head>
	<body><center>
	<?php
		include 'utilerias.php';
		$op=$_GET['op'];
		$cve_tipo=$_GET['cve_tipo'];
		$nom_tipo=$_GET['nom_tipo'];
		
		if ($op==0) sel_tipo_prod();
		
		if ($op==1) f_contenidos($op, $cve_tipo ,$nom_tipo);
		if ($op==2) f_contenidos($op, $cve_tipo ,$nom_tipo);
		if ($op==3) f_contenidos($op, $cve_tipo ,$nom_tipo);
		if ($op==4) f_contenidos($op, $cve_tipo ,$nom_tipo);
		if ($op==5) f_contenidos($op, $cve_tipo ,$nom_tipo);

		if ($op==6) altas();
		if ($op==7) bajas();
		if ($op==8) consultas();
		if ($op==9) cambios();


		function tomar_datos(){
			global $cve_tipo, $nom_tipo, $nom_catalog, $nom_prod_rel1, $img_prod_rel1, $url_prod_rel1, $nom_prod_rel2, $img_prod_rel2, $url_prod_rel2;
			$cve_tipo=$_GET['cve_tipo'];
			$nom_tipo=$_GET['nom_tipo'];
			$nom_catalog=$_GET['nom_catalog'];

			$nom_prod_rel1=$_GET['nom_prod_rel1'];
			$img_prod_rel1=$_GET['img_prod_rel1'];
			$url_prod_rel1=$_GET['url_prod_rel1'];
			
			$nom_prod_rel2=$_GET['nom_prod_rel2'];
			$img_prod_rel2=$_GET['img_prod_rel2'];
			$url_prod_rel2=$_GET['url_prod_rel2'];
		}

		function altas(){
			global $cve_tipo, $nom_tipo, $nom_catalog, $nom_prod_rel1, $img_prod_rel1, $url_prod_rel1, $nom_prod_rel2, $img_prod_rel2, $url_prod_rel2;
			tomar_datos();

			// Verifica que no se duplique la clave del tipo
			$cs=conecta();
			$query="SELECT * FROM contenidos WHERE cve_tipo='$cve_tipo'";
			$sql=mysqli_query($cs,$query);
			$reg=mysqli_fetch_object($sql);
			if ($reg!=mysqli_fetch_array($sql)){
				msg("Error, clave de tipo se duplica en base de datos","rojo");
			}
			else{
				$query="INSERT INTO contenidos VALUES ('$cve_tipo', '$nom_tipo', '$nom_catalog', '$nom_prod_rel1', '$img_prod_rel1', '$url_prod_rel1', '$nom_prod_rel2', '$img_prod_rel2', '$url_prod_rel2')";
				$sql=mysqli_query($cs,$query);
				msg("El registro ha sido grabado correctamente","verde");
			}
				
			
		} // Termina altas

		function consultas(){
			global $cve_tipo, $nom_tipo, $nom_catalog, $nom_prod_rel1, $img_prod_rel1, $url_prod_rel1, $nom_prod_rel2, $img_prod_rel2, $url_prod_rel2, $op;
			tomar_datos();
			//echo "cve_prod=".$cve_prod;
			$cs=conecta();
			$query="SELECT * FROM contenidos WHERE cve_tipo='$cve_tipo'";
			$sql=mysqli_query($cs,$query);
			$reg=mysqli_fetch_object($sql);
			if ($reg==mysqli_fetch_array($sql)){
				msg("Error, clave de producto inexistente en base de datos","rojo");
			}
			else{
				$nom_tipo=$reg->nom_tipo;
				$nom_catalog=$reg->nom_catalog;

				$nom_prod_rel1=$reg->nom_prod_rel1;
				$img_prod_rel1=$reg->img_prod_rel1;
				$url_prod_rel1=$reg->url_prod_rel1;

				$nom_prod_rel2=$reg->nom_prod_rel2;
				$img_prod_rel2=$reg->img_prod_rel2;
				$url_prod_rel2=$reg->url_prod_rel2;
				//echo "cve_prod=".$cve_prod." nom_prod=".$nom_prod." cve_tipo=".$cve_tipo." descripcion_prod=".$descripcion_prod;
				 msg("Accion realizada","verde");
				 f_contenidos($op, $cve_tipo ,$nom_tipo);

			}
		} // Termina consultas

		function bajas(){
			global $cve_tipo, $nom_tipo, $nom_catalog, $nom_prod_rel1, $img_prod_rel1, $url_prod_rel1, $nom_prod_rel2, $img_prod_rel2, $url_prod_rel2;
			consultas();
			$cs=conecta();
			$query="DELETE FROM contenidos WHERE cve_tipo='$cve_tipo'";
			$sql=mysqli_query($cs,$query);
			if (mysqli_affected_rows($cs)!=0){
				msg("El registro ha sido eliminado","verde");
			}
		} // Termina bajas

		function cambios(){
			global $cve_tipo, $nom_tipo, $nom_catalog, $nom_prod_rel1, $img_prod_rel1, $url_prod_rel1, $nom_prod_rel2, $img_prod_rel2, $url_prod_rel2;
			tomar_datos();
			$cs=conecta();
			$query="SELECT * FROM contenidos WHERE cve_tipo='$cve_tipo'";
			$sql=mysqli_query($cs,$query);
			$reg=mysqli_fetch_object($sql);
			if ($reg==mysqli_fetch_array($sql)){
				msg("Error, clave de producto inexistente en base de datos","rojo");
			}
			else{

				if ((strlen($nom_catalog)!=0) && ($nom_catalog!=$reg->nom_catalog)){
					$query="UPDATE contenidos SET nom_catalog='$nom_catalog' WHERE cve_tipo='$cve_tipo'";
					$sql=mysqli_query($cs,$query);
					msg("El cambio ha sido realizado","verde");
				}

				if ((strlen($nom_prod_rel1)!=0) && ($nom_prod_rel1!=$reg->nom_prod_rel1)){
					$query="UPDATE contenidos SET nom_prod_rel1='$nom_prod_rel1' WHERE cve_tipo='$cve_tipo'";
					$sql=mysqli_query($cs,$query);
					msg("El cambio ha sido realizado","verde");
				}
				if ((strlen($img_prod_rel1)!=0) && ($img_prod_rel1!=$reg->img_prod_rel1)){
					$query="UPDATE contenidos SET img_prod_rel1='$img_prod_rel1' WHERE cve_tipo='$cve_tipo'";
					$sql=mysqli_query($cs,$query);
					msg("El cambio ha sido realizado","verde");
				}
				if ((strlen($url_prod_rel1)!=0) && ($url_prod_rel1!=$reg->url_prod_rel1)){
					$query="UPDATE contenidos SET url_prod_rel1='$url_prod_rel1' WHERE cve_tipo='$cve_tipo'";
					$sql=mysqli_query($cs,$query);
					msg("El cambio ha sido realizado","verde");
				}

				if ((strlen($nom_prod_rel2)!=0) && ($nom_prod_rel2!=$reg->nom_prod_rel2)){
					$query="UPDATE contenidos SET nom_prod_rel2='$nom_prod_rel2' WHERE cve_tipo='$cve_tipo'";
					$sql=mysqli_query($cs,$query);
					msg("El cambio ha sido realizado","verde");
				}
				if ((strlen($img_prod_rel2)!=0) && ($img_prod_rel2!=$reg->img_prod_rel2)){
					$query="UPDATE contenidos SET img_prod_rel2='$img_prod_rel2' WHERE cve_tipo='$cve_tipo'";
					$sql=mysqli_query($cs,$query);
					msg("El cambio ha sido realizado","verde");
				}
				if ((strlen($url_prod_rel2)!=0) && ($url_prod_rel2!=$reg->url_prod_rel2)){
					$query="UPDATE contenidos SET url_prod_rel2='$url_prod_rel2' WHERE cve_tipo='$cve_tipo'";
					$sql=mysqli_query($cs,$query);
					msg("El cambio ha sido realizado","verde");
				}
			}
		} // Termina Cambios

		function sel_tipo_prod(){
			global $cve_tipo, $nom_tipo, $nom_catalog, $nom_prod_rel1, $img_prod_rel1, $url_prod_rel1, $nom_prod_rel2, $img_prod_rel2, $url_prod_rel2, $cat;
			echo "
				<br><br>
				<form name='f_productos'>
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
	
		function f_contenidos($op, $cve_tipo ,$nom_tipo){
				global $cve_tipo, $nom_tipo, $nom_catalog, $nom_prod_rel1, $img_prod_rel1, $url_prod_rel1, $nom_prod_rel2, $img_prod_rel2, $url_prod_rel2, $cat, $op;
				echo "
					<br><br>
					<form name='f_productos'>
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
					<form name='f_contenidos'>
					<table border='10%' width='80%'>
						<caption>Contenidos</caption>
						<tr align='center'>
							<td><p>Clave de la categoria de Producto</p></td>
							<td><input name='cve_tipo' type='text' class='campo' maxlength='5' value='$cve_tipo' disabled style= 'background: grey'></td>
						</tr>
						<tr align='center'>
							<td><p>Nombre del tipo</p></td>
							<td><input name='nom_tipo' type='text' class='campo' maxlength='50' value='$nom_tipo' disabled style= 'background: grey'></td>
						</tr>
						<tr align='center'>
							<td><p>Nombre del PDF catalogo</p></td>
							<td><input name='nom_catalog' type='text' class='campo' maxlength='50' value='$nom_catalog'></td>
						</tr>
						
						<tr align='center'>
							<td><p>Nombre producto relacionado 1</p></td>
							<td><input name='nom_prod_rel1' type='text' class='campo' maxlength='50' value='$nom_prod_rel1'></td>
						</tr>
						<tr align='center'>
							<td><p>Imagen producto relacionado 1</p></td>
							<td><input name='img_prod_rel1' type='text' class='campo' maxlength='50' value='$img_prod_rel1'></td>
						</tr>
						<tr align='center'>
							<td><p>Link producto relacionado 1</p></td>
							<td><input name='url_prod_rel1' type='text' class='campo' maxlength='255' value='$url_prod_rel1'></td>
						</tr>
						<tr align='center'>
							<td><p>Nombre producto relacionado 2</p></td>
							<td><input name='nom_prod_rel2' type='text' class='campo' maxlength='50' value='$nom_prod_rel2'></td>
						</tr>
						<tr align='center'>
							<td><p>Imagen producto relacionado 2</p></td>
							<td><input name='img_prod_rel2' type='text' class='campo' maxlength='50'value='$img_prod_rel2'></td>
						</tr>
						<tr align='center'>
							<td><p>Link producto relacionado 2</p></td>
							<td><input name='url_prod_rel2' type='text' class='campo' maxlength='255' value='$url_prod_rel2'></td>
						</tr>
						
						<tr align='center'>
							<td colspan='2'>
								<table width='100%'>
									<tr align='center'>
										<td><input name='b_altas' type='button' class='boton' value='Altas' onClick='altas($cve_tipo)'>
										</td>
										<td><input name='b_bajas' type='button' class='boton' value='Bajas' onClick='bajas($cve_tipo)'>
										</td>
										<td><input name='b_consultas' type='button' class='boton' value='Consultas' onClick='consultas($cve_tipo)'>
										</td>
										<td><input name='b_cambios' type='button' class='boton' value='Cambios' onClick='cambios($cve_tipo)'>
										</td>
										<td><input name='b_reset_sd' type='reset' class='boton' value='Reiniciar' id='rojo'>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					</form>
					<br>
				";

		} //Termina formulario
	?>
	</center></body>
</html>