<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tfl_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->config('aa_config', TRUE);
		$this->load->helper(array('cookie', 'date'));
		$this->load->library(array(''));
		//$this->lang->load('aa');
	}
	
	
	function frontpage_what_we_do()
	{
		$query = $this->db->select('*')
						  ->order_by('position', 'asc')
						  ->limit(4)
						  ->get('frontpage_whatwedo');

						  //var_dump($query->result());
		
		return $query->result();
	}

	function header_query()
	{
		$query = $this->db->select('*')
						  ->order_by('id', 'asc')
						  //->limit(4)
						  ->get('header')
						  ->result_array();


		return $query;
	}
	function footer_query()
	{
		$query = $this->db->select('*')
						  ->order_by('id', 'asc')
						  //->limit(4)
						  ->get('footer')
						  ->result_array();
						  
		return $query;
	}
	
	function frontpage_who_we_are()
	{
		$query = $this->db->select('*')
						  ->order_by('id', 'asc')
						  ->limit(1)
						  ->where('id', '1')
						  ->get('frontpage_whoweare')
						  ->row_array();
						  //var_dump($query->result());
		
		return $query;
	}
	function frontpage_why_us()
	{
		$query = $this->db->select('*')
						  ->order_by('id', 'asc')
						  ->limit(3)
						  ->get('frontpage_whyus');

						  //var_dump($query->result());
		
		return $query->result();
	}
	function frontpage_slider()
	{
		$query = $this->db->select('*')
						  ->order_by('position', 'asc')
						  ->limit(10)
						  ->get('frontpage_slider');

						  //var_dump($query->result());
		
		return $query->result();
	}

	function footer_socialshare()
	{
		$query = $this->db->select('*')
						  ->order_by('id', 'asc')
						  ->limit(5)
						  ->get('footer_social_share');

						  //var_dump($query->result());
		
		return $query->result();
	}

	function frontpage_client_icon()
	{
		$query = $this->db->select('*')
						  ->order_by('id', 'asc')
						  ->limit(20)
						  ->get('frontpage_clienticon');

						  //var_dump($query->result());
		
		return $query->result();
	}

	function products_view_all($limit=NULL, $start=NULL)
	{
		$query = $this->db->select('*')
						  ->order_by('updatetime', 'asc')
						  ->limit(30)
						  //->Offset($start)
						  //->join('users', 'products_main.userid = users.id', 'inner')
						  //->group_by('products_main.postid')
		                  ->get('products_main')
		                  ->result_array();

		foreach ($query as $key => $value) {
			
		$query[$key]['categories'] = $this->db->select('*')
							    ->limit(10)
							    ->join('products_category', 'products_category.id = products_category_relation.categoryid')
							    ->where('products_category_relation.productsid', $value['id'])
							    //->Offset($start)
							    //->group_by('products_main.postid')
			                  ->get('products_category_relation')
			                  ->result_array();

		}

		return $query;
	}

	function products_view_all_new($limit=NULL, $start=NULL)
	{
		$query = $this->db->select('*')
						  ->order_by('updatetime', 'desc')
						  ->limit(30)
		                  ->get('products_main')
		                  ->result_array();

		foreach ($query as $key => $value) {
			
		$query[$key]['categories'] = $this->db->select('*')
							    ->limit(10)
							    ->where('cid', $value['id'])
				                ->get('categories')
				                ->row_array();
		}

		return $query;
	}

	function products_view_tag($tid=NULL) // working
	{ 
		$query = $this->db->select('products_main.id,products_main.url, products_main.name, products_main.details, products_main.featured, products_main.imageurl1, products_main.categoryid, products_main.updatetime')
						  ->order_by('updatetime', 'desc')
						  ->limit(30)
						  ->join('tags_relation', 'tags_relation.id = products_main.id', 'inner')
						  ->where('tags_relation.tagsid', $tid)
						  //->group_by('products_main.id')
		                  ->get('products_main')
		                  ->result_array();

		/*foreach ($query as $key => $value) {
			
		$query[$key]['tags'] = $this->db->select('tags.tagsid, tags.tagstitle')
							   ->limit(10)
							   ->join('tags', 'tags.tagsid = products_main.tagsid')
							   ->where('products_main.tagsid', $value['id'])
							    //->Offset($start)
							    //->group_by('products_main.postid')
			                  ->get('tags')
				              ->row_array();
		}*/

		foreach ($query as $key => $value) {
			
		$query[$key]['categories'] = $this->db->select('*')
							    ->limit(10)
							    ->where('cid', $value['categoryid'])
				                ->get('categories')
				                ->row_array();
		}
		//var_dump($query);
		return $query;
	}

	function products_view_featured($limit=NULL, $start=NULL)
	{
		$query = $this->db->select('id, url, name, details, featured, imageurl1, categoryid, updatetime')
						  ->order_by('updatetime', 'desc')
						  ->where('featured', '1')
						  ->limit(5)
		                  ->get('products_main')
		                  ->result_array();

		foreach ($query as $key => $value) {
			
		$query[$key]['categories'] = $this->db->select('cid, cname, curl')
							    ->limit(10)
							    ->where('cid', $value['categoryid'])
				                ->get('categories')
				                ->row_array();
		}

		return $query;
	}
	function products_view_recent($limit=NULL, $start=NULL)
	{
		$query = $this->db->select('id, url, name, details, featured, imageurl1, categoryid, updatetime')
						  ->order_by('updatetime', 'desc')
						  ->limit(8)
		                  ->get('products_main')
		                  ->result_array();

		foreach ($query as $key => $value) {
			
		$query[$key]['categories'] = $this->db->select('cid, cname, curl')
							    ->limit(10)
							    ->where('cid', $value['categoryid'])
				                ->get('categories')
				                ->row_array();
		}
		//var_dump($query);
		return $query;
	}

	function get_products_category()
	{
		$query = $this->db->select('*')
						  ->order_by('categoryname', 'asc')
						  //->limit(10)
						  ->get('products_category')
						  ->result_array();

						  
		return $query;
	}
	function get_products_sub_category($cid=NULL)
	{
		$query = $this->db->select('*')
						  ->order_by('subname', 'asc')
						  //->limit(10)
						  ->where('products_category_sub.parentid', $cid)
						  ->get('products_category_sub')
						  ->result_array();

						  
		return $query;
	}
	function get_products_industry()
	{
		$query = $this->db->select('*')
						  ->order_by('industryname', 'asc')
						  //->limit(10)
						  ->get('products_industry')
						  ->result_array();

						  
		return $query;
	}
	function get_products_technology()
	{
		$query = $this->db->select('*')
						  ->order_by('technologyname', 'asc')
						  //->limit(10)
						  ->get('products_technology')
						  ->result_array();

						  
		return $query;
	}

	function products_view_single($pid=NULL)
	{	
		//$query['product'] = $this->db->select('blog_post_category.*, blog_category.categoryname, blog_post.*, users.id as userid, users.username, users.first_name, users.last_name, users.email')
		$query['product'] = $this->db->select('products_main.*, categories.cid as categoryid, categories.cname as categoryname, categories.curl as categoryurl')
						  ->order_by('updatetime', 'desc')
						  ->where('products_main.id', $pid)
						  ->limit(1)
						  ->join('categories', 'categories.cid =  products_main.categoryid', 'left')
						  //->group_by('blog_post.postid')
						  ->get('products_main')
						  ->row_array();

		/*

		$query['comments'] = $this->db->select('blog_comment.*, users.first_name, users.last_name')
							      ->limit(10)
							      ->join('blog_comment', 'blog_comment.commentid = blog_post_comment.commentid', 'left')
							      ->where('blog_post_comment.postid', $postid)
							      ->join('users', 'blog_comment.author = users.id', 'inner')
							    //->Offset($start)
							    //->group_by('blog_post.postid')
			                    ->get('blog_post_comment')
			                    ->result_array();

		$query['commentcount'] = $this->db->from('blog_comment')
												->join('blog_post_comment', 'blog_comment.commentid = blog_post_comment.commentid')
												->where('blog_post_comment.postid', $postid)
												->count_all_results();

		//var_dump($query);*/
												
		return $query;
	}

	function get_category_intro($cid=NULL)
	{
		$query = $this->db->select('*')
						  ->where('categories.cid', $cid)
						  ->limit(1)
						  ->get('categories')
						  ->row_array();


		$query['parent'] = $this->db->select('cname as name, cid as id')
							  ->where('categories.cid', $query['parentid'])
							  ->limit(1)
							  ->get('categories')
							  ->row_array();

						  
		return $query;
	}
	function get_industry_intro($cid=NULL)
	{
		$query = $this->db->select('*')
						  ->where('products_industry.id', $cid)
						  ->limit(1)
						  ->get('products_industry')
						  ->row_array();

						  
		return $query;
	}
	function get_technology_intro($cid=NULL)
	{
		$query = $this->db->select('*')
						  ->where('products_technology.id', $cid)
						  ->limit(1)
						  ->get('products_technology')
						  ->row_array();

						  
		return $query;
	}

	function products_view_category($cid=NULL) 
	{
		$query = $this->db->select('*')
						  ->order_by('updatetime', 'asc')
						  ->limit(30)
						  ->join('products_category_relation', 'products_category_relation.productsid = products_main.id', 'left')
						  ->where('products_category_relation.categoryid', $cid)
						  //->group_by('products_main.id')
		                  ->get('products_main')
		                  ->result_array();

		foreach ($query as $key => $value) {
			
		$query[$key]['categories'] = $this->db->select('*')
							    ->limit(1)
							    ->join('products_category', 'products_category.id = products_category_relation.categoryid')
							    ->where('products_category_relation.productsid', $value['id'])
							    //->Offset($start)
							    //->group_by('products_main.postid')
			                  ->get('products_category_relation')
			                  ->row_array();
		}

		return $query;
	}
	function products_view_industry($cid=NULL) 
	{
		$query = $this->db->select('*')
						  ->order_by('updatetime', 'asc')
						  ->limit(30)
						  ->join('products_category_relation', 'products_category_relation.productsid = products_main.id', 'left')
						  ->where('products_category_relation.industryid', $cid)
						  //->group_by('products_main.id')
		                  ->get('products_main')
		                  ->result_array();

		foreach ($query as $key => $value) {
			
		$query[$key]['industries'] = $this->db->select('*')
							    ->limit(10)
							    ->join('products_industry', 'products_industry.id = products_category_relation.industryid')
							    ->where('products_category_relation.productsid', $value['id'])
							    //->Offset($start)
							    //->group_by('products_main.postid')
			                  ->get('products_category_relation')
			                  ->result_array();
		}

		return $query;
	}
	function products_view_technology($cid=NULL) 
	{
		$query = $this->db->select('*')
						  ->order_by('updatetime', 'asc')
						  ->limit(30)
						  ->join('products_category_relation', 'products_category_relation.productsid = products_main.id', 'left')
						  ->where('products_category_relation.categoryid', $cid)
						  //->group_by('products_main.id')
		                  ->get('products_main')
		                  ->result_array();

		foreach ($query as $key => $value) {
			
		$query[$key]['technologies'] = $this->db->select('*')
							    ->limit(10)
							    ->join('products_technology', 'products_technology.id = products_category_relation.technologyid')
							    ->where('products_category_relation.productsid', $value['id'])
							    //->Offset($start)
							    //->group_by('products_main.postid')
			                  ->get('products_category_relation')
			                  ->result_array();
		}

		return $query;
	}

	function products_cat_check($key=NULL, $id=NULL )
	{
		$query = $this->db->select('*')
						  //->limit(10)
						  ->where('id', $id)
						  ->get('products_'.$key)
						  ->num_rows() > '0';

		//if ($query > "0") { return TRUE; } else {return FALSE; }
		return $query;				  
	}

	function products_cat_check_new($cid=NULL)
	{
		$query = $this->db->select('*')
						  //->limit(10)
						  ->where('cid', $cid)
						  ->get('categories')
						  ->num_rows() > '0';

		//if ($query > "0") { return TRUE; } else {return FALSE; }
		return $query;				  
	}
	function products_cat_url_check($cname=NULL)
	{
		$query = $this->db->select('*')
						  //->limit(10)
						  ->where('curl', $cname)
						  ->get('categories')
						  ->num_rows() > '0';

		//if ($query > "0") { return TRUE; } else {return FALSE; }
		return $query;				  
	}
	function products_tags_check($tname=NULL)
	{
		$query = $this->db->select('*')
						  //->limit(10)
						  ->where('tagsname', $tname)
						  ->get('tags')
						  ->num_rows() > '0';

		//if ($query > "0") { return TRUE; } else {return FALSE; }
		return $query;				  
	}
	function products_check($pname=NULL)
	{
		$query = $this->db->select('*')
						  //->limit(10)
						  ->where('url', $pname)
						  ->get('products_main')
						  ->num_rows() > '0';

		//if ($query > "0") { return TRUE; } else {return FALSE; }
		return $query;				  
	}

	function custom_cat_view($catid)
	{
		
		
		$query = $this->db->select('*')
						  //->limit(10)
						  ->where('parentid', $catid)
						  ->get('category');

		
		return $query->row();	

		
	}

	public function getCategoryTreeForParentId($parent_id = 0) { ////// Most Charming main 
	  $categories = array();
	  $this->db->from('categories');
	  $this->db->where('parentid', $parent_id);
	  $this->db->order_by('cname');
	  $result = $this->db->get()->result();
	  foreach ($result as $mainCategory) {
	    $category = array();
	    $category['id'] = $mainCategory->cid;
	    $category['name'] = $mainCategory->cname;
	    $category['parent_id'] = $mainCategory->parentid;
	    $category['url'] = $mainCategory->curl;
	    $category['sub_categories'] = $this->getCategoryTreeForParentId($category['id']);
	    $categories[$mainCategory->cid] = $category;
	  }
	  /*
	  foreach ($categories as $value) {
	  	$this->db->select('cname');
	  	$this->db->from('categories');
		$this->db->where('parentid', $value['parent_id']);
		$categories['parent_name'] = $this->db->get()->row_array();
	  }*/
	  return $categories;
	}

		/*		"SELECT * FROM products WHERE category_id = '$your_category_id'
			OR category_id IN (
			  SELECT parent_id FROM categories 
			    WHERE id = '$your_category_id'
			)"
		*/

	function products_view_category_new($cid=NULL) 
	{
		$query = $this->db->select('products_main.*, categories.cname')
						  ->order_by('updatetime', 'desc')
						  ->limit(30)
						  ->join('categories', 'categories.cid = products_main.categoryid', 'left')
						  ->where('categoryid', $cid)
						  ->or_where('categories.parentid', $cid)
						  //->group_by('products_main.id')
		                  ->get('products_main')
		                  ->result_array();




			

		return $query;
	}

	function products_view_category_new_custom($cid=NULL) 
	{
		$query = $this->db->select('products_main.*, categories.cname')
						  ->order_by('updatetime', 'asc')
						  ->limit(30)
						  ->join('categories', 'categories.cid = products_main.categoryid', 'left')
						  ->where('categoryid', $cid)
						  //->group_by('products_main.id')
		                  ->get('products_main')
		                  ->result_array();

		foreach ($query as $key => $value) {
			
		$query[$key]['category'] = $this->db->select('cid, cname')
							    ->limit(10)
							    ->where('cid', $value['id'])
				                ->get('categories')
				                ->row_array();
		}
			

		return $query;
	}

	function get_contact_page() 
	{
		$query = $this->db->select('*')
						  ->limit(10)
						  ->get('contactpage_info')
		                  ->result_array();
		return $query;
	}

	function get_service_info($cid=NULL) 
	{
		$query = $this->db->select('*')
						  ->order_by('id', 'asc')
						  ->limit(10)
						  ->where('cid', $cid)
		                  ->get('services_page')
		                  ->result_array();
		return $query;
	}

	function get_service_title($cid=NULL)
	{	
		$query 			  = $this->db->select('*')
						  ->where('id', $cid)
						  ->limit(1)
						  ->get('services_page')
						  ->row_array();
		return $query;

	}

	function get_service_others() 
	{
		$query = $this->db->select('*')
						  ->order_by('id', 'asc')
						  ->limit(20)
						  ->get('services_others')
		                  ->result_array();
		return $query;
	}

	public function errors()
	{
		$_output = '';
		foreach ($this->errors as $error)
		{
			$errorLang = $this->lang->line($error) ? $this->lang->line($error) : ' ' . $error . ' ';
			$_output .= $errorLang;
		}
		//$_output .= "Error Defined";

		return $_output;
	}

	function getParentofcid($cid=NULL)
	{	
		$query 			  = $this->db->select('parentid')
						  ->where('cid', $cid)
						  ->limit(1)
						  ->get('categories')
						  ->row_array();
		return $query;

	}

	function products_tags_getid($tname=NULL)
	{	
		$query 			  = $this->db->select('*')
						  ->where('tagsname', $tname)
						  ->limit(1)
						  ->get('tags')
						  ->row_array();
		//var_dump($query);
		return $query;

	}

	function products_cat_getid($cname=NULL)
	{	
		$query 			  = $this->db->select('cid, curl')
						  ->where('curl', $cname)
						  ->limit(1)
						  ->get('categories')
						  ->row_array();
		//var_dump($query);
		return $query;

	}

	function products_getid($pname=NULL)
	{	
		$query 			  = $this->db->select('id, url')
						  ->where('url', $pname)
						  ->limit(1)
						  ->get('products_main')
						  ->row_array();
		//var_dump($query);
		return $query;

	}
	function products_menu_industry()
	{	
		$query 			  = $this->db->select('*')
						  ->limit(6)
						  ->where('menu', '1')
						  ->get('tags')
						  ->result_array();
		//var_dump($query);
		return $query;

	}



