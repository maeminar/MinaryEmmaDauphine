<?php
session_start();

//Vérifier si l'utilisateur est connecté. Si l'utilisateur n'est pas connecté, alors il sera redirigé vers la page d'accueil :
if (!isset($_SESSION['utilisateur']) ) {
    header("Location : http://localhost/dauphineexam/examPHP/index.php");
}

include("../block/header.php");

require("../utils/database.php");
$title = "Page admin";

$pdo = connectDB();

?>
<?php
// Pour ajouter le contenu
?>
        <form method='POST' action='createAd.php'>
    <textarea name="texte" cols="50" rows="8"></textarea>
    <input type="submit" value="Créer du contenu">
        </form>
<?php
//Pour supprimer le contenu
?>
        <form method='POST' action='deleteAd.php'>
    <textarea name="texte" cols="50" rows="8"></textarea>
    <input type="submit" value="Supprimer du contenu">
        </form>
<?php
//Pour modifier du contenu
?>
        <form method='POST' action='modifyAd.php'>
    <textarea name="texte" cols="50" rows="8"></textarea>
    <input type="submit" value="Modifier du contenu">
        </form>

<?php
var_dump($_SESSION);
include_once("../block/footer.php");
?>