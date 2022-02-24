
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>Prism - Labs</title>
	<link rel="icon" type="image/x-icon" href="../assets/img/avatars/logo.jpeg">

	<link href="../assets/css/modern.css" rel="stylesheet">
	<style>
		body {
			opacity: 0;
		}
	</style>
</head>

<body>
	<div class="splash active">
		<div class="splash-icon"></div>
	</div>

	<div class="wrapper">
	<?php include('../includes/sidebar.php'); ?>
		<div class="main">
			<?php include('../includes/topbar.php'); ?>
			<main class="content">
				<div class="container-fluid">
					<div class="header">
						<h1 class="header-title account-details" >
							Dashboard
						</h1>
					</div>
					<div class="row">
						<div class="col-xl-12 col-xxl-12 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-4">
										<div class="card" style="border-bottom: 5px solid #00003E;">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Total Bookings</h5>
													</div>
													<div class="col-auto">
														<div class="avatar">
															<div class="avatar-title rounded-circle bg-primary-dark">
																<i class="align-middle" data-feather="star"></i>
															</div>
														</div>
													</div>
												</div>
												<h1 class="display-5 mt-1 mb-3" id="totalBookinsNo"></h1>
											</div>
										</div>
                                    </div>
									<div class="col-sm-4">
										<div class="card" style="border-bottom: 5px solid #00003E;">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Total Repors</h5>
													</div>
													<div class="col-auto">
														<div class="avatar">
															<div class="avatar-title rounded-circle bg-primary-dark">
																<i class="align-middle" data-feather="star"></i>
															</div>
														</div>
													</div>
												</div>
												<h1 class="display-5 mt-1 mb-3" id="totalReportsNo"></h1>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="card" style="border-bottom: 5px solid #00003E;">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Total Customers</h5>
													</div>
													<div class="col-auto">
														<div class="avatar">
															<div class="avatar-title rounded-circle bg-primary-dark">
																<i class="align-middle" data-feather="star"></i>
															</div>
														</div>
													</div>
												</div>
												<h1 class="display-5 mt-1 mb-3" id="totalUsersNo"></h1>
											</div>
										</div>
                                    </div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-12 col-xxl-12 d-flex">
							<div class="card flex-fill" style="border-bottom: 7px solid #00003E; border-left: 25px solid #30b890; border-right: 25px solid #30b890;">
								<div class="card-header">
									<div class="card-actions float-right">
									</div>
									<h5 class="card-title mb-0">Bookings</h5>
								</div>
								<div class="card-body">
									<table id="driversTable" class="table table-striped my-0 driversTable">
										<thead>
											<tr>
												<th>Name</th>
												<th>Payment Status</th>
												<th>Amount</th>
												<th>Status</th>
												<th>Date</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>

			<?php include('../includes/footer.php'); ?>
		</div>
	</div>
	<script src="../assets/js/app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
	<script src="../assets/js/dashboard.js"></script>
</body>
</html>