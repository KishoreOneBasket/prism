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
							Bookings
						</h1>
					</div>
                    <div class="row">
						<div class="col-12 col-lg-12 col-xxl-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<div class="card-actions float-right">
										
									</div>
									<h5 class="card-title mb-0">Bookings Table</h5>
								</div>
								<div class="card">
									<div class="card-body">
										<table id="driversTable" class="table table-striped my-0 driversTable">
											<thead>
												<tr>
													<th>User Id</th>
													<th>Payment Status</th>
													<th>Amount</th>
													<th>Status</th>
													<th>Date</th>
													<th>Update</th>
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
			</main>
			<div class="modal fade" id="UpdateBooking" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Update Booking</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="updateBookingForm">
							<input type="text" name="PatientBookingId" id="PatientBookingId" class="form-control">
							<div class="form-group">
								<div class="row">
									<div class="col">
										<label class="form-label">Patient Name</label>
										<input type="text" name="PatientName" id="PatientName" class="form-control">
									</div>
									<div class="col">
										<label class="form-label">Patient Age</label>
										<input type="Naumber" name="PatientAge" id="PatientAge" class="form-control">
									</div>
									<div class="col">
										<label class="form-label">Patient Gender</label>
										<input type="text" name="PatientGender" id="PatientGender" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col">
										<label class="form-label">Patient Address</label>
										<input type="text" name="PatientAddtess" id="PatientAddtess" class="form-control" placeholder="Delivery time">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
								<div class="col">
										<label class="form-label">Payment Status</label>
										<input type="text" name="PaymentStatus" id="PaymentStatus" class="form-control">
									</div>
									<div class="col">
										<label class="form-label">Payment Amount</label>
										<input type="Number" name="PaymentAmount" id="PaymentAmount" class="form-control">
									</div>
									<div class="col">
										<label class="form-label">Booking Status</label>
										<select name="BookingStatus" id="BookingStatus" class="custom-select mb-3">
										<option value="In Process" style="color:brown;">In Process</option>
										<option value="Confirmed" style="color:green;">Confirmed</option>
										<option value="Sample Taken" style="color:blue;">Sample Taken</option>
										<option value="Delivered" style="color:yellowgreen;">Delivered</option>
										<option value="Cancelled" style="color:red;">Cancelled</option>
									</select>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<table id="ReportsAddTable" class="table table-striped my-0 ReportsAddTable">
										<thead>
											<tr>
												<th>Test Id</th>
												<th>Test Name</th>
												<th>Test Price</th>
												<th>Add Report</th>
											</tr>
										</thead>
										<tbody id="Ttbodyid">
										</tbody>
									</table>
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
			<div class="modal fade" id="UploadReportModel" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Upload Report</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card">
							<div class="card-body">
								<form id="uploadReportForm">
									<div class="modal-body">
										<div class="form-group">
											<label class="form-label w-100">Test Name</label>
											<input type="text" name="TestName" id="TestName" class="form-contol w-100">
											<input type="text" name="TestNo" id="TestNo" class="form-contol">
											<input type="text" name="TestId" id="TestId" class="form-contol">
											<input type="text" name="testprice" id="testprice" class="form-contol">
											<input type="text" name="rBookingId" id="rBookingId" class="form-contol">
											<input type="text" name="ReportUrl" id="ReportUrl" class="form-contol">
										</div><hr>
										<div class="form-group">
											<label class="form-label w-100">File input</label>
											<input type="file" id="efile" class="form-contol" name="Files[]" multiple>
											<small class="form-text text-muted">Upload report file.</small>
										</div>
										<hr>
									</div>
										<button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary float-right">Save</button>
									<p class="error red-text center-align"></p>
								</form>
							</div>
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
	<script src="../assets/js/booking.js"></script>
</body>
</html>