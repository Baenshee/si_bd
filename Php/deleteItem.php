<?php
require_once('../Model/MDBase.mod.php');
$id = 0;
  if (!isset($_SESSION)) { session_start(); }
if ( !empty($_POST)) {
    // keep track post values
    $id = $_POST['id'];
var_dump($_SESSION);
    // delete data
    $pdo = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM items  WHERE id = :id";
    $q = $pdo->prepare($sql);
    $q->bindParam(":id", $id, PDO::PARAM_INT);
	$q->execute();
    header("Location: ../index.php?EX=searchItem");
}
?>
