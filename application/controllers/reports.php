<?php
/**
 * Created By: srobarts
 * Date: 11-10-29
 * Time: 3:14 PM
 * BlinkLab Web Development, all rights reserved
 */

class Reports extends CI_Controller {

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
        
        if( $query = $this->suggestions_model->getAll() )
        {
            $data['query'] = $query;
        }

        $data['main_content'] = 'reports_view';
        $this->load->view('/common/template', $data);	
	}

}