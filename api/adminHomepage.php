<?php

//Required to establish connection and ensure session tracking.
require 'db.php';

// Update product
if (isset($_POST['updateProduct'])) {

	//assigns variables to form submitted values
    $productID = $_POST['productID'];
    $basicPrice = $_POST['basicPrice'];
    $advancedPrice = $_POST['advancedPrice'];
    $quantity = $_POST['quantity'];

	//updates database with updated values from form
    $stmt = $conn->prepare("UPDATE products SET basicPrice=?, advancedPrice=?, quantity=? WHERE productID=?");
    $stmt->bind_param("ddii",  $basicPrice, $advancedPrice, $quantity, $productID);
    $stmt->execute();
}

// Get all products for the dropdown
$productList = $conn->query("SELECT productID, productName FROM products");

//sets initial product select variable to none, ensuring it is created
$product = null;

//wait until user presses the select product button to choose which option to update
if (isset($_POST['selectedProduct'])) {

	//retrieves all the infromation from the selected product, where the selected product is the form-submitted value
    $stmt = $conn->prepare("SELECT * FROM products WHERE productID=?");
    $stmt->bind_param("i", $_POST['selectedProduct']);
    $stmt->execute();

	//Associates the results to the field names for the database
    $product = $stmt->get_result()->fetch_assoc();
}


//waits until updateUser button is pressed
if (isset($_POST['updateUser'])) {

	//assigns form values to variables
    $admin = $_POST['admin'];
    $username = $_POST['username'];

	//updates query and database, changing permissions for user
    $stmt = $conn->prepare("UPDATE users SET admin=? WHERE username=?");
    $stmt->bind_param("ss",  $admin, $username);
    $stmt->execute();
}

// Get all users from the database to select from the dropdown menu
$userList = $conn->query("SELECT username FROM users");

//initially selects null user
$user = null;

//waits until select user button is pressed to retrieve user information
if (isset($_POST['selectedUser'])) {

	//pulls in all field values for the specified username
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $_POST['selectedUser']);
    $stmt->execute();

	//retrieves current values and associates them with their database names
    $user = $stmt->get_result()->fetch_assoc();
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Admin</title>

    
    <!--Script to run javascript file to apply CSS style depending on what month it is-->
		<script src ="/finalProject/cssSelector.js"></script>

	<!--Page specific CSS styles-->
    <style>
        .updateContainer {
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


<h1>Admin Homepage</h1>

<div class="updateContainer">
<h2>Update Product Details</h2>

<form method="POST">
    <select name="selectedProduct">
        <?php while($row = $productList->fetch_assoc()) { ?>
            <option value="<?= $row['productID']; ?>">
                <?= htmlspecialchars($row['productName']); ?>
            </option>
        <?php } ?>
    </select>

    <button type="submit">Select Product</button>

</form>

<?php if($product): ?>

<hr>

<form method="POST">
    <input type="hidden" name="productID" value="<?= $product['productID']; ?>">
       Unit:
        <?= htmlspecialchars($product['productName']); ?>
    <br><br>

    Quantity:
    <input
        type="number"
        name="quantity"
        value="<?= htmlspecialchars($product['quantity']); ?>">
    <br><br>

    Basic Price:
    <input
        type="number"
        name="basicPrice"
        value="<?= htmlspecialchars($product['basicPrice']); ?>">
    <br><br>

    Advanced Price:
    <input
        type="number"
        name="advancedPrice"
        value="<?= htmlspecialchars($product['advancedPrice']); ?>">
    <br><br>

    <button type="submit" name="updateProduct">Update Product</button>

</form>

<?php endif; ?>

</div>

<div class="updateContainer">

<h2>Update Users</h2>

<!-- Dropdown -->
<form method="POST">

    <select name="selectedUser">
        <?php while($row = $userList->fetch_assoc()) { ?>
            <option value="<?= $row['username']; ?>">
                <?= htmlspecialchars($row['username']); ?>
            </option>
        <?php } ?>
    </select>

    <button type="submit">Select User</button>

</form>
<?php if($user): ?>
<hr>

<!-- Edit Form -->
<form method="POST">
    <input type="hidden" name="username" value="<?= $user['username']; ?>">
       Unit:
        <?= htmlspecialchars($user['username']); ?>
    <br><br>

    Admin Privileges:
    <input
        type="text"
        name="admin"
        value="<?= htmlspecialchars($user['admin']); ?>">
    <br><br>
    <button type="submit" name="updateUser">Update User</button>
</form>
<?php endif; ?>
</div>
</body>
</html>