<?php

if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

$fighter= new MFighter($id);
    $race = $fighter->getRace();
    $vitality = $fighter->getVitality();
    $price = $fighter->getPrice();
    $resilience = $fighter->getResilience();
    $jumpingHeight= $fighter->getJumpingheight();
    $speed = $fighter->getSpeed();
    $strength = $fighter->getStrength();
    $description = $fighter->getDescription();
    $intellect = $fighter->getIntellect();

?>

<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h2>Edition d'un esclave</h2>
        </div>
        <form class="form-horizontal" action="index.php?EX=updateAFighter&id=<?php echo $id?>" method="post">

            <div class="control-group">
                <label class="control-label">Race</label>
                </br>
                <select class="controls" name="RACE" type="text">
                    <?php
                        echo('<option></option>');
                        foreach ($races as $key => $rac) {
                            if($rac['id']==$race)
                                echo('<option value ='.$rac['id'].' selected>'.$rac['name'].'</option>');
                            else
                                echo('<option value ='.$rac['id'].'>'.$rac['name'].'</option>');
                        }
                    ?>
                </select>
            </div>

            <div class="control-group">
                <label class="control-label">Résilience</label>
                <div class="controls">
                    <input name="RESILIENCE" id="resilience" type="text"  placeholder="Résilience" value="<?php echo !empty($resilience)?$resilience:'';?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Vitalité</label>
                <div class="controls">
                    <input name="VITALITY" id="vitality" type="text"  placeholder="Vitalité" value="<?php echo !empty($vitality)?$vitality:'';?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Hauteur de saut</label>
                <div class="controls">
                    <input name="JUMPINGHEIGHT" id="jumpingheight" type="text"  placeholder="Hauteur de saut" value="<?php echo !empty($jumpingHeight)?$jumpingHeight:'';?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Vitesse</label>
                <div class="controls">
                    <input name="SPEED" id="speed" type="text"  placeholder="Vitesse" value="<?php echo !empty($speed)?$speed:'';?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Force</label>
                <div class="controls">
                    <input name="STRENGTH" id="strength" type="text"  placeholder="Force" value="<?php echo !empty($strength)?$strength:'';?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Intelligence</label>
                <div class="controls">
                    <input name="INTELLECT" id="intellect" type="text"  placeholder="Intelligence" value="<?php echo !empty($intellect)?$intellect:'';?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                    <input name="DESCRIPTION" id="description" type="text"  placeholder="Description" value="<?php echo !empty($description)?$description:'';?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Prix</label>
                <div class="controls">
                    <input name="PRICE" id="price" type="text"  placeholder="Prix" value="<?php echo !empty($price)?$price:'';?>">
                </div>
            </div>

            <div class="form-actions">
                </br></br>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="./index.php?EX=searchFighter"><button type="button" class="btn">Retour</button></a>
                </div>
        </form>
    </div>


</div> <!-- /container -->