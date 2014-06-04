#Email for Abalimi

Please do not bother trying to look through code --- not meant for public consumption.

##Stuff 4june

-calling method on list item click
-responding to button clicks
-modal email compose window
-mvc setup
-email folder icons
-search
-list emails per date or read/unread

##EXIM 4 and PHP setup

Now, we need to make sure PHP is configured to talk nice to EXIM4. EXIM4  is the message transfer agent (MTA) of choice, and this is different from where SENDMAIL is normally used. Because of this, the PHP.ini file might be missing the proper configuration to work, as PHP manual page mentions: ‘an honest attempt of locating the sendmail program for you is done and set a default, but if it fails, you can set it manually‘. Let’s open PHP.ini for edition with the following command:
	
`nano /etc/php5/apache2/php.ini (or vim /etc/php5/apache2/php.in)`

And search for the section configuring SMTP parameters with Ctrl+W, then type ‘sendmail_path‘ and enter.  Once you  are there, edit the line to the following:
	
`sendmail_path = /usr/sbin/sendmail -t -i`

In the same way, order closing the file, indicate saving changes with Y (if necessary) and then confirm the name of the file with enter.

Now, restart Apache for the changes to take effect with the following commands:
	
`/etc/init.d/apache2 stop`
`/etc/init.d/apache2 start`
