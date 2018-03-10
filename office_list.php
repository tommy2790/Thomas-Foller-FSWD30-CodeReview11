<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>offices</title>
</head>

<body>

    <?php include('navbar.php'); ?>

    <div class="container-fluid" id="media">

        <div class="container">
            <h2>
                <p class="text-center" id="officelist">
                    Offices</p>
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


$AllOffices = "SELECT *
FROM car
INNER JOIN office ON car.car_id = office.id ";



$result = mysqli_query($conn, $AllOffices);


$carSum = "SELECT SUM(car_id) AS car_sum FROM car";

$carRes = mysqli_query($conn, $carSum);



// fetch a next row (as long as there are some) into $row



        	
while($row = mysqli_fetch_assoc($result)) {
		
       
       	 
		echo 
			"<div class='col-lg-4 col-md-4 col-xs-12' id='content'>"."<br><b>Street: </b>".
			
			$row["street"]."<br><b>City: </b>".
			 $row["city"]."<br><b>Zip Code: </b>".
			 $row["zip"]."<br><b>T : </b>".$row["telephone"].
			 "<br><b>cars available: </b>".$row["model"]."</div>";


        }


/*while($row = mysqli_fetch_assoc($carRes)) {
		
       
       	 
		echo "<div class='col-lg-4 col-md-4 col-xs-12' id='content'>".$row["car_sum"].
			 "</div>";

			


        }*/



// Free result set

mysqli_free_result($result);


// Close connection

mysqli_close($conn);



?>
            </div>

</body>

</html>
