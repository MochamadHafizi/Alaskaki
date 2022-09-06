<?php  
class Model_user extends CI_Model{
    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->order_by('id');
        return $this->db->get()->result();
    }
    public function add($data){
        $this->db->insert('tb_user',$data);
    }
    public function edit($data){
        $this->db->where('id',$data['id']);
        $this->db->update('tb_user',$data);
    }
    public function delete($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function data_setting(){
        $this->db->select('*');
        $this->db->from('tb_setting');
        $this->db->where('id',1);
        return $this->db->get()->row();
    }
}