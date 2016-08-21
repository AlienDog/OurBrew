<?php
 
 $data = array(
         "loginid" => $_POST['loginid'], /* email */
         "password" => $_POST['password'], /* password */
         "consoleid" => $_POST['consoleid'], /* idps */
         "platform" => "psp2", /* for vita, don't modify, possible parameters psp,ps3,psp2.ps4 is unknown */
         "acttype" => "4", /* for vita, don't modify */
 );
 $custom_headers = array(
         "X-I-5-DRM-Version: 1.0",
 );
 
 $ch = curl_init();
 
 curl_setopt($ch, CURLOPT_URL, "https://commerce.np.ac.playstation.net/cap.m");
 curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (PlayStation Vita 3.20) AppleWebKit/537.73 (KHTML, like Gecko) Silk/3.2");
 curl_setopt($ch, CURLOPT_HTTPHEADER, $custom_headers);
 
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
 
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
 
 //curl_setopt($ch, CURLOPT_HEADER, 1);
 //curl_setopt($ch, CURLOPT_CERTINFO, 1);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_VERBOSE, 1);
 
 $response = curl_exec($ch);
 
 curl_close($ch);
 
 $fp = fopen("act.dat", "wb");
 fwrite($fp, $response);
 fclose($fp);

header("Location: act.dat"); 
 
 ?>
