<?php






/* Resources :
*      https://freegeoip.app
*      https://www.daniweb.com/programming/web-development/code/216846/get-http-request-headers-and-body
*      Aquatone report css (i've steal it from there)
*      PHP community
*      Everyone who helped me to get into hacking
*      https://codepen.io/dope/pen/ZQWBeL
*/









include 'mydb.php';


/*
* SHOW TARGETS
*/



$q = 'SELECT * FROM targets';
$mysql_get = mysqli_query($db_con ,$q);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BlackThrone - WhizzHandrixx</title>
    <style type="text/css">
  <style type="text/css">
      /*! normalize.css v7.0.0 | MIT License | github.com/necolas/normalize.css */button,hr,input{overflow:visible}audio,canvas,progress,video{display:inline-block}progress,sub,sup{vertical-align:baseline}[type=checkbox],[type=radio],legend{box-sizing:border-box;padding:0}html{line-height:1.15;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}article,aside,details,figcaption,figure,footer,header,main,menu,nav,section{display:block}h1{font-size:2em;margin:.67em 0}figure{margin:1em 40px}hr{box-sizing:content-box;height:0}code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em}a{background-color:transparent;-webkit-text-decoration-skip:objects}abbr[title]{border-bottom:none;text-decoration:underline;text-decoration:underline dotted}b,strong{font-weight:bolder}dfn{font-style:italic}mark{background-color:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative}sub{bottom:-.25em}sup{top:-.5em}audio:not([controls]){display:none;height:0}img{border-style:none}svg:not(:root){overflow:hidden}button,input,optgroup,select,textarea{font-family:sans-serif;font-size:100%;line-height:1.15;margin:0}button,select{text-transform:none}[type=reset],[type=submit],button,html [type=button]{-webkit-appearance:button}[type=button]::-moz-focus-inner,[type=reset]::-moz-focus-inner,[type=submit]::-moz-focus-inner,button::-moz-focus-inner{border-style:none;padding:0}[type=button]:-moz-focusring,[type=reset]:-moz-focusring,[type=submit]:-moz-focusring,button:-moz-focusring{outline:ButtonText dotted 1px}fieldset{padding:.35em .75em .625em}legend{color:inherit;display:table;max-width:100%;white-space:normal}textarea{overflow:auto}[type=number]::-webkit-inner-spin-button,[type=number]::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}[type=search]::-webkit-search-cancel-button,[type=search]::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}[hidden],template{display:none}/*,body{background-color: #2a2730}*/

      body {
        font-family: Atlas Grotesk Web,helvetica neue,helvetica,arial,sans-serif;
        color: #9b5d;
        background-color: black;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        overflow-y: scroll;
      }

      h1,h2,h3,h4,h5,h6 {
        color: #774a4b;
        font-weight: 400;
      }

      p {
        margin:0 0 1em 0;
        line-height:1.5;
        font-size:17px;
      }

      p:last-child {
        margin-bottom:0;
      }

      a {
        color: Gray;
        text-decoration:underline;
      }

      a:hover {}

      th {
        text-align: left;
      }

      h1 weak, h2 weak {
        display: block;
        margin-top: 5px;
      }

      h1.title {
        padding-bottom: 50px;
      }

      h1 weak {
        font-size: 18px;
      }

      h2 weak {
        font-size: 14px;
      }

      .content {
        padding: 0px 20px 0px 20px;
      }

      .logo {
        background-color: #2a2730;
        color: #99979c;
        margin: 0px 0px 50px 0px;
        font-weight: bold;
      }

      .logo a {
        color: #99979c;
      }

      .logo weak {
        font-weight: normal;
      }

      .pages td {
        text-align: left;
        vertical-align: top;
      }

      .pages .details {
        padding-left: 20px;
      }

      .pages td.screenshot, .pages td.details {
        padding-bottom: 100px;
      }

      .pages .details h2 {
        margin: 0px;
        font-weight: bold;
      }

      .pages img.screenshot {
        display: block;
        width: 350px;
        border: 1px solid #494a4b;
      }

      .pages .response-headers {
        margin-top: 20px;
        min-width: 350px;
        border-spacing: 0px;
        border-collapse: collapse;
      }

      .pages .response-headers tbody {
        font-family: Consolas,Menlo,Monaco,Lucida Console,Liberation Mono,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier New,monospace,sans-serif;
      }

      .pages .response-headers td, .pages .response-headers th {
        border-bottom: 1px solid #ccc;
      }

      .pages .response-headers tr.danger td {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
      }

      .pages .response-headers tr.success td {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
      }

      .pagination {
        margin: 50px 0px 50px 0px;
        text-align: center;
      }

      .pagination a {
        text-decoration: none;
        border: 1px solid #494a4b;
        display: inline-block;
        padding: 10px;
      }

      .pagination a.disabled {
        cursor: not-allowed;
        opacity: 0.5;
        filter: alpha(opacity=50);
      }

      .pagination a.previous {
        margin-right: 20px;
      }

      .pagination a.next {
        margin-left: 20px;
      }
    </style>
  </head>
  <body>
