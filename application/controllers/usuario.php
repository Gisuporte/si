<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class usuario extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function verificar_sessao() {

        if ($this->session->userdata('logado') == false) {

            redirect('dashboard/login');
        }
    }

    public function index($indice = null) {
        $this->verificar_sessao();
        $this->load->model('usuario_model','usuario');
        $dados['usuarios'] = $this->usuario->get_usuarios();

        $this->load->view('header');
        $this->load->view('menu');

        if ($indice == 1) {
            $data['msg'] = "Usuário cadastrado com sucesso.";
            $this->load->view('includes/msg_sucesso', $data);
        } else if ($indice == 2) {
            $data['msg'] = "Não foi possivel cadastrar o Usúario.";
            $this->load->view('includes/msg_erro', $data);
        }if ($indice == 3) {
            $data['msg'] = "Usuario excluido com sucesso.";
            $this->load->view('includes/msg_sucesso', $data);
        } else if ($indice == 4) {
            $data['msg'] = "Não foi possivel excluir o Usúario.";
            $this->load->view('includes/msg_erro', $data);
        }if ($indice == 5) {
            $data['msg'] = "Usuario atualizado com sucesso.";
            $this->load->view('includes/msg_sucesso', $data);
        } else if ($indice == 6) {
            $data['msg'] = "Não foi possivel atualizar o Usúario.";
            $this->load->view('includes/msg_erro', $data);
        }

        $this->load->view('listar_usuario', $dados);
        $this->load->view('footer');
    }

    public function cadastro() {
        $this->verificar_sessao();
        $dados['cargo'] = $this->db->get('cargos')->result();
        $dados['centro_custos'] = $this->db->get('centro_custo')->result();
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('cadastro_usuario', $dados);
        $this->load->view('footer');
    }

    public function cadastrar(){
        $this->verificar_sessao();
        $this->load->model('Usuario_model','usuario');
            
            if ($this->usuario->cadastrar()) {

            redirect('usuario/1');
        } else {

            redirect('usuario/2');
        }
    }
        
    

    public function excluir($id = null) {
        $this->verificar_sessao();
        $this->load->model('Usuario_model','usuario');
        
        if ($this->usuario->excluir()) {

            redirect('usuario/3');
        } else {

            redirect('usuario/4');
        }
    }

    public function atualizar($id = null, $indice = null) {
        $this->verificar_sessao();
        $data['cargo'] = $this->db->get('cargos')->result();
        $data['centro_custos'] = $this->db->get('centro_custo')->result();
        
        $this->db->where('idUsuario', $id);
        $data['usuario'] = $this->db->get('usuario')->result();
        $this->load->view('header');
        $this->load->view('menu');
        if ($indice == 1) {
            $data['msg'] = "Senha atualizada com sucesso.";
            $this->load->view('includes/msg_sucesso', $data);
        } else if ($indice == 2) {
            $data['msg'] = "Não foi possivel atualizar a senha.";
            $this->load->view('includes/msg_erro', $data);
        }
        $this->load->view('editar_usuario', $data);
        $this->load->view('footer');
    }

    public function salvar() {
        $this->verificar_sessao();

         $this->load->model('Usuario_model','usuario');
        if ($this->usuario->salvar()) {

            redirect('usuario/5');
        } else {

            redirect('usuario/6');
        }
    }

    public function salvar_senha() {
        $this->verificar_sessao();

        $this->load->model('usuario_model','usuario');

        if ($this->usuario->salvar_senha()) {
           redirect('usuario/atualizar/' . $id . '/1');
        } else {

            redirect('usuario/atualizar/' . $id . '/2');
        }
    }

    public function pesquisar() {
        $this->verificar_sessao();
        $this->load->model('usuario_model','usuario');
        $dados['usuarios'] = $this->usuario->get_usuarios_like();

        $this->load->view('header');
        $this->load->view('menu');

      
        $this->load->view('listar_usuario', $dados);
        $this->load->view('footer');
    }
    
    public function pag($value=null){
        
        if($value==null){
            $value = 1;
        }
        $reg_p_pag = 4;
        if($value <= $reg_p_pag){
            
            $data['btnA'] = 'disabled';
        }else {
            $data['btnA'] = '';
        }
       
         $this->load->model('usuario_model','usuario');
        $u = $this->usuario->get_qtd_usuarios();
        
        if (($u[0]->total - $value)< $reg_p_pag){
            $data['btnP'] = 'disabled';
        }else {
            $data['btnP'] = '';
        }
        
        $this->load->model('usuario_model','usuario');
        $data['usuarios'] = $this->usuario->get_usuarios_pag($value, $reg_p_pag);
        
        $data['value'] = $value;
        $data['$reg_p_pag'] = $reg_p_pag;
        $data['$qtd_reg'] = $u[0]->total;
        
        $v_inteiro = (int)$u[0]->total/$reg_p_pag;
        $v_resto = $u[0]->total%$reg_p_pag;
        
        if($v_resto>0){
            $v_inteiro += 1;
        }
        
        $data['qtd_botoes'] = $v_inteiro;

        $this->load->view('header');
        $this->load->view('menu');

        $this->load->view('listar_usuario', $data);
        $this->load->view('footer');
    
    }
    
    
}
