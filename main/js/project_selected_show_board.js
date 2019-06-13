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
    $("#loading").append ("now loading");
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
            //alert (1);
        }
    }
    );
    $("#loading").append ("now loading");
}

$(document).ready (function () {
	
    window.onload = show_file();
    $("#show_files_button").click ( function () { 
        show_file ();
    }); 
    
    $("#show_works_button").click ( function () {
        $("#show_files").empty ();
        $("#show_works").attr ("style","");
        show_works ();
    });

    $(document).ajaxComplete (function(){
        $("#loading").empty ();
    });   
});


