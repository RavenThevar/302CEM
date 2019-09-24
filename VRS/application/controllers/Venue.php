<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Venue extends CI_Controller 
{
    public function index()
	{
		$data['title'] = "VRS - VENUE";

		$this->load->view('header', $data);
		$this->load->view('footer');
	}
}
?>