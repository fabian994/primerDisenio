function tomar_datos(op){

	cve_tipo=document.f_contenidos.cve_tipo.value;
	nom_tipo=document.f_contenidos.nom_tipo.value;
	nom_catalog=document.f_contenidos.nom_catalog.value;
	nom_recetario=document.f_contenidos.nom_recetario.value;

	nom_prod_rel1=document.f_contenidos.nom_prod_rel1.value;
	img_prod_rel1=document.f_contenidos.img_prod_rel1.value;
	url_prod_rel1=document.f_contenidos.url_prod_rel1.value;

	nom_prod_rel2=document.f_contenidos.nom_prod_rel2.value;
	img_prod_rel2=document.f_contenidos.img_prod_rel2.value;
	url_prod_rel2=document.f_contenidos.url_prod_rel2.value;

	if (op==1) cat=1;
	if (op==2) cat=2;
	if (op==3) cat=3;
	if (op==4) cat=4;
	if (op==5) cat=5;
	alert(cat);

}

function prod_op_selec(op){
	if (op==1) {
		cve_tipo="1";
		nom_tipo="Harinas de Trigo";
		url="contenidos.php?op=1&cve_tipo="+cve_tipo+"&nom_tipo="+nom_tipo;
		location.href=url;
	}
	if (op==2) {
		cve_tipo="2";
		nom_tipo="Harinas preparadas Tres Estrella";
		url="contenidos.php?op=2&cve_tipo="+cve_tipo+"&nom_tipo="+nom_tipo;
		location.href=url;
	}
	if (op==3) {
		cve_tipo="3";
		nom_tipo="Polvo Para Hornear Tres Estrellas";
		url="contenidos.php?op=3&cve_tipo="+cve_tipo+"&nom_tipo="+nom_tipo;
		location.href=url;
	}
	if (op==4) {
		cve_tipo="4";
		nom_tipo="Mejorante RendiMix"
		url="contenidos.php?op=4&cve_tipo="+cve_tipo+"&nom_tipo="+nom_tipo;
		location.href=url;
	}
	if (op==5) {
		cve_tipo="5";
		nom_tipo="Derivados de Trigo"
		url="contenidos.php?op=5&cve_tipo="+cve_tipo+"&nom_tipo="+nom_tipo;
		location.href=url;
	}
	

}

function altas(op){
	tomar_datos(op);
	//alert(cve_prod+" "+nom_prod+" "+tipo_prod+" "+descripcion_prod);
	if ((cve_tipo.length==0) || (nom_tipo.length==0)){
		alert("Error, todos los campos son obligatorios");
		if (cve_tipo.length==0) document.f_contenidos.cve_tipo.style.background="red";
		if (nom_tipo.length==0) document.f_contenidos.nom_tipo.style.background="red";
		if (nom_catalog.length==0) document.f_contenidos.nom_catalog.style.background="red";
		if (nom_recetario.length==0) document.f_contenidos.nom_recetarioetario.style.background="red";
		if (nom_prod_rel1.length==0) document.f_contenidos.nom_prod_rel1.style.background="red";
		if (img_prod_rel1.length==0) document.f_contenidos.img_prod_rel1.style.background="red";
		if (url_prod_rel1.length==0) document.f_contenidos.url_prod_rel1.style.background="red";

		if (nom_prod_rel2.length==0) document.f_contenidos.nom_prod_rel2.style.background="red";
		if (img_prod_rel2.length==0) document.f_contenidos.img_prod_rel2.style.background="red";
		if (url_prod_rel2.length==0) document.f_contenidos.url_prod_rel2.style.background="red";
	}
	else{
		url="contenidos.php?op=6&cve_tipo="+cve_tipo+"&nom_tipo="+nom_tipo+"&nom_catalog="+nom_catalog+"&nom_recetario="+nom_recetario;
		url=url+"&nom_prod_rel1="+nom_prod_rel1+"&img_prod_rel1="+img_prod_rel1+"&url_prod_rel1="+url_prod_rel1;
		url=url+"&nom_prod_rel2="+nom_prod_rel2+"&img_prod_rel2="+img_prod_rel2+"&url_prod_rel2="+url_prod_rel2+"&cat="+cat;;
		location.href=url;
	}
} // Termina altas

function bajas(op){
	tomar_datos(op);
	if (cve_tipo.length==0){
		alert("Error, se debe indicar la clave de tipo a eliminar");
		document.f_contenidos.cve_tipo.style.background="red";
	}
	else{
		document.f_contenidos.cve_tipo.style.background="blue";
		nom_tipo="";
		nom_catalog="";
		nom_recetario="";

		nom_prod_rel1="";
		img_prod_rel1="";
		url_prod_rel1="";

		nom_prod_rel2="";
		img_prod_rel2="";
		url_prod_rel2="";
		if (confirm("Seguro de Eliminar ??")){
			url="contenidos.php?op=7&cve_tipo="+cve_tipo+"&nom_tipo="+nom_tipo+"&nom_catalog="+nom_catalog+"&nom_recetario="+nom_recetario;
			url=url+"&nom_prod_rel1="+nom_prod_rel1+"&img_prod_rel1="+img_prod_rel1+"&url_prod_rel1="+url_prod_rel1;
			url=url+"&nom_prod_rel2="+nom_prod_rel2+"&img_prod_rel2="+img_prod_rel2+"&url_prod_rel2="+url_prod_rel2+"&cat="+cat;
			location.href=url;
		}
		else{
			alert("La acción de BAJA ha sido CANCELADA");
		}
	}
} // Termina bajas

function consultas(op){
	tomar_datos(op);
	if (cve_tipo.length==0){
		alert("Error, se debe indicar la clave de tipo a consultar");
		document.f_contenidos.cve_tipo.style.background="red";
	}
	else{
		document.f_contenidos.cve_tipo.style.background="blue";
		
		nom_catalog="";
		nom_recetario="";

		nom_prod_rel1="";
		img_prod_rel1="";
		url_prod_rel1="";

		nom_prod_rel2="";
		img_prod_rel2="";
		url_prod_rel2="";
		url="contenidos.php?op=8&cve_tipo="+cve_tipo+"&nom_tipo="+nom_tipo+"&nom_catalog="+nom_catalog+"&nom_recetario="+nom_recetario;
		url=url+"&nom_prod_rel1="+nom_prod_rel1+"&img_prod_rel1="+img_prod_rel1+"&url_prod_rel1="+url_prod_rel1;
		url=url+"&nom_prod_rel2="+nom_prod_rel2+"&img_prod_rel2="+img_prod_rel2+"&url_prod_rel2="+url_prod_rel2+"&cat="+cat;
		
		location.href=url;
	}
} // Termina consultas

function cambios(op){
	tomar_datos(op);
	if (cve_tipo.length==0){
		alert("Error, se debe indicar la clave de producto a modificar");
		document.f_contenidos.cve_tipo.style.background="red";
	}
	else{
		document.f_contenidos.cve_tipo.style.background="blue";
		url="contenidos.php?op=9&cve_tipo="+cve_tipo+"&nom_tipo="+nom_tipo+"&nom_catalog="+nom_catalog+"&nom_recetario="+nom_recetario;
		url=url+"&nom_prod_rel1="+nom_prod_rel1+"&img_prod_rel1="+img_prod_rel1+"&url_prod_rel1="+url_prod_rel1;
		url=url+"&nom_prod_rel2="+nom_prod_rel2+"&img_prod_rel2="+img_prod_rel2+"&url_prod_rel2="+url_prod_rel2+"&cat="+cat;
		location.href=url;
	}
} // Termina cambios