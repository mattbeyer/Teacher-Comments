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
    
    <script data-jsfiddle="common" src="lib/jquery.min.js"></script>
  <script data-jsfiddle="common" src="dist/jquery.handsontable.full.js"></script>
  <link data-jsfiddle="common" rel="stylesheet" media="screen" href="dist/jquery.handsontable.full.css">   
    
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

<div class="container">
<?php


session_start();
include_once("connect.php");
if (isset($_GET['menuselectedclass'])) $selectedclass = $_GET['menuselectedclass'];


echo "<p><br /><br />You are logged in as teacher &bull; ".$_SESSION['username']." &bull; <a href='logout.php'> Logout</a><br />";
echo "<br /> You are able to upload comments.<br />";
echo "<br />Select class:";

$sql = "SELECT DISTINCT classname FROM users";
$res = mysql_query($sql) or die(mysql_error());

echo    "
            <form action='home_teacher.php' method='get'>
            <select name='menuselectedclass'>
        ";

while ($row = mysql_fetch_assoc($res))
            {
                $classname = $row['classname']; 
                if ($classname != "")
                    {
                        if (isset($selectedclass)) 
                            {
                                if ($selectedclass == $classname)
                                    {
                                        echo "<option value='$classname' selected>$classname</option>";
                                        echo "selected == classname";
                                    }
                                    else
                                    {   
                                        echo "<option value='$classname'>$classname</option>";
                                        echo "selected !== classname";
                                    }
                            }        
                            else
                            {   
                                echo "<option value='$classname'>$classname</option>";
                                echo "selected !== classname";
                            }  
                    }
                
            }
    
            
    
echo "</select>
    <input type='submit' value='Select'>
    </form><br />";

$handsondata = "[";
$classlist = array();
if (isset($selectedclass))
    {
        $sql_displayclass = "SELECT * FROM users WHERE classname='".$selectedclass."'";
        $res_displayclass = mysql_query($sql_displayclass) or die(mysql_error());
        
        
        while ($row_displayclass = mysql_fetch_assoc($res_displayclass))
            {
                $student = $row_displayclass['username'];
                $userid = $row_displayclass['userid'];
                array_push($classlist, ['userid' => $userid, 'username' => $student]);
                $handsondata = $handsondata.'{user: "'.$student.'", comment: ""},';                     
            }
        
    }

$handsondata = rtrim($handsondata, ',');
$handsondata = $handsondata."]";
$_SESSION['classlist'] = $classlist;
?>



<div id="example"></div>

<script>
    var data = <?php echo $handsondata; ?>
      
     
        $('#example').handsontable
            ({
                data: data,
                columns : 
                    [
                        {
                            data: "user",
                            readOnly: true
                        },
                        {
                            data: "comment",
                        }
                    ]        
            });



</script>


<form>
    <input type="button" value="Submit" onclick="post();"> 
</form>



<div id="result"></div>

<script type="text/javascript">
    var mydata1 = "hello";
    function post()
    {
        mydata = $('#example').handsontable('getDataAtCol',1);        
        $.post('submitcomments.php',{mydata:mydata},
        
        function(data)
        {
            $('#result').html(data);
        });
    }

</script>

</div>
</body>

        
    

