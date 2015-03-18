<?php

if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

$news= new MNews($id);
$headline = $news->getHeadline();
$content = $news->getContent();
$id_competition = $news->getId_competition();

$i=0;
$competitionsList = $pdo -> getAllCompetitions();
foreach($competitionsList as $line){
    $competitions[$i]['id']=$line['id'];
    $competitions[$i]['name']=$line['name'];
    $i++;
}

?>

<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h2>Edition d'un article</h2>
        </div>
        <form class="form-horizontal" action="index.php?EX=updateANews&id=<?php echo $id?>" method="post">

            <div class="control-group">
                <label class="control-label">A la une</label>
                <div class="controls">
                    <input name="HEADLINE" id="headline" type="text"  placeholder="A la une" value="<?php echo !empty($headline)?$headline:'';?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Contenu</label>
                <div class="controls">
                    <input name="CONTENT" id="content" type="textarea"  placeholder="Contenu" value="<?php echo !empty($content)?$content:'';?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Concours</label>
                </br>
                <select class="controls" name="COMPETITION" type="text">
                    <?php
                    echo('<option></option>');
                    foreach ($competitions as $key => $comps) {
                        if($comps['id']==$id_competition)
                            echo('<option value ='.$comps['id'].' selected>'.$comps['name'].'</option>');
                        else
                            echo('<option value ='.$comps['id'].'>'.$comps['name'].'</option>');
                    }
                    ?>
                </select>
            </div>

            <div class="form-actions">
                </br></br>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="./index.php?EX=searchNews"><button type="button" class="btn">Retour</button></a>
            </div>
        </form>
    </div>