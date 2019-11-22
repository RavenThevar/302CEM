<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends CI_Controller 
{
    public function index()
	{
		$this->load->database();

		$data['title'] = "VRS - Notifications";

		$this->load->view('header', $data);
		$this->load->view('notifications');
		$this->load->view('footer');
	}
}
?>