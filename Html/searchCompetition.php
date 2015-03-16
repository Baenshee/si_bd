<?php

$nbLines=10;
if(isset($_POST['LINES']))
  $nbLines=$_POST['LINES'];
$nbPage=1;
if(isset($_GET['PAGE']))
  $nbPage=$_GET['PAGE'];
$offset= ($nbPage-1)*$nbLines;

?>

<div class="container">
    <div class="row">
        <h3>Search competition</h3>
    </div>


    <form class="form-horizontal" id="searchCompetition" action="./index.php?EX=searchCompetition" method="post">
        <div class="control-group">
            <label class="control-label">Nom</label>
            <div class="controls">
                <input name="NAME" id="name" type="text"  placeholder="Nom" pattern="^[a-zA-Z \.\,\+\-]*$" value="">
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
            <label class="control-label">Nombre de résultats à afficher</label>
            <div class="controls">
                <select class="controls" name="LINES" type="text">
                      <option value ='5' <?php if($nbLines == '5'){echo("selected");}?>>5</option>
                      <option value ='10'<?php if($nbLines == '10'){echo("selected");}?>>10</option>
                      <option value ='20'<?php if($nbLines == '20'){echo("selected");}?>>20</option>
                      <option value ='30'<?php if($nbLines == '30'){echo("selected");}?>>30</option>
                      <option value ='50'<?php if($nbLines == '50'){echo("selected");}?>>50</option>
                </select>

            </div>
        </div>  
        <div class="form-actions">
            </br>
            </br>
            <button type="submit" class="btn btn-success">Rechercher</button>

        </div>

    </form>

    <div class="row">


        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Lieu</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $pdo = new MDBase();
            if(isset($_POST['NAME'])) {
                $nom = $_POST['NAME'];
                $conditions = array();
                $params = array();
                if($nom) {
                    $conditions[] = "name LIKE '%". $nom. "%'";
                    $params[]= $nom;
                }
                if($_POST['STARTINGDATE']) {
                    $conditions[] = "startingDate". $_POST['STARTINGDATE']. "%'";
                    $params[] = $_POST['STARTINGDATE'];
                }
                if($_POST['ENDINGDATE']) {
                    $conditions[] = "endingDate = '". $_POST['ENDINGDATE']. "'";
                    $params[] = $_POST['ENDINGDATE'];
                }
                $where = " WHERE ".implode($conditions,' AND ');
                if(count($conditions) > 0) {
                    foreach ($pdo->query('SELECT Count(*) As NUM FROM competition'. $where) as $row) {
                        $rowNumber= $row['NUM'];
                    }
                    $sql = 'SELECT * FROM competition'. $where .' LIMIT '.$nbLines.' OFFSET '.$offset;
                }else {
                    foreach ($pdo->query('SELECT Count(*) As NUM FROM competition') as $row) {
                        $rowNumber= $row['NUM'];
                    }
                    $sql = 'SELECT * FROM competition order by name ASC LIMIT '.$nbLines.' OFFSET '.$offset;
                }

                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['name'] . '</td>';
                    echo '<td>'. $row['startingDate'] . '</td>';
                    echo '<td>'. $row['endingDate'] . '</td>';
                    echo '<td>'. $row['id_facility'] . '</td>';
                    echo '<td width=250>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-success" href="index.php?EX=updateCompetition&id='.$row['id'].'">Edit</a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-danger" href="index.php?EX=deleteCompetition&id='.$row['id'].'">Supprimer</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            }else {

                foreach ($pdo->query('SELECT Count(*) As NUM FROM competition') as $row) {
                    $rowNumber= $row['NUM'];
                }   

                $sql = 'SELECT * FROM competition order by name ASC LIMIT '.$nbLines.' OFFSET '.$offset;

                if(count($sql) > 0) {

                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>'. $row['name'] . '</td>';
                        echo '<td>'. $row['startingDate'] . '</td>';
                        echo '<td>'. $row['endingDate'] . '</td>';
                        echo '<td>'. $row['id_facility'] . '</td>';
                        echo '<td width=250>';
                        echo '&nbsp;';
                        echo '<a class="btn btn-success" href="index.php?EX=updateCompetition&id='.$row['id'].'">Edit</a>';
                        echo '&nbsp;';
                        echo '<a class="btn btn-danger" href="index.php?EX=deleteCompetition&id='.$row['id'].'">Supprimer</a>';
                        echo '</td>';
                        echo '</tr>';
                    }

                }

            }
            ?>

            </tbody>
        </table>
        <div class="control-group">
            <div class="controls">
            <?php
                $numberPages= ceil($rowNumber/$nbLines);
                if($numberPages!=0){

                    if($nbPage>3){                
                        echo '<button type="submit" class="changePageButton" form="searchCompetition" formaction="./index.php?EX=searchCompetition&PAGE=1">1</button>';   
                    }      
                    if($nbPage!=1){
                        echo '<button type="submit" class="changePageButton" form="searchCompetition" formaction="./index.php?EX=searchCompetition&PAGE='.($nbPage-1).'">'.($nbPage-1).'</button>';
                    } 
                    echo '<button type="submit" class="changePageButton" form="searchCompetition" formaction="./index.php?EX=searchCompetition&PAGE='.$nbPage.'">'.$nbPage.'</button>';  
                    if($nbPage!=$numberPages){
                        echo '<button type="submit" class="changePageButton" form="searchCompetition" formaction="./index.php?EX=searchCompetition&PAGE='.($nbPage+1).'">'.($nbPage+1).'</button>';
                    }            
                    if($nbPage<($numberPages-2)){
                        echo '<button type="submit" class="changePageButton" form="searchCompetition" formaction="./index.php?EX=searchCompetition&PAGE='.$numberPages.'">'.$numberPages.'</button>';
                    }

                }
            
            ?>
            </div>
        </div>              
    </div>
</div> <!-- /container -->
