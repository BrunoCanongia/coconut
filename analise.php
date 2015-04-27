<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/projeto.php');

$idProjeto = $_GET['id'];

$db = new Database;
$proj = $db->getProjeto($idProjeto);
if ($proj->getIdCiclo() == 1) {
	$proj = $db->setCiclo($proj, 2);
}

header("location: projeto.php?id=$idProjeto");
// modo análise

?>
