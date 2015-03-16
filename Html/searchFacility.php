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
/*$familiesList = $pdo -> getAllFacilities_families();
foreach($familiesList as $line){
    $families[$i]['id']=$line['id'];
    $families[$i]['name']=$line['name'];
    $i++;
}
$i=0;*/

/*$centersList = $pdo -> getAllCenters();
foreach($centersList as $line){
    $centers[$i]['id']=$line['id'];
    $centers[$i]['name']=$line['name'];
    $i++;
}
$i=0;

$clubs = $pdo -> getAllClubs();
foreach($clubsList as $line){
    $clubs[$i]['id']=$line['id'];
    $clubs[$i]['name']=$line['name'];
    $i++;
}
$i=0;

$players = $pdo -> getAllPlayers();
foreach($playersList as $line){
    $players[$i]['id']=$line['id'];
    $players[$i]['pseudo']=$line['pseudo'];
    $i++;
}
$i=0;*/

?>

<div class="container">
    <div class="row">
        <h3>Search facility</h3>
    </div>


    <form class="form-horizontal" id="searchFacility" action="./index.php?EX=searchFacility" method="post">
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
            <label class="control-label">Famille</label>   
            </br>
            <select class="controls" name="FAMILY" type="text">
                <?php
                echo('<option></option>');
                /*foreach ($families as $key => $fam) {
                    echo('<option value ='.$fam['id'].'>'.$fam['name'].'</option>');
                }*/
                ?>
            </select>
        </div>
        <div class="control-group">
            <label class="control-label">Capacité d'objets</label>
            <div class="controls">
                <input name="ITEMCAPACITY" id="itemCapacity" type="text"  placeholder="Capacité d'objets" value="">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Capacité d'esclaves</label>
            <div class="controls">
                <input name="FIGHTERCAPACITY" id="fighterCapacity" type="text"  placeholder="Capacité d'esclaves" value="">
            </div>
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
                <th>Niveau</th>
                <th>Famille</th>
                <th>Capacité d'objets</th>
                <th>Capacité d'esclave</th>
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
                    $conditions[] = "name LIKE '%". $nom. "%'";
                    $params[]= $nom;
                }
                if($_POST['LEVEL']) {
                    $conditions[] = "level". $_POST['LEVEL']. "%'";
                    $params[] = $_POST['LEVEL'];
                }
                if($_POST['FAMILY']) {
                    $conditions[] = "id_facilityFamily = '". $_POST['FAMILY']. "'";
                    $params[] = $_POST['FAMILY'];
                }
                if($_POST['ITEMCAPACITY']) {
                    $conditions[] = "itemCapacity = '". $_POST['ITEMCAPACITY']. "'";
                    $params[] = $_POST['ITEMCAPACITY'];
                }
                if($_POST['FIGHTERCAPACITY']) {
                    $conditions[] = "fighterCapacity = '". $_POST['FIGHTERCAPACITY']. "'";
                    $params[] = $_POST['FIGHTERCAPACITY'];
                }
                if($_POST['PRICE']) {
                    $conditions[] = "price = '". $_POST['PRICE']. "'";
                    $params[] = $_POST['PRICE'];
                }
                $where = " WHERE ".implode($conditions,' AND ');
                if(count($conditions) > 0) {
                    foreach ($pdo->query('SELECT Count(*) As NUM FROM facility'. $where) as $row) {
                        $rowNumber= $row['NUM'];
                    }
                    $sql = 'SELECT * FROM facility'. $where .' LIMIT '.$nbLines.' OFFSET '.$offset;
                }else {
                    foreach ($pdo->query('SELECT Count(*) As NUM FROM facility') as $row) {
                        $rowNumber= $row['NUM'];
                    }
                    $sql = 'SELECT * FROM facility order by name ASC LIMIT '.$nbLines.' OFFSET '.$offset;
                }

                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['name'] . '</td>';
                    echo '<td>'. $row['level'] . '</td>';
                    echo '<td>'. $row['id_facilityFamily'] . '</td>';
                    echo '<td>'. $row['itemCapacity'] . '</td>';
                    echo '<td>'. $row['fighterCapacity'] . '</td>';
                    echo '<td>'. $row['price'] . '</td>';
                    echo '<td width=250>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-success" href="index.php?EX=updateFacility&id='.$row['id'].'">Edit</a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-danger" href="index.php?EX=deleteFacility&id='.$row['id'].'">Supprimer</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            }else {

                foreach ($pdo->query('SELECT Count(*) As NUM FROM facility') as $row) {
                    $rowNumber= $row['NUM'];
                }

                $sql = 'SELECT * FROM facility order by name ASC LIMIT '.$nbLines.' OFFSET '.$offset;

                if(count($sql) > 0) {

                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>'. $row['name'] . '</td>';
                        echo '<td>'. $row['level'] . '</td>';
                        echo '<td>'. $row['id_facilityFamily'] . '</td>';
                        echo '<td>'. $row['itemCapacity'] . '</td>';
                        echo '<td>'. $row['fighterCapacity'] . '</td>';
                        echo '<td>'. $row['price'] . '</td>';
                        echo '<td width=250>';
                        echo '&nbsp;';
                        echo '<a class="btn btn-success" href="index.php?EX=updateFacility&id='.$row['id'].'">Edit</a>';
                        echo '&nbsp;';
                        echo '<a class="btn btn-danger" href="index.php?EX=deleteFacility&id='.$row['id'].'">Supprimer</a>';
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
                            echo '<button type="submit" class="changePageButton" form="searchFacility" formaction="./index.php?EX=searchFacility&PAGE=1">1</button>';   
                        }      
                        if($nbPage!=1){
                            echo '<button type="submit" class="changePageButton" form="searchFacility" formaction="./index.php?EX=searchFacility&PAGE='.($nbPage-1).'">'.($nbPage-1).'</button>';
                        } 
                        echo '<button type="submit" class="changePageButton" form="searchFacility" formaction="./index.php?EX=searchFacility&PAGE='.$nbPage.'">'.$nbPage.'</button>';  
                        if($nbPage!=$numberPages){
                            echo '<button type="submit" class="changePageButton" form="searchFacility" formaction="./index.php?EX=searchFacility&PAGE='.($nbPage+1).'">'.($nbPage+1).'</button>';
                        }            
                        if($nbPage<($numberPages-2)){
                            echo '<button type="submit" class="changePageButton" form="searchFacility" formaction="./index.php?EX=searchFacility&PAGE='.$numberPages.'">'.$numberPages.'</button>';
                        }

                    }
            
                ?>
            </div>
        </div>
    </div>
</div> <!-- /container -->
