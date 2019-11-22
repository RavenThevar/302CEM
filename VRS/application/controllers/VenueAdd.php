<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class VenueAdd extends CI_Controller 
{
    public function index()
	{
		$this->load->database();

		$data['title'] = "VRS - ADD VENUE";

		$this->load->view('header', $data);
		$this->load->view('venue_add');
		$this->load->view('footer');
	}
}
?>