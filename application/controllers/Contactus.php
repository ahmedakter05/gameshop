<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactus extends My_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination', 'googlemaps'));
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
		$page = 'Contact Us';
		$this->set_activepage($page);

		$config['center'] = '23.752729, 90.384846';
		$config['zoom'] = '16';
		$config['apiKey'] = ' AIzaSyAGe3eD13vk8VAJidCJb8BFFlRvccTgJ5M '; 

		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = '23.752729, 90.384846';
		$this->googlemaps->add_marker($marker);
		$this->data['map'] = $this->googlemaps->create_map();

		//$this->data['contacts'] = $this->tfl_model->get_contact_page();
		//var_dump($this->data['contacts']);

		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'contacts', $this->data);
	}
}