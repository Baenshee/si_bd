<?php

if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

$club= new MClub($id);
    $name = $club->getName();
    $price = $club->getPrice();
    $fee = $club->getFee();
    $capacity = $club->getCapacity();
    $description = $club->getDescription();

?>

<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h2>Edition d'un club</h2>
        </div>
        <form class="form-horizontal" action="index.php?EX=updateAClub&id=<?php echo $id?>" method="post">

            <div class="control-group">
                <label class="control-label">Nom</label>
                <div class="controls">
                    <input name="NAME" id="name" type="text"  placeholder="Nom" value="<?php echo !empty($name)?$name:'';?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Capacité</label>
                <div class="controls">
                    <input name="CAPACITY" id="capacity" type="text"  placeholder="Capacité" value="<?php echo !empty($capacity)?$capacity:'';?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Prix</label>
                <div class="controls">
                    <input name="PRICE" id="price" type="text"  placeholder="Prix" value="<?php echo !empty($price)?$price:'';?>">
                </div>
            </div>


            <div class="control-group">
                <label class="control-label">Prix de l'abonnement</label>
                <div class="controls">
                    <input name="FEE" id="fee" type="text"  placeholder="Prix de l'abonnement" value="<?php echo !empty($fee)?$fee:'';?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                    <input name="DESCRIPTION" id="description" type="text"  placeholder="Description" value="<?php echo !empty($description)?$description:'';?>">
                </div>
            </div>

            <div class="form-actions">
                </br></br>
                <button type="submit" class="btn btn-success">Edition</button>
                <a href="./index.php?EX=searchClub"><button type="button" class="btn">Retour</button></a>
            </div>
        </form>
    </div>

</div> <!-- /container -->