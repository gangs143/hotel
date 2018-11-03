<?php 	include '../classes/Databases.php'; 
	$db = new Databases;?>
<?php include('../includes/header.php') ?>
<?php include('../includes/side.php') ?>
	<!-- START PAGE CONTENT-->
	<div class="page-content fade-in-up">
		<h3 class="page-title">checking</h3>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-success text-white btn-lg float-right fa fa-plus-circle" id="modalOpen"> Insert</button>
						<button class="btn btn-info text-white btn-lg float-right fa fa-plus-circle" id="modalOpenFilter"> Filter</button>
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-4">
						<div class="form-inline">
							<label class="" for="displayLimit">Showing</label>
							<select class="form-control custom-select" id="displayLimit">
								<option>10</option>
								<option>25</option>
								<option>50</option>
								<option>100</option>
							</select>
							<label for="displayLimit">entries</label>
						</div>
					</div>
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<div class="float-right">
							<div class="form-inline">
								<label class="" for="displayLimit"><strong>Search: </strong></label>
								<input type="search" name="search" class="form-control" id="search">
							</div>
						</div>
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-condensed table-bordered table-sm">
								<thead class="bg-primary text-white">
									<tr>
	                                    <th>ID</th>
	                                    <th>name</th>
	                                    <th>Room</th>
	                                    <th>Amount</th>
										<th><span class="fa fa-gear"></span> Action</th>
									</tr>
								</thead>
								<tbody id="tbody">
									

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php include('../includes/footer.php') ?>