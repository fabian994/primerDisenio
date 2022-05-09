<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href = "styles/polvo_hornear_3Estrellas.css" rel = "stylesheet">
    <link href = "styles/menu.css" rel = "stylesheet">
    <link href = "styles/icons/fonts.css" rel = "stylesheet">

    <script src = "scripts/jquery-latest.js"></script>
    <script src = "scripts/encabezado.js"></script>

	<title>Polvo para hornear - Tres Estrellas</title>
</head>
<body>

    <header class = "menu">
        <div class = "menu_bar">
            <a href = "#" class = "b_menu"><span class = "icon-menu"></span> <div> <img src = "pirineos.png"> </div> </a>
        </div>


        <div id = "img_banner">
            <img src = "imagenes/Pirineos/Logo HPI contorno_blanco.png" style = "width: 15%; margin-top: 10px;">
        </div>

        <nav>

            <ul>

                <li><a href = "inicio.html"><span class = "icon-home"></span> Inicio </a></li>
                
                <li class = "submenu">

                    <a href = "#"><span class = "icon-shop"></span> Nuestros Productos <span class = "slide_icon icon-chevron-down"></span></a>
					<ul class = "children">
						<li><a href="harinas_trigo.php"> Harinas de Trigo <span class = "icon-bowl"></span> </a></li>
						<li><a href="harinas_hogar.html"> Harinas para el Hogar <span class = "icon-bowl"></span> </a></li>
						<li><a href="harinas_tres_estrellas.php"> Harinas Preparadas Tres Estrellas <span class = "icon-bowl"></span> </a></li>
						<li><a href="polvo_hornear_3Estrellas.php"> Polvo para Hornear Tres Estrellas <span class = "icon-bowl"></span> </a></li>
						<li><a href="mejorante_rendimix.php"> Mejorantes RendiMix <span class = "icon-bowl"></span> </a></li>
						<li><a href="derivados.php"> Derivados del Trigo <span class = "icon-bowl"></span> </a></li>
					</ul>

                </li>

                <li><a href = "recetario.php?op=0"><span class = "icon-bowl"></span> Recetas </a></li>
                <li><a href = "servicio_tecnico.html"><span class = "icon-tools"></span> Servicio Tecnico </a></li>
                <li><a href = "contacto.php"><span class = "icon-typing"></span> Contacto </a></li>

            </ul>
        </nav>
    </header>

	<div class = "container">

        <header class = "header">

            <img id = "header_image" src = "imagenes/polvo_hornear/bread_banner.jpg">

        </header>

        <main class = "content"> 
            <h2> POLVO PARA HORNEAR </h2><br>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non urna vestibulum, euismod mi at, pulvinar ex. Fusce libero justo, euismod id sapien eget, tempus tincidunt nisi. Vestibulum vehicula mattis auctor. Vivamus quis lorem at tortor efficitur dapibus a in dui. Phasellus bibendum ultrices nisl sit amet pretium. Fusce in mi urna. Proin condimentum dui sed odio euismod scelerisque. Curabitur venenatis molestie metus et condimentum. Sed ut ullamcorper dui. Fusce dignissim blandit lectus, id commodo lacus mollis non.

                    Fusce at mauris augue. Phasellus congue venenatis odio sed varius. Nam mauris nunc, auctor vitae neque eget, placerat pellentesque tellus. Nullam condimentum arcu sagittis risus finibus aliquam. Ut congue nibh sed luctus dictum. Suspendisse congue quam nec sapien placerat facilisis. Vestibulum vitae iaculis neque. Proin ornare ipsum non posuere elementum. Mauris tempus consectetur sem ut lacinia. Integer molestie, libero eget pulvinar malesuada, tortor nibh rhoncus elit, quis pulvinar orci urna et est. Proin in enim at nisi euismod lacinia eget vitae lorem. Maecenas vitae massa id mi feugiat gravida nec pulvinar nibh. Quisque maximus accumsan dui at auctor. Ut tempus sagittis neque, et accumsan magna sodales eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis at quam id nisl consectetur tincidunt.

                </p>
        </main>

        <!--<main class = "content3"> 
            <img src="https://via.placeholder.com/200" width="75%" height="50%">

        </main>-->

        <main class = "content2"> 
            <img src="imagenes/polvo_hornear/Logo_Tres_Estrellas.png" class="center" width="149px" height="115px"><br><br>
            <h2> POLVO PARA HORNEAR </h2><br>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non urna vestibulum, euismod mi at, pulvinar ex. Fusce libero justo, euismod id sapien eget, tempus tincidunt nisi. Vestibulum vehicula mattis auctor. Vivamus quis lorem at tortor efficitur dapibus a in dui. Phasellus bibendum ultrices nisl sit amet pretium. Fusce in mi urna. Proin condimentum dui sed odio euismod scelerisque. Curabitur venenatis molestie metus et condimentum. Sed ut ullamcorper dui. Fusce dignissim blandit lectus, id commodo lacus mollis non.

                    Fusce at mauris augue. Phasellus congue venenatis odio sed varius. Nam mauris nunc, auctor vitae neque eget, placerat pellentesque tellus. Nullam condimentum arcu sagittis risus finibus aliquam. Ut congue nibh sed luctus dictum. Suspendisse congue quam nec sapien placerat facilisis. Vestibulum vitae iaculis neque. Proin ornare ipsum non posuere elementum. Mauris tempus consectetur sem ut lacinia. Integer molestie, libero eget pulvinar malesuada, tortor nibh rhoncus elit, quis pulvinar orci urna et est. Proin in enim at nisi euismod lacinia eget vitae lorem. Maecenas vitae massa id mi feugiat gravida nec pulvinar nibh. Quisque maximus accumsan dui at auctor. Ut tempus sagittis neque, et accumsan magna sodales eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis at quam id nisl consectetur tincidunt.

                </p>

        </main>

        <aside class = "sidebar">
            <?php
                

                //<!-- LINK 1 -->

                include 'utilerias.php';
                $cs=conecta();
                $query="SELECT * FROM contenidos WHERE cve_tipo=3";
                $sql=mysqli_query($cs,$query);
                while ($reg=mysqli_fetch_object($sql)){ 
                    $x='';
                    echo "
                        <div>
                        
                            <h1> Descarga el PDF de Harinas de Trigo </h1>
                            
                            <br>
                            
                            <a href = 'assets/$reg->nom_catalog'><span class = 'icon-download'></span> Descargar PDF </a>

                        </div>
                        
                        <div>

                            <h1> Descarga Nuestras Mejores Recetas con Harinas de Trigo </h1>
                            
                            <br>
                            
                            <a href = 'recetario.php?op=3'><span class = 'icon-bowl'></span> Recetas </a>
                    
                        </div>
                    
                    

                        

                        <div>
                            
                            <h1> Productos Relacionados </h1>
                            
                            <br>
                            
                            <ul>

                                <li>
                                    <a href = '$reg->url_prod_rel1'>
                                    <span class = 'icon-bowl'></span>
                                    $reg->nom_prod_rel1 <br>
                                    <img src='imagenes/$reg->img_prod_rel1' width='100px' height='100px'><br>
                                    </a>
                                </li>
                                <li>
                                    <a href = '$reg->url_prod_rel2'>
                                    <span class = 'icon-bowl'></span> 
                                    $reg->nom_prod_rel2 <br>
                                    <img src='imagenes/$reg->img_prod_rel1' width='100px' height='100px'><br>
                                    </a>
                                </li>
                            </ul>
                        
                        </div>
                    ";
                }
            ?>


            <!-- LINK 4 -->

            <h1> Compartir </h1>

            <br>

            <ul class = "share_buttons">
                <li><a href = "https://www.facebook.com/sharer/sharer.php?u=https://www.lamoderna.com.mx" target = "_blank"><span class = "icon-facebook-with-circle"></span></a></li>
            </ul>

            


        </aside>
    
        <div class="widget-1">
            <h2 id = "titulo_catalogo"> Nuestro Catalogo Polvo para Hornear </h2><br><br>
            <?php
                
                
                $query="SELECT * FROM polvo_hornear";
                $sql=mysqli_query($cs,$query);
                echo "<table style='width: 100%;'>";
                while ($reg=mysqli_fetch_object($sql)) {
                    $x="";
                    $des=nl2br($reg->descripcion_prod);
                    echo"
                   
                    <tr class='catalogo' id='tabla_fila'>
                        <td id='contenido_catalogo'>
                            <h2 id ='titulo_productos'>$reg->nom_prod</h2><br>
                            $des
                            <br>
                        </td>
                        <td ><img src='imagenes/$reg->img_prod'  width='300px' height='417px'></td>
                    </tr>
                    ";
                                       
                }
                echo "</table> ";
            ?>
        </div>  

        <footer class = "footer">
            <div class = "contact">

                <ul>
                    <li id = "contact">                    

                        <ul>
                            <li id = "footer_title"> Contacto </li>
                            <li> Tel. 01 (800) 147 4444 </li>
                            <li> <br> 
                                 Carretera Panamericana Km. 11      <br>
                                 Tramo Salamanca - Celaya,          <br>
                                 Col. Emiliano Zapata. C.P. 36770   <br> 
                                 Salamanca Guanajuato </li>
                        </ul>

                    </li>

                    <li id = "boletin">

                        <ul>
                            <li id = "footer_title"> Boletín </li>

                            <li><a href = "assets/AVISO DE PRIVACIDAD.PDF"><span class = "icon-download"></span> Aviso de Prvacidad </a></li>
                            <li><a href = "contacto.html"><span class = "icon-network"></span> Encuentra Tu Distribuidor </a></li>
                            <li><a href = "servicio_tecnico.html"><span class = "icon-info"></span> FAQ </a></li>
                            
                        </ul>

                    </li>
                    
                    <li id = "bolsa_trabajo">

                        <ul>
                            <li id = "footer_title"> Bolsa de Trabajo </li>

                            <li><a href = "contacto.html"><span class = "icon-man"></span> Integrate a Nuestro Equipo </a></li>
                            
                        </ul>

                    </li>

                    <li id = "siguenos">

                        <ul>
                            <li id = "footer_title"> Siguenos </li>

                            <ul class = "share_buttons_footer">

                                <li><a href = "https://web.facebook.com/impulsopirineos/?_rdc=1&_rdr" target="_blank"><span class = "icon-facebook-with-circle"></span></a></li>

                            </ul>
                            
                        </ul>

                    </li>

                </ul>

            </div>

        </footer>
    </div>
    
</body>
</html>