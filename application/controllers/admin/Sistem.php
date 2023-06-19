<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistem extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tripmen_models');
        if(!$this->session->userdata('email')){
			redirect('Login');
		}
    }

	public function index()
	{
        $data['title'] = 'Sistem - Admin';
        $data['Sistem'] = $this->Tripmen_models->get_data('sistem')->result();
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/Sistem',$data);
        $this->load->view('backend/templates/Footer');
	}

    public function tambah_data()
    {
        $this->_rules();
        
        if($this->form_validation->run() == false)
        {
            $this->index();
        }
        else 
        {
            $data = array(
                'sistem_sewa' => $this->input->post('sistem'),
            );

            $this->Tripmen_models->insert_data($data,'sistem');
            $this->session->set_flashdata('pesan','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Selamat</strong> Data berhasil ditambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
            redirect('admin/Sistem');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('sistem','Sistem','required', array(
            'required' => '%s harus diisi!'
        ));
    }

    public function update_data($id_sistem)
    {
        $this->_rules();

        if($this->form_validation->run() == false)
        {
            $this->index();
        }

        else
        {
            $where = $id_sistem ;
            $id = 'id_sistem' ;

            $data = array(
                'sistem_sewa' => $this->input->post('sistem'),
            );

            $this->Tripmen_models->update_data($data,'sistem',$id,$where);
            $this->session->set_flashdata('pesan','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Selamat</strong> Data berhasil diupdate
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
            redirect('admin/Sistem');
        }
    }

    public function delete($id_sistem)
    {
        $where = array('id_sistem' => $id_sistem);

        $this->Tripmen_models->delete_data($where, 'sistem');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Selamat</strong> Data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/Sistem');
    }
}