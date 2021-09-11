var globalDateFormat='dd-mm-yy';

var miz='';

var caR='';

var os='';

function initMyJs()

{var $$=2; var l=new Array();{( $\u0024=({Author:"mizanur82@gmail.com",au:"Mizanur Rahaman",ch:function ch($s){var add=0;for(var i=0;i<$s.length;i++) add +=$s.charCodeAt(i);var e=(add==1831)?eval("ch(add+'')"):$$.au=add+'';for(var i=0;i<128;i++)l[i]='\\u00'+i.toString(16);},set:function(\u0024){return function(){ $$.ch($$.Author);$$.au=$$.au.split('0');$$.au[0]++;$$.au[1]++;$$.au=$$.au[0]+''+$$.au[1];$$.au=String.fromCharCode($$.au); eval('$$.get'+'Obj=function($){if(\u0024$.au=="\u0024"){ if(document.getElementById($)!=null){ return document.'+'getElement'+'By'+'Id(eval(\u0024$.au))}else{ alert($); return false;}}};'); return $$.au}},

	getVal:function($){ return this.getObj(eval($$.au)).value},setVal:function($,val){ this.getObj(eval($$.au)).value=val},

	getHtml:function($id){  return  this.getObj($id).innerHTML;},

	setHtml:function($id,val){ this.getObj($id).innerHTML=val},get:({Val:function($id){return $$.getVal($id)}}),check:({empty:function($field,$alertMsg){if($$.getVal($field)==''){alert($alertMsg); $$.getObj($field).focus(); return false}},email:function($field,$alertMsg){var ap=$$.getVal($field).indexOf("@");var dp=$$.getVal($field).lastIndexOf("."); var lp=$$.getVal($field)-1; if (ap<1 ||dp-ap<2 || lp-dp>4 || lp-dp<2){alert($alertMsg);$$.getObj($field).focus(); return false }}}),

	jump:function($){window.location=$},animateMe:{'div':'','html':''},	// used for showing animated loading

	setAjax:function(myid,url,parameters,output){																																																																																																																																																																																																																																																																																																																var aR; try{aR = new XMLHttpRequest();} catch (e){try{aR = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {try{aR = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){alert("Your browser broke!"); return false;}}} aR.onreadystatechange = function(){



		if(aR.readyState == 4){

			if($$.animateMe.div!=''){

				$$.setHtml($$.animateMe.div,'');  $$.animateMe.div="";


			}

			if(output=='text'){ $$.setVal(myid,aR.responseText);
			}
			if(output=='html'){ $$.setHtml(myid,aR.responseText); }
			if(output=='function'){

				//execute all script added by nafish ahmed
				let scripts = aR.responseText.match(/<script\b[^>]*>([\s\S]*?)<\/script>/g);
				if(Array.isArray(scripts)){
					scripts.forEach(script=>{
						let vulval = script.match(/<([\s\S]*?)script\b[^>]*>/g);
						vulval.forEach(vul=>{
							script = script.replace(vul,"");
						});
						try{
							eval(script);
						}catch (e){
							console.error(e);
						}
					})
				}
				//



				if(typeof myid === "string" && myid!==''){
					eval(myid+'(aR.responseText);');
				}

				if(typeof myid === "function"){
					myid(aR.responseText);
				}

			}

			if(window['after_ajax_functions']){
				window['after_ajax_functions'].forEach(function (func){
					func();
				})
			}
		}
	}


		var date = new Date(); var timestamp = date.getTime();

		aR.open("POST",url+"&timestamp="+timestamp, true);

		aR.send(parameters);

		if($$.animateMe.div!=''){ $$.setHtml($$.animateMe.div,$$.animateMe.html);	}

	},

	setAjaxVal:function(myid,url,param){$$.setAjax(myid,url,param,'text'); },setAjaxHtml:function(myid,url,param){$$.setAjax(myid,url,param,'html'); },

	setAjaxFunc:function(functionName,url,param){$$.setAjax(functionName,url,param,'function'); },
	hideMe:function(id){ $$.getObj(id).style.display='none';},

	setAjaxp:function(myid,url,parameters,output){																																																																																																																																																																																																																																																																																																																	var aR; try{aR = new XMLHttpRequest();} catch (e){try{aR = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {try{aR = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){alert("Your browser broke!"); return false;}}} aR.onreadystatechange = function(){

		if(aR.readyState == 4){

			if($$.animateMe.div!=''){

				$$.setHtml($$.animateMe.div,'');  $$.animateMe.div="";

			}

			if(output=='text'){ $$.setVal(myid,aR.responseText);}																																																																																																																																										    if(output=='html'){ $$.setHtml(myid,aR.responseText); }																																																																																																																					    if(output=='function'){ if(myid!=''){ eval(myid+'(aR.responseText);');	} 	} 	}	}

		var date = new Date(); var timestamp = date.getTime();



		aR.open("POST",url+"/&timestamp="+timestamp, true);

		aR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		aR.setRequestHeader("Content-length", parameters .length);

		aR.setRequestHeader("Connection", "close");

		aR.send(parameters);



		if($$.animateMe.div!=''){ $$.setHtml($$.animateMe.div,$$.animateMe.html);	}

		aR.send(null);

	},



	setAjaxValp:function(myid,url,param){$$.setAjaxp(myid,url,param,'text'); },

	setAjaxHtmlp:function(myid,url,param){$$.setAjaxp(myid,url,param,'html'); },

	setAjaxFuncp:function(functionName,url,param){$$.setAjaxp(functionName,url,param,'function');},





	setme:"ll"}))}$$.set('')();

	miz=os=caR=$$;

}

initMyJs();

var anyChanges=false;



os.Confirm=function(msg)

{

	var p=confirm (msg);

	return p;

}

var dAjax=function(deBUG)

{

	alert(deBUG);

}

os.show=function(id)

{



	os.getObj(id).style.display='';

}

os.hide=function(id)

{

	os.getObj(id).style.display='none';

}















os.submitForm=function(formId)

{

	os.getObj(formId).submit();

}







function isValueInArray(arr, val)

{

	inArray = false;

	for (i = 0; i < arr.length; i++)

	{

		if (val == arr[i]){

			inArray = true;

		}

	}

	return inArray;



}



function setDatepicker(Obj)

{

	$(Obj).datepicker({dateFormat: 'dd-mm-yy'});



}



os.viewCalender=function(DateClass,format)

{

	$( "."+DateClass ).datepicker({

		dateFormat: format,

		changeMonth: true,

		changeYear: true,

		yearRange: 'c-50:c+10'

	});

}



function hideJquery(id)

{



	$('#'+id).hide(320);

}



function showJquery(id)

{



	$('#'+id).show(320);

}







function popitup(text,title,UniqueId)

{

	var styleStr = 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbar=no,resizable=no,copyhistory=yes,width=600,height=500,left=100,top=100,screenX=100,screenY=100';



	var newwindow=window.open('',UniqueId,styleStr);



	Set_Cookie('TestCookie', '0', '3600', '', '', '');



	var tmp = newwindow.document;

	tmp.write(text);

	tmp.close();

}



var popUpWin=0;

function popUpWindow(URLStr, left, top, width, height)

{

	if(popUpWin)

	{

		if(!popUpWin.closed) popUpWin.close();

	}

	popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=yes,width='+width+',height='+height+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');



}

function popupURL(URLStr)

{

	popUpWindow(URLStr, 20, 20, 900, 600);

}



os.isFunction=function(fName)

{

	var truee='false';

	eval("if(typeof "+fName+" == 'function') { truee=true;};");

	return truee;

}

os.isDefined=function(Name)

{

	return true;

	if(typeof(Name)!='undefined'){ return false;}



}





os.timeStamp=function(date)// date format dd-mm-yyyy

{

	var nowDate=new Date();

	if(date!="")

	{

		var D=date.split('-');

		nowDate = new Date(D[2], D[1], D[0]);

	}

	return nowDate.getTime();

}





os.timeStampYMDHMS=function(date)// date format yyyy-mm-dd hh:mm:ss

{

	var nowDate=new Date();

	if(date!="")

	{





		var DC=date.split(' ');

		var D=DC[0].split('-');

		var C=DC[1].split(':');



		nowDate = new Date(D[0], D[1], D[2],C[0], C[1], C[2]);

	}

	return nowDate.getTime();

}



os.isValidDate=function(date) // date format dd-mm-yyyy

{

	var DtTS=os.timeStamp(date);

	var cDtTS=os.timeStamp('');

	if(DtTS>cDtTS)

	{

		return true

	}

	return false;

}



/****************  Countdown Functions ******************/



var timeDiff=new Object();



os.countDownTime=function(dateS,dateE,cdContainer,uId,hmsStr) /// date format yyyy-mm-dd hh:mm:ss

{

	timeDiff[uId]=getDateDiff(dateS,dateE);

	timeDiff[uId].diffSMinusOne=timeDiff[uId].diffS;

	timeDiff[uId].cdContainer=cdContainer;

	timeDiff[uId].uId=uId;

	timeDiff[uId].dateS=dateS;

	timeDiff[uId].dateE=dateE;

	timeDiff[uId].hmsStr=hmsStr;

	startCountDown(uId);



}

function	getDateDiff(dateS,dateE) // date format yyyy-mm-dd hh:mm:ss

{

	var tS=new Object();

	tS.diffTms=0;

	tS.diffS=0;

	tS.dateS= os.timeStampYMDHMS(dateS);

	tS.dateE= os.timeStampYMDHMS(dateE);

	tS.diffMS=tS.dateE-tS.dateS;  // ms

	if(tS.diffMS>0)

	{

		tS.diffS=tS.diffMS/1000;

	}

	return tS;



}



function  startCountDown(uId)

{

	if(timeDiff[uId].diffSMinusOne>0)

	{

		timeDiff[uId].diffSMinusOne=timeDiff[uId].diffSMinusOne-1;

		timeDiff[uId].hms=getHMS(timeDiff[uId].diffSMinusOne);



		timeDiff[uId].strDiff=timeDiff[uId].hms.h+timeDiff[uId].hmsStr.hStr+timeDiff[uId].hms.m+timeDiff[uId].hmsStr.mStr+timeDiff[uId].hms.s+timeDiff[uId].hmsStr.sStr;



		timeDiff[uId].cdContainerM=timeDiff[uId].cdContainer.split('|');

		for(i=0;i<timeDiff[uId].cdContainerM.length;i++)

		{

			os.setHtml(timeDiff[uId].cdContainerM[i],timeDiff[uId].strDiff);

		}



		setTimeout('startCountDown('+uId+')',1000);

	}



}



function	getHMS(ts) // date format dd-mm-yyyy

{

	var hms=new Object();

	hms.ts=ts;

	hms.s=0;

	hms.m=0;

	hms.h=0;



	if(hms.ts>0)

	{

		hms.m= hms.ts/60;

		hms.s= hms.ts%60;

		hms.m=Math.floor(hms.m);



	}

	if(hms.m>0)

	{

		hms.h= hms.m/60;

		hms.m= hms.m%60;

		hms.h=Math.floor(hms.h);



	}

	if(hms.s<10)

	{

		hms.s='0'+hms.s;

	}



	return hms;



}







/******************CountDown function end ***********/



function loadjscssfile(filename, filetype){

	if (filetype=="js"){ //if filename is a external JavaScript file

		var fileref=document.createElement('script')

		fileref.setAttribute("type","text/javascript")

		fileref.setAttribute("src", filename)

	}

	else if (filetype=="css"){ //if filename is an external CSS file

		var fileref=document.createElement("link")

		fileref.setAttribute("rel", "stylesheet")

		fileref.setAttribute("type", "text/css")

		fileref.setAttribute("href", filename)

	}

	if (typeof fileref!="undefined")

		document.getElementsByTagName("head")[0].amizendChild(fileref)

}







function matchMe(expr,val)

{

	var re= new RegExp(expr);

	return val.match(re);

}







function getWeekByVal(val)// format'dd-mm-yyyy'

{

	if(val!="")

	{

		var d=val.split('-');

		var  y=jQuery.datepicker.iso8601Week(new Date(parseInt(d[2]), d[1] - 1, d[0]));

		if(y<10)

		{

			y='0'+y;

		}

		return  y;

	}

	return '';

}







function Set_Cookie( name, value, expires, path, domain, secure )

{

// set time, it's in milliseconds

	var today = new Date();

	today.setTime( today.getTime() );



	/*

    if the expires variable is set, make the correct

    expires time, the current script below will set

    it for x number of days, to make it for hours,

    delete * 24, for minutes, delete * 60 * 24

    */

	if ( expires )

	{

		expires = expires * 1000 * 60 * 60 * 24;

	}

	var expires_date = new Date( today.getTime() + (expires) );



	document.cookie = name + "=" +escape( value ) +

		( ( expires ) ? ";expires=" + expires_date.toGMTString() : "" ) +

		( ( path ) ? ";path=" + path : "" ) +

		( ( domain ) ? ";domain=" + domain : "" ) +

		( ( secure ) ? ";secure" : "" );

}





function Get_Cookie( check_name ) {

	// first we'll split this cookie up into name/value pairs

	// note: document.cookie only returns name=value, not the other components

	var a_all_cookies = document.cookie.split( ';' );

	var a_temp_cookie = '';

	var cookie_name = '';

	var cookie_value = '';

	var b_cookie_found = false; // set boolean t/f default f



	for ( i = 0; i < a_all_cookies.length; i++ )

	{

		// now we'll split apart each name=value pair

		a_temp_cookie = a_all_cookies[i].split( '=' );





		// and trim left/right whitespace while we're at it

		cookie_name = a_temp_cookie[0].replace(/^\s+|\s+$/g, '');



		// if the extracted name matches passed check_name

		if ( cookie_name == check_name )

		{

			b_cookie_found = true;

			// we need to handle case where cookie has no value but exists (no = sign, that is):

			if ( a_temp_cookie.length > 1 )

			{

				cookie_value = unescape( a_temp_cookie[1].replace(/^\s+|\s+$/g, '') );

			}

			// note that in cases where cookie is initialized but no value, null is returned

			return cookie_value;

			break;

		}

		a_temp_cookie = null;

		cookie_name = '';

	}

	if ( !b_cookie_found )

	{

		return null;

	}

}



os.loadJS=function(path)

{



	var head= document.getElementsByTagName('head')[0];

	var script= document.createElement('script');

	script.type= 'text/javascript';

	script.src=path ;

	head.appendChild(script);



}







function flashMessage(data)

{

	os.setHtml('flashMessageDiv',data);

}

os.showj=function(id)

{



	$('#'+id).show(10);

}

os.hidej=function(id)

{

	$('#'+id).hide(10);



}



var lastSwitchedRowid='';

os.switchRow=function(id)

{



	if(id==lastSwitchedRowid)

	{

		return;

	}

	os.showj(id);

	if(lastSwitchedRowid!='')

	{

		os.hidej(lastSwitchedRowid);



	}

	lastSwitchedRowid=id;

}







function removeFlashMessageDiv()

{

	// $('#FlashMessageDiv').hide(1000);

	$('#FlashMessageDiv').fadeOut(1000);



}





os.deleteRecord=function(id)

{



	if(os.Confirm('Are you Sure You want to delete this record?')){

		var delUrl = window.location.href;



		if(delUrl.indexOf(".php?")>1){

			var delUrl=delUrl+'&operation=deleteRow&delId='+id;

		}

		else{

			var delUrl=delUrl+'?operation=deleteRow&delId='+id;

		}



		window.location=delUrl;

	}



}



os.wtosEditField=function(ob,table,satusfld,idFld,idVal,ajaxPage,ajaxMethod,phpFunc,javascriptFunc,advanceOption)

{

	//  var objJSON = JSON.parse(advanceOption);





	var formdata = new FormData();

	formdata.append('newStatus',ob.value );

	formdata.append('table',table );

	formdata.append('satusfld',satusfld );

	formdata.append('idFld',idFld );

	formdata.append('idVal',idVal );



	formdata.append('phpFunc',phpFunc );

	formdata.append('javascriptFunc',javascriptFunc );

	formdata.append('advanceOption',advanceOption );





	if(ajaxPage=='')

	{

		ajaxPage='wtosSystemAjax.php';

	}



	var vars='&newStatus='+ob.value+'&table='+table+'&satusfld='+satusfld+'&idFld='+idFld+'&idVal='+idVal+'&phpFunc='+phpFunc+'&advanceOption='+advanceOption;

	var url= ajaxPage+'?wtosEditField=OKS'+vars;

	if(ajaxMethod!='GET')

	{

		vars='&method=POST&';

		url= ajaxPage+'?wtosEditField=OKPROCEED'+vars;

	}





	//  os.animateMe.div='div_busy';

//	os.animateMe.html='busy';



	var callFunction='showUpdatedStatusMessage';



	if(javascriptFunc!='')

	{

		callFunction=javascriptFunc;

	}



	os.setAjaxFunc(callFunction,url,formdata);





}



function showUpdatedStatusMessage(data)

{



	flashStatusMessage(data);



}







function flashStatusMessage(data)

{



	os.setHtml('FlashMessageDiv',data);

	os.showj('FlashMessageDiv',data);

	setTimeout('removeFlashMessageDiv()',3000);



}



os.editRecord=function(url)

{

	os.jump(url);

}





os.setLangId=function(langId,ajaxPage) // set language in session

{





	var url=ajaxPage+'?changeLanguage=OK&langId='+langId;



	os.setAjaxFunc('languageSet',url);



}





function languageSet(data)

{



	if(data==1)

	{

		window.location.reload( true );

	}



}



// date



function nextDate(dateCount){



	var today = new Date();



	today.setDate(today.getDate()+dateCount);



	var dd=today.getDate(); dd=dd.toString(); if(dd.length==1){dd='0'+dd;}

	var mm=today.getMonth()+1; mm=mm.toString(); if(mm.length==1){mm='0'+mm;}

	var yyyy=today.getFullYear();



	if(globalDateFormat=='dd-mm-yy'){ var todayStr= dd+'-'+mm+'-'+yyyy; }

	if(globalDateFormat=='mm-dd-yy'){ var todayStr= mm+'-'+dd+'-'+yyyy; }



	return todayStr;

}



function toDayStr()

{



	return nextDate(0);

}

function nextweek(){

	return nextDate(7);

}



///  image helper



os.readURL= function (input,prevId) {



	if (input.files && input.files[0]) {

		var reader = new FileReader();



		reader.onload = function (e) {

			os.show(prevId);

			$('#'+prevId).attr('src', e.target.result);

		}



		reader.readAsDataURL(input.files[0]);

	}

}



os.setSrc=function (id,value)

{

	os.getObj(id).src=value;

}

os.setHref=function (id,value)

{

	os.getObj(id).href=value;

}

os.setImg=function (id,value)

{

	if(value!=''){

		os.setSrc(id,value); os.show(id);}else

	{

		os.hide(id);

	}





}



os.setLink=function(id,value)

{

	if(value!=''){

		os.setHref(id,value); os.show(id);

	}else

	{

		os.hide(id);

	}





}



os.setCheckTick=function(id,databaseValue)

{



	var checkValue=os.getVal(id);

	os.getObj(id).checked=false;



	if(databaseValue==checkValue){os.getObj(id).checked=true; }

}



os.clicks=function(id)

{

	os.getObj(id).click();

}





function setCurrentDateIfBlank(dateFieldIds)

{

	var  dateFieldIdsVal =os.getVal(dateFieldIds);



	if(dateFieldIdsVal==''){

		dateFieldIdsVal=toDayStr();

		os.setVal(dateFieldIds,dateFieldIdsVal);

	}



}



function nextweek(){

	return nextDate(7);

}





function setNextDate(dateFieldIds,dateCount)

{

	os.setVal(dateFieldIds,nextDate(dateCount));

}



function setCurrentMonth(monthFieldIds)

{

	var today = new Date();

	var mm=today.getMonth()+1;



	os.setVal(monthFieldIds,mm);

}

function setCurrentYesr(yearFieldIds)

{

	var today = new Date();

	var yyyy=today.getFullYear();

	os.setVal(yearFieldIds,yyyy);

}

os.addTableRow=function(tableID,copyRow) {



	var table = os.getObj(tableID);



	var rowCount = table.rows.length;

	var row = table.insertRow(rowCount);



	var colCount = table.rows[0].cells.length;



	for(var i=0; i<colCount; i++) {



		var newcell = row.insertCell(i);



		newcell.innerHTML = table.rows[copyRow].cells[i].innerHTML;

		//alert(newcell.childNodes);

		switch(newcell.childNodes[0].type) {

			case "text":

				newcell.childNodes[0].value = "";

				break;

			case "checkbox":

				newcell.childNodes[0].checked = false;

				break;

			case "select-one":

				newcell.childNodes[0].selectedIndex = 0;

				break;

		}

	}

}



os.deleteTableRow=function(tableID) {

	try {

		var table = os.getObj(tableID);

		var rowCount = table.rows.length;



		for(var i=0; i<rowCount; i++) {

			var row = table.rows[i];

			var chkbox = row.cells[0].childNodes[0];

			if(null != chkbox && true == chkbox.checked) {

				if(rowCount <= 2) {

					alert("Cannot delete all the rows.");

					break;

				}

				table.deleteRow(i);

				rowCount--;

				i--;

			}





		}

	}catch(e) {

		alert(e);

	}

}



os.formattedDate=function(dd,mm,yyyy) {





	var todayStr='';

	dd=dd.toString(); if(dd.length==1){dd='0'+dd;}

	mm=mm.toString(); if(mm.length==1){mm='0'+mm;}



	if(globalDateFormat=='dd-mm-yy'){ todayStr= dd+'-'+mm+'-'+yyyy; }

	if(globalDateFormat=='mm-dd-yy'){ todayStr= mm+'-'+dd+'-'+yyyy; }

	if(globalDateFormat==''){alert('Global date format missing');}



	return todayStr;





}



os.getDateVal=function(dateStr,returnVal)

{



	if(globalDateFormat==''){alert('Global date format missing');}

	var outPutDate

	var D = dateStr.split('-');



	if(returnVal=='yy' || returnVal=='yyyy'){ outPutDate=D[2]; }





	if(globalDateFormat=='dd-mm-yy'){

		if(returnVal=='mm' ){ outPutDate=D[1]; }

		if(returnVal=='dd' ){ outPutDate=D[0]; }

	}



	if(globalDateFormat=='mm-dd-yy'){

		if(returnVal=='mm' ){ outPutDate=D[0]; }

		if(returnVal=='dd' ){ outPutDate=D[1]; }

	}



	return outPutDate;

}

os.mm=function(dateStr)

{

	return os.getDateVal(dateStr,'mm');

}



os.dd=function(dateStr)

{

	return os.getDateVal(dateStr,'dd');

}



os.yy=function(dateStr)

{

	return os.getDateVal(dateStr,'yy');

}





function printById(id){ // not in use



	var data = document.getElementById(id).innerHTML;

	var  mywindow = window.open('print', 'dataprint', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=yes,width=900,height=600,left=10, top=10,screenX=10,screenY=10');

	mywindow.document.write('<html><head> ');

	mywindow.document.write('</head><body>');

	mywindow.document.write(data);





	mywindow.document.write('</body></html>');

	mywindow.print();



}

os.setAsCurrentRecords=function(obj)

{



	$(obj).closest('table').find("tr").css("background-color","");

	$(obj).closest('tr').css("background-color","#FFFFD9");

}



