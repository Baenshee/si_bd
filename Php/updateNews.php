<?php
$id = null;
if (!isset($_SESSION)) { session_start(); }
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if ( !empty($_POST)) {
    $headline = $_POST['HEADLINE'];
    $content = $_POST['CONTENT'];
    $id_competition = $_POST['ID_COMPETITION'];
    // update data
    $pdo = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE news set headline = ?, content = ?, id_competition = ? WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($headline, $content, $id_competition, $id));
    header("Location: ./index.php?EX=searchNews");
}
