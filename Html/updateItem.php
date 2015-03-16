<?php

if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

$item= new MItem($id);
    $name = $item->getName();
    $level = $item->getLevel();
    $price = $item->getPrice();
    $potency = $item->getPotency();
    $id_effect= $item->getId_effect();
    $id_facility = $item->getId_facility();
    $id_itemFamily = $item->getId_itemFamily();
    $description = $item->getDescription();

?>

<div class="container">

    			<div class="span10 offset1">
    				<div class="row">
		    			<h2>Edition d'un objet</h2>
		    		</div>
                    <form class="form-horizontal" action="index.php?EX=updateAnItem&id=<?php echo $id?>" method="post">

						<div class="control-group">
				            <label class="control-label">Nom</label>
				            <div class="controls">
				                <input name="NAME" id="name" type="text"  placeholder="Nom" value="<?php echo !empty($name)?$name:'';?>">
				            </div>
				        </div>

				        <div class="control-group">
				            <label class="control-label">Niveau</label>
				            <div class="controls">
				                <input name="LEVEL" id="level" type="text"  placeholder="Niveau" value="<?php echo !empty($level)?$level:'';?>">
				            </div>
				        </div>

				        <div class="control-group">
					    	<label class="control-label">Famille</label>
                            </br>
                            <select class="controls" name="FAMILY" type="text">
                                <?php
                                echo('<option></option>');
                                foreach ($itemfamilies as $key => $fams) {
									if($fams['id']==$id_itemFamily)
										echo('<option value ='.$fams['id'].' selected>'.$fams['name'].'</option>');
                                  	else										
                                    	echo('<option value ='.$fams['id'].'>'.$fams['name'].'</option>');
                                }
                                ?>
                            </select>
					    </div>

                        <div class="control-group">
                            <label class="control-label">Puissance</label>
                            <div class="controls">
                                <input name="POTENCY" id="potency" type="text"  placeholder="Puissance" value="<?php echo !empty($potency)?$potency:'';?>">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Prix</label>
                            <div class="controls">
                                <input name="PRICE" id="price" type="text"  placeholder="Prix" value="<?php echo !empty($price)?$price:'';?>">
                            </div>
                         </div>

                        <div class="control-group">
                            <label class="control-label">Description</label>
                            <div class="controls">
                                <input name="DESCRIPTION" id="description" type="text"  placeholder="Description" value="<?php echo !empty($description)?$description:'';?>">
                            </div>
                        </div>

				        <div class="form-actions">
				        	</br></br>
						  	<button type="submit" class="btn btn-success">Update</button>
                          	<a href="./index.php?EX=searchItem"><button type="button" class="btn">Retour</button></a>
                      	</div>
					</form>
				</div>