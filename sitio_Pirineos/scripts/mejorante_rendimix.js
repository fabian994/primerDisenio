function rendimix_plus() {
    
    atributos = document.getElementById("descripcion_atributos");
    atributos_plus = document.getElementById("descripcion_atributos_plus");
    cuadro_atributos = document.getElementById("atributos");
    btn = document.getElementById("plus");
    btn_plus = document.getElementById("plus_plus");
    btn_text = document.getElementById("texto_en_boton");
    btn_color = document.getElementById("circulo");


    if (atributos_plus.style.display === "none") {

        atributos.style.display = "none";
        atributos_plus.className = "atributos_a";
        atributos_plus.style.display = "block";
        atributos_plus.style.color = "#EBE3D5";
        cuadro_atributos.style.background = "#08903E";

        if (btn_plus.style.display === "none") {

            btn.style.display = "none";
            btn_plus.style.display = "block";
            
        }

    }
    else{

        atributos.className = "atributos_a";
        atributos.style.display = "block";
        atributos_plus.style.display = "none";
        cuadro_atributos.style.background = "#E5A73C";
        atributos.style.color = "#1E412F";

        if (btn_plus.style.display === "block") {

            btn.style.display = "block";
            btn_plus.style.display = "none";
            
        }
    }
    

}