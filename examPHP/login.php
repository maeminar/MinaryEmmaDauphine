<?php
session_start();
$title = "Login - Admin";
require_once("database.php");
include_once("block/header.php");
include("block/navbar.php");
?>

<div class="container">
    <h1 class="text-center m-5"><?php echo ($title ?? "Default Title") ?></h1>
</div>

<div class="p-3 m-5 d-flex justify-content-center align-items-center flex-column border border-4 border-black bg-dark text-white">
<h1>Connectez-vous</h1>
<form method="POST" action="login.php">
    <div class="form-group row">
<label for="username">Identifiant :</label>
    <div class="col-sm-10">
<input type="text" name="username" id="username">
    </div>
    </div>
    <div class="form-group row">
<label  for="password">Mot de passe :</label>
    <div class="col-sm-10">
<input type="password" name="password" id="password">
    <div class="col-sm-10">
<input type="submit" value="se connecter">
</div>
</div>
</form>

<?php
$error = [];

//vérifie si le formulaire a été soumis en méthode POST et donc validé
if ( $_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['username'], $_POST['password']))
{ 
//Si oui, alors j'accède à la BDD
    $database = connect_to_DB();
    //Ensuite, on vérifie si un compte avec le username existe
    $reponse = $database->prepare('SELECT username, password FROM utilisateur WHERE username = :username');
    $reponse->execute([
    ":username" => $_POST["username"]
    ]);
    $utilisateur = $reponse->fetch();
    // Si l'utilisateur est trouvé, vérifiez le mot de passe
    if ($utilisateur !== false) {
        if (password_verify($_POST['password'], $utilisateur['password'])) {
            $_SESSION["username"] = $_POST["username"];
            header("Location: http://localhost/dauphineexam/examPHP/admin/index.php");
            exit;
        } 
}
    else {
        $error["global"] = "Vos identifiants sont incorrects. Veuillez réessayer.";
        echo $error["global"];
}
}
?>

<?php
// Vérifier si l'utilisateur.ice est connecté(e)
if (isset($_SESSION['username'])) {
    // Inclure le fichier logoutForm.php
    include_once('admin/logoutForm.php');
}
?>

<?php
include_once("block/footer.php");
?>