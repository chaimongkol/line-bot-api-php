<?php 
function line_notify($Token, $message)
{
        $lineapi = $Token; // ใส่ token key ที่ได้มา
	$mms =  trim($message); // ข้อความที่ต้องการส่ง
	date_default_timezone_set("Asia/Bangkok");
	$chOne = curl_init(); 
	curl_setopt( $chOne, CURLOPT_PROXY, "http://proxy.egat.co.th:8080"); 
	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	// SSL USE 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	//POST 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$mms"); 
	//curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$mms&imageThumbnail=http://www.sirikitdam.egat.com/sk_plant/water/images/sk_ong.jpg&imageFullsize=http://www.sirikitdam.egat.com/sk_plant/water/images/sk_ong.jpg"); 
//curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$mms&imageThumbnail=http://www.sirikitdam.egat.com/sk_plant/water/images/ong1.jpg&imageFullsize=http://www.sirikitdam.egat.com/sk_plant/water/images/ong1.jpg&stickerPackageId=1&stickerId=99"); 

	curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 
	//Check error 
	if(curl_error($chOne)) 
	{ 
           echo 'error:' . curl_error($chOne); 
	} 
	else { 
	$result_ = json_decode($result, true); 
	   echo "status : ".$result_['status']; echo "message : ". $result_['message'];
        } 
	curl_close( $chOne );   
}
//$message = "สวัสดีครับ GER&stickerPackageId=2&stickerId=167"; sorry &stickerPackageId=1&stickerId=107";
$message = array("ทดสอบ Sticker&imageThumbnail=https://vk.com/images/stickers/36/128.png&imageFullsize=https://vk.com/images/stickers/36/128.png");
$Token = "ldAxAPwRhs4oZf6cPWEqKqEsqDL8tjg4lrTzWuS0fVR"; //กะ2
for ($i=0;$i <=1;$i++){
	//echo $i."--".$message[$i];
line_notify($Token, $message[$i]);
}
//$Token1 = "BKmk5ErzKDXlJsQ1wl22yG045MfViWxgnocAn9GLYFK"; // control room
//line_notify($Token1, $message);
//$Token3 = "i6SrPFVwSwxwdhvl8v4rPcPKxEveXqJ2O3OIDbVDwSa"; //hydro
//line_notify($Token3, $message);
//$Token4 = "w5E0gwwb2jhvKShpl7h6kh0RqvHR8VTf9I3BGpJw1hm"; //ผาซ่อม
//line_notify($Token4, $message);

?>