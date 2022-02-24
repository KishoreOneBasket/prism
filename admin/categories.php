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
		#loading-image {
                width: 200px;
                position: absolute;
                z-index: 2;
                top: 30%;
                left: 45%;
            }
			#overlay img { display: none; }

			#overlay.currently-loading img { 
				display: block; 
				width: 100%;
			}
	</style>
</head>

<body>
	<div class="splash active">
		<div class="splash-icon"></div>
	</div>

	<div class="wrapper">
		<?php include('../includes/sidebar.php'); ?>
		<div id="overlay"><img src="../assets/img/avatars/PrismLoader.gif" alt="loader" id="loading-image" /></div>
		<div class="main">
			<?php include('../includes/topbar.php'); ?>
			<main class="content">
				<div class="container-fluid">
					<div class="header">
						<h1 class="header-title account-details" >
							Categories
						</h1>
					</div>
                    <div class="row">
						<div class="col-12 col-lg-7 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<div class="card-actions float-right">
									</div>
									<h5 class="card-title mb-0">Categories Table</h5>
								</div>
								<div class="card-body">
									<table id="categoriesTable" class="table table-striped my-0 categoriesTable">
										<thead>
											<tr>
												<th>Name</th>
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
						<div class="col-12 col-lg-5 col-xxl-3 d-flex">
							<div class="card flex-fill w-100" style="height: 400px;">
								<div class="card-header">
									<div class="card-actions float-right">
									</div>
									<h5 class="card-title mb-0">Add Category</h5>
									<p class="error red-text center-align"></p>
								</div>
								<div class="card-body d-flex w-100">
									<div class="card">
										<div class="card-body">
											<form id="categoriesForm">
												<div class="form-group">
													<label class="form-label">Category</label>
													<input type="text" name="category-name" class="form-control" placeholder="Category">
												</div>
												<div class="form-group">
													<label class="form-label w-100">File input</label>
													<input type="file" id="file" name="Files[]" multiple>
													<small class="form-text text-muted">choose category Image here.</small>
												</div>
												<button type="submit" class="btn btn-primary float-right" style="background-color:#00003E;">Submit</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
			<div class="modal fade" id="UpdateCat" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Category.</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form id="EditCategoriesForm">
						<div class="modal-body m-3">
							<img src="" id="Eimageid" alt="" width="169px" style="margin-left:75px">
						</div>
						<div class="modal-body m-3">
							<input type="text" name="editCaTest" class="form-control" id="editCaTest" value="">
							<input type="text" name="editCaTestID" class="form-control" id="editCaTestID" value="" hidden>
							<input type="text" name="editCaImage" class="form-control" id="editCaImage" value="" hidden>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" id="EbtnDelCat" value="" class="btn btn-warning">Save</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!-- END  modal -->
			<div class="modal fade" id="DeleteCat" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Are you sure.?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form id="DeleteCategoriesForm">
						<div class="modal-body m-3">
							<img src="" id="imageid" alt="" width="169px" style="margin-left:75px">
						</div>
						<div class="modal-body m-3">
							<input type="text" name="deleteCategoryId" class="form-control" id="deleteCategoryId" value="" hidden>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" id="btnDelCat" value="" class="btn btn-danger">Delete</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!-- END   modal -->
			<?php include('../includes/footer.php'); ?>
		</div>
	</div>
	<script src="../assets/js/app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-storage.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
	<script src="../assets/js/categories.js"></script>
</body>
</html>