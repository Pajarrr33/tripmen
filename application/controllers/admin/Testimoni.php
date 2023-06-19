<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

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
        $data['title'] = 'Testimoni - Admin';
        $data['Testimoni'] = $this->Tripmen_models->get_data('testimoni')->result();
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/Testimoni',$data);
        $this->load->view('backend/templates/Footer');
	}

    public function tambah()
	{
        $data['title'] = 'Testimoni - Tambah - Admin';
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/tambah/Tambah_testimoni');
        $this->load->view('backend/templates/Footer');
	}

    public function detail($id_testimoni)
	{
        $data['title'] = 'Testimoni - Detail - Admin';
        $where = array('id_testimoni' => $id_testimoni) ;
        $data['Testimoni'] = $this->Tripmen_models->get_data_single($where,'testimoni')->result();
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/detail/Detail_testimoni',$data);
        $this->load->view('backend/templates/Footer');
	}

    public function update($id_testimoni)
	{
        $data['title'] = 'Testimoni - Update - Admin';
        $where = array('id_testimoni' => $id_testimoni) ;
        $data['Testimoni'] = $this->Tripmen_models->get_data_single($where,'testimoni')->result();
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/update/Update_testimoni',$data);
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
            $new_name = "testimoni" . "" . str_replace(' ','-',$new_filename);
            $config = [
                'upload_path' => './upload/testimoni/',
                'allowed_types' => 'jpg|png|jpeg|webp', 
                'file_name' => $new_name,
            ];
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('img'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $data['title'] = 'Testimoni - Tambah - Admin';
                        $this->load->view('backend/templates/Header',$data);
                        $this->load->view('backend/templates/Sidebar');
                        $this->load->view('backend/tambah/Tambah_testimoni',$error);
                        $this->load->view('backend/templates/Footer');
                } 
            else
            {
                $img = $this->upload->data('file_name');
                $data = array(
                    'nama' => $this->input->post('nama'),
                    'asal' => $this->input->post('asal'),
                    'profil_img' => $img,
                    'text' => $this->input->post('text'),
                );
                $this->Tripmen_models->insert_data($data,'testimoni');
                $this->session->set_flashdata('pesan','
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Selamat</strong> Data berhasil ditambahkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
                );
                redirect('admin/Testimoni');
            }
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama','Nama','required', array(
            'required' => '%s harus diisi!'
        ));
        $this->form_validation->set_rules('asal','Asal','required', array(
            'required' => '%s harus diisi!'
        ));
        $this->form_validation->set_rules('text','Text','required', array(
            'required' => '%s harus diisi!'
        ));
    }

    public function update_data($id_testimoni)
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
                $update_filename = "testimoni"."".str_replace(' ','-',$_FILES['img']['name']);
                $config = [
                    'upload_path' => './upload/testimoni/',
                    'allowed_types' => 'jpg|png|jpeg|webp', 
                    'file_name' => $update_filename,
                ];
                $this->load->library('upload',$config);

                if($this->upload->do_upload('img'))
                {
                    if(file_exists("./upload/testimoni/" . $old_filename))
                    {
                        unlink("./upload/testimoni/" . $old_filename);
                    }
                }
            }
            else 
            {
                $update_filename = $old_filename ;
            }
            $where = $id_testimoni ;
            $id = 'id_testimoni' ;
            $img = $update_filename ;
            $data = array(
                'nama' => $this->input->post('nama'),
                'asal' => $this->input->post('asal'),
                'profil_img' => $img,
                'text' => $this->input->post('text'),
            );

            $this->Tripmen_models->update_data($data,'testimoni',$id,$where);
            $this->session->set_flashdata('pesan','
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Selamat</strong> Data berhasil diubah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
                );
            redirect('admin/Testimoni');
        }
    }

    public function delete($id_testimoni)
    {
        $Testimoni = new Tripmen_models ;
        $where = array('id_testimoni' => $id_testimoni);
        if($Testimoni->Checkimg($where,'testimoni'))
        {
            $data = $Testimoni->Checkimg($where,'testimoni');

            if(file_exists("./upload/testimoni/" . $data->profil_img))
            {
                unlink("./upload/testimoni/" . $data->profil_img);
            }
            $Testimoni->deleteimg($where,'testimoni');
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Selamat</strong> Data berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/Testimoni');
        }
    }
}