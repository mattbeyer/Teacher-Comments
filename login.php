<?php
session_start();
include_once("connect.php");

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='".$username."' AND password ='".$password."' LIMIT 1";
    $res = mysql_query($sql) or die(mysql_error());
    
    if (mysql_num_rows($res) == 1) {
        $row = mysql_fetch_assoc($res);
        $_SESSION['userid'] = $row['userid'];
        $_SESSION['username'] = $row['username'];
        if ($row['usertype'] == 'student') header("Location: home.php");
        if ($row['usertype'] == 'teacher') header("Location: home_teacher.php");
        exit();
           
        }
        

    else echo "Invalid login. &bull; <a href='index.php'> Login";
}

?>


