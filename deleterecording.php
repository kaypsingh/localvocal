<?php
  $dbconn = pg_connect("host=202.157.87.37 port=5432 dbname=prosody user=prosody password=P@SS0rd@Jitsi") or die("Could not connect");
  $status = 0;  
  $data = '';
  $message = 'Something went wrong';
  $_POST['authkey']= 'M2atKiuCGKOo9Mj3';
  if(isset($_POST) )
  {  
    $authentickey = ''; // 'M2atKiuCGKOo9Mj3';
    $authkey = ''; //$_POST['authkey']; 
    if($authkey==$authentickey)
    {  
      $query1  = "SELECT * from conference_recording where upload_date < NOW() - interval '7 day'"; 
      $prepare = pg_prepare($dbconn, "prepare2", $query1);
      if(!$prepare)
      $message = "Cannot prepare statement"; 
      $response = pg_execute($dbconn, "prepare2", array()); 
      if(pg_last_error($dbconn))
      {
         $message =  pg_last_error($dbconn);
      }else
      {
        $totalrecords =  pg_num_rows($response); 

        if($totalrecords)
        {
          $result = pg_fetch_all($response);
          //echo "<pre>";
          foreach ($result as $key => $value) {
            //print_r($value); die;
            $filepath = $value['file_path'];
            if(file_exists($filepath))
              unlink($filepath);
          }
        }
 
        $query2  = "DELETE from conference_recording where upload_date < NOW() - interval '7 day'"; 
        $prepare = pg_prepare($dbconn, "prepare1", $query2);
        if(!$prepare)
        $message = "Cannot prepare statement"; 
        $response1 = pg_execute($dbconn, "prepare1", array()); 
        if(pg_last_error($dbconn))
        {
           $message =  pg_last_error($dbconn);
        }else
        {
         $status = 1; 
          $message = "7 days ago conference recording deleted successfully";
        }
      }
    }
    else
    {
      $message =  'authentication key invalid';
    }  
  }
  else
  {
    $message =  'Parameters are misssing'; 
  }
  echo $response = json_encode(array(
        'status' => $status,
        'msg' => $message,
        'data' => $data
        ));  
?>