        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if(isset($this->session->userdata['avisos'])){
                        $avisos = $this->session->userdata['avisos'];
                        foreach ($avisos as $a) { ?>
                            <div class="alert alert-<?= $a['type']; ?> alert-dismissible" role="alert" style="margin-top: 15px;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Aviso!</strong> <?= $a['message']; ?>
                            </div>
                        <?php
                        }
                        $this->session->set_userdata('avisos', null);
                    } 
                    ?>
                    <h1 class="page-header">
                        <?= $user->nome; ?>
                        <div style="float: right;">
                            <a href="<?= base_url(); ?>perfil/editar/" class="btn btn-default">Editar meu perfil</a>
                            <a href="<?= base_url(); ?>perfil/config/" class="btn btn-default">Configurações</a>
                        </div>
                        <div style="clear: both;"></div>
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <b>Nome:</b> <?= $user->nome; ?><br>
                            <b>CNPJ:</b> <?= $user->documento; ?><br>
                            <b>tipo:</b> <?= $user->tipo; ?><br>
                            <b>inscricao_municipal:</b> <?= $user->inscricao_municipal; ?><br>
                            <b>endereco:</b> <?= $user->endereco; ?><br>
                            <b>datainscricao:</b> <?= $user->datainscricao; ?><br>
                            <b>data_situacao:</b> <?= $user->data_situacao; ?><br>
                            <b>nome_extra:</b> <?= $user->nome_extra; ?><br>
                            <b>uf:</b> <?= $user->uf; ?><br>
                            <b>telefone:</b> <?= $user->telefone; ?><br>
                            <b>email:</b> <?= $user->email; ?><br>
                            <b>atividade_principal</b> <?= $user->atividade_principal_id; ?><br>
                            <b>situacao</b> <?= $user->situacao; ?><br>
                            <b>bairro</b> <?= $user->bairro; ?><br>
                            <b>logradouro</b> <?= $user->logradouro; ?><br>
                            <b>numero</b> <?= $user->numero; ?><br>
                            <b>cep</b> <?= $user->cep; ?><br>
                            <b>municipio</b> <?= $user->municipio; ?><br>
                            <b>abertura</b> <?= $user->abertura; ?><br>
                            <b>natureza_juridica</b> <?= $user->natureza_juridica; ?><br>
                            <b>fantasia</b> <?= $user->fantasia; ?><br>
                            <b>cnpj</b> <?= $user->cnpj; ?><br>
                            <b>ultima_atualizacao</b> <?= $user->ultima_atualizacao; ?><br>
                            <b>status</b> <?= $user->status; ?><br>
                            <b>tipo_extra</b> <?= $user->tipo_extra; ?><br>
                            <b>complemento</b> <?= $user->complemento; ?><br>
                            <b>efr</b> <?= $user->efr; ?><br>
                            <b>motivo_situacao</b> <?= $user->motivo_situacao; ?><br>
                            <b>situacao_especial</b> <?= $user->situacao_especial; ?><br>
                            <b>data_situacao_especial</b> <?= $user->data_situacao_especial; ?><br>
                            <b>capital_social</b> <?= $user->capital_social; ?><br>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
