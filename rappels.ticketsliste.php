<?php 

include("rappel.connection.inc.php");
// Connection information

try{
    $pdo = new PDO($DB_dsn, $DB_login, $DB_pass);
}
catch(PDOException $pdoe){
    echo("$pdoe");
    exit();
}

if (!$pdo) {
	echo("Impossible de se connecter");
	exit();
}

$statut = $pdo->quote($_REQUEST['statut']);
$id = $pdo->quote($_REQUEST['id']);

$myQuery = "UPDATE `ticket` SET `statut` = $statut WHERE `id` = $id";

$result = $pdo->query($myQuery);

if (!$result) {
	echo "Impossible to execute query";
	print_r($myQuery);
	exit();
}else{
	echo "modifie";
}

?>
