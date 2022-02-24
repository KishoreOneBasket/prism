<?php
    include "../includes/db_config.php";

    if (isset($_POST['UpdateNow'])) {
        echo $uid = $_POST['UID'];
        $Name = $_POST['Name'];
        $Phone = $_POST['Phone'];
        $Email = $_POST['Email'];

        date_default_timezone_set('Asia/Kolkata');
        $Today = date('d-m-Y,h:i A');

        $query = "UPDATE `tbl_prism_users` SET `Name`='$Name', `Mobile`='$Phone', `Email`='$Email', `UpdatedAt`='$Today' WHERE `Id` = $uid";
        $updatedUser = mysqli_query($conn, $query);

        if ($updatedUser) {
            $_SESSION['status'] = "User Updated Successfully";
            header("Location: users");
        } else {
            $_SESSION['status'] = "User Not Updated";
            header("Location: users");
        }

    }
	if (isset($_POST['UpdateUserRole'])) {
        $RoleAs = $_POST['RoleAs'];
        $uid = $_POST['RUID'];
        date_default_timezone_set('Asia/Kolkata');
        $Today = date('d-m-Y,h:i A');

        $query = "UPDATE `tbl_prism_users` SET `Role`='$RoleAs', `UpdatedAt`='$Today' WHERE `Id` = $uid";
        $updatedUser = mysqli_query($conn, $query);
        if ($updatedUser) {
            $_SESSION['status'] = "Role Updated Successfully";
            header("Location: Users");
        } else {
            $_SESSION['status'] = "Role Not Updated";
            header("Location: Users");
        }
    }
	if (isset($_POST['UpdateUserStatus'])) {
        $StatusAs = $_POST['StatusAs'];
        $uid = $_POST['SUID'];
        date_default_timezone_set('Asia/Kolkata');
        $Today = date('d-m-Y,h:i A');

        $query = "UPDATE `tbl_prism_users` SET `Status`='$StatusAs', `UpdatedAt`='$Today' WHERE `Id` = $uid";
        $updatedUser = mysqli_query($conn, $query);
        if ($updatedUser) {
            $_SESSION['status'] = "Status Updated Successfully";
            header("Location: Users");
        } else {
            $_SESSION['status'] = "Status Not Updated";
            header("Location: Users");
        }
    }
	if (isset($_GET['DeleteUser'])) {

        $uid = $_GET['DeleteUser'];

        $query = "DELETE FROM `tbl_prism_users` WHERE `Id` = $uid";
        $DeleteUser = mysqli_query($conn, $query);

        if ($DeleteUser) {
            $_SESSION['status'] = "User Deleted Successfully";
            header("Location: users");
            exit();
        } else {
            $_SESSION['status'] = "User Deleted Updated";
            header("Location: users");
            exit();
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
							UPDATE USER INFO FORM.
						</h1>
					</div>
					<div class="row justify-content-center">
						<div class="col-12 col-lg-6 col-xxl-12 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<div class="card-actions float-right">
                                        <i class="fas fa-address-card"></i>
									</div>
                                    <h5 class="card-title">Update Form.</h5>      
								</div>
								<div class="card-body d-flex w-100">
                                    <div class="col-12 col-xl-12">
                                        <div class="card">
											<div class="card-body">
												<form action="EditUser" method="post">
													<?php
														$EditUserId = $_GET['Id'];
														$sql = "SELECT * FROM `tbl_prism_users` WHERE `Id` = $EditUserId";
														$res = mysqli_query($conn, $sql);
														$edit_user = mysqli_fetch_array($res);
													?>
													<input type="text" name="UID" value="<?= $edit_user['Id'] ?>" hidden>
													<div class="form-group">
														<label for="Name">Display Name</label>
														<input type="text" class="form-control" id="Name" name="Name" value="<?= $edit_user['Name'] ?>">
													</div>
													<div class="form-group">
														<label for="Phone">Mobile</label>
														<input type="text" class="form-control" id="Phone" name="Phone" value="<?= $edit_user['Mobile'] ?>">
													</div>
													<div class="form-group">
														<label for="Email">Email</label>
														<input type="text" class="form-control" id="Email" name="Email" value="<?= $edit_user['Email'] ?>">
													</div>
													<button type="submit" name="UpdateNow" class="btn btn-primary float-right btn-pill">Update Now</button>
												</form>
											</div>
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-3 col-xxl-12 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<div class="card-actions float-right">
                                        <i class="fas fa-address-card"></i>
									</div>
                                    <h5 class="card-title">Change Role.</h5>      
								</div>
								<div class="card-body d-flex w-100">
                                    <div class="col-12 col-xl-12">
									<div class="card">
											<div class="card-body">
												<label>Current Role is:</label>
                                                <h1 class="h2 border bg-warning text-center">
													<?= $edit_user['Role'] ?>
												</h1>
											</div>
                                        </div>
                                        <div class="card">
											<div class="card-body">
												<form action="EditUser" method="post">
													<input type="text" name="RUID" value="<?= $edit_user['Id'] ?>" hidden>
													<div class="form-group">
														<label for="RoleAs">Select Role</label>
														<select name="RoleAs" class="custom-select mb-3">
															<option value="User">User</option>
															<option value="Admin">Admin</option>
														</select>
													</div>
													<button type="submit" name="UpdateUserRole" class="btn btn-primary float-right btn-pill">Update Now</button>
												</form>
											</div>
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-3 col-xxl-12 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<div class="card-actions float-right">
                                        <i class="fas fa-address-card"></i>
									</div>
                                    <h5 class="card-title">Change Status.</h5>      
								</div>
								<div class="card-body d-flex w-100">
                                    <div class="col-12 col-xl-12">
										<div class="card">
											<div class="card-body">
												<label>Current Status is:</label>
                                                <h1 class="h2 border bg-success text-center">
													<?= $edit_user['Status'] ?>
												</h1>
											</div>
                                        </div>
                                        <div class="card">
											<div class="card-body">
												<form action="EditUser" method="post">
													<input type="text" name="SUID" value="<?= $edit_user['Id'] ?>" hidden>
													<div class="form-group">
														<label for="StatusAs">Select Status</label>
														<select name="StatusAs" class="custom-select mb-3">
															<option value="Active">Active</option>
															<option value="Inactive">Inactive</option>
														</select>
													</div>
													<button type="submit" name="UpdateUserStatus" class="btn btn-primary float-right btn-pill">Update Now</button>
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