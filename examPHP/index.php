<?php
$title = "Le Dauphiné";
require_once("database.php");
include_once("block/header.php");
include("block/navbar.php");
$dataBase = connectDB();
?>

<div class="d-flex justify-content-evenly align-items-center flex-wrap gap-3">

<?php

$articles = findArticles($dataBase);

foreach ($articles as $article) { ?>
    <div class="col-3 border border-primary border-2 rounded h-25">
        <h1><?php echo ($article['titre'])?></h1>
        <p><?php echo ($article['id'])?></p>
        <img src="<?php echo ($article['imageURL'])?>" alt="mon image">
        <p><?php echo ($article['contenu'])?></p>
        <p><?php echo ($article['auteur'])?></p>
        <p><?php echo ($article['datePublication'])?></p>
    </div>
<?php
}
?>

<div class="container">

    <h1 class="text-center"><?php echo ($title ?? "Default Title") ?></h1>

</div>

<?php
include_once("block/footer.php");
?>