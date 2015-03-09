<?php

if(isset($_POST['NAME'])) {
    $name = $_POST['NAME'];
    $capacity = $_POST['CAPACITY'];
    $lethality = $_POST['LETHALITY'];
    $startingdate = $_POST['STARTINGDATE'];
    $endingdate = $_POST['ENDINGDATE'];
    $description = $_POST['DESCRIPTION'];
    $idfacility = $_POST['FACILITY'];
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO COMPETITION (NAME, CAPACITY, LETHALITY, STARTINGDATE, ENDINGDATE, ID_FACILITY, DESCRIPTION) values(?,?,?,?,?,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($name, $capacity, $lethality, $startingdate, $endingdate, $idfacility, $description));
    $id= $pdo->lastInsertId();
    echo $id;
    header("./index.php?EX=createCompetition&id=".$id);
}

$i=0;
$pdo = new MDBase();
$facilities = $pdo -> getAllFacilities();
foreach($facilitiesList as $line){
    $facilities[$i]['ID']=$line['ID'];
    $facilities[$i]['NAME']=$line['NAME'];
    $i++;
}
$i=0;

$items = $pdo -> getAllItems();
foreach($itemsList as $line){
    $items[$i]['ID']=$line['ID'];
    $items[$i]['NAME']=$line['NAME'];
    $i++;
}
$i=0;

?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h2>Création d'un concours</h2>
        </div>
        <form class="form-horizontal" action="index.php?EX=createCompetition" method="post">

            <div class="control-group">
                <label class="control-label">Nom</label>
                <div class="controls">
                    <input name="NAME" id="name" type="text"  placeholder="Nom" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Capacité</label>
                <div class="controls">
                    <input name="CAPACITY" id="capacity" type="text"  placeholder="Capacité" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Mortalité</label>
                </br>
                <select class="controls" name="LETHALITY" type="text">
                    <option value ='true'>Oui</option>
                    <option value ='false'>Non</option>
                </select>
            </div>

            <div class="control-group">
                <label class="control-label">Date de départ</label>
                <div class="controls">
                    <input name="STARTINGDATE" id="startingdate" type="date" >
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Date de fin</label>
                <div class="controls">
                    <input name="ENDINGDATE" id="endingdate" type="date" >
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                    <input name="DESCRIPTION" id="description" type="text"  placeholder="Description" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Infrastructure accueillant l'évènement</label>
                </br>
                <select class="controls" name="FACILITY" type="text">
                    <?php
                    foreach ($facilities as $key => $facility) {
                        echo('<option value ='.$facility['ID'].'>'.$facility['NAME'].'</option>');
                    }
                    ?>
                </select>
            </div>

            <div class="control-group">
                <label class="control-label">Récompense</label>
                </br>
                <select class="controls" name="REWARD" type="text">
                <?php
                echo('<option></option>');
                foreach ($items as $key => $item) {
                    echo('<option value ='.$item['ID'].'>'.$item['NAME'].'</option>');
                }
                ?>
                </select>
            </div>

            <div class="form-actions">
                </br></br>
                <button type="submit" class="btn btn-success">Création</button>
                <a href="./index.php?EX=createCompetition"><button type="button" class="btn">Retour</button></a>
            </div>
        </form>
    </div>

</div> <!-- /container -->