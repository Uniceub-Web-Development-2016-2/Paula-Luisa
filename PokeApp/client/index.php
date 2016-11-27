<?php 
require_once("Config.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Pokémon GO -Companion-</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <link rel="stylesheet" href="web/ionicons/css/ionicons.min.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">Pokémon GO -Companion-</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <?php
        if(!isset($_SESSION['username'])){
          if(isset($_POST['login'])){
            unset($_POST['login']);
            $_POST['username'] = strtolower($_POST['username']);
            $userRequest = request("user", "auth", "post");
            $u = json_decode($userRequest, true);
            var_dump($userRequest);
            $onDb = (count($u) == 1) ? true : false;
            $crypt = new Crypt();

            if($onDb && $u[0]['username'] == $_POST['username'] && $crypt->verifyHash($_POST['password'], $u[0]['password'])){
                  unset($u[0]['password']);
                  $_SESSION = $u[0];
                  header("Location: ./inicio");

            }else{
              header("Location: ./404");
            }

          }
         ?>
          <form class="navbar-form navbar-right" method="post" action="">
            <div class="form-group">
              <input type="text" placeholder="Username" name="username" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" name="password" class="form-control">
            </div>
            <input type="submit" class="btn btn-success" name="login" value="Sign in">
          </form>
          <?php }else{ ?>
            <p><a class="navbar-right btn btn-danger btn-lg" href="./logoff" role="button">Sair &raquo;</a></p>
          <?php } ?>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <?php

      pag_load();

     ?>

      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->



  </body>
</html>
