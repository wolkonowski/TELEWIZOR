
var czas = 0;
var speed = 6;
var id, id2;
	
function start(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() { 
		if(xhttp.readyState == 4 && xhttp.status == 200) { 
			var x = xhttp.responseText;
			while(x.includes("\n")) x = x.replace("\n", " ● ");
			if(x != '' && x != ' '){
				var h = x;
				document.getElementById("pasek2").innerHTML = h;
				while(document.getElementById("pasek2").offsetWidth <= document.getElementById("blok").offsetWidth){ h = h + h; document.getElementById("pasek2").innerHTML = h;}
				document.getElementById("pasek1").innerHTML = h;
				animacja2();
			}
			else{
				document.getElementById("blok").style.opacity = "0";
			}
			
		}
    };
	xhttp.open("POST", "Adding/PHP.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("getOGL=OK");
	

}

function restart(){
	clearInterval(id2);
	clearInterval(id);
	start();
}

function animacja1(){
	var elem = document.getElementById("pasek1");   
	var pos = 100;
	id = setInterval(frame, 10);

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
	id2 = setInterval(frame, 10);

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
