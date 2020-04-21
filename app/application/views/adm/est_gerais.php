


        <div id="page-wrapper">
            <div class="row">

                <h1 class="page-header">Estatisticas Gerais</h1>
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

               
            </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
