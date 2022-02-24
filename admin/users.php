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
		<?php if ($user_data['Role'] == 'Admin') { ?>
			<main class="content">
				<div class="container-fluid">
					<div class="header">
						<h1 class="header-title account-details" >
							Users
						</h1>
					</div>
                    <div class="row">
						<div class="col-12 col-lg-1 col-xxl-3 d-flex"></div>
						<div class="col-12 col-lg-10 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<div class="card-actions float-right">
									</div>
									<h5 class="card-title mb-0">Users</h5>
								</div>
								<div class="card">
									<div class="card-body">
										<table id="usersTable" class="table table-striped my-0 usersTable">
											<thead>
												<tr>
													<th>Name</th>
													<th>Mobile</th>
													<th>Device</th>
												</tr>
											</thead>
											<tbody></tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-1 col-xxl-3 d-flex"></div>
					</div>
				</div>
			</main>
			<?php } else { ?>
				<main class="content">
					<div class="container-fluid">

						<div class="header">
							<h1 class="header-title">
								Blank Page
							</h1>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Empty card</h5>
									</div>
									<div class="card-body">
										<div class="my-5">
											<h1 style="color:red;">to access this page login as admin</h1>
											&nbsp;</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</main>
			<?php } ?>
			<?php include('../includes/footer.php'); ?>
		</div>

	</div>
	<script src="../assets/js/app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-storage.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
	<script src="../assets/js/users.js"></script>

</body>
</html>