<?php
	include("connection.php");
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
					<h1>STORE</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Store</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="store_menu.php">Menu</a>
						</li>
					</ul>
				</div>
				<a href="add_product.php" class="btn-download">
					<i class='bx bxs-cloud-download' > </i>
					<span class="text">+ Add Product</span>
				</a>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Store Products</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>ID</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Availability</th>
								<th>Action</th>
							</tr>
						</thead>

					<!--Para sa recent orders -->
						<tbody>
							<?php
								$sql="Select * from product_tbl";
								$result=mysqli_query($con,$sql);

								while ($row=mysqli_fetch_assoc($result)) {
									$id=$row['id'];
									$name=$row['name'];
									$price=$row['price'];
									$availability=$row['availability'];

									echo'
										<tr>
											<th>'.$id.'</th>
											<td>'.$name.'</td>
											<td>'.$price.'</td>
											<td>'.$availability.'</td>
											<td>
												<a href="store_update.php?updateid='.$id.'" class="btn-download">Update</a>
												<a href="store_delete.php?deleteid='.$id.'" class="btn-download" id="delete" name="delete"><i></i></a>
											</td>
										</tr>
									';
								}
							?>
						</tbody>
					</table>
				</div>
			</div>

			<a href="sold_product.php" class="btn-download">
				<i class='bx bxs-cloud-download' > </i>
				<span class="text">+ Add Sold Product</span>
			</a>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>