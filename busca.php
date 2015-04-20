<?php
require_once('controller/controller_projeto.php');
require_once('lib/janja.php');

session_start();

if (isset($_SESSION['id'])) {
	if (!file_exists('img/userpics/' . $_SESSION['id'] . '.jpg')) {
		$template['alertaFoto'] = true;
	}
}

$db = new Database;
$template['categorias'] = $db->getCategorias();

$ct = new ControllerProjeto;
if (isset($_POST['busca'])) {
	$template['projetos'] = $ct->getProjetosBusca($_POST['busca']);
	$template['termo'] = $_POST['busca'];
	$template['numero_resultado'] = sizeof($template['projetos']);
	$template['menu'] = 'explorar';
	$template['page'] = "busca";
	require_once('template/main.php');
}

?>
