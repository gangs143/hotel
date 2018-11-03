<?php 	include '../classes/Databases.php'; 
	$db = new Databases;?>
<?php include('../includes/header.php') ?>
<?php include('../includes/side.php') ?>
	<!-- START PAGE CONTENT-->
	<div class="page-content fade-in-up">
		<div class="container">
			<div class="cards">
		    <div class="box mx-auto text-center">
		        <div class="img">
		            <img src="<?php echo $_SESSION['picture']; ?>" class="img-circle">
		        </div>
		        <h2><?php echo $_SESSION['fullname']; ?><br><span><?php echo $_SESSION['username']; ?></span></h2>
		        <!-- <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		                tempor incididunt ut labore et.</p> -->
		        <div class="front">
		        	<span id="userInfo">
			            <strong>Name: </strong> Abdullahi Abdikadir <br>
			            <strong>Phone: </strong>252907701622 <br>
			            <strong>Address: </strong>Bosaso <br>
			        </span>
		        </div>
		        <div class="back">
		        	<form>
		        		<table>
		        			<tr>
		        				<td><strong>Old Password </strong></td>
		        				<td><input type="password" name="" id="oldpwd" class="form-control input-sm"></td>
		        			</tr>
		        			<tr>
		        				<td><strong>New Password </strong></td>
		        				<td><input type="password" name="" id="newpwd" class="form-control"></td>
		        			</tr>
		        			<tr>
		        				<td><strong>Confirm Password </strong></td>
		        				<td><input type="password" name="" id="conpwd" class="form-control"></td>
		        			</tr>
		        		</table>
		        	</form>
		        </div>
		    </div>
		    <div class="box-footer">
		    	<button id="btn" class="btnDisable">Password Section</button>
		    </div>
		</div>
		</div>
	</div>
<?php include('../includes/footer.php') ?>
<script>
	$(document).ready(function() {
		loadProfile();

		$('#btn').click(function() {
			$('.box').find('.front').css('display', 'none');
			$('.box').find('.back').css('display', 'block');
			if($(this).text() == 'Change Password') {
				var oldpwd = $('#oldpwd').val();
				var newpwd = $('#newpwd').val();
				var conpwd = $('#conpwd').val();
				if((oldpwd || newpwd || conpwd) == "") {
					errors('ERROR', "fadlan buuxi meelaaha banaan");
				}
				else if(conpwd != newpwd) {
					errors('ERROR', 'password mismatched');
					return false;
				}
				else {
					var changepwd = "changepwd";
					$.ajax({
						url: 'operations/updates.php',
						method: 'post',
						data: {oldpwd: oldpwd, newpwd: newpwd, changepwd: changepwd},
						beforeSend: function() {
						    disableButton('btnDisable', true);
						},
						success: function(data) {
						    disableButton('btnDisable', false);
							success('SUCCESS', data);
						}
					})
				}
			}
			$(this).text('Change Password');

		})
		$('#btnpwd').on('click', function() {
			var oldpwd = $('#oldpwd').val();
			var newpwd = $('#newpwd').val();
			var conpwd = $('#conpwd').val();
			if((oldpwd || newpwd || conpwd) == "") {
				alert("fadlan buuxi meelaaha banaan");
			}
			else if(conpwd != newpwd) {
				alert('password mismatched');
				return false;
			}
			else {
				var changepwd = "changepwd";
				$.ajax({
					url: 'operations/updates.php',
					method: 'post',
					data: {oldpwd: oldpwd, newpwd: newpwd, changepwd: changepwd},
					beforeSend: function() {
					    disableButton('btnDisable', true);
					},
					success: function(data) {
					    disableButton('btnDisable', false);
						success('SUCCESS', data);
					}
				})
			}
		})
		function loadProfile() {
			var loadProfile = "loadProfile";
			$.ajax({
				url: 'operations/select.php',
				method: 'post',
				data: {loadProfile: loadProfile},
				dataType: 'json',
				success: function(data) {
					var html = '<strong>Name: </strong>'+data.name;
					html += '<br><strong>Phone: </strong>'+data.phone;
					html += '<br><strong>Email: </strong>'+data.email;
					$('#userInfo').html(html);
					$('#username').val(data.username);
					$('#phone').val(data.phone);
					$('#email').val(data.email);
				}
			})
		}
	})
</script>