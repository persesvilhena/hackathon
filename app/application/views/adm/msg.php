


        <div id="page-wrapper">
            <div class="row">

                <h1 class="page-header">Mensagens</h1>
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

            </div>

            <div class="row">

                <?php
                    foreach ($postagens as $n) {
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading"><b>Pergunta: <?= $n->post; ?></b></div>

                        <div class="panel-body">
                            Resposta: <?= $n->repost; ?>
                            
                        </div>

                        <div class="panel-footer">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Resposta:</label>
                                    <textarea class="form-control" name="msg" rows="3"></textarea>
                                </div>
                                <div style="float: right;">
                                    <input type="hidden" name="id" value="<?= $n->id; ?>">
                                    <input type="submit" name="postar" value="Responder" class="btn btn-success">
                                </div>
                                <div style="clear: both;"></div>
                            </form>
                        </div>
                    </div>

                <?php } ?>
            </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
