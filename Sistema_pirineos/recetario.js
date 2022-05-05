function tomar_datos(op){

	cve_rec=document.f_recetario.cve_rec.value;
	nom_rec=document.f_recetario.nom_rec.value;
	tipo_rec=document.f_recetario.tipo_rec.value;
	img_rec=document.f_recetario.img_rec.value;

	if (op==1) cat=1;
	if (op==2) cat=2;
	if (op==3) cat=3;
	if (op==4) cat=4;
	if (op==5) cat=5;
	alert(cat);
}

function prod_op_selec(op){
	if (op==1) {
		tipo_rec="1";
		url="recetario.php?op=1&tipo_rec="+tipo_rec;
		
		location.href=url;
	}
	if (op==2) {
		tipo_rec="2";
		url="recetario.php?op=2&tipo_rec="+tipo_rec;
		location.href=url;
	}
	if (op==3) {
		tipo_rec="3";
		url="recetario.php?op=3&tipo_rec="+tipo_rec;
		location.href=url;
	}
	if (op==4) {
		tipo_rec="4";
		url="recetario.php?op=4&tipo_rec="+tipo_rec;
		location.href=url;
	}
	if (op==5) {
		tipo_rec="5";
		url="recetario.php?op=5&tipo_rec="+tipo_rec;
		location.href=url;
	}
	

}

function altas(op){
	tomar_datos(op);
	//alert(cve_prod+" "+nom_prod+" "+tipo_prod+" "+descripcion_prod);
	if ((cve_rec.length==0) || (nom_rec.length==0) || (tipo_rec.length==0) || (img_rec.length==0)){
		alert("Error, todos los campos son obligatorios");
		if (cve_rec.length==0) document.f_recetario.cve_rec.style.background="red";
		if (nom_rec.length==0) document.f_recetario.nom_rec.style.background="red";
		if (tipo_rec.length==0) document.f_recetario.tipo_rec.style.background="red";
		if (img_rec.length==0) document.f_recetario.img_rec.style.background="red";
	}
	else{
		document.f_recetario.cve_rec.style.background="blue";
		document.f_recetario.nom_rec.style.background="blue";
		document.f_recetario.tipo_rec.style.background="blue";
		document.f_recetario.img_rec.style.background="blue";
		url="recetario.php?op=6&cve_rec="+cve_rec+"&nom_rec="+nom_rec;
		url=url+"&tipo_rec="+tipo_rec;
		url=url+"&img_rec="+img_rec+"&cat="+cat;
		location.href=url;
	}
} // Termina altas

function consultas(op){
	tomar_datos(op);
	if (cve_rec.length==0){
		alert("Error, se debe indicar la clave de producto a consultar");
		document.f_recetario.cve_rec.style.background="red";
	}
	else{
		document.f_recetario.cve_rec.style.background="blue";
		nom_rec="";
		tipo_rec="";
		img_rec="";
		url="recetario.php?op=8&cve_rec="+cve_rec+"&nom_rec="+nom_rec;
		url=url+"&tipo_rec="+tipo_rec;
		url=url+"&img_rec="+img_rec+"&cat="+cat;
		location.href=url;
	}
} // Termina consultas

function bajas(op){
	tomar_datos(op);
	if (cve_rec.length==0){
		alert("Error, se debe indicar la clave de producto a eliminar");
		document.f_recetario.cve_rec.style.background="red";
	}
	else{
		document.f_recetario.cve_rec.style.background="blue";
		nom_rec="";
		tipo_rec="";
		img_rec="";
		if (confirm("Seguro de Eliminar ??")){
			url="recetario.php?op=7&cve_rec="+cve_rec+"&nom_rec="+nom_rec;
			url=url+"&tipo_rec="+tipo_rec;
			url=url+"&img_rec="+img_rec+"&cat="+cat;
			location.href=url;
		}
		else{
			alert("La acción de BAJA ha sido CANCELADA");
		}
	}
} // Termina bajas

function cambios(op){
	tomar_datos(op);
	if (cve_rec.length==0){
		alert("Error, se debe indicar la clave de producto a modificar");
		document.f_recetario.cve_rec.style.background="red";
	}
	else{
		document.f_recetario.cve_rec.style.background="blue";
		url="recetario.php?op=9&cve_rec="+cve_rec+"&nom_rec="+nom_rec;
		url=url+"&tipo_rec="+tipo_rec;
		url=url+"&img_rec="+img_rec+"&cat="+cat;
		location.href=url;
	}
} // Termina cambios

//Hola