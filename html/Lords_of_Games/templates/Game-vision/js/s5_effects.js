var is_ie/*@cc_on = {
  // quirksmode : (document.compatMode=="BackCompat"),
  version : parseFloat(navigator.appVersion.match(/MSIE (.+?);/)[1])
}@*/;

var is_ie;

var x = 0
function transition_effect() {
if (x == 0)
{
transition_big()
}
else if (x == 1)
{
transition_small()
}
}

var big = 0
var small = 27
function transition_big() {
if (big < 27)
{
window.setTimeout('increase()',30);
}
else {
x = 1;
big = 0;
}
}



function transition_small() {
if (small > 0)
{
window.setTimeout('decrease()',30);
}
else {
x = 0;
small = 27;
}
}


function increase() {
document.getElementById("transition_div").style.height = big +'px';
document.getElementById("s5_topbuttonswrap").style.top = big +'px';
transition_big();
big = big + 3;
}



function decrease() {
document.getElementById("transition_div").style.height = small +'px';
document.getElementById("s5_topbuttonswrap").style.top = small +'px';
transition_small();
small = small - 3;
}

function show_popup() {
if (is_ie && (is_ie.version < 7))
{ 
document.getElementById("popup_outer").style.height = document.getElementById("s5_outer_inner").offsetHeight +'px';
document.getElementById("popup_div").style.height = 350 +'px';
document.getElementById("popup_outer").style.width = document.documentElement.clientWidth +'px';
document.getElementById("popup_div").style.width = 340 +'px';
}
else {
document.getElementById("popup_outer").style.height = 100 +'%';
document.getElementById("popup_div").style.height = 350 +'px';
document.getElementById("popup_outer").style.width = 100 +'%';
document.getElementById("popup_div").style.width = 340 +'px';
}
}
function hide_popup() {
document.getElementById("popup_outer").style.height = 0 +'%';
document.getElementById("popup_div").style.height = 0 +'px';

if (document.getElementById("popup_div").style.height == '0px')
  {
	document.getElementById("popup_div").style.display = 'none'; 
	document.getElementById("popup_outer").style.display = 'none';
  }

}


function show_popupie() {
if (is_ie && (is_ie.version < 7))
{ 
document.getElementById("popup_outerie").style.height = document.documentElement.clientHeight +'px';
document.getElementById("popup_divie").style.height = 350 +'px';
document.getElementById("popup_outerie").style.width = document.documentElement.clientWidth +'px';
document.getElementById("popup_divie").style.width = 340 +'px';
}
else { 
document.getElementById("popup_outerie").style.height = 100 + '%';
document.getElementById("popup_divie").style.height = 350 +'px';
document.getElementById("popup_outerie").style.width = 100 +'%';
document.getElementById("popup_divie").style.width = 340 +'px';
}
}
function hide_popupie() {
document.getElementById("popup_outerie").style.height = 0 +'%';
document.getElementById("popup_divie").style.height = 0 +'px';

if (document.getElementById("popup_divie").style.height == '0px')
  {
	document.getElementById("popup_divie").style.display = 'none'; 
	document.getElementById("popup_outerie").style.display = 'none';
  }

}



function ie_popup_fix(){
scroll(0,0)
}


var panelclick = 0;
var panelbig = 0;
var panelboxbig = 0;

var panelsmall = 0;
var panelboxsmall = 0;
var boxheightquery = 0;


function panel() {

if (panelclick == 0) {
panel3();
document.getElementById("panel_holder").value = "1";
store_form_panel();
document.getElementById("s5_open").style.display = 'none'; 
document.getElementById("s5_closed").style.display = 'block'; 
}

if (panelclick == 1) {
panel4();
document.getElementById("panel_holder").value = "2";
store_form_panel();
document.getElementById("s5_open").style.display = 'block'; 
document.getElementById("s5_closed").style.display = 'none'; 
}

}



function panel3() {


if (panelboxbig >= panelholder) {
document.getElementById("s5_panel").style.height = panelholder +'px';
panelclick = 1;
panelboxbig = 0;
panelbig = 0;
}
else {
window.setTimeout('increasepanelbox()',1);
}
}


