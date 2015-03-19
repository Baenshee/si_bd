<?php

    require_once('../Model/MDBase.mod.php');
    if(isset($_POST['LOGIN'])){
    $db=new MDBase($_POST['LOGIN'],$_POST['PASS']);
    $db->connect();
  }
  header("Location: ../index.php")
?>
