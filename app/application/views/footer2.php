
    <!-- jQuery -->
    <script src="<?= base_url(); ?>assets/admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url(); ?>assets/admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?= base_url(); ?>assets/admin/vendor/raphael/raphael.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/vendor/morrisjs/morris.min.js"></script>
    <script type="text/javascript">
        $(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '<?= $acesso_dia[0]->data_busca; ?>',
            acessos: <?= $acesso_dia[0]->min[0]->a; ?>,
        }, {
            period: '<?= $acesso_dia[1]->data_busca; ?>',
            acessos: <?= $acesso_dia[1]->min[0]->a; ?>,
        }, {
            period: '<?= $acesso_dia[2]->data_busca; ?>',
            acessos: <?= $acesso_dia[2]->min[0]->a; ?>,
        }, {
            period: '<?= $acesso_dia[3]->data_busca; ?>',
            acessos: <?= $acesso_dia[3]->min[0]->a; ?>,
        }, {
            period: '<?= $acesso_dia[4]->data_busca; ?>',
            acessos: <?= $acesso_dia[4]->min[0]->a; ?>,
        }
        ],
        xkey: 'period',
        ykeys: ['acessos'],
        labels: ['acessos'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "<?= $palavras_chave[0]->palavras_chave; ?>",
            value: <?= $palavras_chave[0]->a; ?>
        }, {
            label: "<?= $palavras_chave[1]->palavras_chave; ?>",
            value: <?= $palavras_chave[1]->a; ?>
        }, {
            label: "<?= $palavras_chave[2]->palavras_chave; ?>",
            value: <?= $palavras_chave[2]->a; ?>
        }],
        resize: true
    });




    
});

    </script>
    <!--<script src="<?= base_url(); ?>assets/admin/data/morris-data.js"></script>-->

    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url(); ?>assets/admin/dist/js/sb-admin-2.js"></script>
    <script type="text/javascript">
    $(document).on("input", "#not_titulo", function() {
        var limite = 60;
        var informativo = "caracteres restantes.";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0) {
            var not_titulo = $("textarea[name=not_titulo]").val();
            $("textarea[name=not_titulo]").val(not_titulo.substr(0, limite));
            $(".caracteres").text("0 " + informativo);
        } else {
            $(".caracteres").text(caracteresRestantes + " " + informativo);
        }
    });
    </script>

</body>

</html>
