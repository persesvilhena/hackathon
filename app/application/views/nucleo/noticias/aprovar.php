<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Aprovar Notícia <small><?= $noticia->not_titulo; ?></small></h1>
            <h3><b>Tem certeza que deseja aprovar a noticia: </b><?= $noticia->not_titulo; ?> <b>?</b></h3>
            <br>
            <form action="" method="post">
                <input type="submit" name="aprovar_noticia" value="Sim" class="btn btn-success">
                <a href="../../noticias" class="btn btn-danger">Não</a>
            </form>
            <div style="float: right;">
                
            </div>
        </div>
    </div>
<div>