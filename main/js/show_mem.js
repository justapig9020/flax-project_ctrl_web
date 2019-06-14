/*
{foreach $mems as $row}
                    {if $row["status"] eq "1"}
                        <li class="list-group-item list-group-item-warning" title="組長" id="mem_list_lea">{$row["uid"]}</li>
                    {/if}
                    {if $row["status"] eq "2"}
                        <li class="list-group-item list-group-item-info" title="指導" id="mem_list_mem" >{$row["uid"]}</li>
                    {/if}
                    {if $row["status"] eq "0"}
                        <li class="list-group-item" title="成員" id="mem_list_mem" >{$row["uid"]}</li>
                    {/if}
                {/foreach}
*/
var ms = 0;
var ml = "";
function del_mem (duid) {  
	$.ajax ({
   		url: "./get_mem.php",
	    type: "POST",
        async: true,
        data: {
            pid: pid,
            duid: duid
	    },
    	error: function (xhr) {
        	alert ('error');
	    },
    	success : function (response) {
            $("#mem_list").html (response);
	        $("#mem_list").fadeIn ();
        }
    }
    );
    $("#mem_loading").html ("<img src='image/loading.gif' alt='Now loading'>");
}


function show_mem () {  
	$.ajax ({
   		url: "./get_mem.php",
	    type: "POST",
        async: true,
        data: {
            pid: pid,
	    },
    	error: function (xhr) {
        	alert ('error');
	    },
    	success : function (response) {
            $("#mem_list").html (response);
	        $("#mem_list").fadeIn ();
        }
    }
    );
    $("#mem_loading").html ("<img src='image/loading.gif' alt='Now loading'>");
}

// div id= mem_list
$(document).ready (function () {
    window.onload = show_mem ();
    /*$("#more_files").click (function (){
        str = '<input type="file" name="myFile[]" id="file_array" style="display: block;margin-bottom: 5px;">';
        $("#file_list").append (str);

    });*/

    $("#mem_list").click (function (event) {
        $target = $(event.target);
        if (ms == 1 && $target.attr("id") == "mem_list_mem") {
            duid = $target.html();
            if (window.confirm("確定要移除成員" + duid)) {
                del_mem (duid);
            }
        }
    });
    $("#d_mem").click (function () {
        if (ms == 0) {
            ms = 1;
            ml = $("#mem_add_del_btn").val ();
            //$("#mem_add_del_btn").empty ();
             $("#btnGroupDrop3").html ("<b>刪除成員</b>")
            //$("#mem_list").html(ml);
        }    
    });
    $("#btnGroupDrop3").click (function (){
        if (ms == 1) {
            ms = 0;
            //$("#mem_add_del_btn").html () = ml;
            $("#btnGroupDrop3").html ("成員")
        }
    });
    $(document).ajaxComplete (function(){
        ml = $("#mem_add_del_btn").html ();
        $("#mem_loading").empty ();
    }); 
});

