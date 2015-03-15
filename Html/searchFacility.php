<?php
$i=0;
$pdo = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
$families = $pdo -> getAllFacilities_families();
foreach($familiesList as $line){
    $families[$i]['ID']=$line['ID'];
    $families[$i]['NAME']=$line['NAME'];
    $i++;
}
$i=0;

$centers = $pdo -> getAllCenters();
foreach($centersList as $line){
    $centers[$i]['ID']=$line['ID'];
    $centers[$i]['NAME']=$line['NAME'];
    $i++;
}
$i=0;

$clubs = $pdo -> getAllClubs();
foreach($clubsList as $line){
    $clubs[$i]['ID']=$line['ID'];
    $clubs[$i]['NAME']=$line['NAME'];
    $i++;
}
$i=0;

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
        <h3>FNESITE</h3>
    </div>


    <form class="form-horizontal" action="./index.php?EX=searchFacility" method="post">
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
                foreach ($families as $key => $fams) {
                    echo('<option value ='.$fams['ID'].'>'.$fams['NAME'].'</option>');
                }
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
        <div class="control-group">
            <label class="control-label">Centre</label>
            <div class="controls">
                <select class="controls" name="CENTER" type="text">
                    <?php
                    echo('<option></option>');
                    foreach ($centers as $key => $cent) {
                        echo('<option value ='.$cent['ID'].'>'.$cent['NAME'].'</option>');
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Club</label>
            <div class="controls">
                <select class="controls" name="CLUB" type="text">
                    <?php
                    echo('<option></option>');
                    foreach ($clubs as $key => $club) {
                        echo('<option value ='.$club['ID'].'>'.$club['NAME'].'</option>');
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Prix</label>
            <div class="controls">
                <input name="PRICE" id="price" type="text"  placeholder="Prix" value="">
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
                <th>Propriétaire</th>
                <th>Centre</th>
                <th>Club</th>
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
                if($_POST['LEVEL']) {
                    $conditions[] = "LEVEL". $_POST['LEVEL']. "%'";
                    $params[] = $_POST['LEVEL'];
                }
                if($_POST['FAMILY']) {
                    $conditions[] = "ID_FACILITYFAMILY = '". $_POST['FAMILY']. "'";
                    $params[] = $_POST['FAMILY'];
                }
                if($_POST['ITEMCAPACITY']) {
                    $conditions[] = "ITEMCAPACITY = '". $_POST['ITEMCAPACITY']. "'";
                    $params[] = $_POST['ITEMCAPACITY'];
                }
                if($_POST['FIGHTERCAPACITY']) {
                    $conditions[] = "FIGHTERCAPACITY = '". $_POST['FIGHTERCAPACITY']. "'";
                    $params[] = $_POST['FIGHTERCAPACITY'];
                }
                if($_POST['PLAYER']) {
                    $conditions[] = "ID_PLAYER = '". $_POST['PLAYER']. "'";
                    $params[] = $_POST['PLAYER'];
                }
                if($_POST['CENTER']) {
                    $conditions[] = "ID_CENTER = '". $_POST['CENTER']. "'";
                    $params[] = $_POST['CENTER'];
                }
                if($_POST['CLUB']) {
                    $conditions[] = "ID_CLUB = '". $_POST['CLUB']. "'";
                    $params[] = $_POST['CLUB'];
                }
                if($_POST['PRICE']) {
                    $conditions[] = "PRICE = '". $_POST['PRICE']. "'";
                    $params[] = $_POST['PRICE'];
                }
                $where = " WHERE ".implode($conditions,' AND ');
                if(count($conditions) > 0) {
                    $sql = 'SELECT * FROM FACILITY'. $where;
                }else {
                    $sql = 'SELECT * FROM FACILITY order by NAME ASC';
                }

                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['NAME'] . '</td>';
                    echo '<td>'. $row['LEVEL'] . '</td>';
                    echo '<td>'. $row['FAMILY'] . '</td>';
                    echo '<td>'. $row['ITEMCAPACITY'] . '</td>';
                    echo '<td>'. $row['FIGHTERCAPACITY'] . '</td>';
                    echo '<td>'. $row['PLAYER'] . '</td>';
                    echo '<td>'. $row['CENTER'] . '</td>';
                    echo '<td>'. $row['CLUB'] . '</td>';
                    echo '<td>'. $row['PRICE'] . '</td>';
                    echo '<td width=250>';
                    echo '</td>';
                    echo '</tr>';
                }
            }else {

                $sql = 'SELECT * FROM FACILITY order by NAME ASC';
                if(count($sql) > 0) {

                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>'. $row['NAME'] . '</td>';
                        echo '<td>'. $row['LEVEL'] . '</td>';
                        echo '<td>'. $row['FAMILY'] . '</td>';
                        echo '<td>'. $row['ITEMCAPACITY'] . '</td>';
                        echo '<td>'. $row['FIGHTERCAPACITY'] . '</td>';
                        echo '<td>'. $row['PLAYER'] . '</td>';
                        echo '<td>'. $row['CENTER'] . '</td>';
                        echo '<td>'. $row['CLUB'] . '</td>';
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
