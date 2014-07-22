<?php

/**
 * Description of user
 *
 * @author Hernando Peña <hernando.pena at elheraldo.co>
 */
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function read() {
        $data = $this->user_model->read();
        print_r($data);
    }

    public function create() {
        $data = array(
            'login' => 'Camilo'
        );
        $result = $this->user_model->create($data);
        print_r($result);
    }

    public function update() {
        $data = array(
            'login' => 'Peggy'
        );
        $result = $this->user_model->update($data, 3);
        print_r($result);
    }

    public function delete() {
        $result = $this->user_model->delete(2);
        print_r($result);
    }

    public function login() {
        $usuario['login'] = $this->input->post('login');
        $usuario['password'] = hash('sha256', $this->input->post('password') . SALT);
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

    public function register() {
        
        $this->output->set_content_type('application_json');
                
        $this->form_validation->set_rules('login','Login','required||min_lenght[4]|max_lenght[16]|is_unique[usuario.login]');
        $this->form_validation->set_rules('nombre','Nombre','required');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[usuario.email]');        
        $this->form_validation->set_rules('cedula','Cedula','required');
        $this->form_validation->set_rules('celular','Celular','required|numeric');
        $this->form_validation->set_rules('genero','Genero','required|numeric');
        $this->form_validation->set_rules('pais','Pais','required|numeric');
        $this->form_validation->set_rules('departamento','Departamento','required|numeric');
        $this->form_validation->set_rules('ciudad','Ciudad','required|numeric');
        $this->form_validation->set_rules('password','Password','required|min_lenght[4]|max_lenght[16]|matches[confirmar_password]');        
                
        
        $this->form_validation->set_message('required','Campo requerido');
        $this->form_validation->set_message('valid_email','Ingrese e-mail valido');
        $this->form_validation->set_message('numeric','Solo se permiten numeros');
        $this->form_validation->set_message('min_lenght','Minimo 4 Caracteres');
        $this->form_validation->set_message('max_lenght','Maximo 16 Caracteres');
        $this->form_validation->set_message('is_unique','Campo ya ingresado en registro. Ingrese uno diferente');
        $this->form_validation->set_message('matches','Campos de contraseña no concuerdan');
                               
        
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
    
        if($this->form_validation->run()==FALSE){            
            $this->output->set_output(json_encode(array('result' => '0', 'error' => $this->form_validation->error_array())));
            return false;
        }
        
        $user_id = $this->user_model->insert($usuario);

        if ($user_id) {
            $this->session->set_userdata(array('user_id' => $user_id));
            $this->output->set_output(json_encode(array('result' => '1')));
            return false;
        }
        $this->output->set_output(json_encode(array('result' => '0','error'=>'Usuario no creado')));        
        die('not yet ready');       
    }

}

?>
