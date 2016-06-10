<!DOCTYPE html>
<html>
<head>
<title>
ADD RESULT
</title>
</head>
<body style="background-color:rgb(0,255,0);">
<center>
<p style=";font-size:40px;font-family:sylfaen">
<?php
$pd='password';
for($i=0;$i<8;$i++)
{
$r=rand(33,122);
$pd[$i]=chr($r);
}
// Create connection
$h="localhost";$d="StudDB";$r="root";$p="";
$conn = new mysqli("localhost", "root", "", "StudDB");
$dbh=new PDO("mysql:host=$h;dbname=$d", $r, $p);
$sql = $dbh->prepare("INSERT INTO StudReg (Name,Roll,Dept,Email,Address,About,Password)
VALUES (:a,:b,:c,:d,:e,:f,:g)");
$sql->bindParam(':a',$_POST["firstname"]);
$sql->bindParam(':b',$_POST["roll"]);
$sql->bindParam(':c',$_POST["dept"]);
$sql->bindParam(':d',$_POST["mail"]);
$sql->bindParam(':e',$_POST["address"]);
$sql->bindParam(':f',$_POST["about"]);
$sql->bindParam(':g',$pd);
$sql->execute();
echo "New record created successfully! password:".$pd;
/*if ($conn->query($sql) === TRUE) {
    echo "New record created successfully! password:".$pd;
} else {
    echo "Erroneous Input";
}
*/
$conn->close();
?>
</p>
<br>
<form action="add.htm" id="form1"></form>
<button class="button" form="form1" style="background-color:yellow;font-size:30px;">ADD A NEW STUDENT'S DETAILS</button>
<br>
</body>
</html>