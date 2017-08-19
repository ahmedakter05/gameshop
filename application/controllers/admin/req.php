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
		
		$crud->set_table('categories');
		$crud->columns('cid','cname','parentid','cinfo', 'imageurl1');
		$crud->set_relation('parentid','categories','cname');
		$crud->display_as('cid','ID')->display_as('cname','Category Name')->display_as('parentid','Parent Category')
			 ->display_as('cinfo','Category Info')->display_as('imageurl1','Banner (960*270)')->display_as('curl','Url');
		$crud->callback_before_insert(array($this,'callback_cat_ui'));
		$crud->callback_before_update(array($this,'callback_cat_ui'));
		$crud->set_field_upload('imageurl1','assets/uploads/files'); 
		$crud->field_type('root','dropdown', array('0' => 'None', '1' => 'Category', '2' => 'Industry', '3' => 'Technology'));
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}


	public function tags()
	{
		$page = 'Tags';
		$this->set_activepage($page);
		$this->data['title'] = "TechFocus Ltd - Focusing on Technology" ;
		//$this->data['activepage'] = "Tags" ;

		if (!$this->ion_auth->is_admin())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('admin/cp/login', 'refresh');
			//echo "Redirect to Login";
		}

		$crud = new grocery_CRUD();
		$crud->unset_jquery();
		$crud->set_table('tags');
		$crud->columns('tagsid','tagsname','tagstitle','menu', 'banner');
		$crud->display_as('tagsid','ID')->display_as('tagsname','Url Name')->display_as('tagstitle','Title')->display_as('banner','Banner (960*270)');
		$crud->set_field_upload('banner','assets/uploads/files'); 
		$crud->field_type('menu','dropdown', array('0' => 'No', '1' => 'Yes'));
		$crud->field_type('frequency','hidden');
		$crud->callback_before_insert(array($this,'callback_tag_ui'));
		$crud->callback_before_update(array($this,'callback_tag_ui'));
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	public function products_backup()
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
		$crud->set_table('products_main');
		$crud->columns('id','name','details', 'featured', 'imageurl1');
		//$crud->fields('name', 'details', 'keyfeatures', 'description', 'specification', 'featured', 'imageurl1', 'imageurl2', 'imageurl3', 'imageurl4', 'categoryid', 'tags', 'code', 'updatetime');
		//$crud->edit_fields('name','details','description', 'keyfeatures', 'specification', 'featured', 'imageurl1', 'imageurl2', 'imageurl3', 'imageurl4');
		//$crud->add_fields('name','details','description', 'updatetime');
		$crud->set_relation('categoryid','categories','cname');
		$crud->field_type('featured','dropdown', array('1' => 'Yes', '0' => 'No'));
		$crud->field_type('updatetime','invisible');
		$crud->display_as('cid','ID')->display_as('cname','Category Name')->display_as('parentid','Parent Category')
			 ->display_as('cinfo','Category Info')->display_as('imageurl1','Image')->display_as('categoryid','Category');
		$crud->set_field_upload('imageurl1','assets/uploads/files'); 
		$crud->set_field_upload('imageurl2','assets/uploads/files'); 
		$crud->set_field_upload('imageurl3','assets/uploads/files'); 
		$crud->set_field_upload('imageurl4','assets/uploads/files'); 
		$crud->callback_before_update(array($this,'callback_Product_update'));
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
		$crud->set_table('products_main');
		$crud->set_relation_n_n('products_main', 'tags_relation', 'tags', 'id', 'tagsid', 'tagstitle');
		$crud->set_relation('categoryid','categories','cname');
		$crud->columns('id','name', 'categoryid', 'details', 'featured', 'imageurl1');
		//$crud->fields('name', 'details', 'keyfeatures', 'description', 'specification', 'featured', 'imageurl1', 'imageurl2', 'imageurl3', 'imageurl4', 'categoryid', 'tags', 'code', 'updatetime');
		//$crud->edit_fields('name','details','description', 'keyfeatures', 'specification', 'featured', 'imageurl1', 'imageurl2', 'imageurl3', 'imageurl4');
		//$crud->add_fields('name','details','description', 'updatetime');
		//$crud->set_relation('categoryid','categories','cname');
		$crud->field_type('featured','dropdown', array('1' => 'Yes', '0' => 'No'));
		$crud->field_type('updatetime','invisible');
		$crud->display_as('cid','ID')->display_as('cname','Category Name')->display_as('parentid','Parent Category')
			 ->display_as('cinfo','Category Info')->display_as('imageurl1','Image (480*320)')->display_as('imageurl2','Image 2 (480*320)')
			 ->display_as('imageurl3','Image 3 (480*320)')->display_as('imageurl4','Image 4 (480*320)')->display_as('categoryid','Category')
			 ->display_as('products_main','Menu Tags')->display_as('tags','Alt Tags');
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

	function testdd()
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

	    $this->load->library('grocery_CRUD');
	    $this->load->library('ajax_grocery_CRUD');

	//create ajax_grocery_CRUD instead of grocery_CRUD. This extends the functionality with the set_relation_dependency method keeping all original functionality as well
	    $crud = new ajax_grocery_CRUD();
	    $crud->unset_jquery();
	//this is the default grocery CRUD model declaration
	    $crud->set_table('test_address');
	    $crud->set_relation('ad_country_id','test_country','c_name');
	    $crud->set_relation('ad_state_id','test_state','s_name');

	//this is the specific line that specifies the relation.
	// 'ad_state_id' is the field (drop down) that depends on the field 'ad_country_id' (also drop down).
	// 's_country_id' is the foreign key field on the state table that specifies state's country
	    $crud->set_relation_dependency('ad_state_id','ad_country_id','s_country_id');

	    $this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
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
	  return $post_array;
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

	function callback_cat_ui($post_array)
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

	function generateRandomString($length = NULL) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
	}

}