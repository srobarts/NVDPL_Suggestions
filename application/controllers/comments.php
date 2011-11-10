<?php

class Comments extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('comments_model');
        $this->load->model('users_model');
	}

    function is_logged_in()
    {
        //function to check if user is logged in
        $is_logged_in = $this->session->userdata('is_logged_in');

        if(!isset($is_logged_in) || $is_logged_in != true )
        {
            $this->load->view('login_form');
        }
    }

	function index()
	{
	}

    function view_comments($id)
    {
        //page values
        $data['title'] = "NVDPL Suggestions";
        $data['heading'] = "NVDPL Suggestions";
        
        if( $query = $this->comments_model->getCommentsForSuggestion($id) )
        {
            $data['comments'] = $query;
        }

        $data['main_content'] = 'edit_suggestion_view';
        $this->load->view('/common/template', $data);
    }

    function add_comment($suggestionId)
    {
        if($query = $this->users_model->getAll())
        {
            $data['query'] = $query;
        }

        $data['main_content'] = 'add_comment';
        $this->load->view('common/template', $data);
    }

    function process_add_comment()
    {
        $suggestionId = $this->input->post('suggestionId');

        $data = array(
                'suggestionId' => $this->input->post('suggestionId'),
                'staffName' => $this->input->post('staffName'),
                'timestamp' => $this->input->post('timestamp'),
                'comment' => $this->input->post('comment'),
        );

        $this->comments_model->add_comment($data);
        redirect('main/edit_suggestion/' . $suggestionId);
    }

}