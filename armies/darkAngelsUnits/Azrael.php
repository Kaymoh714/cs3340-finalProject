<?php
//ensures connection to database exists
include("../../api/db.php");

//pulls the information for the specified unit from the products database
$sql = "SELECT basicPrice, advancedPrice, quantity FROM products WHERE productID='17'";

//runs the query and assigns it to the result variable
$result = $conn->query($sql);

//associates the produced results with their table names
$display = $result->fetch_assoc();

//assigns the database results with the local variables to display on page
    $basicPrice = $display["basicPrice"];
    $advancedPrice = $display["advancedPrice"];
	$quantity = $display["quantity"];

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Metatags with the page name and assignment number-->
		<meta charset="utf-8">
		<title>Azrael</title>
		<meta name="author" content="Kareem Mohammed">
		<meta name="student number" content ="104778164">
		<meta name="description" content = "Azrael unit">
		<meta name="assignment" content="Final Project">	

		<!--Script to run javascript file to apply CSS style depending on what month it is-->
		<script src ="/finalProject/cssSelector.js"></script>
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
      		<a href="/finalProject/armies/RavenGuardUnits/aethonShaan.php">Aethon Shaan</a>
      		<a href="/finalProject/armies/RavenGuardUnits/KayvaanShrike.php">Kayvaan Shrike</a>
    	</div>
  	</div>
	<div class="dropdown">
    	<button class="dropbtn">White Scars<i class="fa fa-caret-down"></i></button>
    	<div class="dropdown-content">
			<a href="/finalProject/armies/whiteScarsHome.html">White Scars Home</a>
    		<a href="/finalProject/armies/whiteScarsUnits/SubodenKhan.php">Suboden Khan</a>
    		<a href="/finalProject/armies/whiteScarsUnits/KorsarroKhan.php">Kor'sarro Khan</a>
    </div>
  </div>
		<div class="dropdown">
    	<button class="dropbtn">Salamanders<i class="fa fa-caret-down"></i></button>
    	<div class="dropdown-content">
			<a href="/finalProject/armies/salamandersHome.html">Salamanders Home</a>
      		<a href="/finalProject/armies/SalamandersUnits/AdraxAgatone.php">Adrax Agatone</a>
			<a href="/finalProject/armies/SalamandersUnits/VulkanHestan.php">Vulkan He'stan</a>
    	</div>
  	</div>
		<div class="dropdown">
    	<button class="dropbtn">Space Wolves<i class="fa fa-caret-down"></i></button>
    	<div class="dropdown-content">
			<a href="/finalProject/armies/spaceWolvesHome.html">Space Wolves Home</a>
      		<a href="/finalProject/armies/spaceWolvesUnits/UlrikTheSlayer.php">Ulrik The Slayer</a>
			<a href="/finalProject/armies/spaceWolvesUnits/RagnarBlackmane.php">Ragnar Blackmane</a>
    	</div>
  	</div>
		<div class="dropdown">
    	<button class="dropbtn">Ultramarines<i class="fa fa-caret-down"></i></button>
    	<div class="dropdown-content">
			<a href="/finalProject/armies/ultramarinesHome.html">Ultramarines Home</a>
      		<a href="/finalProject/armies/ultramarinesUnits/CaptainTitus.php">Captain Titus</a>
			<a href="/finalProject/armies/ultramarinesUnits/RobouteGuilliman.php">Roboute Guilliman</a>
			<a href="/finalProject/armies/ultramarinesUnits/Tigurius.php">Chief Librarian Tigurius</a>
    	</div>
  	</div>
	<div class="dropdown">
    	<button class="dropbtn">Grey Knights<i class="fa fa-caret-down"></i></button>
    	<div class="dropdown-content">
			<a href="/finalProject/armies/greyKnightsHome.html">Grey Knights Home</a>
      		<a href="/finalProject/armies/greyKnightsUnits/CastellanCrowe.php">Castellan Crowe</a>
			<a href="/finalProject/armies/greyKnightsUnits/GrandMasterVoldus.php">Grand Master Voldus</a>
    	</div>
  	</div>
	<div class="dropdown">
    	<button class="dropbtn">Imperial Fists<i class="fa fa-caret-down"></i></button>
    	<div class="dropdown-content">
			<a href="/finalProject/armies/imperialFistsHome.html">Imperial Fists Home</a>
      		<a href="/finalProject/armies/imperialFistsUnits/TorGaradon.php">Tor Garadon</a>
			<a href="/finalProject/armies/imperialFistsUnits/DarnathLysander.php">Darnath Lysander</a>
    	</div>
  	</div>
	<div class="dropdown">
    	<button class="dropbtn">Dark Angels<i class="fa fa-caret-down"></i></button>
    	<div class="dropdown-content">
			<a href="/finalProject/armies/darkAngelsHome.html">Dark Angels Home</a>
      		<a href="/finalProject/armies/darkAngelsUnits/LionElJonson.php">Lion El'Jonson</a>
			<a href="/finalProject/armies/darkAngelsUnits/Azrael.php">Azrael, Supreme Grand Master</a>
			<a href="/finalProject/armies/darkAngelsUnits/MasterLazarus.php">Master Lazarus</a>
			<a href="/finalProject/armies/darkAngelsUnits/Sammael.php">Sammael</a>
			<a href="/finalProject/armies/darkAngelsUnits/Ezekiel.php">Ezekiel, Grand Master of Librarians</a>
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
		
<!--Unit name and title-->
<p id="Unit">Azrael</p>
<p id="title">Keeper of the Truth</p>

<!--Product Select form-->
<div class="product">
    <img src="../../finalProjectUnits/Azrael.jpg" alt="Azrael">
<form id="checkoutForm" action="checkoutPage.html" method="get">
        <table>
            <tr>
                <th>Select a painting option:<br><br>Quantity Available: <?php echo $quantity; ?></th>
            </tr>
            <tr>
                <td>
                    <input type="radio" id="basicPainting" name="paintType" value="Basic" required>
					<!--Displays the value of the cart option from the database-->
                    <label for="basicPainting">Basic Painting - used for tabletop play - $<?php echo number_format($basicPrice, 2); ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" id="advancedPainting" name="paintType" value="Advanced" required>
					<!--Displays the value of the cart option from the database-->
                    <label for="advancedPainting">Advanced Painting - used for competition/display - $<?php echo number_format($advancedPrice, 2); ?> </label>
                </td>
            </tr>
        </table>
        <input type="submit" value="Add to Cart">
    </form>
</div>


	
	<!--Footer with my name-->
		<footer>
			<center>
			<p>Author: Kareem Mohammed</p>
			<p>Copyright: Kareem Mohammed</p>
			</center>
		</footer>
</body>

</html> 