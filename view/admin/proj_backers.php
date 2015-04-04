<h2><?=$template['nome']?></h2>

<br/>
<br/>

<table class='table'>
	<thead>
		<tr>
			<th>#</th>
			<th>NOME</th>
			<th>VALOR</th>
			<th>DATA</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($template['backers'] as $backer) {?>
		<tr>
			<td><?= $backer['id']?></td>
			<td><?= $backer['nome']?></td>
			<td><?= $backer['valor']?></td>
			<td><?= $backer['data']?></td>
		</tr>
			
		<?php }
		?>
	</tbody>
</table>


<?php Janja::Paginator("adm_projeto_backers.php?", $template['num_paginas'], $template['pag']); ?>