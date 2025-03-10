<?php
class OrderModel extends CI_Model {
    public function selectOrder(){
        $query = $this->db->select('orders.*,shipping.*')
        ->from('orders')
        ->join('shipping','orders.ship_id =shipping.id')
        // ->where('products.status',1)
        ->get();
        return $query->result();
    }

}
   

?>