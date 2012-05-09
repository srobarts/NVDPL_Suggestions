<?php
/**
 * Created By: Scott Robarts
 * Date: 11-09-2011
 * Time: 3:14 PM
 * All rights reserved
 */

class Login extends  CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('users_model');
        //$this->load->library('customlibraries');
	}
	
	function index()
	{
        //is user already logged in?
        if($this->session->userdata('is_logged_in') == true)
        {
            redirect('main');
        }
        $data['loginStatus'] = TRUE;

        $this->load->view('login_form');
  	}
  	
  	function validate()
    {
        $this->load->model('users_model');
        $this->load->helper('cookie');

        if($query = $this->users_model->validate()) //succesful validation
        {
            foreach($query as $row)
            {
                $id = $row->id;
                $staffName = $row->staffName;
                $staffEmail = $row->staffEmail;
            }
            $data = array(
                'id' => $id,
                'staffName' => $staffName,
                'staffEmail' => $staffEmail,
                'is_logged_in' => true,
                'timeout' => time()
            );
            //Create session
            $this->session->set_userdata($data);

            redirect('main');
        }
        else
        {
            //failed login validation - send back to login page
            $data['loginStatus'] = FALSE;

            $this->load->view('login_form');
            //$this->index();
        }
    }

    function logout()
    {
        $data = array(
            'username' => '',
            'is_logged_in' => false
        );
        $this->session->unset_userdata($data);
        redirect('login');
    }
	
}