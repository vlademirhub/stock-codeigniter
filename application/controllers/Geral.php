<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Geral extends CI_Controller {

	public function index()
	{
        $this->template();
	}

	public function setup()
    {
        $this->template();
    }

    private function template()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/nav');

        $this->load->view('setup/setup');

        $this->load->view('layout/footer');
        $this->load->view('layout/bottom');
    }
}

/* End of file Geral.php */
/* Location: ./application/controllers/Geral.php */