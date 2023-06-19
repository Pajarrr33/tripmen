<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Tripmen_models');
    }


	public function index()
	{
		// Memuat seluruh data yang ada di dalam database 
		$data['Header'] = $this->Tripmen_models->get_single_row('header');
		$data['Judul'] = $this->Tripmen_models->get_data('judul_section')->result();
		$data['Masalah'] = $this->Tripmen_models->get_data('masalah')->result();
		$data['Solusi'] = $this->Tripmen_models->get_single_row('solusi');
		$data['Promo'] = $this->Tripmen_models->get_data('promo')->result();
		$data['Sewa'] = $this->Tripmen_models->get_data('sewa')->result();
		$data['Benefit'] = $this->Tripmen_models->get_data('benefit')->result();
		$data['Testimoni'] = $this->Tripmen_models->get_data('testimoni')->result();
		$data['Fasilitas'] = $this->Tripmen_models->get_data('fasilitas')->result();
		$data['Sistem'] = $this->Tripmen_models->get_data('sistem')->result();
		$data['Penawaran'] = $this->Tripmen_models->get_single_row('penawaran');
		//-----------------------------------------------

        $this->load->view('templates/header');
		$this->load->view('frontend/section_1',$data);
        $this->load->view('templates/footer');
	}
}