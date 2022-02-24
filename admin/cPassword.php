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
							<h1 class="header-title">RESET PASSWORD.</h1>
					</div>

					<div class="row">
						<div class="col-12 col-lg-12 col-xxl-12 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<div class="card-actions float-right">
									</div>
								</div>
								<div class="card-body d-flex w-100">
                                    <div class="col-12 col-xl-12">
                                        <div class="card" style="border-top: 25px solid #00003E; border-bottom: 25px solid #30b890; border-left: 25px solid #30b890; border-right: 25px solid #30b890;">
                                            <div class="card-body">
                                                <div class="row h-100">
                                                    <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                                                        <div class="d-table-cell align-middle">
                                                            <div class="text-center mt-4">
                                                                <h1 class="h2">Reset password</h1>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="m-sm-1">
                                                                        <form action="code.php" method="POST">
                                                                            <input type="hidden" name="ChangePasswordUserId" value="<?= $user_data['Id'] ?>">
                                                                            <div class="form-group">
                                                                                <label>New Password</label>
                                                                                <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Conform Password</label>
                                                                                <input class="form-control form-control-lg" type="text" name="cpassword" placeholder="Conform password" />
                                                                            </div>
                                                                            <div class="text-center mt-3">
                                                                                <button type="submit" style="background-color:#153d77;" class="btn btn-lg btn-pill btn-primary" name="ChangePassword">Reset Password</button>
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
                                    </div>
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
</body>
</html>