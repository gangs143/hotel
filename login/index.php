<!DOCTYPE html>
<html>
<head>
	<title>	</title>
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/css/iziToast.min.css" rel="stylesheet" />
	<link href="style.css" rel="stylesheet" />
</head>
<body>
	<div id="login-page">
		<div class="container">
			<form class="form-login" action="#" id="loginSubmit">
	        	<h2 class="form-login-heading">Login Page</h2>
	        	<div class="login-wrap">
	            	<input id="username" type="text" class="form-control" placeholder="Username" autofocus>
	            	<br>
	            	<input id="password" type="password" class="form-control" placeholder="Password"><br>
	            	<button id="signin" class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		        </div>
		    </form>
		    <div id="status" class="justify-content-sm-center">
		    	<h4 class="text-danger"></h4>
		    </div>
		</div>
	</div>

	<script src="../assets/js/jquery-3.2.1.js" type="text/javascript"></script>
	<script src="../assets/js/popper.min.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/js/iziToast.min.js" type="text/javascript"></script>
    <script src="../assets/js/main.js"></script>
    <script>
    	$('document').ready(function() {
    		$('#loginSubmit').on('submit', function(e) {
    			e.preventDefault();
    		});

    		$('#loginSubmit').attr('autocomplete', 'off');

    		// signin code 
    		$('#signin').on('click',function() {
			var username = $('#username').val();
			var password = $('#password').val();
			var LoginData = "LoginData";
			$.ajax({
				url : "../admin/operations/select.php",
				method:"post",
				data: {
					LoginData:LoginData,
					username:username,
					password:password
				},
				dataType:'json',
				beforeSend: function() {
					$(this).attr('disabled', true);
					$(this).text('Login...');
				},
				success:function(data) {
					if(data.success) {
						success('SUCCESS', data.success);
						window.location.replace('../admin');
					}
					else if(data.status) {
						$('#status h4').text(data.status);
					}
					else {
						errors('ERROR', data.error);
					}
					$(this).attr('disabled', false);
					$(this).text('SIGN IN');
				}

			});
		});
    });



    </script>
</body>
</html>