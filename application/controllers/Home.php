<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		
		// Load form helper library
		$this->load->helper('form');
		
		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');
		
		// Load database
		$this->load->model('System_Admin_Model');
		
		// Load database
		$this->load->model('Agency_Admin_Model');
		
		//$this->load->library('user_agent');
		if(isset($this->session->userdata['system_logged_in']))
		{
			redirect('System_Admin/sys_index');
		}
		elseif(isset($this->session->userdata['agency_logged_in']))
		{
			redirect('Agency_Admin/agency_index');
		}
		
		
	}
	
	public function index()
	{
		$data=array('page_name'=>'home','navigation_panel'=>NULL);
		$this->load->view('platform',$data);
	}
	
	public function sys_login($login_message=NULL)
	{
		$data=array('login_page_name'=>'Admin','page_name'=>'login','navigation_panel'=>NULL,'login_action'=>'Home/sys_authorize','login_message'=>$login_message);
		
		$this->load->view('platform',$data);
		
	}
	
	public function sys_authorize()
	{
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->sys_login();
		}
		else
		{
			$input=$this->input->post('submit_login');
			$result = $this->System_Admin_Model->validate_user($input);
			
			if ($result == TRUE)
			{
				$session_data = array('id' => $result[0]->sys_id,'username' => $result[0]->admin_name);
				$this->session->set_userdata('system_logged_in', $session_data);
				redirect('System_Admin/sys_index');
			}
			else
			{
				$login_message="Invalid Credentials";
				$this->sys_login($login_message);
			}
		}
	}
	
	public function agency_login($login_message=NULL)
	{
		$data=array('login_page_name'=>'Agency','page_name'=>'login','navigation_panel'=>NULL,'login_action'=>'Home/agency_authorize','login_message'=>$login_message);
		
		$this->load->view('platform',$data);
		
	}
	
	public function agency_authorize()
	{
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','trim|required');
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->agency_login();
		}
		else
		{
			$input=$this->input->post('submit_login');
			$result = $this->Agency_Admin_Model->validate_user($input);
			
			if ($result == TRUE)
			{
				$session_data = array('id' => $result[0]->id,'username' => $result[0]->agency_name);//make agency session
				$this->session->set_userdata('agency_logged_in', $session_data);
				redirect('Agency_Admin/agency_index');
			}
			else
			{
				$login_message="Invalid Credentials";
				$this->agency_login($login_message);
			}
		}
	}
	
	/* public function logout()
	{
		// Removing session data
		//$sess_array = array('id' => '','username' => '');
		$this->session->unset_userdata('logged_in');
		//$data['logout_message'] = "Successfully Logout";
		$this->index();
	} */
}
?>