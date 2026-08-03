<?php

//Required to establish connection and ensure session tracking.
require 'db.php';

//waits until the submit button is pressed to execute
if (isset($_POST['request'])) {
	//retrieves values from the form submitted by the user
	$email = $_POST['email'];
	$unitName = $_POST['unitName'];
	$requestDescr = $_POST['requestDescr'];

	//inserts values into the requests table for admins to view later.
	$stmt=$conn->prepare("INSERT INTO requests values (?,?,?)");
	$stmt->bind_param("sss", $email,$unitName,$requestDescr);
	$stmt->execute();

	//Close the connections to prevent memory leaks
	$stmt->close();
	$conn->close();

}	
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Custom Request Form</title>

    
    <!--Script to run javascript file to apply CSS style depending on what month it is-->
		<script src ="/finalProject/cssSelector.js"></script>

<!--page specific css styles-->
    <style>
        .requestContainer {
            justify-content:center;
            content-align:center;
            background-color: #fff;
            border-radius: 15px;
            border-style:solid;
            padding: 10px 20px;
            width: 500px;
            margin: 100px auto;
            text-align: center;
        }

        body {
            text-align:center;

        }

        </style>
</head>
<body>

	
<!--Div for formatting. Navigation bar across the entire page-->
<div class="navbar">
	<a href="/finalProject/homepage.html"><img src="/finalProject/images/kmPaintingLogo.svg" alt="KM Painting Services Logo"></a>
	<a href="/finalProject/aboutPage.html">About</a>
  	<div class="dropdown">
    	<button class="dropbtn">Raven Guard<i class="fa fa-caret-down"></i></button>
    	<div class="dropdown-content">
			<a href="/finalProject/armies/ravenGuardHome.html">Raven Guard Home</a>
      		<a href="/finalProject/armies/RavenGuardUnits/aethonShaan.html">Aethon Shaan</a>
      		<a href="/finalProject/armies/RavenGuardUnits/KayvaanShrike.html">Kayvaan Shrike</a>
    	</div>
  	</div>
	<div class="dropdown">
    	<button class="dropbtn">White Scars<i class="fa fa-caret-down"></i></button>
    	<div class="dropdown-content">
			<a href="/finalProject/armies/whiteScarsHome.html">White Scars Home</a>
    		<a href="/finalProject/armies/whiteScarsUnits/SubodenKhan.html">Suboden Khan</a>
    		<a href="/finalProject/armies/whiteScarsUnits/KorsarroKhan.html">Kor'sarro Khan</a>
    </div>
  </div>
		<div class="dropdown">
    	<button class="dropbtn">Salamanders<i class="fa fa-caret-down"></i></button>
    	<div class="dropdown-content">
			<a href="/finalProject/armies/salamandersHome.html">Salamanders Home</a>
      		<a href="/finalProject/armies/SalamandersUnits/AdraxAgatone.html">Adrax Agatone</a>
			<a href="/finalProject/armies/SalamandersUnits/VulkanHestan.html">Vulkan He'stan</a>
    	</div>
  	</div>
		<div class="dropdown">
    	<button class="dropbtn">Space Wolves<i class="fa fa-caret-down"></i></button>
    	<div class="dropdown-content">
			<a href="/finalProject/armies/spaceWolvesHome.html">Space Wolves Home</a>
      		<a href="/finalProject/armies/spaceWolvesUnits/UlrikTheSlayer.html">Ulrik The Slayer</a>
			<a href="/finalProject/armies/spaceWolvesUnits/RagnarBlackmane.html">Ragnar Blackmane</a>
    	</div>
  	</div>
		<div class="dropdown">
    	<button class="dropbtn">Ultramarines<i class="fa fa-caret-down"></i></button>
    	<div class="dropdown-content">
			<a href="/finalProject/armies/ultramarinesHome.html">Ultramarines Home</a>
      		<a href="/finalProject/armies/ultramarinesUnits/CaptainTitus.html">Captain Titus</a>
			<a href="/finalProject/armies/ultramarinesUnits/RobouteGuilliman.html">Roboute Guilliman</a>
			<a href="/finalProject/armies/ultramarinesUnits/Tigurius.html">Chief Librarian Tigurius</a>
    	</div>
  	</div>
	<div class="dropdown">
    	<button class="dropbtn">Grey Knights<i class="fa fa-caret-down"></i></button>
    	<div class="dropdown-content">
			<a href="/finalProject/armies/greyKnightsHome.html">Grey Knights Home</a>
      		<a href="/finalProject/armies/greyKnightsUnits/CastellanCrowe.html">Castellan Crowe</a>
			<a href="/finalProject/armies/greyKnightsUnits/GrandMasterVoldus.html">Grand Master Voldus</a>
    	</div>
  	</div>
	<div class="dropdown">
    	<button class="dropbtn">Imperial Fists<i class="fa fa-caret-down"></i></button>
    	<div class="dropdown-content">
			<a href="/finalProject/armies/imperialFistsHome.html">Imperial Fists Home</a>
      		<a href="/finalProject/armies/imperialFistsUnits/TorGaradon.html">Tor Garadon</a>
			<a href="/finalProject/armies/imperialFistsUnits/DarnathLysander.html">Darnath Lysander</a>
    	</div>
  	</div>
	<div class="dropdown">
    	<button class="dropbtn">Dark Angels<i class="fa fa-caret-down"></i></button>
    	<div class="dropdown-content">
			<a href="/finalProject/armies/darkAngelsHome.html">Dark Angels Home</a>
      		<a href="/finalProject/armies/darkAngelsUnits/LionElJonson.html">Lion El'Jonson</a>
			<a href="/finalProject/armies/darkAngelsUnits/Azrael.html">Azrael, Supreme Grand Master</a>
			<a href="/finalProject/armies/darkAngelsUnits/MasterLazarus.html">Master Lazarus</a>
			<a href="/finalProject/armies/darkAngelsUnits/Sammael.html">Sammael</a>
			<a href="/finalProject/armies/darkAngelsUnits/Ezekiel.html">Ezekiel, Grand Master of Librarians</a>
    	</div>
  	</div>
		<div class="dropdown">
    	<button class="dropbtn">Help<i class="fa fa-caret-down"></i></button>
    	<div class="dropdown-content">
	     		<a href="/finalProject/Help/checkoutHelp.html">How do I checkout?</a>
			<a href="/finalProject/Help/customForm.html">How do I submit a custom form?</a>
			<a href="/finalProject/Help/priceUpdate.html">How do I update the price of a unit?</a>
			<a href="/finalProject/Help/pwChange.html">How do I change my password?</a>
			<a href="/finalProject/Help/userUpdate.html">How do I update a user to be an admin?</a>
    	</div>
  	</div>
	<a href="/finalProject/api/login.php">Login</a>
	<a href="/finalProject/checkout.html" class="split">Checkout</a>
</div>

<!--Div for formatting-->
<div class="requestContainer">

<h1>Custom Request Form</h1>

<!-- form for user to submit a request -->
<form method="POST">
	<label for="email">Email: </label>
	<br>
	<input type="email" id="email" name="email" required>
	<br>
	<label for="unitName">Unit Name:</label>
	<br>
	<input type="text" id="unitName" name="unitName" required >
	<br>
	<label for="requestDescr">Special Requests:</label>
	<br>
	 <textarea id="requestDescr" name="requestDescr" rows="4" cols="50"></textarea>
	<br>
	<button type="submit" name="request">Submit Request</button>
</form>


</div>

</body>
</html>