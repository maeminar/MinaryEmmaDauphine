<?php
$title = "Le Dauphiné";
require_once("database.php");
include_once("block/header.php");
include("block/navbar.php");
$dataBase = connect_to_DB();
session_start();
?>

<div class="container">
    <h1 class="text-center m-3"><?php echo ($title ?? "Default Title") ?></h1>
</div>


<?php
$articles = findArticles($dataBase);
foreach ($articles as $article) { ?>
<div class="row d-flex justify-content-center">
  <div class="border border-grey m-5 col-sm-6 mb-3 mb-sm-0 text-center">
        <p >Date de publication : Le <?php echo ($article['datePublication'])?></p>
        <h1><?php echo ($article['titre'])?></h1>
        <img src="<?php echo $article['imageUrl'];?>" class="img-fluid" alt="image de mon article">
        <p><?php echo ($article['contenu'])?></p>
        <p class="m-3">Article rédigé par : <?php echo ($article['auteur']);?></p>
        <a href="articles-details.php?id=<?php echo $article['id']; ?>">En savoir plus</a>
    </div>
<?php
}
?>
</div>

<?php
include_once("block/footer.php");
?>