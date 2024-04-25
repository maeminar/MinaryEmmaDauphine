<?php

function configPdo(PDO $pdo): void
{
    // Recevoir les erreurs PDO ( coté SQL )
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Choisir les indices dans les fetchs
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
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
?>