<?php

class Painel_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }




    function retorna_dados_usuario($id){
        $this->db->select('*');
        $this->db->from('empresas_empresas');
        $this->db->where('id', $id);
        return $this->db->get()->result()[0];
    }



    function retorna_todos_nucleos(){
        $this->db->select('*');
        $this->db->from('cc_nucleo');
        return $this->db->get()->result();
    }

    function responde_post($id, $msg){
        $data = array(
        'repost' => $msg
        );
        $this->db->where('id', $id);
        $this->db->update('posts', $data);
        
        return $this->db->affected_rows();
    }


    function retorna_palavras_por_datas($id){
        $this->db->select('*');
        $this->db->from('empresas_log_buscas');
        $this->db->group_by('data_busca');
        $datas = $this->db->get()->result();
        foreach ($datas as $n) {
            $this->db->select('count(palavras_chave) a, palavras_chave');
            $this->db->from('empresas_log_buscas');
            $this->db->join('busca_empresa', 'empresas_log_buscas.id = busca_empresa.log', 'inner');
            $this->db->where('empresa', $id);
            $this->db->where('data_busca', $n->data_busca);
            $this->db->group_by('palavras_chave');
           /* $sql = "
            select count(palavras_chave), palavras_chave from empresas_log_buscas 
            inner join busca_empresa on empresas_log_buscas.id = busca_empresa.log
            where empresa = '$id'
            and data_busca = '$n->data_busca'
            group by palavras_chave";*/

            $n->min = $this->db->get()->result();
        }
        return $datas;
    }

    function qtde_acessos_empresa($id){
        $this->db->select('*');
        $this->db->from('empresas_log_buscas');
        $this->db->group_by('data_busca');
        $datas = $this->db->get()->result();
        foreach ($datas as $n) {
            $this->db->select('count(palavras_chave) a');
            $this->db->from('empresas_log_buscas');
            $this->db->join('busca_empresa', 'empresas_log_buscas.id = busca_empresa.log', 'inner');
            $this->db->where('empresa', $id);
            $this->db->where('data_busca', $n->data_busca);

            $n->min = $this->db->get()->result();
        }
        return $datas;
    }

    function qtde_acessos(){
        $this->db->select('*');
        $this->db->from('empresas_log_buscas');
        $this->db->group_by('data_busca');
        $datas = $this->db->get()->result();
        foreach ($datas as $n) {
            $this->db->select('count(palavras_chave) a');
            $this->db->from('empresas_log_buscas');
            $this->db->join('busca_empresa', 'empresas_log_buscas.id = busca_empresa.log', 'inner');
            $this->db->where('data_busca', $n->data_busca);

            $n->min = $this->db->get()->result();
        }
        return $datas;
    }

    function principais_palavras($id){
        $this->db->select('count(palavras_chave) a, palavras_chave');
        $this->db->from('busca_empresa');
        $this->db->join('empresas_log_buscas', 'empresas_log_buscas.id = busca_empresa.log', 'inner');
        $this->db->where('busca_empresa.empresa', $id);
        $this->db->group_by('palavras_chave');
        return $this->db->get()->result();
    }

    function principais_palavras_geral(){
        $this->db->select('count(palavras_chave) a, palavras_chave');
        $this->db->from('busca_empresa');
        $this->db->join('empresas_log_buscas', 'empresas_log_buscas.id = busca_empresa.log', 'inner');
        $this->db->group_by('palavras_chave');
        return $this->db->get()->result();
    }

    function qtde_buscas(){
        $this->db->select('count(*) c');
        $this->db->from('busca_empresa');
        return $this->db->get()->result()[0]->c;
    }
    function qtde_suas($id){
        $this->db->select('count(*) c');
        $this->db->from('busca_empresa');
        $this->db->where('busca_empresa.empresa', $id);
        return $this->db->get()->result()[0]->c;
    }

    function retorna_produtos($id){
        $this->db->select('*');
        $this->db->from('produtos');
        $this->db->where('empresa', $id);
        return $this->db->get()->result();
    }


    function retorna_produto($id){
        $this->db->select('*');
        $this->db->from('produtos');
        $this->db->where('id', $id);
        return $this->db->get()->result()[0];
    }


    function inserir($id, $nome, $descricao, $preco){

        $data = array(
        'nome' => $nome,
        'descricao' => $descricao,
        'preco' => $preco,
        'empresa' => $id
        );
        $this->db->insert('produtos', $data);

        
        return $this->db->affected_rows();
    }
    function alterar($par, $nome, $descricao, $preco){
        $data = array(
        'nome' => $nome,
        'descricao' => $descricao,
        'preco' => $preco,
        );
        $this->db->where('id', $par);
        $this->db->update('produtos', $data);
        
        return $this->db->affected_rows();
    }
    function apagar($par){
        $this->db->where('id', $par);
        $this->db->delete('produtos');
        
        return $this->db->affected_rows();
    }


   /* function retorna_todos_nucleos($id){
        $this->db->select('*');
        $this->db->from('cc_nucleo_usuario');
        $this->db->join('cc_nucleo', 'cc_nucleo_usuario.nuo_nucleo_id = cc_nucleo.nuc_id', 'inner');
        $this->db->join('cc_papel', 'cc_nucleo_usuario.nuo_papel_id = cc_papel.pap_id', 'inner');
        $this->db->where('cc_nucleo_usuario.nuo_usuario_id', $id);
        return $this->db->get()->result();
    }*/

