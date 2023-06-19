<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa extends CI_Controller {

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
        $data['title'] = 'Sewa - Admin';
        $data['Sewa'] = $this->Tripmen_models->get_data('sewa')->result();
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/Sewa',$data);
        $this->load->view('backend/templates/Footer');
	}

    public function tambah()
	{
        $data['title'] = 'Sewa - Tambah - Admin';
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/tambah/Tambah_sewa');
        $this->load->view('backend/templates/Footer');
	}

    public function detail($id_sewa)
	{
        $data['title'] = 'Sewa - Detail - Admin';
        $where = array('id_sewa' => $id_sewa) ;
        $data['Sewa'] = $this->Tripmen_models->get_data_single($where,'sewa')->result();
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/detail/Detail_sewa',$data);
        $this->load->view('backend/templates/Footer');
	}

    public function update($id_sewa)
	{
        $data['title'] = 'Sewa - Update - Admin';
        $where = array('id_sewa' => $id_sewa) ;
        $data['Sewa'] = $this->Tripmen_models->get_data_single($where,'sewa')->result();
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/update/Update_sewa',$data);
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
            $new_filename = $_FILES['img']['name'];
            $new_name = "sewa" . "" . str_replace(' ','-',$new_filename);
            $config = [
                'upload_path' => './upload/sewa/',
                'allowed_types' => 'jpg|png|jpeg|webp', 
                'file_name' => $new_name,
            ];
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('img'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $data['title'] = 'Sewa - Tambah - Admin';
                        $this->load->view('backend/templates/Header',$data);
                        $this->load->view('backend/templates/Sidebar');
                        $this->load->view('backend/tambah/Tambah_sewa',$error);
                        $this->load->view('backend/templates/Footer');
                } 
            else
            {
                $img = $this->upload->data('file_name');
                $data = array(
                    'jenis_penyewaan' => $this->input->post('kendaraaan'),
                    'img' => $img,
                    'brand' => $this->input->post('brand'),
                    'spesifik' => $this->input->post('spesifik'),
                    'harga_sewa' => $this->input->post('sewa'),
                    'wa_link' => $this->input->post('wa_link')
                );
                $this->Tripmen_models->insert_data($data,'sewa');
                $this->session->set_flashdata('pesan','
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Selamat</strong> Data berhasil ditambahkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
                );
                redirect('admin/Sewa');
            }
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kendaraaan','Jenis Kendaraan','required', array(
            'required' => '%s harus diisi!'
        ));
        $this->form_validation->set_rules('brand','Brand Name','required', array(
            'required' => '%s harus diisi!'
        ));
        $this->form_validation->set_rules('spesifik','Spesifik','required', array(
            'required' => '%s harus diisi!'
        ));
        $this->form_validation->set_rules('sewa','Sewa','required', array(
            'required' => '%s harus diisi!'
        ));
        $this->form_validation->set_rules('wa_link','Whatsapp Number','required', array(
            'required' => '%s harus diisi!'
        ));
    }

    public function update_data($id_sewa)
    {
        $this->_rules();

        if($this->form_validation->run() == false )
        {
            $this->index();
        }
        else
        {
            $old_filename = $this->input->post('old_img');
            $new_filename = $_FILES['img']['name'] ;

            if($new_filename == true)
            {
                $update_filename = "sewa"."".str_replace(' ','-',$_FILES['img']['name']);
                $config = [
                    'upload_path' => './upload/sewa/',
                    'allowed_types' => 'jpg|png|jpeg|webp', 
                    'file_name' => $update_filename,
                ];
                $this->load->library('upload',$config);

                if($this->upload->do_upload('img'))
                {
                    if(file_exists("./upload/sewa/" . $old_filename))
                    {
                        unlink("./upload/sewa/" . $old_filename);
                    }
                }
            }
            else 
            {
                $update_filename = $old_filename ;
            }
            $where = $id_sewa ;
            $id = 'id_sewa' ;
            $img = $update_filename ;
            $data = array(
                'jenis_penyewaan' => $this->input->post('kendaraaan'),
                'img' => $img,
                'brand' => $this->input->post('brand'),
                'spesifik' => $this->input->post('spesifik'),
                'harga_sewa' => $this->input->post('sewa'),
                'wa_link' => $this->input->post('wa_link')
            );

            $this->Tripmen_models->update_data($data,'sewa',$id,$where);
            $this->session->set_flashdata('pesan','
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Selamat</strong> Data berhasil diubah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
                );
            redirect('admin/Sewa');
        }
    }

    public function delete($id_sewa)
    {
        $Sewa = new Tripmen_models ;
        $where = array('id_sewa' => $id_sewa);
        if($Sewa->Checkimg($where,'sewa'))
        {
            $data = $Sewa->Checkimg($where,'sewa');

            if(file_exists("./upload/sewa/" . $data->img))
            {
                unlink("./upload/sewa/" . $data->img);
            }
            $Sewa->deleteimg($where,'sewa');
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Selamat</strong> Data berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/Sewa');
        }
    }
}