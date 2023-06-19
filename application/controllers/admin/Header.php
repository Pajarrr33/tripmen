<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header extends CI_Controller {

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
        $data['title'] = 'Header - Admin';
        $data['Header'] = $this->Tripmen_models->get_data('header')->result();
        $this->load->view('backend/templates/Header',$data);
        $this->load->view('backend/templates/Sidebar');
		$this->load->view('backend/Header',$data);
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
            $new_filename = $_FILES['logo']['name'];
            $new_name = "logo" . "" . str_replace(' ','-',$new_filename);
            $config = [
                'upload_path' => './upload/section_1/',
                'allowed_types' => 'jpg|png|jpeg|webp', 
                'file_name' => $new_name,
            ];
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('logo'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $data['title'] = 'Header - Admin';
                        $data['Header'] = $this->Tripmen_models->get_data('header')->result();
                        $this->load->view('backend/templates/Header',$data);
                        $this->load->view('backend/templates/Sidebar');
                        $this->load->view('backend/Header',$data,$error);
                        $this->load->view('backend/templates/Footer');
                } 
            else
            {
                $img = $this->upload->data('file_name');
                $data = array(
                    'logo' => $img,
                    'name' => $this->input->post('name'),
                    'text' => $this->input->post('text'),
                    'wa_link' => $this->input->post('wa')
                );
                $this->Tripmen_models->insert_data($data,'header');
                $this->session->set_flashdata('pesan','
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Selamat</strong> Data berhasil ditambahkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
                );
                redirect('admin/Header');
            }
        }
    }

    public function _rules()
    {
       
        $this->form_validation->set_rules('name','Brand Name','required', array(
            'required' => '%s harus diisi!'
        ));
        $this->form_validation->set_rules('text','Text','required', array(
            'required' => '%s harus diisi!'
        ));
        $this->form_validation->set_rules('wa','Author Profil Text','required', array(
            'required' => '%s harus diisi!'
        ));
    }

    public function update_data($id_header)
    {
        $this->_rules();

        if($this->form_validation->run() == false )
        {
            $this->index();
        }
        else
        {
            $old_filename = $this->input->post('old_img');
            $new_filename = $_FILES['logo']['name'] ;

            if($new_filename == true)
            {
                $update_filename = "logo"."".str_replace(' ','-',$_FILES['logo']['name']);
                $config = [
                    'upload_path' => './upload/section_1/',
                    'allowed_types' => 'jpg|png|jpeg|webp', 
                    'file_name' => $update_filename,
                ];
                $this->load->library('upload',$config);

                if($this->upload->do_upload('logo'))
                {
                    if(file_exists("./upload/section_1/" . $old_filename))
                    {
                        unlink("./upload/section_1/" . $old_filename);
                    }
                }
            }
            else 
            {
                $update_filename = $old_filename ;
            }
            $where = $id_header ;
            $id = 'id_header' ;
            $img = $update_filename ;
            $data = array(
                'logo' => $img,
                'name' => $this->input->post('name'),
                'text' => $this->input->post('text'),
                'wa_link' => $this->input->post('wa')
            );

            $this->Tripmen_models->update_data($data,'header',$id,$where);
            $this->session->set_flashdata('pesan','
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Selamat</strong> Data berhasil diubah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
                );
            redirect('admin/Header');
        }
    }

    public function delete($id_header)
    {
        $Header = new Tripmen_models ;
        $where = array('id_header' => $id_header);
        if($Header->Checkimg($where,'header'))
        {
            $data = $Header->Checkimg($where,'header');

            if(file_exists("./upload/section_1/" . $data->logo))
            {
                unlink("./upload/section_1/" . $data->logo);
            }
            $Header->deleteimg($where,'header');
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Selamat</strong> Data berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/Header');
        }
    }
}