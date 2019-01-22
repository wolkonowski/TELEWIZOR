
var czas = 0;
var speed = 7;

	
function start(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() { 
		if(xhttp.readyState == 4 && xhttp.status == 200) { 
			var x = xhttp.responseText;
			while(x.includes("\n")) x = x.replace("\n", " ● ");
			document.getElementById("pasek2").innerHTML = " " + x + " ● ";
			document.getElementById("pasek1").innerHTML = " " + x + " ● ";
			animacja2();
		}
    };
	xhttp.open("POST", "Adding/PHP.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("getOGL=OK");
}


function animacja1(){
	var elem = document.getElementById("pasek1");   
	var pos = 100;
	var id = setInterval(frame, 10);

	var is = true;
	
	
	function frame() {
		if (is && document.getElementById("pasek1").offsetWidth <= document.getElementById("blok").offsetWidth - document.getElementById("pasek1") .offsetLeft - 7) {
			animacja2();
			is = false;
		}
		else if(!is && document.getElementById("pasek1").offsetWidth <= -1 * document.getElementById("pasek1").offsetLeft){
			clearInterval(id);
		} else {
			pos-=speed/100; 
			elem.style.left = pos + "%"; 
		}
	}

}

function animacja2(){
	var elem = document.getElementById("pasek2");   
	var pos = 100;
	var id = setInterval(frame, 10);

	var is = true;
	
	
	function frame() {
		if (is && document.getElementById("pasek2").offsetWidth <= document.getElementById("blok").offsetWidth - document.getElementById("pasek2") .offsetLeft - 7) {
			animacja1();
			is = false;
		}
		else if(!is && document.getElementById("pasek2").offsetWidth <= -1 * document.getElementById("pasek2").offsetLeft){
			clearInterval(id);
		} else {
			pos-=speed/100; 
			elem.style.left = pos + "%"; 
		}
	}

}
