<?php

class Usuario_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function cadastrar() {
        

        $data['nome'] = $this->input->post('nome');
        $data['cpf'] = $this->input->post('cpf');
        $data['email'] = $this->input->post('email');
        $data['senha'] = md5($this->input->post('senha'));
        $data['status'] = $this->input->post('status');
        $data['nivel'] = $this->input->post('nivel');
        $data['cargo_idCargo'] = $this->input->post('cargos');
        
        return $this->db->insert('usuario',$data);
        
    }

    
      public function excluir($id = null) {
       

        $this->db->where('idUsuario', $id);
      return $this->db->delete('usuario');
    }
    
    public function salvar_atualizacao() {
        

        $id = $this->input->post('idUsuario');

        $data['nome'] = $this->input->post('nome');
        $data['cpf'] = $this->input->post('cpf');
        $data['email'] = $this->input->post('email');
        $data['status'] = $this->input->post('status');
        $data['nivel'] = $this->input->post('nivel');
        $data['cargo_idCargo'] = $this->input->post('cargos');

        $this->db->where('idUsuario', $id);
        return $this->db->update('usuario', $data); 
    }
    public function salvar_senha() {
        

        $id = $this->input->post('idUsuario');
        $senha_antiga = md5($this->input->post('senha_antiga'));
        $senha_nova = md5($this->input->post('senha_nova'));

        $this->db->select('senha');
        $this->db->where('idUsuario', $id);
        $data['senha'] = $this->db->get('usuario')->result();
        $dados['senha'] = $senha_nova;

        if ($data['senha'][0]->senha==$senha_antiga) {
            $this->db->where('idUsuario', $id);
            $this->db->update('usuario', $dados);
            return true;
        } else {

            return false;
        }
    }
    
    function get_usuarios(){
        
          $this->db->select('*');
        $this->db->join('cargos','cargo_idCargo=idCargo','inner');
        return $this->db->get('usuario')->result();
        
    }
}
