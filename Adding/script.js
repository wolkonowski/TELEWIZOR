
var czas = 0;

function emptyError(){
	
}

function submit1(){
	if(document.getElementById('value1').value == ''||document.getElementById('value1').value == ' ') event.stopPropagation();
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



	
