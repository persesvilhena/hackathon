<?php
class Perfil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('conf');
        $this->load->model('logar_model');
        $this->load->model('painel_model');
        $this->load->model('nucleo_model');
        $this->load->model('permissao_model');
        $this->load->model('noticias_model');
        $this->load->model('eventos_model');
        $this->load->model('perfil_model');
        $this->logar_model->protege();
    }



    public function index() {
        $dados['user'] = $this->painel_model->retorna_dados_usuario($this->session->userdata['id']);


        $this->load->view('header');
        $this->load->view('barra_superior', $dados);
        $this->load->view('perfil/home', $dados);
        $this->load->view('footer');
    }





    public function editar() {
        $dados['user'] = $this->painel_model->retorna_dados_usuario($this->session->userdata['id']);


        if($this->input->post('salvar') != null){
            $nome = $this->input->post('nome');
            $tipo = $this->input->post('tipo');
            $inscricao_municipal = $this->input->post('inscricao_municipal');
            $endereco = $this->input->post('endereco');
            $datainscricao = $this->input->post('datainscricao');
            $data_situacao = $this->input->post('data_situacao');
            $uf = $this->input->post('uf');
            $telefone = $this->input->post('telefone');
            $atividade_principal = $this->input->post('atividade_principal');
            $bairro = $this->input->post('bairro');
            $logradouro = $this->input->post('logradouro');
            $numero = $this->input->post('numero');
            $cep = $this->input->post('cep');
            $municipio = $this->input->post('municipio');
            $abertura = $this->input->post('abertura');
            $natureza_juridica = $this->input->post('natureza_juridica');
            $fantasia = $this->input->post('fantasia');
            $ultima_atualizacao = $this->input->post('ultima_atualizacao');
            $status = $this->input->post('status');
            $tipo_extra = $this->input->post('tipo_extra');
            $complemento = $this->input->post('complemento');
            $efr = $this->input->post('efr');
            $motivo_situacao = $this->input->post('motivo_situacao');
            $situacao_especial = $this->input->post('situacao_especial');
            $data_situacao_especial = $this->input->post('data_situacao_especial');
            $capital_social = $this->input->post('capital_social');

            $resultado = $this->perfil_model->alterar($this->session->userdata['id'], $nome, $tipo, $inscricao_municipal, $endereco, $datainscricao, $data_situacao, $uf, $telefone, $atividade_principal, $bairro, $logradouro, $numero, $cep, $municipio, $abertura, $natureza_juridica, $fantasia, $ultima_atualizacao, $status, $tipo_extra, $complemento, $efr, $motivo_situacao, $situacao_especial, $data_situacao_especial, $capital_social);
            if($resultado){
                $avisos[0]['message'] = "Perfil alterado com sucesso!";
                $avisos[0]['type'] = "success";
                //$this->log_model->alterou_perfil($dados['user']->usu_nome, $par); ////registra no log
            }else{
                $avisos[1]['message'] = "Nada foi alterado!";
                $avisos[1]['type'] = "danger";
            }
            
            $this->session->set_userdata('avisos', $avisos);
            redirect('perfil/');
        }

        $this->load->view('header');
        $this->load->view('barra_superior', $dados);
        $this->load->view('perfil/editar', $dados);
        $this->load->view('footer');
    }







    public function config() {
        $dados['user'] = $this->painel_model->retorna_dados_usuario($this->session->userdata['id']);

        if($this->input->post('alterar_senha') != null){
            $senha_atual = $this->input->post('senha_atual');
            $senha1 = $this->input->post('senha1');
            $senha2 = $this->input->post('senha2');

            if(empty($senha_atual) || empty($senha1) || empty($senha2)){
                $avisos[4]['message'] = "Por favor! Preencha os campos corretamente";
                $avisos[4]['type'] = "danger";
            }else{
                $resultado = $this->perfil_model->alterar_senha($this->session->userdata['id'], $senha_atual, $senha1, $senha2);
                if($resultado == 1){
                    $avisos[0]['message'] = "Senha alterada com sucesso!";
                    $avisos[0]['type'] = "success";
                    //$this->log_model->alterou_senha($dados['user']->usu_nome, $par); ////registra no log
                }
                if($resultado == 0){
                    $avisos[1]['message'] = "Nada foi alterado!";
                    $avisos[1]['type'] = "danger";
                }
                if($resultado == 2){
                    $avisos[2]['message'] = "Senha errada!";
                    $avisos[2]['type'] = "danger";
                }
                if($resultado == 3){
                    $avisos[3]['message'] = "As senhas não conferem!";
                    $avisos[3]['type'] = "danger";
                }
            }
            
            $this->session->set_userdata('avisos', $avisos);
            redirect('perfil/');
        }


        if($this->input->post('alterar_email') != null){
            $senha = $this->input->post('senha');
            $email = $this->input->post('email');

            if(empty($senha) || empty($email)){
                $avisos[4]['message'] = "Por favor! Preencha os campos corretamente";
                $avisos[4]['type'] = "danger";
            }else{
                $resultado = $this->perfil_model->alterar_email($this->session->userdata['id'], $senha, $email);
                if($resultado == 1){
                    $avisos[0]['message'] = "Email alterado com sucesso!";
                    $avisos[0]['type'] = "success";
                    //$this->log_model->alterou_senha($dados['user']->usu_nome, $par); ////registra no log
                }
                if($resultado == 0){
                    $avisos[1]['message'] = "Nada foi alterado!";
                    $avisos[1]['type'] = "danger";
                }
                if($resultado == 2){
                    $avisos[2]['message'] = "Senha errada!";
                    $avisos[2]['type'] = "danger";
                }
            }
            
            $this->session->set_userdata('avisos', $avisos);
            redirect('perfil/');
        }

        if($this->input->post('excluir_conta') != null){
            $senha = $this->input->post('senha');

            if(empty($senha)){
                $avisos[4]['message'] = "Por favor! Preencha os campos corretamente";
                $avisos[4]['type'] = "danger";
            }else{
                $resultado = $this->perfil_model->excluir_conta($this->session->userdata['usu_id'], $senha);
                if($resultado == 1){
                    //$this->log_model->alterou_senha($dados['user']->usu_nome, $par); ////registra no log
                    $this->session->sess_destroy();
                    redirect("home/logar/logout");
                }
                if($resultado == 0){
                    $avisos[1]['message'] = "Nada foi alterado!";
                    $avisos[1]['type'] = "danger";
                }
                if($resultado == 2){
                    $avisos[2]['message'] = "Senha errada!";
                    $avisos[2]['type'] = "danger";
                }
            }
            
            $this->session->set_userdata('avisos', $avisos);
            redirect('perfil/');
        }

        $this->load->view('header');
        $this->load->view('barra_superior', $dados);
        $this->load->view('perfil/config', $dados);
        $this->load->view('footer');
    }















}
