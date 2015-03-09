<?php
$i=0;
$pdo = new MDBase();

$races = $pdo -> getAllRaces();
foreach($racesList as $line){
    $races[$i]['ID']=$line['ID'];
    $races[$i]['NAME']=$line['NAME'];
    $i++;
}
$i=0;

$levels = $pdo -> getAllLevels();
foreach($levelsList as $line){
    $levels[$i]['ID']=$line['ID'];
    $levels[$i]['LEVEL']=$line['LEVEL'];
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
        <h3>RECHERCHE</h3>
    </div>


    <form class="form-horizontal" action="./index.php?EX=searchFighter" method="post">
        <div class="control-group">
            <label class="control-label">Nom</label>
            <div class="controls">
                <input name="NAME" id="name" type="text"  placeholder="Nom" pattern="^[a-zA-Z \.\,\+\-]*$" value="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Niveau</label>
            </br>
            <select class="controls" name="LEVEL" type="text">
                <?php
                echo('<option></option>');
                foreach ($levels as $key => $lvl) {
                    echo('<option value ='.$lvl['ID'].'>'.$lvl['LEVEL'].'</option>');
                }
                ?>
            </select>
        </div>
        <div class="control-group">
            <label class="control-label">Race</label>
            </br>
            <select class="controls" name="RACE" type="text">
                <?php
                echo('<option></option>');
                foreach ($races as $key => $race) {
                    echo('<option value ='.$race['ID'].'>'.$race['NAME'].'</option>');
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
                    $conditions[] = "NAME LIKE '%". $nom. "%'";
                    $params[]= $nom;
                }
                if($_POST['RACE']) {
                    $conditions[] = "ID_RACE". $_POST['RACE']. "'";
                    $params[] = $_POST['RACE'];
                }
                if($_POST['RESILIENCE']) {
                    $conditions[] = "RESILIENCE = '". $_POST['RESILIENCE']. "'";
                    $params[] = $_POST['RESILIENCE'];
                }
                if($_POST['VITALITY']) {
                    $conditions[] = "VITALITY = '". $_POST['VITALITY']. "'";
                    $params[] = $_POST['VITALITY'];
                }
                if($_POST['JUMPINGHEIGHT']) {
                    $conditions[] = "JUMPINGHEIGHT = '". $_POST['JUMPINGHEIGHT']. "'";
                    $params[] = $_POST['JUMPINGHEIGHT'];
                }
                if($_POST['SPEED']) {
                    $conditions[] = "SPEED = '". $_POST['SPEED']. "'";
                    $params[] = $_POST['SPEED'];
                }
                if($_POST['STRENGTH']) {
                    $conditions[] = "STRENGTH = '". $_POST['STRENGTH']. "'";
                    $params[] = $_POST['STRENGTH'];
                }
                if($_POST['INTELLECT']) {
                    $conditions[] = "INTELLECT = '". $_POST['INTELLECT']. "'";
                    $params[] = $_POST['INTELLECT'];
                }
                if($_POST['HEALTH']) {
                    $conditions[] = "HEALTH = '". $_POST['HEALTH']. "'";
                    $params[] = $_POST['HEALTH'];
                }
                if($_POST['STRESS']) {
                    $conditions[] = "STRESS = '". $_POST['STRESS']. "'";
                    $params[] = $_POST['STRESS'];
                }
                if($_POST['EXHAUSTION']) {
                    $conditions[] = "EXHAUSTION = '". $_POST['EXHAUSTION']. "'";
                    $params[] = $_POST['EXHAUSTION'];
                }
                if($_POST['HUNGER']) {
                    $conditions[] = "HUNGER = '". $_POST['HUNGER']. "'";
                    $params[] = $_POST['HUNGER'];
                }
                if($_POST['EXPERIENCE']) {
                    $conditions[] = "EXPERIENCE = '". $_POST['EXPERIENCE']. "'";
                    $params[] = $_POST['EXPERIENCE'];
                }
                if($_POST['LEVEL']) {
                    $conditions[] = "ID_LEVEL = '". $_POST['LEVEL']. "'";
                    $params[] = $_POST['LEVEL'];
                }
                if($_POST['GENERALSTATE']) {
                    $conditions[] = "GENERALSTATE = '". $_POST['GENERALSTATE']. "'";
                    $params[] = $_POST['GENERALSTATE'];
                }
                if($_POST['DENTALHYGIENE']) {
                    $conditions[] = "DENTALHYGIENE = '". $_POST['DENTALHYGIENE']. "'";
                    $params[] = $_POST['DENTALHYGIENE'];
                }
                if($_POST['SANITY']) {
                    $conditions[] = "SANITY = '". $_POST['SANITY']. "'";
                    $params[] = $_POST['SANITY'];
                }
                if($_POST['CANNIBAL']) {
                    $conditions[] = "CANNIBAL = '". $_POST['CANNIBAL']. "'";
                    $params[] = $_POST['CANNIBAL'];
                }
                if($_POST['ALIVE']) {
                    $conditions[] = "ALIVE = '". $_POST['ALIVE']. "'";
                    $params[] = $_POST['ALIVE'];
                }
                if($_POST['PRICE']) {
                    $conditions[] = "PRICE = '". $_POST['PRICE']. "'";
                    $params[] = $_POST['PRICE'];
                }
                $where = " WHERE ".implode($conditions,' AND ');
                if(count($conditions) > 0) {
                    $sql = 'SELECT * FROM FIGHTER'. $where;
                }else {
                    $sql = 'SELECT * FROM FIGHTER order by NAME ASC';
                }

                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['NAME'] . '</td>';
                    echo '<td>'. $row['ID_RACE'] . '</td>';
                    echo '<td>'. $row['RESILIENCE'] . '</td>';
                    echo '<td>'. $row['VITALITY'] . '</td>';
                    echo '<td>'. $row['JUMPINGHEIGHT'] . '</td>';
                    echo '<td>'. $row['SPEED'] . '</td>';
                    echo '<td>'. $row['STRENGTH'] . '</td>';
                    echo '<td>'. $row['INTELLECT'] . '</td>';
                    echo '<td>'. $row['HEALTH'] . '</td>';
                    echo '<td>'. $row['STRESS'] . '</td>';
                    echo '<td>'. $row['EXHAUSTION'] . '</td>';
                    echo '<td>'. $row['HUNGER'] . '</td>';
                    echo '<td>'. $row['EXPERIENCE'] . '</td>';
                    echo '<td>'. $row['ID_LEVEL'] . '</td>';
                    echo '<td>'. $row['GENERALSTATE'] . '</td>';
                    echo '<td>'. $row['DENTALHYGIENE'] . '</td>';
                    echo '<td>'. $row['SANITY'] . '</td>';
                    echo '<td>'. $row['CANNIBAL'] . '</td>';
                    echo '<td>'. $row['ALIVE'] . '</td>';
                    echo '<td>'. $row['PRICE'] . '</td>';
                    echo '<td width=250>';
                    echo '</td>';
                    echo '</tr>';
                }
            }else {

                $sql = 'SELECT * FROM FIGHTER order by NAME ASC';
                if(count($sql) > 0) {

                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>'. $row['NAME'] . '</td>';
                        echo '<td>'. $row['ID_RACE'] . '</td>';
                        echo '<td>'. $row['RESILIENCE'] . '</td>';
                        echo '<td>'. $row['VITALITY'] . '</td>';
                        echo '<td>'. $row['JUMPINGHEIGHT'] . '</td>';
                        echo '<td>'. $row['SPEED'] . '</td>';
                        echo '<td>'. $row['STRENGTH'] . '</td>';
                        echo '<td>'. $row['INTELLECT'] . '</td>';
                        echo '<td>'. $row['HEALTH'] . '</td>';
                        echo '<td>'. $row['STRESS'] . '</td>';
                        echo '<td>'. $row['EXHAUSTION'] . '</td>';
                        echo '<td>'. $row['HUNGER'] . '</td>';
                        echo '<td>'. $row['EXPERIENCE'] . '</td>';
                        echo '<td>'. $row['ID_LEVEL'] . '</td>';
                        echo '<td>'. $row['GENERALSTATE'] . '</td>';
                        echo '<td>'. $row['DENTALHYGIENE'] . '</td>';
                        echo '<td>'. $row['SANITY'] . '</td>';
                        echo '<td>'. $row['CANNIBAL'] . '</td>';
                        echo '<td>'. $row['ALIVE'] . '</td>';
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
