<div class="clearb"/>
<h2>Devolver projeto</h2>
<div id="quadro1" class="quadro">
	<br/>
	<div class="quadroTitulo bgLaranja bordaTop"><h4>Confirmação</h4></div>
	<br/>
	<br/>
	<div class="quadroContent">
		<p>Deseja mesmo <strong>devolver</strong> o projeto <?=$data['nome']?>? </p>
	</div>
</div>


<br/>
<form action="adm_devolver_proj.php" method="post">
	<input type="hidden" name="id" value="<?=$data['id']?>"/>
	<input type="hidden" name="action" value="ativar"/>
	<div class="direita">
		<button class='botao'>DEVOLVER PROJETO</button>
	</div>
</form>