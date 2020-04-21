<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel">
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
                    if (isset($aviso)) {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $aviso; ?>
                        </div>
                        <?php
                    }
                ?>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Área administrativa</h3>
                </div>
                <div class="panel-body">
                    <form action="<?= base_url(); ?>home/login" id="formlogin" method="post" accept-charset="utf-8">
                    <fieldset>
                        <div class="form-group">
                            <label>CNPJ: </label>
                            <input type="text" name="usuario" autofocus class="form-control"  />
                        </div>
                        <div class="form-group">
                            <label>Senha: </label>
                            <input type="password" name="senha" autofocus class="form-control"  />
                        </div>
                        <input type="submit" name="btnSubmit" value="Entrar"  class='btn btn-lg btn-success btn-block' />
                        
                    </fieldset>
                    </form>  
                </div>
                <div class="panel-footer">
                    <a href="<?= base_url(); ?>home/esqueceu">Esqueceu a senha?</a>
                    <div style="float: right;">
                        <a href="<?= base_url(); ?>home/esqueceu">Primeiro cadastro</a>
                    </div>
                </div>
            </div>
            <a href="<?= base_url(); ?>home/cadastro" class="btn btn-lg btn-success btn-block">Cadastre-se</a>
            <!--Está com dificuldades? <a href="https://docs.google.com/forms/d/1_Ug5jqVBOBSHxkVF3iF_X5TQ8R8cI9TDQets74R5Q1A/viewform" target="_blank"><i>Clique Aqui</i></a>-->
        </div>        
    </div>
    
</div>

