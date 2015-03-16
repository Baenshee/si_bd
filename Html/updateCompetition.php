<?php

if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

$competition= new MCompetition($id);
    $name = $competition->getName();
    $capacity = $competition->getCapacity();
    $startingDate = $competition->getStartingdate();
    $endingDate = $competition->getEndingdate();
    $lethality= $competition->getLethality();
    $description = $competition->getDescription();

?>

<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h2>Edition d'un concours</h2>
        </div>
        <form class="form-horizontal" action="index.php?EX=updateACompetition&id=<?php echo $id?>" method="post">

            <div class="control-group">
                <label class="control-label">Nom</label>
                <div class="controls">
                    <input name="NAME" id="name" type="text"  placeholder="Nom" value="<?php echo !empty($name)?$name:'';?>">
                </div>
            </div>

        <div class="control-group">
            <label class="control-label">Date de départ</label>
            <div class="controls">
                <input name="STARTINGDATE" id="startingdate" type="date" value="<?php echo !empty($startingDate)?$startingDate:'';?>" >
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Date de fin</label>
            <div class="controls">
                <input name="ENDINGDATE" id="endingdate" type="date" value="<?php echo !empty($endingDate)?$endingDate:'';?>">
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
                    <input name="CAPACITY" id="capacity" type="text"  placeholder="Capacité" value="<?php echo !empty($capacity)?$capacity:'';?>">
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
                <button type="submit" class="btn btn-success">Update</button>
                <a href="./index.php?EX=search"><button type="button" class="btn">Retour</button></a>
            </div>
        </form>
    </div>

</div> <!-- /container -->