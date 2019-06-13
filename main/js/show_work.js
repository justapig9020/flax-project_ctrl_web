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
    //alert ("in");
    var str = "";
    var len = works.length;
	var totalDay = daysMonth(my_month, my_year); // get total days of month
	var firstDay = dayStart(my_month, my_year); 
	var myclass;
	var i,o;
    var arr = new Array ();
    for( i=1; i<firstDay; i++){ 
		str += "<li></li>";
        arr[(i-1)%7] = new Array ();
        for (p=0; p<len; p++) {
            arr[(i-1)%7][p] = 1;
            if ((works[p].wstartm < my_month || 
                (works[p].wstaryd <= o+7 &&
                 works[p].wstartm == my_month )) &&
                (works[p].wstartm > my_month || 
                (works[p].wstaryd >= o &&
                 works[p].wstartm == my_month ))) {
                arr[(i-1)%7][p] = 1;
            } else {
                arr[(i-1)%7][p] = 0;
            }
        }
 
	}
	for( o=1; o<=totalDay; o++,i++){
        if ((i-1)%7 == 0) {
            for (wx=0; wx<len; wx++) {
                var sbuf = "";
                var ibuf = 0;
                for (wy=0; wy<7; wy++) {
                    ibuf += arr[wy][wx];
                    if (arr[wy][wx] == 1)
sbuf += "<li class='green greenbox'>"+works[wx].wname+"</li>";
                    else 
                        sbuf +="<li></li>"
                }
                if (ibuf != 0)
                    str += sbuf;
            }
            arr = new Array ();
        }
		if((o<my_day && my_year==my_date.getFullYear() 
            && my_month==my_date.getMonth()) 
            || my_year<my_date.getFullYear() 
            || ( my_year==my_date.getFullYear() 
            && my_month<my_date.getMonth())){ 
			myclass = " class='lightgrey'"; 
		}else if (o==my_day && my_year==my_date.getFullYear()
                    && my_month==my_date.getMonth()){
			myclass = " class='green greenbox'";
		}else{
			myclass = " class='darkgrey'"; 
		}
		str += "<li"+myclass+">"+o+"</li>";
        arr[(i-1)%7] = new Array ();
        for (p=0; p<len; p++) {
            arr[(i-1)%7][p] = 1;
            console.log ("startm: "+Number (works[p].wstartm));
            console.log ("mon: "+(my_month+1));
            console.log ("x:"+((i-1)%7)+",y:"+p);
            console.log ("o:" + o);
            console.log ("startd: "+works[p].wstartd);
            console.log ("endd: "+works[p].wendd);
            if ((Number (works[p].wstartm) < my_month+1 || 
                (Number (works[p].wstartd) <= o &&
                 Number (works[p].wstartm) == my_month+1 )) &&
                (Number (works[p].wendm) > my_month+1 || 
                (Number (works[p].wendd) >= o &&
                 Number (works[p].wendm) == my_month+1 ))) {
                arr[(i-1)%7][p] = 1;
            } else {
                arr[(i-1)%7][p] = 0;
            }
            console.log ("value: "+arr[(i-1)%7][p]); 
            console.log ("========================"); 
        }

	}
   for (wx=0; wx<len; wx++) {
                var sbuf = "";
                var ibuf = 0;
                for (wy=0; wy<7; wy++) {
                    ibuf += arr[wy][wx];
                    if (arr[wy][wx] == 1)
sbuf += "<li class='green greenbox'>"+works[wx].wname+"</li>";
                    else 
                        sbuf +="<li></li>"
                }
                if (ibuf != 0)
                    str += sbuf;
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
