<?php

$nbLines=10;
if(isset($_POST['LINES']))
  $nbLines=$_POST['LINES'];
$nbPage=1;
if(isset($_GET['PAGE']))
  $nbPage=$_GET['PAGE'];
$offset= ($nbPage-1)*$nbLines;

$i=0;
$pdo = new MDBase();

$racesList = $pdo -> getAllRaces();
foreach($racesList as $line){
    $races[$i]['id']=$line['id'];
    $races[$i]['name']=$line['name'];
    $i++;
}
$i=0;

?>

<div class="container">
    <div class="row">
        <h3>Search fighter</h3>
    </div>


    <form class="form-horizontal" id="searchFighter" action="./index.php?EX=searchFighter" method="post">
        <div class="control-group">
            <label class="control-label">Nom</label>
            <div class="controls">
                <input name="NAME" id="name" type="text"  placeholder="Nom" pattern="^[a-zA-Z \.\,\+\-]*$" value="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Niveau</label>
            <div class="controls">
                <input name="LEVEL" id="level" type="text"  placeholder="Niveau" value="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Race</label>
            </br>
            <select class="controls" name="RACE" type="text">
                <?php
                echo('<option></option>');
                foreach ($races as $key => $race) {
                    echo('<option value ='.$race['id'].'>'.$race['name'].'</option>');
                }
                ?>
            </select>
        </div>
        <div class="control-group">
            <label class="control-label">Prix</label>
            <div class="controls">
                <input name="PRICE" id="price" type="text"  placeholder="Prix" value="">
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
                <th>Race</th>
                <th>Resi</th>
                <th>Vita</th>
                <th>Jump</th>
                <th>Speed</th>
                <th>Str</th>
                <th>Int</th>
                <th>Health</th>
                <th>Stress</th>
                <th>Exh</th>
                <th>Hung</th>
                <th>Xp</th>
                <th>Lvl</th>
                <th>GeSt</th>
                <th>Dent</th>
                <th>Sanity</th>
                <th>Can</th>
                <th>Lif</th>
                <th>Prix</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if(isset($_POST['NAME'])) {
                $nom = $_POST['NAME'];
                $conditions = array();
                $params = array();
                if($nom) {
                    $conditions[] = "serialNumber LIKE '%". $nom. "%'";
                    $params[]= $nom;
                }
                if($_POST['RACE']) {
                    $conditions[] = "id_race = '". $_POST['RACE']. "'";
                    $params[] = $_POST['RACE'];
                }
                if($_POST['LEVEL']) {
                    $conditions[] = "id_Level = '". $_POST['LEVEL']. "'";
                    $params[] = $_POST['LEVEL'];
                }
                if($_POST['PRICE']) {
                    $conditions[] = "price = '". $_POST['PRICE']. "'";
                    $params[] = $_POST['PRICE'];
                }
                $where = " WHERE ".implode($conditions,' AND ');
                if(count($conditions) > 0) {
                    foreach ($pdo->query('SELECT Count(*) As NUM FROM fighter'. $where) as $row) {
                        $rowNumber= $row['NUM'];
                    }
                    $sql = 'SELECT * FROM fighter'. $where .' LIMIT '.$nbLines.' OFFSET '.$offset;
                }else {
                    foreach ($pdo->query('SELECT Count(*) As NUM FROM fighter') as $row) {
                        $rowNumber= $row['NUM'];
                    }
                    $sql = 'SELECT * FROM fighter order by serialNumber ASC LIMIT '.$nbLines.' OFFSET '.$offset;
                }

                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['serialNumber'] . '</td>';
                    echo '<td>'. $row['id_race'] . '</td>';
                    echo '<td>'. $row['resilience'] . '</td>';
                    echo '<td>'. $row['vitality'] . '</td>';
                    echo '<td>'. $row['jumpingHeight'] . '</td>';
                    echo '<td>'. $row['speed'] . '</td>';
                    echo '<td>'. $row['strength'] . '</td>';
                    echo '<td>'. $row['intellect'] . '</td>';
                    echo '<td>'. $row['health'] . '</td>';
                    echo '<td>'. $row['stress'] . '</td>';
                    echo '<td>'. $row['exhaustion'] . '</td>';
                    echo '<td>'. $row['hunger'] . '</td>';
                    echo '<td>'. $row['experience'] . '</td>';
                    echo '<td>'. $row['id_Level'] . '</td>';
                    echo '<td>'. $row['generalState'] . '</td>';
                    echo '<td>'. $row['dentalHygiene'] . '</td>';
                    echo '<td>'. $row['sanity'] . '</td>';
                    echo '<td>'. $row['cannibal'] . '</td>';
                    echo '<td>'. $row['alive'] . '</td>';
                    echo '<td>'. $row['price'] . '</td>';
                    echo '<td width=250>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-success" href="index.php?EX=updateFighter&id='.$row['id'].'">Edit</a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-danger" href="index.php?EX=deleteFighter&id='.$row['id'].'">Supprimer</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            }else {                

                foreach ($pdo->query('SELECT Count(*) As NUM FROM fighter') as $row) {
                    $rowNumber= $row['NUM'];
                }

                $sql = 'SELECT * FROM fighter order by serialNumber ASC LIMIT '.$nbLines.' OFFSET '.$offset;

                if(count($sql) > 0) {

                    foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['serialNumber'] . '</td>';
                    echo '<td>'. $row['id_race'] . '</td>';
                    echo '<td>'. $row['resilience'] . '</td>';
                    echo '<td>'. $row['vitality'] . '</td>';
                    echo '<td>'. $row['jumpingHeight'] . '</td>';
                    echo '<td>'. $row['speed'] . '</td>';
                    echo '<td>'. $row['strength'] . '</td>';
                    echo '<td>'. $row['intellect'] . '</td>';
                    echo '<td>'. $row['health'] . '</td>';
                    echo '<td>'. $row['stress'] . '</td>';
                    echo '<td>'. $row['exhaustion'] . '</td>';
                    echo '<td>'. $row['hunger'] . '</td>';
                    echo '<td>'. $row['experience'] . '</td>';
                    echo '<td>'. $row['id_Level'] . '</td>';
                    echo '<td>'. $row['generalState'] . '</td>';
                    echo '<td>'. $row['dentalHygiene'] . '</td>';
                    echo '<td>'. $row['sanity'] . '</td>';
                    echo '<td>'. $row['cannibal'] . '</td>';
                    echo '<td>'. $row['alive'] . '</td>';
                    echo '<td>'. $row['price'] . '</td>';
                    echo '<td width=250>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-success" href="index.php?EX=updateFighter&id='.$row['id'].'">Edit</a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-danger" href="index.php?EX=deleteFighter&id='.$row['id'].'">Supprimer</a>';
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
                            echo '<button type="submit" class="changePageButton" form="searchItem" formaction="./index.php?EX=searchItem&PAGE=1">1</button>';   
                        }      
                        if($nbPage!=1){
                            echo '<button type="submit" class="changePageButton" form="searchItem" formaction="./index.php?EX=searchItem&PAGE='.($nbPage-1).'">'.($nbPage-1).'</button>';
                        } 
                        echo '<button type="submit" class="changePageButton" form="searchItem" formaction="./index.php?EX=searchItem&PAGE='.$nbPage.'">'.$nbPage.'</button>';  
                        if($nbPage!=$numberPages){
                            echo '<button type="submit" class="changePageButton" form="searchItem" formaction="./index.php?EX=searchItem&PAGE='.($nbPage+1).'">'.($nbPage+1).'</button>';
                        }            
                        if($nbPage<($numberPages-2)){
                            echo '<button type="submit" class="changePageButton" form="searchItem" formaction="./index.php?EX=searchItem&PAGE='.$numberPages.'">'.$numberPages.'</button>';
                        }

                    }
            
                ?>
        </div>
    </div>
    </div>
</div> <!-- /container -->
