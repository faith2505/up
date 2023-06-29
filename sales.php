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
			<li>
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
			<li class="active">
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
					<h1>SALES REPORT</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Sales Report</a>
						</li>
					</ul>
				</div>
				<button onclick="window.print()" class="btn-download">
					<i class='bx bxs-cloud-download' > </i>
					<span class="text">Download PDF</span>
				</button>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Sales Today</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>ID</th>
								<th>Product</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total Price</th>
							</tr>
						</thead>

					<!--Para sa recent orders -->
						<tbody>
							<?php
								$sql="Select * from ((product_tbl INNER JOIN sales_tbl ON product_tbl.id=sales_tbl.id) INNER JOIN order_tbl ON order_tbl.id=sales_tbl.id)";
								$result=mysqli_query($con,$sql);

								while ($row=mysqli_fetch_assoc($result)) {
									$id=$row['id'];
									$name=$row['name'];
									$price=$row['price'];
									$quantity=$row['quantity'];
									$total_price=$row['total_price'];

									echo'
										<tr>
											<th>'.$id.'</th>
											<td>'.$name.'</td>
											<td>'.$price.'</td>
											<td>'.$quantity.'</td>
											<td>'.$total_price.'</td>
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
				<div class="order">
					<div class="head">
						<h3>Sales History</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>ID</th>
								<th>Product</th>
								<th>Total Price</th>
								<th>Date</th>
							</tr>
						</thead>

						<tbody>
							<?php
								$sql="Select * from ((product_tbl INNER JOIN sales_tbl ON product_tbl.id=sales_tbl.id) INNER JOIN order_tbl ON order_tbl.id=sales_tbl.id)";
								$result=mysqli_query($con,$sql);

								while ($row=mysqli_fetch_assoc($result)) {
									$id=$row['id'];
									$name=$row['name'];
									$total_price=$row['total_price'];
									$date=$row['date'];

									echo'
										<tr>
											<th>'.$id.'</th>
											<td>'.$name.'</td>
											<td>'.$date.'</td>
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
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>