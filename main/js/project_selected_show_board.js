//import * as gantt from "js/show_work.js";
function show_file (path){
    path = path.trim ();
    $("#show_works").attr ("style","display:none");
	$.ajax ({
   		url: "./get_file.php",
	    type: "POST",
        async: true,
        data: {
            pid: pid,
            path: path
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
        dataType: 'json',
        data: {
            pid: pid
	    },
    	error: function (xhr) {
        	alert ('error');
	    },
    	success : function (response) {
            /*len = response.length;
            document.write (len+"</br>");
            for (i=0 ; i<len; i++) {
                document.write (response[i].wname+"</br>");
            }
            */
                
            refreshDate (response);
            $("#show_works").attr ("style","");
            //alert (1);
        }
    }
    );
    $("#loading").html ("<img src='image/loading.gif'>");
}

$(document).ready (function () {
	
    window.onload = show_file ($("#proj_path").html ());
    $("#show_files_button").click ( function () { 
        show_file ($("#proj_path").html ());
    }); 
    
    $("#show_works_button").click ( function () {
        $("#show_files").empty ();
        show_works ();
    });

    $(document).ajaxComplete (function(){
        $("#loading").empty ();
    });
    $("#new_file_btn").click (function(){
        str = '<input type="file" name="myFile[]" id="file_array_last" style="display: block;margin-bottom: 5px;">';
        $("#file_list").html (str);
	    $("#file_list").fadeIn ();

    });
    $("#more_files").click (function () {
        str = '<input type="file" name="myFile[]" id="file_array" style="display: block;margin-bottom: 5px;">';
        $("#file_list").append (str);
	    $("#file_list").fadeIn ();
    });
});


