<?php
include "connect.php";
function start()
{
    $session_name = 'sesja';
    $cookieParams=session_get_cookie_params();
    session_set_cookie_params($cookieParams['lifetime'],$cookieParams['path'],$cookieParams['domain'],SECURE,true);
    session_name($session_name);
    session_start();
    session_regenerate_id();

}


if(isset($_POST['username'])&&!empty($_POST['username'])&&!empty($_POST['psw']))
{
    $username=$_POST['username'];
    $ps=md5($_POST['psw']);
    $sql="SELECT pass from users WHERE username='$username';";
    $result = $conn->query($sql);
    if ($result->num_rows == 0){echo "Użytkownik nie istnieje"; exit();}
    $row = $result->fetch_assoc();
    if ($row['pass']!=$ps){echo "Błędne hasło:";exit();}
        $time=time();
        setcookie('loggedin','true',0,"" ,"" ,"" ,true);
        setcookie('username',md5($username.$time.$_SERVER['HTTP_USER_AGENT'].$row['pass']),0,'','','',true);
       //start();
    session_start();
        $_SESSION['login_string']=md5($username.$time.$_SERVER['HTTP_USER_AGENT'].$row['pass']);
        header("Location: strona.php");
//echo session_id();


}
?>
