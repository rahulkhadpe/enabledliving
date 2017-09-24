<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Agency_Admin extends CI_Controller {

	private $login_id; 
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		
		//$this->load->helper('path');
		
		// Load form helper library
		$this->load->helper('form');
		
		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');
		
		// Load database
		$this->load->model('Agency_Admin_Model');
		
		if(!isset($this->session->userdata['agency_logged_in']))
		{
			redirect('Home/agency_login');
		}
		else
		{
			$this->login_id=$this->session->userdata['agency_logged_in']['id'];
		}
		 
	}
	
	public function agency_index()
	{
		$data=array('page_name'=>'home','navigation_panel'=>'agency_navbar','sidebar_panel'=>'agency_sidebar');
		
		$this->load->view('main',$data);
	}
	
	public function agency_user_registration($insert_message=NULL)
	{
		if($this->session->flashdata('result')==1)
		{
			$insert_message="Success ! User Registered Successfully.";
		}
		elseif($this->session->flashdata('result')==2)
		{
			$insert_message="Failed ! Unable to enter data. Try Again.";
		}
		
		$user_role=$this->Agency_Admin_Model->fetch_user_role();
		$data=array('page_name'=>'user_registration','navigation_panel'=>'agency_navbar','sidebar_panel'=>'agency_sidebar','user_role'=>$user_role,'insert_message'=>$insert_message);
		
		$this->load->view('main',$data);
	}
	
	public function agency_insert_user()
	{
		$this->form_validation->set_rules('user_role','User Role','required');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('client_dob','Date Of Birth','required');
		$this->form_validation->set_rules('user_email','Email','required');
		$this->form_validation->set_rules('language','Language','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('zip','Zip','required');
		$this->form_validation->set_rules('city','City','required');
		$this->form_validation->set_rules('state','State','required');
		$this->form_validation->set_rules('country','Country','required');
				
		if ($this->form_validation->run() == FALSE) 
		{
			$this->agency_user_registration();
		}
		else
		{
			$input=$this->input->post('submit_user_registraion');
			$result=$this->Agency_Admin_Model->insert_user_registration($input,$this->login_id);
			if ($result == false)
			{
				$insert_message="Failed ! Unable to enter data. Try Again.";
				$this->agency_user_registration($insert_message);
					
		 	}
			else
			{
				if($this->input->post('user_role')=='1')
				{
					
				}
				elseif($this->input->post('user_role')=='2')
				{
					
				}
				elseif($this->input->post('user_role')=='3')
				{
					
				}
				elseif($this->input->post('user_role')=='4')
				{
					//$this->client_index();
					$this->session->set_flashdata('last_insert_id',$result);
					redirect('Agency_Admin/client_index');
				}
				elseif($this->input->post('user_role')=='5')
				{
					//$this->caregiver_index();
					$this->session->set_flashdata('last_insert_id',$result);
					redirect('Agency_Admin/caregiver_index');
				}	
				elseif($this->input->post('user_role')=='6')
				{
					
				}
				elseif($this->input->post('user_role')=='7')
				{
					
				}
				
			}
			
		}
	}
	
	public function client_index($insert_message=NULL)
	{
		$last_insert_id= $this->session->flashdata('last_insert_id');
		$data=array('page_name'=>'client_registration','navigation_panel'=>'agency_navbar','sidebar_panel'=>'agency_sidebar','insert_message'=>$insert_message,'last_insert_id'=>$last_insert_id);
		
		$this->load->view('main',$data);
	}
	
	public function client_registration()
	{
		$this->form_validation->set_rules('client_income_source','Income Source','required');
		$this->form_validation->set_rules('client_amount','Amount','required');
		$this->form_validation->set_rules('client_dignosis','Dignosis','required');
		$this->form_validation->set_rules('client_medications','Medications','required');
		$this->form_validation->set_rules('client_health_insurance','Health Insurance','required');
		$this->form_validation->set_rules('client_medical_providers','Medical Providers','required');
		$this->form_validation->set_rules('client_service_coorindator','Service Coorindator','required');
		$this->form_validation->set_rules('client_legal_issues','Legal Issues','required');
		$this->form_validation->set_rules('client_date_registered','Registration Date','required');
				
		if ($this->form_validation->run() == FALSE) 
		{
			$this->session->set_flashdata('last_insert_id',$this->input->post('last_id'));//set last id again
			$this->client_index();
		}
		else
		{
			$input=$this->input->post('submit_client_registration');
			$result=$this->Agency_Admin_Model->insert_client_registration($input,$this->login_id);
			if ($result == TRUE)
			{
				
				$this->session->set_flashdata('result',1); //1 = success
				redirect('Agency_Admin/agency_user_registration');
				
		 	}
			else
			{
				
				$this->session->set_flashdata('result',2); //2 = failed
				redirect('Agency_Admin/agency_user_registration');
			}
			
		}
	}
	
	public function caregiver_index($insert_message=NULL)
	{
		$last_insert_id= $this->session->flashdata('last_insert_id');
		$data=array('page_name'=>'caregiver_registration','navigation_panel'=>'agency_navbar','sidebar_panel'=>'agency_sidebar','insert_message'=>$insert_message,'last_insert_id'=>$last_insert_id);
		
		$this->load->view('main',$data);
	}
	
	public function caregiver_registration()
	{
		$this->form_validation->set_rules('caregiver_languages','Languages','required');
		$this->form_validation->set_rules('caregiver_special_skills','Special Skills','required');
						
		if ($this->form_validation->run() == FALSE) 
		{
			$this->session->set_flashdata('last_insert_id',$this->input->post('last_id'));//set last id again
			$this->caregiver_index();
		}
		else
		{
			$input=$this->input->post('submit_caregiver_registration');
			$result=$this->Agency_Admin_Model->insert_caregiver_registration($input,$this->login_id);
			if ($result == TRUE)
			{
				$this->session->set_flashdata('result',1); //1 = success
				redirect('Agency_Admin/agency_user_registration');
		 	}
			else
			{
				
				$this->session->set_flashdata('result',2); //2 = failed
				redirect('Agency_Admin/agency_user_registration');
				
			}
			
		}
	}
	
	public function agency_change_password_index($insert_message=NULL)
	{
		if($this->session->flashdata('result')==1)
		{
			$insert_message="Success ! Password Updated Successfully.";
		}
		elseif($this->session->flashdata('result')==2)
		{
			$insert_message="Failed ! Unable to update data. Try Again.";
		}
		
		$data=array('page_name'=>'change_password','navigation_panel'=>'agency_navbar','sidebar_panel'=>'agency_sidebar','change_password_action'=>'Agency_Admin/set_password','insert_message'=>$insert_message);
		
		$this->load->view('main',$data);
	}
	
	public function set_password()
	{
		$this->form_validation->set_rules('old_password','Old Password','trim|required');//|callback_password_matches
		$this->form_validation->set_rules('new_password','New Password','trim|required');
		$this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|matches[new_password]');
				
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->agency_change_password_index();
		}
		else
		{
			$input=$this->input->post('submit_change_password');
			$result=$this->Agency_Admin_Model->check_agency_password($input,$this->login_id);
			
			if($result==TRUE)
			{
				$update=$this->Agency_Admin_Model->update_agency_password($input,$this->login_id);
				
				if($update==true)
				{
					$this->session->set_flashdata('result',1); //1 = success
					redirect('Agency_Admin/agency_change_password_index');
				}
				else
				{
					$this->session->set_flashdata('result',2);
					redirect('Agency_Admin/agency_change_password_index');
				}
			}
			else
			{	
				$insert_message="Old Password doesn't match. Please Try Again.";
				$this->agency_change_password_index($insert_message);
			}
			
		}
	}
	
	/* public function agency_registered_users_index($insert_message=NULL)
	{
		$data=array('page_name'=>'list_registered_users','navigation_panel'=>'agency_navbar','insert_message'=>$insert_message);
		
		$this->load->view('main',$data);
	} */
	
	public function logout()
	{
		// Removing session data
		//$sess_array = array('id' => '','username' => '');
		$this->session->unset_userdata('agency_logged_in');
		//$data['logout_message'] = "Successfully Logout";
		redirect('Home/agency_login');
	}
	
	
}
?>