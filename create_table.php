<?php
$conn=new mysqli("localhost","root","","StudDB");
$sql=" CREATE TABLE StudReg(Name varchar(30) NOT NULL,
 Roll int PRIMARY KEY CHECK(Roll>100000000 AND Roll<999999999),
Dept varchar(5),
Email varchar(20),
Address varchar(50) NOT NULL,
About varchar(100),
Password varchar(9))";
if ($conn->query($sql) === TRUE)
{
echo "Table StudReg created!";
} 
else 
{
echo "Error" . $conn->error;
}
$conn->close();
?>