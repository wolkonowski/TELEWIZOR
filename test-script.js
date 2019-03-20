function checkStatus(){
		
		//alert("Zostalo dodane");
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() { 
			if(xhttp.readyState == 4 && xhttp.status == 200) { 
			var x =xhttp.responseText.split("|b|");
			if(x[0].contains("typ: ")){
				var str = x[0].replace("typ: ", '');
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