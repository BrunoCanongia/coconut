<br/>
<h3>Projetos ativos (<?=$template['qtdAtivos']?>)</h3>
<br/>

	<form>
	<div class="input-group col-xs-4">
	  <span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span>
	  <input class="form-control" type="password" placeholder="Busca">
	</div>
	</form>
	<br/>

<table class='table'>
	<thead>
		<tr>
			<th>#</th>
			<th>CATEGORIA</th>
			<th>PROJETO</th>
			<th style='text-align: center;'>REVISAR</th>
			<th style='text-align: center;'>CONFIG</th>
			<th style='text-align: center;'>BACKERS</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($template['projetos'] as $proj) {?>
		<tr>
			<td class='editar'><?= $proj['id']?></td>
			<td><?= $proj['categoria']?></td>
			<td><?= $proj['nome'] ?></td>
			<td style='text-align: center;'><a href='projeto.php?id=<?= $proj['id']?>&mode=007' target="blank"><i class="fa fa-coffee fa-2x"></a></td>
			<td style='text-align: center;'><a href='adm_info_proj.php?id=<?= $proj['id']?>&local=ativos'><i class="fa fa-gears fa-2x"></a></td>
			<td style='text-align: center;'><a href='adm_projeto_backers.php?id=<?= $proj['id']?>&local=ativos'><i class="fa fa-money fa-2x"></i></a></td>
		</tr>
			
		<?php }
		?>
	</tbody>
</table>


<?php Janja::Paginator("adm_projetos_ativos.php?", $template['num_paginas'], $template['pag']); ?>