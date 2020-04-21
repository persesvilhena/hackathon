<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Produtos
            	<div style="float: right;">
        			<a href="<?= base_url() . "painel/produtos/inserir/"; ?>" class="btn btn-success">Inserir</a>
            	</div>
            </h1>
        </div>
    </div>




<?php

if(isset($this->session->userdata['avisos'])){
	$avisos = $this->session->userdata['avisos'];
	foreach ($avisos as $a) { ?>
		<div class="alert alert-<?= $a['type']; ?> alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Aviso!</strong> <?= $a['message']; ?>
		</div>
	<?php
	}
	$this->session->set_userdata('avisos', null);
} 
?>








	<div class="row">
        <div class="col-lg-12">

    	<table class="table table-hover">
        	<thead> 
        		<tr> 
        			<th>#</th> 
        			<th>Nome</th>
        			<th>Descrição</th>
        			<th>Preço</th>
        			<th>Alterar</th>
        			<th>Apagar</th>
        		</tr> 
        	</thead> 

        	<tbody> 
		        <?php foreach ($produtos as $n): ?>
		        	<tr>
		        		<td>
		        			<?= $n->id; ?>
		        		</td>

		        		<td>
		        			<?= $n->nome; ?>
		        		</td>
		        		
		        		<td>
			        		<?= $n->descricao; ?>
		        		</td>

		        		<td>
		        			<?= $n->preco; ?>
		        		</td>
		        		
		        		<td>
			        		<a href="<?= base_url() . "painel/produtos/alterar/". $n->id. ""; ?>" class="btn btn-warning">Alterar</a>
		        		</td>

		        		<td>
			        		<a href="<?= base_url() . "painel/produtos/apagar/". $n->id. ""; ?>" class="btn btn-danger">Apagar</a>
		        		</td>

		        	</tr>

		        <?php endforeach; ?>
			</tbody>
		</table>

    </div>

  </div>

</div>