/***********************************************************************************
Technology Blogs Boundary
***********************************************************************************/

	function get_blog_post() 
	{
		$query = $this->db->select('blog_page.*,tags.tagsname, tags.tagstitle, tags.tagsid')
						  ->order_by('id', 'desc')
						  ->limit(20)
						  ->join('tags', 'tags.tagsname = blog_page.tagsname', 'inner')
		                  ->get('blog_page')
		                  ->result_array();
		return $query;
	}

	function get_blog_post_single($tname=NULL) 
	{
		$query = $this->db->select('blog_page.*,tags.tagsname, tags.tagstitle, tags.tagsid')
						  ->order_by('id', 'desc')
						  ->limit(1)
						  ->where('url', $tname)
						  ->join('tags', 'tags.tagsname = blog_page.tagsname', 'inner')
		                  ->get('blog_page')
		                  ->row_array();
		return $query;
	}

	function get_common_blog_tittle() 
	{
		$query = $this->db->select('id, full_name, url')
						  ->order_by('id', 'desc')
						  ->limit(20)
		                  ->get('blog_page')
		                  ->result_array();
		return $query;
	}

	function blogs_post_check($tname=NULL)
	{
		$query = $this->db->select('*')
						  //->limit(10)
						  ->where('url', $tname)
						  ->get('blog_page')
						  ->num_rows() > '0';

		//if ($query > "0") { return TRUE; } else {return FALSE; }
		return $query;				  
	}

	function get_related_products($tid=NULL) // working
	{ 
		$query = $this->db->select('products_main.id,products_main.url, products_main.name, products_main.details, products_main.featured, products_main.imageurl1, products_main.categoryid, products_main.updatetime')
						  ->order_by('updatetime', 'desc')
						  ->limit(30)
						  ->join('tags_relation', 'tags_relation.id = products_main.id', 'inner')
						  ->where('tags_relation.tagsid', $tid)
						  //->group_by('products_main.id')
		                  ->get('products_main')
		                  ->result_array();

		/*foreach ($query as $key => $value) {
			
		$query[$key]['tags'] = $this->db->select('tags.tagsid, tags.tagstitle')
							   ->limit(10)
							   ->join('tags', 'tags.tagsid = products_main.tagsid')
							   ->where('products_main.tagsid', $value['id'])
							    //->Offset($start)
							    //->group_by('products_main.postid')
			                  ->get('tags')
				              ->row_array();
		}*/
		foreach ($query as $key => $value) {
			
		$query[$key]['categories'] = $this->db->select('*')
							    ->limit(10)
							    ->where('cid', $value['categoryid'])
				                ->get('categories')
				                ->row_array();
		}
		//var_dump($query);
		return $query;
	}

	function get_tags_name_admin($tid=NULL)
	{
		$query = $this->db->select('tagsname')
						  ->limit(1)
						  ->where('tagsid', $tid)
						  ->get('tags')
						  ->row_array;

		//if ($query > "0") { return TRUE; } else {return FALSE; }
						  var_dump($query);
		return $query;				  
	}


