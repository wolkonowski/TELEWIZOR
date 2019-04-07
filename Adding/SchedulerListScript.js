function send(){
	function removeObject(nr){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() { 
			if(xhttp.readyState == 4 && xhttp.status == 200) { 
			alert("OK!");
		}
    };
	xhttp.open("POST", '../inside.php', true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("delete=VAR");
}
}