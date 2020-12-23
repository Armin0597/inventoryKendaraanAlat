<?php
class Modeluser extends CI_Model{
    function chekLogin($username, $password){
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $user = $this->db->get('user')->row_array();
        return $user;
    }
}