<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solusi extends CI_Controller {

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
        $data['title'] = 'Solusi - Admin';
        $data['Solusi'] = $this->Tripmen_models->get_data('solusi')->result();
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/Solusi',$data);
        $this->load->view('backend/templates/Footer');
	}

    public function tambah()
	{
        $data['title'] = 'Solusi - Tambah - Admin';
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/tambah/Tambah_solusi');
        $this->load->view('backend/templates/Footer');
	}


    public function update($id_solusi)
	{
        $data['title'] = 'Solusi - Update - Admin';
        $where = array('id_solusi' => $id_solusi) ;
        $data['Solusi'] = $this->Tripmen_models->get_data_single($where,'solusi')->result();
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/update/Update_solusi',$data);
        $this->load->view('backend/templates/Footer');
	}

    public function tambah_data()
    {
        $this->_rules();
        if($this->form_validation->run() == false)
        {
            $this->tambah();
        }
        else 
        {
            $data = array(
                'icon' => $this->input->post('icon'),
                'main_text' => $this->input->post('main_text'),
                'sub_text' => $this->input->post('sub_text'),
                
            );

            $this->Tripmen_models->insert_data($data,'solusi');
            $this->session->set_flashdata('pesan','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Selamat</strong> Data berhasil ditambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
            redirect('admin/Solusi');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('icon','Icon','required', array(
            'required' => '%s harus diisi!'
        ));
        $this->form_validation->set_rules('main_text','Main Text','required', array(
            'required' => '%s harus diisi!'
        ));
        $this->form_validation->set_rules('sub_text','Sub Text','required', array(
            'required' => '%s harus diisi!'
        ));
    }

    public function update_data($id_solusi)
    {
        $this->_rules();

        if($this->form_validation->run() == false)
        {
            $this->update($id_solusi);
        }

        else
        {
            $where = $id_solusi ;
            $id = 'id_solusi' ;

            $data = array(
                'icon' => $this->input->post('icon'),
                'main_text' => $this->input->post('main_text'),
                'sub_text' => $this->input->post('sub_text'),
                
            );

            $this->Tripmen_models->update_data($data,'solusi',$id,$where);
            $this->session->set_flashdata('pesan','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Selamat</strong> Data berhasil diupdate
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
            redirect('admin/Solusi');
        }
    }

    public function delete($id_solusi)
    {
        $where = array('id_solusi' => $id_solusi);

        $this->Tripmen_models->delete_data($where, 'solusi');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Selamat</strong> Data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/Solusi');
    }
}