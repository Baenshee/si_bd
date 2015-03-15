<div class="container">
    <div class="row">
        <h3>RECHERCHE</h3>
    </div>


    <form class="form-horizontal" action="./index.php?EX=searchCompetition" method="post">
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
            $pdo = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
            if(isset($_POST['NAME'])) {
                $nom = $_POST['NAME'];
                $conditions = array();
                $params = array();
                if($nom) {
                    $conditions[] = "NAME LIKE '%". $nom. "%'";
                    $params[]= $nom;
                }
                if($_POST['STARTINGDATE']) {
                    $conditions[] = "STARTINGDATE". $_POST['STARTINGDATE']. "%'";
                    $params[] = $_POST['STARTINGDATE'];
                }
                if($_POST['ENDINGDATE']) {
                    $conditions[] = "ENDINGDATE = '". $_POST['ENDINGDATE']. "'";
                    $params[] = $_POST['ENDINGDATE'];
                }
                $where = " WHERE ".implode($conditions,' AND ');
                if(count($conditions) > 0) {
                    $sql = 'SELECT * FROM COMPETITION'. $where;
                }else {
                    $sql = 'SELECT * FROM COMPETITION order by NAME ASC';
                }

                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['NAME'] . '</td>';
                    echo '<td>'. $row['STARTINGDATE'] . '</td>';
                    echo '<td>'. $row['ENDINGDATE'] . '</td>';
                    echo '<td>'. $row['ID_FACILITY'] . '</td>';
                    echo '<td width=250>';
                    echo '</td>';
                    echo '</tr>';
                }
            }else {

                $sql = 'SELECT * FROM COMPETITION order by NAME ASC';
                if(count($sql) > 0) {

                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>'. $row['NAME'] . '</td>';
                        echo '<td>'. $row['STARTINGDATE'] . '</td>';
                        echo '<td>'. $row['ENDINGDATE'] . '</td>';
                        echo '<td>'. $row['ID_FACILITY'] . '</td>';
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
