function treqCreate(langid, userid, entryid) {
  //alert(langid, userid, entryid);
  if (langid=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("treqCreateResponse").innerHTML=xmlhttp.responseText;
    }
  }
  
  xmlhttp.open("GET","treqCreate.php?l="+langid+"&u="+userid+"&e="+entryid,true);
  xmlhttp.send();
}