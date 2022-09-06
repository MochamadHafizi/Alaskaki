<?php  
class Model_brand extends CI_Model{
    public function data_brand_compass(){
       return $this->db->get_where('tb_barang',array('kategori' => 'Compass'));
    }
}