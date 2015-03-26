<br/>
<h3>Projetos abertos (<?=$template['totalRegistros']?>)</h3>
<br/>
<table class='table'>
	<thead>
		<tr>
			<th>#</th>
			<th>CATEGORIA</th>
			<th>PROJETO</th>
			<th class='center_text'>REVISAR</th>
			<th class='center_text'>CONFIG</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($template['projetos'] as $proj) {?>
		<tr>
			<td class='editar'><?= $proj['id']?></td>
			<td><?= $proj['categoria']?></td>
			<td><?= $proj['nome'] ?></td>
			<td class='editar center_text centro'><a href='projeto.php?id=<?= $proj['id']?>&mode=007' target="blank"><img src='img/tango/contact-new.png'></a></td>
			<td class='editar center_text centro'><a href='adm_info_proj.php?id=<?= $proj['id']?>&local=abertos'><img src='img/tango/document-properties.png'></a></td>
		
		</tr>
			
		<?php } ?>
	</tbody>
</table>

<?php Janja::Paginator("adm_projetos_abertos.php?", $template['num_paginas'], $template['pag']); ?>