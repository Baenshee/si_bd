<?php

    require_once('../Model/MDBase.mod.php');
    if(isset($_POST['login'])){
    $db=new MDBase($_POST['login'],$_POST['password']);
    $db->connect();
  }
  header("Location: ../index.php")
?>
