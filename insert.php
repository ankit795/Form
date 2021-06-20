<?php
$firstname=$_POST["firstname"];
$lastName=$_POST["lastName"];
$email=$_POST["email"];
$linkedin=$_POST["linkedin"];
$drupal=$_POST["drupal"];
$position=$_POST["position"];
$Whencanyoustart=$_POST["Whencanyoustart"];
$Mobile=$_POST["Mobile"];
$city=$_POST["city"];
$willing=$_POST["willing"];
$lastcompany=$_POST["lastcompany"];
$comments=$_POST["comments"];

if(!empty($firstname) || !empty($lastName) || !empty($email) || !empty($linkedin) || !empty($drupal) || !empty($position) ||
!empty($Whencanyoustart) || !empty($Mobile) || !empty($city) || !empty($willing) || !empty(lastcompany) || !empty($comments)){
}

$host = "localhost";
$dbUsername = "root"
$dbPassword = "";
$dbname = "testing";

$conn = new  mysql(host, $dbUsername, $dbPassword, $dbname);

if (mysql_connect_error()){
    die(Connect Error('. mysql_connect_errno() .') . mysql_connect_error());
}
else {
    $SELECT = "SELECT email from demo where email = ? Limit 1";
    $INSERT = "INSERT into demo (firstname, lastname, email, linkedin, drupal, position, Whencanyoustart, Mobile, city, willing,
    lastcompany, comments) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
}
 $stmt = $conn->prepare($SELECT);
 $stmt->bind_param("e", $email);
 $stmt->execute();
 $stmt->bind_result($email);
 $stmt->store_result();
 $rnum = $stmt->num_rows;

 if($rnum ==0){
     $stmt->close();

     $stmt = $conn->prepare($INSERT);
     $stmt->bind_param("ssssii", $firstname, $lastName, $email, $linkedin, $drupal, $position, $Whencanyoustart, $Mobile,
     $city, $willing, $lastcompany, $comments);
     $stmt->execute();
     echo "New record inserted successfully";
 } else {
     echo "Someone already register using this email";
 }
 $stmt->close();
 $conn->close();

 else{
    echo "All fields are required";
    die();
}

?>