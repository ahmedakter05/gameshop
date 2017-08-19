<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends My_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination'));
		$this->load->helper(array());

		//$this->lang->load('clients');
		
		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('oliver_layout');
		$this->get_header_footer();
		$this->get_common_param();

		
	}

	public function index()
	{
		$page = 'Error';
		$this->set_activepage($page);

		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'error_404', $this->data);
	}
}
