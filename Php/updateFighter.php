<?php
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	if ( !empty($_POST)) {
        $race = $_POST['RACE'];
        $resilience = $_POST['RESILIENCE'];
        $price = $_POST['PRICE'];
        $vitality = $_POST['VITALITY'];
        $jumpingHeight = $_POST['JUMPINGHEIGHT'];
        $speed = $_POST['SPEED'];
        $intellect = $_POST['INTELLECT'];
        $strength = $_POST['STRENGTH'];
        $description = $_POST['DESCRIPTION'];
        // update data
    		$pdo = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE fighter  set id_race = ?, resilience = ?, price = ?, vitality =?, jumpingHeight = ?, speed = ?, intellect = ?, strength = ?,description = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($race, $resilience, $price, $vitality, $jumpingHeight, $speed, $intellect, $strength, $description, $id));
        header("Location: ./index.php?EX=searchFighter");
    }
