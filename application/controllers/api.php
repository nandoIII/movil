<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of api
 *
 * @author Hernando Penha <hernando.pena at elheraldo.co>
 */
class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * 
     * @return boolean
     */
    private function _required_login() {
        if ($this->session->userdata('user_id') == FALSE) {
            $this->output->set_output(json_encode(array('result' => '0', 'error' => 'Acceso Restringido')));
            return false;
        }
    }

    /**
     * 
     * @return boolean
     */
    public function login() {

        $usuario['login'] = $this->input->post('login');
        $usuario['password'] = hash('sha256', $this->input->post('password') . SALT);
        $this->load->model('user_model');
        $result = $this->user_model->get($usuario);

        $this->output->set_content_type('application_json');
//        $user['user_id']=1;
        if ($result) {
            $this->session->set_userdata(array('user_id' => $result[0]['idusuario']));
            $this->output->set_output(json_encode(array('result' => '1')));
            return false;
        }
        $this->output->set_output(json_encode(array('result' => '0')));
    }

    /**
     * 
     * @return boolean
     */
    public function register() {

        $this->output->set_content_type('application_json');

        $this->form_validation->set_rules('login', 'Login', 'required||min_lenght[4]|max_lenght[16]|is_unique[usuario.login]');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[usuario.email]');
        $this->form_validation->set_rules('cedula', 'Cedula', 'required');
        $this->form_validation->set_rules('celular', 'Celular', 'required|numeric');
        $this->form_validation->set_rules('genero', 'Genero', 'required|numeric');
        $this->form_validation->set_rules('pais', 'Pais', 'required|numeric');
        $this->form_validation->set_rules('departamento', 'Departamento', 'required|numeric');
        $this->form_validation->set_rules('ciudad', 'Ciudad', 'required|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|min_lenght[4]|max_lenght[16]|matches[confirmar_password]');


        $this->form_validation->set_message('required', 'Campo requerido');
        $this->form_validation->set_message('valid_email', 'Ingrese e-mail valido');
        $this->form_validation->set_message('numeric', 'Solo se permiten numeros');
        $this->form_validation->set_message('min_lenght', 'Minimo 4 Caracteres');
        $this->form_validation->set_message('max_lenght', 'Maximo 16 Caracteres');
        $this->form_validation->set_message('is_unique', 'Campo ya ingresado en registro. Ingrese uno diferente');
        $this->form_validation->set_message('matches', 'Campos de contraseña no concuerdan');


        $usuario['login'] = $this->input->post('login');
        $usuario['nombre'] = $this->input->post('nombre');
        $usuario['email'] = $this->input->post('email');
        $usuario['cedula'] = $this->input->post('cedula');
        $usuario['celular'] = $this->input->post('celular');
        $usuario['genero'] = $this->input->post('genero');
        $usuario['pais_idpais'] = $this->input->post('pais');
        $usuario['departamento_iddepartamento'] = $this->input->post('departamento');
        $usuario['ciudad_idciudad'] = $this->input->post('ciudad');
        $usuario['password'] = hash('sha256', $this->input->post('password') . SALT);

        if ($this->form_validation->run() == FALSE) {
            $this->output->set_output(json_encode(array('result' => '0', 'error' => $this->form_validation->error_array())));
            return false;
        }

        $this->load->model('user_model');
        $user_id = $this->user_model->insert($usuario);

        if ($user_id) {
            $this->session->set_userdata(array('user_id' => $user_id));
            $this->output->set_output(json_encode(array('result' => '1')));
            return false;
        }
        
        $this->output->set_output(json_encode(array('result' => '0', 'error' => 'Usuario no creado')));
        die('not yet ready');
    }

    /**
     *  
     * @return boolean
     */
    public function create_categoria() {
        $this->_required_login();
        $this->form_validation->set_rules('categoria', 'Categoria', 'required|max_length[255]');
        if ($this->form_validation->run() == false) {
            $this->output->set_output(json_encode(array(
                'result' => 0,
                'error' => $this->form_validation->error_array()
            )));
            return false;
        }
        $categoria['nombre'] = $this->input->post('categoria');
        $result = $this->db->insert('categoria', $categoria);
        if ($result) {
            // obtener el ultimo registro ingresado
            $query = $this->db->get_where('categoria', array('idcategoria' => $this->db->insert_id()));

            $this->output->set_output(json_encode(array(
                'result' => 1,
                'data' => $query->result()
            )));
            return false;
        }
        $this->output->set_output(json_encode(array(
            'result' => 0,
            'error' => 'No se pudo ingresar el registro'
        )));
    }

    /**
     * 
     */
    public function get_categoria($id = null) {
        $this->_required_login();

        if ($id != null) {
            $this->db->where(array(
                'idcategoria' => $id
            ));
        }
        $query = $this->db->get('categoria');
        $result = $query->result();

        $this->output->set_output(json_encode($result));
    }

    public function update_categoria() {
        $this->_required_login();
        $idcategoria = $this->input->post('idcategoria');
        $completed = $this->input->post('completed');

        $this->db->where(array('idcategoria' => $idcategoria));
        $this->db->update('categoria',array(
            'completed' => $completed,
        ));

        $result = $this->db->affected_rows();
        if($result){
            $this->output->set_output(json_encode(array('result' => 1)));
            return false;
        }else{
            $this->output->set_output(json_encode(array('result' => 0)));
            return false;            
        }
        
    }

    public function delete_categoria() {
        $this->_required_login();

        $result = $this->db->delete('categoria', array('idcategoria' => $this->input->post('categoria_id')));
//        echo $this->db->last_query();        

        if ($result) {
            $this->output->set_output(json_encode(array('result' => 1)));
            return false;
        } else {
            $this->output->set_output(json_encode(array('result' => 0,
                'message' => 'No pudo eliminar elemento.')));
        }
    }

    public function create_reporte() {
        $this->_required_login();
    }

    public function update_reporte() {
        $this->_required_login();
        $reporte_id = $this->input->post('$reporte_id');
    }

    public function delete_reporte() {
        $this->_required_login();

        $result = $this->db->delete('reporte', array('idreporte' => $this->input->post('reporte_id'),
            'usuario_idusuario' => $this->session->userdata('user_id')));
//        echo $this->db->last_query();        

        if ($result) {
            $this->output->set_output(json_encode(array('result' => 1)));
            return false;
        } else {
            $this->output->set_output(json_encode(array('result' => 0,
                'message' => 'No pudo eliminar elemento.')));
        }
    }

}
