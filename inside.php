<?php

function swap(&$x, &$y) {
    $tmp=$x;
    $x=$y;
    $y=$tmp;
}
$OBIEKT=array();
if(!file_exists("default_e.txt"))
    file_put_contents("default_e.txt","schedule_default.txt");
if(!file_exists("default_v.txt"))
    file_put_contents("default_v.txt","schedule_default.txt");
$filename = file_get_contents("default_e.txt");
$filename_v = file_get_contents("default_v.txt");

$myfile=file_get_contents($filename);
$OBIEKT=json_decode($myfile);

if(isset($_REQUEST['dt'])&&!empty($_REQUEST['dt'])) {
    $myfile = fopen($filename, "w");
    if(empty($OBIEKT))$t0=0;
    else $t0=$OBIEKT[count($OBIEKT)-1][0]+$OBIEKT[count($OBIEKT)-1][1];
    $dane = array($t0,doubleval($_REQUEST['dt']),$_REQUEST['typ'],str_replace('\/','/',$_REQUEST['content']));
    if(empty($OBIEKT))$OBIEKT[0] = $dane;
    else $OBIEKT[count($OBIEKT)] = $dane;
    $jsn = json_encode($OBIEKT);
    fwrite($myfile, $jsn);
    fclose($myfile);

}
$i=0;
if(isset($_REQUEST['t'])&&!empty($_REQUEST['t'])) {
    $myfile=file_get_contents($filename_v);
    $OBIEKT=json_decode($myfile);
    if(!empty($OBIEKT)) {
        $time = $_REQUEST['t'];
        if ($time >= ($OBIEKT[count($OBIEKT) - 1][0] + $OBIEKT[count($OBIEKT) - 1][1])) {
            $time -= ($OBIEKT[count($OBIEKT) - 1][0] + $OBIEKT[count($OBIEKT) - 1][1]);
        }
        while ($i < count($OBIEKT) && $OBIEKT[$i][0] <= $time) {
            $i++;
        }
        $c = $OBIEKT[--$i];

        echo "t0={$c[0]}
<br>typ={$c[2]}
<br>";

        if ($c[2] == 'wideo') {

            $c[3] = str_replace("watch?v=", "embed/", $c[3]);
            echo 'content=<iframe width="100%" height="100%" src="' . $c[3] . '?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }
        if ($c[2] == 'foto') {
            $name= "?name=$c[3]";
            echo 'content=<iframe width="100%" height="100%" src="GALERIA/slider.php'.$name.'"></iframe>';
        }
        if ($c[2] == 'text')
        {
            echo "content={$c[3]}";
        }
        
    }
}
if(isset($_REQUEST['reset'])&&!empty($_REQUEST['reset']))
{
    $myfile = fopen($filename, "w");
    fwrite($myfile,"");
    fclose($myfile);

}
if(isset($_REQUEST['getjson'])&&!empty($_REQUEST['getjson']))
{
    echo $myfile;

}
if(isset($_REQUEST['setjson'])&&!empty($_REQUEST['setjson']))
{
    $myfile = fopen($filename, "w");
    fwrite($myfile,$_REQUEST['setjson']);
    fclose($myfile);

}
if(isset($_REQUEST['delete'])&&!empty($_REQUEST['delete']))
{
    $val=$_REQUEST['delete']-1;
    if($val>count($OBIEKT)-1) exit("ERROR MY FRIEND");
    else {
        $dt=$OBIEKT[$val][1];

        for($i=$val+1;$i<count($OBIEKT);$i++)
        {
            $OBIEKT[$i][0]-=$dt;
            $OBIEKT[$i-1]=$OBIEKT[$i];
        }
        unset($OBIEKT[count($OBIEKT)-1]);


    }
    $jsn = json_encode($OBIEKT);
    $myfile = fopen($filename, "w");
    fwrite($myfile, $jsn);
    fclose($myfile);
}
if(isset($_REQUEST['moveup'])&&!empty($_REQUEST['moveup']))
{
    $val=$_REQUEST['moveup'];
    if($val==0||$val>count($OBIEKT)-1) exit("ERROR MY FRIEND");
    else
    {
        swap($OBIEKT[$val],$OBIEKT[$val-1]);
        swap($OBIEKT[$val][0],$OBIEKT[$val-1][0]);
        $OBIEKT[$val][0]=($OBIEKT[$val-1][0]+$OBIEKT[$val-1][1]);
    }

    $jsn = json_encode($OBIEKT);
    $myfile = fopen($filename, "w");
    fwrite($myfile, $jsn);
    fclose($myfile);
}
if(isset($_REQUEST['movedown']))
{
    $val=$_REQUEST['movedown'];

    if($val>=count($OBIEKT)-1) exit("ERROR MY FRIEND");
    else
    {

        swap($OBIEKT[$val],$OBIEKT[$val+1]);
        swap($OBIEKT[$val][0],$OBIEKT[$val+1][0]);
        $OBIEKT[$val+1][0]=($OBIEKT[$val][0]+$OBIEKT[$val][1]);
    }

    $jsn = json_encode($OBIEKT);
    $myfile = fopen($filename, "w");
    fwrite($myfile, $jsn);
    fclose($myfile);
}



?>