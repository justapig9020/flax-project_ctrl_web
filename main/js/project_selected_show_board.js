
function show_file (){
    $("#show_board").empty ();
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
            $("#show_board").html (response);
	        $("#show_board").fadeIn ();
        }
    }
    );
    $("#loading").append ("now loading");
}

function show_works () {
    $("#show_board").empty ();
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
           	$('#show_board').append (response);
	        $("#show_board").fadeIn ();
        }
    }
    );
    $("#loading").append ("now loading");
}

$(document).ready (function () {
	
    window.onload = show_file();
    $("#show_files").click ( function () { 
        show_file ();
    }); 
    
    $("#show_works").click ( function () {
        show_works ();
    });

    $(document).ajaxComplete (function(){
        $("#loading").empty ();
    });   
});


