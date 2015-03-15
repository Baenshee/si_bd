<?php
$i=0;
$pdo = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
$families = $pdo -> getAllItem_families();
foreach($familiesList as $line){
    $families[$i]['ID']=$line['ID'];
    $families[$i]['NAME']=$line['NAME'];
    $i++;
}
$i=0;

$facilities = $pdo -> getAllFacilities();
foreach($facilitiesList as $line){
    $facilities[$i]['ID']=$line['ID'];
    $facilities[$i]['NAME']=$line['NAME'];
    $i++;
}
$i=0;

?>

<div class="container">
<div class="row">
    <h3>FNESITE</h3>
</div>


<form class="form-horizontal" action="./index.php?EX=searchItem" method="post">
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
        <label class="control-label">Facilité</label>
        </br>
        <select class="controls" name="FACILITY" type="text">
            <?php
            echo('<option></option>');
            foreach ($facilities as $key => $facil) {
                echo('<option value ='.$facil['ID'].'>'.$facil['NAME'].'</option>');
            }
            ?>
        </select>
    </div>
    <div class="control-group">
        <label class="control-label">Puissance</label>
        <div class="controls">
            <input name="POTENCY" id="potency" type="text"  placeholder="Puissance" value="">
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
            <th>Facilité</th>
            <th>Puissance</th>
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
                $conditions[] = "FAMILY_ID = '". $_POST['FAMILY']. "'";
                $params[] = $_POST['FAMILY'];
            }
            if($_POST['FACILITY']) {
                $conditions[] = "FACILITY_ID = '". $_POST['FACILITY']. "'";
                $params[] = $_POST['FACILITY'];
            }
            if($_POST['POTENCY']) {
                $conditions[] = "POTENCY = '". $_POST['POTENCY']. "'";
                $params[] = $_POST['POTENCY'];
            }
            if($_POST['PRICE']) {
                $conditions[] = "PRICE = '". $_POST['PRICE']. "'";
                $params[] = $_POST['PRICE'];
            }
            $where = " WHERE ".implode($conditions,' AND ');
            if(count($conditions) > 0) {
                $sql = 'SELECT * FROM ITEM'. $where;
            }else {
                $sql = 'SELECT * FROM ITEM order by NAME ASC';
            }

            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['NAME'] . '</td>';
                echo '<td>'. $row['LEVEL'] . '</td>';
                echo '<td>'. $row['FAMILY'] . '</td>';
                echo '<td>'. $row['FACILITY'] . '</td>';
                echo '<td>'. $row['POTENCY'] . '</td>';
                echo '<td>'. $row['PRICE'] . '</td>';
                echo '<td width=250>';
                echo '</td>';
                echo '</tr>';
            }
        }else {

            $sql = 'SELECT * FROM ITEM order by NAME ASC';
            if(count($sql) > 0) {

                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['NAME'] . '</td>';
                    echo '<td>'. $row['LEVEL'] . '</td>';
                    echo '<td>'. $row['FAMILY'] . '</td>';
                    echo '<td>'. $row['FACILITY'] . '</td>';
                    echo '<td>'. $row['POTENCY'] . '</td>';
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
