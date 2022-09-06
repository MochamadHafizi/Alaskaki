<?php
class Dashboard_admin extends CI_Controller{
    public function __construct(){
        
        parent::__construct();
        $this->load->model('model_pesanan_masuk');
        if ($this->session->userdata('level') != '1') {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Anda Belum Login!
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>');
        redirect('auth/login');
        }
    }
    public function index(){
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('templates_admin/footer');
    }
    public function proses($id_transaksi){
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' =>'1',
        );
        $this->model_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan','Pesanan Berhasil Di Proses/Dikemas');
        redirect('admin/pesanan_masuk');
    } 
    public function kirim($id_transaksi){
        $data = array(
            'id_transaksi' => $id_transaksi,
            'no_resi'=>$this->input->post('no_resi'),
            'status_order' =>'2',
        );
        $this->model_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan','Pesanan Berhasil Di Proses/Dikemas');
        redirect('admin/pesanan_masuk');
    }    
    
}
?>