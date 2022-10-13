<?php

$cn=mysqli_connect("localhost","root","","pssn") or die("Could not Connect My Sql");
$target_dir = "photos/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
    $name=$_POST['name'];
     $tag=$_POST['tags'];
     $des=$_POST['des'];
   
       
             $sql = "INSERT INTO `photo`(name,img,tags,description)VALUES ('$name','$target_file','$tag','$des')";
            if (mysqli_query($cn, $sql)) {
                header("location:profile/index.php");
               
            }
            else {
            echo "Error: " . $sql . "" . mysqli_error($cn);
         }
  } else {
    echo "Sorry, there was an error uploading your file.";
  }

