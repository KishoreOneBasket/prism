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
							Banners
						</h1>
					</div>
                    <div class="row">
						<div class="col-12 col-lg-7 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<div class="card-actions float-right">
									</div>
									<h5 class="card-title mb-0">Banners table</h5>
								</div>
								<div class="card">
									<div class="card-body">
										<table id="bannersTable" class="table table-striped my-0 bannersTable">
											<thead>
												<tr>
													<th>Image</th>
													<th>Status</th>
													<th>Edit</th>
													<th>Delete</th>
												</tr>
											</thead>
											<tbody id="tbodyid"></tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-5 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<div class="card-actions float-right">
									</div>
									<h5 class="card-title mb-0 titleBannerAdd">Add Banner</h5>
									<h5 class="card-title mb-0 titleBannerEdit" style="display:none;">>Edit Banner</h5>
									<p class="error red-text center-align"></p>
								</div>
								<div class="card-body d-flex w-100">
									<div class="card">
										<div class="card-body">
											<form id="bannerForm">
												<div class="form-group">
													<label class="form-label">Banner Status</label>
													<select name="banner-status" class="custom-select mb-3">
														<option value="true">Show</option>
														<option value="false">Hide</option>
													</select>
												</div>
												<div class="form-group">
													<label class="form-label w-100">File input</label>
													<input type="file" id="file" name="Files[]" multiple>
													<small class="form-text text-muted">Example block-level help text here.</small>
												</div>
												<button type="submit" class="btn btn-primary float-right">Submit</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
			<div class="modal fade" id="DeleteBanner" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Are you sure.?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
							<form id="DeleteBannerForm">
						<div class="modal-body m-3">
							<img src="" id="imageid" alt="" width="169px" style="margin-left:75px">
						</div>
						<div class="modal-footer">
							<input type="text" name="testid" id="testid" class="form-contol" hidden>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" id="btnDelCat" value="" class="btn btn-danger">Delete</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="UpdateBannerModel" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Banner</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="editBannerForm">
							<div class="form-group">
								<img src="" id="Eimageid" alt="" width="169px" style="margin-left:75px">
							</div>
							<input type="text" name="Etestid" id="Etestid" class="form-contol" hidden>
							<input type="text" name="Etestimage" id="Etestimage" class="form-contol" hidden>
							<div class="form-group">
								<label class="form-label">Banner Status</label>
								<select name="banner-status" class="custom-select mb-3">
									<option value="true">Show</option>
									<option value="false">Hide</option>
								</select>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php include('../includes/footer.php'); ?>
		</div>
	</div>
	<script src="../assets/js/app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-storage.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
	<script src="../assets/js/banners.js"></script>

</body>
</html>