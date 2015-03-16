<?php
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	if ( !empty($_POST)) {
        $name = $_POST['NAME'];
        $startingDate = $_POST['STARTINGDATE'];
        $endingDate = $_POST['ENDINGDATE'];
        $capacity = $_POST['CAPACITY'];
        $lethality = $_POST['LETHALITY'];
        $description = $_POST['DESCRIPTION'];
        // update data
        $pdo = new MDBase();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE competition  set name = ?, startingDate = ?, endingDate = ?, capacity =?, lethality = ?, description = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($name, $startingDate, $endingDate, $capacity, $lethality, $description, $id));
        header("Location: ./index.php?EX=searchCompetition");
    }