<?php

class Users extends  CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('users_model');

	}

	function index()
	{
        //page values
        $data['title'] = "NVDPL Suggestions - Users";
        $data['heading'] = "NVDPL Suggestions - Users";
   
		if($query = $this->users_model->getAll())
        {
            $data['query'] = $query;
        }

        $data['main_content'] = 'userlisting_view';
        $this->load->view('common/template', $data);
	}

	function add_user()
	{
		if($query = $this->users_model->getAll())
        {
            $data['query'] = $query;
        }

		$data['main_content'] = 'adduser_view';
        $this->load->view('common/template', $data);
	}
	
	function process_adduser()
	{
		$this->load->library('form_validation');

		//validate input
		$this->form_validation->set_rules('staffName','Staff Name', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('staffEmail','Staff Email', 'email');
		$this->form_validation->set_rules('password','Password', 'trim|required');

		$data = array(
                'staffName' => $this->input->post('staffName'),
                'staffEmail' => $this->input->post('staffEmail'),
                'password' => $this->input->post('password'),
       	);

       	$this->users_model->add_user($data);
       	redirect('users');  //send the user back to the league listing
	}
	
}





