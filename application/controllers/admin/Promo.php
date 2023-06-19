<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends CI_Controller {

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
        $data['title'] = 'Promo - Admin';
        $data['Promo'] = $this->Tripmen_models->get_data('promo')->result();
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/Promo',$data);
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
                'promo' => $this->input->post('promo'),
            );

            $this->Tripmen_models->insert_data($data,'promo');
            $this->session->set_flashdata('pesan','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Selamat</strong> Data berhasil ditambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
            redirect('admin/Promo');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('promo','promo','required', array(
            'required' => '%s harus diisi!'
        ));
    }

    public function update_data($id_promo)
    {
        $this->_rules();

        if($this->form_validation->run() == false)
        {
            $this->index();
        }

        else
        {
            $where = $id_promo ;
            $id = 'id_promo' ;

            $data = array(
                'promo' => $this->input->post('promo'),
            );

            $this->Tripmen_models->update_data($data,'promo',$id,$where);
            $this->session->set_flashdata('pesan','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Selamat</strong> Data berhasil diupdate
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
            redirect('admin/Promo');
        }
    }

    public function delete($id_promo)
    {
        $where = array('id_promo' => $id_promo);

        $this->Tripmen_models->delete_data($where, 'promo');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Selamat</strong> Data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/Promo');
    }
}