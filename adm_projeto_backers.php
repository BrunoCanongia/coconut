<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/projeto.php');

session_start();


$db     = new Database;
$vip = $db->getVipList();

if(!isset($_SESSION['email']) || !in_array($_SESSION['email'], $vip)) {
	header('HTTP/1.0 403 Forbidden');
	echo "<h4>Forbidden<h4>";
	exit;
}

$template['menuAtivo'] = $_GET['local'] == "ativos" ? 2 : 1;

$nome = explode(" ", $_SESSION['nome']);
$template['username'] = $nome[0];

$id = $_GET['id'];

$proj = $db->getProjeto($id);

$template['id'] = $id;
$template['nome'] = $proj->getNome();
$backers = $db->getBackersByProjeto($id);
$template['backers'] = $backers['result'];
$template['num_paginas'] = $backers['num_paginas'];
$template['pag'] = $backers['pagina_atual'];



$template['page'] = "admin/proj_backers";
require_once("template/admin.php");
?>