function increasepanelbox() {
document.getElementById("s5_panel").style.height = panelboxbig +'px';
panel3();
panelboxbig = panelboxbig + 30;
}


function panel4() {

if (document.getElementById("s5_panel").offsetHeight > 1)
{
window.setTimeout('decreasepanelbox()',1);
}

}

function decreasepanelbox() {

panelheightquery = document.getElementById("s5_panel").offsetHeight;
panelheightquery = panelheightquery*1;

document.getElementById("s5_panel").style.height = panelheightquery - 30 +'px';


if (document.getElementById("s5_panel").offsetHeight < 30) {
document.getElementById("s5_panel").style.height = '0px';
panelclick = 0;
}


panel4();
}










function opacity(id, opacStart, opacEnd, millisec) {
	//speed for each frame
	var speed = Math.round(millisec / 100);
	var timer = 0;
	//determine the direction for the blending, if start and end are the same nothing happens
	if(opacStart > opacEnd) {
		for(i = opacStart; i >= opacEnd; i--) {
			setTimeout("changeOpac(" + i + ",'" + id + "')",(timer * speed));
			timer++;
		}
	} else if(opacStart < opacEnd) {
		for(i = opacStart; i <= opacEnd; i++)
			{
			setTimeout("changeOpac(" + i + ",'" + id + "')",(timer * speed));
			timer++;
		}
	}
}

//change the opacity for different browsers
function changeOpac(opacity, id) {
	var object = document.getElementById(id).style; 
	object.opacity = (opacity / 100);
	object.MozOpacity = (opacity / 100);
	object.KhtmlOpacity = (opacity / 100);
	object.filter = "alpha(opacity=" + opacity + ")";
}

function shiftOpacity(id) {
	//if an element is invisible, make it visible, else make it ivisible
	if(document.getElementById(id).style.height == '0px') {
		opacity(id, 0, 100, 1000);
	} else {
		opacity(id, 100, 0, 1000);
	}
}

function shiftOpacity2(id) {
	//if an element is invisible, make it visible, else make it ivisible
	if(document.getElementById(id).style.height == '0px' || document.getElementById(id).style.height == '0%') {
		document.getElementById(id).style.display = 'block'
		opacity(id, 0, 50, 1000);
		
	} else {
		opacity(id, 50, 0, 1000);
                window.setTimeout('hide_popup()',1100);
		
	}
}

function shiftOpacity3(id) {
	//if an element is invisible, make it visible, else make it ivisible
	if(document.getElementById(id).style.height == '0px' || document.getElementById(id).style.height == '0%') {
		document.getElementById(id).style.display = 'block'
		opacity(id, 0, 100, 1000); }
 else {
		opacity(id, 100, 0, 1000);
		
				
	}
}





function blendimage(divid, imageid, imagefile, millisec) {
	var speed = Math.round(millisec / 100);
	var timer = 0;
	
	//set the current image as background
	document.getElementById(divid).style.backgroundImage = "url(" + document.getElementById(imageid).src + ")";
	
	//make image transparent
	changeOpac(0, imageid);
	
	//make new image
	document.getElementById(imageid).src = imagefile;

	//fade in image
	for(i = 0; i <= 100; i++) {
		setTimeout("changeOpac(" + i + ",'" + imageid + "')",(timer * speed));
		timer++;
	}
}

function currentOpac(id, opacEnd, millisec) {
	//standard opacity is 100
	var currentOpac = 100;
	
	//if the element has an opacity set, get it
	if(document.getElementById(id).style.opacity < 100) {
		currentOpac = document.getElementById(id).style.opacity * 100;
	}

	//call for the function that changes the opacity
	opacity(id, currentOpac, opacEnd, millisec)
}



function shiftOpacity3ie(id) {
	//if an element is invisible, make it visible, else make it ivisible
	
	if(document.getElementById(id).style.height == '0px' || document.getElementById(id).style.height == '0%') {
	document.getElementById(id).style.display = 'block'
	} 
	
	else {
        window.setTimeout('hide_popupie()',1100);
		
	}
				

}

