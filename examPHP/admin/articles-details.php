<?php
$title = "Le Dauphiné";
require_once("../database.php");
include_once("../block/header.php");
include("../block/navbar.php");
$dataBase = connect_to_DB();
session_start();
?>

<?php
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

if(isset($_GET["id"]) === false) {
    header("http://localhost/dauphineexam/examPHP/admin/index.php");
}?>
<?php

$id = $_GET["id"];
$articles = findArticlesbyId ($database, $id);

foreach ($articles as $article) {
?>
    <a href="admin/index.php">Retour à la liste des articles</a>
    <h1> <?php echo($article['titre']); ?></h1>
    <img src="<?php echo($article['imageUrl']) ?>" class="img-fluid" alt="image de mon article">
    <p><?php echo($article['id']); ?></p>
    <p><?php echo($article['contenu']); ?></p>
    <p><?php echo($article['auteur']); ?></p>
    <p><?php echo($article['datePublication']); ?></p>
<?php
}
?>