<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontpage extends My_Controller {

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
		$crud->set_table('frontpage_slider');
		$crud->columns('id','name', 'position', 'imagelink_lg');
		$crud->display_as('id','ID')->display_as('imagelink_lg','Banner (1620*530)')->display_as('name','Name');
		$crud->field_type('updatedate','invisible');
		$crud->set_field_upload('imagelink_lg','assets/uploads/slider'); 
		$crud->set_field_upload('imagelink_sm_1','assets/uploads/slider'); 
		$crud->set_field_upload('imagelink_sm_2','assets/uploads/slider'); 
		$crud->callback_before_update(array($this,'callback_slider_update'));
		$crud->callback_before_insert(array($this,'callback_slider_update'));
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	public function clienticon()
	{
		$page = 'Clients Icon';
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
		$crud->set_table('frontpage_clienticon');
		$crud->columns('id','name','iconlink');
		$crud->display_as('id','ID')->display_as('name','Name')->display_as('iconlink','Icon');
		$crud->set_field_upload('iconlink','assets/uploads/icon'); 
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	public function whyus()
	{
		$page = 'Why Techfocus';
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
		$crud->set_table('frontpage_whyus');
		$crud->columns('id','title','details');
		$crud->display_as('id','ID')->display_as('title','Title')->display_as('details','Info')->display_as('iconlink','Icon');
		$crud->set_field_upload('iconlink','assets/uploads/icon'); 
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	public function whatwedo()
	{
		$page = 'What we do';
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
		$crud->set_table('frontpage_whatwedo');
		$crud->columns('id','title','description', 'position');
		$crud->display_as('id','ID')->display_as('title','Title')->display_as('description','Description')->display_as('position','Position');
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	public function whoweare()
	{
		$page = 'Categories';
		$this->set_activepage($page);
		$this->data['title'] = "TechFocus Ltd - Focusing on Technology" ;
		$this->data['activepage'] = "Categories" ;

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
		$crud->set_table('frontpage_whoweare');
		$crud->columns('id','name','details', 'specialtext', 'imagelink');
		$crud->display_as('id','ID')->display_as('name','Name')->display_as('details','Description')->display_as('specialtext','Quoted Text')->display_as('imagelink','Image');
		$crud->set_field_upload('imagelink','assets/uploads/files'); 
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	function callback_slider_update($post_array)
	{
	  $post_array['updatedate'] = date('Y-m-d H:i:s');
	  return $post_array;
	}
}