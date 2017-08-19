<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include_once(BASEPATH.'libraries/Session.php');

class MY_Session extends CI_Session {

    function __construct() {
        parent::__construct();

        $this->tracker();
    }

    function tracker() {
        $this->CI->load->helper('url');

        $tracker =& $this->userdata('_tracker');

        if( !IS_AJAX ) {  //if error occured then /application/config/constants.php <- define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
            $tracker[] = array(
                'uri'   =>      $this->CI->uri->uri_string(),
                'ruri'  =>      $this->CI->uri->ruri_string(),
                'timestamp' =>  time()
            );
        }

        $this->set_userdata( '_tracker', $tracker );
    }


    function last_page( $offset = 0, $key = 'uri' ) {   
        if( !( $history = $this->userdata('_tracker') ) ) {
            return $this->config->item('base_url');
        }

        $history = array_reverse($history); 

        if( isset( $history[$offset][$key] ) ) {
            return $history[$offset][$key];
        } else {
            return $this->config->item('base_url');
        }
    }
}

// call === $this->session->last_page(2);