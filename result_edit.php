<!DOCTYPE html>
<html>
<head>
<title>
EDIT RESULT
</title>
</head>
<body style="background-color:rgb(255,51,102);">
<center>
<p style="font-family:sylfaen;font-size:40px;">

<?php
// Create connection
$conn = new mysqli("localhost", "root", "", "StudDB");
// Check connection
if ($conn->connect_error)
{
die("Connection failed: " . $conn->connect_error);
} 

$flag=0;
$sql = "SELECT Name,Roll,Dept,Email,Address,About,Password FROM StudReg";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
while($row = $result->fetch_assoc()) 
{
if($_POST["roll"]==$row["Roll"])
{
$flag=1;
break;
}
}
}
$conn->close();
if($_POST["pass"]==$row["Password"])
{
$h="localhost";$d="StudDB";$r="root";$p="";
$conn = new mysqli("localhost", "root", "", "StudDB");
$dbh=new PDO("mysql:host=$h;dbname=$d", $r, $p);
// Check connection
if ($conn->connect_error)
{
die("Connection failed: " . $conn1->connect_error);
} 
$sql=$dbh->prepare("UPDATE StudReg SET Name=:a, Dept=:c,Email=:d,Address=:e,About=:f WHERE Roll='$_POST[roll]'");
$sql->bindParam(':a',$_POST["firstname"]);
$sql->bindParam(':c',$_POST["dept"]);
$sql->bindParam(':d',$_POST["mail"]);
$sql->bindParam(':e',$_POST["address"]);
$sql->bindParam(':f',$_POST["about"]);

$sql->execute();
/*if (mysqli_query($conn1, $sql1)) 
{
echo "Record successfully modified!!!";
}
else
echo "Record not modified";
*/
}

?>
</p>
<form action="result_view.php" method="get" ID="form1" style="font-size:25px;">
<br>
Roll Number:
<br>
<input style="background-color:rgb(178,204,51); font-size:25px;" type="number" name="roll" min="100000000" max="999999999" value=<?php echo $row["Roll"]; ?> readonly>
<br>
</form>
<br>
<button class="button" form="form1" style="background-color:black;color:rgb(178,204,51);font-size:30px;">VIEW DETAILS</button>
</center>

<br>
</body>
</html>