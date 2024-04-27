<?php
session_start();
//Vérifier si l'utilisateur est connecté. Si l'utilisateur n'est pas connecté, alors il sera redirigé vers la page d'accueil :
    if (!isset($_SESSION['username']) ) {
        header("Location : http://localhost/dauphineexam/examPHP/index.php");
    }
$title = "Le Dauphiné - Admin";
require_once("../database.php");
include_once("../block/header.php");
include_once('logoutForm.php');
$database = connect_to_DB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les données du formulaire sont présentes
    if (isset($_POST["id"]) && isset($_POST["imageURL"]) && isset($_POST["contenu"]) && isset($_POST["titre"]) && isset($_POST["auteur"])) {
        // Appel de la fonction pour ajouter l'annonce à la base de données
        createAd($database);
    } else {
        echo "Tous les champs du formulaire doivent être remplis.";
    }
}
?>

<div class="p-3 m-5 d-flex justify-content-center align-items-center flex-column border border-4 border-black bg-dark text-white">
<h1>Ajouter une annonce</h1>
    <form method='POST' action='createAd.php'>
            <div class="form-group row">
        <label for="id" name="id">id de l'annonce :</label>
            <div class="col-sm-10">
        <input type="texte" name="id" id="id">
            </div>
            </div>
            <div class="form-group row">
        <label for="imageURL" name="imageURL">URL de l'image :</label>
            <div class="col-sm-10">
        <input type="texte" name="imageURL" id="imageURL">
            </div>
            </div>
            <div class="form-group row">
        <label for="contenu" name="contenu">Contenu de l'annonce :</label>
            <div class="col-sm-10">
        <input type="texte" name="contenu" id="contenu">
            </div>
            </div>
            <div class="form-group row">
        <label for="titre" name="titre">Titre de mon annonce :</label>
            <div class="col-sm-10">
        <input type="texte" name="titre" id="titre">
            </div>
            </div>
            <div class="form-group row">
        <label for="auteur" name="auteur">Auteur de l'annonce :</label>
            <div class="col-sm-10">
        <input type="texte" name="auteur" id="auteur">
            </div>
            </div>
        <input type="submit" value="Ajouter">
    </form>
</div>