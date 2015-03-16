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
        <h3>Search center</h3>
    </div>


    <form class="form-horizontal" id="searchCenter" action="./index.php?EX=searchCenter" method="post">
        <div class="control-group">
            <label class="control-label">Nom</label>
            <div class="controls">
                <input name="NAME" id="name" type="text"  placeholder="Nom" pattern="^[a-zA-Z \.\,\+\-]*$" value="">
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
                <th>Prix</th>
                <th>Capacité</th>
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
                if($_POST['PRICE']) {
                    $conditions[] = "price = '". $_POST['PRICE']. "%'";
                    $params[] = $_POST['PRICE'];
                }
                $where = " WHERE ".implode($conditions,' AND ');
                if(count($conditions) > 0) {
                    foreach ($pdo->query('SELECT Count(*) As NUM FROM center'. $where) as $row) {
                        $rowNumber= $row['NUM'];
                    }
                    $sql = 'SELECT * FROM center'. $where .' LIMIT '.$nbLines.' OFFSET '.$offset;
                }else {
                    foreach ($pdo->query('SELECT Count(*) As NUM FROM center') as $row) {
                        $rowNumber= $row['NUM'];
                    }
                    $sql = 'SELECT * FROM center order by name ASC LIMIT '.$nbLines.' OFFSET '.$offset;
                }

                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['name'] . '</td>';
                    echo '<td>'. $row['price'] . '</td>';
                    echo '<td>'. $row['capacity'] . '</td>';
                    echo '<td width=250>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-success" href="index.php?EX=updateCenter&id='.$row['id'].'">Edit</a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-danger" href="index.php?EX=deleteCenter&id='.$row['id'].'">Supprimer</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            }else {

                foreach ($pdo->query('SELECT Count(*) As NUM FROM center') as $row) {
                    $rowNumber= $row['NUM'];
                }

                $sql = 'SELECT * FROM center order by name ASC LIMIT '.$nbLines.' OFFSET '.$offset;

                if(count($sql) > 0) {

                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>'. $row['name'] . '</td>';
                        echo '<td>'. $row['price'] . '</td>';
                        echo '<td>'. $row['capacity'] . '</td>';
                        echo '<td width=250>';
                        echo '&nbsp;';
                        echo '<a class="btn btn-success" href="index.php?EX=updateCenter&id='.$row['id'].'">Edit</a>';
                        echo '&nbsp;';
                        echo '<a class="btn btn-danger" href="index.php?EX=deleteCenter&id='.$row['id'].'">Supprimer</a>';
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
