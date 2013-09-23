<?php
class Visitor extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Data_model');
	}

	function page($page = 'home', $subpage = '')
	{
		$data = $this->Data_model->get_page_data($page, $subpage);

		$this->load->view('html_head');
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('sidebar');
		$this->load->view('main', $data);
		$this->load->view('footer');
		$this->load->view('html_foot');
	}
}

?>