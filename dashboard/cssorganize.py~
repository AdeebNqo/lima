import sys
import re
import os
import tempfile
import shutil

filename = sys.argv[1]

#open file for reading
f = open(filename)
lines = f.readlines()
#open file for writing
fd, path = tempfile.mkstemp()

print('editing {}'.format(filename))
for line in lines:
	swap = re.compile("\"(.*?)\"")
	match = re.findall(swap,line)
	if (len(match)>0):
		jcsspart = match[0]
		newline = ''
		for item in re.split(swap,line):
			if (item.startswith('css')):
				newline = newline+"\"<?php echo base_url('assets/"+jcsspart+"\');?>"
			else:
				newline = newline+item
					
		os.write(fd,newline)
	else:
		os.write(fd,line)
#deleting current file, creating new formatted file and removing temp file
print('saving file...')
os.remove(filename)
print('creating new file {}'.format(os.getcwd()+'/'+filename))
shutil.copyfile(path,os.getcwd()+'/'+filename)
os.close(fd)
print('done')
	
