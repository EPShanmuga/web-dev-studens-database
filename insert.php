<?php


// Create connection
$conn = new mysqli("localhost", "root", "", "StudDB");
$sql = "INSERT INTO StudReg (Name,Roll,Dept,Email,Address,About,Password)
VALUES ('Shanmuga',110115031,'ICE','110115031@nitt.edu','1/3, Mogappair,Chennai','avid book reader,likes programming','p3FtgH10')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>