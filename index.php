<?php
require_once('controller/controller_user.php');
require_once('lib/janja.php');
require_once('model/database.php');

require_once('model/projeto.php');
require_once('controller/controller_projeto.php');


session_start();


$ct = new ControllerUser;
if (isset($_SESSION['id']) && !isset($_SESSION['fbId'])) {
	if (!file_exists('img/userpics/' . $_SESSION['id'] . '.jpg')) {
		$template['alertaFoto'] = true;
	}
}

$db = new Database;
$ct = new ControllerProjeto;
$proj = $ct->getProjetoCompleto(2);
$template['video']         = $proj['projeto']->getVideo();
$template['nome']          = $proj['projeto']->getNome();
$template['categoria']     = $proj['projeto']->getCategoria();
$template['diasRestantes'] = $proj['projeto']->getDiasRestantes();
$template['pct']           = $proj['projeto']->getPorcentagem();

$template['projetos'] = $ct->getProjetosAleatorios();



//$template['menu'] = '';
$template['page'] = "main";
require_once('template/main.php');
?>
