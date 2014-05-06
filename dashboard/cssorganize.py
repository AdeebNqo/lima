import sys
import re
import os

filename = sys.argv[1]

#open file for reading
f = open(filename)
lines = f.readlines()
for line in lines:
		a = re.compile("css\/(.)*\.css")
		b = re.compile("js\/(.)*\.js")

		swap = None
		if (a.match(line)):
				swap = a
		elif (b.match(line)):
				swap = b
		csspart = re.search(swap,line)
		line.replace(csspart, "<?php echo base_url(\'assets/"+csspart+"\');?>")
		print(line)
	
