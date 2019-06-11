<?php
/* Smarty version 3.1.34-dev-7, created on 2019-06-10 23:13:18
  from 'C:\flax-project_ctrl_web\main\data.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cfec7eef00f12_75902251',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a2704b5e31551290345993bd202548a9eeb4633' => 
    array (
      0 => 'C:\\flax-project_ctrl_web\\main\\data.html',
      1 => 1560200844,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfec7eef00f12_75902251 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="calendar">
  <div class="title">

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
      <ul id="days">
      </ul>
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
.ganhi{
height:5px;
}
.gan1{
    background:#9f0050; 
}
.gan2{
    background:#009100; 
}
.gan3{
    background:#0000c6; 
}
.gan4{
    background:#64a600; 
}
.gan5{
    background:#d94600; 
}
.gan6{
    background:#408080; 
}
</style>
<!--<?php echo '<script'; ?>
 src="js/jquery-3.4.1.js"><?php echo '</script'; ?>
>-->
<?php echo '<script'; ?>
>
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
            //获取某年某月第一天是星期几
function dayStart(month, year) {
	var tmpDate = new Date(year, month, 1);
	return (tmpDate.getDay());
}
            //计算某年是不是闰年，通过求年份除以4的余数即可
function daysMonth(month, year) {
	var tmp = year % 4;
	if (tmp == 0) {
		return (month_olympic[month]);
	} else {
		return (month_normal[month]);
	}
}

function aj (pid, wmon) {
    var ret;
    $.ajax ({
        url: "./get_modify.php",
        type: "POST",
        dataType: "json",
        data: {
            pid : pid,
            wmon : wmon 
        },
        error: function (xhr) {
            alert ('get modify error' + xhr);
        },
        success: function (respon) {
            ret = respon;
        } 
    });
    return ret;
}

function refreshDate() {
    var modis = aj (0, my_month+1);
    console.log (JSON.stringify (modis));    
    //document.write (modis);
    /*for (var row in modis) {
        i = "wname";
        modis[row]["color"] = "yellow";
        document.write (i + " ");
        document.write (modis[row][i] + "</br>");
        document.write (modis[row]["color"] + "</br>");
}*/
    var doing = new Array();
    var str = "";
	var totalDay = daysMonth(my_month, my_year); //获取该月总天数
	var firstDay = dayStart(my_month, my_year); //获取该月第一天是星期几
	var myclass;
    var o,i;
    for( o=1; o<firstDay; o++){ 
		str += "<li></li>"; //为起始日之前的日期创建空白节点
    }
    for(i=1; i<=totalDay; i++, o++){
        if (o%7 == 1) {
            var num=1;
            for (var row in doing) {
                for (var ii=i-7; ii<i; ii++){
                    if(ii<0)
                        break;
                    if ((ii <= modis[row]["wendd"] || my_month+1 != modis[row]["wendm"]) && ii >= modis[row]["wstartd"])
                        str += "<li class='gan"+num+" ganhi'></li>"; //创建日期节点
                    else 
                        str += "<li></li>"; //创建日期节点
                }
                num += 1;
            }
            //document.write (i);
            console.log (i);
            for (var row in modis) {
                console.log ("wstartd: "+modis[row]["wstartd"]);
                if (i <= modis[row]["wstartd"] && i+6 >= modis[row]["wstartd"]) {
                    console.log ("add: " +modis[row]["wname"]);
                    doing.push (modis[row]);
                }
            }
        }
		if((i<my_day && my_year==my_date.getFullYear() && my_month==my_date.getMonth()) || my_year<my_date.getFullYear() || ( my_year==my_date.getFullYear() && my_month<my_date.getMonth())){ 
			myclass = " class='lightgrey'"; //当该日期在今天之前时，以浅灰色字体显示
		}else if (i==my_day && my_year==my_date.getFullYear() && my_month==my_date.getMonth()){
			myclass = " class='green greenbox'"; //当天日期以绿色背景突出显示
		}else{
			myclass = " class='darkgrey'"; //当该日期在今天之后时，以深灰字体显示
		}
        str += "<li"+myclass+">"+i+"</li>"; //创建日期节点
    }
    var num=1;
    for (var row in doing) {
        for (var ii=i-7+(o-1)%7; ii<i; ii++){
            if(ii<0)
                break;
            if ((ii <= modis[row]["wendd"] || my_month+1 != modis[row]["wendm"]) && ii >= modis[row]["wstartd"])
                str += "<li class='gan"+num+" ganhi'></li>"; //创建日期节点
            else 
                str += "<li></li>"; //创建日期节点
        }
        num += 1;
    }
	holder.innerHTML = str; //设置日期显示
	ctitle.innerHTML = month_name[my_month]; //设置英文月份显示
	cyear.innerHTML = my_year; //设置年份显示
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
        <?php echo '</script'; ?>
>
    </div>
  </div>
</div>
<?php }
}
