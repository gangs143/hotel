<?php 	include '../classes/Databases.php'; 
	$db = new Databases;?>
<?php include('../includes/header.php') ?>
<?php include('../includes/side.php') ?>
	<!-- START PAGE CONTENT-->
	<div class="page-content fade-in-up">
		<h3 class="page-title">Room Type</h3>
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
						<div class="table-responsive">
							<table class="table table-condensed table-bordered table-sm" id="tbl">
								<thead class="bg-primary text-white">
									<tr>
                                    <th>RoomType</th>
                                    <th>Price</th>
                                    <th>date</th>
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

	<!-- Modal Contents goes here -->
	<div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Insert Room Type...</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<form method="post" id="submitForm" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<label class="control-label">Type</label>
								<div class="input-group mb-3 input-group-sm">
									<div class="input-group-prepend">
										<span class="input-group-text fa fa-hotel fa-lg"></span>
									</div>
									<input type="text" id="roomtype" name="roomtype" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" class="form-control">
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<label class="control-label">Price</label>
								<div class="input-group mb-3 input-group-sm">
									<div class="input-group-prepend">
										<span class="input-group-text fa fa-money fa-lg"></span>
									</div>
									<input type="text" id="price" name="price" data-parsley-type="number" data-parsley-trigger="keyup" class="form-control">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input type="hidden" name="insertroomtype">
						<input type="submit" name="sendData" id="sendData" class="btn btn-primary btnDisable" value="Insert">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Modal Update Content -->
	<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Update Room Type...</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<form method="post" id="updateForm">
					<div class="modal-body">
						<div class="row">
							<input type="hidden" name="updateid" id="updateid">
							<div class="col-md-6 col-sm-6">
								<label class="control-label">Type</label>
								<div class="input-group mb-3 input-group-sm">
									<div class="input-group-prepend">
										<span class="input-group-text fa fa-hotel fa-lg"></span>
									</div>
									<input type="text" id="uproomtype" name="uproomtype" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" class="form-control">
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<label class="control-label">Price</label>
								<div class="input-group mb-3 input-group-sm">
									<div class="input-group-prepend">
										<span class="input-group-text fa fa-money fa-lg"></span>
									</div>
									<input type="text" id="upprice" name="upprice" data-parsley-type="number" data-parsley-trigger="keyup" class="form-control">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="updateroomtype">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button id="updateData" class="btn btn-primary btnDisable">Update Data</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php include('../includes/footer.php') ?>
<script>
	$(document).ready(function() {
		loadData();
		$('#submitForm, #updateForm').parsley();
		$('#modalOpen').on('click', function() {
			$('#modalInsert').modal('show');
		});
		$('#submitForm').on('submit', function(e) {
			e.preventDefault();
			var isValid = true;
			$($(this).find('input[type="text"]')).each(function() {
				if($(this).val().length == 0) {
					isValid = false;
					$(this).css({
						'border': '1px solid red',
						'background-color': '#FFCECE'
					});
				}
				else {
					$('input[type="text"]').on('keyup', function() {
						$('input[type="text"]').css({
							'border': "",
							'background-color': ""
						})
					})
				}
			});

			if(isValid == true) {
				if($('#submitForm').parsley().isValid()) {
					$.ajax({
						url: "operations/insert.php",
						method: "post",
						data: new FormData(this),
						contentType: false,
						processData: false,
						beforeSend: function() {
						    disableButton('btnDisable', true);
						},
						success: function(data) {
						    disableButton('btnDisable', false);
							success('SUCCESS', data);
							$('#modalInsert').modal('hide');
							loadData();
							$('#submitForm')[0].reset();
						}
					})
				}
			}
		})
		
		$(document).on('click', '.btn-edit', function() {
			var id = $(this).attr("id");
			var selectroomtype = "selectroomtype";
			$('#updateid').val(id);
			$.ajax({
				url: "operations/select.php",
				method: "POST",
				data: {id: id, selectroomtype: selectroomtype},
				dataType: "json",
				success: function(data) {
					$('#uproomtype').val(data.type);
					$('#upprice').val(data.price);
				
				}
			})
			$('#modalUpdate').modal('show');
		});

		$('#updateForm').on('submit', function(e) {
			e.preventDefault();
			var isValid = true;
			$($(this).find('input[type="text"]')).each(function() {
				if($(this).val().length == 0) {
					isValid = false;
					$(this).css({
						'border': '1px solid red',
						'background-color': '#FFCECE'
					});
				}
				else {
					$('input[type="text"]').on('keyup', function() {
						$('input[type="text"]').css({
							'border': "",
							'background-color': ""
						})
					})
				}
			});
			if(isValid == true) {
				if($('#updateForm').parsley().isValid()) {
					$.ajax({
						url: "operations/updates.php",
						method: "post",
						data: $('#updateForm').serialize(),
						beforeSend: function() {
						    disableButton('btnDisable', true);
						},
						success: function(data) {
						    disableButton('btnDisable', false);
							success('SUCCESS', data);
							$('#modalUpdate').modal('hide');
							loadData();
						}
					})
				}
			}
		})

		$(document).on('click', '.btn-delete', function() {
			var id = $(this).attr("id");
			var delroomtype = "delroomtype";
			if(confirm("ma hubtaa inaa tirtirayso")) {
				$.ajax({
					url: "operations/delete.php",
					method: "post",
					data: {id: id, delroomtype: delroomtype},
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
			var loadroomtype = "loadroomtype";
			$.ajax({
				url: "operations/select.php",
				method: "post",
				data: {loadroomtype: loadroomtype},
				beforeSend: function(){
					$('#tbody').html(loadwaiter());
					$('.lds-spinner').css('display', 'block')
				},
				success: function(data) {
					$('.lds-spinner').css('display', 'none');
					$('#tbody').html(data);
				}
			})
		}
		$(document).ajaxComplete(function(){
        	limit('displayLimit','tbl');
        	search('search','tbl');
        });
        $('#submitForm, #updateForm').attr('auto-complete', 'off');
	});
</script>