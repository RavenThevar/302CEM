<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller 
{
    public function index()
	{
        $data['title'] = "VRS - HOME";
        
        $this->load->database();
        $this->load->view('header', $data);
		$this->load->view('home');
		$this->load->view('footer');
	}
}
?>