<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php
	if(isset($_POST['apply']))
	{
	$empid=$session_id;
	$postretirement_type=$_POST['postretirement_type'];
	$fromdate=date('d-m-Y', strtotime($_POST['date_from']));
	$todate=date('d-m-Y', strtotime($_POST['date_to']));
	$description=$_POST['description']; 
	
	$status=0;
	$isread=0;
	$postretirement_days=$_POST['postretirement_days'];
	$datePosting = date("Y-m-d");  
		 
	$file = $_FILES['file']['name'];
	$file_loc = $_FILES['file']['tmp_name'];
	move_uploaded_file($file_loc, "uploads/".$file);

	 
	

	if($fromdate > $todate)
	{
	    echo "<script>alert('End Date should be greater than Start Date');</script>";
	  }
	elseif($postretirement_days <= 0)
	{
	    echo "<script>alert('YOU HAVE EXCEEDED YOUR POST RETIREMENT LIMIT. POST RETIREMENT APPLICATION FAILED');</script>";
	  }

	else {
		
		$DF = date_create($_POST['date_from']);
		$DT = date_create($_POST['date_to']);

		$diff =  date_diff($DF , $DT );
		$num_days = (1 + $diff->format("%a"));

		$sql="INSERT INTO tblpostretirements(PostretirementType,FromDate,ToDate,Description,File,Status,IsRead,empid,num_days,PostingDate) VALUES(:postretirement_type,:fromdate,:todate,:description,:file,:status,:isread,:empid,:num_days,:datePosting)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':postretirement_type',$postretirement_type,PDO::PARAM_STR);
		$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
		$query->bindParam(':todate',$todate,PDO::PARAM_STR);
		$query->bindParam(':description',$description,PDO::PARAM_STR);
		$query->bindParam(':file',$file,PDO::PARAM_STR);
		$query->bindParam(':status',$status,PDO::PARAM_STR);
		$query->bindParam(':isread',$isread,PDO::PARAM_STR);
		$query->bindParam(':empid',$empid,PDO::PARAM_STR);
		$query->bindParam(':num_days',$num_days,PDO::PARAM_STR);
		$query->bindParam(':datePosting',$datePosting,PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId)
		{
			echo "<script>alert('Postretirement Application was successful.');</script>";
			echo "<script type='text/javascript'> document.location = 'postretirement_history.php'; </script>";
		}
		else 
		{
			echo "<script>alert('Something went wrong. Please try again');</script>";
		}

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
		<div class="pb-20">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Post Retirement Application</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Apply for Post Retirement</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div style="margin-left: 50px; margin-right: 50px;" class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Staff Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="" enctype="multipart/form-data">
							<section>

								<?php if ($role_id = 'Staff'): ?>
								<?php $query= mysqli_query($conn,"select * from tblemployees where emp_id = '$session_id'")or die( );
									$row = mysqli_fetch_array($query);
								?>
						
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Rank </label>
											<input name="rank" type="text" class="form-control wizard-required" required="true" readonly autocomplete="off" value="<?php echo $row['Rank']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >First Name </label>
											<input name="firstname" type="text" class="form-control wizard-required" required="true" readonly autocomplete="off" value="<?php echo $row['FirstName']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Last Name </label>
											<input name="lastname" type="text" class="form-control" readonly required="true" autocomplete="off" value="<?php echo $row['LastName']; ?>">
										</div>
									</div>
								</div>
								<div class="row">
								<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Institution </label>
											<input name="Institution" type="text" class="form-control" readonly required="true" autocomplete="off" value="<?php echo $row['Institution']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Email Address</label>
											<input name="email" type="text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['EmailId']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Available Postretirement Days </label>
											<input name="postretirement_days" type="text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['Av_postretirement']; ?>">
										</div>
									</div>
									<?php endif ?>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label>Post Retirement Years :</label>
											<select name="postretirement_type" class="custom-select form-control" required="true" autocomplete="off">
											<option value="">Select Post Retirement Years...</option>
											<?php $sql = "SELECT  PostretirementType from tblpostretirementtype";
											$query = $dbh -> prepare($sql);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$cnt=1;
											if($query->rowCount() > 0)
											{
											foreach($results as $result)
											{   ?>                                            
											<option value="<?php echo htmlentities($result->PostretirementType);?>"><?php echo htmlentities($result->PostretirementType);?></option>
											<?php }} ?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Effective Date :</label>
											<input name="date_from" type="text" class="form-control date-picker" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>End Date :</label>
											<input name="date_to" type="text" class="form-control date-picker" required="true" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-8 col-sm-12">
										<div class="form-group">
											<label>Justification For Post Retirement :</label>
											<textarea id="textarea1" name="description" class="form-control" required length="150" maxlength="150" required="true" autocomplete="off"></textarea>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<br>
											<input name="file" type="file" upload_max_filesize="5mb"  class="form-control-file border" required="true" autocomplete="off">
									</div>
								</div>
								<div class="row">
									
									<div class="col-md-12">
										<div class="form-group">
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="apply" id="apply" data-toggle="modal">Apply&nbsp;Post Retirement</button>
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