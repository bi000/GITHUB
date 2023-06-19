
<?php
$servername="localhost";
$username="root";
$password="mainali@##";
$dbname="feedback";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("Connection error".mysqli_connect_error());
} 
else{
    echo"Successfully submit";
}
$Fname=mysqli_real_escape_string($conn,$_POST['Fname']);
$Lname=mysqli_real_escape_string($conn,$_POST['Lname']);
$PH=mysqli_real_escape_string($conn,$_POST['Phone']);
$Comment=mysqli_real_escape_string($conn,$_POST['comment']);
$stmt=mysqli_prepare($conn,"INSERT INTO fbmessage(FirstName,LastName,PHONE,Comments)VALUES(?,?,?,?)");
mysqli_stmt_bind_param($stmt,"ssss",$Fname,$Lname,$PH,$Comment);
mysqli_execute($stmt);
?>