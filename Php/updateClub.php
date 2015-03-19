<?php
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	if ( !empty($_POST)) {
        $name = $_POST['NAME'];
        $capacity = $_POST['CAPACITY'];
        $fee = $_POST['FEE'];
        $price = $_POST['PRICE'];
        $description = $_POST['DESCRIPTION'];
        // update data
    		$pdo = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE club  set name = ?, capacity =?, price = ?, fee = ?, description = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($name, $capacity, $price, $fee, $description, $id));
        header("Location: ./index.php?EX=searchClub");
    }
