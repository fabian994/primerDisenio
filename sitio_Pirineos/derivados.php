<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href = "styles/derivados_2.css" rel = "stylesheet">
    <link href = "styles/menu.css" rel = "stylesheet">
    <link href = "styles/icons/fonts.css" rel = "stylesheet">

    <script src = "scripts/jquery-latest.js"></script>
    <script src = "scripts/encabezado.js"></script>
    <script src = "scripts/harinas_trigo.js"></script>

    <title> Derivados </title>
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

                <li class = "submenu">
        
                    <a href = "#"><span class = "icon-open-book"></span> Recetarios <span class = "slide_icon icon-chevron-down"></span></a>
                    <ul class = "children">
                        <li><a href = "#"> Bakery Mix <span class = "icon-bowl"></span></a></li>
                        <li><a href = "#"> Harinas Tres Estrellas <span class = "icon-bowl"></span></a></li>
                        <li><a href = "#"> Polvo para Hornear Tres Estrellas <span class = "icon-bowl"></span></a></li>
                    </ul>
                
                </li>
                <li><a href = "servicio_tecnico.html"><span class = "icon-tools"></span> Servicio Tecnico </a></li>
                <li><a href = "Contacto.html"><span class = "icon-typing"></span> Contacto </a></li>

            </ul>
        </nav>
    </header>
    

    <div class = "container">

        <header class = "header">

            <img id = "header_image" src = "imagenes/bread_banner.jpg">

        </header>

        <main class = "content">
            <h2 id = "lineamientos_titulo">DERIVADOS DE TRIGO<br><br> </h2>
            <p id = "lineamientos_descripcion">
                    Producto con alto contenido de fibra en forma granular de color café rojizo, amarillo y blanco cremoso,obtenido a partir de trigos enteros, –suaves o fuertes-, limpios y sanos de origen nacional, por medio de procesos de trituración, compresión y separación en los que se dividen los diferentes componentes por tamaño de partícula para conseguir el Granillo de trigo. Contiene harinas de trigo, salvado y germen de trigo propios del proceso.

            </p>

            <br><br>

            <span class = "icon-bowl"></span>

        </main>

        <main class = "content2">
            <?php
                include 'utilerias.php';
                $cs=conecta();
                $query="SELECT * FROM derivados_trigo";
                $sql=mysqli_query($cs,$query);
                echo "<table>";
                while ($reg=mysqli_fetch_object($sql)) {
                    $x="";
                    echo"
                   
                    <tr class='catalogo' id='tabla_fila'>
                        <td id='contenido_catalogo'>
                            <h2 id ='titulo_productos'>$reg->nom_prod</h2><br>
                            <p>$reg->descripcion_prod</p><br>
                        </td>
                        <td><img src='$reg->img_prod' width='189px' height='200px'></td>
                    </tr>
                    ";
                                       
                }
                echo "</table> ";
            ?>
        </main>    

        <aside class = "sidebar">
            <?php
            

            //<!-- LINK 1 -->

            
            $cs=conecta();
            $query="SELECT * FROM contenidos WHERE cve_tipo=5";
            $sql=mysqli_query($cs,$query);
            while ($reg=mysqli_fetch_object($sql)){ 
                $x='';
                echo "
                    <div>
                    
                        <h1> Descarga el PDF de Derivados de Trigo </h1>
                        
                        <br>
                        
                        <a href = '$reg->nom_catalog'><span class = 'icon-download'></span> Descargar PDF </a>

                    </div>
                    
                    <div>

                        <h1> Descarga Nuestras Mejores Recetas con Derivados de Trigo </h1>
                        
                        <br>
                        
                        <a href = '$reg->nom_recetario'><span class = 'icon-download'></span> Descargar PDF </a>
                
                    </div>
                
                

                    //<!-- LINK 3 -->

                    <div>
                        
                        <h1> Productos Relacionados </h1>
                        
                        <br>
                        
                        <ul>
                            <li><a href = '$reg->url_prod_rel1'><span class = 'icon-bowl'></span> $reg->nom_prod_rel1 </a></li>
                            <li><a href = '$reg->url_prod_rel2'><span class = 'icon-bowl'></span> $reg->nom_prod_rel2 </a></li>
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
                <li><a href = "https://www.facebook.com/sharer/sharer.php?u=https://www.lamoderna.com.mx" target = "_blank"><span class = "icon-instagram-with-circle"></span></a></li>
                <li><a href = "https://twitter.com/intent/tweet?text=www.lamoderna.com.mx" target = "_blank"><span class = "icon-twitter-with-circle"></span></a></li>
            </ul>

            


        </aside>

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

                            <li><a href = "#"><span class = "icon-download"></span> Aviso de Prvacidad </a></li>
                            <li><a href = "#"><span class = "icon-network"></span> Encuentra Tu Distribuidor </a></li>
                            <li><a href = "#"><span class = "icon-info"></span> FAQ </a></li>
                            
                        </ul>

                    </li>
                    
                    <li id = "bolsa_trabajo">

                        <ul>
                            <li id = "footer_title"> Bolsa de Trabajo </li>

                            <li><a href = "#"><span class = "icon-man"></span> Integrate a Nuestro Equipo </a></li>
                            
                        </ul>

                    </li>

                    <li id = "siguenos">

                        <ul>
                            <li id = "footer_title"> Siguenos </li>

                            <ul class = "share_buttons_footer">

                                <li><a href = "#"><span class = "icon-facebook-with-circle"></span></a></li>
                                <li><a href = "#"><span class = "icon-instagram-with-circle"></span></a></li>
                                <li><a href = "#"><span class = "icon-twitter-with-circle"></span></a></li>

                            </ul>
                            
                        </ul>

                    </li>

                </ul>

            </div>

        </footer>

    </div>


</body>
</html>