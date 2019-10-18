<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class VenueCust extends CI_Controller 
{
    public function index()
	{
		$this->load->database();

		$data['title'] = "VRS - VENUE - Customer";

		$this->load->view('header', $data);
		$this->load->view('venue_cust');
		$this->load->view('footer');
	}
}
?>