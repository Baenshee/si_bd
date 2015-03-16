<?php
$id = 0;

if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Delete club</h3>
        </div>

        <form class="form-horizontal" action="./Php/deleteClub.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <p class="alert alert-error">Do you really want to delete this ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn" href="./index.php?EX=searchClub">No</a>
            </div>
        </form>
    </div>

</div> <!-- /container -->