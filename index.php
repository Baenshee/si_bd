
<link rel="stylesheet" href="./Css/bootstrap.min.css">
<link rel="stylesheet" href="./Css/Main.css">
<?php

session_start();
  $Error = isset($_REQUEST['Error']) ? $_REQUEST['Error'] : '0';
  if($Error==1){
    echo("Veuillez entrer un identifiant et un mot de passe valides.");
  }
  if(isset($_SESSION['USER'])){
  }
  ?>
  <div class="page">
      <form method="post" id="formconnec" class="form-horizontal" action="./Php/connection.php">
          <h5 class="">Connexion</h5>
          <input type="text" name="login" id="login" placeholder="Identifiant"/>
          <input type="password" name="password" id="password" placeholder="Mot de passe">
          <input type="submit" value="OK" id="loginbutton" class="btn btn-success"><br/>
          <a href="index.php?EX=recup" class="lostpass">Mot de passe perdu ?</a>
      </form>
  </div>
