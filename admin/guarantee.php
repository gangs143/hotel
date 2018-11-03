<?php 	include '../classes/Databases.php'; 
	$db = new Databases;?>
<?php include('../includes/header.php') ?>
<?php include('../includes/side.php') ?>
	<!-- START PAGE CONTENT-->
	<div class="page-content fade-in-up">
		<h3 class="page-title">Guarentee</h3>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-success text-white btn-lg float-right fa fa-plus-circle" id="modalOpen"> Insert</button>
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
						<div id="tbody">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- Modal Contents goes here -->
	<div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">guest form</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form method="post" enctype="multipart/form-data" id="submitForm">
						<div class="modal-body">
							<div class="row">
								<div class="col-md-4">
									<label class="control-label">Name</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<input type="text" id="name" name="name" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<label class="control-label">Phone</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-phone fa-lg"></span>
										</div>
										<input type="text" id="phone" name="phone" data-parsley-type="number" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<label class="control-label">Title</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<input type="text" id="title" name="title" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
						</div>
							</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<input type="hidden" name="action" id="action" value="insert">
							<input type="submit" name="sendData" id="sendData" class="btn btn-primary" value="Insert">
							
							<!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
						</div>
					</form>
				</div>
			</div>
		</div>

	<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">staff form</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form id="updateForm" method="post">
						<div class="modal-body">
							<input type="hidden" name="updateid" id="updateid">
							<div class="row">
								<div class="col-md-4">
									<label class="control-label">name</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<input type="text" id="upname" name="upname" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
								<div class="col-md-3">
									<label class="control-label">phone</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-phone fa-lg"></span>
										</div>
										<input type="text" id="upphone" name="upphone" data-parsley-type="number" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<label class="control-label">Title</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<input type="text" id="uptitle" name="uptitle" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button id="updateData" class="btn btn-primary">Update Data</button>
							
							<!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
						</div>
					</form>
				</div>
			</div>
		</div>
<?php include('../includes/footer.php') ?>
<script>
		$(document).ready(function() {
			loadData();
			$('#modalOpen').on('click', function() {
				$('#modalInsert').modal('show');
			});
			$('#action').val('insertbail');
			$('#submitForm').on('submit', function(e) {
				var input;
				e.preventDefault();
				var name = $('#name').val();
				var phone = $('#phone').val();
				var title = $('#title').val();
				$('#submitForm :input').each(function(){
					input = $(this);
				})
				if(input.val() == "") {
					alert('fadlan xaafada ciyaarta ka daa');
					return false;
				}
                else{
                	if($('#submitForm').parsley().isValid()) {
                		$.ajax({
							url: "operations/insert.php",
							method: "post",
							data: new FormData(this),
							contentType: false,
							processData: false,
							success: function(data) {
								alert(data);
								$('#modalInsert').modal('hide');
								loadData();
								$('#submitForm')[0].reset();
							}
						})
                	}
					// if($('#submitForm').parsley().isValid()) {
						
					// }
				}
			})

			$('#updateForm').on('submit', function(e) {
				e.preventDefault();
			});
			
			$(document).on('click', '.btn-edit', function() {
				var id = $(this).attr('id');
				$('#updateid').val(id);
				var closes = $(this).closest('tr');
				$('#upname').val(closes.find('td:eq(0)').text());
				$('#upphone').val(closes.find('td:eq(1)').text());
				$('#uptitle').val(closes.find('td:eq(2)').text());
				$('#modalUpdate').modal('show');
			});
			$('#updateData').on('click', function() {
				var UpdateBial = "UpdateBial";
				var id = $('#updateid').val();
				var uname = $('#upname').val();
				var uphone = $('#upphone').val();
				var utitle = $('#uptitle').val();
				if($('#updateForm').parsley().isValid()) {
					$.ajax({
						url: "operations/updates.php",
						method: "post",
						data: {
							id: id,
							UpdateBial: UpdateBial,
							upname: uname,
							upphone: uphone,
							uptitle: utitle
						},
						success: function(data) {
							success('SUCCESS', data);
							loadData();
						}
					})
				}
				$('#modalUpdate').modal('hide');
			});
			$(document).on('click', '.btn-delete', function() {
				var id = $(this).attr("id");
				var delbail = "delbail";
				if(confirm("ma hubtaa inaa tirtirayso")) {
					$.ajax({
						url: "operations/delete.php",
						method: "post",
						data: {id: id, delbail: delbail},
						success: function(data) {
							success('SUCCESS', data);
							loadData();
						}
					})
				}
				else {
					return false;
				}
			})
			function loadData() {
				var loadguarantee = "loadguarantee";
				$.ajax({
					url: "operations/select.php",
					method: "post",
					data: {loadguarantee: loadguarantee},
					success: function(data) {
						$('#tbody').html(data);
					}
				})
			}
			$(document).ajaxComplete(function(){
	        	limit('displayLimit','tbl');
	        	search('search','tbl');
	        });
	        $('#submitForm, #updateForm').attr('autocomplete', 'off');
		});
	</script>