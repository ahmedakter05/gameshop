<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aa_lib
{
	
	public function __construct()
	{
		$CI =& get_instance();

		//$CI->load->library(array('session', 'breadcrumbs', 'ion_auth'));
		//$CI->load->helper(array('cookie', 'url', 'language'));
		//$CI->lang->load('aa');
		//$CI->load->model('aa_model');
	}

	function nametourl($string = NULL) {
    	$string = utf8_encode($string);
	    $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);   
	    $string = preg_replace('/[^a-z0-9- &]/i', '', $string);
	    $string = str_replace(' ', '_', $string);
	    $string = trim($string, '_');
	    $string = strtolower($string);

	    if (empty($string)) {
	        return 'n-a';
	    }

	    return $string;
	}


}