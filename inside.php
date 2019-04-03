
<?php
$OBIEKT=array();
$myfile = file_get_contents("schedule.txt");

$OBIEKT=json_decode($myfile);

if(isset($_REQUEST['dt'])&&!empty($_REQUEST['dt'])) {
    $myfile = fopen("schedule.txt", "w");
    if(empty($OBIEKT))$t0=0;
    else $t0=$OBIEKT[count($OBIEKT)-1][0]+$OBIEKT[count($OBIEKT)-1][1];
    $dane = array($t0,doubleval($_REQUEST['dt']),$_REQUEST['typ'],$_REQUEST['content']);
    if(empty($OBIEKT))$OBIEKT[0] = $dane;
    else $OBIEKT[count($OBIEKT)] = $dane;
    $jsn = json_encode($OBIEKT);
    fwrite($myfile, $jsn);
    fclose($myfile);

}
$i=0;
if(isset($_REQUEST['t'])&&!empty($_REQUEST['t'])&&!empty($OBIEKT)) {
    $time = $_REQUEST['t'];
    if($time>=($OBIEKT[count($OBIEKT)-1][0]+$OBIEKT[count($OBIEKT)-1][1])) {
        $time-=($OBIEKT[count($OBIEKT)-1][0]+$OBIEKT[count($OBIEKT)-1][1]);
    }
    while ($i<count($OBIEKT)&&$OBIEKT[$i][0] <= $time) {
        $i++;
    }
    $c = $OBIEKT[--$i];

echo "t0={$c[0]}
<br>typ={$c[2]}
<br>";

    if($c[2]=='video')
    {

        $c[3]=str_replace("watch?v=","embed/",$c[3]);
        echo 'content=<iframe width="560" height="315" src="'.$c[3].'?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>"';
    }
    if($c[2]=='foto'||$c[2]=='text')
    {
        echo "content={$c[3]}";
    }

}
if(isset($_REQUEST['reset'])&&!empty($_REQUEST['reset']))
{
    $myfile = fopen("schedule.txt", "w");
    fwrite($myfile,"");
    fclose($myfile);

}
if(isset($_REQUEST['getjson'])&&!empty($_REQUEST['getjson']))
{
    echo $myfile;

}
if(isset($_REQUEST['setjson'])&&!empty($_REQUEST['setjson']))
{
    $myfile = fopen("schedule.txt", "w");
    fwrite($myfile,$_REQUEST['setjson']);
    fclose($myfile);

}


?>






