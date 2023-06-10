<!DOCTYPE html>
<html lang="fr">
<head>
  <?php require "Config.php"?>


  <meta charset="utf-8">
  <link rel="stylesheet" href="<?php echo $CONFIG["root_path"] ?>Css/clair.css" id="theme-link">
  <link rel="shortcut icon" type="image/png" href="<?php echo $CONFIG["root_path"] ?>img/logo.png">
  <title>StarBooks</title>
</head>
<body>

<div class=navigation>

<header>
  <div class=logo>
  <a href="<?php echo $CONFIG["root_path"] ?>Php/index.php"><img src="<?php echo $CONFIG["root_path"] ?>img/logo.png" alt="logo StarBooks" align=left class="logoo"></a>
            <!-- Rounded switch -->
            <div class="f">
            
<div class="placementwaw">
    <ul id="menu">

    	<li class="bouton2"><a href="#">Menu</a>


    		<ul>

          <div class="bouton2">
          <?php
        			session_start();
        			if (isset($_SESSION['login'])) {?>   <!-- si  login n'est pas null allor la persoone est connecter-->

        				<li><a class=bouton href="<?php echo $CONFIG['root_path'] ?>Php/deco.php"><img src="<?php echo $CONFIG['root_path'] ?>img/deco.png" class="conn" align=middle>Deconnexion</a></li>
        				<li><a class=bouton href="<?php echo $CONFIG['root_path'] ?>Php/membre.php"><img src="<?php echo $CONFIG['root_path'] ?>img/compte.png" class="conn" align=middle>Espace membre</a></li><?php
        				// si le login est admin alors il s'ajit de l'admin
        					if($_SESSION['login'] == "admin"){?>
        						<a class=bouton href="<?php echo $CONFIG['root_path'] ?>Php/admin.php"><img src="<?php echo $CONFIG["root_path"] ?>img/admin.png" class="conn" align=middle>__Admin__</a> <?php
        					}
        			}else{?><!--  si le login  est null alors -->
        				<a class=bouton href="connexion.php"><img src="<?php echo $CONFIG["root_path"] ?>img/compte.png" class="conn" align=middle><br>Connexion</a><?php
        			}?>
    		</ul>

      </ul>
</div>

</ul>
</div>
<div class="placementwaw2">
<label class="switch" >
  <input  type="checkbox"  id="theme" onclick="function()">
  <span class="slider round"></span>
</label>
</div>
</div>
  <?php require "nav.php"; ?>


</header>
</div>
<script type="text/javascript" src="<?php echo $CONFIG["root_path"] ?>js/script.js"></script>
<div class="marge"></div>
