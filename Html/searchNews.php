<?php
$nbLines=10;
if(isset($_POST['LINES']))
    $nbLines=$_POST['LINES'];
$nbPage=1;
if(isset($_GET['PAGE']))
    $nbPage=$_GET['PAGE'];
$offset= ($nbPage-1)*$nbLines;


$i=0;
$pdo = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
$competitionsList = $pdo -> getAllCompetitions();
foreach($competitionsList as $line){
    $competitions[$i]['id']=$line['id'];
    $competitions[$i]['name']=$line['name'];
    $i++;
}
$i=0;

?>

<div class="container">
    <div class="row">
        <h3>Search news</h3>
    </div>


    <form class="form-horizontal" id="searchItem" action="./index.php?EX=searchNews" method="post">
        <div class="control-group">
            <label class="control-label">A la une</label>
            <div class="controls">
                <input name="HEADLINE" id="headline" type="text"  placeholder="A la une" pattern="^[a-zA-Z \.\,\+\-]*$" value="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Concours</label>
            </br>
            <select class="controls" name="COMPETITION" type="text">
                <?php
                echo('<option></option>');
                foreach ($competitions as $key => $comps) {
                    echo('<option value ='.$comps['id'].'>'.$comps['name'].'</option>');
                }
                ?>
            </select>
        </div>
        <div class="control-group">
            <label class="control-label">Nombre de resultats a afficher</label>
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
                <th>A la une</th>
                <th>Contenu</th>
                <th>Concours</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if(isset($_POST['HEADLINE'])) {
                $headline = $_POST['HEADLINE'];
                $conditions = array();
                $params = array();
                if($headline) {
                    $conditions[] = "headline LIKE '%". $headline. "%'";
                    $params[]= $headline;
                }
                if($_POST['CONTENT']) {
                    $conditions[] = "content". $_POST['CONTENT']. "%'";
                    $params[] = $_POST['CONTENT'];
                }
                if($_POST['ID_COMPETITION']) {
                    $conditions[] = "id_competition = '". $_POST['ID_COMPETITION']. "'";
                    $params[] = $_POST['ID_COMPETITION'];
                }
                $where = " WHERE ".implode($conditions,' AND ');
                if(count($conditions) > 0) {
                    foreach ($pdo->query('SELECT Count(*) As NUM FROM news'. $where) as $row) {
                        $rowNumber= $row['NUM'];
                    }
                    $sql = 'SELECT * FROM news'. $where .' LIMIT '.$nbLines.' OFFSET '.$offset;
                }else {
                    foreach ($pdo->query('SELECT Count(*) As NUM FROM news') as $row) {
                        $rowNumber= $row['NUM'];
                    }
                    $sql = 'SELECT * FROM news order by headline ASC LIMIT '.$nbLines.' OFFSET '.$offset;
                }

                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['headline'] . '</td>';
                    echo '<td>'. $row['content'] . '</td>';
                    echo '<td>'. (new MCompetition($row['id_competition']))->getName() . '</td>';
                    echo '<td width=250>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-success" href="../index.php?EX=updateNews&id='.$row['id'].'">Edit</a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-danger" href="index.php?EX=deleteNews&id='.$row['id'].'">Supprimer</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            }else {

                foreach ($pdo->query('SELECT Count(*) As NUM FROM items') as $row) {
                    $rowNumber= $row['NUM'];
                }

                $sql = 'SELECT * FROM news order by headline ASC LIMIT '.$nbLines.' OFFSET '.$offset;
                if(count($sql) > 0) {

                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>'. $row['headline'] . '</td>';
                        echo '<td>'. $row['content'] . '</td>';
                        echo '<td>'. (new MCompetition($row['id_competition']))->getName() . '</td>';
                        echo '<td width=250>';
                        echo '&nbsp;';
                        echo '<a class="btn btn-success" href="../index.php?EX=updateNews&id='.$row['id'].'">Edit</a>';
                        echo '&nbsp;';
                        echo '<a class="btn btn-danger" href="index.php?EX=deleteNews&id='.$row['id'].'">Supprimer</a>';
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
                        echo '<button type="submit" class="changePageButton" form="searchNews" formaction="./index.php?EX=searchNews&PAGE=1">1</button>';
                    }
                    if($nbPage!=1){
                        echo '<button type="submit" class="changePageButton" form="searchNews" formaction="./index.php?EX=searchNews&PAGE='.($nbPage-1).'">'.($nbPage-1).'</button>';
                    }
                    echo '<button type="submit" class="changePageButton" form="searchNews" formaction="./index.php?EX=searchNews&PAGE='.$nbPage.'">'.$nbPage.'</button>';
                    if($nbPage!=$numberPages){
                        echo '<button type="submit" class="changePageButton" form="searchNews" formaction="./index.php?EX=searchNews&PAGE='.($nbPage+1).'">'.($nbPage+1).'</button>';
                    }
                    if($nbPage<($numberPages-2)){
                        echo '<button type="submit" class="changePageButton" form="searchNews" formaction="./index.php?EX=searchNews&PAGE='.$numberPages.'">'.$numberPages.'</button>';
                    }

                }

                ?>
            </div>
        </div>
    </div>
</div> <!-- /container -->
