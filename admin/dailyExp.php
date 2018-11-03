<?php 	include '../classes/Databases.php'; 
	$db = new Databases;?>
<?php include('../includes/header.php') ?>
<?php include('../includes/side.php') ?>
	<!-- START PAGE CONTENT-->
	<div class="page-content fade-in-up">
		<h3 class="page-title">Expenses</h3>
			<div class="container">
				<div class="row">
					<div class="col-md-12 col text-right">
						<button class="btn btn-success text-white btn-lg  fa fa-plus-circle" id="modalOpen"> Insert</button>
						<button class="btn btn-info text-white btn-lg  fa fa-plus-money" id="btn-transfer"> Transfer</button>
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
			                            <th>Expenses Type</th>
			                            <th>Amount Of Money</th>
			                            <th>Description</th>
			                            <th>Action</th>
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


		<div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Insert Expense Form...</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form method="post" enctype="multipart/form-data" id="submitForm">
						<div class="modal-body">
							<div class="row">
								<div class="col-md-4">
									<label class="control-label">Type</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<input type="text" id="type" name="type" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
								<div class="col-md-3">
									<label class="control-label">Amount</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-money fa-lg"></span>
										</div>
										<input type="text" id="amount" name="amount" data-parsley-type="number" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
								<div class="col-md-5">
									<label class="control-label">Descriptioin</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-comment fa-lg"></span>
										</div>
										<textarea name="description" id="description" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" class="form-control"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<input type="hidden" name="insertDailyExp">
							<input type="submit" name="sendData" id="sendData" class="btn btn-primary btnDisable" value="Insert">
							
							<!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
						</div>
					</form>
				</div>
			</div>
		</div>
	<!-- Modal Contents goes here -->

		<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Update Expense Form...</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form method="post" id="updateForm">
						<div class="modal-body">
							<input type="hidden" name="updateid" id="updateid">
							<div class="row">
								<div class="col-md-4">
									<label class="control-label">Type</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<input type="text" id="uptype" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" name="uptype" class="form-control">
									</div>
								</div>
								<div class="col-md-3">
									<label class="control-label">Amount</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-money fa-lg"></span>
										</div>
										<input type="text" id="upamount" name="upamount" data-parsley-type="number" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
								<div class="col-md-5">
									<label class="control-label">Descriptioin</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-comment fa-lg"></span>
										</div>
										<textarea name="updescription" id="updescription" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" class="form-control"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="updateDailyExp">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button id="updateData" class="btn btn-primary btnDisable">Update Data</button>
						</div>
					</form>
				</div>
			</div>
		</div>
 
         <!-- TRANSFER MODEL  -->

		 <div class="modal fade" id="modalTrans" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Transfer Expense Form...</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form id="transferForm">
						<div class="modal-body">
							<input type="hidden" name="id" id="Transid">
							<div class="row">
								<div class="col-md-12">
									<label class="right"><span id="moneyTran"></span></label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-md-6">
									<div class="form-group">
										<label class="control-label">Date Transfer Money</label>
										<div class="input-group mb-3 input-group-sm">
											<div class="input-group-prepend">
												<span class="input-group-text fa fa-calendar fa-lg"></span>
											</div>
											<input type="text" id="TranDate" name="TranDate" class="form-control showDate">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<label class="control-label">Amount</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-money fa-lg"></span>
										</div>
										<input type="text" id="TranAmount" name="TranAmount" data-parsley-type="number" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="insertTransfer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button id="transferData" class="btn btn-primary btnDisable">Transfer Now</button>
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

		$('#submitForm, #modalInsert').parsley() ;
	
		// insert the data into database using ajax
		$('#submitForm').submit(function(e) {
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
		});

		$(document).on('click', '.btn-edit', function() {
			var id = $(this).attr('id');
			$('#updateid').val(id);
			var SelectDailyExp = "SelectDailyExp";

			$.ajax({
				url: "operations/select.php",
				method: "POST",
				data: {id: id, SelectDailyExp: SelectDailyExp},
				dataType:"json",
				success: function(data) {
					$('#uptype').val(data.type);
					$('#upamount').val(data.amount);
					$('#updescription').val(data.description);
				}
			});
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
						method: "POST",
						data: $(this).serialize(),
						beforeSend: function() {
						    disableButton('btnDisable', true);
						},
						success: function(data) {
						    disableButton('btnDisable', false);
							success('Success', data);
							$('#updateForm')[0].reset();
							$('#modalUpdate').modal('hide');
							loadData();
						}
					});
				}
			}

			/*if($('#updateForm input').val() == ''){
				alert("fadlan buuxi meelaha banaan");
			}
			else {
				if($('#updateForm').parsley().isValid()){
						$.ajax({
					url: "operations/updates.php",
					method: "POST",
					data: $(this).serialize(),
					data: {
						id: updateid,
						UpdateDailyExp:UpdateDailyExp,
						updatetype:updatetype,
						updateamount: updateamount,  
						updatedes:updatedes 
					},
					success: function(data) {
						success('Success', data);
						$('#updateForm')[0].reset();
						$('#modalUpdate').modal('hide');
						loadData();
					}
				});
				}
			
			}*/
		});

		//TRANSFER METHOD 
		$('#btn-transfer').on('click',  function() {
			$('#modalTrans').modal('show');
		});
		$('#TranDate').on('change', function() {
			var dates = $(this).val();
			var LoadTransAmount = "LoadTransAmount";

			$.ajax({
				url: "operations/select.php",
				method: "POST",
				data: {dates: dates, LoadTransAmount: LoadTransAmount},
				dataType:"json",
				success: function(data) {
					//$('#TranDate').val(data.type);
					//$('#TranAmount').val(data.debit);
					//$('#updatedes').val(data.description);
					$('#moneyTran').text("$" + data.debit);
					if(data.debit == undefined || data.debit == 0) {
						$('#moneyTran').text("Expense is: $" + 0);
						$('#TranAmount').val('');
					}
					else {
						$('#moneyTran').text("Expense is: $" + data.debit);
						$('#TranAmount').val(data.debit);
					}
					//alert(data.debit);
				}
			});
		})

		$('#transferForm').on('submit', function(e) {
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
				if($('#transferForm').parsley().isValid()) {
					$.ajax({
						url: 'operations/updates.php',
						method: 'post',
						data: $(this).serialize(),
						beforeSend: function() {
						    disableButton('btnDisable', true);
						},
						success: function(data) {
						    disableButton('btnDisable', false);
							success('SUCCESS', data);
							$('#transferForm')[0].reset();
							loadData();
							$('#modalTrans').modal('hide');
						}
					})
				}
			}
		})
		//delete Method
		$(document).on('click', '.btn-delete', function() {
			var id = $(this).attr('id');
			var delExp_daily = "delExp_daily";
			if(confirm("ma hubtaa in aad tuurayso")) {
				$.ajax({
					url: "operations/delete.php",
					method: "post",
					data: {id: id, delExp_daily: delExp_daily},
					success: function(data) {
						success('Success', data);
						loadData();
					}
				});
			}
			else {
				return false;
			}
		});

		function loadData() {
	        var dailyExp = "dailyExp";
	        $.ajax({
	            url:"operations/select.php",
	            method:"POST",
	            data:{dailyExp:dailyExp},
	            beforeSend: function(){
					$('#tbody').html(loadwaiter());
					$('.lds-spinner').css('display', 'block')
				},
				success: function(data) {
					$('.lds-spinner').css('display', 'none');
	            	$('#tbody').html(data);

	            }
	        });
	   }
        $('#submitForm').attr('autocomplete', 'off');		
        $(document).ajaxComplete(function(){
        	limit('displayLimit','tbl');
        	search('search','tbl');
        })	
        $('#submitForm, #updateForm, #transferForm').attr('autocomplete', 'off');
	});

</script>