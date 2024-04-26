<?php
session_start();

//Vérifier si l'utilisateur est connecté. Si l'utilisateur n'est pas connecté, alors il sera redirigé vers la page d'accueil :
    if (!isset($_SESSION['utilisateur']) ) {
        header("Location : http://localhost/dauphineexam/examPHP/index.php")
    }

include("../block/header.php");

require("../utils/databaseManager.php");
$title = "Page admin";



$database = connect_to_DB();

?>


<form action=""></form>