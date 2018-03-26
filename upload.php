<?php
session_start();
include('connection.php');

if(isset($_POST['but_upload'])){

 $name = $_FILES['file']['name'];
 $target_dir = "/home/chaitanya/Development/Htdocs/DAppointment/uploads/";
 $target_file = $target_dir . basename($_FILES["file"]["name"]);
 // echo $target_file;
 // Select file type
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 // Valid file extensions
 $extensions_arr = array("jpg","jpeg","png","gif");

 // Check extension
 if( in_array($imageFileType,$extensions_arr) ){

  // Insert record
  $q = "INSERT INTO Image VALUES (NULL,'$name','$name')";
  $r = mysqli_query($dbc, $q);
  // Upload file
  $m = move_uploaded_file($_FILES['file']['tmp_name'],$target_file);
  if($m){
    header("Location: profile.php");
  }
  else{
    echo "Error!";
  }
 }

}

?>