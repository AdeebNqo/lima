<?php
//model for email

class emailmodel{

	private $newemails;
	private $username;
	function __construct($username) {
        	$newemails = scandir('/users/' . $username . '/Maildir/new');
		$this->username = $username;
   	}
	#
	#
	function getnumnewemails(){
		return count($this->newemails);
	}
	#
	#Method for listing a specified portion of new emails
	function getnewemails($start){
		$this->newemails = scandir('/users/' . $this->username . '/Maildir/new/');
		return array_slice($this->newemails, $start, ($start+11) % count($this->newemails));
	}
	#
	#Method for listing a portion of emails from any folder
	function getemails($folder, $start){
		$emails = scandir('/users/' . $this->username . '/Maildir/' . $folder);
		return array_slice($emails,$start,($start+11)%count($emails));
	}
}

?>
