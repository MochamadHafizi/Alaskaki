<?php
class User extends CI_Controller{
    public function index(){
        $data = array(
            'user' => $this->model_user->get_all_data(),
        );
       $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/user',$data);
        $this->load->view('templates_admin/footer'); 
    }
    public function __construct(){
        parent::__construct();
        $this->load->model('model_user');
    }
    public function add(){
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level'),
        );
        $this->model_user->add($data);
        $this->session->set_flashdata('pesan','Data Berhasil Ditambahkan');
        redirect('admin/user');
    }
    public function edit($id = null){
        $data = array(
            'id' => $id,
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level'),
        );
        $this->model_user->edit($data);
        $this->session->set_flashdata('pesan','Data Berhasil Ditambahkan');
        redirect('admin/user');
    }
    public function delete($id){
        $where = array('id' => $id);
        $this->model_user->delete($where, 'tb_user');
        redirect('admin/user');
    }
}