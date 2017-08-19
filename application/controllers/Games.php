<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Games extends My_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination', 'form_validation'));
		$this->load->helper(array('string', 'form'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		$this->lang->load('clients');
		
		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('gameforest_layout');
		$this->set_panel('gameforest');
		$this->get_header_footer();
		//$this->get_common_param();
		//$this->get_edutech_sidebar();
		$this->get_gameshop_common_param();
		

		
	}

	public function index()
	{
		$page = 'Games Forest';
		$this->set_activepage($page);

		$this->data['slider'] = $this->tfl_model->gameshop_slider();
		//$this->data['gameshop_tags_menu'] = $this->tfl_model->gameshop_tags_menu();
		$this->data['home_latest_games'] = $this->tfl_model->gameshop_latest_products('1');
		$this->data['home_latest_accessories'] = $this->tfl_model->gameshop_latest_products('4');
		$this->data['home_latest_toys'] = $this->tfl_model->gameshop_latest_products('3');
		//var_dump($this->data['products']);
		
		$this->session->set_userdata('last_page', current_url());
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'home2', $this->data);
	}
	public function all()
	{
		$page = 'Games Forest';
		$this->set_activepage($page);

		$this->data['gameshop_sub_menu'] = $this->tfl_model->getmenuwithparent('0');
		$this->data['products'] = $this->tfl_model->gameshop_view_all();
		//$this->data['home_latest_accessories'] = $this->tfl_model->gameshop_latest_products('1');
		//var_dump($this->data['products']);
		
		$this->session->set_userdata('last_page', current_url());
		//echo $this->session->userdata['last_page'];
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'products3', $this->data);
	}

	public function featured_products($type=NULL)
	{
		$page = 'Games Forest';
		$this->set_activepage($page);
		
		

		if ($type == 'games') {
			$cid = '1';
		} else if ($type == 'accessories') {
			$cid = '4';
		} else if ($type == 'toys') {
			$cid = '3';
		} else {
			redirect('games/all', 'refresh');
		}
		
		$this->data['gameshop_sub_menu'] = $this->tfl_model->getmenuwithparent($cid);

		if(empty($this->data['gameshop_sub_menu'])){
			$pid = $this->tfl_model->gameshop_getParentofcid($cid);
			$this->data['gameshop_sub_menu'] = $this->tfl_model->getmenuwithparent($pid['parentid']);
		}
		$this->data['products'] = $this->tfl_model->gameshop_view_featured_category($cid);

		//$this->data['home_latest_accessories'] = $this->tfl_model->gameshop_latest_products('1');
		//var_dump($this->data['products']);
		
		$this->session->set_userdata('last_page', current_url());
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'products3', $this->data);
	}

	public function category($cid=NULL)
	{
		$page = 'Games Forest';
		$this->set_activepage($page);
		
		$this->session->set_userdata('last_page', current_url());
		
		if (!(($this->tfl_model->gameshop_cat_url_check($cid)) || ($this->tfl_model->gameshop_cat_id_check($cid)))) 
		{
			$this->session->set_flashdata('message', 'No Categories Found');
			redirect('games/all', 'refresh');
		}
		if(!is_numeric($cid)){
			$cid = $this->tfl_model->gameshop_cat_getid($cid);
			$cid = $cid['cid'];
		}

		$this->data['gameshop_sub_menu'] = $this->tfl_model->getmenuwithparent($cid);

		if(empty($this->data['gameshop_sub_menu'])){
			$pid = $this->tfl_model->gameshop_getParentofcid($cid);
			$this->data['gameshop_sub_menu'] = $this->tfl_model->getmenuwithparent($pid['parentid']);
		}
		$this->data['products'] = $this->tfl_model->gameshop_view_category($cid);
		//$this->data['products'] = $this->tfl_model->gameshop_view_category($cid);
		//$this->data['home_latest_accessories'] = $this->tfl_model->gameshop_latest_products('1');
		//var_dump($this->data['products']);
		
		$this->session->set_userdata('last_page', current_url());
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'products3', $this->data);
	}
	public function view($gid=NULL)
	{
		$page = 'Games Forest';
		$this->set_activepage($page);
		
		if (!(($this->tfl_model->gameshop_product_url_check($gid)) || ($this->tfl_model->gameshop_product_id_check($gid)))) 
		{
			$this->session->set_flashdata('message', 'No Categories Found');
			redirect('games/all', 'refresh');
		}
		if(!is_numeric($gid)){
			$gid = $this->tfl_model->gameshop_product_getid($gid);
			$gid = $gid['id'];
		}

		$this->data['product'] = $this->tfl_model->gameshop_product_view($gid);
		//var_dump($this->data['product']);
		$cid = $this->data['product']['cid'];
		$this->data['related_products'] = $this->tfl_model->gameshop_related_product($cid);
		//$this->data['home_latest_accessories'] = $this->tfl_model->gameshop_latest_products('1');
		//var_dump($this->data['products']);
		
		$this->session->set_userdata('last_page', current_url());
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'product_single3.php', $this->data);
	}

	public function feature_offers()
	{	
		$page = 'Games Forest';
		$this->set_activepage($page);

		//$inp = $this->input->get('q');
		//echo 'Test Msg - ' . $inp;

		//$this->data['message'] = $this->session->flashdata('message');
		
		$this->session->set_userdata('last_page', current_url());
		$this->load->view($this->template_dir.'featured_offers', $this->data);
	}

	public function free_offers()
	{	
		$page = 'Games Forest';
		$this->set_activepage($page);

		$this->data['free_offers'] = $this->tfl_model->gameshop_free_offers();
		
		$this->session->set_userdata('last_page', current_url());
		$this->load->view($this->template_dir.'free_offers', $this->data);
	}

	public function fdownload($gid=NULL, $link=NULL)
	{
		$page = 'Games Forest';
		$this->set_activepage($page);

		if($this->tfl_model->gameshop_foffers_update_counts($gid))
		{
			redirect('http://' . $link, 'refresh');
		}
		
		redirect(($this->session->userdata('last_page')) ? $this->session->userdata('last_page') : 'games/all', 'refresh');
		$this->session->set_userdata('last_page', current_url());
		$this->load->view($this->template_dir.'free_offers', $this->data);
	}

	public function addtocart($gid=NULL)
	{
		$page = 'Games Forest';
		$this->set_activepage($page);

		if (!(($this->tfl_model->gameshop_product_url_check($gid)) || ($this->tfl_model->gameshop_product_id_check($gid)))) 
		{
			$this->session->set_flashdata('message', 'No Products Found');
			redirect('games/all', 'refresh');
		}
		if(!is_numeric($gid)){
			$gid = $this->tfl_model->gameshop_product_getid($gid);
			$gid = $gid['id'];
		}

		//var_dump($this->session->all_userdata());

		if(!empty($this->session->userdata('user_id'))){
			$cart['userid'] = $this->session->userdata('user_id');
		} else {
			$cart['userid'] = '0';
		}

		$cart['sessionid'] = $this->session->userdata('session_id');

		$cart['productid'] = $gid;
		if (!empty($this->input->get('q'))) {
			$cart['quantity'] = $this->input->get('q');
		} else {
			$cart['quantity'] = '1';
		}
		
		if ($this->tfl_model->gameshop_check_duplicate_cart($cart)) {

			$this->tfl_model->gameshop_update_to_cart($cart);

		} else {

			$this->tfl_model->gameshop_add_to_cart($cart);
		}
 		
	
		redirect(($this->session->userdata('last_page')) ? $this->session->userdata('last_page') : 'games/all', 'refresh');


		//$this->data['message'] = $this->session->flashdata('message');
		//$this->load->view($this->template_dir.'product_single.php', $this->data);
	}

	public function cart()
	{
		$page = 'Games Forest';
		$this->set_activepage($page);

		if(!empty($this->session->userdata('user_id'))){
			$cart['userid'] = $this->session->userdata('user_id');
		} else {
			$cart['userid'] = '0';
		}
		$cart['sessionid'] = $this->session->userdata('session_id');

		$this->data['cartproductslist'] = $this->tfl_model->gameshop_cart_product_list($cart);

		foreach ($this->data['cartproductslist'] as $key => $value) {
			$this->data['quantity'][$key] = array(
				'name'  => 'quantity',
				'id'    => 'quantity'.$key,
				'type'  => 'text',
				//'onchange' => 'myFunction(this.value)',
				'value' => $value['productquantity'],
				'style' => 'width:30px; text-align:center;',
			);
		}
		//var_dump($this->data['quantity']);
		

		//$this->data['gameshop_tags_menu'] = $this->tfl_model->gameshop_tags_menu();
		
		$this->session->set_userdata('last_page', current_url());
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'cart3', $this->data);
	}
	public function cart_action($action=NULL, $sid=NULL)
	{
		$page = 'Games Forest';
		$this->set_activepage($page);

		if(!empty($this->session->userdata('user_id'))){
			$cart['userid'] = $this->session->userdata('user_id');
		} else {
			$cart['userid'] = '0';
		}

		$cart['sid'] = $sid;
		$cart['sessionid'] = $this->session->userdata('session_id');

		if ($action == 'delete') {
			$this->tfl_model->gameshop_cart_delete_item($cart);
		}

		if ($action == 'quantity') {

			$cart['quantity'] = $this->input->post('quantity');
			//echo $cart['quantity'];
			$this->tfl_model->gameshop_cart_quantity_update($cart);
			redirect($this->session->last_page(1), 'refresh');
		}

		redirect($this->session->last_page(1), 'refresh');
		

		//$this->data['cartproductslist'] = $this->tfl_model->gameshop_cart_product_list($cart);
		//$this->data['gameshop_tags_menu'] = $this->tfl_model->gameshop_tags_menu();
		
		$this->session->set_userdata('last_page', current_url());
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'cart', $this->data);
	}

	public function update_cart_quantity()
	{	
		$page = 'Games Forest';
		$this->set_activepage($page);

		if(!empty($this->session->userdata('user_id'))){
			$cart['userid'] = $this->session->userdata('user_id');
		} else {
			$cart['userid'] = '0';
		}
		$cart['sessionid'] = $this->session->userdata('session_id');
		if (empty($this->input->get('q'))) {
			redirect('games/cart', 'refresh');
		}
		$inp = $this->input->get('q');
		$inparr = explode("sp", $inp);
		$qnt = $inparr['0'];
		$sid = $inparr['1'];
		//var_dump($inparr);

		$cart['sid'] = $sid;
		$cart['quantity'] = $qnt;
		$this->tfl_model->gameshop_cart_quantity_update($cart);
		
		//redirect('games/cart', 'refresh');
		//$this->data['message'] = $this->session->flashdata('message');
		//$this->load->view($this->template_dir.'error_msg', $this->data);
	}

	


	public function checkout()
	{
		$page = 'Games Forest';
		$this->set_activepage($page);
		redirect('games/all', 'refresh');
		if(!$this->ion_auth->logged_in())
		{
			redirect('games/login', 'refresh');
		}
		
		if(!$this->ion_auth->in_group($this->group))
		{
			return show_error('You must be a member to view this page.');
		}


		$cart['userid'] = $this->session->userdata('user_id');
		$cart['sessionid'] = $this->session->userdata('session_id');


		$gproducts = $this->tfl_model->gameshop_get_cart_products();
		//var_dump($gproducts);

		foreach ($gproducts as $key => $value) {
			$products[$key]['productid'] = $value['id'];
			$products[$key]['paymentid'] = random_string('alnum', 8) . time() . random_string('alnum', 4);
			$products[$key]['licenseid'] = random_string('alnum', 8) . time() . random_string('alnum', 8);
			$products[$key]['licensestatus'] = '0';
			$products[$key]['userid'] = $this->session->userdata('user_id');
			$products[$key]['amount'] = ($value['price'] - (($value['discount']/'100')*$value['price']));
		}
		
		//var_dump($products);
		
		
		if($this->tfl_model->gameshop_add_to_user($products)){
			redirect('games/buylist/', 'refresh');
		}

		
		$this->session->set_userdata('last_page', current_url());
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'cart', $this->data);
	}

	public function buylist()
	{
		$page = 'Games Forest';
		$this->set_activepage($page);
		//redirect('games/all', 'refresh');
		if(!$this->ion_auth->logged_in())
		{
			redirect('games/login', 'refresh');
		}
		
		if(!$this->ion_auth->in_group($this->group))
		{
			return show_error('You must be a member to view this page.');
		}

		
		if(!empty($this->session->userdata('user_id'))){
			$cart['userid'] = $this->session->userdata('user_id');
		}

		$cart['sessionid'] = $this->session->userdata('session_id');

		$this->data['buylist'] = $this->tfl_model->gameshop_get_buylist();
		//$this->data['gameshop_tags_menu'] = $this->tfl_model->gameshop_tags_menu();
		
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'buy_list', $this->data);
	}

	public function payments($pid=NULL)
	{
		$page = 'Games Forest';
		$this->set_activepage($page);
		//redirect('games/all', 'refresh');
		if(empty($pid)){
			$pid = $this->input->post('pid');
		}
		$this->data['payid'] = $pid; 

		if(!$this->ion_auth->logged_in())
		{
			redirect('games/login', 'refresh');
		}
		
		if(!$this->ion_auth->in_group($this->group))
		{
			return show_error('You must be a member to view this page.');
		}


		if(!empty($this->session->userdata('user_id'))){
			$cart['userid'] = $this->session->userdata('user_id');
		} else {
			$cart['userid'] = '0';
		}
		$cart['sessionid'] = $this->session->userdata('session_id');

		$this->data['payment_data'] = $this->tfl_model->gameshop_get_payment_data($pid);
		//$this->data['gameshop_tags_menu'] = $this->tfl_model->gameshop_tags_menu();


		$this->form_validation->set_rules('paymentmode', 'Payment Mode', 'required|trim|xss_clean');
		$this->form_validation->set_rules('mobileno', 'Mobile No', 'required|trim|xss_clean');
		$this->form_validation->set_rules('referenceno', 'Reference No', 'trim|xss_clean');
		$this->form_validation->set_rules('billingaddress', 'Billing Address', 'required|trim|xss_clean');
		$this->form_validation->set_rules('paymentdetails', 'Payment Details', 'trim|xss_clean');


		if ($this->form_validation->run() == true)
		{
			$additional_data = array(
				'paymentmode' => $this->input->post('paymentmode'),
				'mobileno'  => $this->input->post('mobileno'),
				'billingaddress'  => $this->input->post('billingaddress'),
				'paymentdetails'  => $this->input->post('paymentdetails'),
				'paymentstatus'  => '1',
			);

			if ($this->tfl_model->gameshop_update_payment($pid, $additional_data))
			{
				$this->session->set_flashdata('message', $this->tfl_model->errors());
			}

			redirect($this->session->last_page(1), 'refresh');
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			//$this->data['message'] = $this->session->flashdata('message');//$this->yapps_model->errors();
			$this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			
			$this->data['paymentmode'] = array(
				'name'  => 'paymentmode',
				'id'    => 'paymentmode',
				'options'=> array('1' => 'Bkash', '2' => 'DBBL Rocket', '3' => 'Bank Transfer', '4' => 'Others'),
				'type'  => 'text',
				'class' => 'class=paymentformcss',
				'value' => $this->form_validation->set_value('paymentmode'),
			);
			$this->data['mobileno'] = array(
				'name'  => 'mobileno',
				'id'    => 'mobileno',
				'type'  => 'text',
				'style' => 'width:300px; margin: 5px 0px 5px 0px;',
				'value' => $this->form_validation->set_value('mobileno'),
			);
			$this->data['referenceno'] = array(
				'name'  => 'referenceno',
				'id'    => 'referenceno',
				'type'  => 'text',
				'style' => 'width:300px; margin: 5px 0px 5px 0px;',
				'value' => $this->form_validation->set_value('referenceno'),
			);
			$this->data['billingaddress'] = array(
				'name'  => 'billingaddress',
				'id'    => 'billingaddress',
				'type'  => 'text',
				'style' => 'width:300px; margin: 5px 0px 5px 0px; height: 50px;',
				'value' => $this->form_validation->set_value('billingaddress'),
			);
			$this->data['paymentdetails'] = array(
				'name'  => 'paymentdetails',
				'id'    => 'paymentdetails',
				'type'  => 'text',
				'style' => 'width:300px; margin: 5px 0px 5px 0px; height: 100px;',
				'value' => $this->form_validation->set_value('paymentdetails'),
			);
			$this->data['pid'] = array(
				'paymentid'  => ($this->form_validation->set_value('paymentid') ? $this->form_validation->set_value('paymentid') : $pid),
			);


			$this->load->view($this->template_dir.'payments', $this->data);
		}
	}

	public function licenses($lid=NULL)
	{
		$page = 'Games Forest';
		$this->set_activepage($page);
		redirect('games/all', 'refresh');
		if(!$this->ion_auth->logged_in())
		{
			redirect('games/login', 'refresh');
		}
		
		if(!$this->ion_auth->in_group($this->group))
		{
			return show_error('You must be a member to view this page.');
		}

		
		if(!empty($this->session->userdata('user_id'))){
			$cart['userid'] = $this->session->userdata('user_id');
		}

		$cart['sessionid'] = $this->session->userdata('session_id');

		$this->data['license_data'] = $this->tfl_model->gameshop_get_license_data($lid);
		$this->data['gameshop_latest_products'] = $this->tfl_model->gameshop_latest_products('2');
		//var_dump($this->data['gameshop_latest_products']);
		
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'licenses', $this->data);
	}

	///////****************************** new start ************************************///////////////

	public function precheck()
	{
		$page = 'Games Forest';
		$this->set_activepage($page);

		if (empty($this->data['gameshop_menu_cart'])) {
			//return show_error('The Cart is empty, please buy something !!!');
			$this->session->set_flashdata('message', 'No products in the cart, please buy something');
			redirect('games/error_msg', 'refresh');
		}

		if ($this->ion_auth->logged_in())
		{
			redirect('games/checkout2', 'refresh');
		} else {

			$this->form_validation->set_rules('identity', 'Identity', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == true)
			{
				// check to see if the user is logging in
				// check for "remember me"
				$remember = (bool) $this->input->post('remember');

				if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
				{
					//if the login is successful
					//redirect them back to the home page
					$this->session->set_flashdata('message', $this->ion_auth->messages());

					//echo $this->session->userdata['last_page'];
					redirect((isset($this->session->userdata['last_page']) ? $this->session->userdata['last_page'] : 'games/checkout2'), 'refresh');
					return show_error('Unknown Error, Please go back to Homepage');
				}
				else
				{
					// if the login was un-successful
					// redirect them back to the login page
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					redirect('games/precheck', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
				}
			}
			else
			{
				// the user is not logging in so display the login page
				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['identity'] = array(
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'class'       => 'form-control',
				'placeholder' => 'Email',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array(
				'name' => 'password',
				'id' => 'password',
				'class'       => 'form-control',
				'type' => 'password',
				'placeholder' => 'Password',
			);

				
				$this->data['message'] = $this->session->flashdata('message');
				$this->load->view($this->template_dir.'precheckout2', $this->data);
				

			}
		}


		
	}

	public function checkout2()
	{
		$page = 'Games Forest';
		$this->set_activepage($page);

		if(!$this->ion_auth->logged_in())
		{
			$this->session->set_userdata('last_page', current_url());
			redirect('games/login', 'refresh');
		}
		
		if(!$this->ion_auth->in_group($this->group))
		{
			return show_error('You must be a member to view this page.');
		}


		$cart['userid'] = $this->session->userdata('user_id');
		$cart['sessionid'] = $this->session->userdata('session_id');


		$gproducts = $this->tfl_model->gameshop_get_cart_products();
		//var_dump($gproducts);
		if (empty($gproducts)) {
			//return show_error('No Products in the cart');
			$this->session->set_flashdata('message', 'No products in the cart');
			redirect('games/error_msg', 'refresh');
		}

		$purchase['orderno'] = 'tfl-gs-' . random_string('alnum', 2) . time() . random_string('alnum', 2);
		$pp = $pc = $pt = '0';
		foreach ($gproducts as $key => $value) {
			
			$products[$key]['id'] = $value['id'];
			$products[$key]['orderno'] = $purchase['orderno'];
			$products[$key]['quantity'] = $value['quantity'];
			$products[$key]['unitprice'] = $value['price'];
			$products[$key]['discount'] = $value['discount'];
			$products[$key]['netprice'] = $value['price'] * $value['quantity'];
			$products[$key]['netpricewd'] = ($products[$key]['netprice'] - (($value['discount']/'100')*$products[$key]['netprice']));
			$pt = $pt + ($value['price'] * $value['quantity']);
			$pc = ($value['price'] - (($value['discount']/'100')*$value['price']));
			$pp = $pp + $pc * $value['quantity'];
		}
		$disc = ($pt - $pp)*'100'/$pt;
		//var_dump($products);
		//var_dump($pt . ' - ' . $pp . ' - ' . $disc);

		
		$purchase['userid'] = $this->session->userdata('user_id');
		$purchase['totalprice'] = $pp;
		$purchase['discount'] = $disc;
		$purchase['status'] = '1';
		//$result = $this->tfl_model->gameshop_add_purchase_order($purchase);
		if($this->tfl_model->gameshop_add_purchase_order($purchase)){
			$this->tfl_model->gameshop_add_products_order($products);
			////////////////   sendMail   //////////////
			$mailvar['adminemail'] = $this->adminemail;
			$mailvar['orderno'] = $purchase['orderno'];
			$mailvar['username'] = $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name');
			$mailvar['email'] = $this->session->userdata('email');
			$mailvar['price'] = $purchase['totalprice'];
			$mailvar['discount'] = $purchase['discount'];
			$mailvar['subject'] = 'New order #' . $mailvar['orderno'] . 'has been placed';
			$notificationHandler = new Jm_example();
			$notificationHandler->checkoutcustomer($mailvar);
		}

		redirect('games/add_payments/' . $purchase['orderno'], 'refresh');

		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'cart', $this->data);
	}

	public function add_payments($orderno=NULL)
	{
		$page = 'Games Forest';
		$this->set_activepage($page);

		if(!$this->ion_auth->logged_in())
		{
			$this->session->set_userdata('last_page', current_url());
			redirect('games/login', 'refresh');
		}
		
		if(!$this->ion_auth->in_group($this->group))
		{
			return show_error('You must be a member to view this page.');
		}

		if($this->tfl_model->gameshop_check_payments($orderno))
		{
			redirect('games/order_details/' . $orderno, 'refresh');
		}

		$info['userid'] = $this->session->userdata('user_id');

		$this->data['orderinfo'] = $this->tfl_model->gameshop_get_order_info($orderno);
		if (empty($this->data['orderinfo']['orderno'])) {
			//redirect('games/manage_orders', 'refresh');
		}
		$this->data['orderdetails'] = $this->tfl_model->gameshop_get_order_details($this->data['orderinfo']['orderno']);
		//var_dump($this->data['orderinfo']);
		//var_dump($this->data['orderdetails']);

			$config['upload_path']          = './assets/gameforest/paymentdocs/';
            $config['allowed_types']        = 'pdf|jpg';
            $config['max_size']             = 2048;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

        	$this->load->library('upload', $config);

		$this->form_validation->set_rules('paymentmode', 'Payment Mode', 'required|trim|xss_clean');
		$this->form_validation->set_rules('mobileno', 'Mobile/Account no', 'required|trim|xss_clean');
		$this->form_validation->set_rules('referenceno', 'Reference No', 'trim|xss_clean');
		$this->form_validation->set_rules('paymentdetails', 'Payment Details', 'trim|xss_clean');
		$this->form_validation->set_rules('totalprice', 'Payable', 'required|trim|xss_clean');
		if (empty($_FILES['filename']['name']))
		{
			$this->form_validation->set_rules('filename', 'Documents');

		}

		if ($this->form_validation->run() == true)
		{
			$this->upload->do_upload('filename');
			$fileinfo = array('upload_data' => $this->upload->data());
			$payments_data = array(
				'orderno' => $orderno,
				'amount' => $this->input->post('totalprice'),
				'paymode' => $this->input->post('paymentmode'),
				'mobileaccount'  => $this->input->post('mobileno'),
				'referenceno'  => $this->input->post('referenceno'),
				'paymentdetails'  => $this->input->post('paymentdetails'),
				'documents'  => $fileinfo['upload_data']['file_name'],
			);

			if ($this->tfl_model->gameshop_add_payments($payments_data))
			{
				$this->tfl_model->gameshop_update_order_status($orderno);
				$this->session->set_flashdata('message', $this->tfl_model->errors());

				////////////////   sendMail   //////////////
				$mailvar['adminemail'] = $this->adminemail;
				$mailvar['orderno'] = $payments_data['orderno'];
				$mailvar['username'] = $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name');
				$mailvar['email'] = $this->session->userdata('email');
				$mailvar['amount'] = $payments_data['amount'];
				$mailvar['subject'] = 'New Payment for order #' . $mailvar['orderno'] . 'has been made.';
				$notificationHandler = new Jm_example();
				$notificationHandler->paymentcustomer($mailvar);
			}

			redirect('games/order_details/' . $orderno, 'refresh');
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			//$this->data['message'] = $this->session->flashdata('message');//$this->yapps_model->errors();
			$this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			
			$this->data['totalprice'] = array(
				'name'  => 'totalprice',
				'id'    => 'totalprice',
				'type'  => 'text',
				'style' => 'width:250px; margin: 5px 0px 5px 0px; font-weight: bold;',
				'readonly'=>'true',
				'value' => ($this->form_validation->set_value('totalprice') ? $this->form_validation->set_value('totalprice') : ' ' . $this->data['orderinfo']['totalprice'].' Tk'),
			);
			$this->data['paymentmode'] = array(
				'name'  => 'paymentmode',
				'id'    => 'paymentmode',
				'options'=> array('1' => 'Bkash', '2' => 'DBBL Rocket', '3' => 'Bank Transfer', '4' => 'Others'),
				'type'  => 'text',
				'class' => 'class=paymentformcss',
				'value' => $this->form_validation->set_value('paymentmode'),
			);
			$this->data['mobileno'] = array(
				'name'  => 'mobileno',
				'id'    => 'mobileno',
				'type'  => 'text',
				'style' => 'width:250px; margin: 5px 0px 5px 0px;',
				'value' => $this->form_validation->set_value('mobileno'),
			);
			$this->data['referenceno'] = array(
				'name'  => 'referenceno',
				'id'    => 'referenceno',
				'type'  => 'text',
				'style' => 'width:250px; margin: 5px 0px 5px 0px;',
				'value' => $this->form_validation->set_value('referenceno'),
			);
			
			$this->data['paymentdetails'] = array(
				'name'  => 'paymentdetails',
				'id'    => 'paymentdetails',
				'type'  => 'text',
				'style' => 'width:250px; margin: 5px 0px 5px 0px; height: 100px;',
				'value' => $this->form_validation->set_value('paymentdetails'),
			);
			$this->data['filename'] = array(
				'name'  => 'filename',
				'id'    => 'filename',
				'type'  => 'file',
				'style' => 'width:250px; padding: 5px 0 5px 0;',
				'value' => $this->form_validation->set_value('filename'),
			);
			$this->data['pid'] = array(
				'paymentid'  => ($this->form_validation->set_value('paymentid') ? $this->form_validation->set_value('paymentid') : $orderno),
			);
			$this->data['orderno'] = $orderno;

			$this->data['info'] = $this->tfl_model->gameshop_get_data('payment_info');
			$this->load->view($this->template_dir.'payment_add', $this->data);
		}


	}

	public function manage_orders()
	{
		$page = 'Games Forest';
		$this->set_activepage($page);

		if(!$this->ion_auth->logged_in())
		{
			$this->session->set_userdata('last_page', current_url());
			redirect('games/login', 'refresh');
		}
		
		if(!$this->ion_auth->in_group($this->group))
		{
			return show_error('You must be a member to view this page.');
		}

		$info['userid'] = $this->session->userdata('user_id');

		$this->data['orders'] = $this->tfl_model->gameshop_manage_orders($info);

		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'orders3', $this->data);
	}

	public function order_details($orderno=NULL)
	{
		$page = 'Games Forest';
		$this->set_activepage($page);

		if(!$this->ion_auth->logged_in())
		{
			$this->session->set_userdata('last_page', current_url());
			redirect('games/login', 'refresh');
		}
		
		if(!$this->ion_auth->in_group($this->group))
		{
			return show_error('You must be a member to view this page.');
		}
		$info['userid'] = $this->session->userdata('user_id');

		$this->data['orderinfo'] = $this->tfl_model->gameshop_get_order_info($orderno);
		if (empty($this->data['orderinfo']['orderno'])) {
			//redirect('games/manage_orders', 'refresh');
		}
		$this->data['orderdetails'] = $this->tfl_model->gameshop_get_order_details($this->data['orderinfo']['orderno']);
		$this->data['paymentdetails'] = $this->tfl_model->gameshop_get_payment_details($this->data['orderinfo']['orderno']);
		$this->data['licenseinfo'] = $this->tfl_model->gameshop_get_license_info($this->data['orderinfo']['orderno']);
		//var_dump($this->data['orderinfo']);
		//var_dump($this->data['orderdetails']);
		//var_dump($this->data['paymentdetails']);
		//var_dump($this->session->all_userdata());

		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'order_details', $this->data);
	}

	public function view_licenses($orderno=NULL, $productid=NULL)
	{
		$page = 'Games Forest';
		$this->set_activepage($page);

		if(!$this->ion_auth->logged_in())
		{
			$this->session->set_userdata('last_page', current_url());
			redirect('games/login', 'refresh');
		}
		
		if(!$this->ion_auth->in_group($this->group))
		{
			return show_error('You must be a member to view this page.');
		}

		$info['userid'] = $this->session->userdata('user_id');

		$this->data['licenseinfo'] = $this->tfl_model->gameshop_get_license_info_single($orderno, $productid);

		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'license_view_single', $this->data);
	}

	public function pages($pageurl=NULL)
	{
		$page = 'Games Forest';
		$this->set_activepage($page);

		$this->data['pagedata'] = $this->tfl_model->gameshop_get_page_single($pageurl);

		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'page_view', $this->data);
	}

	function caguest()
	{
		$this->output->set_template('gameforest_layout');
		$this->set_panel('gameforest');
		$this->get_gameshop_common_param();

		$this->data['title'] = "Continue as a Guest";

		$tables = $this->config->item('tables','ion_auth');

		if (empty($this->data['gameshop_menu_cart'])) {
			return show_error('The Cart is empty, please buy something !!!');
		}

		// validate form input
		
		$this->form_validation->set_rules('first_name', 'First Name');
		$this->form_validation->set_rules('last_name', 'Last Name');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique['.$tables['users'].'.email]');
		$this->form_validation->set_rules('mobile', 'Mobile No', 'required');
		$this->form_validation->set_rules('address', 'Address');
		$this->form_validation->set_rules('area', 'Area');
		$this->form_validation->set_rules('city', 'City');
		$this->form_validation->set_rules('country', 'Country');

		
		if ($this->form_validation->run() == true)
		{
			$email    = strtolower($this->input->post('email'));
			$parts = explode("@", $email);
			$username = strtolower($parts[0]);
			
			$password = 'password';

			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'phone'      => $this->input->post('mobile'),
			);

			$profile_data = array(
				'fullname' => $this->input->post('first_name') . ' ' . $this->input->post('last_name'),
				'firstname' => $this->input->post('first_name'),
				'lastname'  => $this->input->post('last_name'),
				'email'      => $this->input->post('email'),
				'mobile'      => $this->input->post('mobile'),
				'address1'      => $this->input->post('address'),
				'area'      => $this->input->post('area'),
				'zipcode'      => $this->input->post('zip'),
				'city'      => $this->input->post('city'),
				'country'      => $this->input->post('country'),
				'usertype'      => 'guestregister',
			);

		}
		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data))
		{
			// check to see if we are creating the user
			// redirect them back to the admin page
			if ($this->tfl_model->gameshop_add_users($profile_data))
			{
				$this->_login($email, $password);
				redirect('games/precheck', 'refresh');
			}
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("games/login", 'refresh');
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['first_name'] = array(
				'name'  => 'first_name',
				'id'    => 'first_name',
				'type'  => 'text',
				'placeholder' => 'First Name',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array(
				'name'  => 'last_name',
				'id'    => 'last_name',
				'type'  => 'text',
				'placeholder' => 'Last Name',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('last_name'),
			);
			$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'placeholder' => 'Email',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['mobile'] = array(
				'name'  => 'mobile',
				'id'    => 'mobile',
				'type'  => 'text',
				'placeholder' => 'Mobile No.',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('mobile'),
			);
			$this->data['address'] = array(
				'name'  => 'address',
				'id'    => 'address',
				'type'  => 'text',
				'rows'        => '3',
			    'cols'        => '20',
			    'placeholder' => 'Address',
				'class'       => 'form-control',
			    //'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('address'),
			);
			$this->data['area'] = array(
				'name'  => 'area',
				'id'    => 'area',
				'type'  => 'text',
				'placeholder' => 'Area',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('area'),
			);
			$this->data['city'] = array(
				'name'  => 'city',
				'id'    => 'city',
				'type'  => 'text',
				'placeholder' => 'City',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('city'),
			);
			$this->data['zip'] = array(
				'name'  => 'zip',
				'id'    => 'zip',
				'type'  => 'text',
				'placeholder' => 'Zip Code',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('zip'),
			);
			$this->data['country'] = array(
				'name'  => 'country',
				'id'    => 'country',
				'type'  => 'text',
				'placeholder' => 'Country',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('country'),
			);

			$this->load->view($this->template_dir.'checkoutasaguest2', $this->data);
		}
	}

	public function view_profile()
	{
		$page = 'Games Forest';
		$this->set_activepage($page);

		if(!$this->ion_auth->logged_in())
		{
			$this->session->set_userdata('last_page', current_url());
			redirect('games/login', 'refresh');
		}
		
		if(!$this->ion_auth->in_group($this->group))
		{
			return show_error('You must be a member to view this page.');
		}

		$info['userid'] = $this->session->userdata('user_id');

		$this->data['profileinfo'] = $this->tfl_model->gameshop_get_profile_data_single();

		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'profile_view', $this->data);
	}

	////////////////////////////// testd

	public function jm_email()
	{	
		$page = 'Games Forest';
		$this->set_activepage($page);

		$notificationHandler = new Jm_example();
		$notificationHandler->sendWelcomeEmail(" Ahmed Akter", "123456", $this->adminemail, "Welcome to GamersBD.");
		

		//$this->data['message'] = $this->session->flashdata('message');
		
		$this->session->set_userdata('last_page', current_url());
		$this->load->view($this->template_dir.'featured_offers', $this->data);
	}



	////////////////////// commonFunction

	public function error_msg()
	{
		$page = 'Games Forest';
		$this->set_activepage($page);


		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view($this->template_dir.'error_msg', $this->data);
	}

    public function error_page()
    {
        $page = 'Games Forest';
        $this->set_activepage($page);


        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view($this->template_dir.'error_page', $this->data);
    }

	function login($page = 'login'){
				
		$this->output->set_template('gameforest_layout');
		$this->set_panel('gameforest');
		$this->get_gameshop_common_param();

		$data['title'] = "AA Planetica" ;
		$data['activepage'] = "User Login" ;

		if ($this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect(($this->session->userdata('last_page')) ? $this->session->userdata('last_page') : 'games/all', 'refresh');
		}
		//validate form input
		$this->form_validation->set_rules('identity', 'Identity', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());

				//echo $this->session->userdata['last_page'];
				//redirect((isset($this->session->userdata['last_page']) ? $this->session->userdata['last_page'] : 'games/all'), 'refresh');
				redirect(($this->session->userdata('last_page')) ? $this->session->userdata('last_page') : 'games/all', 'refresh');
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('games/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array(
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'class'       => 'form-control',
				'placeholder' => 'Email',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array(
				'name' => 'password',
				'id' => 'password',
				'class'       => 'form-control',
				'type' => 'password',
				'placeholder' => 'Password',
			);

			
			$this->load->view('gameforest/login2', $this->data);
			

			}
	}

	function edit_profile()
	{

		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('user_name', $this->lang->line('create_user_validation_uname_label'));
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
		$this->form_validation->set_rules('mobile', 'Mobile No', 'required');
		$this->form_validation->set_rules('dateofbirth', 'Date of Birth');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('area', 'Area');
		$this->form_validation->set_rules('zip', 'Zip Code', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');

		if ($this->form_validation->run() == true)
		{
			echo "Good Work";

			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'phone'      => $this->input->post('mobile'),
			);

			$profile_data = array(
				'fullname' => $this->input->post('first_name') . ' ' . $this->input->post('last_name'),
				'firstname' => $this->input->post('first_name'),
				'lastname'  => $this->input->post('last_name'),
				//'email'      => $this->input->post('email'),
				'mobile'      => $this->input->post('mobile'),
				'address1'      => $this->input->post('address'),
				'area'      => $this->input->post('area'),
				'zipcode'      => $this->input->post('zip'),
				'city'      => $this->input->post('city'),
				'country'      => $this->input->post('country'),
				//'usertype'      => 'shopregister',
			);

			if ($this->tfl_model->gameshop_update_users($profile_data))
			{
				//$notificationHandler = new Jm_example();
				//$notificationHandler->sendWelcomeEmail($profile_data['fullname'], $password, $email, "Welcome to GamersBD.");
				//$notificationHandler->newusernotificationadmin($profile_data['fullname'], $password, $this->adminemail, "New User Registered");
				//$this->_login($email, $password);
				//redirect(($this->session->userdata('last_page')) ? $this->session->userdata('last_page') : 'games/all', 'refresh');
				// check to see if we are creating the user
				// redirect them back to the admin page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("games/edit_profile", 'refresh');
			}


			redirect('games/edit_profile', 'refresh'); 
		}
		else 
		{
			//$useremail = $this->session->userdata('email')
			$user_data =  $this->tfl_model->gameshop_get_profile_data();

			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['first_name'] = array(
				'name'  => 'first_name',
				'id'    => 'first_name',
				'type'  => 'text',
				'placeholder' => 'First Name',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => ($this->form_validation->set_value('first_name') ? $this->form_validation->set_value('first_name') : $user_data['firstname']),
			);
			$this->data['last_name'] = array(
				'name'  => 'last_name',
				'id'    => 'last_name',
				'type'  => 'text',
				'placeholder' => 'Last Name',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => ($this->form_validation->set_value('last_name') ? $this->form_validation->set_value('last_name') : $user_data['lastname']),
			);
			
			
			$this->data['dateofbirth'] = array(
				'name'  => 'dateofbirth',
				'id'    => 'dateofbirth',
				'type'  => 'text',
				'placeholder' => 'Date of Birth',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => ($this->form_validation->set_value('dateofbirth') ? $this->form_validation->set_value('dateofbirth') : $user_data['birthdate']),
			);
			$this->data['mobile'] = array(
				'name'  => 'mobile',
				'id'    => 'mobile',
				'type'  => 'text',
				'placeholder' => 'Mobile No.',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => ($this->form_validation->set_value('mobile') ? $this->form_validation->set_value('mobile') : $user_data['mobile']),
			);
			$this->data['address'] = array(
				'name'  => 'address',
				'id'    => 'address',
				'type'  => 'text',
				'placeholder' => 'Address',
				'rows'        => '4',
			    //'cols'        => '20',
			    'class'       => 'form-control',
			    //'style'       => 'width:200px;',
				'value' => ($this->form_validation->set_value('address') ? $this->form_validation->set_value('address') : $user_data['address1']),
			);
			$this->data['area'] = array(
				'name'  => 'area',
				'id'    => 'area',
				'type'  => 'text',
				'placeholder' => 'Area',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => ($this->form_validation->set_value('area') ? $this->form_validation->set_value('area') : $user_data['area']),
			);
			$this->data['city'] = array(
				'name'  => 'city',
				'id'    => 'city',
				'type'  => 'text',
				'placeholder' => 'City',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => ($this->form_validation->set_value('city') ? $this->form_validation->set_value('city') : $user_data['city']),
			);
			$this->data['zip'] = array(
				'name'  => 'zip',
				'id'    => 'zip',
				'type'  => 'text',
				'placeholder' => 'Zip Code',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => ($this->form_validation->set_value('zip') ? $this->form_validation->set_value('zip') : $user_data['zipcode']),
			);
			$this->data['country'] = array(
				'name'  => 'country',
				'id'    => 'country',
				'type'  => 'text',
				'placeholder' => 'Country',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => ($this->form_validation->set_value('country') ? $this->form_validation->set_value('country') : $user_data['country']),
			);

			$this->load->view('gameforest/profile_edit', $this->data);
		}
		
	}

	function register()
	{
		/*$this->output->set_template('gameforest_layout');
		$this->set_panel('gameforest');
		$this->get_gameshop_common_param();*/

		$this->data['title'] = "Create User";

		$tables = $this->config->item('tables','ion_auth');

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('user_name', $this->lang->line('create_user_validation_uname_label'));
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
		$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique['.$tables['users'].'.email]');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
		$this->form_validation->set_rules('mobile', 'Mobile No', 'required');
		$this->form_validation->set_rules('dateofbirth', 'Date of Birth');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('area', 'Area');
		$this->form_validation->set_rules('zip', 'Zip Code', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');

		if ($this->form_validation->run() == true)
		{
			$username = strtolower($this->input->post('user_name'));
			$email    = strtolower($this->input->post('email'));
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'phone'      => $this->input->post('mobile'),
			);

			$profile_data = array(
				'fullname' => $this->input->post('first_name') . ' ' . $this->input->post('last_name'),
				'firstname' => $this->input->post('first_name'),
				'lastname'  => $this->input->post('last_name'),
				'email'      => $this->input->post('email'),
				'mobile'      => $this->input->post('mobile'),
				'address1'      => $this->input->post('address'),
				'area'      => $this->input->post('area'),
				'zipcode'      => $this->input->post('zip'),
				'city'      => $this->input->post('city'),
				'country'      => $this->input->post('country'),
				'usertype'      => 'shopregister',
			);


		}
		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data))
		{
			if ($this->tfl_model->gameshop_add_users($profile_data))
			{
				$notificationHandler = new Jm_example();
				$notificationHandler->sendWelcomeEmail($profile_data['fullname'], $password, $email, "Welcome to GamersBD.");
				$notificationHandler->newusernotificationadmin($profile_data['fullname'], $password, $this->adminemail, "New User Registered");
				$this->_login($email, $password);
				redirect(($this->session->userdata('last_page')) ? $this->session->userdata('last_page') : 'games/all', 'refresh');
			}
			// check to see if we are creating the user
			// redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("games/login", 'refresh');
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['first_name'] = array(
				'name'  => 'first_name',
				'id'    => 'first_name',
				'type'  => 'text',
				'placeholder' => 'First Name',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array(
				'name'  => 'last_name',
				'id'    => 'last_name',
				'type'  => 'text',
				'placeholder' => 'Last Name',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('last_name'),
			);
			$this->data['user_name'] = array(
				'name'  => 'user_name',
				'id'    => 'user_name',
				'type'  => 'text',
				'placeholder' => 'User Name',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('user_name'),
			);
			$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'placeholder' => 'Email',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['password'] = array(
				'name'  => 'password',
				'id'    => 'password',
				'type'  => 'password',
				'placeholder' => 'Password',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array(
				'name'  => 'password_confirm',
				'id'    => 'password_confirm',
				'type'  => 'password',
				'placeholder' => 'Confirm Password',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('password_confirm'),
			);
			$this->data['dateofbirth'] = array(
				'name'  => 'dateofbirth',
				'id'    => 'dateofbirth',
				'type'  => 'text',
				'placeholder' => 'Date of Birth',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('dateofbirth'),
			);
			$this->data['mobile'] = array(
				'name'  => 'mobile',
				'id'    => 'mobile',
				'type'  => 'text',
				'placeholder' => 'Mobile No.',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('mobile'),
			);
			$this->data['address'] = array(
				'name'  => 'address',
				'id'    => 'address',
				'type'  => 'text',
				'placeholder' => 'Address',
				'rows'        => '4',
			    //'cols'        => '20',
			    'class'       => 'form-control',
			    //'style'       => 'width:200px;',
				'value' => $this->form_validation->set_value('address'),
			);
			$this->data['area'] = array(
				'name'  => 'area',
				'id'    => 'area',
				'type'  => 'text',
				'placeholder' => 'Area',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('area'),
			);
			$this->data['city'] = array(
				'name'  => 'city',
				'id'    => 'city',
				'type'  => 'text',
				'placeholder' => 'City',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('city'),
			);
			$this->data['zip'] = array(
				'name'  => 'zip',
				'id'    => 'zip',
				'type'  => 'text',
				'placeholder' => 'Zip Code',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('zip'),
			);
			$this->data['country'] = array(
				'name'  => 'country',
				'id'    => 'country',
				'type'  => 'text',
				'placeholder' => 'Country',
				'class'       => 'form-control',
				//'style'       => 'width:200px',
				'value' => $this->form_validation->set_value('country'),
			);


			$this->load->view('gameforest/register3', $this->data);
		}
	}

	public function goback()
	{
		redirect($this->session->last_page(2), 'refresh');
	}

	//////////////private functions

	private function _login($identity=NULL, $password=NULL)
	{

		if ($this->ion_auth->login($identity, $password, '1'))
			{
				
				$this->session->set_flashdata('message', $this->ion_auth->messages());

				//redirect(($this->session->userdata('last_page')) ? $this->session->userdata('last_page') : 'games/all', 'refresh');
			}
	}

}

