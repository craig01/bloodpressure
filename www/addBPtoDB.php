<html>
<body>

Systolic <?php echo $_POST["systolic"]; ?><br>
diastolic <?php echo $_POST["diastolic"]; ?><br>

</body>
</html>
<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$systolic = $_POST("systolic");
$diastolic = $_POST("diastolic");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO pressure (date,time,systolic,diastolic,heartrate)
VALUES (" + $date + "," + $time + "," + $systolic + "," + $diastolic + ",0)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
