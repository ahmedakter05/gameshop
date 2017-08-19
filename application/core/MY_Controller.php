<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class MY_Controller extends CI_Controller
{	

	public $template_dir = 'oliver/';

	public $data = array();
	public $group = 'members';
	public $adminemail = 'ahmed.akter@ngenitltd.com';

	//public $data['bc']=array();

	function __construct()
    {
        parent::__construct();
        
		$this->load->library(array('aa_lib', 'session', 'ion_auth', 'MY_Session', 'user_agent', 'email', 'Jm_notifications', 'Jm_example'));
		$this->load->helper(array('cookie', 'url', 'language', 'date'));
		$this->load->database();
		//$this->lang->load('aa');
		$this->load->model('tfl_model');

		$this->_loaddata();
    }
	
	function _loaddata()
	{
		$this->data['side_nav'] = array(
			'About Us' => base_url().'about',
			'Contact Us' => base_url().'contact', 
			);
		
		if ($this->ion_auth->logged_in())
		{
			$this->data['userdata']['uid'] = $this->session->userdata('user_id'); 
			$this->data['userdata']['username'] = $this->session->userdata('username'); 
			$this->data['userdata']['email'] = $this->session->userdata('email'); 
			$this->data['userdata']['first_name'] = $this->session->userdata('first_name'); 
			$this->data['userdata']['last_name'] = $this->session->userdata('last_name'); 
			$this->data['userdata']['phone'] = $this->session->userdata('phone'); 
			$this->data['userdata']['company'] = $this->session->userdata('company'); 
		}

		//var_dump($this->data['userdata']);
	}

	function unset_template()
	{

		$this->output->unset_template('oliver');
					
	}
	function set_panel($pname)
	{
		$this->template_dir = $pname . '/';	
	}
	function get_header_footer()
	{		
		$this->data['metainfo'] = $this->tfl_model->header_query();
		//var_dump($this->data['metainfo'] );
		$this->data['socialshare'] = $this->tfl_model->footer_socialshare();
		$this->data['footerinfo'] = $this->tfl_model->footer_query();		
		$this->data['contacts'] = $this->tfl_model->get_contact_page();					
	}

	function get_common_param()
	{

		/*$this->data['products_category'] = $this->tfl_model->get_products_category();
		$this->data['products_industry'] = $this->tfl_model->get_products_industry();
		$this->data['products_technology'] = $this->tfl_model->get_products_technology(); */
		
		$this->data['products_category'] = $this->tfl_model->getCategoryTreeForParentId(0);
		$this->data['products_industry'] = $this->tfl_model->products_menu_industry();
		$this->data['products_technology'] = array();//$this->tfl_model->products_menu_technology();	
		$this->data['featured_products'] = $this->tfl_model->products_view_featured();	
		$this->data['recent_products'] = $this->tfl_model->products_view_recent();
		$this->data['blog_menu_item'] = $this->tfl_model->get_common_blog_tittle();	
			
	}
	
	function get_service_param()
	{
		$this->data['serviceothers'] = $this->tfl_model->get_service_others();
		//var_dump($this->data['serviceothers']);			
	}

	function get_blogs_param()
	{
		//$this->data['blog_side_menu'] = $this->tfl_model->get_common_blog_tittle();	
		//var_dump($this->data['blog_side_menu']);			
	}
	
	
	function set_activepage($page=NULL)
	{

		$this->data['activepage'] = $page;
					
	}

	function get_edutech_common_param()
	{		
		$this->data['metainfo'] = $this->tfl_model->edutech_header_query();
					
	}

	function get_gameshop_common_param()
	{		
		$this->data['gameshop_products_menu'] = $this->tfl_model->getmenuwithparent(0);
		$this->data['gameshop_products_menu_games'] = $this->tfl_model->getmenuwithparent(1);
		$this->data['gameshop_products_menu_cards'] = $this->tfl_model->getmenuwithparent(14);
		$this->data['gameshop_products_menu_accessories'] = $this->tfl_model->getmenuwithparent(4);
		$this->data['gameshop_products_menu_toys'] = $this->tfl_model->getmenuwithparent(3);
		$this->data['random'] = array('label-success', 'label-warning', 'label-primary', 'label-danger');	
		$this->data['gameshop_menu_latest_games'] = $this->tfl_model->gameshop_featured_products(1);
		$this->data['gameshop_menu_cart'] = $this->tfl_model->gameshop_get_menu_cart();
		$this->data['gameshop_get_profile'] = $this->tfl_model->gameshop_get_profile_data();
		$this->data['gameshop_menu_featured_items'] = $this->tfl_model->gameshop_get_featured_menu();
		//var_dump($this->data['gameshop_menu_cart']);
	}

	function get_edutech_sidebar()
	{
		
		$this->data['edutech_side_category'] = $this->tfl_model->edutech_get_side_category();
		$this->data['edutech_slide_videos'] = $this->tfl_model->edutech_get_slide_video();
		$this->data['edutech_recent_videos'] = $this->tfl_model->edutech_get_recent_video();
		$this->data['edutech_video_count'] = $this->tfl_model->edutech_count_video();
	}
	
	function set_bc($pgname=NULL, $pgdir=NULL)
	{
		
		$loops = explode('/', $pgdir);
		$val = '/'; $id = '1';
		foreach ($loops as $loop){
		$val = "$val" . "$loop" . '/';
		$page = explode('/', $val);
		$this->breadcrumbs->push(ucfirst($page[$id]), $val);
		$id = $id + 1;
		};
		//$this->breadcrumbs->push('Home', '/home');
		//$this->breadcrumbs->push('Blog', '/home/blog');
		$this->data['bc'] = $this->breadcrumbs->show();
					
	}
	
	public function get_array_data($get_data)
	{
		if(isset($get_data))
		{
			foreach ($get_data as $key=>$values)
				{
				  $clientdata[$key] = $values;  // better methodology to retrieve and store multiple records in arrays in loop
				}
				return $clientdata;
		} else { 
			return $clientdata = NULL; 
		}
	}

	
	
	
	
}