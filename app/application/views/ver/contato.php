

      <div class="jumbotron" style="margin-top: 20px;">
        <h1 class="display-3">Contato
            <div style="float: right;">
                <img src="http://icon-icons.com/icons2/1099/PNG/512/1485482214-facebook_78681.png" style="width: 80px; height: 80px;">
                <img src="http://www.freeiconspng.com/uploads/twitter-icon--basic-round-social-iconset--s-icons-0.png" style="width: 80px; height: 80px;">
                <img src="http://icons.iconarchive.com/icons/marcus-roberto/google-play/256/Google-plus-icon.png" style="width: 80px; height: 80px;">
                <img src="http://icon-icons.com/icons2/812/PNG/512/social_skype_icon-icons.com_66149.png" style="width: 80px; height: 80px;">
                <img src="http://icon-icons.com/icons2/806/PNG/512/whatsapp_icon-icons.com_65942.png" style="width: 80px; height: 80px;">
            </div>
        </h1>
        <hr>
        <b>Nome:</b> <?= $empresa->nome; ?><br>
        <b>CNPJ:</b> <?= $empresa->documento; ?><br>
        <b>tipo:</b> <?= $empresa->tipo; ?><br>
        <b>inscricao_municipal:</b> <?= $empresa->inscricao_municipal; ?><br>
        <b>endereco:</b> <?= $empresa->endereco; ?><br>
        <b>datainscricao:</b> <?= $empresa->datainscricao; ?><br>
        <b>data_situacao:</b> <?= $empresa->data_situacao; ?><br>
        <b>nome_extra:</b> <?= $empresa->nome_extra; ?><br>
        <b>uf:</b> <?= $empresa->uf; ?><br>
        <b>telefone:</b> <?= $empresa->telefone; ?><br>
        <b>email:</b> <?= $empresa->email; ?><br>
        <b>atividade_principal</b> <?= $atividade ?><br>
        <b>situacao</b> <?= $empresa->situacao; ?><br>
        <b>bairro</b> <?= $empresa->bairro; ?><br>
        <b>logradouro</b> <?= $empresa->logradouro; ?><br>
        <b>numero</b> <?= $empresa->numero; ?><br>
        <b>cep</b> <?= $empresa->cep; ?><br>
        <b>municipio</b> <?= $empresa->municipio; ?><br>
        <b>abertura</b> <?= $empresa->abertura; ?><br>
        <b>natureza_juridica</b> <?= $empresa->natureza_juridica; ?><br>
        <b>fantasia</b> <?= $empresa->fantasia; ?><br>
        <b>cnpj</b> <?= $empresa->cnpj; ?><br>
        <b>ultima_atualizacao</b> <?= $empresa->ultima_atualizacao; ?><br>
        <b>status</b> <?= $empresa->status; ?><br>
        <b>tipo_extra</b> <?= $empresa->tipo_extra; ?><br>
        <b>complemento</b> <?= $empresa->complemento; ?><br>
        <b>efr</b> <?= $empresa->efr; ?><br>
        <b>motivo_situacao</b> <?= $empresa->motivo_situacao; ?><br>
        <b>situacao_especial</b> <?= $empresa->situacao_especial; ?><br>
        <b>data_situacao_especial</b> <?= $empresa->data_situacao_especial; ?><br>
        <b>capital_social</b> <?= $empresa->capital_social; ?><br>
      </div>

        <div class="jumbotron" style="margin-top: 20px;">
            <h3 class="display-3">Mapa</h3>
            <iframe  height="450" frameborder="0" style="border:0; width: 100%;" src="https://www.google.com/maps/embed/v1/place?q=<?= $empresa->endereco; ?>&key=AIzaSyCOkF1kzBzliRjOmiNrjKB1MmEzbsopV38" allowfullscreen></iframe>
        </div>



