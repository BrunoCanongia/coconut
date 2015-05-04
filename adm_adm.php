<?php
require_once('lib/janja.php');
require_once('model/database.php');

session_start();

$db     = new Database;
$vip = $db->getVipList();

if(!isset($_SESSION['email']) || !in_array($_SESSION['email'], $vip)) {
	header('HTTP/1.0 403 Forbidden');
	echo "<h4>Forbidden<h4>";
	exit;
}

if(isset($_POST['email'])) {
	$email = $_POST['email'];
	$db->saveAdmin($email);
	header('Location: admin_list.php?action=ok');
}

if(isset($_GET['action']) && $_GET['action'] == 'del') {
	$id = $_GET['id'];
	$db->deleteAdmin($id);
	header('Location: admin_list.php?action=ok');
}

?>
