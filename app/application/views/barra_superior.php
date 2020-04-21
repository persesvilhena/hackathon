    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="<?= base_url(); ?>assets/logo.png" style="width: 50px; height: 50px; margin-left: 10px;">
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?= base_url(); ?>perfil/"><i class="fa fa-user fa-fw"></i> <?= $user->nome ?></a>
                        </li>
                        <li><a href="<?= base_url(); ?>perfil/config/"><i class="fa fa-gear fa-fw"></i> Configurações</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?= base_url(); ?>home/logout"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>


                        <li>
                            <a href="<?= base_url(); ?>painel/"><i class="fa fa-dashboard fa-fw"></i> Estatisticas da empresa</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>painel/est_gerais"><i class="fa fa-dashboard fa-fw"></i> Estatisticas Gerais</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>painel/produtos"><i class="fa fa-dashboard fa-fw"></i> Produtos</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>painel/msg/"><i class="fa fa-envelope"></i> Mensagens</a>
                        </li>




                
                    </ul>
                </div>
            </div>
        </nav>
        <div class="modal fade bs-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content" id="conteudo-do-modal">
                                        
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                            