BlackThrone
======

PHP BlackThrone Script An open source Alternative to burp collaborator
BlackThrone created To detect websockets and HTTP traffic in the main website with provide some server header and client info.
BlackThrone is web based tool to run on webservers with PHP . It will detect the visitor IP,Country,HEADERS ..., 
It will be usefull to scan for Blind SSRF/XSS ,CORS ...
Remember “For Educational Purposes Only” i'm responsable for any illegal uses of this (such as hijacking cookies)






### Setup & Install:
1. Open "mydb.php"
2. Add you DB credentials in there
3. Add table name "targets"
4. Add columns ip, c_name, region, time, zip, c_code, headers
5. Add the main directory on http server & go to /Dashboard.php
6. Open hunter.php you'll notice your info's in dashboard.php

If you still have no clue about what to do follow these steps :

1. open your sql console a,d type the following lines :

```
mysql$ CREATE DATABASE dt;
mysql$ CREATE TABLE `dt`.`targets` ( `ip` VARCHAR(255) NOT NULL , `c_name` VARCHAR(255) NOT NULL , `region` VARCHAR(255) NOT NULL , `time zip` VARCHAR(255) NOT NULL , `c_code` VARCHAR(255) NOT NULL , `headers` VARCHAR(1000000) NOT NULL ) ENGINE = InnoDB;
```


### Usage:
 Hunter.php : to detect the visitors infos
 Dashboard.php : to manages the visitors infos
 You must set it in webhosting server (such as godaddy) because it won't work in the local host
 Don't make requests to another port number ,if your website is on HTTP make 80 and 443 for HTTPS...
 I mean dont send request to https://BlackThrone.com:4444 



###### Resources :
*      https://freegeoip.app
*      https://www.daniweb.com/programming/web-development/code/216846/get-http-request-headers-and-body
*      Aquatone report css (i've steal it from there)
*      PHP community
*      Everyone who helped me to get into hacking
