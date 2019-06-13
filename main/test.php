
<script tpye="text/javascript" src="js/jquery-3.4.1.js"></script>
<script>
var arr = new Array ();
$(document).ready (function (){
    $("#b1").click (function () {
        arr.push ($("#t1").val ());
        str = "";
        for (i in arr) {
            str += arr[i];
            str += " , ";
        }
        $("#d1").empty ();
        $("#d1").html (str);
    });
    $("#b2").click (function (){
        delete arr[$("#t1").val ()];
        $("#d1").empty ();
        $("#d1").html (str);
    });
});
</script>
<input type="text" id="t1">
</br>
<input type="button" id="b1" value="add">
<input type="button" id="b2" value="del">
<div id="d1">
</div>
