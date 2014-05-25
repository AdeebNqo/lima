
EXIM 4 and PHP setup
--------------------

Now, we need to make sure PHP is configured to talk nice to EXIM4. Debian 6 uses EXIM4 as its message transfer agent (MTA) and this is different from other Linux builds where SENDMAIL is normally used. Because of this, the PHP.ini file might be missing the proper configuration to work, as PHP manual page mentions: ‘an honest attempt of locating the sendmail program for you is done and set a default, but if it fails, you can set it manually‘. Let’s open PHP.ini for edition with the following command:
	
# nano /etc/php5/apache2/php.ini (or vim /etc/php5/apache2/php.in)

And search for the section configuring SMTP parameters with Ctrl+W, then type ‘sendmail_path‘ and enter.  Once you  are there, edit the line to the following:
	
# sendmail_path = /usr/sbin/sendmail -t -i

In the same way, order closing the file with Ctrl+X, indicate saving changes with Y and then confirm the name of the file with enter.

Now, restart Apache for the changes to take effect with the following commands:
	
# /etc/init.d/apache2 stop
# /etc/init.d/apache2 start