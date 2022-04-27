function next_ev(){
    
	if (document.getElementById("text_1").style.display === "block"){
		document.getElementById("text_1").style.display = "none";
		document.getElementById("text_2").style.display="block";

	}else{
		if(document.getElementById("text_2").style.display === "block"){
			document.getElementById("text_2").style.display = "none";
			document.getElementById("text_3").style.display = "block";

		}else{
			if(document.getElementById("text_3").style.display === "block"){
				document.getElementById("text_3").style.display = "none";
				document.getElementById("text_4").style.display = "block";

			}else{
				if(document.getElementById("text_4").style.display === "block"){
					document.getElementById("text_4").style.display = "none";
					document.getElementById("text_5").style.display = "block";
				}
		    }
		}
	}
}
		


function last_ev(){

	if(document.getElementById("text_5").style.display === "block"){
		document.getElementById("text_5").style.display = "none";
		document.getElementById("text_4").style.display="block";
	}else{
		if(document.getElementById("text_4").style.display === "block"){
			document.getElementById("text_4").style.display = "none";
			document.getElementById("text_3").style.display = "block";
		}else{
			if(document.getElementById("text_3").style.display === "block"){
				document.getElementById("text_3").style.display = "none";
				document.getElementById("text_2").style.display = "block";
			}else{
				if(document.getElementById("text_2").style.display === "block"){
					document.getElementById("text_2").style.display = "none";
					document.getElementById("text_1").style.display = "block";
				}
			}
		}
	}
}