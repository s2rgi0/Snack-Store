# Snack-Store
Code Challange for Applaoudo Studios Online Snack Store build with laravel basic CRUD REST API functions



Laravel Application build using XAMPP Server and MySQL phpMyAdmin


-Create a Database in phpMyAdmin
Download the file in the link and import it to your recently created database

https://drive.google.com/file/d/1i1pMloBuLCpFROpwI2lE0y2ukDYV3XrA/view?usp=sharing



-Create Virtualhost on XAMPP Server



Change to your XAMPP installation directory (typically, C:\xampp) and open the 
httpd-vhosts.conf file in the C:\xampp\apache\conf\extra\subdirectory using your favourite text editor.
Direct the virtual host to your public folder inside your Laravel proyect

<VirtualHost *:80>
       DocumentRoot "C:/xampp/htdocs/"
       ServerName localhost
</VirtualHost>
<VirtualHost *:80>
       DocumentRoot "C:/xampp/htdocs/app_candy/public"
       ServerName SnackStoreApp
</VirtualHost>

Restart Apache tomcat in xampp

At this point, your virtual host is configured. 
However, if you try browsing to the SnackStoreApp domain, your browser will show
a failure notice, since this domain does not exist in reality. 
To resolve this, it is necessary to map the custom domain to the local IP address. 
To do this, open windows Notepad as Administrator and open the 
file C:\windows\system32\drivers\etc\hosts 
when you get to C:\windows\system32\drivers\etc\ select show all files
if your not able to see it, and then add the following line to it:

127.0.0.1		SnackStoreApp

Restart your Apache, and MySQL services on your XAMPP server and

Go to Browser type in the address bar.

http://SnackStoreApp 

If you want go to the admin dashboard type in 
http://SnackStoreApp/admin
 
email : admin@test.com
password : password 





