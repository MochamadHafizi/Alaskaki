<?php  
class Pesanan_saya extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('model_transaksi');
        $this->load->model('model_pesanan_masuk');
    }
    public function index(){
        $data = array(
            'belum_bayar' => $this->model_transaksi->belum_bayar(),
            'diproses'=>$this->model_transaksi->diproses(),
            'dikirim'=>$this->model_transaksi->dikirim(),
            'selesai'=>$this->model_transaksi->selesai(),
        );
        $this->cart->destroy(); 
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pesanan_saya',$data);
        $this->load->view('templates/footer');
    }
    public function bayar($id_transaksi){
        $this->form_validation->set_rules('atas_nama','Atas Nama','required',array(
            'required' => 'harus diisi!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/bukti_bayar/';
            $config['allowed_types'] = 'jpeg|jpg|png|gif|';
            $this->load->library('upload', $config);
            $field_name='bukti_bayar';
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'pesanan' => $this->model_transaksi->detail_pesanan($id_transaksi),   
                    'rekening'=> $this->model_transaksi->rekening(), 
                );
                $this->cart->destroy(); 
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar');
                $this->load->view('bayar',$data);
                $this->load->view('templates/footer');
            }else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library']='gd2';
                $config['source_image'] = './assets/bukti_bayar/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib',$config);
                $data = array(
                    'id_transaksi' =>$id_transaksi,
                    'atas_nama' => $this->input->post('atas_nama'),
                    'nama_bank' => $this->input->post('nama_bank'),
                    'no_rek' => $this->input->post('no_rek'),
                    'status_bayar' => '1',
                    'bukti_bayar' => $upload_data['uploads']['file_name'],
                );
                $this->model_transaksi->upload_buktibayar($data);
                $this->session->set_flashdata('pesan','Bukti Pembayaran Berhasil Diupload');
                redirect('pesanan_saya');
            }
        }
        $data = array(
        'pesanan' => $this->model_transaksi->detail_pesanan($id_transaksi),   
        'rekening'=> $this->model_transaksi->rekening(),         
        );
        $this->cart->destroy(); 
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('bayar',$data);
        $this->load->view('templates/footer');
    }
    public function diterima($id_transaksi){
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' =>'3',
        );
        $this->model_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan','Pesanan Sudah Diterima');
        redirect('pesanan_saya');
    }
}