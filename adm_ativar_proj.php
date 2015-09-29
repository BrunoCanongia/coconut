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

$data['menuAtivo'] = 1;
$nome = explode(" ", $_SESSION['nome']);
$data['username'] = $nome[0];

if (isset($_POST['id'])) {
	$idProjeto = $_POST['id'];
	$proj = $db->getProjeto($idProjeto);
	if ($proj->getIdCiclo() == 3) {
		$proj->setIdCiclo(2);
		$proj = $db->saveProjeto($proj);
	}
	if ($proj->getIdCiclo() == 2) {
		$proj->setIdCiclo(3);
		$proj = $db->saveProjeto($proj);
	}

 	header("location: adm_projetos_ativos.php");
}



if (isset($_GET['id'])) {
	$nome = explode(" ", $_SESSION['nome']);
	$template['username'] = $nome[0];

	$id = $_GET['id'];

	$proj = $db->getProjeto($id);
	$data['nome'] = $proj->getNome();
	$data['id'] = $id;

	$lista = $db->getAbertosList();
	$data['qtdAbertos'] = sizeof($lista);
	$lista = $db->getAtivosList();
	$data['qtdAtivos'] = sizeof($lista);

	$template['page'] = "admin/ativar_proj";
	require_once("template/admin.php");
}
?>
