<?php

function configPdo(PDO $database): void
{
    // Recevoir les erreurs PDO ( coté SQL )
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Choisir les indices dans les fetchs
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}

function connect_to_DB(): PDO
{

    try {

        $host = "localhost";
        $databaseName = "dauphineexam";
        $user = "root";
        $password = "";

        $bdd = new PDO("mysql:host=" . $host . ";port=3307;dbname=" . $databaseName . ";charset=utf8", $user, $password);

        configPdo($bdd);

        return $bdd;
    } catch (Exception $e) {

        echo ("Erreur :" .  $e->getMessage());

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

//Fonction pour ajouter un article si on est connecté en tant que admin//
function createAd (PDO $database): void {
    $reponse = $database->prepare('INSERT INTO annonce (id, imageURL, contenu, titre, auteur, datePublication) VALUES (:id, :imageURL, :contenu, :titre, :auteur, :date)');
    $reponse->execute([
        ":id" => $_POST["id"],
        ":imageURL" => $_POST["imageURL"],
        ":contenu" => $_POST["contenu"],
        ":titre" => $_POST["titre"],
        ":auteur" => $_POST["auteur"],
        ":date" => date("Y-m-d H:i:s")
    ]);
    return;
}

//Fonction pour modifier un article si on est connecté en tant que admin//
function modifyAd (PDO $database) : void {
    $reponse = $database->prepare('UPDATE annonce SET imageURL = :imageURL, contenu = :contenu, titre = :titre, auteur = :auteur, datePublication = :date WHERE id = :id');
    $reponse->execute([
        ":imageURL" => $_POST["imageURL"],
        ":contenu" => $_POST["contenu"],
        ":titre" => $_POST["titre"],
        ":auteur" => $_POST["auteur"],
        ":date" => date("Y-m-d H:i:s"),
        ":id" => $_POST["id"]
    ]);
    return;
}

//Fonction pour supprimer un article si on est connecté en tant que admin//
function deleteAd (PDO $database): void {
    $reponse = $database->prepare('DELETE FROM annonce WHERE id = :id');
    $reponse->execute([
        ":id" => $_GET["id"]
    ]);
    return;
}
?>