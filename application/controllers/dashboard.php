<?php
class Dashboard extends CI_Controller{
     public function __construct(){
        parent::__construct();
        $this->load->model('model_transaksi');
        if ($this->session->userdata('level') != '2') {
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
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_ke_keranjang($id){
        $barang = $this->model_barang->find($id);

        $data = array(
        'id'      => $barang->id_brg,
        'qty'     => 1,
        'price'   => $barang->harga,
        'name'    => $barang->nama_brg
);

$this->cart->insert($data);
redirect('dashboard');
    }
    public function detail_keranjang(){
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('keranjang');
        $this->load->view('templates/footer');       
    }

    public function hapus_keranjang(){
        $this->cart->destroy();
        redirect('dashboard/index');
    }

    public function cekout(){
        $this->form_validation->set_rules('provinsi','Provinsi','required',array('required' => 'harus diisi'));
        if ($this->form_validation->run() == FALSE) {
            $data = array(

        );
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('cekout',$data);
        $this->load->view('templates/footer'); 
        }else {
            //simpan ke tabel transaksi
            $data = array(
                
                'no_order' => $this->input->post('no_order'), 
                'tgl_order' => date('Y-m-d'),
                'nama_penerima' => $this->input->post('nama_penerima'), 
                'no_telepon' => $this->input->post('no_telepon'), 
                'provinsi' => $this->input->post('provinsi'), 
                'kota' => $this->input->post('kota'), 
                'alamat' => $this->input->post('alamat'), 
                'kode_pos' => $this->input->post('kode_pos'), 
                'expedisi' => $this->input->post('expedisi'), 
                'paket' => $this->input->post('paket'),
                'estimasi' => $this->input->post('estimasi'), 
                'ongkir' => $this->input->post('ongkir'), 
                'grand_total' => $this->input->post('grand_total'), 
                'total_bayar' => $this->input->post('total_bayar'), 
                'status_bayar' =>'0',
                'status_order' => '0',  



            );  
            $this->model_transaksi->simpan_transaksi($data);
            //simpan ke tabel rincian transaksi
            $i=1;
            foreach ($this->cart->contents() as $item => $value) {
                $data_rinci = array(
                    'no_order' => $this->input->post('no_order'),
                    'id_brg' => $item['id'],
                    'qty' => $this->input->post('qty'.$i++),
                );
                $this->model_transaksi->simpan_rinci_transaksi($data_rinci); 
            }
                  
            $this->session->set_flashdata('pesan','Pesanan Berhasil Diproses');
            redirect('pesanan_saya');  
        }
        
    }
    public function proses_pesanan(){
        $is_processed = $this->model_invoice->index();
        if ($is_processed) {
        $this->cart->destroy();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('proses_pesanan');
        $this->load->view('templates/footer');
        }else {
            echo "Maaf, Pesanan Anda Gagal Diproses";
        }
        
    }
    public function detail($id_brg){
        $data['barang'] = $this->model_barang->detail_brg($id_brg);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_barang',$data);
        $this->load->view('templates/footer');
    }
    public function detail_guest($id_brg){
        $data['barang'] = $this->model_barang->detail_brg($id_brg);
        $this->load->view('templates_guest/header');
        $this->load->view('templates_guest/sidebar');
        $this->load->view('detail_guest',$data);
        $this->load->view('templates_guest/footer');
    }
}