<?php
  
  $status = 0;
  $message = "something went wrong";
  $data= ""; 
  if(isset($_POST) && $_POST['hostid']!='' && $_POST['roomname']!='' && $_POST['sessionid']!='')
  {
    $sessionid = $_POST['sessionid'];
    $video_array = glob('/opt/jibri/recordings/'.$sessionid."/*.mp4");
    $file_name = $video_array[0];
    $file_name1 = explode('/', $file_name);
    $file_name1 = end($file_name1);
    $dayofyear = date('z') + 1; 

    $hostid = $_POST['hostid'];
    $roomname = $_POST['roomname'];


     $destinationpath = 'recordings/'.date("Y")."/".$dayofyear."/".$hostid."/".$roomname."/";
    

    $destinationfilepath = $destinationpath.$file_name1;

   // mkdir($destinationpath, 0777, true);

    $sessionid = $_POST['sessionid'];
    $rootpath = $file_name;
    $filesize = filesize("$file_name");

    if(file_exists($rootpath))
    {
	  $data =  array();
     // if(rename($rootpath,$destinationfilepath))
     // { 
        $message = "File moved successfully";
        $data['filename'] = $file_name1;
	$data['filesize'] = $filesize;
	//$data['filepath'] = $destinationpath;
	$data['filepath'] = '/opt/jibri/recordings/'.$sessionid."/";
        $status= 1;
     // }
    //  else
    //  {
        $message =  "File move failed" .$rootpath ." destination Path::" .$destinationfilepath;
    //  }
    }
    else
    {
      $message =  "File does not exists";
    }
     
  }
  else
  {
     $message =  "parameters missing";
  }
  
    echo $response = json_encode(array(
        'status' => $status,
        'msg' => $message,
        'data' => $data
        )); 

?>
