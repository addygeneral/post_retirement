<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php
	if(isset($_POST['add_staff']))
	{
	
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];   
	$email=$_POST['email']; 
	$password=md5($_POST['password']); 
	$gender=$_POST['gender']; 
	$dob=$_POST['dob']; 
	$institution=$_POST['institution']; 
	$address=$_POST['address']; 
	$age=$_POST['age']; 
	$rank=$_POST['rank']; 
	$postretirement_days=$_POST['postretirement_days']; 
	$user_role=$_POST['user_role']; 
	$phonenumber=$_POST['phonenumber']; 
	$status=1;
	

	$query = mysqli_query($conn,"select * from tblemployees where EmailId = '$email'")or die();
	$count = mysqli_num_rows($query);
     
    if ($count > 0){ ?>
	<script>
	alert('Data Already Exist');
	</script>
	<?php
      }else{
        mysqli_query($conn,"INSERT INTO tblemployees(FirstName,LastName,Rank,EmailId,Password,Gender,Dob,Institution,Address,Age,Av_postretirement,role,Phonenumber,Status, location) VALUES('$fname','$lname','$rank','$email','$password','$gender','$dob','$institution','$address','$age','$postretirement_days','$user_role','$phonenumber','$status', 'NO-IMAGE-AVAILABLE.jpg')         
		") or die(); ?>
		<script>alert('Staff Records Successfully  Added');</script>;
		<script>
		window.location = "staff.php"; 
		</script>
		<?php   }
}

?>

<body>

		<script type="text/javascript">
			function getAge(){
				var dob = document.getElementById('date').value;
				dob = new Date (dob);
				var today = new Date ();
				var age = Math.floor((today-dob) / (365.25*24*60*60*1000));
				document.getElementById('age').value=age;
			}
		</script>
		


	<?php include('includes/navbar.php')?>

	<?php include('includes/right_sidebar.php')?>

	<?php include('includes/left_sidebar.php')?>

	<div class="mobile-menu-overlay"></div>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Staff Portal</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Staff Module</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Staff Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					
						<form method="post" action="">
							<section>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >First Name :</label>
											<input name="firstname" type="text" class="form-control wizard-required" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Last Name :</label>
											<input name="lastname" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Rank / Title :</label>
											<select name="rank" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Rank/Title</option>
												<option value="Prof">Professor</option>
												<option value="Associate Prof">Associate Professor</option>
												<option value="Snr Lect">Senior Lecturer</option>
												
											</select>
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Email Address :</label>
											<input name="email" type="email" placeholder="Email" class="form-control wizard-required" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Password :</label>
											<input name="password" type="password" placeholder="**********" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Gender :</label>
											<select name="gender" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Gender</option>
												<option value="male">Male</option>
												<option value="female">Female</option>
											</select>
										</div>
									</div>
									
								</div>
								<div class="row">
								<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Phone Number :</label>
											<input name="phonenumber" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Date Of Birth :</label>
											<input name="dob" id="date" onblur="getAge();" type="text" class="form-control date-picker" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Age :</label>
											<input name="age" id="age" type="text" class="form-control" required="true" autocomplete="off" readonly>
										</div>
									</div>
									
								</div>

								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Address :</label>
											<input name="address" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Institution :</label>
											<select name="institution" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Institution</option>
													<?php
													$query = mysqli_query($conn,"select * from tblinstitutions");
													while($row = mysqli_fetch_array($query)){
													
													?>
													<option value="<?php echo $row['InstitutionShortName']; ?>"><?php echo $row['InstitutionName']; ?></option>
													<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Staff Post Retirement Years :</label>
											<select name="postretirement_days" type="number" class="form-control" required="true" autocomplete="off">
												<option value="">Select Max Number of Years</option>
												<option value="3650">10 Years</option>
												<option value="1825">5 Years</option>
												
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>User Role :</label>
											<select name="user_role" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Role</option>
												<option value="Admin">Admin</option>
												<option value="REG">Reg</option>
												<option value="Staff">Staff</option>
											</select>
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="add_staff" id="add_staff" data-toggle="modal">Add&nbsp;Staff</button>
											</div>
										</div>
									</div>
								</div>
							</section>
						</form>
					
				</div>

			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>