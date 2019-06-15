var mid = 0;
function show_modify (pid) {
    $.ajax ({
        url: "./get_modify.php",
        type: "POST",
        async: true,
        dataType: "json",
        data:{ 
            pid: pid,
            mid: mid
        },
        error: function (a, b, c) {
            alert (a);
            alert (b);
            alert (c);
        },
        success: function (response) {
            var str = "";
            var len = response.length;
            var i;
            for (i=0; i<len; i++) {
                str += "<a href=''>" + response[i].mid + "</a>";
            }
            alert (typeof (response[--i].mid));
            mid = response[i].mid;
            $("#show_modify").append (str);
            $("#show_modify").fadeIn ();
        }
    });
    $("#loading").html ("<img src='image/loading.gif'>");
}

$(document).ready (function () {
    window.onload = show_modify(0); 
	window.onscroll = function(ev) {
    	if ((window.innerHeight + window.scrollY) 
			>= document.body.offsetHeight) {
    		show_modify ();
		}
	};
    $(document).ajaxComplete (function (){
        $("#loading").empty ();
    });
});
