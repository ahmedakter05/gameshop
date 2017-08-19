<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Req extends My_Controller {

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
		/*
		$crud = new grocery_CRUD();
		//$crud->set_theme('metro_blue');
		$crud->set_table('products_main');
		$crud->columns('id','name','details','description', 'keyfeatures', 'specification', 'featured', 'imageurl1', 'imageurl2', 'imageurl3', 'imageurl4');
		$crud->edit_fields('id','name','details','description', 'keyfeatures', 'specification', 'featured', 'imageurl1', 'imageurl2', 'imageurl3', 'imageurl4');
		$crud->set_relation('categoryid','categories','cname');
		$crud->field_type('featured','dropdown', array('1' => 'Yes', '0' => 'No'));
		//$crud->display_as('cid','ID')->display_as('cname','Category Name')->display_as('parentid','Parent Category')
			 //->display_as('cinfo','Category Info')->display_as('imageurl1','Image')->display_as('imageurl2','Image')->display_as('imageurl3','Image');
		$crud->set_field_upload('imageurl1','assets/uploads/files'); 
		$crud->set_field_upload('imageurl2','assets/uploads/files'); 
		$crud->set_field_upload('imageurl3','assets/uploads/files'); 
		$crud->set_field_upload('imageurl4','assets/uploads/files'); 
		
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
		*/
	}

	public function category()
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
		//$crud->set_theme('metro_blue');
		$crud->set_table('categories');
		$crud->columns('cid','cname','parentid','cinfo', 'imageurl1');
		$crud->set_relation('parentid','categories','cname');
		$crud->display_as('cid','ID')->display_as('cname','Category Name')->display_as('parentid','Parent Category')
			 ->display_as('cinfo','Category Info')->display_as('imageurl1','Image')->display_as('imageurl2','Image')->display_as('imageurl3','Image');
		$crud->set_field_upload('imageurl1','assets/uploads/files'); 
		$crud->set_field_upload('imageurl2','assets/uploads/files'); 
		$crud->set_field_upload('imageurl3','assets/uploads/files'); 
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	public function products()
	{
		$page = 'Products';
		$this->set_activepage($page);
		$this->data['title'] = "TechFocus Ltd - Focusing on Technology" ;
		$this->data['activepage'] = "Products" ;

		if (!$this->ion_auth->is_admin())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('admin/cp/login', 'refresh');
			//echo "Redirect to Login";
		}

		$crud = new grocery_CRUD();
		//$crud->set_theme('metro_blue');
		$crud->set_table('products_main');
		$crud->columns('id','name','details', 'featured', 'imageurl1');
		//$crud->edit_fields('name','details','description', 'keyfeatures', 'specification', 'featured', 'imageurl1', 'imageurl2', 'imageurl3', 'imageurl4');
		//$crud->add_fields('name','details','description', 'updatetime');

		$crud->set_relation('categoryid','categories','cname');
		$crud->field_type('featured','dropdown', array('1' => 'Yes', '0' => 'No'));
		$crud->display_as('cid','ID')->display_as('cname','Category Name')->display_as('parentid','Parent Category')
			 ->display_as('cinfo','Category Info')->display_as('imageurl1','Image');
		$crud->set_field_upload('imageurl1','assets/uploads/files'); 
		$crud->set_field_upload('imageurl2','assets/uploads/files'); 
		$crud->set_field_upload('imageurl3','assets/uploads/files'); 
		$crud->set_field_upload('imageurl4','assets/uploads/files'); 
		
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}
	
	
	

}