
var czas = 0;
var ogloszenia;
var list;
var spliit;

start();

function emptyError(){
	document.getElementById('value1').style.border = '2px solid red';
	document.getElementById('red').style.opacity = '1';
	
}

function create(item, index){
	list = list + "<div> " + item + "</div>"; 
}

function start(){
	list = '';
	var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() { 
			if(xhttp.readyState == 4 && xhttp.status == 200) { 
			var x =xhttp.responseText.split("\n");
			x.forEach(create);
			document.getElementById('list2').innerHTML = list;
		}
    };
		xhttp.open("POST", "PHP.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("getOGL=OK");
}



function submit1(){
	if(document.getElementById('value1').value == ''||document.getElementById('value1').value == ' ') emptyError();
	else{
		
		//alert("Zostalo dodane");
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() { 
			if(xhttp.readyState == 4 && xhttp.status == 200) { 
			var x =xhttp.responseText.split("\n");
			add(x, document.getElementById('value1').value);
			document.getElementById('value1').value = '';
			document.getElementById('value1').style.border = '';
			document.getElementById('red').style.opacity = '0';
		}
    };
		xhttp.open("POST", "PHP.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("getOGL=OK");
	}
}

function add(txt, aaa){
	spliit = '';
	txt.forEach(spl);
	spliit = spliit + aaa;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() { 
			if(xhttp.readyState == 4 && xhttp.status == 200) { 
			start();
		}
    };
	xhttp.open("POST", "PHP.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("sendOGL=" + spliit);
}

function spl(item, index){
	spliit = spliit + item + "\n";
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



	
