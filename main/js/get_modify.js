var mid = 0;
var end = 0;
var lock = 0;
function get_picture (end){
    $.ajax ({
        url: "./get_picture.php",
        type: "POST",
        async: true,
        data:{ 
            end: end
        },
        error: function (a, b, c) {
            alert (a);
            alert (b);
            alert (c);
        },
        success: function (response) {
            $("#the_end").empty ();
            $("#the_end").append (response);
            $("#the_end").fadeIn ();   
        }
    });
}
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
                str +=
                '<a href="./project.php?pid=response[i].mid" class="list-group-item list-group-item-action">\
                    <div class="d-flex w-100 justify-content-between" >\
                        <h5 class="mb-1">' + response[i].mpoid + "/" + response[i].mpname + '</h5>\
                        <small class="text-muted">' + response[i].mtime + '</small>\
                    </div>\
                    <p class="list-group-item mb-1">' +response[i].muid;
                        if ( response[i].mdo == 0 ) 
                        {
                            str += "上傳了";
                        } 
                        else    
                        {
                            str += "更新了";
                        }
                        str+=response[i].mfname+
                    '</p>\
                </a>\
            </br>';
            }
            if (i==0 && end == 0)
                end = 1;
            if (end > 0) {
               get_picture(end++);
            } else {
                mid = response[--i].mid;
                $("#show_modify").append (str);
                $("#show_modify").fadeIn ();                
            }
        }
    });
    $("#loading").html ("<img src='image/loading.gif'>");
}

$(document).ready (function () {
    window.onload = show_modify(0); 
	window.onscroll = function(ev) {
    	if ((window.innerHeight + window.scrollY) 
			>= document.body.offsetHeight) {
             if (lock == 0) {
                show_modify (0);
                lock = 1;
             }
		}
	};
    $(document).ajaxComplete (function (){
        lock = 0;
        //window.scrollY = window.scrollY-10;
        $("#loading").empty ();
    });
});
