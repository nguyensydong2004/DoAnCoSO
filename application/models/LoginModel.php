<?php
class LoginModel extends CI_Model {
    public function checkLogin($email, $password){
        $query = $this->db->where('email', $email)->where('password', $password)->get('user');
        return $query->result();
      
    }
}
   

?>