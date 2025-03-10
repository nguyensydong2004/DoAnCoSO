<?php
class LoginModel extends CI_Model {
    public function checkLogin($email, $password){
        $query = $this->db->where('email', $email)->where('password', $password)->get('user');
        return $query->result();
      
    }

    public function checkLoginCustomer($email, $password){
        $query = $this->db->where('email', $email)->where('password', $password)->get('customers');
        return $query->result();
      
    }

    public function NewCustomer($data){
        return $this->db->insert('customers',$data  );
    }

    public function NewShipping($data){
        return $this->db->insert('shipping',$data  );
    }
}
   

?>