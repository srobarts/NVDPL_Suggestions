<?php
 
class comments_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }

	function getAll()
	{
		$query = $this->db->get('comments');
        return $query;
	}

	function add_comment($data)
	{
		$this->db->insert('comments', $data);
		return;
	}

	function getCommentsForSuggestion($id)
	{
		$this->db->where('suggestionId', $id);
		$query = $this->db->get('comments');
        return $query;
	}

}