<?php
include 'config.php';

// dbstuff
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$secret = bin2hex(random_bytes(16));







//while($mysqli -> query("SELECT secret FROM userdata WHERE secret = '$secret'") -> num_rows > 0){
$secret = bin2hex(random_bytes(16));
//}

$name = $_POST['uname'];
$essen_1 =  $_POST['essen_1'];
$essen_2 =  $_POST['essen_2'];
$essen_3 =  $_POST['essen_3'];
$essen_4 =  $_POST['essen_4'];
$essen_5 =  $_POST['essen_5'];
$essen_6 =  $_POST['essen_6'];
$essen_7 =  $_POST['essen_7'];
$essen_8 =  $_POST['essen_8'];
$essen_9 =  $_POST['essen_9'];
$essen_10 =  $_POST['essen_10'];
$essen_11 =  $_POST['essen_11'];
$essen_12 =  $_POST['essen_12'];
$essen_13 =  $_POST['essen_13'];
$essen_14 =  $_POST['essen_14'];
$essen_15 =  $_POST['essen_15'];
$essen_16 =  $_POST['essen_16'];





$sql = "INSERT INTO userdata (secret, name, essen_1, essen_2, essen_3, essen_4, essen_5, essen_6, essen_7, essen_8, essen_9, essen_10, essen_11, essen_12, essen_13, essen_14, essen_15, essen_16) VALUES ('$secret', '$name', '$essen_1', '$essen_2', '$essen_3', '$essen_4', '$essen_5', '$essen_6', '$essen_7', '$essen_8', '$essen_9', '$essen_10', '$essen_11', '$essen_12', '$essen_13', '$essen_14', '$essen_15', '$essen_16')";



if ($conn->query($sql) === TRUE) {

$conn->close();
header("Location: https://fffbw.de/spicy/response.php?secret=$secret");
exit;
} else {
  header('HTTP/1.1 500 Internal Server Error', true, 500);
  die("500 Internal Server Error");
  $conn->close();
}
