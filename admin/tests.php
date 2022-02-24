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
							tests
						</h1>
					</div>
                    <div class="row">
						<div class="col-12 col-lg-12 col-xxl-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<div class="card-actions float-right">
									<button type="button" class="btn btn-primary btn-pill btn-sm" data-toggle="modal" data-target="#addTest">
										Add Test
									</button>
									</div>
									<h5 class="card-title mb-0">Test Table</h5>
								</div>
								<div class="care-body">
									<div class="card">
										<div class="card-body">
											<table id="testsTable" class="table table-striped my-0 testsTable">
												<thead>
													<tr>
														<th>Name</th>
														<th>Status</th>
														<th>Category</th>
														<th>Delivery Time</th>
														<th>Test Info</th>
														<th>Price</th>
														<th>Sample Type</th>
														<th>Image</th>
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
						</div>
					</div>
				</div>
			</main>
			<div class="modal fade" id="editTest" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Test</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="EditTestForm">
							<div class="form-group">
								<div class="row">
									<div class="col">
										<label class="form-label">Test Name</label>
										<input type="text" name="etestName" id="etestName" class="form-control" placeholder="Test Name">
									</div>
									<div class="col">
										<label class="form-label">Pre Test Info</label>
										<input type="text" name="etestInfo" id="etestInfo" class="form-control" placeholder="Pre Test Info">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col">
									<label class="form-label">Select Categoty</label>
									<select name="etestCategory" id="etestCategory" class="custom-select mb-3 guides">
									</select>
									</div>
									<div class="col">
									<label class="form-label">Test Status</label>
									<select name="etestStatus" id="etestStatus" class="custom-select mb-3">
										<option value="true">Active</option>
										<option value="false">Inactive</option>
									</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col">
										<label class="form-label">Delivery time</label>
										<input type="text" name="etestDelivery" id="etestDelivery" class="form-control" placeholder="Delivery time">
									</div>
									<div class="col">
										<label class="form-label">Sample Type</label>
										<input type="text" name="etestSample" id="etestSample" class="form-control" placeholder="Sample Type">
									</div>
									<div class="col">
										<label class="form-label">Price</label>
										<input type="number" name="etestPrice" id="etestPrice" class="form-control" placeholder="Price">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col">
										<img src="" id="eimageid" alt="" width="175px" style="margin-left:75px">
									</div>	
									<div class="col">
										<label class="form-label w-100">Test Image</label>
										<input type="file" id="efile" name="Files[]" multiple>
										<small class="form-text text-muted">wait till side image change.</small>
									</div>
									<div class="col">
										<label class="form-label">Description</label>
										<textarea class="form-control" name="etestDesc" id="etestDesc" placeholder="Description" rows="3"></textarea>
									</div>
								</div>
							</div>
							<input type="text" name="etestid" id="etestid" class="form-contol" hidden>
							<input type="text" name="etestImage" id="etestImage" value="" hidden>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="addTest" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Test</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="addTestForm">
							<div class="form-group">
								<div class="row">
									<div class="col">
										<label class="form-label">Test Name</label>
										<input type="text" name="testName" class="form-control" placeholder="Test Name">
									</div>
									<div class="col">
										<label class="form-label">Pre Test Info</label>
										<input type="text" name="testInfo" class="form-control" placeholder="Pre Test Info">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col">
									<label class="form-label">Select Categoty</label>
									<select name="testCategory" class="custom-select mb-3 dCategory">
									</select>
									</div>
									<div class="col">
									<label class="form-label">Test Status</label>
									<select name="testStatus" class="custom-select mb-3">
										<option value="true">Active</option>
										<option value="false">Inactive</option>
									</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col">
										<label class="form-label">Delivery time</label>
										<input type="text" name="testDelivery" class="form-control" placeholder="Delivery time">
									</div>
									<div class="col">
										<label class="form-label">Sample Type</label>
										<input type="text" name="testSample" class="form-control" placeholder="Sample Type">
									</div>
									<div class="col">
										<label class="form-label">Price</label>
										<input type="number" name="testPrice" class="form-control" placeholder="Price">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col">
										<label class="form-label w-100">Test Image</label>
										<input type="file" id="file" name="Files[]" multiple>
										<small class="form-text text-muted">choose tast image here.</small>
									</div>
									<div class="col">
										<label class="form-label">Description</label>
										<textarea class="form-control" name="testDesc" placeholder="Description" rows="3"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="DeleteTest" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Are you sure.?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
							<form id="DeleteTestForm">
						<div class="modal-body m-3">
							<img src="" id="imageid" alt="" width="169px" style="margin-left:75px">
						</div>
						<div class="modal-footer">
							<input type="text" name="testid" id="testid" class="form-contol" hidden>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" id="btnDeltest" value="" class="btn btn-danger">Delete</button>
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
	<script src="../assets/js/tests.js"></script>
</body>
</html>