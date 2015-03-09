<div class="container">
    <div class="row">
        <h3>RECHERCHE</h3>
    </div>


    <form class="form-horizontal" action="./index.php?EX=searchPlayer" method="post">
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
            if(isset($_POST['PSEUDO'])) {
                $nom = $_POST['PSEUDO'];
                $conditions = array();
                $params = array();
                if($nom) {
                    $conditions[] = "PSEUDO LIKE '%". $nom. "%'";
                    $params[]= $nom;
                }
                if($_POST['EMAIL']) {
                    $conditions[] = "EMAIL". $_POST['EMAIL']. "'";
                    $params[] = $_POST['EMAIL'];
                }
                if($_POST['LASTCONNECTION']) {
                    $conditions[] = "LASTCONNECTION = '". $_POST['LASTCONNECTION']. "'";
                    $params[] = $_POST['LASTCONNECTION'];
                }
                $where = " WHERE ".implode($conditions,' AND ');
                if(count($conditions) > 0) {
                    $sql = 'SELECT * FROM PLAYER'. $where;
                }else {
                    $sql = 'SELECT * FROM PLAYER order by PSEUDO ASC';
                }

                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['PSEUDO'] . '</td>';
                    echo '<td>'. $row['EMAIL'] . '</td>';
                    echo '<td>'. $row['LASTCONNECTION'] . '</td>';
                    echo '<td width=250>';
                    echo '</td>';
                    echo '</tr>';
                }
            }else {

                $sql = 'SELECT * FROM PLAYER order by PSEUDO ASC';
                if(count($sql) > 0) {

                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>'. $row['PSEUDO'] . '</td>';
                        echo '<td>'. $row['EMAIL'] . '</td>';
                        echo '<td>'. $row['LASTCONNECTION'] . '</td>';
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
