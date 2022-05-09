<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href = "styles/mejorante_renidmix.css" rel = "stylesheet">
    <link href = "styles/menu.css" rel = "stylesheet">
    <link href = "styles/icons/fonts.css" rel = "stylesheet">

    <script src = "scripts/jquery-latest.js"></script>
    <script src = "scripts/encabezado.js"></script>

    <title> Mejorante RendiMix </title>
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
                <li><a href = "contacto.html"><span class = "icon-typing"></span> Contacto </a></li>

            </ul>
        </nav>
    </header>
    
    <div class = "container">


        <header class = "header">

            <img id = "header_image" src = "imagenes/rendimix/Foto_RendiMix1.jpg">
            
        </header>

        <main class = "content2"> 
            
            <h2 id = "lineamientos_titulo"> RendiMix <br><br> </h2>
            <p id = "lineamientos_descripcion">
                
                <b><i> RendiMix </i></b> es un orgulloso integrante de la familia <i> La Moderna. </i> <br><br>
                Nacido en la Harinera <b> Los Pirineos Bajío </b> y comercializado bajo la marca <b> Tres Estrellas </b>

            </p>

            <div class = "rendi_logo"><img src = "imagenes/rendimix/Logo_RendiMix.png"></div>


        </main>

        <main class = "content2_1"> 
            
            <h2 id = "lineamientos_titulo"> Mejor Desempeño <br><br> </h2>
            <p id = "lineamientos_descripcion">
            <b><i> RendiMix </i></b> es un mejorante para panificación que refuerza las caracteristicas de la harina, logrando un mayor rendimiento, un mejor volumen del pan, ademas alarga la vida util de cada pieza horneada.
            </p>

            <br><br>
            <span class = "icon-area-graph"></span>


        </main>

        <main class = "content2_2"> 
            
            <h2 id = "lineamientos_titulo">  Mejora la Calidad <br><br> </h2>
            <p id = "lineamientos_descripcion">
            Formulado con los mejores ingredientes para procesos industriales y artesanales de amasado. <b><i> RendiMix </i></b> por su calidad mejora el comportamiento de la masa otorgando un excelente volumen, mayor rendimiento, mejor tolerancia a la fermentacion, mayor vida util a los productos, mejor greñado, miga blanca uniforma, asi como una corteza crujiente.

            </p>

            <br><br>
            <span class = "icon-cake"></span>


        </main>

        <main class = "content2_3"> 
            
            <h2 id = "lineamientos_titulo"> Mas Volumen con Menos Grasa <br><br> </h2>
            <p id = "lineamientos_descripcion">
            Con <b><i> RendiMix </i></b> como sinónimo de rendimiento es seguro obtener mayor cantidad de pan, esto se traduce en un ahorro de tiempo y dinero, pues con el mismo proceso se obtendrán mejores resultados sin afectar la calidad del producto.

            </p>

            <br><br>
            <span class = "icon-bowl"></span>


        </main>

        <main class = "content2_4"> 
            
            <h2 id = "lineamientos_titulo"> Confiable <br><br> </h2>
            <p id = "lineamientos_descripcion">
            <b><i> RendiMix </i></b> elaborado con ingredientres de la mejor calidad para cumplir con las especificaciones de la industria, es la marca de mejorante para la panificacion en la que se puede confiar para disfrutar de excelentes resultados en cantidad y sabor de panes.

            </p>

            <br><br>
            <span class = "icon-check"></span>


        </main>

        <aside class = "sidebar">
            <?php
                

                //<!-- LINK 1 -->

                include 'utilerias.php';
                $cs=conecta();
                $query="SELECT * FROM contenidos WHERE cve_tipo=4";
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
                            
                            <a href = 'recetario.php?op=4'><span class = 'icon-bowl'></span> Recetas </a>
                            
                    
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
                                    <img src='imagenes/$reg->img_prod_rel1' width='100px' height='100px'></a><br>
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
        <h2 id = "titulo_catalogo"> Nuestro Catalogo RendiMix </h2><br><br>
            <?php
                
                
                $query="SELECT * FROM rendimix";
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
                        <td><img src='imagenes/$reg->img_prod' width='300px' height='417px'></td>
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