<?php

if(isset($_POST['NAME'])) {
    $name = $_POST['NAME'];
    $itemCapacity = $_POST['ITEMCAPACITY'];
    $fighterCapacity = $_POST['FIGHTERCAPACITY'];
    $lvl = $_POST['LEVEL'];
    $price = $_POST['PRICE'];
    $family = $_POST['FACILITYFAMILY'];
    $description = $_POST['DESCRIPTION'];
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO FACILITY (NAME, LEVEL, FACILITYFAMILY, ITEMCAPACITY, FIGHTERCAPACITY, PRICE, DESCRIPTION) values(?,?,?,?,?,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($name, $lvl, $family, $itemCapacity, $fighterCapacity, $price, $description));
    $id= $pdo->lastInsertId();
    echo $id;
    header("./index.php?EX=createFacility&id=".$id);
}

$i=0;
$pdo = new MDBase();
$families = $pdo -> getAllFacilities_families();
foreach($familiesList as $line){
    $families[$i]['ID']=$line['ID'];
    $families[$i]['NAME']=$line['NAME'];
    $i++;
}
$i=0;

?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h2>Création d'une infrastructure</h2>
        </div>
        <form class="form-horizontal" action="index.php?EX=createFacility" method="post">

            <div class="control-group">
                <label class="control-label">Nom</label>
                <div class="controls">
                    <input name="NAME" id="name" type="text"  placeholder="Nom" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Niveau</label>
                <div class="controls">
                    <input name="LEVEL" id="level" type="text"  placeholder="Niveau" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Famille</label>
                </br>
                <select class="controls" name="FAMILY" type="text">
                    <?php
                    echo('<option></option>');
                    foreach ($families as $key => $fams) {
                        echo('<option value ='.$fams['ID'].'>'.$fams['NAME'].'</option>');
                    }
                    ?>
                </select>
            </div>

            <div class="control-group">
                <label class="control-label">Capacité d'objets</label>
                <div class="controls">
                    <input name="ITEMCAPACITY" id="itemCapacity" type="text"  placeholder="Capacité d'objets" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Capacité d'esclaves</label>
                <div class="controls">
                    <input name="FIGHTERCAPACITY" id="fighterCapacity" type="text"  placeholder="Capacité d'esclaves" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Prix</label>
                <div class="controls">
                    <input name="PRICE" id="price" type="text"  placeholder="Prix" value="">
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
                <a href="./index.php?EX=createFacility"><button type="button" class="btn">Retour</button></a>
            </div>
        </form>
    </div>

</div> <!-- /container -->