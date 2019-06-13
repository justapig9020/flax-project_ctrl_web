var month_olympic = [31,29,31,30,31,30,31,31,30,31,30,31];
var month_normal = [31,28,31,30,31,30,31,31,30,31,30,31];
var month_name = ["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"];
var holder = document.getElementById("days");
var prev = document.getElementById("prev");
var next = document.getElementById("next");
var ctitle = document.getElementById("calendar-title");
var cyear = document.getElementById("calendar-year");
var my_date = new Date();
var my_year = my_date.getFullYear();
var my_month = my_date.getMonth();
var my_day = my_date.getDate();
// get first day of month
function dayStart(month, year) {
	var tmpDate = new Date(year, month, 1);
	return (tmpDate.getDay());
}

function daysMonth(month, year) {
	var tmp = year % 4;
	if (tmp == 0) {
		return (month_olympic[month]);
	} else {
		return (month_normal[month]);
	}
}
//export 
function refreshDate(works){
    for (work in works) {
        document.write ("name:" + work["wname"] + ", start_data: " + work["wstarty"] + "/" + work["wstartm"] + "/" + work["wstartd"]);
    }
    var str = "";
	var totalDay = daysMonth(my_month, my_year); // get total days of month
	var firstDay = dayStart(my_month, my_year); 
	var myclass;
	for(var i=1; i<firstDay; i++){ 
		str += "<li></li>"; 
	}
	for(var i=1; i<=totalDay; i++){
		if((i<my_day && my_year==my_date.getFullYear() 
            && my_month==my_date.getMonth()) 
            || my_year<my_date.getFullYear() 
            || ( my_year==my_date.getFullYear() 
            && my_month<my_date.getMonth())){ 
			myclass = " class='lightgrey'"; 
		}else if (i==my_day && my_year==my_date.getFullYear()
                    && my_month==my_date.getMonth()){
			myclass = " class='green greenbox'";
		}else{
			myclass = " class='darkgrey'"; 
		}
		str += "<li"+myclass+">"+i+"</li>"; 
	}
    $("#show_works_days").html (str);
    $("#gantt-month").html (month_name[my_month]);
    $("#gantt-year").html (my_year);
    //ctitle.innerHTML = month_name[my_month]; 
	//cyear.innerHTML = my_year; 
}

//refreshDate(); //执行该函数
/*prev.onclick = function(e){
	e.preventDefault();
	my_month--;
	if(my_month<0){
		my_year--;
		my_month = 11;
	}
	refreshDate();
}
next.onclick = function(e){
	e.preventDefault();
	my_month++;
	if(my_month>11){
		my_year++;
		my_month = 0;
	}
	refreshDate();
}*/
