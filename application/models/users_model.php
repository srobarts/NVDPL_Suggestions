<?php
 
class users_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }

	function getAll()
	{
		$query = $this->db->get('users');
        return $query;
	}
	
	function add_user($data)
	{
		$this->db->insert('users', $data);
		return;
	}

	function validate()
    {
        $this->db->where('staffEmail', $this->input->post('emailAddress'));
        $this->db->where('password', $this->input->post('password'));
        $query = $this->db->get('users');

        if($query->num_rows == 1)
        {
            return $query->result();
        }
    }
	
	
}