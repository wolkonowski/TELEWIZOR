
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="stylle.css"> 
</head>
<body>
<script type="text/javascript" src="script.js"></script>
<script type='text/javascript'>

    (function()
    {
        if( window.localStorage )
        {
            if( !localStorage.getItem('firstLoad') )
            {
                localStorage['firstLoad'] = true;
                window.location.reload();
            }
            else
                localStorage.removeItem('firstLoad');
        }
    })();

</script>
<div id="centrum"> </div>

<div id="pasek"> </div>

<div id = "blok"> <div id="pasek1"> </div> <div id="pasek2"> </div> </div>

<div id="czas"> </div>

<?php

if(isset($POST['sendMain'])){

}

?>

<script type="text/javascript">
function zegar(){
    
    now = new Date();
    var hours = now.getHours();
    var min = now.getMinutes();
    var sec = now.getSeconds();
    
    if (hours < 10) hours = "0" + hours;
    if (min < 10) min = "0" + min;
    if (sec < 10) sec = "0" + sec;
    
    document.getElementById('czas').innerHTML = hours + ":" + min ;
        
    setTimeout("zegar()", 1000);
}
zegar();
start();

window.setInterval(function(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() { 
		if(xhttp.readyState == 4 && xhttp.status == 200) { 
			var x = this.responseText;
			if(x == "YES") restart();
			
		}
    };
	xhttp.open("POST", "Adding/checkPasek.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("check=OK");
	
	var xhttp2 = new XMLHttpRequest();
	xhttp2.onreadystatechange = function() { 
		if(xhttp2.readyState == 4 && xhttp2.status == 200) { 
			var x = this.responseText;
			if(x == "YES") location.reload();
			
		}
    };
	xhttp2.open("POST", "Adding/checkPasek.php", true);
	xhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp2.send("check2=OK");
	
}, 2000);

var czas = 10;

var licznik = 0;

var actt0, acttyp;
start2();

var change = false;

function start2(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() { 
		if(xhttp.readyState == 4 && xhttp.status == 200) { 
			var x = this.responseText;
			x.split("<br>").forEach(function(item,index) {
				if(item.includes("t0=")){
					actt0 = item.replace('t0=','');
				}
				else if(item.includes("typ=")){
					acttyp = item.replace('typ=','');
				}
				else if(item.includes("content=")){
					document.getElementById("centrum").innerHTML = item.replace('content=','');
				}
			});
			
			
		}
    };
	xhttp.open("POST", "inside.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("t=" + czas);
}

function check(item, index){
	if(item.includes("t0=")){
		if(!(actt0===item.replace("t0=",''))){
			change = true;
		}
	}
	else if(item.includes("typ=")){
		if(!(acttyp===item.replace("typ=",''))){
			change = true;
		}
	}
	else if(item.includes("content=")){
		if(!(document.getElementById("centrum").innerHTML===item.replace("content=",''))){
			change = true;
		}
	}
}


window.setInterval(function(){
	licznik = licznik+czas;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() { 
		if(xhttp.readyState == 4 && xhttp.status == 200) { 
			var x = this.responseText;
			x.split("<br>").forEach(check);
			if(change == true){
				change = false;
				x.split("<br>").forEach(function(item, index){
				if(item.includes("t0=")){
					actt0 = item.replace("t0=",'');
				}
				else if(item.includes("typ=")){
					acttyp = item.replace("typ=",'');
				}
				else if(item.includes("content=")){
					document.getElementById("centrum").innerHTML = item.replace("content=",'');
				}
				});
			}
		}
    };
	xhttp.open("POST", "inside.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("t=" + licznik);
	
}, czas * 1000);

</script>

</body>
</html>
