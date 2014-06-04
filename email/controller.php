<?php

require_once('emailmodel.php');
//use emailmodel;
class email_controller{
	#domain
	private $domain = "abalimi.org";
	#username of controlled account
	private $username;
	#model
	private $model;
	function __construct($username){
			//parent::__construct();
			#replacing all dots with ;'s
			$username = str_replace(".", ";", $username);
			#checking if user exists
			if (!file_exists('/users/'. $username)){
					throw new Exception('No such user.');
			}
			$this->username = $username;
			$this->model = new emailmodel($username);
	}
	#
	#Method for listing available folders
	function availablefolders(){
		$directories = glob('/users/' . $this->username . '/Maildir/*' , GLOB_ONLYDIR);
		$dirs = array();
		foreach($directories as $dir){
			array_push($dirs,str_replace(substr($dir,0,strrpos($dir, '/')+1),'',$dir));
			
		}
		return $dirs;
	}
	#
	#Method to return the number of new emails
	function getnumnewemails(){
		return $this->model->getnumnewemails();	
	}
	#
	#Method for listing a specified portion of new emails
	function getnewemails($start){
		return $this->model->getnewemails($start);
	}
	#
	#Method for listing a portion of emails from any folder
	function getemails($folder, $start){
		return $this->model->getemails($folder, $start);
	}
	#
	#
	function getusername(){
		return $this->username;
	}
	#
	#Stolen from chad
	function index() {
		$data['view_file'] = 'email_view';

		$this->load->module('template');
		$this->template->admin($data);
	}

	#
	# Sending email for user
	#
	function send_email($subject, $msg, $recipient){
		$emailheader = 'From: '.$this->username . '@' . $this->domain . '\r\n'.
			'Reply-To: '. $this->username . '@'. $this->domain . '\r\n' .
			'X-Mailer: PHP/' . phpversion();
		$result = mail($recipient, $subject, $msg, $emailheader);
		return $result;
	}
	function isinbox($folder){
		return (($folder== 'cur') ? true: false);
	}
}
?>
