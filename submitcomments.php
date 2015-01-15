<?php
session_start();
include_once("connect.php");

$mydata = $_POST['mydata'];
$classcomments = $_SESSION['classlist'];

$class_size = count($classcomments);


for ($i = 0; $i < $class_size; $i++ )
    {
        if (!empty($mydata[$i])) $classcomments[$i]['comment'] = $mydata[$i];
    }


$date = date("d"."/"."m"."/"."Y");    
foreach ($classcomments as $comment)
    {
        if (!empty($comment['comment'])) 
            {
                $sql = "INSERT INTO comments (username, comment_userid, comment, date) VALUES ('".$comment['username']."','".$comment['userid']."','".$comment['comment']."','".$date."');";
                $res = mysql_query($sql) or die(mysql_error()); 
            }
                        
    }

?>