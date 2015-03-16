<?php

$pdo = new MDBase();

if(isset($_POST['NAME'])) {
    $name = $_POST['NAME'];
    $capacity = $_POST['CAPACITY'];
    $fee = $_POST['FEE'];
    $price = $_POST['PRICE'];
    $description = $_POST['DESCRIPTION'];
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO club (name, capacity, fee, price, description) values(?,?,?,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($name, $capacity, $fee, $price, $description));
    $id= $pdo->lastInsertId();
    header("./index.php?EX=searchClub");
}

?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h2>Création d'un club</h2>
        </div>
        <form class="form-horizontal" action="index.php?EX=createClub" method="post">

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
                <label class="control-label">Prix de l'abonnement</label>
                <div class="controls">
                    <input name="FEE" id="fee" type="text"  placeholder="Prix de l'abonnement" value="">
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
                <a href="./index.php?EX=createClub"><button type="button" class="btn">Retour</button></a>
            </div>
        </form>
    </div>

</div> <!-- /container -->