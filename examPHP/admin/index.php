<?php
session_start();
//Vérifier si l'utilisateur est connecté. Si l'utilisateur n'est pas connecté, alors il sera redirigé vers la page d'accueil :
    if (!isset($_SESSION['username']) ) {
        header("Location: http://localhost/dauphineexam/examPHP/index.php");
    }
?>
<?php
$title = "Le Dauphiné - Admin";
require_once("../database.php");
include_once("../block/header.php");
include_once('logoutForm.php');
$dataBase = connect_to_DB();
?>

<form method="POST" action="createAd.php">
    <input class="btn btn-primary text-align-center m-4" type="submit" value="Ajouter une annonce">
</form>

<div class="container">
    <h1 class="text-center m-3"><?php echo ($title ?? "Default Title") ?></h1>
</div>

<?php
$articles = findArticles($dataBase);
foreach ($articles as $article) { ?>
<div class="row d-flex justify-content-center">
<div class="border border-grey col-sm-6 mb-3 mb-sm-0">
        <p class="m-3">Date de publication : Le <?php echo ($article['datePublication'])?></p>
        <h1><?php echo ($article['titre'])?></h1>
        <p>ID de l'article :<?php echo ($article['id'])?></p>
        <img src="<?php echo $article['imageUrl'];?>" class="img-fluid" alt="image de mon article">
        <p><?php echo ($article['contenu'])?></p>
        <p class="m-3">Article rédigé par : <?php echo ($article['auteur']);?></p>
        <a class="btn btn-primary text-align-center m-4" href="modifyAd.php?id=<?php echo $article['id']?>">Modifier cette annonce</a>
        <form method='POST' action='deleteAd.php?id=<?php echo $article['id']?>'>  
        <label for="id" name="id"></label>
        <input class="btn btn-danger text-align-center m-3" type="submit" name="id" id="id" value="Supprimer cette annonce">
        </form>
</div>
<?php
}
?>
</div>

<?php
include_once("../block/footer.php");
?>