/*
    function retorna_todos_usuarios(){
        $this->db->select('*');
        $this->db->from('cc_usuario');
        return $this->db->get()->result();
    }
    




    function foto($foto, $caminho){
        if (!empty($foto["name"])) {
            $largura = 5000;
            $larguramin = 1;
            $altura = 2500;
            $tamanho = 5000000;
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
            if($ext[1] != "gif" && $ext[1] != "bmp" && $ext[1] != "png" && $ext[1] != "jpg" && $ext[1] != "jpeg"){
                $avisos[0]['message'] = "Formato incompativel!";
                $avisos[0]['type'] = "danger";
            } else {
                $dimensoes = getimagesize($foto["tmp_name"]);
                if($dimensoes[0] > $largura) {
                    $avisos[1]['message'] = "A largura da imagem não deve ultrapassar ".$largura." pixels!";
                    $avisos[1]['type'] = "danger";
                }
                if($dimensoes[0] < $larguramin) {
                    $avisos[2]['message'] = "A largura da imagem não deve ser menor de ".$larguramin." pixels!";
                    $avisos[2]['type'] = "danger";
                }
                if($dimensoes[1] > $altura) {
                    $avisos[3]['message'] = "A altura da imagem não deve ultrapassar ".$altura." pixels!";
                    $avisos[3]['type'] = "danger";
                }
                if($foto["size"] > $tamanho) {
                    $avisos[4]['message'] = "A imagem deve ter no máximo ".$tamanho." bytes";
                    $avisos[4]['type'] = "danger";
                }
            }
            if (!isset($avisos)){
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                $caminho_imagem = $caminho . $nome_imagem;
                move_uploaded_file($foto["tmp_name"], $caminho_imagem);
            }
            if(!isset($avisos)){
                return $nome_imagem;
            }else{
                $this->session->set_userdata('avisos', $avisos);
                return null;
            }
        }else{
            $this->session->set_userdata('avisos', $avisos);
            return null;
        }
    }

    function apagar_usuario($id){
        $this->db->where('aut_usuario_id', $id);
        $this->db->delete('cc_autor_noticia');

        $this->db->where('auo_usuario_id', $id);
        $this->db->delete('cc_autor_evento');

        $this->db->where('nuo_usuario_id', $id);
        $this->db->delete('cc_nucleo_usuario');

        $this->db->where('nua_usuario', $id);
        $this->db->delete('cc_nucleo_usuario_permissao');

        $this->db->where('usu_id', $id);
        $this->db->delete('cc_usuario');
        return $this->db->affected_rows();
    }





    */


}
