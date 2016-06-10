<!DOCTYPE html>
<html>
<head>
<title>
VIEW RESULT
</title>
</head>
<body style="background-color:rgb(255,51,102);">
<br>
<center><u><h style="background-color:black;color:rgb(255,51,102);font-size:35px;">STUDENT DETAIL</h></u>
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
// output data of each row
while($row = $result->fetch_assoc()) 
{
if($_GET["roll"]==$row["Roll"])
{
$flag=1;
break;
}
}
}
$conn->close();
?>
<p><b>NAME:</b></p><p><?php echo $row["Name"]; ?></p>
<p><b>ROLL NUMBER:</b></p><p><?php echo $row["Roll"]; ?></p>
<p><b>DEPARTMENT:</b></p><p><?php echo $row["Dept"]; ?></p>
<p><b>E-MAIL ADDRESS:</b></p><p><?php echo $row["Email"]; ?></p>
<p><b>ADDRESS:</b></p><p><?php echo $row["Address"]; ?></p>
<p><b>ABOUT ME:</b></p><p><?php echo $row["About"]; ?></p>
<form action="action_edit.php" id="form1"><br>
<br>
Roll Number:
<br>
<input style="background-color:rgb(178,204,51);" type="number"  name="roll" min="100000000" max="999999999" value='<?php echo $row["Roll"]; ?>' readonly>
<br>
<br></form>
<button class="button" form="form1" style="background-color:yellow;font-size:30px;">EDIT DETAILS</button>
<br>
</center>
</body>
</html>