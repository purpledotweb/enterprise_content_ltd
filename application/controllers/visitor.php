<?php
class Visitor extends CI_Controller{
	function __construct()
	{
		parent::__construct();
	}

	function home()
	{
		$this->load->view('html_head');
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('sidebar');
		$this->load->view('main_home');
		$this->load->view('footer');
		$this->load->view('html_foot');
	}

	function services()
	{
		$this->load->view('html_head');
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('slider');
		$this->load->view('sidebar');
		$this->load->view('main_home');
		$this->load->view('footer');
		$this->load->view('html_foot');
	}
}

?>