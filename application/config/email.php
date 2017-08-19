<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config['useragent'] = 'CodeIgniter';
$config['protocol'] = 'smtp';
//$config['mailpath'] = '/usr/sbin/sendmail';
$config['smtp_host'] = 'ssl://smtp.googlemail.com';
$config['smtp_user'] = 'ahmed.ngenit';
$config['smtp_pass'] = '4122404621926';
$config['smtp_port'] = 465; 
$config['smtp_timeout'] = 5;
$config['wordwrap'] = TRUE;
$config['wrapchars'] = 76;
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['validate'] = FALSE;
$config['priority'] = 3;
$config['crlf'] = "\r\n";
$config['newline'] = "\r\n";
$config['bcc_batch_mode'] = FALSE;
$config['bcc_batch_size'] = 200;

/* insert this into controller
$this->email->from('ahmed.ngenit@gmail.com', 'ahmed.ngenit@gmail.com');
		$this->email->to('ahmed.akter@ngenitltd.com');
		$this->email->subject('Test email from CI and Gmail');
		$this->email->message('This is a test.');
		$this->email->send();

*/