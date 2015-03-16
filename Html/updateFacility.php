<?php

if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

$facility= new MFacility($id);
    $name = $facility->getName();
    $level = $facility->getLevel();
    $price = $facility->getPrice();
    $itemCapacity = $facility->getItemcapacity();
    $fighterCapacity= $facility->getFightercapacity();
    $description = $facility->getDescription();

?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h2>Edition d'une infrastructure</h2>
        </div>
        <form class="form-horizontal" action="index.php?EX=updateAFacility&id=<?php echo $id?>" method="post">

            <div class="control-group">
                <label class="control-label">Nom</label>
                <div class="controls">
                    <input name="NAME" id="name" type="text"  placeholder="Nom" value="<?php echo !empty($name)?$name:'';?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Niveau</label>
                <div class="controls">
                    <input name="LEVEL" id="level" type="text"  placeholder="Niveau" value="<?php echo !empty($level)?$level:'';?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Capacité d'objets</label>
                <div class="controls">
                    <input name="ITEMCAPACITY" id="itemCapacity" type="text"  placeholder="Capacité d'objets" value="<?php echo !empty($itemCapacity)?$itemCapacity:'';?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Capacité d'esclaves</label>
                <div class="controls">
                    <input name="FIGHTERCAPACITY" id="fighterCapacity" type="text"  placeholder="Capacité d'esclaves" value="<?php echo !empty($fighterCapacity)?$fighterCapacity:'';?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Prix</label>
                <div class="controls">
                    <input name="PRICE" id="price" type="text"  placeholder="Prix" value="<?php echo !empty($price)?$price:'';?>">
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
                <a href="./index.php?EX=searchFacility"><button type="button" class="btn">Retour</button></a>
            </div>
        </form>
    </div>

</div> <!-- /container -->