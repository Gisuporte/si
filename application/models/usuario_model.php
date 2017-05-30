<?php

class Usuario_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function cadastrar() {
        

        $data['nome'] = $this->input->post('nome');
        $data['treina_r'] = $this->input->post('treina_r');
        $data['cdi_E'] = $this->input->post('cdi_E');
        $data['cdi_A'] = $this->input->post('cdi_A');
        $data['obs'] = $this->input->post('obs');
        $data['status'] = $this->input->post('status');
        $data['email'] = $this->input->post('email');
        $data['nivel'] = $this->input->post('nivel');
        $data['senha'] = md5($this->input->post('senha'));
        $data['cargo_idCargo'] = $this->input->post('cargos');
        $data['ccu_idCcu'] = $this->input->post('ccu_idCcu');
        
        return $this->db->insert('usuario',$data);
        
    }

    
      public function excluir($id = null) {
       

        $this->db->where('idUsuario', $id);
      return $this->db->delete('usuario');
    }
    
    public function salvar() {
        

        $id = $this->input->post('idUsuario');

        $data['nome'] = $this->input->post('nome');
        $data['treina_r'] = $this->input->post('treina_r');
        $data['cdi_E'] = $this->input->post('cdi_E');
        $data['cdi_A'] = $this->input->post('cdi_A');
        $data['obs'] = $this->input->post('obs');
        $data['status'] = $this->input->post('status');
        $data['email'] = $this->input->post('email');
        $data['nivel'] = $this->input->post('nivel');
        $data['senha'] = md5($this->input->post('senha'));
        $data['cargo_idCargo'] = $this->input->post('cargos');
        $data['ccu_idCcu'] = $this->input->post('ccu_idCcu');

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
        $this->db->join('centro_custo','ccu_idCcu=idCcu','inner');
        return $this->db->get('usuario')->result();
        
    }
    
    function get_usuarios_like(){
        
        $termo = $this->input->post('pesquisar');
          $this->db->select('*');
          $this->db->like('nome',$termo);                  
        $this->db->join('cargos','cargo_idCargo=idCargo','inner');
        return $this->db->get('usuario')->result();
        
    }
    
    function get_qtd_usuarios(){
    
     $this->db->select('count(*) as total');
       return $this->db->get('usuario')->result();
    }
    
    function get_usuarios_pag($value,$reg_p_pag){
        
          $this->db->select('*');
          $this->db->limit($reg_p_pag,$value);
        $this->db->join('cargos','cargo_idCargo=idCargo','inner');
        return $this->db->get('usuario')->result();
        
    }
}
