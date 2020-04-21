<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Editar perfil
                <div style="float: right;">
                    <a href="<?= base_url(); ?>perfil/" class="btn btn-default">Meu perfil</a>
                </div>
                <div style="clear: both;"></div>
            </h1>
        </div>
    </div>

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
        </div>

            <form method="post" action="" enctype="multipart/form-data">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" name="nome" value="<?= $user->nome; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>tipo:</label>
                        <input type="text" name="tipo" value="<?= $user->tipo; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>inscricao_municipal:</label>
                        <input type="text" name="inscricao_municipal" value="<?= $user->inscricao_municipal; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>endereco:</label>
                        <input type="text" name="endereco" value="<?= $user->endereco; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>datainscricao:</label>
                        <input type="text" name="datainscricao" value="<?= $user->datainscricao; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>data_situacao:</label>
                        <input type="text" name="data_situacao" value="<?= $user->data_situacao; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>uf:</label>
                        <input type="text" name="uf" value="<?= $user->uf; ?>" class="form-control">
                    </div>
                
                    <div class="form-group">
                        <label>telefone:</label>
                        <input type="text" name="telefone" value="<?= $user->telefone; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>atividade_principal:</label>
                        <input type="text" name="atividade_principal" value="<?= $user->atividade_principal; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>bairro:</label>
                        <input type="text" name="bairro" value="<?= $user->bairro; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>logradouro:</label>
                        <input type="text" name="logradouro" value="<?= $user->logradouro; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>numero:</label>
                        <input type="text" name="numero" value="<?= $user->numero; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>cep:</label>
                        <input type="text" name="cep" value="<?= $user->cep; ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>municipio:</label>
                        <input type="text" name="municipio" value="<?= $user->municipio; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>abertura:</label>
                        <input type="text" name="abertura" value="<?= $user->abertura; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>natureza_juridica:</label>
                        <input type="text" name="natureza_juridica" value="<?= $user->natureza_juridica; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>fantasia:</label>
                        <input type="text" name="fantasia" value="<?= $user->fantasia; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>ultima_atualizacao:</label>
                        <input type="text" name="ultima_atualizacao" value="<?= $user->ultima_atualizacao; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>status:</label>
                        <input type="text" name="status" value="<?= $user->status; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>tipo_extra:</label>
                        <input type="text" name="tipo_extra" value="<?= $user->tipo_extra; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>complemento:</label>
                        <input type="text" name="complemento" value="<?= $user->complemento; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>efr:</label>
                        <input type="text" name="efr" value="<?= $user->efr; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>motivo_situacao:</label>
                        <input type="text" name="motivo_situacao" value="<?= $user->motivo_situacao; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>situacao_especial:</label>
                        <input type="text" name="situacao_especial" value="<?= $user->situacao_especial; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>data_situacao_especial:</label>
                        <input type="text" name="data_situacao_especial" value="<?= $user->data_situacao_especial; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>capital_social:</label>
                        <input type="text" name="capital_social" value="<?= $user->capital_social; ?>" class="form-control">
                    </div>

                    <div align="right">
                        <input type="submit" name="salvar" value="Salvar" class="btn btn-success">
                    </div>
                </div>
                
                
            </form>


        
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
