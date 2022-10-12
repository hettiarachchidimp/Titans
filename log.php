<?php
session_start(); 
$email =$_POST['name'];
$password =$_POST['pass'];

//data base connection
$con = new mysqli("localhost","root","","pssn");
if($con->connect_error){

die("Fail to Connect : ".$con->connect_error);

}else{

$stmt = $con->prepare("select * from login where username=?");
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt_result=$stmt->get_result();
if($stmt_result->num_rows>0){

    $data=$stmt_result->fetch_assoc();
    if($data['password']===$password){
        $_SESSION['user_name'] = $email;
        $_SESSION['email'] =  $data['email'];
        header("Location:/Mihiri/profile/index.php"); 

    }else{

echo "<h2>Invalide password or user name1</h2>";


    }

    }else{

        echo "<h2>Invalide password or user name</h2>";
}




}



?>