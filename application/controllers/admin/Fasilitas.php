<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas extends CI_Controller {

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
        $data['title'] = 'Fasilitas - Admin';
        $data['Fasilitas'] = $this->Tripmen_models->get_data('fasilitas')->result();
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/Fasilitas',$data);
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
                'fasilitas' => $this->input->post('fasilitas'),
            );

            $this->Tripmen_models->insert_data($data,'fasilitas');
            $this->session->set_flashdata('pesan','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Selamat</strong> Data berhasil ditambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
            redirect('admin/Fasilitas');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('fasilitas','Fasilitas','required', array(
            'required' => '%s harus diisi!'
        ));
    }

    public function update_data($id_fasilitas)
    {
        $this->_rules();

        if($this->form_validation->run() == false)
        {
            $this->index();
        }

        else
        {
            $where = $id_fasilitas ;
            $id = 'id_fasilitas' ;

            $data = array(
                'fasilitas' => $this->input->post('fasilitas'),
            );

            $this->Tripmen_models->update_data($data,'fasilitas',$id,$where);
            $this->session->set_flashdata('pesan','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Selamat</strong> Data berhasil diupdate
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
            redirect('admin/Fasilitas');
        }
    }

    public function delete($id_fasilitas)
    {
        $where = array('id_fasilitas' => $id_fasilitas);

        $this->Tripmen_models->delete_data($where, 'fasilitas');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Selamat</strong> Data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/Fasilitas');
    }
}