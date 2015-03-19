<?php

$i=0;
$pdo = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
$racesList = $pdo -> getAllRaces();
foreach($racesList as $line){
    $races[$i]['id']=$line['id'];
    $races[$i]['name']=$line['name'];
    $i++;
}
$i=0;

if(isset($_POST['RACE'])) {
    $race = $_POST['RACE'];
    $matricule = explode(' ', $race);
    $name = $matricule[0] . rand(100, 999);
    while(isset($_POST[$name])) {
        $name = $matricule[0] . rand(100, 999);
    }
    if(!isset($_POST['RESILIENCE'])) {
        $resilience = $_POST['RESILIENCE'];
    }
    else {
        $resilience = rand(0, 10);
    }
    if(!isset($_POST['VITALITY'])) {
        $vitality = $_POST['VITALITY'];
    }
    else {
        $vitality = rand(0, 10);
    }
    if(!isset($_POST['JUMPINGHEIGHT'])) {
        $jumpingheight = $_POST['JUMPINGHEIGHT'];
    }
    else {
        $jumpingheight = rand(0, 10);
    }
    if(!isset($_POST['SPEED'])) {
        $speed = $_POST['SPEED'];
    }
    else {
        $speed = rand(0, 10);
    }
    if(!isset($_POST['STRENGTH'])) {
        $strength = $_POST['STRENGTH'];
    }
    else {
        $strength = rand(0, 10);
    }
    if(!isset($_POST['INTELLECT'])) {
        $intellect = $_POST['INTELLECT'];
    }
    else {
        $intellect = rand(0, 10);
    }
    if(!isset($_POST['RESILIENCE'])) {
        $resilience = $_POST['RESILIENCE'];
    }
    else {
        $resilience = rand(0, 10);
    }
    $health = 0;
    $stress = 0;
    $exhaustion = 0;
    $hunger = 0;
    $experience = 0;
    $generalstate = 10;
    $dentalhygiene = rand(0, 10);
    $sanity = rand(0, 10);
    $cannibal = rand(0,1) == 1;
    $alive = true;
    $description = $_POST['DESCRIPTION'];
    $price = $_POST['PRICE']; //pas de random, calculer par rapport aux stats si jamais il n'est pas spécifié (ou tout le temps?)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO fighter (serialNumber, id_race, resilience, vitality, jumpingHeight, speed, strength, intellect, health, stress, exhaustion, hunger, experience, generalState, dentalHygiene, sanity, cannibal, alive, description, price) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($name, $race, $resilience, $vitality, $jumpingheight, $speed, $strength, $intellect, $health, $stress, $exhaustion, $hunger, $experience, $generalstate, $dentalhygiene, $sanity, $cannibal, $alive, $description, $price));
    $id= $pdo->lastInsertId();
    header("./index.php?EX=searchFighter");
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
                            echo('<option value ='.$rac['id'].'>'.$rac['name'].'</option>');
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
