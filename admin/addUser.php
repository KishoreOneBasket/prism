<?php
    include "../includes/db_config.php";
    if (isset($_POST['RegisterNow'])) {
        $FName = $_POST['FName'];
        $LName = $_POST['LName'];
        $Name = $FName." ".$LName;
        $Password = $_POST['Password'];
        $Phone = "+91 ".$_POST['Phone'];
        $Email = $_POST['Email'];

        date_default_timezone_set('Asia/Kolkata');
        $Today = date('d-m-Y,h:i A');

		if(!empty($FName) && !empty($Password) && !is_numeric($FName))
		{
			$Query = "INSERT INTO `tbl_prism_users`(`Name`, `Mobile`, `Email`, `Password`, `Role`, `Status`, `CreatedAt`) VALUES ('$Name', '$Phone', '$Email', '$Password', 'Route', 'Active', '$Today')";

			mysqli_query($conn, $Query);

            $_SESSION['status'] = "User Created Successfully";
            header("Location: users");
		} else {
            $_SESSION['status'] = "User Not Created, Please enter some valid information!";
            header("Location: users");
		}
    }
?>
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
						<h1 class="header-title">
							NEW USER REGISTRATION FORM.
						</h1>
					</div>

					<div class="row justify-content-center">
						<div class="col-12 col-lg-8 col-xxl-12 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<div class="card-actions float-right">
                                        <i class="fas fa-address-card"></i>
									</div>
                                    <h5 class="card-title">Registration Form.</h5>      
								</div>
								<hr>
								<div class="card-body d-flex w-100">
                                    <div class="col-12 col-xl-12">
                                        <div class="card">
											<div class="card-body">
												<form action="addUser" method="post">
													<div class="form-row">
														<div class="form-group col-md-6">
															<label for="FName">First Name</label>
															<input type="text" class="form-control" id="FName" name="FName" placeholder="First Name">
														</div>
														<div class="form-group col-md-6">
															<label for="LName">Last Name</label>
															<input type="text" class="form-control" id="LName" name="LName" placeholder="Last Name">
														</div>
													</div>
													<div class="form-group">
														<label for="Phone">Mobile</label>
														<input type="text" class="form-control" id="Phone" name="Phone" placeholder="Phone">
													</div>
													<div class="form-group">
														<label for="Email">Email</label>
														<input type="text" class="form-control" id="Email" name="Email" placeholder="Email">
													</div>
													<div class="form-group">
														<label for="Password">Password</label>
														<input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
													</div>
													<div class="form-group">
														<button type="submit" name="RegisterNow" class="btn btn-primary float-right">Register Now</button>
													</div>
												</form>
											</div>
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
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
</body>
</html>