<head>
<script src="js/jquery-3.4.1.js"></script>
<script>
window.onload=aj(0,0);
function aj (lid, ibuf){
	$.ajax ({
   		url: "./get_modify.php",
	    type: "POST",
        async:true,
        data: {
        	ibuf: ibuf,
			lid: lid,
            pid: $("#pid").val(),
	    },
    	error: function (xhr) {
        	alert ('error');
	    },
    	success : function (response) {
        //document.write (response);
            $("#lid").attr ("id","id");
           	$('#res').append (response);
	        $("#res").fadeIn ();
        //$(response).ready (function () {
        // }
        }
    }
    );
    $("#loading").append ("now loading");
}
$(document).ready (function () {
	var ibuf = 0;
	var lid = 0;
	var lpid = $("#pid").val();
	var lock = 0;
	window.onscroll = function(ev) {
    	if ((window.innerHeight + window.scrollY) >= 
			document.body.offsetHeight && 
			lock == 0) {
			lock = 1;
        	if (lpid != $("#pid").val()) { 
            	$("#res").empty();
            	lid = 0;
        	}
			aj(lid, ibuf);    
        	lpid = $("#pid").val();
		}
	}
    $(document).ajaxComplete (function(){
        $("#loading").empty ();
        lid = $("#lid").text();
		ibuf += 50;
		lock = 0;
    });   
});

</script>
</head>
<body>
<div id="res"></div>
<div id="loading"></div>
</body> 
