<?php
$servername="localhost";
$username="root";
$password="mainali@##";
$dbname="client_message";
 $conn=mysqli_connect($servername,$username,$password,$dbname);
 if(!$conn){
    die("connection failed".mysqli_connect_error());
 }
 else{
    echo"Thanks for sending the message";
 }
 $Fname=mysqli_real_escape_string($conn,$_POST['Name']);
 $Lname=mysqli_real_escape_string($conn,$_POST['Last_Name']);
 $Mess=mysqli_real_escape_string($conn,$_POST['text']);
 $Ph=mysqli_real_escape_string($conn,$_POST['tel']);
 $Em=mysqli_real_escape_string($conn,$_POST['e_mail']);
 $stmt=mysqli_prepare($conn,"INSERT INTO message(Fname,Lname,Message,Phone,Email)VALUES(?,?,?,?,?)");
 mysqli_stmt_bind_param($stmt,"sssss",$Fname,$Lname,$Mess,$Ph,$Em);
 mysqli_stmt_execute($stmt);
?>