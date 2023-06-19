<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Judul_page extends CI_Controller {

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
        $data['title'] = 'Judul Section - Admin';
        $data['Judul'] = $this->Tripmen_models->get_data('judul_section')->result();
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/Judul_page',$data);
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
                'judul' => $this->input->post('judul'),
            );

            $this->Tripmen_models->insert_data($data,'judul_section');
            $this->session->set_flashdata('pesan','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Selamat</strong> Data berhasil ditambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
            redirect('admin/Judul_page');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('judul','Judul','required', array(
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
                'judul' => $this->input->post('judul'),
            );

            $this->Tripmen_models->update_data($data,'judul_section',$id,$where);
            $this->session->set_flashdata('pesan','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Selamat</strong> Data berhasil diupdate
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
            redirect('admin/Judul_page');
        }
    }

    public function delete($id_section)
    {
        $where = array('id_section' => $id_section);

        $this->Tripmen_models->delete_data($where, 'judul_section');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Selamat</strong> Data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/Judul_page');
    }
}