/***********************************************************************************
Edutech Boundary
***********************************************************************************/

	function get_edutech_videos($eid=NULL)
		{

			$query = $this->db->select('id, name, summary, thumblink, videolink, categoryid, viewcount, updatetime')
						  ->order_by('updatetime', 'asc')
						  //->limit($limit)
						  //->Offset($start)
						  ->where('categoryid', $eid)
		                  ->get('edutech_videos')
		                  ->result_array();

		    foreach ($query as $key => $value) 
		    {
				$query[$key]['category'] 	= $this->db->select('*')
									   	->limit(10)
									    ->where('eid', $value['categoryid'])
						                ->get('edutech_categories')
						                ->row_array();
			}
			
			return $query;
		}
		function get_edutech_videos_all()
		{

			$query = $this->db->select('id, name, summary, thumblink, videolink, categoryid, viewcount, updatetime')
						  ->order_by('updatetime', 'asc')
						  //->limit($limit)
						  //->Offset($start)
						  ->join('edutech_categories', 'edutech_categories.eid = edutech_videos.categoryid', 'left')
						  ->get('edutech_videos')
		                  ->result_array();

		                  //var_dump($query);
		    foreach ($query as $key => $value) {
			
			$query[$key]['category'] 	= $this->db->select('*')
									   	->limit(10)
									    ->where('eid', $value['categoryid'])
										//->group_by('products_main.postid')
						                ->get('edutech_categories')
						                ->row_array();
			}

			
			return $query;
		}

		function edutech_get_side_category() 
		{
			$query = $this->db->select('*')
							  ->limit(20)
							  ->get('edutech_categories')
			                  ->result_array();
			
			return $query;
		}

		function edutech_get_slide_video() 
		{
			$query = $this->db->select('id, name, summary, thumblink, Videolink, viewcount, updatetime')
						  ->order_by('id', 'desc')
						  ->limit('5')
						  ->where('featured', '1')
						  ->get('edutech_videos')
		                  ->result_array();
			//var_dump($query);
			return $query;
		}

		function edutech_get_recent_video() 
		{
			$query = $this->db->select('id, name, summary, thumblink, Videolink, viewcount, updatetime')
						  ->order_by('updatetime', 'desc')
						  ->limit('5')
						  //->Offset($start)
						  ->get('edutech_videos')
		                  ->result_array();
			//var_dump($query);
			return $query;
		}

		function get_edutech_video_single($vid = NULL)
	{	
			$query    = $this->db->select('id, name, summary, description, thumblink, videolink, categoryid, viewcount, updatetime, eid, ename')
					  ->where('id', $vid)
					  ->join('edutech_categories', 'edutech_categories.eid = edutech_videos.categoryid', 'left')
					  ->limit(1)
					  ->get('edutech_videos')
					  ->row_array();

			 $this->db->select('viewcount')
					  ->where('id', $vid)
					  ->set('viewcount', 'viewcount+1', FALSE)
					  ->update('edutech_videos');
		return $query;
	}
	
	function edutech_count_video()
	{
		$query = $this->db->get('edutech_videos')
	                  ->num_rows();
		//var_dump($query);
		return $query;
	}

	function get_edutech_videos_featured()
	{

		$query = $this->db->select('id, name, thumblink, viewcount, updatetime')
					  ->order_by('id', 'RANDOM')
					  ->limit('8')
					  ->get('edutech_videos')
	                  ->result_array();

		return $query;
	}

	function get_edutech_front_slider() 
	{
		$query = $this->db->select('*')
					  ->order_by('position', 'asc')
					  ->limit('8')
					  //->Offset($start)
					  ->get('edutech_slider')
	                  ->result_array();
		//var_dump($query);
		return $query;
	}

	function edutech_header_query()
	{
		$query = $this->db->select('*')
						  ->order_by('id', 'asc')
						  ->get('edutech_header')
						  ->result_array();
		return $query;
	}

