
document.getElementById("typeAdd").value = "tekst";
function changeAdd(){
	if(document.getElementById('typeAdd').value == "foto"){
		document.getElementById('content').innerHTML = "Wpisz nazwe galerii: <br/><form><textarea id='content-value' style='height:20%;width:80%'></textarea></form>"
	}
	else if(document.getElementById('typeAdd').value == "wideo"){
		document.getElementById('content').innerHTML = "Wpisz link do filmu: <br/><form><textarea id='content-value' style='height:20%;width:80%'></textarea></form>"
	}
	else {
		document.getElementById('content').innerHTML = "Wpisz wartosc: <br/><form><textarea id='content-value'></textarea></form>"
	}
}

function redirect(page){
	window.location.href = page;
}

function removeObject(nr){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() { 
			if(xhttp.readyState == 4 && xhttp.status == 200) { 
			alert("Pomyslnie usunales objekt!");
			location.reload();
		}
    };
	xhttp.open("POST", '../inside.php', true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("delete=" + nr);
}

function moveDown(nr){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() { 
			if(xhttp.readyState == 4 && xhttp.status == 200) { 
			alert("Pomyslnie przesunales objekt w dol!");
			location.reload();
		}
    };
	xhttp.open("POST", '../inside.php', true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("movedown=" + nr);
}

function moveUp(nr){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() { 
			if(xhttp.readyState == 4 && xhttp.status == 200) { 
			alert("Pomyslnie usunales objekt w gore!");
			location.reload();
		}
    };
	xhttp.open("POST", '../inside.php', true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("moveup=" + nr);
}

function upl(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() { 
			if(xhttp.readyState == 4 && xhttp.status == 200) { 
			alert("Pomyslnie ustawiles harmonogram jako aktywny!");
			location.reload();

		}
    };
	xhttp.open("POST", 'SchedulerList.php', true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("set=2");
	
	var xhttp2 = new XMLHttpRequest();
	xhttp2.onreadystatechange = function() { 
		if(xhttp2.readyState == 4 && xhttp2.status == 200) { 
			alert("Ogloszenia zostaly zauktualizowane! ");
		}
	};
	xhttp2.open("POST", window.location.pathname.replace("info.php", "checkPasek.php"), true);
	xhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp2.send("sendMain2=true");
}

function send(){
	if(document.getElementById("content-value").value.replace(/ /g,'') == '' ){
		document.getElementById("content-value").value = document.getElementById("content-value").value.replace(/ /g,'')
		document.getElementById('content-value').style.border = '2px solid red';
		document.getElementById('red').style.opacity = '1';
		return;
	}
	if(document.getElementById("hour").value.replace(/ /g,'') == '' ){
		document.getElementById("hour").value = document.getElementById("hour").value.replace(/ /g,'')
		document.getElementById('hour').style.border = '2px solid red';
		document.getElementById('red').style.opacity = '1';
		return;
	}
	if(document.getElementById("min").value.replace(/ /g,'') == '' ){
		document.getElementById("min").value = document.getElementById("min").value.replace(/ /g,'')
		document.getElementById('min').style.border = '2px solid red';
		document.getElementById('red').style.opacity = '1';
		return;
	}
	if(document.getElementById("sec").value.replace(/ /g,'') == '' ){
		document.getElementById("sec").value = document.getElementById("sec").value.replace(/ /g,'')
		document.getElementById('sec').style.border = '2px solid red';
		document.getElementById('red').style.opacity = '1';
		return;
	}
	document.getElementById('hour').style.border = '0px solid red';
	document.getElementById('min').style.border = '0px solid red';
	document.getElementById('sec').style.border = '0px solid red';
	document.getElementById('content-value').style.border = '0px solid red';
	if(document.getElementById("content-value").value.includes("&")){
		window.alert("Wartosc nie moze zawierac znaku '&'!");
		return;
	}
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() { 
			if(xhttp.readyState == 4 && xhttp.status == 200) { 
			if(document.getElementById("typeAdd").value == "foto") alert("Pomyslnie dodales zdjecie!");
			else if(document.getElementById("typeAdd").value == "wideo") alert("Pomyslnie dodales film!");
			else alert("Pomyslnie dodales tekst!");
			location.reload();
		}
    };
	xhttp.open("POST", '../inside.php', true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("dt=" + (parseInt(document.getElementById("hour").value) * 3600 + parseInt(document.getElementById("min").value) * 60 + parseInt(document.getElementById("sec").value)) + "&typ=" + document.getElementById('typeAdd').value + "&content=" + document.getElementById("content-value").value);
	
}



function replace2(str, c, repl){
		alert(str);
		str.replace(c, "");
		alert(str);
		
	
	return str;
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



	
