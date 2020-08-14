<?php
 
 
$status = 0;  
$data = array();
$message = 'Something went wrong';
	       
//$filepath = 'recordings/'.date("Y")."/".$dayofyear."/".$hostid."/".$roomname."/".$filename;    
$filepath = base64_decode($_REQUEST['filepath']);

// Process download
if(file_exists($filepath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));
    flush(); // Flush system output buffer
    readfile($filepath);
    //echo $filepath; 
    //die();
    $status = 1;
    $message =  $filepath;
} else { 
	$message = "Inavid file";

}
       
echo $response = json_encode(array(
        'status' => $status,
        'msg' => $message,
        'data' => $data
        ));


?>
