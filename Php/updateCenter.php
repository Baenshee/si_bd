<?php
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	if ( !empty($_POST)) {
        $name = $_POST['NAME'];
        $capacity = $_POST['CAPACITY'];
        $price = $_POST['PRICE'];
        $description = $_POST['DESCRIPTION'];
        // update data
    		$pdo = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE center  set name = ?, capacity =?, price = ?, description = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($name, $capacity, $price, $description, $id));
        header("Location: ./index.php?EX=searchCenter");
    }
