<?php  
class Model_kategori extends CI_Model{
    public function data_sepatu_olahraga(){
       return $this->db->get_where('tb_barang',array('kategori' => 'Sepatu Olahraga'));
    }
    public function data_sepatu_vulcanized(){
       return $this->db->get_where('tb_barang',array('kategori' => 'Sepatu Vulcanized'));
    }
    public function data_sepatu_slipon(){
       return $this->db->get_where('tb_barang',array('kategori' => 'Sepatu Slip On'));
    }
}