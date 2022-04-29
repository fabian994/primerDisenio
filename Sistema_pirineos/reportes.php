<!DOCTYPE html>
<html>
	<head>
		<title>Pirineos</title>
		<meta charset="utf-8">
		<link href="estilos.css" rel="stylesheet" type="text/css">
		<link href="imagenes/logo_pirineos.png" rel="shortcut icon" type="image/png">
		<script src="reportes.js" type="text/JavaScript"></script>
	</head>
	<body><center>
	<?php
		include 'utilerias.php';
		$op=$_GET['op'];
		if ($op==0) formulario();
		if ($op==1) r1();
		if ($op==2) r2();
		if ($op==3) r3();


		function r1(){
			global $op, $cve_tipo, $tipo_prod;
			//echo "op=".$op;
			$cs=conecta();
			$query="SELECT * FROM productos ORDER BY nom_prod";
			
			$sql=mysqli_query($cs,$query);
			echo "
				<table border='3' width='90%'>
					<tr align='center'>
						<td colspan='5'>
						<p class='titulo36' id='titulo18'>
						Listado de productos
						</p>
					</tr align='center'>
					<tr align='center'>
						<td><p class='titulo36' id='titulo18'>Clave Prod.</p></td>
						<td><p class='titulo36' id='titulo18'>Nombre Producto</p></td>
						<td><p class='titulo36' id='titulo18'>Tipo Producto</p></td>
						<td><p class='titulo36' id='titulo18'>Descripcion Producto</p></td>
						<td><p class='titulo36' id='titulo18'>Imagen Producto</p></td>
					</tr>
			";
			

			while ($reg=mysqli_fetch_object($sql)){	
				$x='';
				echo "<tr align='center'>
						<td><p>$reg->cve_prod</p></td>
						<td><p>$reg->nom_prod</p></td>
						<td><p>$reg->tipo_prod</p></td>
						<td><p>$reg->descripcion_prod</p></td>
						<td><p>$reg->img_prod</p></td>
					  </tr>
				";
			}
			echo "</table>";
		}

		function r2(){
			global $op;
			$cs=conecta();
			$query="SELECT * FROM contenidos  ORDER BY cve_tipo";
			$sql=mysqli_query($cs,$query);
			echo "
				<table border='3' width='90%'>
					<tr align='center'>
						<td colspan='10'>
						<p class='titulo36' id='titulo18'>
						Listado de tipos
						</p>
					</tr align='center'>
					<tr align='center'>
						<td><p class='titulo36' id='titulo18'>Clave Categoria</p></td>
						<td><p class='titulo36' id='titulo18'>Nom. Categoria</p></td>
						<td><p class='titulo36' id='titulo18'>Nom. Catalogo</p></td>
						<td><p class='titulo36' id='titulo18'>Nom. Recetario</p></td>
						<td><p class='titulo36' id='titulo18'>Nom. Prod. Rel. 1</p></td>
						<td><p class='titulo36' id='titulo18'>Img. Prod. Rel. 1</p></td>
						<td><p class='titulo36' id='titulo18'>Link Prod. Rel. 1</p></td>
						<td><p class='titulo36' id='titulo18'>Nom. Prod. Rel. 2</p></td>
						<td><p class='titulo36' id='titulo18'>Img. Prod. Rel. 2</p></td>
						<td><p class='titulo36' id='titulo18'>Link Prod. Rel. 2</p></td>
					</tr>
			";
			while ($reg=mysqli_fetch_object($sql)){
				$x='';
				echo "<tr align='center'>
						<td><p>$reg->cve_tipo</p></td>

						<td><p>$reg->nom_tipo</p></td>
						<td><p>$reg->nom_catalog</p></td>
						<td><p>$reg->nom_recetario</p></td>

						<td><p>$reg->nom_prod_rel1</p></td>
						<td><p>$reg->img_prod_rel1</p></td>
						<td><p>$reg->url_prod_rel1</p></td>

						<td><p>$reg->nom_prod_rel2</p></td>
						<td><p>$reg->img_prod_rel2</p></td>
						<td><p>$reg->url_prod_rel2</p></td>
					  </tr>
				";
			}
			echo "</table>";
		}

		function r3(){
			global $op, $cve_tipo, $tipo_prod;
			$cve_tipo=$_GET['cve_tipo'];
			$tipo_prod=$_GET['tipo_prod'];

			$cs=conecta();
			$query="SELECT *, cve_tipo FROM productos, contenidos WHERE tipo_prod = '$cve_tipo' AND cve_tipo = '$tipo_prod'";
			$sql=mysqli_query($cs,$query);
			

			echo "
				<table border='3' width='90%'>
					<tr align='center'>
						<td colspan='5'>
						<p class='titulo36' id='titulo18'>
						Listado de productos
						</p>
					</tr align='center'>
					<tr align='center'>
						<td><p class='titulo36' id='titulo18'>Clave Prod.</p></td>
						<td><p class='titulo36' id='titulo18'>Nombre Producto</p></td>
						<td><p class='titulo36' id='titulo18'>Tipo Producto</p></td>
						<td><p class='titulo36' id='titulo18'>Descripcion Producto</p></td>
						<td><p class='titulo36' id='titulo18'>Imagen Producto</p></td>
					</tr>
			";
			

			while ($reg=mysqli_fetch_object($sql)){	
				$x='';
				echo "<tr align='center'>
						<td><p>$reg->cve_prod</p></td>
						<td><p>$reg->nom_prod</p></td>
						<td><p>$reg->tipo_prod</p></td>
						<td><p>$reg->descripcion_prod</p></td>
						<td><p>$reg->img_prod</p></td>
					  </tr>
				";
			}
			echo "</table>";

		}

		function formulario(){
			global $op, $cve_tipo, $tipo_prod, $nom_tipo;
			echo "
				<br><br>
				<form name='f_reportes'>
				<table border='3' width = '80%'>
					<tr align='center'>
						<td colspan='3'>
							<p class='titulo36' id='titulo18'>
							Reportes del Sistema
							</p>
						</td>
					</tr>
					<tr align='center'>
						<td colspan='2'><p>Listado de Productos</p></td>
						<td><input name='b_r1' type='button' class='boton' value='Ejecutar' onClick='r1(1)'>
						</td>
					</tr>
					<tr align='center'>
						<td colspan='2'><p>Listado de Contenido por categoria</p></td>
						<td><input name='b_r2' type='button' class='boton' value='Ejecutar' onClick='r2(2)'>
						</td>
					</tr>
					<tr align='center'>
						<td><p>Consulta de productos por categoria</p></td>
						<td>
							<p>Debe seleccionar la categoria</p> 
							<input name='nom_prod' type='search' class='campo' list='lista_nom_prod'>
						</td>
						<datalist id='lista_nom_prod'>
			";
						$cs=conecta();
						$query="SELECT * FROM contenidos";
						$sql=mysqli_query($cs,$query);
						while ($reg=mysqli_fetch_object($sql)){
							//$tipo_prod=$reg->tipo_prod;
							$cve_tipo=$reg->cve_tipo;
							$nom_tipo=$reg->nom_tipo;
							echo "<option value='$cve_tipo'>$nom_tipo</option>";
						}

			echo "		</datalist>
						<td><input name='b_r4' type='button' class='boton' value='Ejecutar' onClick='r3(3, $cve_tipo)'>
						</td>
					</tr>
					
				</table>
				</form>
			";
		}
	?>
	</center></body>
</html>