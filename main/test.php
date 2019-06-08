<head>
<script src="js/jquery-3.4.1.js"></script>
<script>
$(document).ready (function () {
    var lpid = $("#pid").val();
    var lid = 0;
    $("#btn1").click (function () {
        if (lpid != $("#pid").val()) { 
            $("#res").empty();
            lid = 0;
        }    
        $.ajax ({
            url: "./get_modify.php",
            type: "POST",
            data: {
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
        });
        lpid = $("#pid").val();
    });
    $(document).ajaxComplete (function(){
        lid = $("#lid").text();
    });   
});

</script>
</head>
<body>
<div id="res"></div>
pid: <input type="text" id="pid"> </br>
<div style="border:2px orange solid;" id="btn1" >btn1</div>
</body> 
