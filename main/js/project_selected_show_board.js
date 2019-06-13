//import * as gantt from "js/show_work.js";
function show_file (){
    $("#show_works").attr ("style","display:none");
	$.ajax ({
   		url: "./get_file.php",
	    type: "POST",
        async: true,
        data: {
            pid: pid
	    },
    	error: function (xhr) {
        	alert ('error');
	    },
    	success : function (response) {
            $("#show_files").html (response);
	        $("#show_files").fadeIn ();
        }
    }
    );
    $("#loading").html ("<img src='image/loading.gif' alt='Now loading'>");
}

function show_works () {
    $.ajax ({
   		url: "./get_work.php",
	    type: "POST",
        async: true,
        data: {
            pid: pid
	    },
    	error: function (xhr) {
        	alert ('error');
	    },
    	success : function (response) {
           	//$('#show_works').append (response);
	        //$("#show_works").fadeIn ();
            refreshDate ();
            $("#show_works").attr ("style","");
            //alert (1);
        }
    }
    );
    $("#loading").html ("<img src='image/loading.gif'>");
}

$(document).ready (function () {
	
    window.onload = show_file();
    $("#show_files_button").click ( function () { 
        show_file ();
    }); 
    
    $("#show_works_button").click ( function () {
        $("#show_files").empty ();
        show_works ();
    });

    $(document).ajaxComplete (function(){
        $("#loading").empty ();
    });   
});


