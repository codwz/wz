<?php
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, 'https://profile.callofduty.com/cod/login'); 
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
   curl_setopt($ch, CURLOPT_HEADER, 1);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET'); 
   

   $datos = curl_exec($ch);
    $pos = strrpos($datos, "Set-Cookie: XSRF-" );
    $xsrf = substr($datos,$pos+12,100);
    $_csrf = substr($datos,$pos+23,100);
    $fields = array('username' => 'xxxxxxxxxx', 'password' => 'xxxxxxxxxxx', 'remember_me' => 'true', '_csrf'=> $_csrf);
    $fstring = http_build_query($fields);
   
    $aHeaderInfo = curl_getinfo($ch);
    $curlHeaderSize=$aHeaderInfo['header_size'];
    $cookies = [];
    $sBody = trim(mb_substr($datos, $curlHeaderSize));
    $ResponseHeader = explode("\n",trim(mb_substr($datos, 0, $curlHeaderSize)));
    unset($ResponseHeader[0]);
    $aHeaders = array();
    foreach($ResponseHeader as $line){
    list($key,$val) = explode(':',$line,2);
    if ($key== "Set-Cookie") {
        $cookies[] = $val;
    }else{
        $aHeaders[strtolower($key)] = trim($val);
    };
        
};



echo '<pre>';

var_dump($aHeaders);

echo "\n\n\n\n\n";


echo "<pre>";
var_dump($cookies);
echo "<pre>";



   

    /*curl_setopt_array($ch, array(
        CURLOPT_URL => 'https://profile.callofduty.com/do_login?new_SiteId=cod',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $fstring,
      ));
      
      $response = curl_exec($ch);
      echo $response;
   //echo $data; */









  /*  function get_headers_from_curl_response($response)
{
    $headers = array();

    $header_text = substr($response, 0, strpos($response, "\r\n\r\n"));

    foreach (explode("\r\n", $header_text) as $i => $line)
        if ($i === 0)
            $headers['http_code'] = $line;
        else
        {
            list ($key, $value) = explode(': ', $line);

            $headers[$key] = $value;
        }

    return $headers;
}*/
?>