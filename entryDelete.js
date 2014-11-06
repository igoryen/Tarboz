function entryDelete(entryid) {
  //alert(langid, userid, entryid);
  if (entryid=="") {
    document.getElementById("entryDeleteDialog").innerHTML="";
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
      document.getElementById("entryDeleteResponse").innerHTML=xmlhttp.responseText;
    }
  }
  
  xmlhttp.open("GET","entryDelete.php?e="+entryid,true);
  xmlhttp.send();
}