<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edutech extends My_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination', 'form_validation', 'grocery_CRUD'));
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

	public function _example_output($output = null)
	{
		$this->load->view('example.php',$output);
	}

	public function index()
	{
		$page = 'Products';
		$this->set_activepage($page);
		$this->data['title'] = "TechFocus Ltd - Focusing on Technology" ;
		$this->data['activepage'] = "Products" ;

		redirect('admin/req/category', 'refresh');

		if (!$this->ion_auth->is_admin())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('admin/cp/login', 'refresh');
			//echo "Redirect to Login";
		}
		
	}

	public function category()
	{
		$page = 'Categories';
		$this->set_activepage($page);
		$this->data['title'] = "TechFocus Ltd - Focusing on Technology" ;
		$this->data['activepage'] = $page;

		if (!$this->ion_auth->is_admin())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('admin/cp/login', 'refresh');
			//echo "Redirect to Login";
		}

		$crud = new grocery_CRUD();
		$crud->unset_jquery();
		$crud->set_table('edutech_categories');
		$crud->columns('eid','ename', 'imagelink');
		$crud->set_field_upload('imagelink','assets/uploads/edutech'); 
		$crud->display_as('eid','ID')->display_as('ename','Category Name');
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	public function videos()
	{
		$page = 'Videos';
		$this->set_activepage($page);
		$this->data['title'] = "TechFocus Ltd - Focusing on Technology" ;
		$this->data['activepage'] = $page;

		if (!$this->ion_auth->is_admin())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('admin/cp/login', 'refresh');
			//echo "Redirect to Login";
		}

		$crud = new grocery_CRUD();
		$crud->unset_jquery();
		$crud->set_table('edutech_videos');
		$crud->columns('id','name', 'categoryid', 'featured', 'thumblink');
		$crud->set_relation('categoryid','edutech_categories','ename');
		$crud->display_as('id','ID')->display_as('ename','Category Name')->display_as('name','Name')->display_as('thumblink','Thumbnail')->display_as('videolink','Video');
		$crud->set_field_upload('thumblink','assets/uploads/edutech'); 
		$crud->field_type('featured','dropdown', array('0' => 'No', '1' => 'Yes'));
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}
	
	public function slider()
	{
		$page = 'Slider Settings';
		$this->set_activepage($page);
		$this->data['title'] = "TechFocus Ltd - Focusing on Technology" ;
		$this->data['activepage'] = $page;

		if (!$this->ion_auth->is_admin())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('admin/cp/login', 'refresh');
			//echo "Redirect to Login";
		}

		$crud = new grocery_CRUD();
		$crud->unset_jquery();
		$crud->set_table('edutech_slider');
		$crud->columns('id','title','imagelink_lg', 'position');
		$crud->display_as('id','ID')->display_as('imagelink_lg','Banner')->display_as('title','Title');
		$crud->set_field_upload('imagelink_lg','assets/uploads/edutech'); 
		$crud->set_field_upload('imagelink_sm_1','assets/uploads/edutech'); 
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	public function header()
	{
		$page = 'Header Settings';
		$this->set_activepage($page);
		$this->data['title'] = "TechFocus Ltd - Focusing on Technology" ;
		$this->data['activepage'] = $page;

		if (!$this->ion_auth->is_admin())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('admin/cp/login', 'refresh');
			//echo "Redirect to Login";
		}

		$crud = new grocery_CRUD();
		$crud->unset_jquery();
		$crud->unset_add();
		$crud->unset_delete();
		$crud->set_table('edutech_header');
		$crud->columns('id','name', 'content','imagelink');
		$crud->display_as('id','ID')->display_as('name','Name')->display_as('content','Content')->display_as('imagelink','Image & Icon');
		$crud->set_field_upload('imagelink','assets/uploads/edutech'); 
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}
	

}