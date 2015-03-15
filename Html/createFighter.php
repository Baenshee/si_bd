<?php

$i=0;
$pdo = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
$races = $pdo -> getAllRaces();
foreach($racesList as $line){
    $races[$i]['ID']=$line['ID'];
    $races[$i]['NAME']=$line['NAME'];
    $i++;
}
$i=0;

if(isset($_POST['RACE'])) {
    $race = $_POST['RACE'];
    $matricule = explode('', $race);
    $name = $matricule[0] . rand(100, 999);
    while(isset($_POST[$name])) {
        $name = $matricule[0] . rand(100, 999);
    }
    if(!isset($_POST['RESILIENCE'])) {
        $resilience = rand(0, 100);
    }
    else {
        $resilience = $_POST['RESILIENCE'];
    }
    if(!isset($_POST['VITALITY'])) {
        $vitality = rand(0, 100);
    }
    else {
        $vitality = $_POST['VITALITY'];
    }
    if(!isset($_POST['JUMPINGHEIGHT'])) {
        $jumpingheight = rand(0, 100);
    }
    else {
        $jumpingheight = $_POST['JUMPINGHEIGHT'];
    }
    if(!isset($_POST['SPEED'])) {
        $speed = rand(0, 100);
    }
    else {
        $speed = $_POST['SPEED'];
    }
    if(!isset($_POST['STRENGTH'])) {
        $strength = rand(0, 100);
    }
    else {
        $strength = $_POST['STRENGTH'];
    }
    if(!isset($_POST['INTELLECT'])) {
        $intellect = rand(0, 100);
    }
    else {
        $intellect = $_POST['INTELLECT'];
    }
    if(!isset($_POST['RESILIENCE'])) {
        $resilience = rand(0, 100);
    }
    else {
        $resilience = $_POST['RESILIENCE'];
    }
    $health = 0;
    $stress = 0;
    $exhaustion = 0;
    $hunger = 0;
    $experience = 0;
    $generalstate =
    $dentalhygiene = rand(0, 10);
    $sanity = rand(0, 10);
    $cannibal = rand(0,1) == 1;
    $alive = true;
    $description = $_POST['DESCRIPTION'];
    $price = $_POST['PRICE']; //pas de random, calculer par rapport aux stats si jamais il n'est pas spécifié (ou tout le temps?)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO FIGHTER (NAME, RACE, RESILIENCE, VITALITY, JUMPINGHEIGHT, SPEED, STRENGTH, INTELLECT, HEALTH, STRESS, EXHAUSTION, HUNGER, EXPERIENCE, GENERALSTATE, DENTALHYGIENE, SANITY, CANNIBAL, ALIVE, DESCRIPTION, PRICE) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($name, $race, $resilience, $vitality, $jumpingheight, $speed, $strength, $intellect, $health, $stress, $exhaustion, $hunger, $experience, $generalstate, $dentalhygiene, $sanity, $cannibal, $alive, $description, $price));
    $id= $pdo->lastInsertId();
    echo $id;
    header("./index.php?EX=createFighter&id=".$id);
}

?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h2>Création d'un esclave</h2>
        </div>
        <form class="form-horizontal" action="index.php?EX=createFighter" method="post">

            <div class="control-group">
                <label class="control-label">Race</label>
                </br>
                <select class="controls" name="RACE" type="text">
                    <?php
                        echo('<option></option>');
                        foreach ($races as $key => $rac) {
                            echo('<option value ='.$rac['ID'].'>'.$rac['NAME'].'</option>');
                        }
                    ?>
                </select>
            </div>

            <div class="control-group">
                <label class="control-label">Résilience</label>
                <div class="controls">
                    <input name="RESILIENCE" id="resilience" type="text"  placeholder="Résilience" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Vitalité</label>
                <div class="controls">
                    <input name="VITALITY" id="vitality" type="text"  placeholder="Vitalité" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Hauteur de saut</label>
                <div class="controls">
                    <input name="JUMPINGHEIGHT" id="jumpingheight" type="text"  placeholder="Hauteur de saut" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Vitesse</label>
                <div class="controls">
                    <input name="SPEED" id="speed" type="text"  placeholder="Vitesse" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Force</label>
                <div class="controls">
                    <input name="STRENGTH" id="strength" type="text"  placeholder="Force" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Intelligence</label>
                <div class="controls">
                    <input name="INTELLECT" id="intellect" type="text"  placeholder="Intelligence" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                    <input name="DESCRIPTION" id="description" type="text"  placeholder="Description" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Prix</label>
                <div class="controls">
                    <input name="PRICE" id="price" type="text"  placeholder="Prix" value="">
                </div>
            </div>

            <div class="form-actions">
                </br></br>
                <button type="submit" class="btn btn-success">Création</button>
                <a href="./index.php?EX=createFighter"><button type="button" class="btn">Retour</button></a>
                </div>
        </form>
    </div>

</div> <!-- /container -->