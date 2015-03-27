<!-- avisos -->
	<div class="container">
		<?php if (isset($template['alertaFoto']) && $template['alertaFoto'] == true): ?>
		<div class="alert alert-info">
			<p>Você ainda não tem foto. <a href="userpic.php">Clique aqui</a> para enviar.</p>
		</div>
		<?php endif; ?>
	</div>
</div>

<div class='container'>

	<div class="row painelzao">
			<div class="col-sm-4">
				<img src="img/destaque-3.jpg"/>
				<h4 style='margin-top: 30px'>EXPLORE</h4>
			</div>
			<div class="col-sm-4">
				<img src="img/destaque-2.jpg"/>
				<h4 style='margin-top: 30px'>PARTICIPE</h4>
			</div>
			<div class="col-sm-4">
				<img src="img/destaque-1.jpg"/>
				<h4 style='margin-top: 30px'>CRIE UM PROJETO</h4>
			</div>
		</div>
	</div>
	<br/>

<div  class="destaque">
	<div class="container">
	<!-- destaque -->
		<div class='row'>
			<div class='col-sm-8'>
				<div class='youtubeVideo'>
					<iframe src="http://www.youtube.com/embed/<?=$template['video']?>" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			<div class='col-sm-4'>
				<h1><?= $template['nome'] ?></h1>
				<h4>(<?= $template['categoria'] ?>)</h4>
				<br/>
				<span class='numeroGrande'><?= $template['diasRestantes']?></span>&nbsp;&nbsp;dias restantes
				<br/>
				<span class='numeroGrande'><?= $template['pct']?>%</span>&nbsp;&nbsp;financiado
				<br/><br/>
				<button class='btn btn-lg btn-success'>Saiba mais</button>
			</div>
		</div>
	</div>
</div>
<!-- /avisos -->





<!-- projetos -->
<div class="container" style="padding: 50px 0;">

	<div class='container'>
	<div class='row'>
		<?php foreach($template['projetos'] as $proj): ?>

		<div class='col-sm-4 col-md-4'>
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
</div>
<!-- /projetos -->