* Download a copy of php(5.6) from http://windows.php.net/downloads/releases/php-5.6.30-nts-Win32-VC11-x64.zip

* Extract the zip file into C:\DEVAPPS\PHP\

*  Copy the php.ini attached in the email into C:\DEVAPPS\PHP\

* Copy all the files attached in the email to the folder C:\webpages\Dashboard\

* Rename the dashboard.js.rename file to dashboard.js

* Start Menu-> Turn Windows Features On/Off -> check all the boxes for and under Internet Information Services and Microsoft .NET Framework, then click OK

* Open Internet Information Services Manager (IIS) from the Start Menu:	
	- Go to Handler Mappings under IIS 
	- Click on Add Module Mapping to the right side and enter the following 
		Request Path= *.php
		Module= FastCgiModule
		Executable= C:\DEVAPPS\PHP\php-cgi.exe
		Name = PHP_FAST_CGI56
		Request Restriction: check invoke handler and select file or folder option
	- Click OK
	- Click Yes
	
	- Under SITES, delete the DEFAULT SITE and then right click SITES to add website and enter the below
		site name: dashboard
		Physical Path: C:\webpages

* Visit the following URL in the browser: http://localhost/Dashboard/dashboard.php
