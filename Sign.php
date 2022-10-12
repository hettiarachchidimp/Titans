<?php

$cn=mysqli_connect("localhost","root","","pssn") or die("Could not Connect My Sql");
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
    $name1=$_POST['username'];
    $cpass=$_POST['Cpass'];
    $pass=$_POST['pass'];
    
       
             $sql = "INSERT INTO `login`(username,password,img)VALUES ('$name1','$pass','$target_file')";
            if (mysqli_query($cn, $sql)) {
                header("location:login.html");
               
            }
            else {
            echo "Error: " . $sql . "" . mysqli_error($cn);
         }
  } else {
    echo "Sorry, there was an error uploading your file.";
  }


?>