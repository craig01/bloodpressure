<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Blood Pressure - Add">
    <meta name="author" content="Craig">
    <link rel="icon" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/favicon.ico">

    <title>List Blood Pressure</title>

    <!-- Bootstrap core CSS -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Blood Pressure</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"></li>
            <!-- <li><a href="addBP.html">/a></li>
            <li><a href="modifyBP.html">Modify</a></li> -->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="grid">
      <div class="page-header">
        <h1>List Blood Pressure results</h1>
      </div>

<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "pressure";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

/* Select queries return a resultset */
if ($result = mysqli_query($conn, "SELECT * FROM readings")) {
    printf("%d rows.\n", mysqli_num_rows($result));

    echo "<table class=\"table\">
      <thead>
        <tr>
          <th>#</th>
          <th>add Date</th>
          <th>add Time</th>
          <th>Diastolic</th>
          <th>Systolic</th>
          <th>Heart Rate</th>
        </tr>
      </thead>
      <tbody>";

    while ($row = $result->fetch_array()) {
      $rows[] = $row;
    }

    foreach ($rows as $row)
    {
        echo "<tr><th scope=\"row\">Edit</th><td>";
        echo $row['addDate'];
        echo"</td><td>";
        echo $row['addTime'];
        echo"</td><td>";
        echo $row['diastolic'];
        echo"</td><td>";
        echo $row['systolic'];
        echo"</td><td>";
        echo $row['heartrate'];
        echo"</td></tr>";
    }
    echo "</tbody></table>";

    /* free result set */
    mysqli_free_result($result);
}

/* Close the connection */
mysqli_close($conn);
?>
