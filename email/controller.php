<?php

#
#ToDo: 1. cache email for quick viewing
#	   2. use the php version of inotify for listening to filesystem changes
#
class email_controller {
	#domain
	private domain = "abalimi.org";

	#username of controlled account
	private $username;
	private function __construct($username){
			
			#replacing all dots with ;'s
			$username = str_replace(".", ";", $username);
			#checking if user exists
			if (!file_exists('/users/'.$username)){
					throw new Exception('No such user.');
			}
			$this->username = $username;
	}
	#
	# Method to return all available folders
	# for user in machine
	#
	function available_folders(){
		$directories = glob('/' . $this->username , GLOB_ONLYDIR);
		return $directories;
	}
	#
	# Get all emails in folder
	#
	function get_emails($folder){
		$emails = scandir('/users/' . $this->username . '/' . $folder);
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
}
?>