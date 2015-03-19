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
  if (!isset($_SESSION)) { session_start(); }
  //require('Inc/globals.inc.php');
  $EX = isset($_REQUEST['EX']) ? $_REQUEST['EX'] : 'home';
  if(!isset($_SESSION['USER'])){
    home();
  }
  else{
    switch($EX)
      {
        case 'home'      : home();       break;
        case 'searchFacility'      : searchFacility();       break;
        case 'createFacility'      : createFacility();       break;
        case 'deleteFacility'      : deleteFacility();       break;
        case 'updateAFacility'      : updateAFacility();       break;
        case 'updateFacility'      : updateFacility();       break;
        case 'searchFighter'      : searchFighter();       break;
        case 'createFighter'      : createFighter();       break;
        case 'deleteFighter'      : deleteFighter();       break;
        case 'updateAFighter'      : updateAFighter();       break;
        case 'updateFighter'      : updateFighter();       break;
        case 'searchItem'      : searchItem();       break;
        case 'createItem'      : createItem();       break;
        case 'deleteItem'      : deleteItem();       break;
        case 'updateAnItem'      : updateAnItem();       break;
        case 'updateItem'      : updateItem();       break;
        case 'searchPlayer'      : searchPlayer();       break;
        case 'deletePlayer'      : deletePlayer();       break;
        case 'searchCenter'      : searchCenter();       break;
        case 'createCenter'      : createCenter();       break;
        case 'deleteCenter'      : deleteCenter();       break;
        case 'updateACenter'      : updateACenter();       break;
        case 'updateCenter'      : updateCenter();       break;
        case 'searchClub'      : searchClub();       break;
        case 'createClub'      : createClub();       break;
        case 'deleteClub'      : deleteClub();       break;
        case 'updateAClub'      : updateAClub();       break;
        case 'updateClub'      : updateClub();       break;
        case 'searchCompetition'      : searchCompetition();       break;
        case 'createCompetition'      : createCompetition();       break;
        case 'deleteCompetition'      : deleteCompetition();       break;
        case 'updateACompetition'      : updateACompetition();       break;
        case 'updateCompetition'      : updateCompetition();       break;
        case 'searchNews'      : searchNews();       break;
        case 'createNews'      : createNews();       break;
        case 'deleteNews'      : deleteNews();       break;
        case 'updateANews'      : updateANews();       break;
        case 'updateNews'      : updateNews();       break;
        case 'deconnection'      : deconnection();       break;
        case 'admin'      : admin();       break;
        default : home();
      }
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
  function updateAFacility()
  {
      global $page;
      $page['title'] = 'Edition d\'une infrastructure';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Php/updateFacility.php';
  }
  function updateFacility()
  {
      global $page;
      $page['title'] = 'Edition d\'une infrastructure';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/updateFacility.php';
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
  function updateAFighter()
  {
      global $page;
      $page['title'] = 'Edition d\'un combattant';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Php/updateFighter.php';
  }
  function updateFighter()
  {
      global $page;
      $page['title'] = 'Edition d\'un combattant';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/updateFighter.php';
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
  function updateAnItem()
  {
      global $page;
      $page['title'] = 'Edition d\'un objet';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Php/updateItem.php';
  }
  function updateItem()
  {
      global $page;
      $page['title'] = 'Edition d\'un objet';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/updateItem.php';
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
  function updateACenter()
  {
      global $page;
      $page['title'] = 'Edition d\'un centre';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Php/updateCenter.php';
  }
  function updateCenter()
  {
      global $page;
      $page['title'] = 'Edition d\'un centre';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/updateCenter.php';
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
  function updateAClub()
  {
      global $page;
      $page['title'] = 'Edition d\'un club';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Php/updateClub.php';
  }
  function updateClub()
  {
      global $page;
      $page['title'] = 'Edition d\'un club';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/updateClub.php';
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
  function updateACompetition()
  {
      global $page;
      $page['title'] = 'Edition d\'un concours';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Php/updateCompetition.php';
  }
  function updateCompetition()
  {
      global $page;
      $page['title'] = 'Edition d\'un concours';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/updateCompetition.php';
  }


  function searchNews()
  {
      global $page;
      $page['title'] = 'Recherche d\'un article';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/searchNews.php';
  }
  function createNews()
  {
      global $page;
      $page['title'] = 'Creation d\'un article';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/createNews.php';
  }
  function deleteNews()
  {
      global $page;
      $page['title'] = 'Supression d\'un article';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/deleteNews.php';
  }
  function updateANews()
  {
      global $page;
      $page['title'] = 'Edition d\'un article';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Php/updateNews.php';
  }
  function updateNews()
  {
      global $page;
      $page['title'] = 'Edition d\'un article';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/updateNews.php';
  }


  function admin()
  {
      global $page;
      $page['title'] = 'Administration';
      $page['class'] = 'VHtml';
      $page['method'] = 'showHtml';
      $page['arg'] = './Html/admin.php';
  }
  function deconnection()
  {
    global $page;
    unset($_SESSION['USER']);
    session_destroy();
    $page['title'] = 'Retour après déco';
    $page['class'] = 'VHtml';
    $page['method'] = 'showHtml';
    $page['arg'] = 'Html/accueil.php';
  }
  ?>
