<html>

<head>
<style>
      
		.zd{  
		    width: 1070px;
			height: 560px;
            float: left;
 			margin: 10px;
			background: #fff;
			pading: 2px;
			box_sizig: border_box;
 
	      }
		 .zd img{
                 width: 100%;
				 height: 100%;
		       } 
</style>
</head>
<body>

<main>
	    <?php
		$a=glob('foto/{*.jpg, *.jpeg, *.png}', GLOB_BRACE);
		
		foreach ($a as $value){
			
			?>
			<div class=zd>
			   <img src="<?php echo $value;?>" alt="<?php echo $value; ?>">
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
		  setTimeout(animacja, 2000);
		}		
		
</script>

</body>
</html>