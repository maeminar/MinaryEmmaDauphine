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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les données du formulaire sont présentes
    if (isset($_POST["id"]) && isset($_POST["imageURL"]) && isset($_POST["contenu"]) && isset($_POST["titre"]) && isset($_POST["auteur"])) {
        // Appel de la fonction pour modifier l'annonce dans la base de données
        modifyAd($database);
        header("Location: http://localhost/dauphineexam/examPHP/admin/index.php");
    }
}
?>
<p>Tous les champs ne sont pas remplis.</p>
<a href="index.php">Retour</a>