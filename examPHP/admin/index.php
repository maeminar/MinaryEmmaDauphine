<?php
$title = "Le Dauphiné";
require_once("../database.php");
include_once("../block/header.php");
include("../block/navbar.php");
$dataBase = connect_to_DB();
session_start();
?>

<?php

//Vérifier si l'utilisateur est connecté. Si l'utilisateur n'est pas connecté, alors il sera redirigé vers la page d'accueil :
    if (!isset($_SESSION['username']) ) {
        header("Location : http://localhost/dauphineexam/examPHP/index.php");
    }

// Vérifier si l'utilisateur.ice est connecté(e)
if (isset($_SESSION['username'])) {
    // Inclure le fichier logoutForm.php pour permettre à l'utilisateur de se déconnecter
    include_once('logoutForm.php');
}
?>

<div class="container">

    <h1 class="text-center m-5"><?php echo ($title ?? "Default Title") ?></h1>

</div>


<?php
$articles = findArticles($dataBase);
foreach ($articles as $article) { ?>
<div class="row d-flex justify-content-center m-5">
  <div class="border border-grey col-sm-6 mb-3 mb-sm-0">
  <p class="m-3">Date de publication : Le <?php echo ($article['datePublication'])?></p>
        <h1><?php echo ($article['titre'])?></h1>
        <p>ID de l'article :<?php echo ($article['id'])?></p>
        <img src="<?php echo $article['imageUrl'];?>" class="img-fluid" alt="image de mon article">
        <p><?php echo ($article['contenu'])?></p>
        <p class="m-3">Article rédigé par : <?php echo ($article['auteur']);?></p>
        <a href="../admin/articles-details.php?id=<?php echo $article['id']; ?>">En savoir plus</a>
    </div>
<?php
}
?>
</div>

<?php
// Pour ajouter le contenu
?>
        <form method='POST' action='createAd.php'>
    <textarea name="texte" cols="50" rows="8"></textarea>
    <input type="submit" value="Créer du contenu">
        </form>
<?php
//Pour supprimer le contenu
?>
        <form method='POST' action='deleteAd.php'>
    <textarea name="texte" cols="50" rows="8"></textarea>
    <input type="submit" value="Supprimer du contenu">
        </form>
<?php
//Pour modifier du contenu
?>
        <form method='POST' action='modifyAd.php'>
    <textarea name="texte" cols="50" rows="8"></textarea>
    <input type="submit" value="Modifier du contenu">
        </form>

<?php
include_once("block/footer.php");
?>