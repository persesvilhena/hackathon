<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
        
            <?php if(isset($sucesso)){ ?>
                <div class="alert alert-success alert-dismissible" role="alert" style="margin-top: 15px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Sucesso!</strong> <?= $sucesso; ?>
                </div>
            <?php } if(isset($erro)){ ?>
                <div class="alert alert-danger alert-dismissible" role="alert" style="margin-top: 15px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Erro!</strong> <?= $erro; ?>
                </div>
            <?php } ?>

            <h1 class="page-header">Inserir</h1>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nome:</label><small class="caracteres"></small>
                    <input type="text" name="nome"  value="" class="form-control">
                </div>
                <div class="form-group">
                    <label>Descrição:</label>
                    <textarea name="descricao" class="form-control" rows="15"></textarea>
                </div>
                <div class="form-group">
                    <label>Preço:</label>
                    <input type="text" name="preco" value="" class="form-control">
                </div>
                <div align="right">
                    <input type="submit" name="inserir" value="Inserir" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        
    </div>
<div>


