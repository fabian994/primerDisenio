function tomar_datos(){
	cve_prod=document.f_productos_HaTrigo.cve_prod.value;
	nom_prod=document.f_productos_HaTrigo.nom_prod.value;
	tipo_prod=document.f_productos_HaTrigo.tipo_prod.value;
	descripcion_prod=document.f_productos_HaTrigo.descripcion_prod.value;
	img_prod=document.f_productos_HaTrigo.img_prod.value;
}

/*function prod_op_selec(op){
	if (op==1) {
		url="productos.php?op=1"
		location.href=url;
	}
	if (op==2) {
		url="productos.php?op=2"
		location.href=url;
	}
	if (op==3) {
		url="productos.php?op=3"
		location.href=url;
	}
	if (op==4) {
		url="productos.php?op=4"
		location.href=url;
	}
	if (op==5) {
		url="productos.php?op=5"
		location.href=url;
	}
	if (op==6) {
		url="productos.php?op=6"
		location.href=url;
	}

}*/

function altas(){
	tomar_datos();
	//alert(cve_prod+" "+nom_prod+" "+tipo_prod+" "+descripcion_prod);
	if ((cve_prod.length==0) || (nom_prod.length==0) || (tipo_prod.length==0) || (descripcion_prod.length==0) || (img_prod.length==0)){
		alert("Error, todos los campos son obligatorios");
		if (cve_prod.length==0) document.f_productos_HaTrigo.cve_prod.style.background="red";
		if (nom_prod.length==0) document.f_productos_HaTrigo.nom_prod.style.background="red";
		if (tipo_prod.length==0) document.f_productos_HaTrigo.tipo_prod.style.background="red";
		if (descripcion_prod.length==0) document.f_productos_HaTrigo.descripcion_prod.style.background="red";
		if (img_prod.length==0) document.f_productos_HaTrigo.img_prod.style.background="red";
	}
	else{
		document.f_productos_HaTrigo.cve_prod.style.background="blue";
		document.f_productos_HaTrigo.nom_prod.style.background="blue";
		document.f_productos_HaTrigo.tipo_prod.style.background="blue";
		document.f_productos_HaTrigo.descripcion_prod.style.background="blue";
		document.f_productos_HaTrigo.img_prod.style.background="blue";
		url="productos.php?op=6&cve_prod="+cve_prod+"&nom_prod="+nom_prod;
		url=url+"&tipo_prod="+tipo_prod+"&descripcion_prod="+descripcion_prod;
		url=url+"&img_prod="+img_prod;
		location.href=url;
	}
} // Termina altas

function consultas(){
	tomar_datos();
	if (cve_prod.length==0){
		alert("Error, se debe indicar la clave de producto a consultar");
		document.f_productos_HaTrigo.cve_prod.style.background="red";
	}
	else{
		document.f_productos_HaTrigo.cve_prod.style.background="blue";
		nom_prod="";
		tipo_prod="";
		descripcion_prod="";
		img_prod="";
		url="productos.php?op=8&cve_prod="+cve_prod+"&nom_prod="+nom_prod;
		url=url+"&tipo_prod="+tipo_prod+"&descripcion_prod="+descripcion_prod;
		url=url+"&img_prod="+img_prod;
		location.href=url;
	}
} // Termina consultas

function bajas(){
	tomar_datos();
	if (cve_prod.length==0){
		alert("Error, se debe indicar la clave de producto a eliminar");
		document.f_productos_HaTrigo.cve_prod.style.background="red";
	}
	else{
		document.f_productos_HaTrigo.cve_prod.style.background="blue";
		nom_prod="";
		tipo_prod="";
		descripcion_prod="";
		img_prod="";
		if (confirm("Seguro de Eliminar ??")){
			url="productos.php?op=7&cve_prod="+cve_prod+"&nom_prod="+nom_prod;
			url=url+"&tipo_prod="+tipo_prod+"&descripcion_prod="+descripcion_prod;
			url=url+"&img_prod="+img_prod;
			location.href=url;
		}
		else{
			alert("La acción de BAJA ha sido CANCELADA");
		}
	}
} // Termina bajas

function cambios(){
	tomar_datos();
	if (cve_prod.length==0){
		alert("Error, se debe indicar la clave de producto a modificar");
		document.f_productos_HaTrigo.cve_prod.style.background="red";
	}
	else{
		document.f_productos_HaTrigo.cve_prod.style.background="blue";
		url="productos.php?op=9&cve_prod="+cve_prod+"&nom_prod="+nom_prod;
		url=url+"&tipo_prod="+tipo_prod+"&descripcion_prod="+descripcion_prod;
		url=url+"&img_prod="+img_prod;
		location.href=url;
	}
} // Termina cambios

//Hola