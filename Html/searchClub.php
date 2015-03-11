<?php

$pdo = new MDBase();

$players = $pdo -> getAllPlayers();
foreach($playersList as $line){
    $players[$i]['ID']=$line['ID'];
    $players[$i]['PSEUDO']=$line['PSEUDO'];
    $i++;
}
$i=0;

?>

<div class="container">
    <div class="row">
        <h3>RECHERCHE</h3>
    </div>


    <form class="form-horizontal" action="./index.php?EX=searchClub" method="post">
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
            <label class="control-label">Propriétaire</label>
            <div class="controls">
                <select class="controls" name="OWNER" type="text">
                    <?php
                    echo('<option></option>');
                    foreach ($players as $key => $play) {
                        echo('<option value ='.$play['ID'].'>'.$play['PSEUDO'].'</option>');
                    }
                    ?>
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
                <th>Prix de l'abonnement</th>
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
                    $conditions[] = "NAME LIKE '%". $nom. "%'";
                    $params[]= $nom;
                }
                if($_POST['PRICE']) {
                    $conditions[] = "PRICE". $_POST['PRICE']. "%'";
                    $params[] = $_POST['PRICE'];
                }
                if($_POST['FEE']) {
                    $conditions[] = "FEE". $_POST['FEE']. "%'";
                    $params[] = $_POST['FEE'];
                }
                $where = " WHERE ".implode($conditions,' AND ');
                if(count($conditions) > 0) {
                    $sql = 'SELECT * FROM CLUB'. $where;
                }else {
                    $sql = 'SELECT * FROM CLUB order by NAME ASC';
                }

                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['NAME'] . '</td>';
                    echo '<td>'. $row['FEE'] . '</td>';
                    echo '<td>'. $row['PRICE'] . '</td>';
                    echo '<td width=250>';
                    echo '</td>';
                    echo '</tr>';
                }
            }else {

                $sql = 'SELECT * FROM CLUB order by NAME ASC';
                if(count($sql) > 0) {

                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>'. $row['NAME'] . '</td>';
                        echo '<td>'. $row['FEE'] . '</td>';
                        echo '<td>'. $row['PRICE'] . '</td>';
                        echo '<td width=250>';
                        echo '</td>';
                        echo '</tr>';
                    }

                }

            }
            ?>

            </tbody>
        </table>
    </div>
</div> <!-- /container -->
