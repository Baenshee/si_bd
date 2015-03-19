<?php
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	if ( !empty($_POST)) {
        $name = $_POST['NAME'];
        $level = $_POST['LEVEL'];
        $price = $_POST['PRICE'];
        $itemCapacity = $_POST['ITEMCAPACITY'];
        $fighterCapacity = $_POST['FIGHTERCAPACITY'];
        $description = $_POST['DESCRIPTION'];
        // update data
    		$pdo = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE facility set name = ?, level = ?, price = ?, itemCapacity =?, fighterCapacity = ?, description = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($name, $level, $price, $itemCapacity, $fighterCapacity, $description, $id));
        header("Location: ./index.php?EX=searchFacility");
    }
