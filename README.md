# Free Dynamic Dns Updater using PHP & DYNU.com
How to Install.

 Requirements :
 For Raspbian OS/DEBIAN :
 
 1.Install Apache server.
 
 2.Install MYSQL server.
 
 3.Install PHP
 
 Install XAMPP for Windows :
 https://www.apachefriends.org/download.html
 
 XAMPP for Linux :
 https://www.apachefriends.org/download.html
 
 Install XAMPP for OS X :
 https://www.apachefriends.org/download.html
 
 
 
 How to Implement.
 Note : Kindly create Dynamic DNS account using dynu->  http://dynu.com
 After creating  DYNU account
 
 1. Create database with name "noti"
 2. Import .sql file (available in extra folder).
 3. Goto folder(functions) and edit file(connection.php), change your hostname, username and password.
 4. In functions folder open "func.php" and edit line 45 . -> CURLOPT_URL => 'https://api.dynu.com/nic/update?hostname=[Your_Host_Name eg google.com]&myip=$ip&password=[your DYNU password in MD5 format]',
 Edit Your Hostname eg google.com or youtube.com and insert your http://dynu.com password[in MD5 format] in password field
 Save and exit the file
 
 
  How to Convert your DYNU password in MD5 has  format -
  link to convert password -> http://www.md5.cz/
  
  Example-
  Password  = HELLO
  Password in MD5  = eb61eead90e3b899c6bcbe27ac581660
