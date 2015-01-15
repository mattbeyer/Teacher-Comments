<?php

session_start();
if (isset($_SESSION['userid'])) header("Location: home.php");
?>

<!DOCTYPE html>

<html lang="en">
    <head>

    <title>beyerbeyer</title>

  
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
         <div class="container">
             <br/><br/>
             <p> Teacher username: beyer<br/>Teacher password: beyer<br/>
             <p> Student username: SMITH <br/>Student password: SMITH<br/>
                 

    </div>
        
        
        
    </body>
        
    
 