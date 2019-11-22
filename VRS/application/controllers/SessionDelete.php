<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class SessionDelete extends CI_Controller 
{
    public function index()
	{
		$this->load->database();

		$data['title'] = "VRS - Logout";

		$this->load->view('header', $data);
		$this->load->view('sessiondelete');
		$this->load->view('footer');
	}
}
?>