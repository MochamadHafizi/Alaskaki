<?php 
class Kategori extends CI_Controller{
    public function sepatu_olahraga(){
        $data['olahraga'] = $this->model_kategori->data_sepatu_olahraga()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kategori/olahraga',$data);
        $this->load->view('templates/footer');
    }
    public function sepatu_vulcanized(){
        $data['vulcanized'] = $this->model_kategori->data_sepatu_vulcanized()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kategori/vulcanized',$data);
        $this->load->view('templates/footer');
    }
    public function sepatu_slipon(){
        $data['slipon'] = $this->model_kategori->data_sepatu_slipon()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kategori/slipon',$data);
        $this->load->view('templates/footer');
    }
    
}