<pre class="logo">
<div class="content"  onmousewheel=location.reload()>
    ____  __           __      ________                        
   / __ )/ /___ ______/ /__   /_  __/ /_  _________  ____  ___ 
  / __  / / __ `/ ___/ //_/    / / / __ \/ ___/ __ \/ __ \/ _ \
 / /_/ / / /_/ / /__/ , <     / / / / / / /  / /_/ / / / /  __/
/_____/_/\__,_/\___/_/|_|    /_/ /_/ /_/_/   \____/_/ /_/\___/  
<weak>by <a href="https://github.com/CXVVMVII" target="_blank" >@WhizzHundrixx</a></weak>
</div>
</pre>

<div class="content">
    <table class="pages">


      
        
                   




      


        
<?php

/*
* DELETE TARGET QUERIES
*/

if(isset($_GET['delete'])) {
      
      $targ = $_GET['delete'];
      $del_q = "DELETE FROM targets WHERE c_code = '$targ' ";
      $del_e = mysqli_query($db_con, $del_q);

      

}
 /*
 ** PRINT THE TARGETS
 */
while ($rows = mysqli_fetch_assoc($mysql_get)) {
 
   echo "


               <td class='details'>
              <h2>
                <a href=''>".$rows['ip']."</a>
                 <weak>
                  <a href='?delete=".$rows['c_code']."'>Delete</a> 
                  
                </weak>
                
              </h2>
              <table class='response-headers'>
        <tbody>


        <tr class=\"false\">
           <td><strong>IP</strong></td>
           <td>". $rows['ip']. "</td>
         </tr>

         

         <tr class=\"false\">
           <td><strong>From</strong></td>
           <td>". $rows['c_name']. "</td>
         </tr>

         <tr class=\"false\">
           <td><strong>Region</strong></td>
           <td>". $rows['region']. "</td>
         </tr>

         <tr class=\"false\">
           <td><strong>At</strong></td>
           <td>". $rows['time']. "</td>
         </tr>

         <tr class=\"false\">
           <td><strong>Zip</strong></td>
           <td>". $rows['zip']. "</td>
         </tr>

         <tr class=\"false\">
           <td><strong>Country</strong></td>
           <td>". $rows['c_code']. "</td>
         </tr>

         <tr class=\"false\">
           <td><strong>Request&nbsp</strong></td>
           <td>". $rows['headers']. "</td>
         </tr>
         

                  </tbody>
              </table>
            </td>
          </tr>
           ";

}
?>
<!--
/*
*         PHP Black Throne Script To detect websockets and HTTP traffic 
*                 An open source Alternative to burp collaborator
*                 You may use it to scan for Blind SSRF/XSS ,CORS
*   You can also hijack cookies/tokens by xss or invalidated redirections and store'em in
*/





/* Resources :
*      https://freegeoip.app
*      https://www.daniweb.com/programming/web-development/code/216846/get-http-request-headers-and-body
*      Aquatone report css (i've steal it from there)
*      PHP community
*      Everyone who helped me to get into hacking
*/








-->
