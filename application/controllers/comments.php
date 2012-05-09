<?php

class Comments extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('comments_model');
        $this->load->model('suggestions_model');
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

    function view_single_comment($commentId)
    {
        if( $query = $this->comments_model->getComment($commentId) )
        {
            $data['comments'] = $query;
        }

        $data['main_content'] = 'edit_comment_view';
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

        $action = $this->input->post('action'); //Value of the submit button
        if($action == "Cancel")
        {
            redirect('main');
        }
        else if($action == "Add Note")
        {
            $data = array(
                'id' => $suggestionId,
                'messageStatus' => 1
            );
            $this->suggestions_model->set_comment_flag($data);

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

    function process_edit_comment()
    {
        $commentId = $this->input->post('commentId');

        $action = $this->input->post('action'); //value of the submit button
        if($action == "Cancel")
        {
            redirect('main');
        }
        else if($action == "Edit Note")
        {
            $data = array(
                'id' => $this->input->post('commentId'),
                'comment' => $this->input->post('comment'),
                'staffName' => $this->input->post('staffName')
            );

            $this->comments_model->edit_comment($data);
            redirect('main');
        }
    }

}