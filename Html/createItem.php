<?php

    if(isset($_POST['NAME'])) {
        $name = $_POST['NAME'];
        $lvl = $_POST['LEVEL'];
        $family = $_POST['FAMILY'];
        $potency = $_POST['POTENCY'];
        $price = $_POST['PRICE'];
        $description = $_POST['DESCRIPTION'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO ITEM (NAME, LEVEL, FAMILY, POTENCY, PRICE, DESCRIPTION) values(?,?,?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($name, $lvl, $family, $potency, $price, $description));
        $id= $pdo->lastInsertId();
        echo $id;
        header("./index.php?EX=createItem&id=".$id);
    }

    $i=0;
    $pdo = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
    $families = $pdo -> getAllItem_families();
    foreach($familiesList as $line){
        $families[$i]['ID']=$line['ID'];
        $families[$i]['NAME']=$line['NAME'];
        $i++;
    }
    $i=0;

?>
<div class="container">

    			<div class="span10 offset1">
    				<div class="row">
		    			<h2>Création d'un objet</h2>
		    		</div>
                    <form class="form-horizontal" action="index.php?EX=createItem" method="post">

						<div class="control-group">
				            <label class="control-label">Nom</label>
				            <div class="controls">
				                <input name="NAME" id="name" type="text"  placeholder="Nom" value="">
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

                        <div class="control-group">
                            <label class="control-label">Description</label>
                            <div class="controls">
                                <input name="DESCRIPTION" id="description" type="text"  placeholder="Description" value="">
                            </div>
                        </div>

				        <div class="form-actions">
				        	</br></br>
						  	<button type="submit" class="btn btn-success">Création</button>
                          	<a href="./index.php?EX=createItem"><button type="button" class="btn">Retour</button></a>
                      	</div>
					</form>
				</div>

 </div> <!-- /container -->