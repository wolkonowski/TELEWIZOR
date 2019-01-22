
var czas = 0;
var speed = 6;

	
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
			elem.style.left = "100%";
		} else {
			pos-=speed/100; 
			elem.style.left = pos + "%"; 
		}
	}

}

function animacja2(){
	var elem2 = document.getElementById("pasek2");   
	var pos2 = 100;
	var id2 = setInterval(frame, 10);

	var is2 = true;
	
	
	function frame() {
		if (is2 && document.getElementById("pasek2").offsetWidth <= document.getElementById("blok").offsetWidth - document.getElementById("pasek2") .offsetLeft - 7) {
			animacja1();
			is2 = false;
		}
		else if(!is2 && document.getElementById("pasek2").offsetWidth <= -1 * document.getElementById("pasek2").offsetLeft){
			clearInterval(id2);
			elem2.style.left = "100%";
		} else {
			pos2-=speed/100; 
			elem2.style.left = pos2 + "%"; 
		}
	}

}
