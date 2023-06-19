<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penawaran extends CI_Controller {

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
        $data['title'] = 'Penawaran - Admin';
        $data['Penawaran'] = $this->Tripmen_models->get_data('penawaran')->result();
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/Penawaran',$data);
        $this->load->view('backend/templates/Footer');
	}

    public function tambah()
	{
        $data['title'] = 'Penawaran - Tambah - Admin';
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/tambah/Tambah_penawaran');
        $this->load->view('backend/templates/Footer');
	}

    public function detail($id_penawaran)
	{
        $data['title'] = 'Penawaran - Detail - Admin';
        $where = array('id_penawaran' => $id_penawaran) ;
        $data['Penawaran'] = $this->Tripmen_models->get_data_single($where,'penawaran')->result();
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/detail/Detail_penawaran',$data);
        $this->load->view('backend/templates/Footer');
	}

    public function update($id_penawaran)
	{
        $data['title'] = 'Penawaran - Update - Admin';
        $where = array('id_penawaran' => $id_penawaran) ;
        $data['Penawaran'] = $this->Tripmen_models->get_data_single($where,'penawaran')->result();
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/update/Update_penawaran',$data);
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
                'main_text' => $this->input->post('main_text'),
                'sub_text' => $this->input->post('sub_text'),
                'promo_text' => $this->input->post('promo_text'),
                'wa_link' => $this->input->post('wa_link'),
            );

            $this->Tripmen_models->insert_data($data,'penawaran');
            $this->session->set_flashdata('pesan','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Selamat</strong> Data berhasil ditambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
            redirect('admin/Penawaran');
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
        $this->form_validation->set_rules('promo_text','Promo Text','required', array(
            'required' => '%s harus diisi!'
        ));
        $this->form_validation->set_rules('wa_link','Nomor Whatsapp','required', array(
            'required' => '%s harus diisi!'
        ));
    }

    public function update_data($id_penawaran)
    {
        $this->_rules();

        if($this->form_validation->run() == false)
        {
            $this->index();
        }

        else
        {
            $where = $id_penawaran ;
            $id = 'id_penawaran' ;

            $data = array(
                'icon' => $this->input->post('icon'),
                'main_text' => $this->input->post('main_text'),
                'sub_text' => $this->input->post('sub_text'),
                'promo_text' => $this->input->post('promo_text'),
                'wa_link' => $this->input->post('wa_link'),
            );

            $this->Tripmen_models->update_data($data,'penawaran',$id,$where);
            $this->session->set_flashdata('pesan','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Selamat</strong> Data berhasil diupdate
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
            redirect('admin/Penawaran');
        }
    }

    public function delete($id_penawaran)
    {
        $where = array('id_penawaran' => $id_penawaran);

        $this->Tripmen_models->delete_data($where, 'penawaran');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Selamat</strong> Data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/Penawaran');
    }
}