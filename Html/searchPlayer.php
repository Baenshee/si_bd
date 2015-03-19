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
        <h3>Search player</h3>
    </div>


    <form class="form-horizontal" id="searchPlayer" action="./index.php?EX=searchPlayer" method="post">
        <div class="control-group">
            <label class="control-label">Pseudo</label>
            <div class="controls">
                <input name="PSEUDO" id="pseudo" type="text"  placeholder="Pseudo" pattern="^[a-zA-Z \.\,\+\-]*$" value="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">E-mail</label>
            <div class="controls">
                <input name="EMAIL" id="email" type="text"  placeholder="E-mail" value="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Dernière connexion</label>
            <div class="controls">
                <input type="date" name="LASTCONNECTION">
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
                <th>Pseudo</th>
                <th>E-mail</th>
                <th>Dernière connexion</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $pdo = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
            if(isset($_POST['PSEUDO'])) {
                $nom = $_POST['PSEUDO'];
                $conditions = array();
                $params = array();
                if($nom) {
                    $conditions[] = "pseudo LIKE '%". $nom. "%'";
                    $params[]= $nom;
                }
                if($_POST['EMAIL']) {
                    $conditions[] = "email". $_POST['EMAIL']. "'";
                    $params[] = $_POST['EMAIL'];
                }
                if($_POST['LASTCONNECTION']) {
                    $conditions[] = "lastConnection = '". $_POST['LASTCONNECTION']. "'";
                    $params[] = $_POST['LASTCONNECTION'];
                }
                $where = " WHERE ".implode($conditions,' AND ');
                if(count($conditions) > 0) {
                    foreach ($pdo->query('SELECT Count(*) As NUM FROM PLAYER'. $where) as $row) {
                        $rowNumber= $row['NUM'];
                    }
                    $sql = 'SELECT * FROM PLAYER'. $where .' LIMIT '.$nbLines.' OFFSET '.$offset;
                }else {
                    foreach ($pdo->query('SELECT Count(*) As NUM FROM PLAYER') as $row) {
                        $rowNumber= $row['NUM'];
                    }
                    $sql = 'SELECT * FROM PLAYER order by PSEUDO ASC LIMIT '.$nbLines.' OFFSET '.$offset;
                }

                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['pseudo'] . '</td>';
                    echo '<td>'. $row['email'] . '</td>';
                    echo '<td>'. $row['lastConnection'] . '</td>';
                    echo '<td width=250>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-danger" href="index.php?EX=deletePlayer&id='.$row['ID'].'">Supprimer</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            }else {

                foreach ($pdo->query('SELECT Count(*) As NUM FROM player') as $row) {
                    $rowNumber= $row['NUM'];
                }
                $sql = 'SELECT * FROM player order by pseudo ASC LIMIT '.$nbLines.' OFFSET '.$offset;
                if(count($sql) > 0) {

                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>'. $row['pseudo'] . '</td>';
                        echo '<td>'. $row['email'] . '</td>';
                        echo '<td>'. $row['lastConnection'] . '</td>';
                        echo '<td width=250>';
                        echo '&nbsp;';
                        echo '<a class="btn btn-danger" href="index.php?EX=deletePlayer&id='.$row['ID'].'">Supprimer</a>';
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
                        echo '<button type="submit" class="changePageButton" form="searchPlayer" formaction="./index.php?EX=searchPlayer&PAGE=1">1</button>';
                    }
                    if($nbPage!=1){
                        echo '<button type="submit" class="changePageButton" form="searchPlayer" formaction="./index.php?EX=searchPlayer&PAGE='.($nbPage-1).'">'.($nbPage-1).'</button>';
                    }
                    echo '<button type="submit" class="changePageButton" form="searchPlayer" formaction="./index.php?EX=searchPlayer&PAGE='.$nbPage.'">'.$nbPage.'</button>';
                    if($nbPage!=$numberPages){
                        echo '<button type="submit" class="changePageButton" form="searchPlayer" formaction="./index.php?EX=searchPlayer&PAGE='.($nbPage+1).'">'.($nbPage+1).'</button>';
                    }
                    if($nbPage<($numberPages-2)){
                        echo '<button type="submit" class="changePageButton" form="searchPlayer" formaction="./index.php?EX=searchPlayer&PAGE='.$numberPages.'">'.$numberPages.'</button>';
                    }
                }

            ?>
            </div>
        </div>
    </div>
</div> <!-- /container -->
