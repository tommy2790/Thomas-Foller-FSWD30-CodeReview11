<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>cars</title>
</head>

<body>

    <?php include('navbar.php'); ?>


    <div class="container">
        <h2>
            <p class="text-center" id="carlist">
                our cars</p>
        </h2>
        <div class="row">



            <?php

$servername = "localhost";

$username   = "root";

$password   = ""; 

$dbname     = "cr11a";



// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error() . "\n");

}


$sql = "SELECT *
FROM car
INNER JOIN office ON car.car_id = office.id ";;

$result = mysqli_query($conn, $sql);


// fetch a next row (as long as there are some) into $row



        	
while($row = mysqli_fetch_assoc($result)) {
		
       
       	 
		echo 
			"<div class='col-lg-4 col-md-4 col-xs-12' id='content'>"."<br><b>category: </b>".
			
			$row["category"]."<br><b>make: </b>".
			 $row["make"]."<br><b>model: </b>".
			 $row["model"].
			 "<br><b>pick-up station: </b><a href='office_list.php?pick_up=<?php echo". $row['street']."; ?>'>".$row["street"]."</a>
        </div>"; } // Free result set mysqli_free_result($result); // Close connection mysqli_close($conn); ?>
    </div>

</body>

</html>
