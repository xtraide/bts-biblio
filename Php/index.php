<?php require "header.php";?>
<div id="js-cookie-box" class="cookie-box"><p class="text">
    En poursuivant votre navigation sur ce site, vous acceptez l'utilisation de cookies :cookie: ! </p><button id="js-cookie-button" class="cookie-button" onclick="hideCookieBox()"><p class="text">Allez pourquoi pas</p></button>
</div>
<?php require "genre.php";
?>
<br>

<div class="grilindex">
	<div class="divindex">
	    <form name="form" action="" method="post"><br>
		<p class="text">Trier par titre :</p>
		<div class="container">

    	</div>
       	<input  name="trie" type="submit" value="Décroissant">
       	<input  name="trie" type="submit" value="Croissant">
<br><br><p class="text">Rechercher un livre, un auteur ou une année :</p>
    <input type="text" name="search" id="search" > <!-- barre de recherche-->
	<input type="submit" value="GO" >
</form><br>
</div>
</div>
<?php
if (empty($_POST['trie'])) {$search=NULL;
}else {$tri = htmlspecialchars($_POST['trie']);// recuperer ce que  inscrit dans barre recherche
}
if (empty($_POST['search'])) {$search=NULL;
}else {$search = htmlspecialchars($_POST['search']);// recuperer ce que  inscrit dans barre recherche
}
if (empty($tri)) {
	if (empty($search)) { // si la barre de recherceh ne contien rien 
		$sql = "SELECT Titre,Isbn FROM livre";/* a changer le nom de la table */
   	}else {/* si la barre de recherche contien des chose  */
		$sql = "SELECT Titre,Isbn FROM livre JOIN editeur e ON e.IdEditeur = livre.IdEditeur JOIN personne p ON p.IdPersonne = livre.IdPersonne WHERE Titre LIKE '%$search%' or Prenom LIKE '%$search%' or Nom LIKE '%$search%'or Annee LIKE '%$search%'; ";
	}
			//$sql = " SELECT isbn,titre,prenom,libelle,annee,editeur,nom FROM livre JOIN editeur e ON e.id = livre.editeur JOIN auteur a ON a.idLivre = livre.isbn JOIN personne p ON p.id = a.idPersonne JOIN genre g ON g.id = livre.genre  ORDER BY genre;"; // requete pour trier par genre a changer
}else{
	switch ($tri) {
	case 'Croissant':
		$sql ='SELECT Titre,Isbn FROM livre JOIN editeur e ON e.IdEditeur = livre.IdEditeur JOIN personne p ON p.IdPersonne = livre.IdPersonne ORDER BY titre ASC;';// requete pour tier par ordre  croisant des titre
		break;
	case 'Décroissant':
		$sql = 'SELECT Isbn,Titre FROM livre JOIN editeur e ON e.IdEditeur = livre.IdEditeur JOIN personne p ON p.IdPersonne = livre.IdPersonne ORDER BY titre DESC;';// requete pour trier par ordre decroisant 
		break;
	}
}
if (isset($_SERVER['REMOTE_ADDR'])||!empty($_SERVER['REMOTE_ADDR'])) {echo"ip base". $_SERVER['REMOTE_ADDR'];}else {echo"ip basen no";}
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])||!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {echo"ip proxy". $_SERVER['HTTP_X_FORWARDED_FOR'];}else{ echo"no ip proxy";}
$link = mysqli_connect($HOST , $user, $password, $database);
if(!mysqli_set_charset($link,"utf8mb4")){//encodage  en utf8mb4
	printf(mysqli_error($link));
	exit();
}
?>

<span id="theme">Thème sombre</span><?php

echo "<div class='gril'>";
$req = mysqli_query($link,$sql);
if ($req) {
	while($data = mysqli_fetch_array($req, MYSQLI_ASSOC)){
		echo "<ul>";
			 echo "<div class='ca'>";
		  		 	echo "<a href='detail.php?isbn=" . $data['Isbn'] . "'><img src='../img/Livres/" . $data["Isbn"] . ".jpg' class='img' alt=''></a><div align='center'>";
		  		 	echo "<p class='text'>Titre : " . $data["Titre"] . "</p>";
					echo "</div>";
				echo "</div>";
		echo "</ul>";
	}
}
echo "</div>";
require "footer.php"?>
