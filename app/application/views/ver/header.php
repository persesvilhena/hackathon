<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $empresa->nome ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url(); ?>assets/ver/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="narrow-jumbotron.css" rel="stylesheet">
  </head>

  <body>

    <div class="container" style="margin-top: 10px;">
      <div class="header clearfix">
        <nav>
        <ul class="nav nav-pills float-left">
            <li class="nav-item">

              <img src="<?= base_url(); ?>assets/logo.png" style="width: 80px; height: 80px;">
            </li>
            
          </ul>
          <ul class="nav nav-pills float-right" style="margin-top: 20px;">
            <li class="nav-item">
              <a class="btn btn-outline-info" href="http://192.168.203.217:8000" style="margin-right: 10px;">Voltar as buscas</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-info" href="<?= base_url(); ?>ver/empresas/<?= $empresa->id; ?>" style="margin-right: 10px;">Home</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-info" href="<?= base_url(); ?>ver/empresas/<?= $empresa->id; ?>/produtos" style="margin-right: 10px;">Produtos e serviços</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-info" href="<?= base_url(); ?>ver/empresas/<?= $empresa->id; ?>/contato" style="margin-right: 10px;">Contato</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-info" href="<?= base_url(); ?>painel">Administração</a>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted"></h3>
      </div>