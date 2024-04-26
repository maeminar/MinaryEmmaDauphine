<?php
$title = "Le Dauphiné";
require_once("database.php");
include_once("block/header.php");
include("block/navbar.php");
$dataBase = connectDB();
?>

<div class="container">

    <h1 class="text-center m-5"><?php echo ($title ?? "Default Title") ?></h1>

</div>

<?php 
if(isset($_GET["id"]) === false) {
    header("http://localhost/dauphineexam/examPHP/index.php");
}?>
<?php
$database = connect_to_DB();

$id = $_GET["id"];
$articles = findArticlesbyId ($database, $id);

foreach ($articles as $article) {
?>
    <h1> <?php echo($article['titre']); ?></h1>
    <img src="<?php echo($article['imageUrl']) ?>" class="img-fluid" alt="image de mon article">
    <p><?php echo($article['id']); ?></p>
    <p><?php echo($article['contenu']); ?></p>
    <p><?php echo($article['auteur']); ?></p>
    <p><?php echo($article['datePublication']); ?></p>
    <a href="index.php">Retour à la liste des articles</a>
<?php
}
?>


