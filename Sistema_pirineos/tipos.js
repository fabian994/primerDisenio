function tomar_datos(){
	cve_tipo=document.f_sidebar_HaTrigo.cve_tipo.value;
	nom_tipo=document.f_sidebar_HaTrigo.nom_tipo.value;
	nom_catalog=document.f_sidebar_HaTrigo.nom_catalog.value;
	nom_recetario=document.f_sidebar_HaTrigo.nom_recetario.value;

	nom_prod_rel1=document.f_sidebar_HaTrigo.nom_prod_rel1.value;
	img_prod_rel1=document.f_sidebar_HaTrigo.img_prod_rel1.value;
	url_prod_rel1=document.f_sidebar_HaTrigo.url_prod_rel1.value;

	nom_prod_rel2=document.f_sidebar_HaTrigo.nom_prod_rel2.value;
	img_prod_rel2=document.f_sidebar_HaTrigo.img_prod_rel2.value;
	url_prod_rel2=document.f_sidebar_HaTrigo.url_prod_rel2.value;
}

function altas(){
	tomar_datos();
	//alert(cve_prod+" "+nom_prod+" "+tipo_prod+" "+descripcion_prod);
	if ((cve_tipo.length==0) || (nom_tipo.length==0)){
		alert("Error, todos los campos son obligatorios");
		if (cve_tipo.length==0) document.f_sidebar_HaTrigo.cve_tipo.style.background="red";
		if (nom_tipo.length==0) document.f_sidebar_HaTrigo.nom_tipo.style.background="red";
		if (nom_catalog.length==0) document.f_sidebar_HaTrigo.nom_catalog.style.background="red";
		if (nom_recetario.length==0) document.f_sidebar_HaTrigo.nom_recetarioetario.style.background="red";
		if (nom_prod_rel1.length==0) document.f_sidebar_HaTrigo.nom_prod_rel1.style.background="red";
		if (img_prod_rel1.length==0) document.f_sidebar_HaTrigo.img_prod_rel1.style.background="red";
		if (url_prod_rel1.length==0) document.f_sidebar_HaTrigo.url_prod_rel1.style.background="red";

		if (nom_prod_rel2.length==0) document.f_sidebar_HaTrigo.nom_prod_rel2.style.background="red";
		if (img_prod_rel2.length==0) document.f_sidebar_HaTrigo.img_prod_rel2.style.background="red";
		if (url_prod_rel2.length==0) document.f_sidebar_HaTrigo.url_prod_rel2.style.background="red";
	}
	else{
		url="sidebar.php?op=1&cve_tipo="+cve_tipo+"&nom_tipo="+nom_tipo+"&nom_catalog="+nom_catalog+"&nom_recetario="+nom_recetario;
		url=url+"&nom_prod_rel1="+nom_prod_rel1+"&img_prod_rel1="+img_prod_rel1+"&url_prod_rel1="+url_prod_rel1;
		url=url+"&nom_prod_rel2="+nom_prod_rel2+"&img_prod_rel2="+img_prod_rel2+"&url_prod_rel2="+url_prod_rel2;;
		location.href=url;
	}
} // Termina altas

function bajas(){
	tomar_datos();
	if (cve_tipo.length==0){
		alert("Error, se debe indicar la clave de tipo a eliminar");
		document.f_sidebar_HaTrigo.cve_tipo.style.background="red";
	}
	else{
		document.f_sidebar_HaTrigo.cve_tipo.style.background="blue";
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
			url="sidebar.php?op=2&cve_tipo="+cve_tipo+"&nom_tipo="+nom_tipo+"&nom_catalog="+nom_catalog+"&nom_recetario="+nom_recetario;
			url=url+"&nom_prod_rel1="+nom_prod_rel1+"&img_prod_rel1="+img_prod_rel1+"&url_prod_rel1="+url_prod_rel1;
			url=url+"&nom_prod_rel2="+nom_prod_rel2+"&img_prod_rel2="+img_prod_rel2+"&url_prod_rel2="+url_prod_rel2;;
			location.href=url;
		}
		else{
			alert("La acción de BAJA ha sido CANCELADA");
		}
	}
} // Termina bajas

function consultas(){
	tomar_datos();
	if (cve_tipo.length==0){
		alert("Error, se debe indicar la clave de tipo a consultar");
		document.f_sidebar_HaTrigo.cve_tipo.style.background="red";
	}
	else{
		document.f_sidebar_HaTrigo.cve_tipo.style.background="blue";
		nom_tipo="";
		nom_catalog="";
		nom_recetario="";

		nom_prod_rel1="";
		img_prod_rel1="";
		url_prod_rel1="";

		nom_prod_rel2="";
		img_prod_rel2="";
		url_prod_rel2="";
		url="sidebar.php?op=3&cve_tipo="+cve_tipo+"&nom_tipo="+nom_tipo+"&nom_catalog="+nom_catalog+"&nom_recetario="+nom_recetario;
		url=url+"&nom_prod_rel1="+nom_prod_rel1+"&img_prod_rel1="+img_prod_rel1+"&url_prod_rel1="+url_prod_rel1;
		url=url+"&nom_prod_rel2="+nom_prod_rel2+"&img_prod_rel2="+img_prod_rel2+"&url_prod_rel2="+url_prod_rel2;;
		location.href=url;
	}
} // Termina consultas

function cambios(){
	tomar_datos();
	if (cve_tipo.length==0){
		alert("Error, se debe indicar la clave de producto a modificar");
		document.f_sidebar_HaTrigo.cve_tipo.style.background="red";
	}
	else{
		document.f_sidebar_HaTrigo.cve_tipo.style.background="blue";
		url="sidebar.php?op=4&cve_tipo="+cve_tipo+"&nom_tipo="+nom_tipo+"&nom_catalog="+nom_catalog+"&nom_recetario="+nom_recetario;
		url=url+"&nom_prod_rel1="+nom_prod_rel1+"&img_prod_rel1="+img_prod_rel1+"&url_prod_rel1="+url_prod_rel1;
		url=url+"&nom_prod_rel2="+nom_prod_rel2+"&img_prod_rel2="+img_prod_rel2+"&url_prod_rel2="+url_prod_rel2;;
		location.href=url;
	}
} // Termina cambios