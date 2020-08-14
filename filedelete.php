<?php
 
 
$status = 0;  
$data = array();
$message = 'Something went wrong';
	       
//$filepath = 'recordings/'.date("Y")."/".$dayofyear."/".$hostid."/".$roomname."/".$filename;    
$filepath = $_REQUEST['filepath'];

//$directory_array = explode('/', $filepath);
//$directory = end($directory_array);

$path = pathinfo($filepath);
$directory =  $path['dirname']; 
 
// Process download
if(file_exists($filepath)) {
    if(unlink($filepath))
    {
        $status = 1;
        $message = "File deleted succesfully.";

        if (count(glob("$directory/*"))==0) 
            rmdir($directory);
    }
} else { 
  	 $message = "Inavid file";
}
       

	echo $response = json_encode(array(
        'status' => $status,
        'msg' => $message,
        'data' => $data
        ));


?>