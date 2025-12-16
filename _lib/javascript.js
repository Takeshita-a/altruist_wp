
function moveurl(url) {
    location.href = url;
}


function toclose() {
    if(window.open) {
        opener.focus();
        top.close();
    }
}


function strTrim(string)
{
    for(;string.indexOf(" ")!= -1;){
        string=string.replace(" ","")
    }
    return string;
}


function autofocus(nextfld, maxlen) {
	var ob = event.srcElement;
	var len = ob.value.length;
	if(len >= maxlen) {
		nextfld.focus();
	}
}


function subTrim(fld)
{
    var pattern = /(^\s*)|(\s*$)/g; 
    fld = fld.replace(pattern, "");
    return fld;
}


function open_window(url, target, w, h, s, ws, hs)
{
    if (s) s = 'yes';
    else s = 'no';

	if(!ws) {
		ws = (screen.width - w) / 2;
	}
	if(!hs) {
		hs = (screen.height - h) / 2 - 20;
	}
	var its = window.open(url,target,'width='+w+',height='+h+',top='+hs+',left=' + ws + ',scrollbars='+s);
    its.focus();
}



function strByte(str)
{
    var i = 0;
	var len = 0;
	str = escape(str);
	for(i = 0; i < str.length; i++, len++){
		if( str.charAt(i) == "%" ){
			if( str.charAt(++i) == "u" ){
				i += 3;
				len++;
			}
			i++;
		}
	}
	return len;
}

function japan_lang_check(obj){
	val=obj.value;
	regExp =/[^a-z0-9/ ]/gi;  
						
	val = val.replace(/,/gi, "");
						
	if(regExp.test(val)){
		alert("半角英数字で入力してください。");
		obj.value = "";
		obj.focus();
		return;
	}
}

function japan_lang_check2(obj){
	val=obj.value;
	regExp =/[^a-z0-9\-_ ]/gi;  
						
	val = val.replace(/,/gi, "");
						
	if(regExp.test(val)){
		alert("半角英数字で入力してください。");
		obj.value = "";
		obj.focus();
		return;
	}
}



function japan_int_check(obj){
	val=obj.value;
	regExp =/[^0-9/ ]/gi;  
						
	val = val.replace(/,/gi, "");
						
	if(regExp.test(val)){
		alert("半角数字で入力してください。");
		obj.value = "";
		obj.focus();
		return;
	}
}


function formExists(fld, ment, types, trimtype)
{
    if (trimtype == true) {
        fld.value = subTrim(fld.value);
    }
    else {
        fld.value = strTrim(fld.value);
    }

    if (types == false && !fld.value) {
        return false;
    }

    if (!fld.value) {
        alert(ment);
        return true;
    }
    else {
        return false;
    }
}

function formExistsN(fld, ment, types, trimtype)
{
    if (trimtype == true) {
        fld.value = subTrim(fld.value);
    }
    else {
        fld.value = strTrim(fld.value);
    }

    if (types == false && !fld.value) {
        return false;
    }

    if (!fld.value) {
        alert(ment);
        return true;
    }
    else {
        return false;
    }
}


function formExistsJapan(fld, ment, types, trimtype)
{
    if (trimtype == true) {
        fld.value = subTrim(fld.value);
    }
    else {
        fld.value = strTrim(fld.value);
    }

    if (types == false && !fld.value) {
        return false;
    }

    var minLength = fld.getAttribute("minLength");
    var maxLength = fld.maxLength;

    if (!fld.value) {
        alert(ment);
        return true;
    }
    else if (minLength && strByte(fld.value) < minLength) {
        alert(ment + ' (Min ' + minLength + 'Value)');
        return true;
    }
    else if (maxLength && strByte(fld.value) > maxLength) {
        alert(ment + ' (Max ' + maxLength + 'Value)');
        return true;
    }
    else {
        return false;
    }
}


function formExistsInt(fld, ment, types, min, max, vals, maxlen, units)
{
    if (types == false && !fld.value) {
        return false;
    }

    if (!vals) {
        vals = 0
    }

    if (!units)
    {
        units = ''
    }

    var numbers = parseNumber(fld.value, vals)
    numbers = parseInt(numbers)
    fld.value = numbers

    if (maxlen) {
        var len = maxlen - fld.value.length

        if (len > 0) {
            var str = ''
            if (numbers == 0) {
                nums = ''
                len = maxlen
            }
            else {
                nums = numbers
            }

            for (var i=0;i<len ;i++ )
            {
                str += '0'
            }
            fld.value = str + nums
        }
    }
    else {
        fld.value = numbers
    }
    fld.value = filterNum(fld.value);
    fld.value = commaSplitAndNumberOnly(fld);
    
    if (min > 0 && numbers < min) {
        alert(ment + ' (Min: ' + min + units + ')');
        return true
    }
    else if (max > 0 && numbers > max) {
        alert(ment + ' (Max: ' + max + units + ')');
        return true
    }
    else if (!(numbers >= 0)) {
        alert(ment);
        return true
    }
    else {
        return false
    }
}


