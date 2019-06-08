/*for (i=1; i<=9; i++) {
    for (j=1; j<=9; j++) {
        document.write (" | " + i + " * " + j + " = " + i*j + " | ");
    }
    document.write ("</br>");
}*/
document.write ("hey");
$.ajax({
    type: "GET",
    async: true,
    dataType: "html",
    url: "../model/test.php",
    data: {test : "jup"},
    success: function (test) {
        document.write ("hi");
    }
});
$("#sendout").click(function() {
     $("#input").val();
     alert("true : "+$("#input").val());        
    
     $.ajax({
        type :"GET",
        url  : "/testServlet/myServlet",
        data : { 
        	datafromtestFile : $("#input").val(),
        },
        dataType: "text",
        success : function(happy) {
			$("#output").html(happy);                    
		}
	})
});
