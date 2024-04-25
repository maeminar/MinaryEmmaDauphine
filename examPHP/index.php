<?php
$title = "Dauphine";

include_once("block/header.php");
?>

<div class="container">

    <h1 class="text-center"><?php echo ($title ?? "Default Title") ?></h1>

</div>

<?php
include_once("block/footer.php");
?>