function formExistsEngchar(fld, ment, types) {
    if (types == false && !fld.value) {
        return false;
    }

    var error_c=0, i, val;
    for(i=0;i<strByte(fld.value);i++) {
        val = fld.value.charAt(i);
        if(i == 0) if(!((val>='a' && val<='z') || (val>='A' && val<='Z'))) {
            alert(ment);
            return true;
        }
        else if(!((val>=0 && val<=9) || (val>='a' && val<='z') || (val>='A' && val<='Z'))) {
            alert(ment);
            return true;
        }
   }
   return formExists(fld, ment, types);
}


function formExistsPhone(ph1, ph2, ph3, ment, types)
{
    ph1.value = strTrim(ph1.value);
    ph2.value = strTrim(ph2.value);
    ph3.value = strTrim(ph3.value);

    if (types == false && !ph1.value && !ph2.value && !ph3.value) {
        return false;
    }

    var error_c=0, i, val;
    spchar=/^[0-9]+/;


    if(ph1.value.search(spchar)== -1) {
        alert(ment);
        ph1.focus();
        return true;
    }
    else if(ph2.value.search(spchar)==  -1) {
        alert(ment);
        ph2.focus();
        return true;
    }
    else if(ph3.value.search(spchar)== -1) {
        alert(ment);
        ph3.focus();
        return true;
    }

    return false;
}


function formExistsEmail(email, ment, types)
{
    email.value = strTrim(email.value);

    if (types == false && !email.value) {
        return false;
    }

    var minLength = email.getAttribute("minLength");
    var maxLength = email.maxLength;

    if (!email.value) {
        alert(ment);
        return true;
    }

    //email.value = email.value.toLowerCase();
    spchar=/^[a-z0-9\-_.]+[@]{1}[a-z0-9\-]+[\.]{1}[a-z]+/;

    if (minLength && strByte(email.value) < minLength) {
        alert(ment);
        return true;
    }
    else if (maxLength && strByte(email.value) > maxLength) {
        alert(ment);
        return true;
    }
    else if (email.value.search(spchar) == -1) {
        alert(ment);
        return true;
    }
    else {
        return false;
    }
}

function formExistsMobile(email, ment, types)
{
    email.value = strTrim(email.value);
    if (types == false && !email.value) {
		return false;
    }

    var isEmail = /@docomo.ne.jp|ezweb.ne.jp|softbank.ne.jp/;

    if (isEmail.test(email.value)) {
        alert(ment);
		return true;
    }
    else {
        return false;
    }
}


function formExistsradio(fld, ment, types) {
    if (types == false) {
        return false;
    }
    var len = fld.length, i;

    for(i=0; i<len; i++) {
        if(fld[i].checked) {
            return false;
        }
    }
    alert(ment);
    return true;
}

function showFlash (src, width, height) {
    var flash_tag = "<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\" width=\"" + width + "\" height=\"" + height + "\">\n"
                  + "<param name=movie value=\"" + src + "\">\n"
                  + "<param name=quality value=high>\n"
				  + "<param name=wmode value=transparent>\n"
                  + "<embed src=\"" + src + "\" quality=high pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" width=\"" + width + "\" height=\"" + height +"\"></embed>\n"
                  + "</object>";

    document.write (flash_tag);
}

function DeleteSubmit(url) {
	  if(confirm("本当に削除しますか?")) {
	    document.location.href = url;
	  }
}

function StatusModifySubmit(url) {
	  if(confirm("状態を変更しますか?")) {
	    document.location.href = url;
	  }
}

function MsgAndSubmit(url,msg) {
	  if(confirm(msg)) {
	    document.location.href = url;
	  }
}

function DataLengthChk( str , maxLen ){
	if(str.value.length > maxLen){
		alert(maxLen + "文字までです。");
		str.value = str.value.substring(0,maxLen);
		str.focus();
		return;
	}
	viewFld = str.getAttribute("id") + "_cnt";
	document.getElementById(viewFld).innerHTML = maxLen - parseInt(str.value.length);
}