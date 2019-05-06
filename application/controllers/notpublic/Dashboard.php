<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}


	public function index()
	{	




		if ($this->session->userdata("login")){
			$this->load->view('layouts/header');
			$this->load->view('notpublic/abstract');
			$this->load->view('layouts/footer');

		}
		else{
			redirect(base_url()."home");
		}
	}
}
