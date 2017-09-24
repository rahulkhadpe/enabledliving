<?php defined('BASEPATH') OR exit('No direct script access allowed');

class System_Admin extends CI_Controller {

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
		$this->load->model('System_Admin_Model');
		
		$this->load->model('Agency_Admin_Model');
		
		if(!isset($this->session->userdata['system_logged_in']))
		{
			redirect('Home/sys_login');
		}
		else
		{
			$this->login_id=$this->session->userdata['system_logged_in']['id'];
		}
		 
	}
	
	public function sys_index()
	{
		$data=array('page_name'=>'home','navigation_panel'=>'system_navbar','sidebar_panel'=>'system_sidebar');
		
		$this->load->view('main',$data);
	}
	
	public function sys_agency_registration($insert_message=NULL)
	{
		if($this->session->flashdata('result')==1)
		{
			$insert_message="Success ! User Registered Successfully.";
		}
		elseif($this->session->flashdata('result')==2)
		{
			$insert_message="Failed ! Unable to enter data. Try Again.";
		}
		
		$data=array('page_name'=>'agency_registration','navigation_panel'=>'system_navbar','insert_message'=>$insert_message,'sidebar_panel'=>'system_sidebar','action'=>'System_Admin/sys_insert_agency');
		
		$this->load->view('main',$data);
	}
	
	public function sys_insert_agency()
	{
		$this->form_validation->set_rules('agency_name','Agency Name','required');
		$this->form_validation->set_rules('date_registred','Registration Date','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('zip','Zip','required');
		$this->form_validation->set_rules('city','City','required');
		$this->form_validation->set_rules('state','State','required');
		$this->form_validation->set_rules('country','Country','required');
		$this->form_validation->set_rules('regional_center','Regional Center','required');
		$this->form_validation->set_rules('agency_password','Agency Password','trim|required');
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->sys_agency_registration();
		}
		else
		{
			//$login_id= $this->session->userdata['system_logged_in']['id'];
			$input=$this->input->post('submit_agency_registraion');
			$result=$this->System_Admin_Model->insert_agency_registration($input,$this->login_id);
			if ($result == TRUE)
			{ 
				//$insert_message="Success ! Data inserted Successfully.";
				//$this->sys_agency_registration($insert_message);
				$this->session->set_flashdata('result',1); //1 = success
				redirect('System_Admin/sys_agency_registration');
			}
			else
			{
				//$insert_message="Failed ! Unable to enter data. Try Again.";
				//$this->sys_agency_registration($insert_message);
				$this->session->set_flashdata('result',2); //2 = failed
				redirect('System_Admin/sys_agency_registration');
			} 
			
		}
	}
	
	public function sys_agency_details()
	{
		$table_name="agency";
		$model_input=array('id','agency_name as name','status');
		$data['details_result']=$this->System_Admin_Model->registered_users_details($model_input,$table_name);
		$data['count_result']=$this->System_Admin_Model->agency_count();
		$data['title']="Agency";
		$data['action']="System_Admin/edit_agency_details";
		$this->load->view('pages/list_registered_details',$data);
	}
	
	public function sys_agency_modal_details()
	{
		$table_name="agency";
		$column_name="id";
		$agency_id=$this->input->post('agencyID');
		$data['modal_result']=$this->System_Admin_Model->get_all_details($column_name,$agency_id,$table_name);
		$this->load->view('pages/modal/list_registereddetails_modal',$data);
	}
	
	public function edit_agency_details($insert_message=NULL)
	{
		if($this->session->flashdata('result')==1)
		{
			$insert_message="Success ! User Updated Successfully.";
		}
		elseif($this->session->flashdata('result')==2)
		{
			$insert_message="Failed ! Unable to update data. Try Again.";
		}
		
		$table_name="agency";
		$column_name="id";
		$agency_id=(!$this->input->post('edit-id')) ? $this->session->flashdata('agency_id') : $this->input->post('edit-id');
		$agency_details=$this->System_Admin_Model->get_all_details($column_name,$agency_id,$table_name);
		
		$data=array('page_name'=>'update/update_agency_registration','navigation_panel'=>'system_navbar','insert_message'=>$insert_message,'sidebar_panel'=>'system_sidebar','action'=>'System_Admin/update_agency_details','agency_details'=>$agency_details);
		
		$this->load->view('main',$data);
	
	}
	
	public function update_agency_details()
	{
		$this->form_validation->set_rules('agency_name','Agency Name','required');
		$this->form_validation->set_rules('date_registred','Registration Date','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('zip','Zip','required');
		$this->form_validation->set_rules('city','City','required');
		$this->form_validation->set_rules('state','State','required');
		$this->form_validation->set_rules('country','Country','required');
		$this->form_validation->set_rules('regional_center','Regional Center','required');
		$this->form_validation->set_rules('agency_password','Agency Password','trim|required');
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->session->set_flashdata('agency_id',$this->input->post('agency_id'));
			$this->edit_agency_details();
		}
		else
		{
			
			$input=$this->input->post('submit_agency_registraion');
			$result=$this->System_Admin_Model->update_agency_details($input,$this->login_id);
			if ($result == TRUE)
			{ 
				$this->session->set_flashdata('result',1); //1 = success
				redirect('System_Admin/edit_agency_details');
			}
			else
			{
				$this->session->set_flashdata('result',2); //2 = failed
				redirect('System_Admin/edit_agency_details');
			} 
			
		}
	}
	
	public function sys_client_details()
	{
		$table_name="agency_users";
		$model_input=array('id','name','status');
		$column_name="role_id";
		$role_id="4";
		$data['details_result']=$this->System_Admin_Model->registered_users_details($model_input,$table_name,$column_name,$role_id);
		$data['count_result']=$this->System_Admin_Model->agency_count();
		$data['title']="Client";
		$data['action']="System_Admin/edit_agency_user_details";
		$this->load->view('pages/list_registered_details',$data);
	}
	
	public function sys_client_modal_details()
	{
		/* $table_name="agency_users";
		$column_name="id";
		$agency_id=$this->input->post('agencyuserID');
		$data['modal_result']=$this->System_Admin_Model->get_all_details($column_name,$agency_id,$table_name);
		$this->load->view('pages/modal/list_registereddetails_modal',$data); */
	}
	
	public function edit_agency_user_details($insert_message=NULL)
	{
		if($this->session->flashdata('result')==1)
		{
			$insert_message="Success ! User Updated Successfully.";
		}
		elseif($this->session->flashdata('result')==2)
		{
			$insert_message="Failed ! Unable to update data. Try Again.";
		}
		
		$table_name="agency_users";
		$column_name="id";
		
		$agency_user_id=(!$this->input->post('edit-id')) ? $this->session->flashdata('agency_user_id') : $this->input->post('edit-id');
		$user_role=$this->Agency_Admin_Model->fetch_user_role();
		$agency_user_details=$this->System_Admin_Model->get_alluserswithrole_details($column_name,$agency_user_id,$table_name);
		
		$data=array('page_name'=>'update/update_user_registration','navigation_panel'=>'system_navbar','insert_message'=>$insert_message,'sidebar_panel'=>'system_sidebar','action'=>'System_Admin/update_agency_users_details','agency_user_details'=>$agency_user_details);
		
		$this->load->view('main',$data);
	}
	
	public function update_agency_users_details()
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
			$this->session->set_flashdata('agency_user_id',$this->input->post('agency_user_id'));
			$this->edit_agency_user_details();
		}
		else
		{
			$input=$this->input->post('submit_user_registraion');
			$result=$this->System_Admin_Model->update_agency_user_registration($input,$this->login_id);
			if ($result == false)
			{
				$this->session->set_flashdata('result',2);
				$this->edit_agency_user_details();
					
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
					$this->session->set_flashdata('agency_user_id',$this->input->post('agency_user_id'));
					redirect('System_Admin/edit_client_details');
				}
				elseif($this->input->post('user_role')=='5')
				{
					//$this->caregiver_index();
					$this->session->set_flashdata('agency_user_id',$this->input->post('agency_user_id'));
					redirect('System_Admin/caregiver_index');
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
	
	public function edit_client_details($insert_message=NULL)
	{
		$agency_user_id=$this->session->flashdata('agency_user_id');
		$column_name="agency_user_id";
		$table_name="client_details";
		$client_details=$this->System_Admin_Model->get_all_details($column_name,$agency_user_id,$table_name);
		
		$data=array('page_name'=>'update/update_client_registration','navigation_panel'=>'system_navbar','insert_message'=>$insert_message,'sidebar_panel'=>'system_sidebar','action'=>'System_Admin/update_client_details','client_details'=>$client_details);
		
		$this->load->view('main',$data);
	}
	
	public function update_client_details()
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
			$this->session->set_flashdata('agency_user_id',$this->input->post('agency_user_id'));
			$this->edit_client_details();
		}
		else
		{
			$input=$this->input->post('submit_client_registration');
			$result=$this->System_Admin_Model->update_client_registration($input,$this->login_id);
			if ($result == TRUE)
			{
				
				$this->session->set_flashdata('result',1); //1 = success
				redirect('System_Admin/edit_agency_user_details');
				
		 	}
			else
			{
				
				$this->session->set_flashdata('result',2); //2 = failed
				redirect('System_Admin/edit_agency_user_details');
			}
			
		}
	}
	
	public function change_status_inactive()
	{
		$data['id']=$this->input->post('id');
		$data['title']=$this->input->post('category');
		
		if($data['title']=="agency")
		{
			$table_name="agency";
		}
		else
		{
			$table_name="agency_users";
		}
		$status="2";//inactive
		$update=$this->System_Admin_Model->update_status($table_name,$data['id'],$status);
		
		if($update==true)
		{
			$data['msg']="true";
		}
		else
		{
			$data['msg']="Failed ! Unable to update data. Try Again.";
		}
		
		$this->load->view('pages/table/inactive_status_table',$data);
	}
	
	public function change_status_active()
	{
		$data['id']=$this->input->post('id');
		$data['title']=$this->input->post('category');
		
		if($data['title']=="agency")
		{
			$table_name="agency";
		}
		else
		{
			$table_name="agency_users";
		}
		$status="1";//inactive
		$update=$this->System_Admin_Model->update_status($table_name,$data['id'],$status);
		
		if($update==true)
		{
			$data['msg']="true";
		}
		else
		{
			$data['msg']="Failed ! Unable to update data. Try Again.";
		}
		
		$this->load->view('pages/table/active_status_table',$data);
	}
	
	public function logout()
	{
		// Removing session data
		//$sess_array = array('id' => '','username' => '');
		$this->session->unset_userdata('system_logged_in');
		//$data['logout_message'] = "Successfully Logout";
		redirect('Home/sys_login');
	}
	
	
}
?>