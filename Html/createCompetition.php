<?php

$pdo = new MDBase();

if(isset($_POST['NAME'])) {
    $name = $_POST['NAME'];
    $capacity = $_POST['CAPACITY'];
    $lethality = $_POST['LETHALITY'];
    $startingdate = $_POST['STARTINGDATE'];
    $endingdate = $_POST['ENDINGDATE'];
    $description = $_POST['DESCRIPTION'];
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO competition (name, capacity, lethality, startingDate, endingDate, description) values(?,?,?,?,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($name, $capacity, $lethality, $startingdate, $endingdate, $description));
    $id= $pdo->lastInsertId();
    header("./index.php?EX=searchCompetition");
}

$i=0;
/*$familiesList = $pdo -> getAllFacilities_families();
foreach($familiesList as $line){
    $families[$i]['ID']=$line['ID'];
    $families[$i]['NAME']=$line['NAME'];
    $i++;
}*/
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
                <label class="control-label">Mortalité</label>
                </br>
                <select class="controls" name="LETHALITY" type="text">
                    <option value='1'>Oui</option>
                    <option value='0'>Non</option>
                </select>
            </div>

            <div class="control-group">
                <label class="control-label">Capacité</label>
                <div class="controls">
                    <input name="CAPACITY" id="capacity" type="text"  placeholder="Capacité" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                    <input name="DESCRIPTION" id="description" type="text"  placeholder="Description" value="">
                </div>
            </div>

            <div class="form-actions">
                </br></br>
                <button type="submit" class="btn btn-success">Création</button>
                <a href="./index.php?EX=createCompetition"><button type="button" class="btn">Retour</button></a>
            </div>
        </form>
    </div>

</div> <!-- /container -->