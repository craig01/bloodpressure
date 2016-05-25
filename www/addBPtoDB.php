<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "pressure";

$systolic = $_POST["systolic"];
$diastolic = $_POST["diastolic"];
$heartrate = $_POST["heartrate"];
$mdate = date("Y-m-d");
$mtime = date("H:m:s");

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$sql = "INSERT INTO readings (addDate,addTime,systolic,diastolic,heartrate)
VALUES ('$mdate', '$mtime', '$systolic', '$diastolic', '$heartrate')";

//$sql = "INSERT INTO pressure (addDate,addTime,systolic,diastolic,heartrate)
//VALUES (" + $date + "," + $time + "," + $systolic + "," + $diastolic + ",'0')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
