<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href = "styles/recetario.css" rel = "stylesheet">
    <link href = "styles/menu.css" rel = "stylesheet">
    <link href = "styles/icons/fonts.css" rel = "stylesheet">
    
    <script src = "scripts/jquery-latest.js"></script>
    <script src = "scripts/encabezado.js"></script>
    

    <title> Recetario </title>
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

            <img id = "header_image" src = "imagenes/recetas/bread_banner.jpg">

        </header>

        <main class = "content">
            <h2 id = "lineamientos_titulo"> Recetario <br><br> </h2>
            <p id = "lineamientos_descripcion">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel sem non quam mollis pretium. Vestibulum laoreet nulla nibh, in egestas nunc mattis laoreet. Etiam commodo libero at augue commodo, in laoreet est malesuada. Morbi venenatis tortor vel faucibus tempus. Proin mi eros, maximus in pretium scelerisque, tincidunt vitae ex. Integer non feugiat nunc, sit amet hendrerit tortor. Curabitur eget tempor est.

                    Sed posuere viverra ultricies. Fusce eu cursus ex. Mauris malesuada dapibus magna, et rhoncus elit volutpat vel. In a nulla nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nibh mi, porta eget vestibulum eu, pellentesque a erat. Ut id faucibus turpis, quis dignissim lorem. Phasellus ultrices, nulla ac commodo sollicitudin, enim orci maximus ligula, ut tincidunt dui est nec ipsum. Aenean quis ante rutrum sem iaculis viverra at at neque. Praesent semper eget dui ut faucibus. Ut non erat sed eros porta sodales. Donec nisl ante, vulputate eu rhoncus id, feugiat eget risus. Suspendisse potenti. Fusce iaculis quam urna, quis condimentum elit posuere a. Suspendisse lacinia, magna a rutrum blandit, dui nisi pretium elit, et scelerisque odio libero eu nisl. Fusce vestibulum nec lacus non commodo.

            </p>
             <br>
        </main>  

        <div class="widget-0" align="center">
            <div class="contenedor">
            <div class="heading" id="titulo_catalogo">Nuestras Recetas</div>
              <div class="images">
                <?php
                    include 'utilerias.php';
                    $cs=conecta();
                    $query="SELECT * FROM recetas";
                    $sql=mysqli_query($cs,$query);
                    while ($reg=mysqli_fetch_object($sql)) {
                        $x="";
                        echo"
                        <img src='imagenes/recetas/$reg->img_rec' alt='$reg->nom_rec' />
                        ";
                                           
                    }
                ?>
                
              </div>
              <div class="modal">
                <span class="close"><i class="icon-cross"></i></span>
                <div class="modalContent">
                    <img src="" class="modalImg" />
                    <!--imagens/recetas/Abanicos_receta.jpg-->
                    <a href="" download class="modalImgD">
                        
                        <span class="modalTxt" id="titulo_catalogo"></span>
                    </a>   
                </div>
              </div>
            </div>
        </div>


        <script type="text/javascript">
            const images = document.querySelectorAll(".images img");
            const modal = document.querySelector(".modal");
            const modalImg = document.querySelector(".modalImg");
             const modalImgD = document.querySelector(".modalImgD");
            const modalTxt = document.querySelector(".modalTxt");
            const close = document.querySelector(".close");

            images.forEach((image) => {
              image.addEventListener("click", () => {
                modalImg.src = image.src;
                modalImgD.href = image.src;
                modalTxt.innerHTML = image.alt;
                modal.classList.add("appear");

                close.addEventListener("click", () => {
                  modal.classList.remove("appear");
                });
              });
            });
        </script>

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
                            <li><a href = "contacto.php"><span class = "icon-network"></span> Encuentra Tu Distribuidor </a></li>
                            <li><a href = "servicio-tecnico.html"><span class = "icon-info"></span> FAQ </a></li>
                            
                        </ul>

                    </li>
                    
                    <li id = "bolsa_trabajo">

                        <ul>
                            <li id = "footer_title"> Bolsa de Trabajo </li>

                            <li><a href = "contacto.php"><span class = "icon-man"></span> Integrate a Nuestro Equipo </a></li>
                            
                        </ul>

                    </li>

                    <li id = "siguenos">

                        <ul>
                            <li id = "footer_title"> Siguenos </li>

                            <ul class = "share_buttons_footer">

                                <li><a href = "https://web.facebook.com/impulsopirineos/?_rdc=1&_rdr"><span class = "icon-facebook-with-circle"></span></a></li>

                            </ul>
                            
                        </ul>

                    </li>

                </ul>

            </div>

        </footer>
        
    </div>

    </body>
</html>