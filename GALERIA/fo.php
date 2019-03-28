<!DOCTYPE html>
<html>
<head>

<style>
      body{
		   margin: 0;
		   pading: 0;
		   background: #ccc;
	      }
		 main{  
               width: 80%;
			   margin:0;
			   position: center;

		     }
		.zd{  
		    width: 300px;
			height: 200px;
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

</body>
</html>