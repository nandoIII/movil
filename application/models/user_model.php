<?php


/**
 * Description of user_model
 *
 * @author Hernando Peña <your.name at your.org>
 */
class User_model extends CI_Model{
    
    public function get($user_id = null)
    {

        if($user_id === null){
            $q = $this->db->get('usuario');
        }elseif(is_array($user_id)){
            $q = $this->db->get_where('usuario',$user_id);
        }
        else{
            $q = $this->db->get_where('userio',array('idusuario'=>$user_id));
        }
//        $this->output->enable_profiler();
        return $q->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('usuario',$data);
        return $this->db->insert_id();
    }
    
    public function update($data, $user_id)
    {
        $wclause = array(
            'user_id' => $user_id
        );       
        $this->db->where($wclause);
        $this->db->update('user',$data);
        return $this->db->affected_rows();
    }
    
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