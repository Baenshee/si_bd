<?php

    $pdo = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
    if(isset($_POST['NAME'])) {
        $name = $_POST['NAME'];
        $lvl = $_POST['LEVEL'];
        $family = $_POST['FAMILY'];
        $potency = $_POST['POTENCY'];
        $price = $_POST['PRICE'];
        $description = $_POST['DESCRIPTION'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO items (name, level, id_itemFamily, potency, price, description) values(?,?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($name, $lvl, $family, $potency, $price, $description));
        $id= $pdo->lastInsertId();
        header("./index.php?EX=searchItem");
    }

    $i=0;
    $itemfamiliesList = $pdo -> getAllItem_families();
    foreach($itemfamiliesList as $line){
        $itemfamilies[$i]['id']=$line['id'];
        $itemfamilies[$i]['name']=$line['name'];
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
                                foreach ($itemfamilies as $key => $fams) {
                                    echo('<option value ='.$fams['id'].'>'.$fams['name'].'</option>');
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
