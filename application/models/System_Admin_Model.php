<?php

class System_Admin_Model extends CI_Model
{
	//constructor to load the database functions
	public function __construct()
	{
		parent::__construct();
	}
	
	public function validate_user() 
	{
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', md5($this->input->post('password')));

        $query = $this->db->get('system_admin');

        if( $query->num_rows() == 1 )
		{
            return $query->result();
        }
		else
		{
			return false;
		}
    }
	
	public function insert_agency_registration($input,$login_id) 
	{
		$this->db->trans_start();
        $data = array
		(
			'agency_name' => $this->input->post('agency_name'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'zip' => $this->input->post('zip'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'country' => $this->input->post('country'),
			'regional_center' => $this->input->post('regional_center'),
			'date_registered' => $this->input->post('date_registred'),
			'notes' => $this->input->post('notes'),
			'password' => md5($this->input->post('agency_password')),
			'updated_by' => $login_id
		);
		
		$this->db->insert('agency',$data);
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			return true;
		}
    }
	
	public function agency_count()
	{
		$this->db->select('count(id) as Agency,(select count(id) from agency_users) as Users,(select count(caregiver_id) from caregiver_details) as Caregivers,(select count(client_id) from client_details) as Clients');
		$this->db->from('agency');
		$query = $this->db->get();
		
		return $query->result();
	}
	
	//////////make this dynamic
	public function registered_users_details($model_input,$table_name,$column_name=NULL,$role_id=NULL)
	{
		$input=implode(',',$model_input);
		$this->db->select($input);
		if(!empty($column_name))
		{
			$this->db->where($column_name, $role_id);
		}	
		$query = $this->db->get($table_name);
		
		return $query->result();
	}
	
	public function get_all_details($column_name,$id,$table_name)
	{
		$this->db->where($column_name, $id);
		$query = $this->db->get($table_name);
		
		return $query->result();
	}
	
	public function get_alluserswithrole_details($column_name,$id,$table_name)
	{
		$this->db->select('*,(select role from agency_roles where id = role_id) as role');
		$this->db->where($column_name, $id);
		$query = $this->db->get($table_name);
		
		return $query->result();
	}
	
	/* SELECT *,(select role from agency_roles where id = role_id) as role  FROM `agency_users` WHERE `id` = 14 */
	/* public function all_agency_details($agency_id)
	{
		
		$this->db->where('id', $agency_id);
		$query = $this->db->get('agency');
		
		return $query->result();
	} */
	//////////////////////////////////////////////
	
	public function update_agency_details($input,$login_id)
	{
		$data = array
		(
			'agency_name' => $this->input->post('agency_name'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'zip' => $this->input->post('zip'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'country' => $this->input->post('country'),
			'regional_center' => $this->input->post('regional_center'),
			'date_registered' => $this->input->post('date_registred'),
			'notes' => $this->input->post('notes'),
			'password' => md5($this->input->post('agency_password')),
			'updated_by' => $login_id
		);     
		
		$this->db->where('id',$this->input->post('agency_id')); //which row want to upgrade  
		$this->db->update('agency', $data); 
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function update_agency_user_registration($input,$login_id)
	{
		$data = array
		(
			//'agency_id' => $this->input->post('agency_id'),//Need to add agency id from session
			'email' => $this->input->post('user_email'),
			'name' => $this->input->post('name'),
			'gender' => $this->input->post('gender'),
			'dob' => $this->input->post('client_dob'),
			'language' => $this->input->post('language'),
			//'role_id' => $this->input->post('user_role'),
			'address' => $this->input->post('address'),
			'zip' => $this->input->post('zip'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'country' => $this->input->post('country'),
			'notes' => $this->input->post('notes'),
			//'updated_by' => $login_id //Need to add agency id from session
		);
		
		$this->db->where('id',$this->input->post('agency_user_id')); //which row want to upgrade  
		$this->db->update('agency_users', $data); 
		if($this->db->affected_rows() >= 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function update_client_registration($input,$login_id)
	{
		$data = array
		(
			'date_registered' => $this->input->post('client_date_registered'),
			'income_source' => $this->input->post('client_income_source'),
			'amount' => $this->input->post('client_amount'),
			'diagnosis' => $this->input->post('client_dignosis'),
			'medications' => $this->input->post('client_medications'),
			'health_insurance' => $this->input->post('client_health_insurance'),
			'medical_providers' => $this->input->post('client_medical_providers'),
			'service_coorindator' => $this->input->post('client_service_coorindator'),
			'legal_issues' => $this->input->post('client_legal_issues'),
			'notes' => $this->input->post('client_notes'),
			//'updated_by' => $login_id,
			//'agency_user_id' => $this->input->post('last_id')
		);
		
		$this->db->where('client_id',$this->input->post('client_id')); //which row want to upgrade  
		$this->db->update('client_details', $data); 
		if($this->db->affected_rows() >= 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function update_status($table_name,$id,$status)
	{
		$this->db->set('status', $status);  
		$this->db->where('id', $id); 
		$this->db->update($table_name); 
		if($this->db->affected_rows() > 0)
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