<?php
	class Data_model extends CI_Model{
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		function write_to_db($page, $content)
		{
			$data = array('content' => $content);

			$this->db->where('page', $page);
			$this->db->update('page_data', $data);
		}

		function get_page_data($page)
		{
			$query = $this->db->get_where('page_data', array('page' => $page));
			return $query->row_array();
		}

		function check_user($username, $password)
		{
			$query = $this->db->get_where('users', array('username' => $username));
			$user = $query->row_array();
			if(!empty($user))
			{
				if ($user['password'] == md5($password))
				{
					return true;
				}
			}
			else
			{
				return false;
			}
		}
		
		function check_session($username)
        {
            $query = $this->db->get_where('users', array('username' => $username));
			if($query->num_rows() > 0)
			{
            	return true;
			}
			else
			{
				return false;
			}
        }
	}
?>