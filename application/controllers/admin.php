<?php
session_start();
class Admin extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Data_model');

	}

	function overview()
	{
		if($this->Data_model->check_session($_SESSION['username']) == false)
        {
            header('Location: http://localhost/enterprisecontent/index.php/admin/login');
        }
        else
        {
            $data['notification'] = "<h1>Welcome to the admin panel!</h1><h3>Select which page you would like to update in the menu below.</h3>";
            $this->load->view('html_head');
            $this->load->view('admin_header', $data);
            $this->load->view('admin_menu');
            $this->load->view('admin_sidebar');
            $this->load->view('footer');
            $this->load->view('html_foot');
		}
	}

	function view($page)
	{
		if($this->Data_model->check_session($_SESSION['username']) == false)
        {
            header('Location: http://localhost/enterprisecontent/index.php/admin/login');
        }
        else
        {
            $data['notification'] = "<h1>" . ucfirst(str_replace('_', ' ', $page)) . "</h1><h3>&nbsp</h3>";
            $data['pagedata'] = $this->Data_model->get_page_data($page);
            $this->load->view('html_head');
            $this->load->view('admin_header', $data);
            $this->load->view('admin_menu');
            $this->load->view('admin_sidebar');
            $this->load->view('admin_view', $data);
            $this->load->view('footer');
            $this->load->view('html_foot');
        }
	}

	function edit($page)
	{
		if($this->Data_model->check_session($_SESSION['username']) == false)
        {
            header('Location: http://localhost/enterprisecontent/index.php/admin/login');
        }
        else
        {
            $data['notification'] = "<h1>" . ucfirst(str_replace('_', ' ', $page)) . "</h1><h3>&nbsp</h3>";
            $data['pagedata'] = $this->Data_model->get_page_data($page);
            $this->load->view('html_head');
            $this->load->view('admin_header', $data);
            $this->load->view('admin_menu');
            $this->load->view('admin_sidebar');
            $this->load->view('admin_edit', $data);
            $this->load->view('footer');
            $this->load->view('html_foot');
        }
	}

	function updated($page)
	{
        if($this->Data_model->check_session($_SESSION['username']) == false)
        {
            header('Location: http://localhost/enterprisecontent/index.php/admin/login');
        }
        else
        {
            $data['notification'] = '<h1>You have updated the ' . ucfirst(str_replace('_', ' ', $page)) . ' page</h1><h3>&nbsp</h3>';
            $content = $_POST['content'];
            $this->Data_model->write_to_db($page, $content);
            $data['pagedata'] = $this->Data_model->get_page_data($page);
            $this->load->view('html_head');
            $this->load->view('admin_header', $data);
            $this->load->view('admin_menu');
            $this->load->view('admin_sidebar');
            $this->load->view('admin_view', $data);
            $this->load->view('footer');
            $this->load->view('html_foot');
        }
	}

    function logout()
    {
        session_destroy();
        header('Location: http://localhost/enterprisecontent/index.php/visitor/page/');
    }

	function login()
	{
		if(empty($_POST['username']) || empty($_POST['password']))
		{
			$data['error'] = 'Please enter your username and password.';
			$this->load->view('html_head');
			$this->load->view('admin_login', $data);
			$this->load->view('html_foot');
		}
		else
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$validation = $this->Data_model->check_user($username, $password);
			if ($validation == true)
			{
				$_SESSION['username'] = $username;
				header('Location: overview');
			}
			else
			{
				$data['error'] = 'Sorry, we did not recognize that username and password. Please try again.';
				$this->load->view('html_head');
				$this->load->view('admin_login', $data);
				$this->load->view('html_foot');
			}
		}
	}
}

?>