
<script tpye="text/javascript" src="js/jquery-3.4.1.js"></script>
<script>
var arr = new Array ();
for (i=0; i<9; i++) {
    arr [i] = new Array ();
    for (o=0; o<9; o++) {
        arr[i][o] = (i+1)*(o+1);
    }
}
document.write ("gogo</br>");
document.write (typeof (arr)+ "</br>");
document.write (arr.length +  "</br>");
document.write (arr[0].lehgth + "</br>");
for (i=0; i<9; i++) {
    for (o=0; o<9; o++) {
        document.write (arr[i][o] + " ");
    }
    document.write ("</br>");
}
console.log (parseInt("06",10));
</script>
