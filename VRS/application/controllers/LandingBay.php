<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingBay extends CI_Controller 
{
    public function index()
	{
		$this->load->database();

		$data['title'] = "VRS - LOGIN/REGISTER";

		$this->load->view('header', $data);
		$this->load->view('landingbay');
		$this->load->view('footer');
	}
}
?>