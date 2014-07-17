<?php


/**
 * Description of user
 *
 * @author Hernando Peña <hernando.pena at elheraldo.co>
 */
class User extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function read()
    {
       $data = $this->user_model->read();
       print_r($data);
    }
    public function create()
    {
        $data = array(
            'login' => 'Camilo'
        );
        $result = $this->user_model->create($data);
        print_r($result);
        
    }
    public function update()
    {
        $data = array(
            'login' => 'Peggy'
        );
        $result = $this->user_model->update($data, 3);
        print_r($result);
    }
    public function delete()
    {
        $result = $this->user_model->delete(2);
        print_r($result);
    }
    
    public function login(){
        $data = array(
            'user_id' => 1
        );
        $this->session->set_userdata($data);
        $session = $this->session->all_userdata();
        print_r($session);
    }

}

?>
