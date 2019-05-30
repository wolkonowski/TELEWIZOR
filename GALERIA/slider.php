<html>

<head>

</head>
<body>

<main>
	    <?php
$name=$_REQUEST['name'];
		$a=glob($name.'/{*.jpg, *.jpeg, *.png}', GLOB_BRACE);
		
		foreach ($a as $value){
			
			?>
			<div class=zd>
			   <img src="<?php echo $value;?>" alt="<?php echo $value; ?>"height="100%"; width="100%";>
			</div>
		
		<?php
		}
	
	  ?>
</main>
<script>
        var liczba = 0;
		
		animacja();
		function animacja(){
         var i;
		 var x = document.getElementsByClassName("zd");
         for(i=0;i<x.length;i++){x[i].style.display="none";}
		  liczba++;
		  if (liczba > x.length){liczba=1}
		  x[liczba - 1].style.display = "block";
		  setTimeout(animacja, 7000);
		}		
		
</script>

</body>
</html>