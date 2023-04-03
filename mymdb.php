<!DOCTYPE html>
<html>
<head>
    <title>My Movie Database (MyMDb)</title>
    <meta charset="utf-8" />
    <link href="images/favicon.png" type="image/png" rel="shortcut icon" />

    <!-- Link to your CSS file that you should edit -->
    <link href="bacon.css" type="text/css" rel="stylesheet" />
    </head>



	<body>
	<?php 
    include_once("common.php");
    getHeader();
	?>
	<h1>The One Degree of Kevin Bacon</h1>
        <p>Type in an actor\'s name to see if he/she was ever in a movie with Kevin Bacon!</p>
        <p><img src="images/kevin_bacon.jpg" alt="Kevin Bacon" /></p>
	
	<?php
	getInputBoxes();
	getFooter();

    ?>

				<!-- form to search for every movie by a given actor -->
	</body>
	
</html>
