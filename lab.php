<?php
require_once("model/database.php");
require_once("model/colaboracao.php");
require_once("model/projeto.php");
require_once("controller/controller_projeto.php");
require_once('lib/janja.php');

$db = new Database;
$backers = $db->getBackersByProjeto(1, 1, 8);

Janja::Debug($backers);

?>
