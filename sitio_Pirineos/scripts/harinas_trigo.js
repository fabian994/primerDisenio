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

$(window).load(function () {
    $(".trigger_popup_fricc").click(function(){
       $('.hover_bkgr_fricc').show();
    });
    $('.popupCloseButton').click(function(){
        $('.hover_bkgr_fricc').hide();
    });
});

$(window).load(function () {
    $(".trigger_popup_fricc_1").click(function(){
       $('.hover_bkgr_fricc_1').show();
    });
    $('.popupCloseButton_1').click(function(){
        $('.hover_bkgr_fricc_1').hide();
    });
});

$(window).load(function () {
    $(".trigger_popup_fricc_2").click(function(){
       $('.hover_bkgr_fricc_2').show();
    });
    $('.popupCloseButton_2').click(function(){
        $('.hover_bkgr_fricc_2').hide();
    });
});

$(window).load(function () {
    $(".trigger_popup_fricc_3").click(function(){
       $('.hover_bkgr_fricc_3').show();
    });
    $('.popupCloseButton_3').click(function(){
        $('.hover_bkgr_fricc_3').hide();
    });
});

$(window).load(function () {
    $(".trigger_popup_fricc_4").click(function(){
       $('.hover_bkgr_fricc_4').show();
    });
    $('.popupCloseButton_4').click(function(){
        $('.hover_bkgr_fricc_4').hide();
    });
});

$(window).load(function () {
    $(".trigger_popup_fricc_5").click(function(){
       $('.hover_bkgr_fricc_5').show();
    });
    $('.popupCloseButton_5').click(function(){
        $('.hover_bkgr_fricc_5').hide();
    });
});


