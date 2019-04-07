<?php
$OBIEKT=array();
if(!file_exists("lists.txt"))
    file_put_contents("lists.txt","[schedule_default.txt]");

$myfile=file_get_contents("lists.txt");
$OBIEKT=json_decode($myfile);

if(isset($_REQUEST['delete'])&&!empty($_REQUEST['delete']))
{
    $myfile = fopen("lists.txt", "w");
    $val=$_REQUEST['delete']-1;
    for($i=$val+1;$i<count($OBIEKT);$i++)
    {
        $OBIEKT[$i-1]=$OBIEKT[$i];
    }
unset($OBIEKT[count($OBIEKT)-1]);

if(empty($OBIEKT))
    $OBIEKT[0]="schedule_default.txt";
    $jsn = json_encode($OBIEKT);
    fwrite($myfile, $jsn);
    fclose($myfile);

}
if(isset($_REQUEST['add'])&&!empty($_REQUEST['add']))
{

    $val=$_REQUEST['add'];
    $name="schedule_".$val.".txt";
    $cnt=0;
    foreach ($OBIEKT as $value)
        if($name==$value)$cnt++;
        if($cnt==0) {
            $myfile = fopen("lists.txt", "w");
            $OBIEKT[] = $name;
            $jsn = json_encode($OBIEKT);
            fwrite($myfile, $jsn);
            fclose($myfile);
            file_put_contents("../$name",'[]');
        }
}
if(isset($_REQUEST['select'])&&!empty($_REQUEST['select']))
{
    $myfile = fopen("../default.txt", "w");
    $val=$_REQUEST['select']-1;
    fwrite($myfile, $OBIEKT[$val]);
    fclose($myfile);
    header('Location: schedule.php');
}
?>




<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styleAdmin.css"> 
</head>
<body>

<div id="background"> 
<div id="time"> </div>
<div id="red">Ogłoszenie nie może być puste! </div>

    <form action="" method="post">
        Wpisz nazwę harmonogramu:
        <input type="text" name="add">
        <input type="submit" />
    </form>


    <?php
$k = 1;
foreach(json_decode(file_get_contents('lists.txt')) as $a){
	echo "<form action=\"\" method=\"post\">
    $a : select<input type=\"submit\" name=\"select\" value=".$k.">
</form><form action=\"\" method=\"post\">
    $a : delete<input type=\"submit\" name=\"delete\" value=".$k.">
</form>";
	$k++;
}
?>

<script type="text/javascript" src="SchedulerListScript.js"></script>
</body>
</html>