<?php 
session_start();
// Pour supprimer uniquement le mot de passe et l'identifiant mais pas toutes les données à l'intérieur (sinon on utilise session_destroy qui supprime toute la session)
unset($_SESSION['username']);
unset($_SESSION['password']);

header("Location: http://localhost/dauphineexam/examPHP/login.php");
exit(); 
?>