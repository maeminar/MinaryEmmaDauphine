<?php

function configPdo(PDO $database): void
{
    // Recevoir les erreurs PDO ( coté SQL )
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Choisir les indices dans les fetchs
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}

function connectDB(): PDO
{

    try {

        $host = "localhost";
        $databaseName = "dauphineexam";
        $user = "root";
        $password = "";

        $pdo = new PDO("mysql:host=" . $host . ";port=3307;dbname=" . $databaseName . ";charset=utf8", $user, $password);

        configPdo($pdo);

        return $pdo;
    } catch (Exception $e) {

        echo ("Erreur à la connexion: " .  $e->getMessage());

        exit();
    }
}

function findArticles(PDO $database): array {
    $reponse = $database->query('SELECT * FROM annonce');
    return $reponse->fetchAll();
}

//Fonction pour rechercher un article dans la BDD grâce à son ID//
function findArticlesbyId (PDO $database, int $id) :array {
    $reponse = $database->prepare('SELECT * FROM annonce WHERE id = :id');
    $reponse->execute([":id" => $id]);
    return $reponse->fetchAll();
}
?>