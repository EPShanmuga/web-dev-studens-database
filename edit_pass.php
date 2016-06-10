<!DOCTYPE html>
<html>
<head>
<title>
EDIT PAGE
</title>
</head>
<style>
h
{
background-color:black;
color:rgb(0,153,255);
font-family-algerian;
font-size:50px;
}
p
{
font-size:25px;
font-family:sylfaen;
}
</style>
<body style="background-color:rgb(204,51,155);">
<h>EDIT STUDENT DETAILS</h>

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
/*if($flag)
echo "Name: " . $row["Name"]. " - Roll: " . $row["Roll"]. "- Dept: ".$row["Dept"]. "- Email: ".$row["Email"]. "- Address: ".$row["Address"]. "- About: ".$row["About"]. "- Password: ".$row["Password"] . "<br>"; 
else
echo "record not found";
} 
else 
{
echo "0 results";
}*/
if(!$flag) echo "record not found";
}
$conn->close();
?>
<form action="result_edit.php" method="post">
<fieldset style="background-color:rgb(255,102,51);">
<legend style="font-size:40px;background-color:black; color:rgb(178,204,51);"><u>PERSONAL INFORMATION</u></legend>

Name:
<br>
<input style="background-color:rgb(178,204,51);" type="text" name="firstname" pattern="[A-Za-z .]*" value='<?php echo $row["Name"]; ?>'>
<br>
<br>
Physical Address:
<br>
<input style="background-color:rgb(178,204,51);" type="text" name="address" value='<?php echo $row["Address"]; ?>' required>
<br>
<br>
Email Id:
<br>
<input style="background-color:rgb(178,204,51);" type="email" name="mail" value='<?php echo $row["Email"]; ?>' pattern="[a-zA-Z0-9]*@nitt.edu">
<br>
<br>
Roll Number:
<br>
<br>
Roll Number:
<br>
<br>
<input style="background-color:rgb(178,204,51);" type="number" name="roll" min="100000000" max="999999999" value=<?php echo $row["Roll"]; ?> readonly>

<br>
<br>
Department:
<br>
<select name="dept" style="background-color:rgb(178,204,51); value">
<option value="arch">ARCH</option>
<option value="chem">CHEM</option>
<option value="civil">CIVIL</option>
<option value="cse">CSE</option>
<option value="ece">ECE</option>
<option value="eee">EEE</option>
<option value="ice">ICE</option>
<option value="mech">MECH</option>
<option value="meta">META</option>
<option value="prod">PROD</option>
</select>
<br>
<br>
About Me:
<br>
<input style="background-color:rgb(178,204,51);" type="text" name="about" value='<?php echo $row["About"]; ?>'>
<br>
<br>
Password:
<input style="background-color:rgb(178,204,51);" type="text" name="pass" >
<input type="submit" style="background-color:black; color:rgb(178,204,51);" value="Submit">
</fieldset>
</form>