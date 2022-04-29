function r1(op){

	url="reportes.php?op="+op;
	location.href=url;
}

function r2(op){
	url="reportes.php?op="+op;
	location.href=url;
}

function r3(op, cve_tipo){
	tipo_prod=cve_tipo;
	url="reportes.php?op="+op+"&cve_tipo="+cve_tipo+"&tipo_prod="+tipo_prod;
	alert(url);
	location.href=url;
}