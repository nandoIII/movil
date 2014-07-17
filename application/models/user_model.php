<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_model
 *
 * @author Hernando Peña <your.name at your.org>
 */
class User_model extends CI_Model{
    
    public function read($user_id = null)
    {
        /**
         * @uses $q = $this->db->get('user'); Muestra todos los usuarios
         * @uses element Description
         */
        if($user_id === null){
            $q = $this->db->get('usuario');
        }else{
            $q = $this->db->get_where('user',array('user_id'=>$user_id));
        }
//        $this->output->enable_profiler();
        return $q->result_array();
    }
    /**
     * @param array $data Description
     * @uses $result = $this->user_model->insert(['login' => 'Jethro']) Description
     */
    public function create($data)
    {
        $this->db->insert('user',$data);
        return $this->db->insert_id();
    }
    
    /**
     * @uses $result = $this->user_model->update($data, 3);
     * @param type $data
     * @param type $user_id
     * @return type
     */
    public function update($data, $user_id)
    {
        $wclause = array(
            'user_id' => $user_id
        );       
        $this->db->where($wclause);
        $this->db->update('user',$data);
        return $this->db->affected_rows();
    }
    
    /**
     * @uses $this->user_model->delete(2);
     * @return type
     */
    public function delete($user_id)
    {
        $dclause = array(
            'user_id' => $user_id
        );  
        $this->db->delete('user',$dclause);
        return $this->db->affected_rows();
    }    
}

?>
