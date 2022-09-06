<?php 
class Brand extends CI_Controller{
    public function compass(){
        $data['compass'] = $this->model_brand->data_brand_compass()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('brand/compass',$data);
        $this->load->view('templates/footer');
    }
}