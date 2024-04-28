<?php
session_start();
//Vérifier si l'utilisateur est connecté. Si l'utilisateur n'est pas connecté, alors il sera redirigé vers la page d'accueil :
    if (!isset($_SESSION['username']) ) {
        header("Location: http://localhost/dauphineexam/examPHP/index.php");
    }
require_once("../database.php");
include_once("../block/header.php");
include_once('logoutForm.php');
$database = connect_to_DB();

if(isset($_GET['id'])) 
{
    $id = $_GET['id'];
}

$article = findArticlesbyId ($database, $id);

foreach ($article as $art) {
$imageUrl = $art['imageUrl'];
$contenu = $art['contenu'];
$titre = $art['titre'];
$auteur = $art['auteur'];
}
?>

<div class="p-3 m-5 d-flex justify-content-center align-items-center flex-column border border-4 border-black bg-dark text-white">
<h1>Modifier</h1>
    <form method='POST' action='validation_modify.php'>
            <div class="form-group row">
        <label for="id" name="id">ID :</label>
        <input class="form-control" readonly type="texte" name="id" id="imageURL" value="<?php echo($id);?>">
            </div>
            <div class="form-group row">
        <label for="imageURL" name="imageURL">URL de l'image :</label>
        <input class="form-control" type="texte" name="imageURL" id="imageURL" value="<?php echo($imageUrl);?>">
            </div>
            <div class="form-group row">
        <label for="contenu" name="contenu">Contenu de l'annonce :</label>
        <input class="form-control" type="texte" name="contenu" id="contenu" value="<?php echo($contenu);?>">
            </div>
            <div class="form-group row">
        <label for="titre" name="titre">Titre de mon annonce :</label>
        <input class="form-control" type="texte" name="titre" id="titre" value="<?php echo($titre);?>">
            </div>
            <div class="form-group row">
        <label for="auteur" name="auteur">Auteur de l'annonce :</label>
        <input class="form-control" type="texte" name="auteur" id="auteur" value="<?php echo($auteur);?>">
            </div>
        <input type="submit" value="Modifier">
    </form>
</div>

<a class="btn btn-primary text-align-center m-5" href="index.php">Retour</a>