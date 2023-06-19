<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masalah extends CI_Controller {

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
        $data['title'] = 'Masalah - Admin';
        $data['Masalah'] = $this->Tripmen_models->get_data('masalah')->result();
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/Masalah',$data);
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
                'icon' => $this->input->post('icon'),
                'text' => $this->input->post('deskripsi'),
            );

            $this->Tripmen_models->insert_data($data,'masalah');
            $this->session->set_flashdata('pesan','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Selamat</strong> Data berhasil ditambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
            redirect('admin/Masalah');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('icon','Icon','required', array(
            'required' => '%s harus diisi!'
        ));
        $this->form_validation->set_rules('deskripsi','Deskripsi','required', array(
            'required' => '%s harus diisi!'
        ));
    }

    public function update_data($id_section)
    {
        $this->_rules();

        if($this->form_validation->run() == false)
        {
            $this->index();
        }

        else
        {
            $where = $id_section ;
            $id = 'id_section' ;

            $data = array(
                'icon' => $this->input->post('icon'),
                'text' => $this->input->post('deskripsi'),
            );

            $this->Tripmen_models->update_data($data,'masalah',$id,$where);
            $this->session->set_flashdata('pesan','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Selamat</strong> Data berhasil diupdate
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
            redirect('admin/Masalah');
        }
    }

    public function delete($id_section)
    {
        $where = array('id_section' => $id_section);

        $this->Tripmen_models->delete_data($where, 'masalah');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Selamat</strong> Data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/Masalah');
    }
}