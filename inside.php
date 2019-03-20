
<?php
$OBIEKT=array();
$myfile = file_get_contents("schedule.txt");

$OBIEKT=json_decode($myfile);

if(isset($_POST['t0'])&&!empty($_POST['t0'])) {
    $myfile = fopen("schedule.txt", "w");
    $dane = array($_POST['t0'],$_POST['typ'],$_POST['content']);
    $OBIEKT[count($OBIEKT)] = $dane;
    $jsn = json_encode($OBIEKT);
    fwrite($myfile, $jsn);
    fclose($myfile);
}
$i=0;
if(isset($_REQUEST['t'])&&!empty($_REQUEST['t'])) {
    $time = $_REQUEST['t'];

    while ($OBIEKT[$i][0] <= $time) {
        $i++;
    }

    $c = $OBIEKT[--$i];

echo "t0={$c[0]}
<br>typ={$c[1]}
<br>";

    if($c[1]=='video')
    {

        $c[2]=str_replace("watch?v=","embed/",$c[2]);
        echo 'content=<iframe width="560" height="315" src="'.$c[2].'?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>"';
    }
    if($c[1]=='foto'||$c[1]=='text')
    {
        echo "content={$c[2]}";
    }

}
if(isset($_REQUEST['reset'])&&!empty($_REQUEST['reset']))
{
    $myfile = fopen("schedule.txt", "w");
    fwrite($myfile,"");
    fclose();

}
?>






