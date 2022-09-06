<?php  
class Guest extends CI_Controller{
    public function index(){
         $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates_guest/header');
        $this->load->view('templates_guest/sidebar');
        $this->load->view('guest',$data);
        $this->load->view('templates_guest/footer');
    }
}