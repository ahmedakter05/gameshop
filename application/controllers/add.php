<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add extends My_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination', 'form_validation', 'MY_Session'));
		$this->load->helper(array());

		$this->lang->load('auth');
		
		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('aries_layout');
		$this->set_panel('aries_admin');
		$this->get_header_footer();
		$this->get_common_param();


		
	}

	public function index()
	{
		$page = 'Error';
		$this->set_activepage($page);
		$this->data['title'] = "TechFocus Ltd - Focusing on Technology" ;
		$this->data['activepage'] = "Error" ;


		//$this->data['contacts'] = $this->tfl_model->get_contact_page();
		//var_dump($this->data['contacts']);

		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'error_404', $this->data);
	}
	public function category($page = 'client_add'){

		$this->data['title'] = "TechFocus Ltd - Focusing on Technology" ;
		$this->data['activepage'] = "Clients Page" ;
		

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('admin/login', 'refresh');
		}

		//$tables = $this->config->item('tables','ion_auth');

		// validate form input
		$this->form_validation->set_rules('category_name', 'Category Name', 'required|trim|xss_clean');
		//$this->form_validation->set_rules('agent_name', $this->lang->line('client_agentname_label'), 'required|trim|xss_clean');
		//$this->form_validation->set_rules('email', $this->lang->line('client_email_label'), 'required|valid_email|trim|xss_clean');
		//$this->form_validation->set_rules('passportnoclient', $this->lang->line('client_passport_label'), 'required|trim|xss_clean|is_unique[clients.passportnoclient]');
		//$this->form_validation->set_rules('filenumber', $this->lang->line('client_filenumber_label'), 'required|trim|xss_clean|is_unique[clients.filenumber]');

		/*if ($this->form_validation->run() == true)
		{
			$agent_name = strtolower($this->input->post('agent_name'));
			$passportnoclient    = $this->input->post('passportnoclient');
			$filenumber = $this->input->post('filenumber');
			
			$additional_data = array(
				'firstname' => $this->input->post('first_name'),
				'lastname'  => $this->input->post('last_name'),
				'agentname'    => $this->input->post('agent_name'),
				'email'      => $this->input->post('email'),
				'refferenceid'      => $this->input->post('refferenceid'),
				'status'      => $this->input->post('status'),
				'comments'      => $this->input->post('comments')
			);
		}*/

		if ($this->form_validation->run() == true && $this->ion_auth->is_admin() /*&& $this->yapps_model->client_add($agent_name, $passportnoclient, $filenumber, $additional_data)*/)
		{
			$this->sms = $this->yapps_model->get_sms();
			var_dump($this->sms);
			$this->session->set_flashdata('message', $this->yapps_model->errors());


			

			redirect("apps/client/index", 'refresh');
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			//$this->data['message'] = $this->session->flashdata('message');//$this->yapps_model->errors();
			$this->data['message'] = validation_errors();//(validation_errors() ? validation_errors() : ($this->tfl_model->errors() ? $this->yapps_model->errors() : $this->session->flashdata('message')));

			
			$this->data['category_name'] = array(
				'name'  => 'category_namecategory_name',
				'id'    => 'category_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('category_name'),
			);
			$this->data['parent_name'] = array(
				'name'  => 'parent_name',
				'id'    => 'parent_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('parent_name'),
			);
			$this->data['category_info'] = array(
				'name'  => 'category_info',
				'id'    => 'category_info',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('category_info'),
			);
			$this->data['imgurl1'] = array(
				'name'  => 'imgurl1',
				'id'    => 'imgurl1',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('imgurl1'),
			);
			
			$this->load->view($this->template_dir.'category_add', $this->data);
		}

	}

}