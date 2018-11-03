<?php 	include '../classes/Databases.php'; 
	$db = new Databases;?>
<?php include('../includes/header.php') ?>
<?php include('../includes/side.php') ?>
	<!-- START PAGE CONTENT-->
	<div class="page-content fade-in-up">
		<h3 class="page-title">Payroll</h3>
			<div class="container">
				<div class="row">
					<div class="col-md-4  col text-left">
						<span class="fa fa-reply fa-lg " data-toggle="tooltip"  title="Go Back" id="btn-show"></span>
					</div>
					<div class="col-md-8 col text-right">
						<button class="btn btn-success text-white fa fa-plus-circle" id="modalOpen"> Advance</button>
						<button class="btn btn-info text-white fa fa-dollar" id="modalOpenSalary"> Salary</button>
						<button class="btn btn-warning text-white fa fa-info" id="showCompSalary"> Completed</button>
						<!-- <button class="btn btn-success text-white btn-lg fa fa-plus-circle" id="modalOpen"> Show</button> -->
					</div>
					<!-- <div class="col-md-12 col text-right">
						<button class="btn btn-success text-white btn-lg fa fa-plus-circle" id="modalOpen"> Advance</button>
						<button class="btn btn-warning text-white btn-lg fa fa-plus-circle" id="modalOpenSalary"> Salary </button>
						<button class="btn btn-success text-white btn-lg fa fa-plus-circle" id="btn-show"> Show</button>
					</div> -->
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
						<div id="tbody"></div>
					</div>
				</div>
			</div>
		</div>


		<div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Advance Salary Form...</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form method="post" enctype="multipart/form-data" id="submitForm">
						<div class="modal-body">
							<div class="row">
								<span class="col text-right">
									<label class="staffSalary" id="staffSalary"></label>
								</span>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="control-label">Staff Names</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<input type="text" name="staff_id" id="staff_id" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" class="form-control staff_id">
									</div>
									<div id="suggestStaff" class="autoSearch suggestStaff">
										
									</div>
								</div>
								<div class="col-md-4">
									<label class="control-label">Total Amount</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-money fa-lg"></span>
										</div>
										<input type="number" id="advancePay" name="advancePay" data-parsley-type="number" data-parsley-trigger="keyup" class="form-control">
										
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<input type="hidden" name="action" id="action" value="insert">
							<input type="submit" name="sendData" id="sendData" class="btn btn-primary btnDisable" value="Insert">
							
							<!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- .........SALARY MODEL ............. -->
		<div class="modal fade" id="modalSalaryInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Salary Form...</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form method="post" enctype="multipart/form-data" id="submitFormSalary">
						<div class="modal-body">
							<div class="row">
								<span class="col text-right">
									<label class="staffSalary" id="totPayroll" style="font-weight: bold;"></label>
								</span>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label class="control-label">Staff Name</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<input type="text" class="form-control staff_id" id="checkSalary">
									</div>
									<div class="autoSearch suggestStaff">
										
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<input type="submit" name="totalSalary" id="totalSalary" class="btn btn-primary btnDisable" value="Insert">
							
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
						<h5 class="modal-title" id="exampleModalLabel">Update Advance Form...</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form method="post" id="updateForm">
						<div class="modal-body">
							<input type="hidden" name="id" id="updateid">
							<div class="row">
							
								<!-- <div></div> -->
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
									<label class="control-label">Amount</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-money fa-lg"></span>
										</div>
										<input type="number" id="updateAmount" name="updateAmount" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
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
				$('.staffSalary').text('');
				$('#submitForm').find('.modal-body input').each(function() {
					$(this).val('');
				});
				$('#modalInsert').modal('show');
				$('#submitForm')[0].reset();
				$('.suggestStaff').fadeOut();
				$('#submitForm, #modalInsert').parsley() ;
				$('#submitForm, #updateForm').parsley();
			})

			$('#modalOpenSalary').on('click', function() {
				$('.staffSalary').text('');
				$('#modalSalaryInsert').find('.modal-body input').each(function() {
					$(this).val('');
				});
				$('#modalSalaryInsert').modal('show');
				$('#submitFormSalary')[0].reset();
				$('.suggestStaff').fadeOut();
			})

			$('#showCompSalary').on('click', function() {
				showCompleteSalary();
			})

			// insert the data into database using ajax
			
			$('#submitForm, #submitFormSalary').submit(function(e) {
				e.preventDefault();
			});
			$('#sendData').on('click', function() {
				//var staff = $('#staff_id').attr('data-id');
				var staff_id = $('#staff_id').attr('data-id');
				//var staff_id = $('#staff_id').val(staff);
				var salary = $('#staffSalary').text().slice(14);
				var advancePay = $('#advancePay').val();
				var insertPayroll = "insertPayroll";

				if($('#submitForm input').val() == ""){
					alert("fadlan xafada ciyaarta ka daaa");
				}
				else {
					if($('#updateForm').parsley().isValid()) {
						$.ajax({
						url: "operations/updates.php",
						method: "post",
						data: {
							staff_id: staff_id,
							salary: salary,
							advancePay: advancePay,
							insertPayroll: insertPayroll
						},
						beforeSend: function() {
						    disableButton('btnDisable', true);
						},
						success: function(data) {
						    disableButton('btnDisable', false);
							alert(data);
							//console.log(data);
							loadData();
							$('#submitForm')[0].reset();
							$('#modalInsert').modal('hide');
						
						}
					});
					}
					
				}
			});

			$('#totalSalary').on('click', function() {
				//var staff = $('#staff_id').attr('data-id');
				var staff_id = $('#checkSalary').attr('data-id');
				//var staff_id = $('#staff_id').val(staff);
				var salary = $('#totPayroll').text().slice(14);
				var checkPayroll = "checkPayroll";
				if($('#submitFormSalary').find('input').val() == ''){
					alert("Please fill all fields");
					return false;
				}
				else {
					if($('#updateForm').parsley().isValid()){
						$.ajax({
						url: "operations/updates.php",
						method: "post",
						data: {
							staff_id: staff_id,
							salary: salary,
							checkPayroll: checkPayroll
						},
						beforeSend: function() {
						    disableButton('btnDisable', true);
						},
						success: function(data) {
						    disableButton('btnDisable', false);
							//alert(data);
							success("SUCCESS", data);
							console.log(data);
							loadData();
							$('#submitFormSalary')[0].reset();
							$('#modalSalaryInsert').modal('hide');
						
						}
					});
					}
					
				}
			});

			$(document).on('click', '.btn-edit', function() {
				var id = $(this).attr('id');
				$('#updateid').val(id);
				var SelectPayroll = "SelectPayroll";

				$.ajax({
					url: "operations/select.php",
					method: "POST",
					data: {id: id, SelectPayroll: SelectPayroll},
					dataType:"json",
					success: function(data) {
						$('#upname').attr('data-payroll',data.paid);
						$('#upname').attr('data-staff',data.sid);
						$('#upname').val(data.name);
						$('#updateAmount').val(data.amount);
					}
				});
				$('#modalUpdate').modal('show');
			});

			$('#updateData').click(function(e) {
				e.preventDefault();
				var UpdatePayroll = "UpdatePayroll";
				var staff_id = $('#upname').attr('data-staff');
				var payroll_id = $('#upname').attr('data-payroll');
				var updateid = $('#updateid').val();
				var upname = $('#upname').val();
				var updateAmount = $('#updateAmount').val();
				if($('#updateForm input').val() == ''){
					alert("fadlan buuxi meelaha banaan")
				}
				else {
					$.ajax({
						url: "operations/updates.php",
						method: "POST",
						data: {
							id: updateid,
							staff_id:staff_id,
							payroll_id:payroll_id,
							UpdatePayroll:UpdatePayroll,
							upname: upname,
							updateAmount: updateAmount
						},
						beforeSend: function() {
						    disableButton('btnDisable', true);
						},
						success: function(data) {
						    disableButton('btnDisable', false);
							$('#updateForm')[0].reset();
							$('#modalUpdate').modal('hide');
							//alert(data);
							console.log(data);
							loadData();
						}
					});
				}
			});

			//delete Method
			$(document).on('click', '.btn-delete', function() {
				var id = $(this).attr('id');
				var delPayroll = "delPayroll";
				if(confirm("ma hubtaa in aad tuurayso")) {
					$.ajax({
						url: "operations/delete.php",
						method: "post",
						data: {id: id, delPayroll: delPayroll},
						success: function(data) {
							loadData();
						}
					});
				}
				else {
					return false;
				}
			});

			$('.staff_id').on('keyup', function() {
				var search = $(this).val();
				// sgtguest => suggest guest
				var hintStaff = "hintStaff";
				if(search) {
					$.ajax({
						url: 'operations/select.php',
						method: 'post',
						data: {search: search, hintStaff: hintStaff},
						success: function(data) {
							$('.suggestStaff').fadeIn();
							$('.suggestStaff').html(data);
						}
					});
				}
				else {
					$('.suggestStaff').fadeOut();
				}
			});
			$(document).on('click', '.selected', function() {
				var id = $(this).attr('data-id');
				var salary = $(this).attr('data-salary');
				var name = $(this).text();
				$('.staff_id').val(name);
				$('.staffSalary').text('Total Salary $'+salary);
				$('.staff_id').attr('data-id', id);
				$('.suggestStaff').fadeOut();
			});

			function loadData() {
		        var payroll = "payroll";
		        $.ajax({
		            url:"operations/select.php",
		            method:"POST",
		            data:{payroll:payroll},
		            beforeSend: function(){
						$('#tbody').html(loadwaiter());
						$('.lds-spinner').css('display', 'block')
					},
					success: function(data) {
		            	$('#tbody').html(data);
		            }
		        });
		        if($('#btn-show').show()) {
		        	$('#btn-show').hide();
		        }
		   }

		   function showCompleteSalary() {
		   		var completeSalary = "completeSalary";
		   		$.ajax({
		   			url: 'operations/select.php',
		   			type: 'post',
		   			data: {completeSalary: completeSalary},
		   			beforeSend: function(){
						$('#tbody').html(loadwaiter());
						$('.lds-spinner').css('display', 'block')
					},
					success: function(data) {
		   				$('#tbody').html(data);
		   			}
		   		})
		   }

		   $(document).ajaxComplete(function(){
	        	limit('displayLimit','tbl');
	        	search('search','tbl');
	        });
            $('#submitForm, #submitFormSalary').attr('autocomplete', 'off');

            $(document).on('click', '.btn-preview', function() {
				var payrollid = $(this).data('payroll');
				var staff_id = $(this).data('staff');
				var loadpreveiw = "loadpreveiw";
				// $('#btn-show').show();
				$.ajax({
					url: "operations/select.php",
					method: "post",
					data: {staff_id: staff_id, payrollid: payrollid, loadpreveiw: loadpreveiw},
					success: function(data) {
						$('#tbody').html(data);
						$('#btn-show').show();
					}
				});
			});
			$('#btn-show').on('click', function() {
				loadData();
			})
		});
</script>