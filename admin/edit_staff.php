<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php $get_id = $_GET['edit']; ?>
<?php
	if(isset($_POST['add_staff']))
	{
	
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];   
	$email=$_POST['email'];  
	$gender=$_POST['gender']; 
	$dob=$_POST['dob']; 
	$institution=$_POST['institution']; 
	$address=$_POST['address']; 
	$age=$_POST['age']; 
	$rank=$_POST['rank']; 
	$postretirement_days=$_POST['postretirement_days']; 
	$user_role=$_POST['user_role']; 
	$phonenumber=$_POST['phonenumber']; 

	$result = mysqli_query($conn,"update tblemployees set FirstName='$fname', LastName='$lname',Rank='$rank', EmailId='$email', Gender='$gender', Dob='$dob', Age='$age', Institution='$institution', Address='$address', Av_postretirement='$postretirement_days', role='$user_role', Phonenumber='$phonenumber' where emp_id='$get_id'         
		"); 		
	if ($result) {
     	echo "<script>alert('Record Successfully Updated');</script>";
     	echo "<script type='text/javascript'> document.location = 'staff.php'; </script>";
	} else{
	  die();
   }
		
}

?>

<body>

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
									<li class="breadcrumb-item active" aria-current="page">Staff Edit</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Edit Staff</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<?php
									$query = mysqli_query($conn,"select * from tblemployees where emp_id = '$get_id' ")or die();
									$row = mysqli_fetch_array($query);
									?>

								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >First Name :</label>
											<input name="firstname" type="text" class="form-control wizard-required" required="true" autocomplete="off" value="<?php echo $row['FirstName']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Last Name :</label>
											<input name="lastname" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row['LastName']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Email Address :</label>
											<input name="email" type="email" class="form-control" required="true" autocomplete="off" value="<?php echo $row['EmailId']; ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Password :</label>
											<input name="password" type="password" placeholder="**********" class="form-control" readonly required="true" autocomplete="off" value="<?php echo $row['Password']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Gender :</label>
											<select name="gender" class="custom-select form-control" required="true" autocomplete="off">
												<option value="<?php echo $row['Gender']; ?>"><?php echo $row['Gender']; ?></option>
												<option value="male">Male</option>
												<option value="female">Female</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Phone Number :</label>
											<input name="phonenumber" type="text" class="form-control" required="true" autocomplete="off"value="<?php echo $row['Phonenumber']; ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Date Of Birth :</label>
											<input name="dob" type="text" class="form-control date-picker" required="true" autocomplete="off"value="<?php echo $row['Dob']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Address :</label>
											<input name="address" type="text" class="form-control" required="true" autocomplete="off"value="<?php echo $row['Address']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Institution :</label>
											<input class="form-control form-control-lg" type="text" required="true" autocomplete="off" readonly value="<?php echo $row['Institution']; ?>">
					
										</div>
									</div>
								</div>

								<?php
									$query = mysqli_query($conn,"select * from tblemployees where emp_id = '$get_id' ")or die();
									$new_row = mysqli_fetch_array($query);
									?>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Staff Post Retirement Years :</label>
											<input name="postretirement_days" type="text" class="form-control" required="true" autocomplete="off"value="<?php echo $new_row['Av_postretirement']; ?>">
										</div>
									</div>
									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>User Role :</label>
											<select name="user_role" class="custom-select form-control" required="true" autocomplete="off">
												<option value="<?php echo $new_row['role']; ?>"><?php echo $new_row['role']; ?></option>
												<option value="Admin">Admin</option>
												<option value="REG">Registrar</option>
												<option value="Staff">Staff</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Rank / Title :</label>
											<select name="rank" class="custom-select form-control" required="true" autocomplete="off">
											<option value="<?php echo $new_row['Rank']; ?>"><?php echo $new_row['Rank']; ?></option>
												<option value="Prof">Professor</option>
												<option value="Associate Prof">Associate Professor</option>
												<option value="Snr Lect(PhD)">Senior Lecturer</option>
											</select>
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Age :</label>
											<input name="age" type="text" class="form-control" required="true" readonly autocomplete="off" value="<?php echo $new_row['Age']; ?>">
										</div>
									</div>
									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="add_staff" id="add_staff" data-toggle="modal">Update&nbsp;Staff</button>
											</div>
										</div>
									</div>
								</div>
							</section>
						</form>
					</div>
				</div>

			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>