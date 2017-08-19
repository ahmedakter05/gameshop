<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Query extends My_Controller {

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

		redirect('admin/cp/index', 'refresh');
		
	}

	public function socialshare()
	{
		$page = 'Social Account Settings';
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
		$crud->set_table('footer_social_share');
		$crud->columns('id','title','href');
		$crud->display_as('id','ID')->display_as('title','Title')->display_as('href','Link');
		$crud->field_type('class_ref','dropdown', array('fa fa-dribbble' => 'Dribble', 'fa fa-twitter' => 'Twitter' , 'fa fa-facebook' => 'Facebook', 'fa fa-google-plus' => 'Google +' , 'fa fa-linkedin' => 'Linkedin'));
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	public function header()
	{
		$page = 'Header Setting';
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
		$crud->set_table('header');
		$crud->columns('id','name', 'content','imagelink');
		$state_code = $crud->getState();
        if($state_code == 'edit') 
        {
            $crud->field_type('name', 'readonly');
        }
		$crud->display_as('id','ID')->display_as('name','Name')->display_as('content','Content')->display_as('imagelink','Image & Icon');
		$crud->set_field_upload('imagelink','assets/uploads/files'); 
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	public function footer()
	{
		$page = 'Footer Setting';
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
		$crud->set_table('footer');
		$crud->columns('id','name','content1', 'content2', 'link', 'imagelink');
		$crud->display_as('id','ID')->display_as('name','Name')->display_as('content1','Content 1')->display_as('content2', 'Content 2')->display_as('link', 'Link')->display_as('imagelink', 'Image');
		$crud->set_field_upload('imagelink','assets/uploads/files'); 
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}
	public function services()
	{
		$page = 'Service Page';
		$this->set_activepage($page);
		$this->data['title'] = "TechFocus Ltd - Focusing on Technology" ;
		$this->data['activepage'] = "Services" ;

		if (!$this->ion_auth->is_admin())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('admin/cp/login', 'refresh');
			//echo "Redirect to Login";
		}

		$crud = new grocery_CRUD();
		$crud->unset_jquery();
		$crud->unset_delete();
		$crud->set_table('services_page');
		$crud->field_type('cid','dropdown', array('0' => 'Parent', '1' => 'Solution', '2' => 'Installation' , '3' => 'Maintenance'));
		$crud->columns('id','title','description', 'imagelink', 'cid');
		$crud->display_as('id','ID')->display_as('title','Title')->display_as('description','Description')->display_as('imagelink', 'Image')->display_as('cid', 'Parent');
		$crud->set_field_upload('imagelink','assets/uploads/files'); 
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	public function serothers()
	{
		$page = 'Services';
		$this->set_activepage($page);
		$this->data['title'] = "TechFocus Ltd - Focusing on Technology" ;
		$this->data['activepage'] = "Services" ;

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
		$crud->set_table('services_others');
		$crud->columns('id','name','title','description', 'imagelink');
		$crud->display_as('id','ID')->display_as('name','Name')->display_as('title','Title')->display_as('description','Description')->display_as('imagelink', 'Image');
		$crud->set_field_upload('imagelink1','assets/uploads/files'); 
		$crud->set_field_upload('imagelink2','assets/uploads/files'); 
		$crud->set_field_upload('imagelink3','assets/uploads/files'); 
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	public function blogs()
	{
		$page = 'Technology';
		$this->set_activepage($page);
		$this->data['title'] = "TechFocus Ltd - Focusing on Technology" ;

		if (!$this->ion_auth->is_admin())
		{
			// redirect them to the login page
			$this->session->set_userdata('last_page', current_url()); redirect('admin/cp/login', 'refresh');
			//echo "Redirect to Login";
		}

		$crud = new grocery_CRUD();
		$crud->unset_jquery();
		$crud->unset_delete();
		$crud->set_table('blog_page');
		$crud->field_type('topmenu','dropdown', array('0' => 'No', '1' => 'Yes'));
		$crud->set_relation('tagsname','tags','tagstitle');
		$crud->columns('id','full_name','tagsname', 'topmenu', 'imagelink');
		$crud->display_as('id','ID')->display_as('full_name','Title')->display_as('tagsname','Technology')->display_as('imagelink', 'Image')->display_as('topmenu', 'Menu Item');
		$crud->set_field_upload('imagelink','assets/uploads/files'); 
		$crud->set_primary_key('tagsname','tags');
		$crud->callback_before_insert(array($this,'callback_blogs_ui'));
		$crud->callback_before_update(array($this,'callback_blogs_ui'));
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	public function contactus()
	{
		$page = 'Contact Us';
		$this->set_activepage($page);
		$this->data['title'] = "TechFocus Ltd - Focusing on Technology" ;
		$this->data['activepage'] = $page ;

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
		$crud->set_table('contactpage_info');
		$crud->columns('id','name','description');
		$crud->fields('id', 'name', 'description');
		$crud->display_as('id','ID')->display_as('name','Name')->display_as('description','Description');
		$this->data['crud'] = $crud->render();


		 
		//$this->_example_output($output);

		//$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'crud_view', $this->data);
	}

	function callback_blogs_ui($post_array)
	{
	  if(empty($post_array['topmenu'])){
	  	$post_array['topmenu'] = '0';
	  }
	  if(empty($post_array['url'])){
	  	//$rstring = $this->generateRandomString('10');
		$rstring = $this->aa_lib->nametourl($post_array['full_name']);
	  	$post_array['url'] = $rstring;
	  }
	  if(is_numeric($post_array['tagsname'])){
	  	//$rstring = $this->generateRandomString('10');
	  	//$post_array['tagsname'] = "AA";
	  	//$string = $this->tfl_model->get_tags_name_admin($post_array['tagsname']);
	  	//$post_array['tagsname'] = $string['tagsname'];
	  }
	  return $post_array;
	}


}