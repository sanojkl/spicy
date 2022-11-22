<head>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
</head>
<body>
<?php
include 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error){
  die ("Connection failed: " . $conn->connect_error);
}

$secret = $_GET['secret'];

$sql = "SELECT * FROM userdata WHERE secret = '$secret' LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$res = $conn->query("SELECT * FROM userdata WHERE secret != '$secret'");

echo "<h1> Übereinstimmungen </h1> <p>Speicher dir den Link für diese Seite, um Neuigkeiten zu sehen<br/><br/>";
foreach ($res as $rowOther) {
 $total = 0;
 $same = 0;

 foreach ($rowOther as $prop => $val){
  if(($prop == "secret") or ($prop == "name")) {
	continue;
  }
  if(($val == 1) and ($row[$prop] == 1)) {
	continue;
  }
  $total++;
  $total++;
  if(($val == 1) or ($row[$prop] == 1)) {
	$same++;
	continue;
  }
  if($val == $row[$prop]){
	$same++;
	$same++;
  }
 }




 echo $rowOther['name'] ."    ". round(($same *100 )/ $total)."%. Das sind: ". $same." / ".$total."<br/>";
}





$conn->close();
?>
</body>
