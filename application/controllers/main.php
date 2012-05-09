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
        $this->load->library('customlibraries');
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
        $timestamp = date("Y-m-d H:i:s");

        $staffName = $this->input->post('staffName');
        $staffEmail = $this->input->post('staffEmail');
        $suggestion = $this->input->post('suggestion');

		$data = array(
                'staffName' => $this->input->post('staffName'),
				'staffEmail' => $this->input->post('staffEmail'),
                'suggestion' => $this->input->post('suggestion'),
                'timestamp' => $timestamp,
       	);

        //construct email
        $subject = 'New idea from ' . $staffName;
        $message = '<strong>New Suggestion</strong><br /><br />';
        $message = $message . '<strong>From: </strong>' . $staffName . '<br />';
        $message = $message . '<strong>Email: </strong>' . $staffEmail . '<br />';
        $message = $message . '<strong>Timestamp: </strong>' . $timestamp . '<br /><br />';
        $message = $message . $suggestion;


        //SEND SLT EMAIL
        $config['useragent'] = 'test';
        $config['mailtype'] = 'html';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'exim.dnv.org';
        $config['smtp_port'] = 25;
        $config['smtp_timeout'] = 5; 

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('systems@nvdpl.ca', 'Systems');
        $this->email->to('l.slt@nvdpl.ca', 'Senior Leadership Team');
        $this->email->bcc('robartss@nvdpl.ca', 'Systems');

        $this->email->subject($subject);
        $this->email->message($message);

        if($this->email->send())
        {
           echo "email sent"; 
        } 
        else 
        {
            show_error($this->email->print_debugger());
        }

        //SEND STAFF AUTORESPONDER
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('noreply@nvdpl.ca', 'No Reply');
        $this->email->to($staffEmail, 'Staff Person');
        $this->email->bcc('robartss@nvdpl.ca', 'Systems');

        $this->email->subject('Thank you for your idea!');
        $this->email->message('Thank you for submitting your idea.  The Senior Leadership Team will review your submission and will respond within 3 weeks');

        if($this->email->send())
        {
           echo "email sent"; 
        } 
        else 
        {
            show_error($this->email->print_debugger());
        }

       	$this->suggestions_model->add_suggestion($data);
       	redirect('http://intranet/display/suggestionbox/Confirmation');
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

    function save_edited_suggestion()
    {
        $suggestionId = $this->input->post('suggestionId');

        $action = $this->input->post('action'); //Value of the submit button
        if($action == "Cancel")
        {
            redirect('main');
        }
        else if($action == "Save Edit")
        {
            $data = array(
                'id' => $suggestionId,
                'editedSuggestion' => $this->input->post('editedSuggestion')
            );

            $this->suggestions_model->save_edited_suggestion($data);
            redirect('main/edit_suggestion/' . $suggestionId);
        }
    }

    function save_mgmt_decision()
    {
        $suggestionId = $this->input->post('suggestionId');

        $action = $this->input->post('action'); //Value of the submit button
        if($action == "Cancel")
        {
            redirect('main');
        }
        else if($action == "Save Decision")
        {
            $data = array(
                'id' => $suggestionId,
                'mgmtDecision' => $this->input->post('mgmtDecision')
            );

            $this->suggestions_model->save_mgmt_decision($data);
            redirect('main/edit_suggestion/' . $suggestionId);
        }
    }

    function set_responded()
    {
        $suggestionId = $this->uri->segment(3);
        $data = array(
                'id' => $suggestionId,
                'respondStatus' => 1
            );
        $this->suggestions_model->set_response_flag($data);
        redirect('main');
    }

    function set_not_responded()
    {
        $suggestionId = $this->uri->segment(3);
        $data = array(
                'id' => $suggestionId,
                'respondStatus' => 0
            );
        $this->suggestions_model->set_response_flag($data);
        redirect('main');
    }

    function set_final()
    {
        $suggestionId = $this->uri->segment(3);
        $data = array(
                'id' => $suggestionId,
                'finalStatus' => 1
            );
        $this->suggestions_model->set_final_flag($data);
        redirect('main');
    }

}
 
