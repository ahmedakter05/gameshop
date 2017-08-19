<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends My_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination', 'MY_Session'));
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
}