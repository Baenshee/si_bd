<?php

$pdo = new MDBase($_SESSION['USER'],$_SESSION['PASS']);

if(isset($_POST['HEADLINE'])) {
    $headline = $_POST['HEADLINE'];
    $photo = $_POST['PHOTO'];
    $content = $_POST['CONTENT'];
    $id_competition = $_POST['ID_COMPETITION'];
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO news (headline, photo, content, $id_competition) values(?,?,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($headline, $photo, $content, $id_competition));
    $id= $pdo->lastInsertId();
    header("./index.php?EX=searchNews");

    $i=0;
    $competitionsList = $pdo -> getAllCompetitions();
    foreach($competitionsList as $line){
        $competitions[$i]['id']=$line['id'];
        $competitions[$i]['name']=$line['name'];
        $i++;
    }
    $i=0;

}




?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h2>Création d'un article</h2>
        </div>
        <form class="form-horizontal" action="index.php?EX=createNews" method="post">

            <div class="control-group">
                <label class="control-label">A la une</label>
                <div class="controls">
                    <input name="HEADLINE" id="headline" type="text"  placeholder="A la une" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Photo</label>
                <div class="controls">
                    <input name="PHOTO" id="photo" type="file"  placeholder="Photo" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Contenu</label>
                <div class="controls">
                    <input name="CONTENT" id="content" type="textarea"  placeholder="Contenu" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Concours</label>
                <div class="controls">
                    </br>
                    <select class="controls" name="COMPETITON" type="text">
                        <?php
                        echo('<option></option>');
                        foreach ($competitions as $key => $comps) {
                            echo('<option value ='.$comps['id'].'>'.$comps['name'].'</option>');
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-actions">
                </br></br>
                <button type="submit" class="btn btn-success">Création</button>
                <a href="./index.php?EX=createNews"><button type="button" class="btn">Retour</button></a>
            </div>
        </form>
    </div>

</div> <!-- /container -->
