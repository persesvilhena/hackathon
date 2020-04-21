<?php

class Perfil_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }




    function retorna_dados_usuario($id){
        $this->db->select('*');
        $this->db->from('cc_usuario');
        $this->db->join('cc_cidade', 'usu_cidade = cid_id', 'inner');
        $this->db->where('cc_usuario.usu_id', $id);
        return $this->db->get()->result()[0];
    }

    function retorna_todas_cidades(){
        $this->db->select('*');
        $this->db->from('cc_cidade');
        return $this->db->get()->result();
    }

    function apaga_foto_perfil($id){
        $this->db->select('*');
        $this->db->from('cc_usuario');
        $this->db->where('cc_usuario.usu_id', $id);
        $foto = $this->db->get()->result()[0]->usu_foto;
        if(unlink($this->conf->caminho_upload_perfil_relativo() . $foto ."")){
            return true;
        }else{
            return false;
        }
    }

    function alterar($id, $nome, $tipo, $inscricao_municipal, $endereco, $datainscricao, $data_situacao, $uf, $telefone, $atividade_principal, $bairro, $logradouro, $numero, $cep, $municipio, $abertura, $natureza_juridica, $fantasia, $ultima_atualizacao, $status, $tipo_extra, $complemento, $efr, $motivo_situacao, $situacao_especial, $data_situacao_especial, $capital_social){

        $data = array(
        'nome' => $nome,
        'tipo' => $tipo,
        'inscricao_municipal' => $inscricao_municipal,
        'endereco' => $endereco,
        'datainscricao' => $datainscricao,
        'data_situacao' => $data_situacao,
        'uf' => $uf,
        'telefone' => $telefone,
        'atividade_principal' => $atividade_principal,
        'bairro' => $bairro,
        'logradouro' => $logradouro,
        'numero' => $numero,
        'cep' => $cep,
        'municipio' => $municipio,
        'abertura' => $abertura,
        'natureza_juridica' => $natureza_juridica,
        'fantasia' => $fantasia,
        'ultima_atualizacao' => $ultima_atualizacao,
        'status' => $status,
        'tipo_extra' => $tipo_extra,
        'complemento' => $complemento,
        'efr' => $efr,
        'motivo_situacao' => $motivo_situacao,
        'situacao_especial' => $situacao_especial,
        'data_situacao_especial' => $data_situacao_especial,
        'capital_social' => $capital_social
        );

        $this->db->where('id', $id);
        $this->db->update('empresas_empresas', $data);
        return $this->db->affected_rows();

    }

    function alterar_senha($id, $senha_atual, $senha1, $senha2){
        $this->db->select('*');
        $this->db->from('empresas_empresas');
        $this->db->where('id', $id);
        $this->db->where('senha', $senha_atual);
        $result = $this->db->get()->result();
        if($result){
            if($senha1 == $senha2){
                $data = array(
                'senha' => $senha1
                );

                $this->db->where('id', $id);
                $this->db->update('empresas_empresas', $data);
                return $this->db->affected_rows();
            }else{
                return 3;
            }
        }else{
            return 2;
        }
    }


    function alterar_email($id, $senha, $email){
        $this->db->select('*');
        $this->db->from('empresas_empresas');
        $this->db->where('id', $id);
        $this->db->where('senha', $senha);
        $result = $this->db->get()->result();
        if($result){
            $data = array(
            'email' => $email
            );

            $this->db->where('id', $id);
            $this->db->update('empresas_empresas', $data);
            return $this->db->affected_rows();
        }else{
            return 2;
        }
    }


    function excluir_conta($id, $senha){
        $this->db->select('*');
        $this->db->from('cc_usuario');
        $this->db->where('cc_usuario.usu_id', $id);
        $this->db->where('cc_usuario.usu_senha', $senha);
        $result = $this->db->get()->result();
        if($result){
            $data = array(
            'usu_aprovacao' => 2
            );

            $this->db->where('usu_id', $id);
            $this->db->update('cc_usuario', $data);
            return $this->db->affected_rows();
        }else{
            return 2;
        }
    }








    


}
