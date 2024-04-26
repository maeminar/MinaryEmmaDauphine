<?php
$title = "Login - Admin";
require_once("database.php");
include_once("block/header.php");
include("block/navbar.php");
?>

<div class="container">
    <h1 class="text-center m-5"><?php echo ($title ?? "Default Title") ?></h1>
</div>

<?php
$errors = [];

//vérifie si le formulaire a été soumis en méthode POST et donc validé
if ( $_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['username'], $_POST['password']))
{ 
//Si oui, alors j'accède à la BDD
    $database = connect_to_DB();
    //Ensuite, on vérifie si un compte avec le username ET le mot de passe existe
    $reponse = $database->prepare('SELECT username, password FROM utilisateur WHERE username = :username AND password = :password');
    $reponse->execute([
    ":username" => $_POST["username"],
    ":password" => $_POST["password"]
    ]);
    $utilisateur = $reponse->fetch();
    
    if ($utilisateur !== false) {
        
    // Vérifier les mots de passe
        if (($_POST["password"] === $utilisateur["password"])) {
            // Session save
            session_start();
        
            $_SESSION["username"] = $_POST["username"];

            header("Location: https://localhost/dauphineexam/admin/index.php");
        } else {
            $errors["global"] = "Identifiants érronés";
        }
        } else {
        $errors["global"] = "Identifiants absents";
        }
    }
?>
<body>

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
include_once("block/footer.php");
?>
</body>