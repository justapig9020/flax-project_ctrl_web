<div style="background-color:orange;">
    <h1 class="green" id="calendar-title">月份</h1>
    <h2 class="green small" id="calendar-year">年份</h2>
    <div style="border:2px black solid;padding:15px;">
        <a href="" id="prev">上個月</a>
        <a href="" id="next">下個月</a>
    </div>
        <div class="body">
            <div class="lightgrey body-list">
                <ul>
                    <li>一</li>
                    <li>二</li>
                    <li>三</li>
                    <li>四</li>
                    <li>五</li>
                    <li>六</li>
                    <li>日</li>
                </ul>
            </div>
            <div class="darkgrey body-list">
                <ul id="days"></ul>
<style>

.calendar{
	width:950px;
	height:750px;
	background:#fff;
	box-shadow:0px 1px 1px rgba(0,0,0,0.1);
}

.body-list ul{
	width:100%;
	font-family:arial;
	font-weight:bold;
	font-size:14px;
}

.body-list ul li{
	width:14.28%;
	height:36px;
	line-height:36px;
	list-style-type:none;
	display:block;
	box-sizing:border-box;
	float:left;
	text-align:center;
}
</style>
<style>

.lightgrey{
	color:#a8a8a8; /*浅灰色*/
}

.darkgrey{
	color:#565656; /*深灰色*/
}

.green{
	color:#050404; /*黑色*/
}

.greenbox{
	border:1px solid #6ac13c;
	background:#e9f8df; /*浅绿色背景*/
}

</style>
<script>
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
function refreshDate(){
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
	holder.innerHTML = str; 
	ctitle.innerHTML = month_name[my_month]; 
	cyear.innerHTML = my_year; 
}

refreshDate(); //执行该函数
            prev.onclick = function(e){
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
}
    </script>
</div>
