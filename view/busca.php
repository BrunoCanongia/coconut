
<h2>Busca</h2>
<br/>
<h4>Termo: <?= $template['termo'] ?></h4>
<h4>Encontrados: <?= $template['numero_resultado'] ?></h4>



<br/>
<div class='row'>
	<?php foreach($template['projetos'] as $proj): ?>

	<div class='col-sm-4 col-md-3'>
		<div class='card'>

			<div class='col-sm-12'>
				<a href='projeto.php?id=<?=$proj['projeto']->getId()?>'><img src='<?=$proj['projeto']->getImage()?>'/></a>
			</div>

			<div class='cardTextoContainer'>
				<div class='card-spacer'>
					<div class='col-sm-12 cardNome'>
						<h4>
							<?php if($proj['projeto']->getPorcentagem() >= 100): ?>
							<img src='img/medal.png' class='medal' style="width: 16px;"/>
							<?php endif; ?><?=$proj['projeto']->getNome()?>
						</h4>
					</div>
					<div class='col-sm-12 cardCategoria'>
						<?=$proj['projeto']->getCategoria()?>
					</div>

					<div class='col-sm-12 cardFrase'>
						<?=$proj['projeto']->getFrase()?>
					</div>
				</div>

				<div class='col-sm-12 cardFinanciado'>
					<strong><?=$proj['projeto']->getPorcentagem()?>% financiado
				</div>

				

				<div class='col-sm-12'>
					<div class='barraContainer'>
						<?php 
						$barra = ($proj['projeto']->getPorcentagem() > 100)? 100 : $proj['projeto']->getPorcentagem();
						?>
						<div class='barra' style='width: <?=$barra?>%'></div>
					</div>
				</div>

				<div class='row'>
					<div class='col-xs-6'>
						<div class='col-sm-12 cardArrecadado'>
							<strong>R$&nbsp;<?=$proj['projeto']->getValorArrecadado()?></strong>
						</div>
						<div class='col-xs-12 cardArrecadado'>
							arrecadado
						</div>
					</div>
					
					<div class='col-sm-6'>
						<div class='col-sm-12 cardArrecadado'>
							<strong><?=$proj['projeto']->getDiasRestantes()?></strong>&nbsp;dias
						</div>
						<div class='col-sm-12 cardArrecadado'>
							restantes
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<?php endforeach; ?>
</div>

<br/>
<br/>