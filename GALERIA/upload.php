<?php
if(!empty($_FILES['files']['name'][0]))
{
	$files= $_FILES['files'];
	
	$uploaded = array();	
	$filed = array();	
	$allowed = array ('jpg', 'png', 'jpeg');
	
	foreach($files['name'] as $position => $file_name)
	{
		$file_tmp = $files['tmp_name'][$position];
		$file_size = $files['size'][$position];
		$file_error = $files['error'][$position];
		
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		
		if(in_array($file_ext, $allowed))
		{
			if($file_error === 0)
			{
				if($file_size <= 30000000)
				{
					$file_name_new = uniqid('',true) . '.' . $file_ext;
					$file_destination = 'foto/' . $file_name_new;
					
					if(move_uploaded_file($file_tmp, $file_destination))
					{
						$uploaded[$position] = $file_destination;
					}	else {$failed[$position]="[{$file_name}] nie udało sie przeslac";}
				} else {$filed[$position]= "[{$file_name}] jest za duzy";}
				
			}else {$filed[$position]= "[{$file_name}] nie udało sie przeslac";}
		}else {$filed[$position]= "[{$file_name}] już istnieje";}
		
	}	
	if(!empty($uploaded)){print_r($uploaded);}
	if(!empty($filed)){print_r($filed);}

}

?>