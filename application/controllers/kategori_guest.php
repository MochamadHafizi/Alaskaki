<?php 
class Kategori_guest extends CI_Controller{
    public function sepatu_olahraga(){
        $data['olahraga'] = $this->model_kategori->data_sepatu_olahraga()->result();
        $this->load->view('templates_guest/header');
        $this->load->view('templates_guest/sidebar');
        $this->load->view('kategori_guest/olahraga',$data);
        $this->load->view('templates_guest/footer');
    }
    public function sepatu_vulcanized(){
        $data['vulcanized'] = $this->model_kategori->data_sepatu_vulcanized()->result();
        $this->load->view('templates_guest/header');
        $this->load->view('templates_guest/sidebar');
        $this->load->view('kategori_guest/vulcanized',$data);
        $this->load->view('templates_guest/footer');
    }
    public function sepatu_slipon(){
        $data['slipon'] = $this->model_kategori->data_sepatu_slipon()->result();
        $this->load->view('templates_guest/header');
        $this->load->view('templates_guest/sidebar');
        $this->load->view('kategori_guest/slipon',$data);
        $this->load->view('templates_guest/footer');
    }
    
}