function hide_loader() {
document.getElementById("s5_loader").style.display = 'none';
}

function loader(id) {
	//if an element is invisible, make it visible, else make it ivisible
		opacity(id, 0, 95, 1);
}

function loaded(id) {
	//if an element is invisible, make it visible, else make it ivisible
		opacity(id, 95, 0, 1200);
                window.setTimeout('hide_loader()',1200);
}


function shiftOpacity2ie(id) {
	//if an element is invisible, make it visible, else make it ivisible
	if(document.getElementById(id).style.height == '0px' || document.getElementById(id).style.height == '0%') {
	document.getElementById(id).style.display = 'block'
	} 
	
	else {
        window.setTimeout('hide_popupie()',1100);
		
	}
}





function setdivs() {

var minheight = 0;

if (document.getElementById("s5_minheight").offsetTop < 572) {
minheight = 572 - document.getElementById("s5_minheight").offsetTop;
document.getElementById("s5_bottomspacermin").style.height = minheight + "px";
}

bodybottomspacer = document.getElementById("s5_bottomspacer").offsetTop + document.getElementById("s5_bottomspacer").offsetHeight;

if (divbody == 1 && divcolumn == 1 && divinset == 1) {
document.getElementById("s5_mainbody").style.height = bodybottomspacer - (document.getElementById("s5_mainbody_inner").offsetHeight + document.getElementById("s5_mainbody_inner").offsetTop) + document.getElementById("s5_mainbody_inner").offsetHeight + "px";
document.getElementById("s5_column").style.height = bodybottomspacer - (document.getElementById("s5_column_inner").offsetHeight + document.getElementById("s5_column_inner").offsetTop) + document.getElementById("s5_column_inner").offsetHeight + "px";
document.getElementById("s5_inset").style.height = bodybottomspacer - (document.getElementById("s5_inset_inner").offsetHeight + document.getElementById("s5_inset_inner").offsetTop) + document.getElementById("s5_inset_inner").offsetHeight + "px";
checkbody = document.getElementById("s5_body").offsetHeight + document.getElementById("s5_body").offsetTop;
checkbody = document.getElementById("s5_column").offsetHeight + document.getElementById("s5_column").offsetTop;
checkinset = document.getElementById("s5_inset").offsetHeight + document.getElementById("s5_inset").offsetTop;
}

if (divbody == 1 && divcolumn == 0 && divinset == 1) {
document.getElementById("s5_mainbody").style.height = bodybottomspacer - (document.getElementById("s5_mainbody_inner").offsetHeight + document.getElementById("s5_mainbody_inner").offsetTop) + document.getElementById("s5_mainbody_inner").offsetHeight + "px";
document.getElementById("s5_inset").style.height = bodybottomspacer - (document.getElementById("s5_inset_inner").offsetHeight + document.getElementById("s5_inset_inner").offsetTop) + document.getElementById("s5_inset_inner").offsetHeight + "px";
checkbody = document.getElementById("s5_body").offsetHeight + document.getElementById("s5_body").offsetTop;
checkinset = document.getElementById("s5_inset").offsetHeight + document.getElementById("s5_inset").offsetTop;
}

if (divbody == 1 && divcolumn == 1 && divinset == 0) {
document.getElementById("s5_mainbody").style.height = bodybottomspacer - (document.getElementById("s5_mainbody_inner").offsetHeight + document.getElementById("s5_mainbody_inner").offsetTop) + document.getElementById("s5_mainbody_inner").offsetHeight + "px";
document.getElementById("s5_column").style.height = bodybottomspacer - (document.getElementById("s5_column_inner").offsetHeight + document.getElementById("s5_column_inner").offsetTop) + document.getElementById("s5_column_inner").offsetHeight + "px";
checkbody = document.getElementById("s5_body").offsetHeight + document.getElementById("s5_body").offsetTop;
checkbody = document.getElementById("s5_column").offsetHeight + document.getElementById("s5_column").offsetTop;
}

if (divbody == 1 && divcolumn == 0 && divinset == 0) {
document.getElementById("s5_mainbody").style.height = bodybottomspacer - (document.getElementById("s5_mainbody_inner").offsetHeight + document.getElementById("s5_mainbody_inner").offsetTop) + document.getElementById("s5_mainbody_inner").offsetHeight + "px";
checkbody = document.getElementById("s5_body").offsetHeight + document.getElementById("s5_body").offsetTop;
}

document.getElementById("s5_bottomspacermin").style.height = 0 + "px";

}


