<?php include'page/header.php' ;?>




<?php 

try{
		$bdd = new PDO("mysql:host=localhost;dbname=blog;charset=utf8","root","hasquette");
	}

	catch(Exception $e)
	{
		die('Erreur :' .$e->getMesssage());
	}

// récuperer ma bdd:

$reponse = $bdd->query("SELECT * FROM billets");


// afficher index commentaires proteger par htmlspecialchars(string)


	 while ($donnees = $reponse->fetch()) {
	?>	


<div class="d-flex justify-content-around my-1">
	<img class="" src="<?php echo htmlspecialchars($donnees["img_src"]) ;?>" alt="Card image cap">
	<div class="card" style="width: 70rem;">
  		<div class="card-block">
    		<h4 class="card-title"><?php echo htmlspecialchars($donnees["titre"]) ;?></h4>
    		<p class="card-text"><?php echo htmlspecialchars($donnees["contenu"]) ;?></p>
  		</div>
  		<div class="card-block">
    		<a href="commentaires.php?id=<?php echo $donnees['id'] ?>" class="card-link">Commentaires</a>
    		<em class="card-link float-right"><?php echo htmlspecialchars($donnees["date_creation"]) ;?></em>
  		</div>
	</div>
</div>






<?php 
}

$reponse->closeCursor(); 

 ?>

<?php include'page/footer.php' ?>