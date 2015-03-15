<!--
<link rel="stylesheet" href="./Css/bootstrap.min.css">
<link rel="stylesheet" href="./Css/Main.css">
<?php
/*
session_start();
  $Error = isset($_REQUEST['Error']) ? $_REQUEST['Error'] : '0';
  if($Error==1){
    echo("Veuillez entrer un identifiant et un mot de passe valides.");
  }
  if(isset($_SESSION['USER'])){
  }*/
  ?>
  <div class="page">
      <form method="post" id="formconnec" class="form-horizontal" action="./Php/connection.php">
          <h5 class="">Connexion</h5>
          <input type="text" name="login" id="login" placeholder="Identifiant"/>
          <input type="password" name="password" id="password" placeholder="Mot de passe">
          <input type="submit" value="OK" id="loginbutton" class="btn btn-success"><br/>
          <a href="index.php?EX=recup" class="lostpass">Mot de passe perdu ?</a>
      </form>
  </div>-->

  <?php
  header ('Content-Type: text/html; charset=utf-8');
  require('Inc/require.inc.php');
  //require('Inc/globals.inc.php');
  $EX = isset($_REQUEST['EX']) ? $_REQUEST['EX'] : 'home';
  if(isset($_REQUEST['idPrev'])){
      $idPrev= $_REQUEST['idPrev'];
      $idNext= $_REQUEST['idNext'];
  }
  switch($EX)
  {
      case 'home'      : home();       break;
      case 'searchFacility'      : searchFacility();       break;
      case 'createFacility'      : createFacility();       break;
      case 'deleteFacility'      : deleteFacility();       break;
      case 'searchFighter'      : searchFighter();       break;
      case 'createFighter'      : createFighter();       break;
      case 'deleteFighter'      : deleteFighter();       break;
      case 'searchItem'      : searchItem();       break;
      case 'createItem'      : createItem();       break;
      case 'deleteItem'      : deleteItem();       break;
      case 'searchPlayer'      : searchPlayer();       break;
      case 'deletePlayer'      : deletePlayer();       break;
      case 'searchCenter'      : searchCenter();       break;
      case 'createCenter'      : createCenter();       break;
      case 'deleteCenter'      : deleteCenter();       break;
      case 'searchClub'      : searchClub();       break;
      case 'createClub'      : createClub();       break;
      case 'deleteClub'      : deleteClub();       break;
      case 'searchCompetition'      : searchCompetition();       break;
      case 'createCompetition'      : createCompetition();       break;
      case 'deleteCompetition'      : deleteCompetition();       break;
      case 'admin'      : admin();       break;
      default : home();
  }
  require('./View/layout.view.php');
  function home()
  {
      global $page;
      $page['title'] = 'Login';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = 'Html/accueil.php';
  }
  function searchFacility()
  {
      global $page;
      $page['title'] = 'Recherche d\'infrastructure';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/searchFacility.php';
  }
  function createFacility()
  {
      global $page;
      $page['title'] = 'Creation d\'une infrastructure';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/createFacility.php';
  }
  function deleteFacility()
  {
      global $page;
      $page['title'] = 'Supression d\'une infrastructure';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/deleteFacility.php';
  }

  function searchFighter()
  {
      global $page;
      $page['title'] = 'Recherche de combattant';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/searchFighter.php';
  }
  function createFighter()
  {
      global $page;
      $page['title'] = 'Creation d\'un combattant';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/createFighter.php';
  }
  function deleteFighter()
  {
      global $page;
      $page['title'] = 'Supression d\'un combattant';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/deleteFighter.php';
  }

  function searchItem()
  {
      global $page;
      $page['title'] = 'Recherche d\'un objet';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/searchItem.php';
  }
  function createItem()
  {
      global $page;
      $page['title'] = 'Creation d\'un objet';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/createItem.php';
  }
  function deleteItem()
  {
      global $page;
      $page['title'] = 'Supression d\'un objet';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/deleteItem.php';
  }

  function deletePlayer()
  {
      global $page;
      $page['title'] = 'Supression d\'un joueur';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/deletePlayer.php';
  }

  function searchPlayer()
  {
      global $page;
      $page['title'] = 'Recherche d\'un joueur';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/searchPlayer.php';
  }


  function searchCenter()
  {
      global $page;
      $page['title'] = 'Recherche d\'un centre';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/searchCenter.php';
  }
  function createCenter()
  {
      global $page;
      $page['title'] = 'Creation d\'un centre';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/createCenter.php';
  }
  function deleteCenter()
  {
      global $page;
      $page['title'] = 'Supression d\'un centre';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/deleteCenter.php';
  }

  function searchClub()
  {
      global $page;
      $page['title'] = 'Recherche d\'un club';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/searchClub.php';
  }
  function createClub()
  {
      global $page;
      $page['title'] = 'Creation d\'un club';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/createClub.php';
  }
  function deleteClub()
  {
      global $page;
      $page['title'] = 'Supression d\'un club';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/deleteClub.php';
  }

  function searchCompetition()
  {
      global $page;
      $page['title'] = 'Recherche d\'un concours';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/searchCompetition.php';
  }
  function createCompetition()
  {
      global $page;
      $page['title'] = 'Creation d\'un concours';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/createCompetition.php';
  }
  function deleteCompetition()
  {
      global $page;
      $page['title'] = 'Supression d\'un concours';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/deleteCompetition.php';
  }
  function admin()
  {
      global $page;
      $page['title'] = 'Administration';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/admin.php';
  }
  ?>
