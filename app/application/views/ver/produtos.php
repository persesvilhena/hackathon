

      <div class="jumbotron" style="margin-top: 20px;">
        <h1 class="display-3">Produtos</h1>
        <hr>
        <?php
        foreach ($produtos as $n) { ?>
			<div class="card" style="width: 20rem;">
				<div class="card-body">
					<h4 class="card-title"><?= $n->nome; ?></h4>
					<h6 class="card-subtitle mb-2 text-muted">R$ <?= $n->preco; ?></h6>
					<p class="card-text"><?= $n->descricao; ?></p>
				</div>
			</div>
        <?php } ?>
      </div>




