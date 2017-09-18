<?php
    try
            {
              $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root','hasquette');
            }
            catch (Exception $e)
            {
                    die('Erreur : ' . $e->getMessage());
            } ?>

 ?>

<?php 
	$reponse = $bdd->prepare('SELECT * FROM billets WHERE id= ?');
	$reponse->execute([$_GET['id']]);
	$donnees = $reponse->fetch();
 ?>

<?php include'page/header.php' ?>


 <div class="d-flex justify-content-around my-1">
	<img class="" src="<?php echo htmlspecialchars($donnees["img_src"]) ;?>" alt="Card image cap">
	<div class="card" style="width: 70rem;">
  		<div class="card-block">
    		<h4 class="card-title"><?php echo htmlspecialchars($donnees["titre"]) ;?></h4>
    		<p class="card-text"><?php echo htmlspecialchars($donnees["contenu"]) ;?></p>
  		</div>
  		<div class="card-block">
    		<em class="card-link float-right"><?php echo htmlspecialchars($donnees["date_creation"]) ;?></em>
  		</div>
	</div>
</div>

<!-- _________________FIN  ARTICLE_________________ -->

<?php 

	$comments = $bdd->prepare('SELECT * FROM commentaires WHERE id_billet= ?');
	$comments->execute([$_GET['id']]);
	$donneesComments = $comments->fetchAll();


 ?>
<div class="container">
	<div class="row text-center">
		<div class="w-50 text-white  col-12 col-sm-12 col-md-6">
			<?php foreach ($donneesComments as $key => $value): ?>
				<p>auteurs:<?php echo $value["auteur"]; ?></p>
				<p>commentaires:<?php echo $value["commentaire"]; ?></p>
				<p>date:<?php echo $value["date_commentaire"]; ?></p>
			<?php endforeach ?>
		</div>
		


		<div class="col-12 col-sm-12 col-md-6">
			<form class="w-50 d-flex flex-column my-5 mx-auto" action="commentaires_post.php"  method="post">
				<input type="text" name="" placeholder="pseudo">

				<textarea name="message" placeholder="tape ton text ici!" rows="5" cols="25"></textarea>
				<input type="submit" value="envoyer" name="">
			</form>
		</div>
	</div>
</div> 


<?php include'page/footer.php' ?>