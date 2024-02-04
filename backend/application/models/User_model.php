<?php
class User_model extends CI_Model{
    public function login($user){
        $this->db->select('*');
        $this->db->from('Users');
        $this->db->where('username',$user['username']);
        $this->db->where('password',$user['password']);
        if($query = $this->db->get()){
            return $query->row_array();
        } else {
            return false;
        }
    }
}
?>