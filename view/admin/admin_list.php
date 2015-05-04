
<h1>Lista de Administradores</h1>

<?php if(isset($_GET['action']) && $_GET['action'] == 'ok'): ?>
<div class='alert alert-info'>
<p>Operação concluída.</p>
</div>
<?php endif; ?>

<table class='table'>
	<thead>
		<th>EMAIL</th>
		<th style='text-align: center;'>DELETAR</th>
	</thead>
	<?php foreach ($template['list'] as $adm): ?>
	<tr>
		<td width='80%'><?=$adm['email']?></td>
		<td style='text-align: center;'><a href='adm_adm.php?action=del&id=<?= $adm['id']?>' onclick="return confirm('Tem certeza?')"><i class="fa fa-trash fa-2x"></a></td>
	</tr>
	<?php endforeach ?>
</table>

<br/><br/>
<h3>Cadastrar novo:</h3>
<form action="adm_adm.php" method="POST">
	<p>Email:</p>
	<input type="email" name="email" required/>
	<input type='submit' value="OK"/>
</form>