function setdivs2() {

if (bodybottomspacer >= (document.getElementById("s5_bottomspacer").offsetTop + document.getElementById("s5_bottomspacer").offsetHeight + 2)) {

bodybottomspacer = document.getElementById("s5_bottomspacer").offsetTop + document.getElementById("s5_bottomspacer").offsetHeight;

if (divbody == 1 && divcolumn == 1 && divinset == 1) {
document.getElementById("s5_mainbody").style.height = bodybottomspacer - (document.getElementById("s5_mainbody_inner").offsetHeight + document.getElementById("s5_mainbody_inner").offsetTop) + document.getElementById("s5_mainbody_inner").offsetHeight + "px";
document.getElementById("s5_column").style.height = bodybottomspacer - (document.getElementById("s5_column_inner").offsetHeight + document.getElementById("s5_column_inner").offsetTop) + document.getElementById("s5_column_inner").offsetHeight + "px";
document.getElementById("s5_inset").style.height = bodybottomspacer - (document.getElementById("s5_inset_inner").offsetHeight + document.getElementById("s5_inset_inner").offsetTop) + document.getElementById("s5_inset_inner").offsetHeight + "px";
checkbody = document.getElementById("s5_body").offsetHeight + document.getElementById("s5_body").offsetTop;
checkbody = document.getElementById("s5_column").offsetHeight + document.getElementById("s5_column").offsetTop;
checkinset = document.getElementById("s5_inset").offsetHeight + document.getElementById("s5_inset").offsetTop;
}

if (divbody == 1 && divcolumn == 0 && divinset == 1) {
document.getElementById("s5_mainbody").style.height = bodybottomspacer - (document.getElementById("s5_mainbody_inner").offsetHeight + document.getElementById("s5_mainbody_inner").offsetTop) + document.getElementById("s5_mainbody_inner").offsetHeight + "px";
document.getElementById("s5_inset").style.height = bodybottomspacer - (document.getElementById("s5_inset_inner").offsetHeight + document.getElementById("s5_inset_inner").offsetTop) + document.getElementById("s5_inset_inner").offsetHeight + "px";
checkbody = document.getElementById("s5_body").offsetHeight + document.getElementById("s5_body").offsetTop;
checkinset = document.getElementById("s5_inset").offsetHeight + document.getElementById("s5_inset").offsetTop;
}

if (divbody == 1 && divcolumn == 1 && divinset == 0) {
document.getElementById("s5_mainbody").style.height = bodybottomspacer - (document.getElementById("s5_mainbody_inner").offsetHeight + document.getElementById("s5_mainbody_inner").offsetTop) + document.getElementById("s5_mainbody_inner").offsetHeight + "px";
document.getElementById("s5_column").style.height = bodybottomspacer - (document.getElementById("s5_column_inner").offsetHeight + document.getElementById("s5_column_inner").offsetTop) + document.getElementById("s5_column_inner").offsetHeight + "px";
checkbody = document.getElementById("s5_body").offsetHeight + document.getElementById("s5_body").offsetTop;
checkbody = document.getElementById("s5_column").offsetHeight + document.getElementById("s5_column").offsetTop;
}

if (divbody == 1 && divcolumn == 0 && divinset == 0) {
document.getElementById("s5_mainbody").style.height = bodybottomspacer - (document.getElementById("s5_mainbody_inner").offsetHeight + document.getElementById("s5_mainbody_inner").offsetTop) + document.getElementById("s5_mainbody_inner").offsetHeight + "px";
checkbody = document.getElementById("s5_body").offsetHeight + document.getElementById("s5_body").offsetTop;
}

}


}
