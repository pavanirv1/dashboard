download phpstorm

download php current version(5.6)
download corresponding xdebug (5.6)

extract both 

extracted php into C:\DEVAPPS\PHP\
extracted xdebug into C:\DEVAPPS\PHP\ext\ 

php.ini-development rename to php.ini
make changes as per php.ini currently on machine (TO MAKE NOTE )

rename php xdebug extension file and enable it in php.ini file


IIS install : turn windows feature on/off-> check internet information services and everything related or you might think is related, check also .net related 

open IIS:

go to handler mappings under IIS 
	click on add module mapping on right side 
		Request Path= *.php
		Module= FastCgiModule
		Executable= C:\DEVAPPS\PHP\php-cgi.exe
		Name = PHP_fast_cgi56
		Request Restriction: check invoke handler and select file or folder option
	Click OK
	Click Yes
	
click on servername

go to fastCGI settings under IIS
	right click on the entry and edit 
	change activity timeout to 7000
		Idle timeout to 3000
	click ok

	
under sites:
	delete default site
	add website
		site name: port0080
		Physical Path: C:\devroot\webpages

open site: http://localhost/Dashboard/dashboard.php