/***********************************************************************************
Gameshop Boundary
***********************************************************************************/

	function gameshop_slider()
	{
		$query = $this->db->select('*')
						  ->order_by('position', 'asc')
						  ->limit(10)
						  ->get('gameshop_slider');

						  //var_dump($query->result());
		
		return $query->result_array();
	}

/*	
	function gameshop_tags_menu()
	{	
		$query 			  = $this->db->select('*')
						  ->limit(6)
						  ->where('gameshop', '1')
						  ->get('tags')
						  ->result_array();
		//var_dump($query);
		return $query;

	}
*/
	public function getmenuwithparent($parentid = 0) { ////// Most Charming main 
	  $categories = array();
	  $this->db->from('gameshop_categories');
	  $this->db->where('parentid', $parentid);
	  $this->db->order_by('cname');
	  $result = $this->db->get()->result();
	  foreach ($result as $mainCategory) {
	    $category = array();
	    $category['cid'] = $mainCategory->cid;
	    $category['cname'] = $mainCategory->cname;
	    $category['parentid'] = $mainCategory->parentid;
	    $category['curl'] = $mainCategory->curl;
	    $category['fontawesome'] = $mainCategory->fontawesome;
	    $category['sub_categories'] = $this->getmenuwithparent($category['cid']);
	    $categories[$mainCategory->cid] = $category;
	  }
	  return $categories;
	}

	function gameshop_cat_url_check($cname=NULL)
	{
		$query = $this->db->select('*')
						  //->limit(10)
						  ->where('curl', $cname)
						  ->get('gameshop_categories')
						  ->num_rows() > '0';

		//if ($query > "0") { return TRUE; } else {return FALSE; }
		return $query;				  
	}

	function gameshop_cat_id_check($cid=NULL)
	{
		$query = $this->db->select('*')
						  //->limit(10)
						  ->where('cid', $cid)
						  ->get('gameshop_categories')
						  ->num_rows() > '0';

		//if ($query > "0") { return TRUE; } else {return FALSE; }
		return $query;				  
	}

	function gameshop_product_url_check($cname=NULL)
	{
		$query = $this->db->select('*')
						  //->limit(10)
						  ->where('url', $cname)
						  ->get('gameshop_products')
						  ->num_rows() > '0';

		//if ($query > "0") { return TRUE; } else {return FALSE; }
		return $query;				  
	}

	function gameshop_product_id_check($gid=NULL)
	{
		$query = $this->db->select('*')
						  //->limit(10)
						  ->where('id', $gid)
						  ->get('gameshop_products')
						  ->num_rows() > '0';

		//if ($query > "0") { return TRUE; } else {return FALSE; }
		return $query;				  
	}
	
	function gameshop_cat_getid($cname=NULL)
	{	
		$query 			  = $this->db->select('cid, curl')
						  ->where('curl', $cname)
						  ->limit(1)
						  ->get('gameshop_categories')
						  ->row_array();
		//var_dump($query);
		return $query;

	}

	function gameshop_getParentofcid($cid=NULL)
	{	
		$query 			  = $this->db->select('parentid')
						  ->where('cid', $cid)
						  ->limit(1)
						  ->get('gameshop_categories')
						  ->row_array();
		return $query;

	}

	function gameshop_product_getid($name=NULL)
	{	
		$query 			  = $this->db->select('id, url')
						  ->where('url', $name)
						  ->limit(1)
						  ->get('gameshop_products')
						  ->row_array();
		//var_dump($query);
		return $query;

	}

	function gameshop_view_all($limit=NULL, $start=NULL)
	{
		$query = $this->db->select('gameshop_products.id, gameshop_products.url, gameshop_products.name, gameshop_products.details, gameshop_products.featured, gameshop_products.imageurl1, gameshop_products.categoryid, gameshop_products.price, gameshop_products.discount')
						  ->order_by('updatetime', 'desc')
						  ->limit(30)
		                  ->get('gameshop_products')
		                  ->result_array();

		foreach ($query as $key => $value) {
			
		$query[$key]['categories'] = $this->db->select('*')
							    ->limit(10)
							    ->where('cid', $value['categoryid'])
				                ->get('gameshop_categories')
				                ->row_array();
		}

		return $query;
	}

	function gameshop_view_category($gid=NULL) 
	{
		$query = $this->db->select('gameshop_products.id, gameshop_products.url, gameshop_products.name, gameshop_products.details, gameshop_products.featured, gameshop_products.imageurl1, gameshop_products.categoryid, gameshop_products.price, gameshop_products.discount, gameshop_categories.*')
						  ->order_by('updatetime', 'desc')
						  ->limit(30)
						  ->join('gameshop_categories', 'gameshop_categories.cid = gameshop_products.categoryid', 'left')
						  ->where('categoryid', $gid)
						  ->or_where('gameshop_categories.parentid', $gid)
						  //->group_by('products_main.id')
		                  ->get('gameshop_products')
		                  ->result_array();

		return $query;
	}

	function gameshop_view_category_v2($gid=NULL) 
	{
		$query = $this->db->select('gameshop_products.id, gameshop_products.url, gameshop_products.name, gameshop_products.details, gameshop_products.featured, gameshop_products.imageurl1, gameshop_products.categoryid, gameshop_products.price, gameshop_products.discount, gameshop_categories.*')
						  ->order_by('updatetime', 'desc')
						  ->limit(30)
						  ->join('gameshop_categories', 'gameshop_categories.cid = gameshop_products.categoryid', 'left')
						  ->where('categoryid', $gid)
						  ->or_where('gameshop_categories.parentid', $gid)
						  //->group_by('products_main.id')
		                  ->get('gameshop_products')
		                  ->result_array();

		return $query;
	}

	function gameshop_view_featured_category($gid=NULL) 
	{
		$query = $this->db->select('gameshop_products.id, gameshop_products.url, gameshop_products.name, gameshop_products.details, gameshop_products.featured, gameshop_products.imageurl1, gameshop_products.categoryid, gameshop_products.price, gameshop_products.discount, gameshop_categories.*')
						  ->order_by('updatetime', 'desc')
						  ->limit(30)
						  ->join('gameshop_categories', 'gameshop_categories.cid = gameshop_products.categoryid', 'left')
						  ->where('categoryid', $gid)
						  ->where('gameshop_products.featured', '1')
						  ->or_where('gameshop_categories.parentid', $gid)
						  ->where('gameshop_products.featured', '1')
						  //->group_by('products_main.id')
		                  ->get('gameshop_products')
		                  ->result_array();

		return $query;
	}

	function gameshop_product_view($pid=NULL)
	{	
		//$query['product'] = $this->db->select('blog_post_category.*, blog_category.categoryname, blog_post.*, users.id as userid, users.username, users.first_name, users.last_name, users.email')
		$query = $this->db->select('gameshop_products.*, gameshop_categories.*')
						  ->order_by('updatetime', 'desc')
						  ->where('gameshop_products.id', $pid)
						  ->limit(1)
						  ->join('gameshop_categories', 'gameshop_categories.cid =  gameshop_products.categoryid', 'left')
						  //->group_by('blog_post.postid')
						  ->get('gameshop_products')
						  ->row_array();
												
		return $query;
	}

	function gameshop_related_product($gid=NULL) 
	{
		$query = $this->db->select('gameshop_products.id, gameshop_products.url, gameshop_products.name, gameshop_products.details, gameshop_products.featured, gameshop_products.imageurl1, gameshop_products.categoryid, gameshop_products.price, gameshop_products.discount, gameshop_categories.*')
						  ->order_by('updatetime', 'desc')
						  ->limit(5)
						  ->join('gameshop_categories', 'gameshop_categories.cid = gameshop_products.categoryid', 'left')
						  ->where('categoryid', $gid)
						  ->or_where('gameshop_categories.parentid', $gid)
						  //->group_by('products_main.id')
		                  ->get('gameshop_products')
		                  ->result_array();

		return $query;
	}

	function gameshop_latest_products($gid=NULL)
	{
		$query = $this->db->select('gameshop_products.id, gameshop_products.url, gameshop_products.name, gameshop_products.details, gameshop_products.featured, gameshop_products.imageurl1, gameshop_products.categoryid, gameshop_products.price, gameshop_products.discount')
						  ->order_by('updatetime', 'desc')
						  ->limit(8)
						  ->join('gameshop_categories', 'gameshop_categories.cid = gameshop_products.categoryid', 'left')
						  ->where('categoryid', $gid)
						  ->or_where('gameshop_categories.parentid', $gid)
		                  ->get('gameshop_products')
		                  ->result_array();

		foreach ($query as $key => $value) {
			
		$query[$key]['categories'] = $this->db->select('*')
							    ->limit(10)
							    ->where('cid', $value['categoryid'])
				                ->get('gameshop_categories')
				                ->row_array();
		}

		return $query;
	}

	function gameshop_featured_products($gid=NULL)
	{
		$query = $this->db->select('gameshop_products.id, gameshop_products.url, gameshop_products.name, gameshop_products.details, gameshop_products.featured, gameshop_products.imageurl1, gameshop_products.categoryid, gameshop_products.price, gameshop_products.discount')
						  ->order_by('updatetime', 'desc')
						  ->limit(4)
						  ->join('gameshop_categories', 'gameshop_categories.cid = gameshop_products.categoryid', 'left')
						  ->where('categoryid', $gid)
						  ->where('featured', '1')
						  ->or_where('gameshop_categories.parentid', $gid)
		                  ->get('gameshop_products')
		                  ->result_array();

		foreach ($query as $key => $value) {
			
		$query[$key]['categories'] = $this->db->select('*')
							    ->limit(10)
							    ->where('cid', $value['categoryid'])
				                ->get('gameshop_categories')
				                ->row_array();
		}
		//var_dump($query);
		return $query;
	}

	function gameshop_get_featured_menu($gid=NULL)
	{
		$query = $this->db->select('*')
						  ->order_by('position', 'asc')
						  ->limit(4)
		                  ->get('gameshop_featured_menu')
		                  ->result_array();

		//var_dump($query);
		return $query;
	}
	
	function gameshop_free_offers()
	{
		$query = $this->db->select('*')
						  ->order_by('count', 'asc')
						  //->limit(4)
		                  ->get('gameshop_free_offers')
		                  ->result_array();

		//var_dump($query);
		return $query;
	}

	function gameshop_foffers_update_counts($gid=NULL)
	{
		if($this->db->set('count', 'count+1', FALSE)
				 ->where('id',$gid)
				 ->update('gameshop_free_offers'))
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function gameshop_check_duplicate_cart($cart=NULL)
	{
		if ($this->ion_auth->logged_in())
		{
		    $query = $this->db->select('*')
						  ->where('userid', $cart['userid'])
						  ->where('productid', $cart['productid'])
						  ->get('gameshop_cart')
		                  ->num_rows() > '0';
		}
		else 
		{
		    $query = $this->db->select('*')
						  ->where('sessionid', $cart['sessionid'])
						  ->where('productid', $cart['productid'])
						  ->get('gameshop_cart')
		                  ->num_rows() > '0';
		}

		return $query;

		
	}

	function gameshop_update_to_cart($cart=NULL)
	{
		$quantity = $cart['quantity'];
		if ($this->ion_auth->logged_in())
		{
			echo $quantity;
		    $this->db->set('quantity', 'quantity +' . (int) $quantity, FALSE)
				 ->where('userid', $cart['userid'])
				 ->where('productid', $cart['productid'])
				 ->update('gameshop_cart');
		}
		else 
		{
		    $this->db->set('quantity', 'quantity + ' . $cart['quantity'], FALSE)
				 ->where('sessionid', $cart['sessionid'])
				 ->where('productid', $cart['productid'])
				 ->update('gameshop_cart');
		}

		$this->db->where('month(gameshop_cart.datetime)<=', date("m")-1)
				 ->delete('gameshop_cart');
	}

	function gameshop_add_to_cart($cart=NULL)
	{
		$this->db->insert('gameshop_cart', $cart);

		$this->db->where('month(gameshop_cart.datetime)<=', date("m")-1)
				 ->delete('gameshop_cart');
	}

	function gameshop_cart_product_list($cart=NULL)
	{
		if (!empty($cart['userid']) && !($cart['userid'] == '0')) {
			$this->db->set('userid', $cart['userid'])
					 ->where('sessionid', $cart['sessionid'])
					 ->update('gameshop_cart');
		}
		
		if($this->db->select('*')->where('id', $cart['userid'])->get('users')->num_rows() > '0'){
			

			$query = $this->db->select('gameshop_products.id, gameshop_products.url, gameshop_products.name, gameshop_products.imageurl1, gameshop_products.categoryid, gameshop_products.price, gameshop_products.discount, gameshop_categories.curl, gameshop_categories.cname, gameshop_cart.id as sid, gameshop_cart.quantity as productquantity')
							  ->order_by('datetime', 'desc')
							  ->where('gameshop_cart.userid', $cart['userid'])
							  ->join('gameshop_products', 'gameshop_products.id =  gameshop_cart.productid', 'left')
							  ->join('gameshop_categories', 'gameshop_categories.cid =  gameshop_products.categoryid', 'left')
							  //->group_by('blog_post.postid')
							  ->get('gameshop_cart')
							  ->result_array();

							  //var_dump($query);
			return $query;
		} else {
			$query = $this->db->select('gameshop_products.id, gameshop_products.url, gameshop_products.name, gameshop_products.imageurl1, gameshop_products.categoryid, gameshop_products.price, gameshop_products.discount, gameshop_categories.curl, gameshop_categories.cname, gameshop_cart.id as sid, gameshop_cart.quantity as productquantity')
							  ->order_by('datetime', 'desc')
							  ->where('gameshop_cart.sessionid', $cart['sessionid'])
							  ->join('gameshop_products', 'gameshop_products.id =  gameshop_cart.productid', 'left')
							  ->join('gameshop_categories', 'gameshop_categories.cid =  gameshop_products.categoryid', 'left')
							  //->group_by('blog_post.postid')
							  ->get('gameshop_cart')
							  ->result_array();

							  //var_dump($query);
			return $query;
		}
	}

	function gameshop_cart_delete_item($cart=NULL)
	{
		if ($this->db->where('id', $cart['sid'])->where('sessionid', $cart['sessionid'])->or_where('id', $cart['sid'])->where('userid', $cart['userid'])->delete('gameshop_cart')) {
			return TRUE;
		} else {
			return FALSE;
		}
		//$this->db->where('id', $cart['productid'])->where('sessionid', $cart['sessionid'])->or_where('productid', $cart['productid'])->where('userid', $cart['userid'])->delete('gameshop_cart'))
	}

	function gameshop_cart_quantity_update($cart=NULL)
	{
		$this->db->set('quantity', $cart['quantity'], FALSE)
				 ->where('id', $cart['sid'])
				 ->update('gameshop_cart');
				 
		//$this->db->where('id', $cart['productid'])->where('sessionid', $cart['sessionid'])->or_where('productid', $cart['productid'])->where('userid', $cart['userid'])->delete('gameshop_cart'))
	}

	/*function gameshop_cart_delete_item_session($cart=NULL)
	{
		if($this->db->delete('gameshop_cart', array('productid' => $cart['productid'], 'sessionid' => $cart['sessionid']))){
			return TRUE;
		} else {
			return FALSE;
		}

	}

	function gameshop_cart_delete_item_user($cart=NULL)
	{
		if($this->db->delete('gameshop_cart', array('productid' => $cart['productid'], 'userid' => $cart['userid']))){
			return TRUE;
		} else {
			return FALSE;
		}


	}*/

	function gameshop_get_cart_products($cart=NULL)
	{
		if (!empty($cart['userid'])) {
			$this->db->set('userid', $cart['userid'])
					 ->where('sessionid', $cart['sessionid'])
					 ->update('gameshop_cart');
		}

		$query = $this->db->select('gameshop_products.id, gameshop_products.url, gameshop_products.name, gameshop_cart.quantity, gameshop_products.imageurl1, gameshop_products.categoryid, gameshop_products.price, gameshop_products.discount, users.id as userid')
						  ->order_by('datetime', 'desc')
						  ->where('gameshop_cart.userid', $this->session->userdata('user_id'))
						  ->join('gameshop_products', 'gameshop_products.id =  gameshop_cart.productid', 'left')
						  ->join('users', 'users.id =  gameshop_cart.userid', 'left')
						  ->get('gameshop_cart')
						  ->result_array();

						  //var_dump($query);

		return $query;

	}

	function gameshop_check_cart_products($cart=NULL)
	{
		if($this->db->select('*')->where('userid', $cart['userid'])->get('users')->num_rows() > '0'){
			$query = $this->db->select('id')
							  ->order_by('datetime', 'desc')
							  ->where('userid', $cart['userid'])
							  ->get('gameshop_cart')
							  ->result_array();

							  //var_dump($query);

			return $query;
		} else {
			$query = $this->db->select('id')
							  ->order_by('datetime', 'desc')
							  ->where('sessionid', $cart['sessionid'])
							  ->get('gameshop_cart')
							  ->result_array();

							  //var_dump($query);

			return $query;
		}

	}

	function gameshop_get_menu_cart()
	{
		$cart['userid'] = $this->session->userdata('user_id');
		$cart['sessionid'] = $this->session->userdata('session_id');

		if (!empty($cart['userid'])) {
			$this->db->set('userid', $cart['userid'])
					 ->where('sessionid', $cart['sessionid'])
					 ->update('gameshop_cart');
		}
		if ($cart['userid']>'0') {
			
			$query = $this->db->select('gameshop_products.id, gameshop_products.url, gameshop_products.name, gameshop_products.imageurl1, gameshop_products.categoryid, gameshop_products.price, gameshop_products.discount, users.id as userid, gameshop_categories.cname, gameshop_categories.curl, gameshop_cart.quantity, gameshop_cart.datetime')
							  ->order_by('datetime', 'desc')
							  //->limit(5)
							  ->where('gameshop_cart.userid', $this->session->userdata('user_id'))
							  ->join('gameshop_products', 'gameshop_products.id =  gameshop_cart.productid', 'left')
							  ->join('users', 'users.id =  gameshop_cart.userid', 'left')
							  ->join('gameshop_categories', 'gameshop_categories.cid = gameshop_products.categoryid')
							  ->get('gameshop_cart')
							  ->result_array();

							  //var_dump($this->session->all_userdata());

			return $query;
		} else {
			
			$query = $this->db->select('gameshop_products.id, gameshop_products.url, gameshop_products.name, gameshop_products.imageurl1, gameshop_products.categoryid, gameshop_products.price, gameshop_products.discount, users.id as userid, gameshop_categories.cname, gameshop_categories.curl, gameshop_cart.quantity, gameshop_cart.datetime')
							  ->order_by('datetime', 'desc')
							  //->limit(5)
							  ->where('gameshop_cart.sessionid', $this->session->userdata('session_id'))
							  ->join('gameshop_products', 'gameshop_products.id =  gameshop_cart.productid', 'left')
							  ->join('users', 'users.id =  gameshop_cart.userid', 'left')
							  ->join('gameshop_categories', 'gameshop_categories.cid = gameshop_products.categoryid')
							  ->get('gameshop_cart')
							  ->result_array();

							  //var_dump($this->session->all_userdata());

			return $query;
		}

	}

	function gameshop_add_to_user($products = NULL)
	{
		foreach ($products as $value) {
			$this->db->set('paymentid', $value['paymentid'])
					 ->set('productid', $value['productid'])
					 ->set('userid', $value['userid'])
					 ->set('amount', $value['amount'])
					 ->insert('gameshop_payments');

			$this->db->set('productid', $value['productid'])
					 ->set('userid', $value['userid'])
					 ->set('licenseid', $value['licenseid'])
					 ->set('licensestatus', $value['licensestatus'])
					 ->insert('gameshop_licenses');

			$this->db->set('orderdate', 'NOW()', FALSE)
					 ->set('productid', $value['productid'])
			 		 ->set('userid', $value['userid'])
 		 		 	 ->set('paymentid', $value['paymentid'])
 		 		 	 ->set('licenseid', $value['licenseid'])
				 	 ->insert('gameshop_user_products');
		}
		
		$uid = $this->session->userdata('user_id');
		if($this->db->delete('gameshop_cart', array('userid' => $uid))){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function gameshop_get_buylist()
	{

		$query = $this->db->select('gameshop_user_products.orderdate, gameshop_user_products.paymentid, gameshop_user_products.userid, gameshop_user_products.licenseid, gameshop_products.id, gameshop_products.url, gameshop_products.name, gameshop_products.imageurl1, gameshop_products.categoryid, gameshop_products.price, gameshop_products.discount, gameshop_products.discountprice, gameshop_payments.paymentstatus, gameshop_payments.deliverystatus, gameshop_payments.amount, gameshop_licenses.licensestatus')
						  ->order_by('orderdate', 'asc')
						  ->where('gameshop_user_products.userid', $this->session->userdata('user_id'))
						  ->join('gameshop_products', 'gameshop_products.id =  gameshop_user_products.productid', 'left')
						  ->join('gameshop_payments', 'gameshop_payments.paymentid =  gameshop_user_products.paymentid', 'left')
						  ->join('gameshop_licenses', 'gameshop_licenses.licenseid =  gameshop_user_products.licenseid', 'left')
						  ->group_by('gameshop_payments.paymentid')
						  ->get('gameshop_user_products')
						  ->result_array();

						  //var_dump($query);

		return $query;

	}

	function gameshop_check_paymentid($payid=NULL)
	{
		$query = $this->db->select('*')
						  //->limit(10)
						  ->where('paymentid', $payid)
						  ->get('gameshop_payments')
						  ->num_rows() > '0';

		//if ($query > "0") { return TRUE; } else {return FALSE; }
		return $query;				  
	}

	function gameshop_get_payment_data($pid=NULL)
	{
		$query = $this->db->select('gameshop_payments.*, gameshop_products.name')
						  //->limit(10)
						  ->where('paymentid', $pid)
						  ->join('gameshop_products', 'gameshop_products.id =  gameshop_payments.productid', 'inner')
						  ->group_by('paymentid')
						  ->get('gameshop_payments')
						  ->row_array();

	    //var_dump($query);
		return $query;				  
	}

	function gameshop_update_payment($pid=NULL, $additional_data=NULL)
	{
		$this->db->set('paymentdate', 'NOW()', FALSE)
				 ->where('paymentid', $pid)
				 ->update('gameshop_payments', $additional_data);

		$this->errors = array('Updates Successful');
		return true;
	}

	function gameshop_get_license_data($lid=NULL)
	{
		$query = $this->db->select('gameshop_licenses.*, gameshop_products.name')
						  //->limit(10)
						  ->where('licenseid', $lid)
						  ->join('gameshop_products', 'gameshop_products.id =  gameshop_licenses.productid', 'inner')
						  ->group_by('licenseid')
						  ->get('gameshop_licenses')
						  ->row_array();

	    //var_dump($query);
		return $query;				  
	}


	function gameshop_add_purchase_order($value = NULL)
	{
		
		$this->db->set('orderno', $value['orderno'])
				 ->set('ordertime', 'NOW()', FALSE)
				 ->set('userid', $value['userid'])
				 ->set('totalprice', $value['totalprice'])
				 ->set('discount', $value['discount'])
				 ->set('status', $value['status'])
				 ->insert('gameshop_purchase_orders');
		return TRUE;
	}


	function gameshop_add_products_order($products = NULL)
	{
		//var_dump($products);
		foreach ($products as $value) {
			$this->db->set('productid', $value['id'])
					 ->set('orderno', $value['orderno'])
					 ->set('unitprice', $value['unitprice'])
					 ->set('quantity', $value['quantity'])
					 ->set('discount', $value['discount'])
					 ->set('netprice', $value['netprice'])
					 ->set('netpricewd', $value['netpricewd'])
					 ->insert('gameshop_purchase_products');
		}

		$uid = $this->session->userdata('user_id');
		if($this->db->delete('gameshop_cart', array('userid' => $uid))){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function gameshop_manage_orders($info=NULL)
	{
		$query = $this->db->select('gameshop_purchase_orders.*, users.first_name, users.last_name, users.username, users.phone, gameshop_purchase_order_statuslist.name as statusname')
						  ->limit(10)
						  ->order_by('ordertime', 'desc')
						  ->where('userid', $info['userid'])
						  ->join('gameshop_purchase_order_statuslist', 'gameshop_purchase_order_statuslist.id =  gameshop_purchase_orders.status', 'left')
						  ->join('users', 'users.id =  gameshop_purchase_orders.userid', 'left')
						  //->join('users', 'users.id =  gameshop_purchase_orders.userid', 'left')
						  ->group_by('orderno')
						  ->get('gameshop_purchase_orders')
						  ->result_array();

	    //var_dump($query);
		return $query;				  
	}

	function gameshop_get_order_info($orderno=NULL)
	{
		$query = $this->db->select('gameshop_purchase_orders.*, gameshop_purchase_order_statuslist.name as statusname')
						  ->limit(1)
						  ->where('orderno', $orderno)
						  //->join('gameshop_purchase_order_statuslist', 'gameshop_purchase_order_statuslist.id =  gameshop_purchase_orders.status', 'left')
						  ->join('gameshop_purchase_order_statuslist', 'gameshop_purchase_order_statuslist.id =  gameshop_purchase_orders.status', 'left')
						  //->group_by('id')
						  ->get('gameshop_purchase_orders')
						  ->row_array();

	    //var_dump($query);
		return $query;				  
	}

	function gameshop_get_order_details($orderno=NULL)
	{
		$query = $this->db->select('gameshop_purchase_products.*, gameshop_products.name')
						  ->limit(10)
						  ->order_by('id', 'desc')
						  ->where('orderno', $orderno)
						  ->join('gameshop_products', 'gameshop_products.id =  gameshop_purchase_products.productid', 'left')
						  //->join('users', 'users.id =  gameshop_purchase_orders.userid', 'left')
						  //->join('users', 'users.id =  gameshop_purchase_orders.userid', 'left')
						  //->group_by('id')
						  ->get('gameshop_purchase_products')
						  ->result_array();

	    //var_dump($query);
		return $query;				  
	}

	function gameshop_add_users($profiledata = NULL)
	{
		
		if ($this->db->insert('gameshop_users_profile', $profiledata))
		{
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	function gameshop_update_users($profiledata = NULL)
	{
		$eid = $this->session->userdata('email');
		if ($this->db->where('email', $eid)->update('gameshop_users_profile', $profiledata))
		{
			if ($this->db->set('first_name', $profiledata['firstname'])->set('last_name', $profiledata['lastname'])->set('phone', $profiledata['mobile'])->where('email', $eid)->update('users'))
			{
				$this->errors = array('Updates Successful');
				return true;
			}
			
		} else {
			return FALSE;
		}
		
	}

	function gameshop_add_payments($payments_data=NULL)
	{
		if ($this->db->insert('gameshop_payments_2', $payments_data))
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function gameshop_check_payments($orderno=NULL)
	{
		$query = $this->db->select('*')
						  //->limit(10)
						  ->where('orderno', $orderno)
						  ->get('gameshop_payments_2')
						  ->num_rows() > '0';

		//if ($query > "0") { return TRUE; } else {return FALSE; }
		return $query;				  
	}

	function gameshop_get_payment_details($orderno=NULL)
	{
		$query = $this->db->select('gameshop_payments_2.*, gameshop_payments_2_paymode.paymodename as paymodename')
						  ->limit(1)
						  ->order_by('id', 'desc')
						  ->where('orderno', $orderno)
						  ->join('gameshop_payments_2_paymode', 'gameshop_payments_2_paymode.id =  gameshop_payments_2.paymode', 'left')
						  //->join('users', 'users.id =  gameshop_purchase_orders.userid', 'left')
						  //->join('users', 'users.id =  gameshop_purchase_orders.userid', 'left')
						  //->group_by('id')
						  ->get('gameshop_payments_2')
						  ->row_array();

	    //var_dump($query);
		return $query;				  
	}

	function gameshop_get_profile_data()
	{
		$eid = $this->session->userdata('email');
		$query = $this->db->select('*')
						  ->where('email', $eid)
						  //->join('gameshop_products', 'gameshop_products.id =  gameshop_purchase_products.productid', 'left')
						  //->join('users', 'users.id =  gameshop_purchase_orders.userid', 'left')
						  //->join('users', 'users.id =  gameshop_purchase_orders.userid', 'left')
						  //->group_by('id')
						  ->get('gameshop_users_profile')
						  ->row_array();

	    //var_dump($query);
		return $query;				  
	}

	function gameshop_update_order_status($orderno=NULL)
	{
		$this->db->set('status', '2')
				 ->where('orderno', $orderno)
				 ->update('gameshop_purchase_orders');

		$this->errors = array('Updates Successful');
		return true;
	}

	function gameshop_get_license_info($orderno=NULL)
	{
		$uid = $this->session->userdata('user_id');
		$query = $this->db->select('gameshop_licenses.*, gameshop_products.name')
						  ->where('userid', $uid)
						  ->where('orderno', $orderno)
						  ->join('gameshop_products', 'gameshop_products.id =  gameshop_licenses.productid', 'left')
						  //->join('users', 'users.id =  gameshop_purchase_orders.userid', 'left')
						  //->join('users', 'users.id =  gameshop_purchase_orders.userid', 'left')
						  //->group_by('id')
						  ->get('gameshop_licenses')
						  ->result_array();

	    //var_dump($query);
		return $query;				  
	}


	function gameshop_get_license_info_single($orderno=NULL, $productid=NULL)
	{
		$uid = $this->session->userdata('user_id');
		$query = $this->db->select('gameshop_licenses.*, gameshop_products.name')
						  ->where('orderno', $orderno)
						  ->where('productid', $productid)
						  ->where('userid', $uid)
						  ->join('gameshop_products', 'gameshop_products.id =  gameshop_licenses.productid', 'left')
						  //->join('users', 'users.id =  gameshop_purchase_orders.userid', 'left')
						  //->join('users', 'users.id =  gameshop_purchase_orders.userid', 'left')
						  //->group_by('id')
						  ->get('gameshop_licenses')
						  ->row_array();

	    //var_dump($query);
		return $query;				  
	}

	function gameshop_get_profile_data_single()
	{
		$uid = $this->session->userdata('email');
		$query = $this->db->select('*')
						  ->where('email', $uid)
						  ->get('gameshop_users_profile')
						  ->row_array();

	    //var_dump($query);
		return $query;				  
	}

	function gameshop_get_page_single($pageurl=NULL)
	{
		$query = $this->db->select('*')
						  ->where('url', $pageurl)
						  ->get('gameshop_pages')
						  ->row_array();

	    //var_dump($query);
		return $query;				  
	}

	function gameshop_get_data($data=NULL)
	{
		$query = $this->db->select('*')
						  ->where('name', $data)
						  ->get('gameshop_data')
						  ->result_array();

		$nquery = array();
		foreach ($query as $row)
		{
		   $nquery[$row['name']] = $row;
		}
	    //var_dump($nquery);
		return $nquery;				  
	}

























/***********************************************************************************
Old Database, Not in Use
***********************************************************************************/


	function blog_view_all()
	{
		$query = $this->db->select('*')
						  ->order_by('create_time', 'desc')
						  ->limit(10)
						  ->join('users', 'products_main.userid = users.id', 'inner')
						  //->join('products_main_tag', 'products_main_tag.postid = products_main.postid', 'left')
						  ->group_by('products_main.postid')
						  ->get('products_main');

						  //var_dump($query->result());
		
		
		
		return $query->result();
	}
	
	function blog_view_all_new($limit=NULL, $start=NULL)
	{
		$query = $this->db->select('products_main.*, users.first_name, users.last_name, users.ip_address, users.username, users.email, users.company, users.phone')
						  ->order_by('create_time', 'asc')
						  ->limit($limit)
						  ->Offset($start)
						  ->join('users', 'products_main.userid = users.id', 'inner')
						  ->group_by('products_main.postid')
		                  ->get('products_main')
		                  ->result_array();
		foreach ($query as $key => $value) {
			
		$query[$key]['tags'] = $this->db->select('blog_tag.tagid, blog_tag.tagtitle')
							    ->limit(10)
							    ->join('blog_tag', 'blog_tag.tagid = products_main_tag.tagid')
							    ->where('products_main_tag.postid', $value['postid'])
							    //->Offset($start)
							    //->group_by('products_main.postid')
			                  ->get('products_main_tag')
			                  ->result_array();

		$query[$key]['categories'] = $this->db->select('blog_category.categoryid, blog_category.categoryname')
							    ->limit(10)
							    ->join('blog_category', 'blog_category.categoryid = products_main_category.categoryid')
							    ->where('products_main_category.postid', $value['postid'])
							    //->Offset($start)
							    //->group_by('products_main.postid')
			                  ->get('products_main_category')
			                  ->result_array();

		$query[$key]['commentcount'] = $this->db->from('blog_comment')
												->join('products_main_comment', 'blog_comment.commentid = products_main_comment.commentid')
												->where('products_main_comment.postid', $value['postid'])
												->count_all_results();

		}
		//$query = $this->array_merge_custom($aa, $query);
		//var_dump($query);
		//var_dump($aa);
		//var_dump($aa);
		return $query;
	}

	function blog_view_category($id=NULL, $limit=NULL, $start=NULL) // working
	{
		$query = $this->db->select('products_main.*, users.first_name, users.last_name, users.ip_address, users.username, users.email, users.company, users.phone')
						  ->order_by('create_time', 'asc')
						  ->limit($limit)
						  ->Offset($start)
						  ->join('users', 'products_main.userid = users.id', 'inner')
						  ->join('products_main_category', 'products_main_category.postid = products_main.postid', 'inner')
						  ->where('products_main_category.categoryid', $id)
						  ->group_by('products_main.postid')
		                  ->get('products_main')
		                  ->result_array();
		foreach ($query as $key => $value) {
			
		$query[$key]['tags'] = $this->db->select('blog_tag.tagid, blog_tag.tagtitle')
							    ->limit(10)
							    ->join('blog_tag', 'blog_tag.tagid = products_main_tag.tagid')
							    ->where('products_main_tag.postid', $value['postid'])
							    //->Offset($start)
							    //->group_by('products_main.postid')
			                  ->get('products_main_tag')
			                  ->result_array();

		$query[$key]['categories'] = $this->db->select('blog_category.categoryid, blog_category.categoryname')
							    ->limit(10)
							    ->join('blog_category', 'blog_category.categoryid = products_main_category.categoryid')
							    ->where('products_main_category.postid', $value['postid'])
							    //->Offset($start)
							    //->group_by('products_main.postid')
			                  ->get('products_main_category')
			                  ->result_array();

		$query[$key]['commentcount'] = $this->db->from('blog_comment')
												->join('products_main_comment', 'blog_comment.commentid = products_main_comment.commentid')
												->where('products_main_comment.postid', $value['postid'])
												->count_all_results();

		}
		
		return $query;
	}

	function blog_view_tag($id=NULL, $limit=NULL, $start=NULL) // working
	{
		$query = $this->db->select('products_main.*, users.first_name, users.last_name, users.ip_address, users.username, users.email, users.company, users.phone')
						  ->order_by('create_time', 'asc')
						  ->limit($limit)
						  ->Offset($start)
						  ->join('users', 'products_main.userid = users.id', 'inner')
						  ->join('products_main_tag', 'products_main_tag.postid = products_main.postid', 'inner')
						  ->where('products_main_tag.tagid', $id)
						  ->group_by('products_main.postid')
		                  ->get('products_main')
		                  ->result_array();
		foreach ($query as $key => $value) {
			
		$query[$key]['tags'] = $this->db->select('blog_tag.tagid, blog_tag.tagtitle')
							    ->limit(10)
							    ->join('blog_tag', 'blog_tag.tagid = products_main_tag.tagid')
							    ->where('products_main_tag.postid', $value['postid'])
							    //->Offset($start)
							    //->group_by('products_main.postid')
			                  ->get('products_main_tag')
			                  ->result_array();

		$query[$key]['categories'] = $this->db->select('blog_category.categoryid, blog_category.categoryname')
							    ->limit(10)
							    ->join('blog_category', 'blog_category.categoryid = products_main_category.categoryid')
							    ->where('products_main_category.postid', $value['postid'])
							    //->Offset($start)
							    //->group_by('products_main.postid')
			                  ->get('products_main_category')
			                  ->result_array();

		$query[$key]['commentcount'] = $this->db->from('blog_comment')
												->join('products_main_comment', 'blog_comment.commentid = products_main_comment.commentid')
												->where('products_main_comment.postid', $value['postid'])
												->count_all_results();

		}
		
		return $query;
	}

	function blog_view_post($postid=NULL)
	{
		$query['post'] = $this->db->select('products_main_category.*, blog_category.categoryname, products_main.*, users.id as userid, users.username, users.first_name, users.last_name, users.email')
						  ->order_by('create_time', 'desc')
						  ->where('products_main.postid', $postid)
						  ->limit(1)
						  ->join('users', 'products_main.userid = users.id', 'inner')
						  ->join('products_main_category', 'products_main_category.postid = products_main.postid', 'left')
						  ->join('blog_category', 'blog_category.categoryid = products_main_category.categoryid', 'left')
						  //->group_by('products_main.postid')
						  ->get('products_main')
						  ->row_array();

		$query['tags'] = $this->db->select('blog_tag.tagid, blog_tag.tagtitle')
							      ->limit(10)
							      ->join('blog_tag', 'blog_tag.tagid = products_main_tag.tagid')
							      ->where('products_main_tag.postid', $postid)
							    //->Offset($start)
							    //->group_by('products_main.postid')
			                    ->get('products_main_tag')
			                    ->result_array();

		$query['comments'] = $this->db->select('blog_comment.*, users.first_name, users.last_name')
							      ->limit(10)
							      ->join('blog_comment', 'blog_comment.commentid = products_main_comment.commentid', 'left')
							      ->where('products_main_comment.postid', $postid)
							      ->join('users', 'blog_comment.author = users.id', 'inner')
							    //->Offset($start)
							    //->group_by('products_main.postid')
			                    ->get('products_main_comment')
			                    ->result_array();

		$query['commentcount'] = $this->db->from('blog_comment')
												->join('products_main_comment', 'blog_comment.commentid = products_main_comment.commentid')
												->where('products_main_comment.postid', $postid)
												->count_all_results();

		//var_dump($query);
												
		return $query;
	}

	function get_blog_cats()
	{
		$query = $this->db->select('*')
						  ->order_by('categoryname', 'asc')
						  ->limit(10)
						  ->get('blog_category')
						  ->result_array();

						  
		return $query;
	}

	function get_blog_tags()
	{
		$query = $this->db->select('*')
						  ->order_by('frequency', 'desc')
						  ->limit(10)
						  ->get('blog_tag')
						  ->result_array();

						  
		return $query;
	}

	function blog_cat_tag_check($key=NULL, $id=NULL )
	{
		$query = $this->db->select('*')
						  //->limit(10)
						  ->where($key.'id', $id)
						  ->get('blog_'.$key)
						  ->num_rows() > '0';

		//if ($query > "0") { return TRUE; } else {return FALSE; }
		return $query;				  
	}

	function post_all_count()
	{
		$query = $this->db->count_all_results('products_main');

		return $query;
	}

	function post_tag_count($id=NULL)
	{
		$query = $this->db->join('products_main_tag', 'products_main_tag.postid = products_main.postid', 'inner')
						  ->where('products_main_tag.tagid', $id)
		                  ->count_all_results('products_main');

		return $query;
	}

	function post_category_count($id=NULL)
	{
		$query = $this->db->join('products_main_category', 'products_main_category.postid = products_main.postid', 'inner')
						  ->where('products_main_category.categoryid', $id)
		                  ->count_all_results('products_main');

		return $query;
	}

	function test()
	{
		return 'AA';
	}

	function project_get_data()
	{
		$query = $this->db->select('*')
						  ->order_by('timedate', 'desc')
						  ->limit(10)
						  ->get('project')
						  ->result_array();

		return $query;
	}

	function project_add_data($data)
	{
		if ($this->db->insert('project', $data))
		{
			return "successful";
		} else 
		{
			return "unsuccessful";
		}
	}

}