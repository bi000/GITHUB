<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
     crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
   integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" 
   crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.6.1.js"
   integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
   <script src="https://kit.fontawesome.com/ad9e9b40b2.js" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webui-popover/1.2.18/jquery.webui-popover.js" integrity="sha512-i4m2lXx4/1pdl0aIV1h2kzSFQmpOcmkXasl6n/gdp4yx/gOR1hNdHVLr6Ai64qDWrXTAg24v9BUTY8Ts6O7s1A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/webui-popover/1.2.18/jquery.webui-popover.css" integrity="sha512-cCFi/2BEpaQF3bVAoIKzDSnrHaAzj2UMeNIB1K5JO/Zq07dqFwQOxYCcnCYIRrdxIcN8acc2oVK4AYsqLmMiZg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js?version=v16.0"></script>
    <title>Videos</title>
    <style>
        .container-fluid{
            display:flex;
            flex-wrap: wrap;
            justify-content:space-between;
        }
        #cardVideo{
            width:20%;
            height:auto;
        }
        #vdio{
            position:relative;
            width:100%;
        }
    </style>
</head>
<body>
    <?php
    $servername="localhost";
    $username="root";
    $password="mainali@##";
    $dbname="videos";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        die("connection Failed".mysqli_connect_error());
    }
    else{
        echo "Thank You";
    }
    $stmt=mysqli_prepare($conn,"SELECT *  FROM adminvdio");
    mysqli_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result)>0){
        echo '<div class="container-fluid">';
        while($row=mysqli_fetch_assoc($result)){
            $title=$row['Title'];
            $footer=$row['Foter'];
            $Video=base64_encode($row['Videos']);
        echo '<div class="card" id="cardVideo">';
        echo '<div class="card-header">';
        echo '<h3>'.$title.'</h3>';
        echo '</div>';
        echo '<div class="card-body">';
       echo '<video src="data:video/mp4;base64,'.$Video.'" alt="video" id="vdio" controls></video>';
        echo '</div>';
        echo '<div class="card-footer">';
        echo '<h3>'.$footer.'</h3>';
        echo '</div>';
        echo '</div>';
        }
    }
    mysqli_close($conn);
    ?>
</body>
</html>