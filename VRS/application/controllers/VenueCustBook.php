<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class VenueCustBook extends CI_Controller 
{
    public function index()
	{
		$this->load->database();

		$data['title'] = "VRS - View/Cancel Bookings";

		$this->load->view('header', $data);
		$this->load->view('venue_cust_booked');
		$this->load->view('footer');
	}
}
?>