<?php

class Agency_Admin_Model extends CI_Model
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

        $query = $this->db->get('agency');

        if( $query->num_rows() == 1 )
		{
            return $query->result();
        }
		else
		{
			return false;
		}
    }
	
	public function fetch_user_role()
	{
		$query = $this->db->get('agency_roles');  
		return $query->result();
	}	
	
	public function insert_user_registration($input,$login_id) 
	{
		$this->db->trans_start();
        $data = array
		(
			'agency_id' => $login_id,//Need to add agency id from session
			'email' => $this->input->post('user_email'),
			'name' => $this->input->post('name'),
			'gender' => $this->input->post('gender'),
			'dob' => $this->input->post('client_dob'),
			'language' => $this->input->post('language'),
			'role_id' => $this->input->post('user_role'),
			'address' => $this->input->post('address'),
			'zip' => $this->input->post('zip'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'country' => $this->input->post('country'),
			'notes' => $this->input->post('notes'),
			'updated_by' => $login_id //Need to add agency id from session
		);
		
		$this->db->insert('agency_users',$data);
		$insert_id=$this->db->insert_id();
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			//return true;
			return $insert_id;
		}
    }
	
	public function insert_client_registration($input,$login_id) 
	{
		$this->db->trans_start();
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
			'notes' => $this->input->post('notes'),
			'updated_by' => $login_id,
			'agency_user_id' => $this->input->post('last_id')
		);
		
		$this->db->insert('client_details',$data);
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
	
	public function insert_caregiver_registration($input,$login_id) 
	{
		$this->db->trans_start();
        $data = array
		(
			'languages' => $this->input->post('caregiver_languages'),
			'special_skills' => $this->input->post('caregiver_special_skills'),
			'notes' => $this->input->post('notes'),
			'updated_by' => $login_id,
			'agency_user_id' => $this->input->post('last_id')
		);
		
		$this->db->insert('caregiver_details',$data);
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
	
	public function check_agency_password($input,$login_id)
	{
		$this->db->where('id', $login_id);
        $this->db->where('password', md5($this->input->post('old_password')));

        $query = $this->db->get('agency');

        if($query->num_rows() == 1)
		{
            return true;
        }
		else
		{
			return false;
		}
	}
	
	public function update_agency_password($input,$login_id)
	{
		$this->db->set('password', md5($this->input->post('new_password'))); //value that used to update column  
		$this->db->where('id', $login_id); //which row want to upgrade  
		$this->db->update('agency'); 
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