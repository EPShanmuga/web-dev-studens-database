<!DOCTYPE html>
<html>
<head>
<title>
ALL LIST
</title>
</head>
<body style="background-color:orange">
<h style="background-color:black;color:orange;font-size:20px;">LIST ACCORDING TO NAME</h>
<p style="font-size:20px;">
<?php
// Create connection
$conn = new mysqli("localhost", "root", "","StudDB");
// Check connection
$sql = "SELECT Name,Roll,Dept,Email,Address,About FROM StudReg ORDER BY Name";
$result = $conn->query($sql);
$var=1;
if ($result->num_rows > 0)
 
    // output data of each row
    while($row = $result->fetch_assoc()) {
echo "<br>".$var."<br>";

echo "<b>"." Name: "."</b>" . $row["Name"]."<br>";
echo "<b>"." Roll Number: "."</b>" . $row["Roll"]."<br>";
echo "<b>"." Department: "."</b>".$row["Dept"]."<br>";
echo "<b>"." Email Address: "."</b>".$row["Email"]."<br>";
echo "<b>"." Address: "."</b>".$row["Address"]."<br>";
echo "<b>"." About Me: "."</b>".$row["About"]."<br>";
$var++;
}
 else 
    echo "No results";

$conn->close();
?>
</p>
</body>
</html>