<?php
require_once('lib/janja.php');
require_once('model/database.php');
require_once('model/projeto.php');

session_start();

$template['pag'] = isset($_GET['pag']) ? $_GET['pag'] : 1;

$db     = new Database;
$vip = $db->getVipList();

if(!isset($_SESSION['email']) || !in_array($_SESSION['email'], $vip)) {
	header('HTTP/1.0 403 Forbidden');
	echo "<h4>Forbidden<h4>";
	exit;
}


$template['menuAtivo'] = 1;
$nome = explode(" ", $_SESSION['nome']);
$template['username'] = $nome[0];

$projetos_array = $db->getAbertosList($template['pag']);
$template['projetos'] = $projetos_array['result'];
$template['num_paginas'] = $projetos_array['num_paginas'];
$template['totalRegistros'] = $projetos_array['total_registros'];

$template['page'] = "admin/projetos_abertos";
require_once("template/admin.php");
?>
