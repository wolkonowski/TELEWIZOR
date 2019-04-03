function checkStatus(){
		
		//alert("Zostalo dodane");
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() { 
			if(xhttp.readyState == 4 && xhttp.status == 200) { 
			var x =xhttp.responseText.split("<br>");
			if(x[0].contains("t0: ")){
				var str = x[0].replace("t0: ", '');
				if(str == "brak"){
					
				}
				else if(str == "foto"){
					
				}
				else if(str == "video"){
					
				}
				else if(str == "text"){
					
				}
				else alert("Blad!");
			}
		}
    };
		xhttp.open("POST", "test.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("isSet=OK");
}