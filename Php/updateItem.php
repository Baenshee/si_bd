<?php
	$id = null;
  if (!isset($_SESSION)) { session_start(); }
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	if ( !empty($_POST)) {
        $name = $_POST['NAME'];
        $level = $_POST['LEVEL'];
        $price = $_POST['PRICE'];
        $potency = $_POST['POTENCY'];
        $id_itemFamily = $_POST['FAMILY'];
        $description = $_POST['DESCRIPTION'];
        // update data
    		$pdo = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE items  set name = ?, level = ?, price = ?, potency =?, id_itemFamily = ?, description = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($name, $level, $price, $potency, $id_itemFamily, $description, $id));
        header("Location: ./index.php?EX=searchItem");
    }
