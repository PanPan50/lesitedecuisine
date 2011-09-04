function CheckLen(){
	var charsleft = 256 - document.getElementById("message").value.length;
	if(charsleft < 0){
		if(document.getElementById("message").value.length > 256){
			document.getElementById("message").value = document.getElementById("message").value.substr(0, 256) ;
		}
	}
	if(charsleft < 0) charsleft = 0 ;
	document.getElementById("chars").innerHTML = charsleft ;
}