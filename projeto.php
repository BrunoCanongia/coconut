<?php
require_once('model/database.php');
require_once('model/projeto.php');
require_once('controller/controller_projeto.php');
require_once('lib/janja.php');

session_start();


$db = new Database;
$ct = new ControllerProjeto;

$id = $_GET['id'];

$proj = $ct->getProjetoCompleto($id);

$template['nome']          = $proj['projeto']->getNome();
$template['categoria']     = $proj['projeto']->getCategoria();
$template['video']         = $proj['projeto']->getVideo();
$template['backers']       = $proj['backers'];
$template['arrecadado']    = $proj['projeto']->getValorArrecadado();
$template['diasRestantes'] = $proj['projeto']->getDiasRestantes();
$template['total']         = $proj['projeto']->getValor();
$nome = $proj['proponente']->getNome();
$nome = explode(' ', $nome);
$template['proponente'] = $nome[0];
$template['fotoProponente'] = Janja::fotoById($proj['projeto']->getIdUser());
$template['frase']         = $proj['projeto']->getFrase();
$template['descricao']     = $proj['projeto']->getDescricao();
$template['apoio']         = $proj['projeto']->getColaboracao();
$template['idProjeto']     = $proj['projeto']->getId();
$template['idCiclo']       = $proj['projeto']->getIdCiclo();
$template['pct']           = $proj['projeto']->getPorcentagem();
$template['page']          = "projeto/projeto";

// temp
if ($template['idCiclo'] == 3) {
	$template['ativo'] = 1;
} else {
	$template['ativo'] = 0;
}


// gauge
$valor = $proj['projeto']->getValor();
$valorArrecadado = $proj['projeto']->getValorArrecadado();
$diasRestantes = $proj['projeto']->getDiasRestantes();
$prazo = $proj['projeto']->getPrazo();

// exibe apenas para owner e admins:
$vip = $db->getVipList();
if (isset($_SESSION['email']) && in_array($_SESSION['email'], $vip) || (isset($_SESSION['id']) && ($_SESSION['id'] == $proj['idProponente'])) ) {
	$template['gauge_access'] = true;
}


$gauge = (((double)$valorArrecadado/(double)$valor) + ((double)$diasRestantes/(double)$prazo)) / 2.0;
$template['gauge'] = round($gauge * 100);

if($valorArrecadado >= $valor) { 
	$template['gauge'] = 100;
}

$template['session'] = ''; // inicia variável
if (isset($_GET['action']) && $_GET['action'] == 'alt') { 
	$template['action'] = 'alt';
}

// verifica se é o dono
if (isset($_SESSION['id'])) {
	if($_SESSION['id'] == $proj['idProponente']) {
		$template['session'] = 'owner';
	}
	
	// mensagem
	if($template['idCiclo'] == 1) {
		$template['msg'] = "Envie seu projeto para análise.";
	}
	
	// verifica se tem colaboração
	$colab = $proj['projeto']->getColaboracao();
	if(sizeof($colab) == 0) {
		$template['bloqueado'] = 1;
		$template['msg'] = "Antes de enviar para análise o projeto, defina os valores de apoio.";
	}
} else {
	// não é dono e não está ativo, redireciona pra index
	if($template['ativo'] == 0) {
		header('location: index.php');
	}
}


$template['menu'] = 'explorar';
require_once('template/projeto.php');

?>
