<div class="container">
    <div class="row">
        <h3>Administration des tables</h3>
    </div>

    <div class="row">


        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Table</th>
                <th>Type de message</th>
                <th>Message</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $pdo= new MDBase();
            if(isset($_GET['tab'])){
              $sql='Repair Table '.$_GET['tab'];
              foreach($pdo->query($sql) as $row){
                echo '<tr>';
                echo '<td>'. $row['Table'] . '</td>';
                echo '<td>'. $row['Msg_type'] . '</td>';
                $str= ($row['Msg_text']!='OK') ? $row['Msg_text'].'</td>': '<a href=index.php?EX=admin&tab='.$row['Table'].'>'.$row['Msg_text'].'</a>';
                echo '<td>'. $str;
                echo '</tr>';
              }
            }
            else{
            $sql1='Show Tables';
              foreach($pdo->query($sql1) as $table){
                $sql = 'Check Table '.$table[0];
                if(count($sql) > 0) {

                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>'. $row['Table'] . '</td>';
                        echo '<td>'. $row['Msg_type'] . '</td>';
                        $str= ($row['Msg_text']!='OK') ? $row['Msg_text'].'</td>': '<a href=index.php?EX=admin&tab='.$row['Table'].'>'.$row['Msg_text'].'</a>';
                        echo '<td>'. $str;
                        echo '</tr>';
                    }

                }
              }
            }
            ?>

            </tbody>
        </table>
    </div>
</div> <!-- /container -->
