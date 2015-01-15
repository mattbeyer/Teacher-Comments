<!DOCTYPE html>
<!-- saved from url=(0043)http://getbootstrap.com/examples/jumbotron/ -->
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://getbootstrap.com/assets/ico/favicon.ico">

    <title>beyerbeyer</title>

    <!-- Bootstrap core CSS -->
    
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/jumbotron/jumbotron.css" rel="stylesheet">
    
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="roundedtable.css">
  </head>

  <body>
      
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href='index.php'>Mr Beyer's Comments</a>
        </div>
        <div class="navbar-collapse collapse">
            
            
            
          <form class="navbar-form navbar-right" role="form" action='login.php' method='post'>
            <div class="form-group">
              <input type="text" placeholder="Username" class="form-control" name='username'>
              <input type="text" placeholder="Password" class="form-control" name='password'>
              <button type="submit" name="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    </div>    

    
        
    
    
<?php
session_start();
?>


    <div class="container">

<?php    
echo "<p><br /><br />You are logged in as ".$_SESSION['username']." &bull; <a href='logout.php'> Logout</a><br />";
echo "<br />Welcome to Mr Beyer's comments pages. If you have any further questions please email m.beyer@cockshut.bham.sch.uk<br /><br /></p>";

include_once("connect.php");

$comment_userid = $_SESSION['userid'];
if (!isset($comments)) {
    $comments = "";
    }
$post_comment = "";
$sql = "SELECT * FROM comments WHERE comment_userid='".$comment_userid."' ORDER BY comment_id DESC";
$res = mysql_query($sql) or die(mysql_error());

?>

    </div>

        
<div class="container">
    <table class="bordered">
        <thead>

    <tr>
        <th>Date</th>        
        <th>Comments</th>
        
    </tr>
    <?php
    while ($row = mysql_fetch_assoc($res)) {
       $post_comment = $row['comment'];
       $post_date = $row['date'];
       echo "<tr>";
       echo "<td>" . $row['date'] . "</td>";
       echo "<td>" . $row['comment'] . "</td>";
       echo "</tr>";
       
       }
        
    ?>
    </table>
    <div class="footer">
        
        <p><br />© www.beyerbeyer.co.uk 2014</p>
    </div>

</div>
</body>

        
    

