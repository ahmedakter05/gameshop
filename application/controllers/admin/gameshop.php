<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gameshop extends My_Controller {

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
		//var_dump($this->session->all_userdata());
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

		redirect('admin/gameshop/slider', 'refresh');

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

	public function slider()
	{
		$page = 'Slider';
		$this->set_activepage($page);
		$this->data['title'] = "TechFocus Ltd - Focusing on Technology" ;
		$this->data['activepage'] = "Slider" ;

		if (!$this->ion_auth->is_admin())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('admin/cp/login', 'refresh');
			//echo "Redirect to Login";
		}


		$crud = new grocery_CRUD();
		$crud->unset_jquery();
		$crud->set_table('gameshop_slider');
		$crud->columns('id','name','title','position', 'imagebg');
		$crud->display_as('id','ID')->display_as('name','Name')->display_as('title','Title')
			 ->display_as('imagebg','Background Image (1920*960)');
		$crud->callback_before_insert(array($this,'callback_slider_ui'));
		$crud->callback_before_update(array($this,'callback_slider_ui'));
		$crud->set_field_upload('imagebg','assets/uploads/files'); 
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
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
		$crud->set_table('gameshop_categories');
		$crud->columns('cid','cname','parentid', 'curl', 'fontawesome');
		$crud->set_relation('parentid','gameshop_categories','cname');
		$crud->display_as('cid','ID')->display_as('cname','Category Name')->display_as('parentid','Parent Category')
			 ->display_as('cinfo','Category Info')->display_as('cimageurl1','Banner (960*270)')->display_as('curl','Url');
		$crud->add_fields('cname','curl','cinfo','parentid','cimageurl1','fontawesome');
		$crud->edit_fields('cname','curl','cinfo','parentid','cimageurl1','fontawesome');
		$crud->callback_before_insert(array($this,'callback_gcat_ui'));
		$crud->callback_before_update(array($this,'callback_gcat_ui'));
		$crud->set_field_upload('cimageurl1','assets/uploads/gameshop'); 
		//$crud->field_type('root','dropdown', array('0' => 'None', '1' => 'Category', '2' => 'Industry', '3' => 'Technology'));
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
		$crud->unset_jquery();
		$crud->set_table('gameshop_products');
		$crud->set_relation('categoryid','categories','cname');
		$crud->columns('id','name', 'categoryid', 'details', 'featured', 'imageurl1');
		$crud->fields('name', 'url','details','description','categoryid', 'price', 'discount', 'featured', 'imageurl1', 'imageurl2', 'imageurl3', 'imageurl4', 'discountprice');
		$crud->edit_fields('name', 'url','details','description','categoryid', 'price', 'discount', 'featured', 'imageurl1', 'imageurl2', 'imageurl3', 'imageurl4');
		$crud->add_fields('name', 'url','details','description','categoryid', 'price', 'discount', 'featured', 'imageurl1', 'imageurl2', 'imageurl3', 'imageurl4');
		//$crud->add_fields('name','details','description', 'updatetime');
		$crud->set_relation('categoryid','gameshop_categories','cname');
		$crud->field_type('featured','dropdown', array('1' => 'Yes', '0' => 'No'));
		$crud->field_type('updatetime','invisible');
		$crud->field_type('url','invisible');
		$crud->display_as('cid','ID')->display_as('cname','Category Name')->display_as('parentid','Parent Category')
			 ->display_as('cinfo','Category Info')->display_as('imageurl1','Image (1200*800)')->display_as('imageurl2','Image 2 (1200*800)')
			 ->display_as('imageurl3','Image 3 (1200*800)')->display_as('imageurl4','Image 4 (1200*800)')->display_as('categoryid','Category');
		$crud->set_field_upload('imageurl1','assets/uploads/files'); 
		$crud->set_field_upload('imageurl2','assets/uploads/files'); 
		$crud->set_field_upload('imageurl3','assets/uploads/files'); 
		$crud->set_field_upload('imageurl4','assets/uploads/files'); 
		$crud->callback_before_update(array($this,'callback_product_update'));
		$crud->callback_before_insert(array($this,'callback_product_update'));
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	public function featured_menu_item()
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
		$crud->set_table('gameshop_featured_menu');
		$crud->columns('id','name','position', 'image');
		//$crud->set_relation('parentid','gameshop_categories','cname');
		$crud->display_as('id','ID')->display_as('name','Name')->display_as('link','Destination URL')
			 ->display_as('image','Image (1200*800)')->display_as('position','Position');
		//$crud->edit_fields('cname','curl','cinfo','parentid','cimageurl1','fontawesome');
		//$crud->callback_before_insert(array($this,'callback_gcat_ui'));
		//$crud->callback_before_update(array($this,'callback_gcat_ui'));
		$crud->set_field_upload('image','assets/uploads/gameshop'); 
		//$crud->field_type('root','dropdown', array('0' => 'None', '1' => 'Category', '2' => 'Industry', '3' => 'Technology'));
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	public function pages()
	{
		$page = 'Pages';
		$this->set_activepage($page);
		$this->data['title'] = "TechFocus Ltd - Focusing on Technology";
		$this->data['activepage'] = "Categories";

		if (!$this->ion_auth->is_admin())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('admin/cp/login', 'refresh');
			//echo "Redirect to Login";
		}

		$crud = new grocery_CRUD();
		$crud->unset_jquery();
		$crud->set_table('gameshop_pages');
		$crud->columns('id', 'name','details', 'updatetime');
		//$crud->set_relation('parentid','gameshop_categories','cname');
		$crud->display_as('id','ID')->display_as('name','Name')->display_as('url','Url')
			 ->display_as('details','Details')->display_as('updatetime','Update Time');
		//$crud->edit_fields('cname','curl','cinfo','parentid','cimageurl1','fontawesome');
		//$crud->callback_before_insert(array($this,'callback_gcat_ui'));
		//$crud->callback_before_update(array($this,'callback_gcat_ui'));
		//$crud->set_field_upload('image','assets/uploads/gameshop'); 
		//$crud->field_type('root','dropdown', array('0' => 'None', '1' => 'Category', '2' => 'Industry', '3' => 'Technology'));
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	public function dataoption()
	{
		$page = 'Site Data';
		$this->set_activepage($page);
		$this->data['title'] = "GamersBD";
		$this->data['activepage'] = "Categories";

		if (!$this->ion_auth->is_admin())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('admin/cp/login', 'refresh');
			//echo "Redirect to Login";
		}

		$crud = new grocery_CRUD();
		$crud->unset_jquery();
		$crud->set_table('gameshop_data');
		$crud->columns('id', 'name','value');
		//$crud->set_relation('parentid','gameshop_categories','cname');
		$crud->display_as('id','ID')->display_as('name','Name')->display_as('value','Value');
		//$crud->field_type('root','dropdown', array('0' => 'None', '1' => 'Category', '2' => 'Industry', '3' => 'Technology'));
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	public function free_offers()
	{
		$page = 'Pages';
		$this->set_activepage($page);
		$this->data['title'] = "TechFocus Ltd - Focusing on Technology";
		$this->data['activepage'] = "Categories";

		if (!$this->ion_auth->is_admin())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('admin/cp/login', 'refresh');
			//echo "Redirect to Login";
		}

		$crud = new grocery_CRUD();
		$crud->unset_jquery();
		$crud->set_table('gameshop_free_offers');
		$crud->columns('id', 'name','details', 'updatetime');
		//$crud->set_relation('parentid','gameshop_categories','cname');
		$crud->display_as('id','ID')->display_as('name','Name')->display_as('link','Link (without http://)')
			 ->display_as('details','Details')->display_as('updatetime','Update Time');
		//$crud->edit_fields('cname','curl','cinfo','parentid','cimageurl1','fontawesome');
		$crud->callback_before_insert(array($this,'callback_sf_free_offers'));
		$crud->callback_before_update(array($this,'callback_sf_free_offers'));
		$crud->set_field_upload('image','assets/uploads/files'); 
		//$crud->field_type('root','dropdown', array('0' => 'None', '1' => 'Category', '2' => 'Industry', '3' => 'Technology'));
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}
	
	private function orders_bck()
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
		$crud->unset_jquery();
		$crud->unset_add();
		$crud->unset_delete();
		//$crud->unset_edit();
		$crud->set_table('gameshop_user_products');
		$crud->columns('id','productid','orderdate', 'userid', 'paymentid', 'licenseid');
		//$crud->fields('name', 'details', 'keyfeatures', 'description', 'specification', 'featured', 'imageurl1', 'imageurl2', 'imageurl3', 'imageurl4', 'categoryid', 'tags', 'code', 'updatetime');
		//$crud->edit_fields('name','details','description', 'keyfeatures', 'specification', 'featured', 'imageurl1', 'imageurl2', 'imageurl3', 'imageurl4');
		//$crud->add_fields('name','details','description', 'updatetime');
		
		$crud->set_primary_key('paymentid','gameshop_payments');
		$crud->set_primary_key('licenseid','gameshop_licenses');
		$crud->set_relation('productid','gameshop_products','name');
		$crud->set_relation('userid','users','username');
		$crud->set_relation('licenseid','gameshop_licenses','licensestatus');
		$crud->set_relation('paymentid','gameshop_payments','paymentstatus');
		$crud->field_type('paymentstatus','dropdown', array('0' => 'Pending', '1' => 'Processing', '2' => 'Completed'));
		$crud->field_type('licensestatus','dropdown', array('0' => 'Deactive', '1' => 'Active'));
		//$crud->field_type('featured','dropdown', array('1' => 'Yes', '0' => 'No'));
		//$crud->field_type('updatetime','invisible');
		//$crud->display_as('cid','ID')->display_as('cname','Category Name')->display_as('parentid','Parent Category')
		//	 ->display_as('cinfo','Category Info')->display_as('imageurl1','Image')->display_as('categoryid','Category');
		//$crud->set_field_upload('imageurl1','assets/uploads/files'); 
		//$crud->set_field_upload('imageurl2','assets/uploads/files'); 
		//$crud->callback_before_update(array($this,'callback_Product_update'));
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	public function orders()
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
		$crud->unset_jquery();
		$crud->unset_add();
		$crud->unset_delete();
		//$crud->unset_edit();
		$crud->set_table('gameshop_purchase_orders');
		$crud->columns('id','orderno','status', 'ordertime', 'userid');
		//$crud->fields('name', 'details', 'keyfeatures', 'description', 'specification', 'featured', 'imageurl1', 'imageurl2', 'imageurl3', 'imageurl4', 'categoryid', 'tags', 'code', 'updatetime');
		//$crud->edit_fields('name','details','description', 'keyfeatures', 'specification', 'featured', 'imageurl1', 'imageurl2', 'imageurl3', 'imageurl4');
		//$crud->add_fields('name','details','description', 'updatetime');
		
		//$crud->set_primary_key('paymentid','gameshop_payments');
		//$crud->set_primary_key('licenseid','gameshop_licenses');
		$crud->set_relation('status','gameshop_purchase_order_statuslist','name');
		$crud->set_relation('userid','users','email');
		//$crud->set_relation('licenseid','gameshop_licenses','licensestatus');
		//$crud->set_relation('paymentid','gameshop_payments','paymentstatus');
		//$crud->field_type('paymentstatus','dropdown', array('0' => 'Pending', '1' => 'Processing', '2' => 'Completed'));
		//$crud->field_type('licensestatus','dropdown', array('0' => 'Deactive', '1' => 'Active'));
		//$crud->field_type('featured','dropdown', array('1' => 'Yes', '0' => 'No'));
		//$crud->field_type('updatetime','invisible');
		//$crud->display_as('cid','ID')->display_as('cname','Category Name')->display_as('parentid','Parent Category')
		//	 ->display_as('cinfo','Category Info')->display_as('imageurl1','Image')->display_as('categoryid','Category');
		//$crud->set_field_upload('imageurl1','assets/uploads/files'); 
		//$crud->set_field_upload('imageurl2','assets/uploads/files'); 
		//$crud->callback_before_update(array($this,'callback_Product_update'));
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	private function payments_bck()
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
		$crud->unset_jquery();
		$crud->unset_add();
		$crud->unset_delete();
		$crud->set_table('gameshop_payments');
		$crud->set_relation('productid','gameshop_products','name');
		$crud->set_relation('userid','users','username');
		$crud->columns('id', 'productid', 'userid', 'paymentstatus');
		$crud->edit_fields('productid', 'userid', 'amount', 'mobileno', 'referenceno', 'paymentdate', 'paymentdetails', 'paymentstatus');
		$crud->field_type('paymentstatus','dropdown', array('0' => 'Pending', '1' => 'Processing', '2' => 'Completed'));
		$crud->field_type('paymentmode','dropdown', array('0' => 'Bkash', '1' => 'DBBL Rocket', '2' => 'Bank Transfer', '3' => 'Others'));
		$crud->field_type('paymentid','invisible');
		$crud->change_field_type('userid', 'readonly')->change_field_type('amount', 'readonly')->change_field_type('productid', 'readonly')
		->change_field_type('mobileno', 'readonly')->change_field_type('referenceno', 'readonly')->change_field_type('paymentdate', 'readonly')
		->change_field_type('paymentdetails', 'readonly');
		$crud->change_field_type('paymentmode', 'readonly');
		$crud->field_type('paymentid','invisible');
		
		//$crud->columns('id','name', 'categoryid', 'details', 'featured', 'imageurl1');
		//$crud->fields('name', 'details', 'keyfeatures', 'description', 'specification', 'featured', 'imageurl1', 'imageurl2', 'imageurl3', 'imageurl4', 'categoryid', 'tags', 'code', 'updatetime');
		//$crud->edit_fields('name','details','description', 'keyfeatures', 'specification', 'featured', 'imageurl1', 'imageurl2', 'imageurl3', 'imageurl4');
		//$crud->add_fields('name','details','description', 'updatetime');
		//$crud->set_relation('categoryid','categories','cname');
		//$crud->field_type('featured','dropdown', array('1' => 'Yes', '0' => 'No'));
		//$crud->field_type('updatetime','invisible');
		/*$crud->display_as('cid','ID')->display_as('cname','Category Name')->display_as('parentid','Parent Category')
			 ->display_as('cinfo','Category Info')->display_as('imageurl1','Image (480*320)')->display_as('imageurl2','Image 2 (480*320)')
			 ->display_as('imageurl3','Image 3 (480*320)')->display_as('imageurl4','Image 4 (480*320)')->display_as('categoryid','Category')
			 ->display_as('products_main','Menu Tags')->display_as('tags','Alt Tags');
		$crud->set_field_upload('imageurl1','assets/uploads/files'); 
		$crud->set_field_upload('imageurl2','assets/uploads/files'); 
		$crud->set_field_upload('imageurl3','assets/uploads/files'); 
		$crud->set_field_upload('imageurl4','assets/uploads/files'); 
		$crud->callback_before_update(array($this,'callback_product_update'));
		$crud->callback_before_insert(array($this,'callback_product_update'));*/
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	public function payments()
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
		$crud->unset_jquery();
		$crud->unset_add();
		$crud->unset_delete();
		$crud->set_table('gameshop_payments_2');
		$crud->set_relation('paymode','gameshop_payments_2_paymode','paymodename');
		//$crud->set_relation('userid','users','username');
		//$crud->columns('id', 'productid', 'userid', 'paymentstatus');
		//$crud->edit_fields('productid', 'userid', 'amount', 'mobileno', 'referenceno', 'paymentdate', 'paymentdetails', 'paymentstatus');
		//$crud->field_type('paymentstatus','dropdown', array('0' => 'Pending', '1' => 'Processing', '2' => 'Completed'));
		//$crud->field_type('paymentmode','dropdown', array('0' => 'Bkash', '1' => 'DBBL Rocket', '2' => 'Bank Transfer', '3' => 'Others'));
		//$crud->field_type('paymentid','invisible');
		//$crud->change_field_type('userid', 'readonly')->change_field_type('amount', 'readonly')->change_field_type('productid', 'readonly')
		//->change_field_type('mobileno', 'readonly')->change_field_type('referenceno', 'readonly')->change_field_type('paymentdate', 'readonly')
		//->change_field_type('paymentdetails', 'readonly');
		//$crud->change_field_type('paymentmode', 'readonly');
		//$crud->field_type('paymentid','invisible');
		
		//$crud->columns('id','name', 'categoryid', 'details', 'featured', 'imageurl1');
		//$crud->fields('name', 'details', 'keyfeatures', 'description', 'specification', 'featured', 'imageurl1', 'imageurl2', 'imageurl3', 'imageurl4', 'categoryid', 'tags', 'code', 'updatetime');
		//$crud->edit_fields('name','details','description', 'keyfeatures', 'specification', 'featured', 'imageurl1', 'imageurl2', 'imageurl3', 'imageurl4');
		//$crud->add_fields('name','details','description', 'updatetime');
		//$crud->set_relation('categoryid','categories','cname');
		//$crud->field_type('featured','dropdown', array('1' => 'Yes', '0' => 'No'));
		//$crud->field_type('updatetime','invisible');
		/*$crud->display_as('cid','ID')->display_as('cname','Category Name')->display_as('parentid','Parent Category')
			 ->display_as('cinfo','Category Info')->display_as('imageurl1','Image (480*320)')->display_as('imageurl2','Image 2 (480*320)')
			 ->display_as('imageurl3','Image 3 (480*320)')->display_as('imageurl4','Image 4 (480*320)')->display_as('categoryid','Category')
			 ->display_as('products_main','Menu Tags')->display_as('tags','Alt Tags');
		$crud->set_field_upload('imageurl1','assets/uploads/files'); 
		$crud->set_field_upload('imageurl2','assets/uploads/files'); 
		$crud->set_field_upload('imageurl3','assets/uploads/files'); 
		$crud->set_field_upload('imageurl4','assets/uploads/files'); 
		$crud->callback_before_update(array($this,'callback_product_update'));
		$crud->callback_before_insert(array($this,'callback_product_update'));*/
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	function callback_tag_ui($post_array)
	{
	  if(empty($post_array['menu'])){
	  	$post_array['menu'] = '0';
	  }
	  if(empty($post_array['frequency'])){
	  	$post_array['frequency'] = '0';
	  }
	  if(empty($post_array['tagsname'])){
	  	//$rstring = $this->generateRandomString('10');
		$rstring = $this->aa_lib->nametourl($post_array['tagstitle']);
	  	$post_array['tagsname'] = $rstring;
	  }
	  return $post_array;
	}

	function generateRandomString($length = NULL) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
	}

	//gameshop

	function callback_slider_ui($post_array)
	{
	  $post_array['updatedate'] = date('Y-m-d H:i:s');
	  return $post_array;
	}

	function callback_sf_free_offers($post_array)
	{
	  $post_array['link'] = urlencode($post_array['link']);
	  return $post_array;
	}

	function callback_gcat_ui($post_array)
	{
	  if(empty($post_array['parentid'])){
	  	$post_array['parentid'] = '0';
	  }
	  if(empty($post_array['curl'])){
	  	//$rstring = $this->generateRandomString('10');
		$rstring = $this->aa_lib->nametourl($post_array['cname']);
	  	$post_array['curl'] = $rstring;
	  }
	  return $post_array;
	}

	function callback_product_update($post_array)
	{
	  $post_array['updatetime'] = date('Y-m-d H:i:s');
	  if(empty($post_array['featured'])){
	  	$post_array['featured'] = '0';
	  }
	  if(empty($post_array['url'])){
	  	//$rstring = $this->generateRandomString('10');
		$rstring = $this->aa_lib->nametourl($post_array['name']);
	  	$post_array['url'] = $rstring;
	  }
	  $post_array['discountprice'] = ($post_array['price'] - (($post_array['discount'] / '100') * $post_array['price']));
	  return $post_array;
	}

	//////////////////////// Help ////////////////////////

	/*
	$crud->unset_texteditor(array('description','full_text'));
	
	[	$crud->callback_before_insert(array($this,'trimp'));
		$crud->callback_before_update(array($this,'trimp'));	 
	public function trimp($row) {
		$row['field_one'] = ltrim(rtrim($row['field_one'],"</p>"),"<p>");
		$row['field_two'] = ltrim(rtrim(trim($row['field_two']),"</p>"),"<p>");
		return $row;
	]
	*/
}