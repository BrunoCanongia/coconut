<?php
require_once('lib/janja.php');
require_once('lib/moip-php-master/lib/Moip.php');
require_once('lib/moip-php-master/lib/MoipClient.php');
require_once('model/database.php');
require_once('model/colaboracao.php');
require_once('controller/controller_cotas.php');
session_start();
$db = new Database;
$colab = $db->getColaboracao($_POST['id']);
$seed = md5(date("Y-m-d H:i:s") . "JANJA");
$ct = new ControllerCotas;
$idUser = $_SESSION['id'];
$ct->comprarCotas($idUser, $_POST['id'], $seed);

$moip = new MoIP;
// JanjaDev teste
$moip->setCredential(array("key"=>"4VQGQOGKWA1QBHJEOR0HTAXNFSYIYNRYK9BDZ6YU", "token"=>"JB2QWDEXN3HKYH28JBZUFKFWHI1PJMJZ"));

// Solucionatica
// $moip->setCredential(array("key"=>"MA73AACTTDBDYSOVG6PC9KO97H12BOZF", "token"=>"XHQ9CXHMKLOJ75LTLDJGUDMOMPUVNQXOPN13PWQR"));

$moip->setUniqueId($seed);
$moip->setReason('Solucionatica - Fase de testes');
$moip->setValue($colab->getValor());
$moip->setEnvironment('test');
$moip->setReturnURL('http://rc2.kinghost.net/solucionatica/projetos_apoiados.php');
$moip->setNotificationURL('http://rc2.kinghost.net/solucionatica/labmoip.php');
$moip->validate();
$moip->send();



$url = $moip->getAnswer()->payment_url;
Header("Location: $url");

?>
