<?php
require_once('../Model/MDBase.mod.php');
$id = 0;
if ( !empty($_POST)) {
    // keep track post values
    $id = $_POST['id'];

    // delete data
    $pdo = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM COMPETITION WHERE ID = ?";
    $q = $pdo->prepare($sql);
    $q->execute();
    header("Location: index.php");
}
?>