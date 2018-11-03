<?php 	include '../classes/Databases.php'; 
	$db = new Databases;?>
<?php include('../includes/header.php') ?>
<?php include('../includes/side.php') ?>
	<!-- START PAGE CONTENT-->
	<div class="page-content fade-in-up">
		<h3 class="page-title">Guest</h3>
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
				<!-- popup modal for displaying guarante information -->
				<div class="tblbail">
					<div class="tblheader">
						<span class="tbltitle">Guarantee Modal Info...</span>
					</div>
					<div class="tblbody" id="tblbody"></div>
				</div>
			</div>
		</div>
	<!-- Modal Contents goes here -->
		<div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Insert Guest Form...</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<button id="btnpanel" class="btn btn-sm btn-success">Show</button>
					<form method="post" enctype="multipart/form-data" id="submitForm">
						<div class="modal-body">
							<div class="panel" id="first-pnl">
								<div class="panel-body">
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
											<label class="control-label">Nationality</label>
											<div class="input-group mb-3 input-group-sm">
												<div class="input-group-prepend">
													<span class="input-group-text fa fa-home fa-lg"></span>
												</div>
												<input type="text" id="nationality" name="nationality" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label class="control-label">Gender</label>
											<div class="input-group mb-3 input-group-sm">
												<div class="input-group-prepend">
													<span class="input-group-text fa fa-mars fa-lg"></span>
												</div>
												<select  id="gender" name="gender" class="form-control">
													<option value="male">Male</option>
													<option value="female">Female</option>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<label class="control-label">Description</label>
											<div class="input-group mb-3 input-group-sm">
												<div class="input-group-prepend">
													<span class="input-group-text fa fa-comment fa-lg"></span>
												</div>
												<input type="text" id="description" name="description" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" class="form-control">
											</div>
										</div>
								  	</div>
								</div>
							</div>
							<div class="panel" id="second-pnl">
								<div class="panel-body">
									<hr>
									<div class="divider">
										<h4>Guarantee Section</h4>
									</div><br>
									<div class="row">
										<div class="col-md-4">
											<label class="control-label">Name</label>
											<div class="input-group mb-3 input-group-sm">
												<div class="input-group-prepend">
													<span class="input-group-text fa fa-user fa-lg"></span>
												</div>
												<input type="text" name="grname" id="grname" placeholder="guarentee name..."class="form-control">
											</div>
										</div>
										<div class="col-md-4">
											<label class="control-label">Phone</label>
											<div class="input-group mb-3 input-group-sm">
												<div class="input-group-prepend">
													<span class="input-group-text fa fa-phone fa-lg"></span>
												</div>
												<input type="text" name="grphone" id="grphone" class="form-control" placeholder="guarentee phone...">
											</div>
										</div>
										<div class="col-md-4">
											<label class="control-label">Title</label>
											<div class="input-group mb-3 input-group-sm">
												<div class="input-group-prepend">
													<span class="input-group-text fa fa-book fa-lg" placeholder="guarentee title"></span>
												</div>
												<input type="text" name="grtitle" id="grtitle" placeholder="guarentee title..." class="form-control">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<input type="hidden" name="insertguest" />
							<input type="submit" name="sendData" id="sendData" class="btn btn-primary btnDisable" value="Insert">
						</div>
					</form>
				</div>
			</div>
		</div>

	<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Update Guest Form...</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form id="updateForm" method="post">
						<div class="modal-body">
							<input type="hidden" name="updateid" id="updateid">
							<div class="row">
								<div class="col-md-4">
									<label class="control-label">Name</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<input type="text" id="upname" name="upname" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<label class="control-label">Phone</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-phone fa-lg"></span>
										</div>
										<input type="text" id="upphone" name="upphone" data-parsley-type="number" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<label class="control-label">Nationality</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-home fa-lg"></span>
										</div>
										<input type="text" id="upnationality" name="upnationality" data-parsley-pattern="^[a-z A-Z]+$" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="control-label">Gender</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-mars fa-lg"></span>
										</div>
										<select  id="upgender" name="upgender" class="form-control">
											<option value="male">Male</option>
											<option value="female">Female</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<label class="control-label">Description</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-comment fa-lg"></span>
										</div>
										<input type="text" id="updescription" name="updescription" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
						  	</div>
						  	<hr>
						  	<div class="divider">
								<h4>Guarantee Section</h4>
							</div><br>
							<div class="row">
								<div class="col-md-4">
									<label class="control-label">Name</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-mars fa-lg"></span>
										</div>
										<!-- <input type="text"> -->
										<input type="text" id="upgrname" name="upgrname" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<label class="control-label">Phone</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<input type="text" id="upgrphone" name="upgrphone" data-parsley-type="number" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<label class="control-label">Title</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-book fa-lg"></span>
										</div>
										<input type="text" id="upgrtitle" name="upgrtitle" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
						  	</div>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="updateguest">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button id="updateData" class="btn btn-primary btnDisable">Update Data</button>
							
							<!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- guarentee section -->
		<div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Guarantee Info...</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<div class="table-responsive" id="showInfo">
							
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input type="submit" name="btnSub" id="btnSub" class="btn btn-primary btnDisable" value="Insert">
						
						<!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
					</div>
				</div>
			</div>
		</div>

		
