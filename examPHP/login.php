<?php
$title = "Login - Admin";

include_once("block/header.php");
include("block/navbar.php");
?>

<div class="container">
    <h1 class="text-center m-5"><?php echo ($title ?? "Default Title") ?></h1>
</div>

<?php

//vérifie si le formulaire a été soumis en méthode POST et donc validé
if ( $_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['username'], $_POST['password'])) {
    //Si oui, alors j'accède à la BDD
    $database = connectDB();
    //Ensuite, on vérifie si un compte avec le username ET le mot de passe existe
    $reponse = $database->prepare('SELECT username, password FROM utilisateur WHERE username = :username AND password = :password');
    $reponse->execute([
    ":username" => $_POST["username"],
    ":password" => $_POST["password"]
]);
    $utilisateur = $reponse->fetch();
}
?>


<form>
  <div class="form-group row">
    <label for="username" name="username" id="username" class="col-sm-2 col-form-label">Identifiant :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" placeholder="identifiant">
    </div>
  </div>
  <div class="form-group row">
    <label for="password" name="password" id="password" class="col-sm-2 col-form-label">Mot de passe :</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" placeholder="mot de passe">
    </div>
    
  </div>
  <input type="submit" value="Se connecter">
</form>

<?php
include_once("block/footer.php");
?>