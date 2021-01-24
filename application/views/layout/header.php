<body>
	<!-- Header -->
	<section class="header">
		<div class="wrapper">
			<!-- Sidebar  -->
			<nav id="sidebar1" class="sidebar1">
				<div id="dismiss1">
					<i class="fas fa-times"></i>
				</div>
				<div class="sidebar-header1">
					<h3>Menu</h3>
				</div>
				<ul class="list-unstyled components">
					<li>
						<a href="#">Home</a>
					</li>
					<li>
						<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Shop</a>
						<ul class="collapse list-unstyled" id="pageSubmenu">
							<li>
								<a href="#">Sepatu</a>
							</li>
							<li>
								<a href="#">Sandal</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">News</a>
					</li>
				</ul>
			</nav>
			<!-- Page Content  -->
		</div>
		<div class="overlay"></div>
		<div class="wrapper">
			<!-- Sidebar  -->
			<nav id="sidebar2" class="sidebar2">
				<div id="dismiss2">
					<i class="fas fa-times"></i>
				</div>
				<div class="sidebar-header2">
					<h3>Cart</h3>
				</div>
			</nav>
			<!-- Page Content  -->
		</div>
		<div class="overlay"></div>
		<nav class="navbar navbar-expand-lg fixed-top">
			<div class="container d-flex justify-content-beetween">
				<button class="btn d-lg-none btn-icon-nav shadow-none" id="sidebarCollapse1" type="button">
					<i class="fas fa-align-justify"></i>
				</button>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="<?php base_url() ?>home">Home</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="<?php echo base_url() ?>shop" id="navbarDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								shop
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="<?php echo base_url() ?>shop">All Product</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Footwear</a>
								<a class="dropdown-item" href="#">Apparels</a>
								<a class="dropdown-item" href="#">Accessories</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php base_url() ?>profile">Profile</a>
						</li>
						<li class="nav-item dropdown">
							<button class="btn btn-icon-nav shadow-none" href="#" id="navbarDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search"></i>
							</button>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<form class="form-inline d-flex justify-content-center" action="">
									<input class="form-control shadow-none" type="search..." placeholder="Search"
										aria-label="Search">
									<button class="btn d-flex align-items-center btn-search" type="submit"><i
											class="fas fa-search"></i></button>
								</form>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php base_url() ?>login">Login/Register</a>
						</li>
					</ul>
				</div>
				<a class="navbar-brand text-center" href="index.html">
					<img src="<?php echo base_url() ?>assets/pelanggan/assets/img/logo1.png" width="100" height="30" class="d-inline-block align-top" alt="">
				</a>
				<button class="btn btn-icon-nav shadow-none" id="sidebarCollapse2">
					<i class="fas fa-shopping-bag"></i>
				</button>
			</div>
		</nav>
	</section>
	<!-- End header -->
