<?php
$fot= $_FILES['file']['name'];
$fh = "foto/$fot";
if (!unlink($fh)){echo "Masz problem";}
else {echo "Nie masz problemu";}

?>