<?php
class IndexModel extends CI_Model {
    public function getCategoryHome(){
        $query = $this->db->get_where('categories',['status'=>1]);
        return $query->result();
      
    }
    public function getBrandHome(){
        $query = $this->db->get_where('brands',['status'=>1]);
        return $query->result();
    }
    public function getAllProduct(){
        $query = $this->db->get_where('products',['status'=>1]);
        return $query->result();
    }

    public function countAllProduct(){
        return $this->db->count_all('products');
    }
    public function countAllProductByCate($id){
        $this->db->where('category_id',$id);
        $this->db->from('products');
        return $this->db->count_all_results();
    }

    public function countAllProductByBra($id){
        $this->db->where('brand_id',$id);
        $this->db->from('products');
        return $this->db->count_all_results();
    }

    public function countAllProductByKeyword($keyword){
        $this->db->like('products.title',$keyword);
        $this->db->from('products');
        return $this->db->count_all_results();
    }
    

    public function getIndexPagination($limit, $start){
        $this->db->limit($limit, $start);
        $query = $this->db->get_where('products',['status'=>1]);
        return $query->result();

    }

    public function getCategoryProduct($id){
        $query = $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
        ->from('categories')
        ->join('products','products.category_id =categories.id')
        ->join('brands','products.brand_id =brands.id')
        ->where('products.category_id',$id)
        ->get();
        return $query->result();
    }

    public function getCatePagination($id,$limit, $start){
        $this->db->limit($limit, $start);
        $query = $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
        ->from('categories')
        ->join('products','products.category_id =categories.id')
        ->join('brands','products.brand_id =brands.id')
        ->where('products.category_id',$id)
        ->get();
        return $query->result();
    }
    public function getBrandProduct($id){
        $query = $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
        ->from('categories')
        ->join('products','products.category_id =categories.id')
        ->join('brands','products.brand_id =brands.id')
        ->where('products.brand_id',$id)
        ->get();
        return $query->result();
    }

    public function getBraPagination($id,$limit, $start){
        $this->db->limit($limit, $start);
        $query = $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
        ->from('categories')
        ->join('products','products.category_id =categories.id')
        ->join('brands','products.brand_id =brands.id')
        ->where('products.brand_id',$id)
        ->get();
        return $query->result();
    }

    public function getProductDetails($id){
        $query = $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
        ->from('categories')
        ->join('products','products.category_id =categories.id')
        ->join('brands','products.brand_id =brands.id')
        ->where('products.id',$id)
        ->get();
        return $query->result();
    }

    public function getCategoryTitle($id){
        $this->db->select('categories.*');
        $this->db->from('categories');
        $this->db->limit(1);
        $this->db->where('categories.id',$id);
        $query = $this->db->get();
        $result = $query->row();
        return $title = $result->title;
    }

    public function getCategorySlug($id){
        $this->db->select('categories.*');
        $this->db->from('categories');
        $this->db->limit(1);
        $this->db->where('categories.id',$id);
        $query = $this->db->get();
        $result = $query->row();
        return $title = $result->slug;
    }


    public function getBrandTitle($id){
        $this->db->select('brands.*');
        $this->db->from('brands');
        $this->db->limit(1);
        $this->db->where('brands.id',$id);
        $query = $this->db->get();
        $result = $query->row();
        return $title = $result->title;
    }

    public function getBrandSlug($id){
        $this->db->select('brands.*');
        $this->db->from('brands');
        $this->db->limit(1);
        $this->db->where('brands.id',$id);
        $query = $this->db->get();
        $result = $query->row();
        return $title = $result->slug;
    }
    public function getProductTitle($id){
        $this->db->select('products.*');
        $this->db->from('products');
        $this->db->limit(1);
        $this->db->where('products.id',$id);
        $query = $this->db->get();
        $result = $query->row();
        return $title = $result->title;
    }

    public function getProductByKeyword($keyword){
        $query = $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
        ->from('categories')
        ->join('products','products.category_id =categories.id')
        ->join('brands','products.brand_id =brands.id')
        ->like('products.title',$keyword)
        ->get();
        return $query->result();
    }

    public function getSearchPagination($keyword,$limit, $start){
        $this->db->limit($limit, $start);
        $query = $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
        ->from('categories')
        ->join('products','products.category_id =categories.id')
        ->join('brands','products.brand_id =brands.id')
        ->like('products.title',$keyword)
        ->get();
        return $query->result();
    }

    public function getCateKytuPagination($id,$kytu,$limit, $start){
        $this->db->limit($limit, $start);
        $query = $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
        ->from('categories')
        ->join('products','products.category_id =categories.id')
        ->join('brands','products.brand_id =brands.id')
        ->where('products.category_id',$id)
        ->order_by('products.title',$kytu)
        ->get();
        return $query->result();
    }

    public function getMinProductPrice($id){
        $this->db->select('products.*');
        $this->db->from('products');
        $this->db->select_min('price');
        $this->db->where('products.category_id',$id);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row();
        return $price = $result->price;
    }

    public function getMaxProductPrice($id){
        $this->db->select('products.*');
        $this->db->from('products');
        $this->db->select_max('price');
        $this->db->where('products.category_id',$id);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row();
        return $price = $result->price;
    }

    public function getCatePriceRangePagination($id,$from_price,$to_price,$limit,$start){
        $this->db->limit($limit, $start);
        $query = $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
        ->from('categories')
        ->join('products','products.category_id =categories.id')
        ->join('brands','products.brand_id =brands.id')
        ->where('products.category_id',$id) 
        ->where('products.price >=',$from_price)
        ->where('products.price <=',$to_price)
        ->order_by('products.price', 'asc')
        ->get();
        return $query->result();
    }

    public function getCatePricePagination($id,$gia,$limit, $start){
        $this->db->limit($limit, $start);
        $query = $this->db->select('categories.title as tendanhmuc,products.*, brands.title as tenthuonghieu')
        ->from('categories')
        ->join('products','products.category_id =categories.id')
        ->join('brands','products.brand_id =brands.id')
        ->where('products.category_id',$id) 
        ->order_by('products.price',$gia)
        ->get();
        return $query->result();
    }

    public function getCustomersToken($email){
        $query = $this->db->get_where('customers',['email' => $email]);
        return $query->result();
    }

    public function activeCustomersToken($email,$data_customer){
        return $this->db->update('customers',$data_customer,['email'=>$email]);
    }
    
}
   

?>