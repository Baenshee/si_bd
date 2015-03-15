<?php

if(isset($_POST['NAME'])) {
    $name = $_POST['NAME'];
    $capacity = $_POST['CAPACITY'];
    $price = $_POST['PRICE'];
    $description = $_POST['DESCRIPTION'];
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO CENTER (NAME, CAPACITY, PRICE, DESCRIPTION) values(?,?,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($name, $capacity, $price, $description));
    $id= $pdo->lastInsertId();
    echo $id;
    header("./index.php?EX=createCenter&id=".$id);
}

$pdo = new MDBase($_SESSION['USER'],$_SESSION['PASS']);

?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h2>Création d'un centre</h2>
        </div>
        <form class="form-horizontal" action="index.php?EX=createCenter" method="post">

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
                <a href="./index.php?EX=createCenter"><button type="button" class="btn">Retour</button></a>
            </div>
        </form>
    </div>

</div> <!-- /container -->
