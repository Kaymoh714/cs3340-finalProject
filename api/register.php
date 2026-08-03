<?php

//Looks for db.php file to begin code. Logs session tracking so login and register carry across pages
require 'db.php';
session_start();

//Waits until register button is pressed to execute code
if (isset($_POST["register"])) {

	//Assign username, password and email to form submitted values
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];

	//begin prepared statement for pulling username and email to see if user exists already
$stmt = $conn->prepare("SELECT username, email FROM users WHERE username = ? OR email = ?");
$stmt -> bind_param("ss",$username, $email);
$stmt -> execute();
	
//returns the number of rows for usernames or emails from register form
$userFound = $stmt->get_result();

//close statement to prevent leaks	
$stmt->close();

//if there are no results found for the username or email, execute code
if ($userFound->num_rows==0){

	//hashes password
    $hashedPassword =password_hash($password,PASSWORD_DEFAULT);

	//inserts user submitted values into database, "creating the user", autoassigns an admin value of N.
    $stmt = $conn-> prepare("INSERT INTO users (username, email, password, admin) VALUES (?,?,?,'N')");
    $stmt -> bind_param("sss",$username, $email, $hashedPassword);
    $stmt ->execute();
	
} else {
	//Catch in case user name already exists.
     $message ="An account already exists. Please log in.";
}

//Close to prevent memory leaks
$stmt->close();

}
?>

<!DOCTYPE html>
<html lang="en">

<html>
<head>
	<meta charset="utf-8">
  	<title>Register</title>

  <!--Script to run javascript file to apply CSS style depending on what month it is-->
		<script src ="/finalProject/cssSelector.js"></script>

<!--Page specific CSS elements-->
<style>

.register{
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

h1 {
    color: #084b81;
}

label {
    display: block;
    width: 100%;
    margin-top: 10px;
    margin-bottom: 5px;
    text-align: left;
    color: #555;
    font-weight: bold;
}

input {
    display: block;
    width: 100%;
    margin-bottom: 15px;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 5px;
}

button {
    padding: 15px;
    border-radius: 10px;
    margin-top: 15px;
    margin-bottom: 15px;
  
    color: white;
    background-color: #084b81;
    width: 100%;
    font-size: 20px;
}

.wrap {
    display: flex;
    justify-content: center;
    align-items: center;
}

#login {
    font-size: 20px;
    text-align:center;
}
    </style>
	
</head>

<body>
<!--Navigation bar-->
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
		

<!--Register form, and redirect to login form if user already has account-->	
  <div class ="register">
  <form name="input" action="register.php" method="POST">
    <h1>Register</h1>
        <label>Email:</label><input type="email" name="email" required><br>
        <label>Username:</label><input type ="text" name="username" required><br>
        <label>Password:</label><input type ="password" name="password" required>
        <button type="submit" name="register">Register</button>
        <label id="login"><a href="/finalProject/api/login.php">Already have an account? Login</a></label>

  </form>
</div>
</body>
</html>