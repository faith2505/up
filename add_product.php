<?php
	include("connection.php");

	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$price=$_POST['brand'];
		$quantity=$_POST['quantity'];
		$category=$_POST['category'];

		$sql="insert into product_tbl (name,price,category,quantity) values ('$name','$price','$category','$quantity');
			insert into product_item_tbl (product_ID,item_ID) values ('$product_ID','$item_ID')";

		$result=mysqli_query($con,$sql);
		if($result)
		{
			echo "<script> alert ('success') 
			window.location='add_product.php'</script>";
		}
		else
		{
			die(mysqli_error("error"+$con));
		}
	}

?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style.css">

	<title>Milktea Shop</title>
</head>
<body>
	<!-- para to sa dashboard at sa baba ng dashboard
		yung mga <i class='bx bxs-smile'></i> nakuha yan sa boxicons para
		mag karoon ng mga ICONS-->
	<section id="sidebar">
		<a href="index.php" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">39 ers</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="store_menu.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">My Store</span>
				</a>
			</li>
			<li>
				<a href="inventory.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Inventory Item</span>
				</a>
			</li>
			<li>
				<a href="sales.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Sales</span>
				</a>
			</li>
			<li>
				<a href="add_item.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Add New Item</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="settings.php">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="login.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>ADD NEW PRODUCT</h1>
					<ul class="breadcrumb">
						<li>
							<a href="inventory.php">Store</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Add Product</a>
						</li>
					</ul>
				</div>
			</div>
		<div class="table-data">
			<div class="order">
				<form method="POST" style="padding: 10px;">
         			<label style="padding: 10px;">Category</label><br>
         			<select name="category">
         				<option value="-SELECT-"></option>
         				<option value="Drinks">DRINKS</option>
         				<option value="Snacks">SNACKS</option>
         			</select><br>
         			<label style="padding: 10px;">Product Name</label><br>
         			<input type="text" name="name" placeholder="Enter Product name"><br>
         			<label style="padding: 10px;">Quantity</label><br>
         			<input type="text" name="quantity" placeholder="Enter Quantity"><br>
         			<label style="padding: 10px;">Price</label><br>
         			<input type="text" name="price" placeholder="Enter Price"><br>
         			<label style="padding: 10px;">Items Used: </label>
         			<select name="item_id">
         				<?php
         					$item_tbl = mysqli_query($con,"Select * from item_tbl");
							while($item = mysqli_fetch_array($item_tbl)){
						?>
						<option value="<?php echo $item['id'] ?>"><?php echo $item['name']?></option>

						<?php } ?>
         			</select><br>
            		<input type="submit" name="submit" style="padding: 5px; margin: 10px; background-color:  var(--blue); border-radius: 20px;" value="Add Product">
            		<button style="padding: 5px; margin: 10px; background-color:  var(--grey); border-radius: 20px;"><a href="store_menu.php">Store</a></button>
         		</form>
         	</div>
         </div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>