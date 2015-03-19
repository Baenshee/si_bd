<?php
$vnav = new VNav();
$vpage = new $page['class']();
$vHtml = new VHtml();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?= $page['title']; ?></title>
    <link rel="stylesheet" href="./Css/bootstrap.min.css">
    <link rel="stylesheet" href="./Css/Main.css">
</head>
<body>
  <div class="page"> <!-- Contenu de la page -->
    <nav>
        <?php $vnav->showNav() ?>
    </nav>
    <div class="content">
        <?php $vpage->$page['method']($page['arg']) ?>
    </div>
  </div>
  <script src="../Js/tri.js"></script>
</body>
</html>
