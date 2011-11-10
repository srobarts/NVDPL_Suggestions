<?php
 
class suggestions_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }

	function getAll()
	{
		$query = $this->db->get('suggestions');
        return $query;
	}

	function add_suggestion($data)
	{
		$this->db->insert('suggestions', $data);
		return;
	}

	function get_single_suggestion($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('suggestions');
        return $query;
	}

	function update_suggestion($data)
	{
		$this->db->where('id', $data['id']);
        $this->db->update('suggestions', $data);
        return;
	}

}