<?php 
class Pesanan_Masuk extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('model_pesanan_masuk');
    }
    public function index(){
        $data = array(
            'pesanan' => $this->model_pesanan_masuk->pesanan(),
            'pesanan_diproses'=>$this->model_pesanan_masuk->pesanan_diproses(),
            'pesanan_dikirim'=>$this->model_pesanan_masuk->pesanan_dikirim(),
            'pesanan_selesai'=>$this->model_pesanan_masuk->pesanan_selesai(),
        );

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/pesanan_masuk',$data);
        $this->load->view('templates_admin/footer');
    }
    
}