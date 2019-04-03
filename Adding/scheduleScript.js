

function changeAdd(){
	if(document.getElementById('typeAdd').value == "foto"){
		
	}
	else if(document.getElementById('typeAdd').value == "wideo"){
		
	}
	else {
		
	}
}

function send(){
	if(document.getElementById("t0-value").value == undefined){
		window.alert("Nie wybrales czasu!");
		return;
	}
	if(document.getElementById("content-value").value.includes("&")){
		window.alert("Wartosc nie moze zawierac znaku '&'!");
		return;
	}
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() { 
			if(xhttp.readyState == 4 && xhttp.status == 200) { 
			if(document.getElementById("t0-value").value == "foto") alert("Pomyslnie dodales zdjecie!");
			else if(document.getElementById("t0-value").value == "wideo") alert("Pomyslnie dodales film!");
			else alert("Pomyslnie dodales tekst!");
		}
    };
	xhttp.open("POST", window.location.pathname.replace("info.php", "scheduleMySQL.php"), true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("typ=" + document.getElementById('typeAdd').value + "&t0=" + document.getElementById("t0-value").value + "&content=" + document.getElementById("content-value").value);
	
}





function zegar(){
    
    now = new Date();
    var hours = now.getHours();
    var min = now.getMinutes();
    var sec = now.getSeconds();
    
    if (hours < 10) hours = "0" + hours;
    if (min < 10) min = "0" + min;
    if (sec < 10) sec = "0" + sec;
    
    document.getElementById('time').innerHTML = hours + ":" + min + ":" + sec;
        
    setTimeout("zegar()", 1000);
}

zegar();



	
