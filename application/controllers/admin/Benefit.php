<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Benefit extends CI_Controller {

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
        $data['title'] = 'Benefit - Admin';
        $data['Benefit'] = $this->Tripmen_models->get_data('benefit')->result();
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/Benefit',$data);
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
                'judul_benefit' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
            );

            $this->Tripmen_models->insert_data($data,'benefit');
            $this->session->set_flashdata('pesan','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Selamat</strong> Data berhasil ditambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
            redirect('admin/benefit');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('judul','Judul','required', array(
            'required' => '%s harus diisi!'
        ));
        $this->form_validation->set_rules('deskripsi','Deskripsi','required', array(
            'required' => '%s harus diisi!'
        ));
    }

    public function update_data($id_benefit)
    {
        $this->_rules();

        if($this->form_validation->run() == false)
        {
            $this->index();
        }

        else
        {
            $where = $id_benefit ;
            $id = 'id_benefit' ;

            $data = array(
                'judul_benefit' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
            );

            $this->Tripmen_models->update_data($data,'benefit',$id,$where);
            $this->session->set_flashdata('pesan','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Selamat</strong> Data berhasil diupdate
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
            redirect('admin/benefit');
        }
    }

    public function delete($id_benefit)
    {
        $where = array('id_benefit' => $id_benefit);

        $this->Tripmen_models->delete_data($where, 'benefit');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Selamat</strong> Data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/benefit');
    }
}