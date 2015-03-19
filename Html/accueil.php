<?php if(isset($_GET['Error'])) echo '<div class="control-label error">Mauvaise combinaison nom d\'utilisateur/mot de passe</div>';
      else if(isset($_SESSION['USER'])) echo 'Bienvenue '.$_SESSION['USER'];?>
<form class="form-horizontal" id="formconnec" action="./Php/connection.php" method="post">
    <div class="control-group">
        <label class="control-label">Login</label>
        <div class="controls">
            <input name="LOGIN" id="login" type="text"  placeholder="Login" pattern="^[a-zA-Z \.\,\+\-]*$" value="">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Mdp</label>
        <div class="controls">
            <input name="PASS" id="passwd" type="password"value="">
        </div>
    </div>

    <button type="submit" class="btn btn-success">Connexion</button>
</form>
