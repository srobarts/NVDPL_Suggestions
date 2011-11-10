<?php
/**
 * Created By: srobarts
 * Date: 11-10-29
 * Time: 3:14 PM
 * BlinkLab Web Development, all rights reserved
 */

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('suggestions_model');
        $this->load->model('comments_model');
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
        //page values
        $data['title'] = "NVDPL Suggestions";
        $data['heading'] = "NVDPL Suggestions";
        $data['tabnum'] = 1;
        
        if( $query = $this->suggestions_model->getAll() )
        {
            $data['query'] = $query;
        }

        $data['main_content'] = 'listing_view';
        $this->load->view('/common/template', $data);	
	}

    
	function process_add_suggestion()
	{
		$data = array(
                'staffFirstName' => $this->input->post('staffFirstName'),
				'staffLastName' => $this->input->post('staffLastName'),
                'suggestion' => $this->input->post('suggestion'),
       	);

       	$this->data_model->add_suggestion($data);
       	//redirect('thankyou');
	}

    function edit_suggestion($id)
    {
        //page values
        $data['title'] = "NVDPL Suggestions";
        $data['heading'] = "NVDPL Suggestions";
        
        if( $query = $this->suggestions_model->get_single_suggestion($id) )
        {
            $data['query'] = $query;
        }

        if( $query = $this->comments_model->getCommentsForSuggestion($id) )
        {
            $data['comments'] = $query;
        }

        $data['main_content'] = 'edit_suggestion_view';
        $this->load->view('/common/template', $data);
    }
}
 
