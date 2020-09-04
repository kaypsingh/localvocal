<?php
  
  $status = 0;
  $message = "something went wrong";
  $data= "";
  
  if(isset($_POST) && isset($_FILES['image']))
  {
    $username = $_POST['username'];
    $roomname = $_POST['roomname'];
    if(isset($_FILES['image']))
    { 

      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];

      //$max_file_size = max($file_size);
      //if($file_size > 512000){
         //$errors[]='File size can not be greater than 500 kb'; 
      //} 

      $file_tmp =$_FILES['image']['tmp_name'];

      $filename = $_FILES['image']['name'];
      $file_type=$_FILES['image']['type'];
      $extensions= array("png","jpg","jpeg","gif");
      $file_ext=strtolower(end(explode('.',$filename)));  
      if(in_array($file_ext,$extensions)=== false)
        $errors[]="extension not allowed, please choose a png file.";

        
      if(empty($errors)==true)
      {   

       // $path = "images/".$username."/".$roomname."/";
        $path = "images/".$roomname."/";
        mkdir($path, 0770, true);

          if(move_uploaded_file($_FILES['image']['tmp_name'],$path.$filename))
          { 
            $message = "Fileuploaded successfully";
            $status= 1;
          }
          else
          {
            $errors[] = "File upload failed";
          }
      }  

      //if(empty($errors)==true){ 
        //echo "<pre>"; print_r($uploadedfiles);
      //} 
    }
        
    if(empty($errors)!=true)
    {
      $message =  json_encode($errors);
    } 
  }

  else
  {
    $message =  "Please slect file"; 
  }
  echo $response = json_encode(array(
        'status' => $status,
        'msg' => $message,
        'data' => $data
        ));  

?>
