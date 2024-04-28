<?php
session_start();
//Vérifier si l'utilisateur est connecté. Si l'utilisateur n'est pas connecté, alors il sera redirigé vers la page d'accueil :
    if (!isset($_SESSION['username']) ) {
        header("Location: http://localhost/dauphineexam/examPHP/index.php");
    }
require_once("../database.php");
include_once("../block/header.php");
$database = connect_to_DB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Appel de la fonction pour supprimer l'annonce 
        deleteAd($database);
        header("Location: http://localhost/dauphineexam/examPHP/admin/index.php");
}
?>
