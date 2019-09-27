<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Venue extends CI_Controller 
{
    public function index()
	{
		$this->load->database();

		$data['title'] = "VRS - VENUE";

		$this->load->view('header', $data);
		$this->load->view('venue');
		$this->load->view('footer');
	}
}
?>