<?php include('../includes/footer.php') ?>
<script>
		$(document).ready(function() {
			loadData();
			$('#submitForm, #updateForm').parsley();
			//hiding guarentee section
				$('#second-pnl').hide();
					checkPanel = false;

			$('#modalOpen').on('click', function() {
				$('#modalInsert').modal('show');
			});
			$('#btnpanel').on('click', function() {
					if(checkPanel != true) {
						checkPanel = true;
						$(this).text('Hide');
						$(this).attr('class', 'btn btn-danger btn-sm');
						$('#second-pnl').show();
					}
					else {
						checkPanel = false;
						$(this).text('Show');
						$(this).attr('class', 'btn btn-success btn-sm');
						$('#second-pnl').hide();
						$('#second-pnl input').val('');
				}
			});

			$(document).on('mouseover', '.btn-popup', function(e) {
				$('.tblbail').css('display', 'block');
				var id = $(this).attr("id");
				var loadbail = "loadbail";
				$('.tblbail').css({
					'top': (e.pageY - 40) + 'px',
					'left': (e.pageX - 600) + 'px'
				})
				$.ajax({
					url: 'operations/select.php',
					type: 'post',
					data: {id: id, loadbail: loadbail},
					beforeSend: function() {
						$('.tblbody').html('<div class="loading"></div>');
					},
					success: function(data) {
						$('.tblbody').find('.loading').remove();
						$('#tblbody').html(data);
					}
				})
			});
			$('.tblbail').on('mouseleave', function() {
				$(this).css('display', 'none');
			});
			$('#submitForm').on('submit', function(e) {
				e.preventDefault();
				if(checkPanel == true) {
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
					})

					if(isValid == true) {
						if($('#submitForm').parsley().isValid()) {
							$.ajax({
								url: "operations/insert.php",
								method: "post",
								data: $(this).serialize(),
        						beforeSend: function() {
        						    disableButton('btnDisable', true);
        						},
        						success: function(data) {
        						    disableButton('btnDisable', false);
									success('Success', data);
									loadData();
									$('#submitForm')[0].reset();
									$('#modalInsert').modal('hide');
								}
							});
						}
					}
				}
				else {
					var isValid = true;
					$($('#first-pnl').find('input[type="text"]')).each(function() {
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
					})

					if(isValid == true) {
						if($('#submitForm').parsley().isValid()) {
							$.ajax({
								url: "operations/insert.php",
								method: "post",
								data: $(this).serialize(),
        						beforeSend: function() {
        						    disableButton('btnDisable', true);
        						},
        						success: function(data) {
        						    disableButton('btnDisable', false);
									success('Success', data);
									loadData();
									$('#submitForm')[0].reset();
									$('#modalInsert').modal('hide');
								}
							});
						}
					}
				}
			});
			
			$(document).on('click', '.btn-edit', function() {
				var id = $(this).attr('id');
				$('#updateid').val(id);
				$.ajax({
					url: 'operations/select.php',
					type: 'post',
					data: {id: id, selectguest: 'selectguest'},
					dataType: 'json',
					success: function(data) {
						$('#upname').val(data.name);
						$('#upphone').val(data.phone);
						$('#upnationality').val(data.nationality);
						$('#upgender').val(data.gender);
						$('#updescription').val(data.description);
						$('#upgrname').val(data.grname);
						$('#upgrphone').val(data.grphone);
						$('#upgrtitle').val(data.grtitle);
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
				})

				if(isValid == true) {
					if($('#updateForm').parsley().isValid()) {
						$.ajax({
							url: "operations/updates.php",
							method: "post",
							data: $(this).serialize(),
    						beforeSend: function() {
    						    disableButton('btnDisable', true);
    						},
    						success: function(data) {
    						    disableButton('btnDisable', false);
								success('SUCCESS', data);
								loadData();
								$('#modalUpdate').modal('hide');
							}
						});
					}
				}
				
			});
			$(document).on('click', '.btn-delete', function() {
				var id = $(this).attr("id");
				var delguest = "delguest";
				if(confirm("ma hubtaa inaa tirtirayso")) {
					$.ajax({
						url: "operations/delete.php",
						method: "post",
						data: {id: id, delguest: delguest},
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
				var loadGuest = "loadGuest";
				$.ajax({
					url: "operations/select.php",
					method: "post",
					data: {loadGuest: loadGuest},
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
	        $('#submitForm, #updateForm').attr('autocomplete', 'off');

	        	
		});
	</script>