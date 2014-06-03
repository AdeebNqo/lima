<?php
class email_controller {
	#domain
	private $domain = "abalimi.org";
	#username of controlled account
	private $username;

	function __construct($username){
			
			#replacing all dots with ;'s
			$username = str_replace(".", ";", $username);
			#checking if user exists
			if (!file_exists('/users/'. $username)){
					throw new Exception('No such user.');
			}
			$this->username = $username;
	}
	#
	# Method to return all available folders
	# for user in machine
	#
	function available_folders(){
		$directories = glob('/users/' . $this->username . '/Maildir/*' , GLOB_ONLYDIR);
		return $directories;
	}
	#
	# Get all emails in folder
	#
	function get_emails($folder){
		$emails = scandir('/users/' . $this->username . '/Maildir/' . $folder);
		return emails;
	}
	#
	# Sending email for user
	#
	function send_email($subject, $msg, $recipient){
			$emailheader = 'From: '.$this->username . '@' . $this->domain ." \r\n".
               'Reply-To: '. $this->username .'@'. $this->domain . '\r\n' .
               'X-Mailer: PHP/' . phpversion();
            $result = mail($email_to, $email_subject, $email_message, $headers);
            return $result;
	}
	#
	#
	#
	function isinbox($folder){
		if ($folder== '/users/' . $this->username . 'Maildir/cur'){
			return true;
		}
		else{
			return false;
		}
	}
	#
	#
	#
	#
	function getnumnewemails(){
		$directories = glob('/users/' . $this->username . '/Maildir/new/*');
		return count($directories);
	}
}
?>
